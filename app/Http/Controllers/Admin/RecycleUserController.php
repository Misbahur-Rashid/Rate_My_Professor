<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Session;
use Storage;

class RecycleUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $users = User::onlyTrashed()->latest()->get();
        return view('admin.recycle.user.index', compact('users'));
    }
    public function show($id)
    {
        $user = User::onlyTrashed()->findOrFail($id);
        return view('admin.recycle.user.show', compact('user'));
    }
    public function update($id)
    {
        $user = User::onlyTrashed()->findOrFail($id);
        $restore = $user->restore();
        if($restore){
            Session::flash('success', 'User Successfully restored');
            return redirect()->back();
        }else{
            Session::flash('error', 'User restoring failed');
            return redirect()->back();
        }
    }
    public function destroy($id)
    {
        $user = User::onlyTrashed()->findOrFail($id);
        if (Storage::disk('public')->exists('image/user/'.$user->image))
        {
            Storage::disk('public')->unlink('image/user/'.$user->image);
        }
        $delete = $user->forceDelete();
        if($delete){
            Session::flash('success', 'User Successfully deleted');
            return redirect()->back();
        }else{
            Session::flash('error', 'User deleting failed');
            return redirect()->back();
        }
    }
}

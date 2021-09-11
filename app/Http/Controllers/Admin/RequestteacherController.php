<?php

namespace App\Http\Controllers\Admin;

use App\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Requestteacher;
use Illuminate\Support\Facades\Session;

class RequestteacherController extends Controller
{
    public function index()
    {
        Session::put('page','dashboard');
    	$contactmessages = Requestteacher::with('department')->latest()->get();
    	return view('admin.requestteacher.index', compact('contactmessages'));
    }
    public function show($id)
    {
    	$contactmessage = Requestteacher::findOrFail($id);
    	if($contactmessage->status == 0){
    		$contactmessage->status = 1;
    		$contactmessage->save();
    	}
    	return view('admin.requestteacher.show', compact('contactmessage'));
    }

    public function destroy($id)
    {
    	$delete = Requestteacher::findOrFail($id)->delete();
        if($delete){
            Session::flash('success', 'Request Teacher successfully deleted');
            return redirect()->back();
        }else{
            Session::flash('error', 'Request Teacher deleting failed');
            return redirect()->back();
        }
    }
}

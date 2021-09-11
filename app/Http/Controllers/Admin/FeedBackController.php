<?php

namespace App\Http\Controllers\Admin;

use App\FeedBack;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class FeedBackController extends Controller
{
    public function index()
    {
        Session::put('page','dashboard');
    	$contactmessages = FeedBack::with('uses','teacher')->latest()->get();
    	return view('admin.feedback.index', compact('contactmessages'));
    }
    public function show($id)
    {
    	$contactmessage = FeedBack::findOrFail($id);
    	if($contactmessage->status == 0){
    		$contactmessage->status = 1;
    		$contactmessage->save();
    	}
    	return view('admin.feedback.show', compact('contactmessage'));
    }



    public function destroy($id)
    {
    	$delete = FeedBack::findOrFail($id)->delete();
        if($delete){
            Session::flash('success', 'Message successfully deleted');
            return redirect()->back();
        }else{
            Session::flash('error', 'Message deleting failed');
            return redirect()->back();
        }
    }

  public function pending(){
    $data=FeedBack::where('status','0')->get();
    return view('admin.pending.pendinglist',compact('data'));
  }
}

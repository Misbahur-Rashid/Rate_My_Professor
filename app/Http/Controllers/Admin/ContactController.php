<?php

namespace App\Http\Controllers\Admin;

use App\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class ContactController extends Controller
{
    public function index()
    {
        Session::put('page','dashboard');
    	$contactmessages = Contact::latest()->get();
    	return view('admin.contact.index', compact('contactmessages'));
    }
    public function show($id)
    {
    	$contactmessage = Contact::findOrFail($id);
    	if($contactmessage->status == 0){
    		$contactmessage->status = 1;
    		$contactmessage->save();
    	}
    	return view('admin.contact.show', compact('contactmessage'));
    }



    public function destroy($id)
    {
    	$delete = Contact::findOrFail($id)->delete();
        if($delete){
            Session::flash('success', 'Message successfully deleted');
            return redirect()->back();
        }else{
            Session::flash('error', 'Message deleting failed');
            return redirect()->back();
        }
    }

  public function pending(){
    $data=Contact::where('status','0')->get();
    return view('admin.pending.pendinglist',compact('data'));
  }
}

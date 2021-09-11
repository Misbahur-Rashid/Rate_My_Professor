<?php

namespace App\Http\Controllers;

use App\FeedBack;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class FeedBackController extends Controller
{
    public function addFeedBack(Request $request){
        if($request->isMethod('post')){
            $data=$request->all();
            $feedback=new FeedBack();
            $feedback->user_id=Auth::user()->id;
            $feedback->teacher_id=$data['teacher_id'];
            $feedback->three_star=$data['three_star'];
            $feedback->comment=$data['comment'];
            $feedback->save();
            Session::flash('success','Thanks For The Review!');
            return redirect()->back();
        }
        return view('website.single');

    }
}

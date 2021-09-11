<?php

namespace App\Http\Controllers\Admin;
use Session;
use App\User;
use App\Course;
use App\learningjernal;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class learningjernalController extends Controller
{
    public function __construct(){
        $this->middleware('auth');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Session::put('page','dashboard');
        $learnigjernals=learningjernal::latest()->get();
        return view('admin.learn.index',compact('learnigjernals'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses=Course::latest()->get();
        return view('admin.learn.create',compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'content'=>'required',
        ]);
        $learnigjernal=new learningjernal();
        $learnigjernal->jernal_name=$request->name;
        $learnigjernal->jernal_content=$request->content;
        $learnigjernal->user_id= Auth::id();
        $learnigjernal->course_id=$request->course_name;
        $create=$learnigjernal->save();
        if($create)
        {
            Session::flash('success','Successfully craeted');
            return redirect()->back();
        }else{
            Session::flash('error','opps not craeted');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\learningjernal  $learningjernal
     * @return \Illuminate\Http\Response
     */
    public function show(learningjernal $learningjernal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\learningjernal  $learningjernal
     * @return \Illuminate\Http\Response
     */
    public function edit(learningjernal $learningjernal)
    {
        $courses=Course::latest()->get();
        return view('admin.learn.edit',compact('courses','learningjernal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\learningjernal  $learningjernal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, learningjernal $learningjernal)
    {
        $this->validate($request,[
            'name'=>'required',
            'content'=>'required',
        ]);
        $learningjernal->jernal_name=$request->name;
        $learningjernal->jernal_content=$request->content;
        $learningjernal->user_id= Auth::id();
        $learningjernal->course_id=$request->course_name;
        $update=$learningjernal->save();
        if($update)
        {
            Session::flash('success','Successfully updated');
            return redirect()->back();
        }else{
            Session::flash('error','opps not updated!!');
            return redirect()->back();
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\learningjernal  $learningjernal
     * @return \Illuminate\Http\Response
     */
    public function destroy(learningjernal $learningjernal)
    {
        $deleted=$learningjernal->delete();
        if($deleted){
            Session::flash('success','Successfully Deleted');
            return redirect()->back();
        }else{
            Session::flash('error','Successfully not Deleted');
            return redirect()->back();
        }
    }
}

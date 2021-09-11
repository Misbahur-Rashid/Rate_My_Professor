<?php

namespace App\Http\Controllers\Admin;
use App\School;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class SchoolController extends Controller
{
    public function index(){
        Session::put('page','dashboard');
        $School=School::where('status',1)->get();
        return view('admin.School.index',compact('School'));

    }
    public function addEdit(Request $request,$id=null){
        if($id==""){
            $title="School Create";
            $School=new School;
            $message="School Store Successfully";

        }else{
            $title="School Create";
            $School=School::find($id);
            $message="School Updated Successfully";
        }
        if($request->isMethod('post')){
            $this->validate($request,[
                'name'=>'required|unique:schools',
            ]);

            $data=$request->all();
            $School->name=$data['name'];
            $School->status=1;
            $School->save();
            Session::flash('success',$message);
            return redirect('admin/get-school');
        }
        return view('admin.School.create',compact('title','School'));
    }
    public function delete($id){
        School::find($id)->delete();
        $message="School Deleted Successfully!";
        Session::flash('success',$message);
        return redirect('admin/get-school');

    }
}

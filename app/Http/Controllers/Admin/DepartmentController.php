<?php

namespace App\Http\Controllers\Admin;

use App\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class DepartmentController extends Controller
{
    public function index(){
        Session::put('page','dashboard');
        $department=Department::where('status',1)->get();
        return view('admin.department.index',compact('department'));

    }
    public function addEdit(Request $request,$id=null){
        if($id==""){
            $title="Department Create";
            $department=new Department;
            $message="Department Store Successfully";

        }else{
            $title="Department Create";
            $department=Department::find($id);
            $message="Department Updated Successfully";
        }
        if($request->isMethod('post')){
            $this->validate($request,[
                'name'=>'required|unique:departments',
            ]);

            $data=$request->all();
            $department->name=$data['name'];
            $department->status=1;
            $department->save();
            Session::flash('success',$message);
            return redirect('admin/get-department');
        }
        return view('admin.department.create',compact('title','department'));
    }
    public function delete($id){
        Department::find($id)->delete();
        $message="department Deleted Successfully!";
        Session::flash('success',$message);
        return redirect('admin/get-department');

    }
}

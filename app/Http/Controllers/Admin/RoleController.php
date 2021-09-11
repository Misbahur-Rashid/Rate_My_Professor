<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Role;
use Illuminate\Support\Facades\Session;

class RoleController extends Controller
{
    public function index(){
        $role=Role::where('status',1)->get();
        return view('admin.role.index',compact('role'));
    }
    public function addedit(Request $request,$id=null){
        if($id==''){
            $title="Role Create";
            $role=new Role;
            $message="Role Information Successfully Added";
        }else{
            $title="Role Updated";
            $role=Role::find($id);
            $message="Role Information Successfully Updated";
        }
        if($request->isMethod('post')){
            $data=$request->all();
            $this->validate($request,[
                'role_name'=>'required',
                ]);
                $role->role_name=$data['role_name'];
                $role->status=1;
                $role->save();
                Session::flash('success',$message);
                return redirect('admin/get-role');

        }
        return view('admin.role.create',compact('title','role'));

    }
    public function delete($id){
        Role::find($id)->delete();
        $message="Role Information Successfully deleted";
        Session::flash('success',$message);
        return redirect('admin/get-role');
    }
}

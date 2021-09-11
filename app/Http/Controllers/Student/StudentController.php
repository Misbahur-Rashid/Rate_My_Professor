<?php

namespace App\Http\Controllers\Student;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;
use App\learningjernal;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function index(){
        $user=Auth::user();
        return view('student.dashboard.index',compact('user'));
    }
    public function editpro(){
        $editData=User::find(Auth::user()->id);
        return view('student.dashboard.profileedit',compact('editData'));

    }
    public function editprostore(Request $request){
        $user= User::find(Auth::user()->id);
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|string|email|unique:users,email,'.$user->id,
            'phone' => 'required|string|min:10|max:30,phone,'.$user->id,

        ]);
        if($request->hasFile('image')){
            $image_tmp=$request->file('image');
            if($image_tmp->isValid()){
                $extention=$image_tmp->getClientOriginalExtension();
                $imageName= rand(111,99999).'.'.$extention;
                $imagePath='image/user/'.$imageName;
                Image::make($image_tmp)->resize(300,200)->save($imagePath);
            }else{
                $imageName="";
            }
          } else{
            $imageName = $user->image;
        }
        $user->name=$request->name;
        $user->email=$request->email;
        $user->address=$request->address;
        $user->phone=$request->phone;
        $user->image = $imageName;
        $user->save();
        return redirect()->route('student.dashboard');
    }
    public function passwordChange(){
        $editData=User::find(Auth::user()->id);
        return view('student.dashboard.passwordchange',compact('editData'));
    }
    public function passwordStore(Request $request){
        if(Auth::attempt(['id'=>Auth::user()->id,'password'=>$request->old_password])){
            $user=User::find(Auth::user()->id);
            $user->password=bcrypt($request->new_password);
            $user->save();
            return redirect()->route('student.dashboard');

    }else{
        return redirect()->back();
    }
 }
}

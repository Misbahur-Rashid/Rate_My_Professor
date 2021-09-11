<?php

namespace App\Http\Controllers\Admin;

use Image;
use App\User;
use App\Role;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class UserController extends Controller
{
    public function index()
    {
        Session::put('page', 'dashboard');
        $users = User::where('status', '1')->where('role_id', '!=', 3)->latest()->get();
        return view('admin.user.index', compact('users'));
    }



    public function add(Request $request, $id = null)
    {
        if ($id == '') {
            $title = 'user Create';
            $message = "User Information added Successfully";
            $user = new User;
            //    $this->validate($request,[
            //     'name'    => 'required|string|max:60',
            //     'email'   => 'required|string|email|max:60|unique:users',
            //     'phone'   => 'required|string|max:30',
            //     'password'=> 'required|string|min:6|confirmed',
            //     'role'    => 'required|integer',
            //     'image'   => 'required|mimes:jpeg,bmp,png',
            //       ]);
        } else {
            $title = 'user Updated';
            $message = "User Information Updated Successfully";
            $user = User::find($id);
        }
        if ($request->isMethod('post')) {
            $data = $request->all();
            //echo"<pre>"; print_r($data); die;

            // if(Hash::check($request->old_password,$user->password)){

            //     if($request->password){
            //         $this->validate($request,
            //         [
            //             'password'=> 'required|string|min:6|confirmed'
            //         ]);
            //         $password = Hash::make($request->password);
            //     }else{
            //         $password = $user->password;
            //     }
            // }else{
            //     Session::flash('error', 'Password did not match');
            //     return redirect()->back();
            // }


            // $this->validate($request,[
            //     'name'    => 'required|string|max:60',
            //     'email'   => 'required|string|email|max:60|unique:users',
            //     'phone'   => 'required|string|max:30',
            //     'password'=> 'required|string|min:6|confirmed',
            //     'role'    => 'required',

            //       ]);





            $slug = uniqid(10);
            $user->name = $data['name'];
            $user->email = $data['email'];
            $user->phone = $data['phone'];
            $user->password =
                Hash::make($data['password']);
            if ($request->hasFile('image')) {
                $image_tmp = $request->file('image');
                if ($image_tmp->isValid()) {
                    // Upload Images after Resize
                    $image_name = $image_tmp->getClientOriginalName();
                    $extension = $image_tmp->getClientOriginalExtension();
                    $imageName = $image_name . '-' . rand(111, 99999) . '.' . $extension;
                    $flygar_path_one = 'image/user/' . $imageName;
                    Image::make($image_tmp)->resize(300, 200)->save($flygar_path_one);
                    $user->image = $imageName;
                }
            }
            $user->slug = $slug;
            $user->role_id = $data['role'];
            $user->save();
            Session::flash('success', $message);
            return redirect('admin/get-users');
        }
        $roles = Role::where('status', 1)->get();
        return view('admin.user.create', compact('title', 'roles', 'user'));
    }


    public function destroy($id)
    {
        User::find($id)->delete();
        $message = "User Info Deleted Successfully";
        Session::flash('success', $message);
        return redirect('admin/get-users');
    }
}

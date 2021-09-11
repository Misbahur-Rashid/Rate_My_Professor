<?php

namespace App\Http\Controllers\Admin;

use Image;
use Session;
use App\User;
use App\Role;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Session::put('page','dashboard');
        $users=User::where('status','1')->latest()->get();
        return view('admin.user.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles=Role::all();

        return view('admin.user.create',compact('roles'));
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
            'name'    => 'required|string|max:60',
            'email'   => 'required|string|email|max:60|unique:users',
            'phone'   => 'required|string|max:30',
            'password'=> 'required|string|min:6|confirmed',
            'role'    => 'required|integer',
            'image'   => 'required|mimes:jpeg,bmp,png',
        ]);
       $slug=uniqid(10);
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
          }
        $user=new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->phone=$request->phone;
        $user->student_id=$request->student_id;
        $user->password=
        Hash::make($request->password);
        $user->image=$imageName;
        $user->slug = $slug;
        $user->role_id = $request->role;
        $create=$user->save();


        if ($create) {
            Session::flash('success','User Successfully created');
            return redirect()->route('admin.user');
        }else {
            Session::flash('error','User created failed!');
            return redirect()->route('admin.user');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $roles=Role::get();
        return view('admin.user.show', compact('user', 'roles'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles=Role::where('id','1')->active()->get();
        return view('admin.user.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->validate($request,
		[
			'name'    => 'required|string|max:60',
            'phone'   => 'required|string|max:30',
            'image'   => 'mimes:jpeg,bmp,png',
            'old_password'=> 'required|string|min:6',

        ]);

        if(Hash::check($request->old_password,$user->password)){

            if($request->password){
                $this->validate($request,
                [
                    'password'=> 'required|string|min:6|confirmed'
                ]);
                $password = Hash::make($request->password);
            }else{
                $password = $user->password;
            }

            $slug=uniqid(10);
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
            $user->name = $request->name;
            $user->phone = $request->phone;
            $user->password = $password;
            $user->image = $imageName;
            $user->slug = $slug;
            $update = $user->save();

            if($update){
                Session::flash('success', 'User Successfully updated');
                return redirect()->route('admin.user.index');
            }else{
                Session::flash('error', 'User updating failed');
                return redirect()->route('admin.user.index');
            }
        }else{
            Session::flash('error', 'Password did not match');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $delete = $user->delete();
        if($delete){
            Session::flash('success', 'User Successfully deleted');
            return redirect()->back();
        }else{
            Session::flash('error', 'User deleting failed');
            return redirect()->back();
        }
    }
}

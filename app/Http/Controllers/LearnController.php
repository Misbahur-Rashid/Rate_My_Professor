<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
class LearnController extends Controller
{
    public function viplogin(){
        return view('website.student.login');
    }
    public function vipsinup(){
        return view('website.student.register');
    }
public function emailverify(){
    return view('website.student.verify');
}
    public function storesinup(Request $request){
        if($request->isMethod('post')){
            $data=$request->all();
            $user = new User();
            //echo"<pre>"; print_r($data); die;


        $slug=uniqid(10);
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->phone = $data['phone'];
        $user->username = $data['username'];
        $user->address = $data['address'];
        if($request->hasFile('image')){
            $image_tmp = $request->file('image');
            if ($image_tmp->isValid()) {
                // Upload Images after Resize
                $image_name=$image_tmp->getClientOriginalName();
                $extension = $image_tmp->getClientOriginalExtension();
                $imageName =$image_name.'-'.rand(111,99999).'.'.$extension;
                $req_teacher = 'image/student/'.$imageName;
                Image::make($image_tmp)->resize(300,200)->save($req_teacher);
                $user['image'] = $imageName;
            }
        }

        $user->role_id='3';
        $user->status='1';
        $user->slug=$slug;
        $user->password=Hash::make($data['password']);
        $user->save();
        $message="Student Registration Successfully Created";
        Session::flash('success',$message);
        return redirect()->route('student.login');
        }

        return view('website.student.register');

    }

    // public function verifystore(Request $request){
    //     $this->validate($request, [
    // 		'code' => 'required',
    // 		'email' => 'required',
    //     ]);
    //     $checkData= User::where('email',$request->email)->where('code',$request->code)->first();
    //     if($checkData){
    //         $checkData->status='1';
    //         $checkData->save();
    //         return redirect()->route('student.login');

    //     }else{
    //         return redirect()->back()->with('error','sorry');
    //     }

    // }

    // public function loginstore(Request $request)
    // {
    // 	$this->validate($request, [
    // 		'email' => 'required',
    // 		'password' => 'required'
    // 	]);

    // 	$student = User::where('email', $request->email)->active()->first();
    // 	if($student){
    // 		if(Hash::check($request->password,$student->password)){
    //             $student->updated_at = Carbon::now()->toDateTimeString();
    //             $student->save();
    //             Session::put('role_id', $student->id);
	//         	Session::flash('success', 'Login Success');
	//         	return redirect()->route('student.dashboard');
	//     	}else{
	//     		Session::flash('error', 'Incorrect username or password.');
    //     		return redirect()->back();
	//     	}
    // 	}else{
    // 		Session::flash('error', 'Incorrect username or password.');
    //     	return redirect()->back();
    // 	}

    // }
}

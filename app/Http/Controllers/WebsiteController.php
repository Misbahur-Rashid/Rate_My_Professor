<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Department;
use App\FeedBack;
use App\Requestteacher;
use App\School;
use App\SiteSetting;
use App\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;
class WebsiteController extends Controller
{
    public function index(){

        $department=Department::where('status',1)->get();
        $school=School::where('status',1)->get();

        $data=SiteSetting::where('status',1)->first();
        //echo"<pre>"; print_r($data); die;
        return view('website.index',compact('data','department','school'));
    }
    public function element(){
        $department=Department::where('status',1)->get();
        return view('website.professor',compact('department'));
    }
    public function article(){
        return view('website.about');
    }
    public function contact(){
        return view('website.contact');
    }
    public function allTeacher(){
        return view('website.allteacher');
    }


    public function single($id){
        $getData=Teacher::with('department','school')->where('status',1)->where('id',$id)->first();

        $feedBackCount=FeedBack::with('uses')->where('teacher_id',$id)->sum('three_star');

        //$feedBackCountUser=FeedBack::with('uses')->where('teacher_id',$id)->count('user_id');
        //echo"<pre>"; print_r($feedBackCountUser); die;
        $feedAvg= $feedBackCount/5;
        //echo $feedAvg;die;
        $feedBackCheck=FeedBack::with('uses')->where('status',1)->where('teacher_id',$id)->get();
        //echo"<pre>"; print_r($feedBackCheck); die;

        if(isset(Auth::user()->id)){
            $id=$getData->id;
            $getFeedback=FeedBack::where('user_id',Auth::user()->id)->where('teacher_id',$id)->count();
            return view('website.single',compact('getData','getFeedback','feedBackCheck','feedAvg','feedBackCount'));
        }else{
            return view('website.single',compact('getData','feedBackCheck','feedAvg','feedBackCount'));

        }

        //echo"<pre>"; print_r($getFeedback); die;

        //echo"<pre>"; print_r($feedBackCheck); die;

    }

    public function addContact(Request $request){
        if($request->isMethod('post')){
            $this->validate($request,[
                'name'=>'required',
                'email'=>'required',
                'phone'=>'required|min:11|numeric',
                'subject'=>'required|max:20',
                'message'=>'required|max:150',
            ]);
            $contact=new Contact;
            $data=$request->all();
            //echo"<pre>"; print_r($data); die;
            $contact->name=$data['name'];
            $contact->email=$data['email'];
            $contact->phone=$data['phone'];
            $contact->subject=$data['subject'];
            $contact->message=$data['message'];
            $contact->status=0;
            $contact->save();
            $message="Thanks for Your Contact";
            Session::flash('success',$message);
            return redirect()->back();
        }
        return view('website.contact');

    }

    public function addTeacher(Request $request){
        $this->validate($request,
        [
            'name'=>'required',
            'cv'=>'required|mimes:pdf|max:10000',
            'photo'=>'required|mimes:png,jpg,jpeg',
        ]);
        $teacher=new Requestteacher();
        if($request->isMethod('post')){
            $data=$request->all();
            //echo"<pre>"; print_r($data); die;
            $teacher->name=$data['name'];
            $teacher->lastname=$data['lastname'];
            $teacher->department_id=$data['department_id'];
            $teacher->job_type=$data['job_type'];
            $teacher->detail=$data['detail'];
            if($request->hasFile('photo')){
                $image_tmp = $request->file('photo');
                if ($image_tmp->isValid()) {
                    // Upload Images after Resize
                    $image_name=$image_tmp->getClientOriginalName();
                    $extension = $image_tmp->getClientOriginalExtension();
                    $imageName =$image_name.'-'.rand(111,99999).'.'.$extension;
                    $req_teacher = 'image/req_teacher/'.$imageName;
                    Image::make($image_tmp)->resize(300,200)->save($req_teacher);
                    $teacher->photo = $imageName;
                }
            }

            if($request->hasFile('cv')){
                $file=$request->file('cv');
                $fileName=time().'.'.$file->getClientOriginalExtension();
                $request->cv->move('image/pdf/',$fileName);
                $teacher->cv = $fileName;
              }

              $teacher->save();
              $message="Request Teacher Send Successfully";
              Session::flash('success',$message);
              return redirect()->back();
        }
        return view('website.professor');

    }

    public function search(Request $request){
        $data['department']=Department::where('status',1)->get();
        $data['school']=School::where('status',1)->get();
        $data['department_id']=$request->department_id;
        $data['school_id']=$request->school_id;
        $data['search']=$request->search;
       if(isset($request->school_id) && isset($request->department_id)){
               $data['alldata']=Teacher::where('school_id',$request->school_id)->where('department_id',$request->department_id)->get();
               return view('website.allteacher',$data);
        }elseif(!empty($request->school_id) && !empty($request->department_id) && !empty($request->search)){
            $data['alldata']=Teacher::where('name',$request->search)
        ->where('school_id',$request->school_id)->where('department_id',$request->department_id)->get();
           return view('website.allteacher',$data);

        }else{
            echo  "I have Got Your Ip: ".$request->ip();
        }


        }
}

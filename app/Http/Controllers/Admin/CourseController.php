<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use App\Course;
use App\Program;
class CourseController extends Controller
{
    public function index(){
        Session::put('page','dashboard');
        $courses=Course::where('status',1)->get();
        //dd($courses);die;
        return view('admin.course.index',compact('courses'));
    }
    public function addedit(Request $request,$id=null){
        if($id==''){
            $title='Course Create';
            $message="Course Information added Successfully";
            $course=new Course;
        }else{
             $title='Course Updated';
            $message="Course Information Updated Successfully";
            $course=Course::find($id);
        }
        if($request->isMethod('post')){
            $data=$request->all();
            $course->course_id=$data['course_id'];
            $course->course_name=$data['course_name'];
            $course->credit=$data['credit'];
            $course->program_id=$data['program_id'];
            $course->save();
            Session::flash('success',$message);
            return redirect('admin/get-course');
        }
        $program=Program::where('status',1)->get();
        return view('admin.course.create',compact('title','course','program'));
    }
    public function delete($id){
        Course::find($id)->delete();
        $message="Course Information Successfully deleted";
        Session::flash('success',$message);
        return redirect('admin/get-course');
    }
}

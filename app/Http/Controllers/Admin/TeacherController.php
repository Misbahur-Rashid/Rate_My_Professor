<?php

namespace App\Http\Controllers\Admin;

use App\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\School;
use App\Teacher;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class TeacherController extends Controller
{
    public function index()
    {
        Session::put('page', 'dashboard');
        $data = Teacher::where('status', 1)->get();
        return view('admin.teacher.index', compact('data'));
    }
    public function addEdit(Request $request, $id = null)
    {
        if ($id == "") {
            $title = "Teacher created Page";
            $message = "Teacher created successfully";
            $teacher = new Teacher();
        } else {
            $title = "Teacher update Page";
            $message = "Teacher update successfully";
            $teacher = Teacher::find($id);
        }
        if ($request->isMethod('post')) {
            $data = $request->all();
            $this->validate(
                $request,
                [
                    'name' => 'required',
                ]
            );
            $teacher->name = $data['name'];
            $teacher->email = $data['email'];
            $teacher->phone = $data['phone'];
            $teacher->job_title = $data['job_title'];
            $teacher->text = $data['text'];
            $teacher->classes = $data['classes'];
            if ($request->hasFile('logo')) {
                $image_tmp = $request->file('logo');
                if ($image_tmp->isValid()) {
                    // Upload Images after Resize
                    $image_name = $image_tmp->getClientOriginalName();
                    $extension = $image_tmp->getClientOriginalExtension();
                    $imageName = $image_name . '-' . rand(111, 99999) . '.' . $extension;
                    $teacher_path_one = 'image/teacher/' . $imageName;
                    Image::make($image_tmp)->resize(139, 142)->save($teacher_path_one);
                    $teacher->logo = $imageName;
                }
            }
            $teacher->department_id = $data['department_id'];
            $teacher->school_id = $data['school_id'];
            $teacher->save();
            Session::flash('success', $message);
            return redirect('admin/get-teacher');
        }
        $department = Department::where('status', 1)->get();
        $school = School::where('status', 1)->get();
        return view('admin.teacher.create', compact('title', 'department', 'school', 'teacher'));
    }
    public function delete($id)
    {
        Teacher::where('status', 1)->find($id)->delete();
        return redirect('admin/get-teacher');
    }
}

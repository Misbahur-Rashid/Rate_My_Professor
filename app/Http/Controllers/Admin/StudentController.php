<?php

namespace App\Http\Controllers\Admin;

use Session;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentController extends Controller
{
    public function index()
    {
        Session::put('page', 'dashboard');
        $students = User::where('role_id', '3')->where('status', '1')->get();
        return view('admin.student.index', compact('students'));
    }
    public function show($id)
    {
        $student = User::find($id);
        return view('admin.student.show', compact('student'));
    }
    public function destroy($id)
    {
        User::where('role_id', 3)->find($id)->delete();
        return redirect()->back();
    }
}

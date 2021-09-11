<?php

namespace App\Http\Controllers\Admin;
use Session;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index(){
        Session::put('page','dashboard');

        $counts=User::where('status',1)->get()->toArray();
      
        return view('admin.dashboard.index',compact('counts'));
    }
    public function login(){
        return view('admin.login.login');
    }
}

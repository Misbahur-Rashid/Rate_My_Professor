<?php

namespace App\Http\Controllers\VC;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;

class VCController extends Controller
{
    public function index(){
        Session::put('page','dashboard');
        dd('ok');
      
        return view('admin.dashboard.index');
    }
}

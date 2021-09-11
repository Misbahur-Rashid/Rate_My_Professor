<?php

use App\SiteSetting;

$getSetting = SiteSetting::getSetting();
//echo"<pre>"; print_r($getSetting); die;
?>
<header class="header">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light myNav">
            <a class="navbar-brand" href="{{url('/')}}"><img src="{{url('image/site/'.$getSetting->logo)}}"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"></button>
            <!-- <button>
                <span class="navbar-toggler-icon"></span>
            </button>  -->
            <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="{{url('/')}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url('/about')}}">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url('/professor')}}">Request to add a new Lecturer</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url('/contact')}}">Contact Us</a>
                    </li>
                    <li class="nav-item">
                        @guest
                        <a href="{{url('/student/login')}}">Sign IN/Sign UP</a>
                        @else
                        <a href="{{url('student/dashboard')}}">Dashboard</a>
                        @endguest

                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>
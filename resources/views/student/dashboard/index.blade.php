@extends('layouts.website.website')
@section('title', 'Dashboard')
@section('content')

<style type="text/css">
    .prof li{
        background-color: darkorange;
        padding: 7px;
        margin: 4px;
        border-radius: 15px;
        list-style-type: none;
        width: 175px;
    }
    .prof li a{
        padding-left: 15px;
    }
    .prom{
        padding-left: 30px;
        margin-bottom: 40px;
        }
</style>

<section style="padding-left: 50px">
    <div class="col-lg-3 col-md-4 col-xs-12 align-self-center">
        <h5 class="font-medium text-uppercase mb-0">User Name : <strong style="color: hotpink;font-weight:700">{{ Auth::user()->name }}</strong></h5>
        <h5 class="font-medium text-uppercase mb-0">UserType : <strong style="color: hotpink;font-weight:700">{{ $user->role->role_name }}</strong></h5>
    </div>
</section>
<section id="user_dashboard_main_section">
    <div class="container">
        <div class="row" style="padding: 15px 0px 15px 0px">
            <div class="col-xl-2 col-md-2">
                <ul class="prof">
                    <li class=""><a href="{{url('student/dashboard')}}"><i class="fas fa-home"></i> My Profile</a></li>
                    <li class=""><a href="{{ url('student/student-password-change') }}"><i class="fas fa-cog"></i> Password Change</a></li>
                    <li> <a style="font-size:15px;color:black;font-weight:600" href="{{ route('logout') }}"onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        <i class="mdi mdi-power"></i><span class="hide-menu">logout</span></a>
                      </li>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          @csrf
                    </form>
                </ul>
            </div>
            <div class="col-md-10">
                <div class="row">
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body prom">
                                <div class="img-circle">
                                    <img src="{{ asset('image/user/') }}/{{ $user->image }}" alt="">
                                    <h3 class="">Name: <strong style="color: darkorange;font-size:15px"> {{$user->name }}</strong></h3>
                                    <div class="cont">
                                        <h4>Email: <strong style="color: darkorange;font-size:15px"> {{$user->email }}</strong></h4>
                                    </div>
                                </div>
                                <div class="">
                                    <h4>Number:<strong style="color: darkorange;font-size:15px"> {{$user->phone }}</strong></h4>
                                </div>
                                <div class="">
                                    <h4>Address: <strong style="color: darkorange;font-size:15px"> {{$user->address }}</strong></h4>
                                </div>
                                <a class="btn btn-primary btn-sm" href="{{ url('student/student-edit-pro') }}"> edit Profile</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection

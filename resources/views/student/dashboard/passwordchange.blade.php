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
    .update{
        position: relative;
        top: -41px;
    left: 58px;
    }
</style>

<section style="padding-left: 50px">
    <div class="col-lg-3 col-md-4 col-xs-12 align-self-center">
        <h5 class="font-medium text-uppercase mb-0">User Name : <strong style="color: hotpink;font-weight:700">{{ Auth::user()->name }}</strong></h5>
        <h5 class="font-medium text-uppercase mb-0">UserType : <strong style="color: hotpink;font-weight:700">{{ $editData->role->role_name }}</strong></h5>
    </div>
</section>
<section id="user_dashboard_main_section">
    <div class="container">
        <div class="row" style="padding: 15px 0px 15px 0px">
            <div class="col-xl-2 col-md-2">
                <ul class="prof">
                    <li class=""><a href="{{ url('student/dashboard') }}"><i class="fas fa-home"></i> My Profile</a></li>

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
            <form action="{{ url('student/student-password-update') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="update">
                    <h2> Password Change</h2>
                    <div class="form-group">
                        <label>Old Password</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon33"><i class="ti-lock"></i></span>
                            </div>
                            <input type="password" class="form-control" placeholder="Old Password" name="old_password">

                            @if ($errors->has('old_password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('old_password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label>New Password</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon33"><i class="ti-lock"></i></span>
                            </div>
                            <input type="password" class="form-control" placeholder="Password" name="new_password">

                            @if ($errors->has('new_password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('new_password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Confirm Password</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon4"><i class="ti-lock"></i></span>
                            </div>
                            <input type="password" class="form-control" placeholder="Confirm Password" aria-label="Password" name="password_confirmation">
                        </div>
                    </div>
                    <div class="form-group">
                       <input type="submit" value="update" class="btn btn-primary btn-sm">
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
</section>
@endsection


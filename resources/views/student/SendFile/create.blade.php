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
        width: 130px;
    }
    .prof li a{
        padding-left: 15px;
    }
    .prom{
    margin-left: 349px;
    margin-top: -105px;
    margin-bottom: 117px;

    }
    .update{
        position: relative;
        top: -137px;
        left: 240px;
    }
</style>

<section style="padding-left: 50px">
    <div class="col-lg-3 col-md-4 col-xs-12 align-self-center">
        <h5 class="font-medium text-uppercase mb-0">User Name : <strong style="color: hotpink;font-weight:700">{{ Auth::user()->name }}</strong></h5>
        <h5 class="font-medium text-uppercase mb-0">UserType : <strong style="color: hotpink;font-weight:700">{{ Auth::user()->role->role_name }}</strong></h5>
    </div>
</section>
<section id="user_dashboard_main_section">
    <div class="container">
        <div class="row" style="padding: 15px 0px 15px 0px">
            <div class="col-xl-2 col-md-2">
                <ul class="prof">
                    <li class=""><a href="{{url('student/dashboard')}}"><i class="fas fa-home"></i> My Profile</a></li>
                    <li class=""><a href="{{url('student/student-index')}}"><i class="fas fa-shopping-cart"></i>Send Jurnal</a></li>
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
                <form action="{{ url('student/student-store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="update">
                        <h2>SEND File</h2>
                        <div class="form-group">
                            <label>Jernal Name</label>
                            <select class="form-control custom-select" name="jernal_id">
                                <option>Select jernal</option>
                                @foreach($jernals as $jernal)
                                <option value="{{$jernal->id}}">{{$jernal->jernal_name}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('jernal_id'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('jernal_id') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <div class="input-group mb-3">
                                <textarea name="description" id="" cols="80" rows="5" value="{{old('description')}}"></textarea>

                                @if ($errors->has('description'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" name="image" class="form-control">
                            @if ($errors->has('image'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('image') }}</strong>
                            </span>
                        @endif
                        </div>
                        <div class="form-group">
                            <label>File</label>
                            <input type="file" name="file" class="form-control">
                            @if ($errors->has('file'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('file') }}</strong>
                            </span>
                        @endif
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-success mr-2">SEND FILE</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection

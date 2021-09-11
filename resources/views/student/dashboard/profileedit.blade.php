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
            <form action="{{ url('student/student-edit-profile') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-4 update">
                        <label>Full Name</label>
                        <input type="text" name="name" value="{{ $editData->name}}" class="form-control">
                        @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="col-md-4 update">
                        <label>Email</label>
                        <input type="email" name="email" value="{{ $editData->email}}" class="form-control">

                        @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                    </div>
                    <div class="col-md-4 update">
                        <label>Phone</label>
                        <input type="text" name="phone" value="{{ $editData->phone}}" class="form-control">
                        @if ($errors->has('phone'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('phone') }}</strong>
                        </span>
                    @endif
                    </div>
                    <div class="col-md-4 update">
                        <label>Address</label>
                        <input type="text" name="address" value="{{ $editData->address}}" class="form-control">
                    </div>
                    <div class="col-md-4 update">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control" id="image">
                    </div>
                    <div class="col-md-2 update">
                        @if(!empty($editData->image))
                        <img src="{{url('image/student/'.$editData->image)}}" alt="" id="showImage" style="width: 60px;height: 40px;position: relative;top: 80px;left: -90px;">
                        @endif
                    </div>
                    <div class="col-md-4 update">
                       <button type="submit" class="btn btn-success">Profile Update</button>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
</section>
@endsection
@push('js')
<script type="text/javascript">
$(document).ready(function(){
    $('#image').change(function(e){
        var reader = new FileReader();
        reader.onload=function(e){
            $('#showImage').attr('src,e.target.result');
        }
        reader.readAsDataURL(e.target.files['0']);

    });

});

</script>

@endpush

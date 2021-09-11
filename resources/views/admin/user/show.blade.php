@extends('layouts.admin_layout.admin_layout')
@section('title', $user->name)
@section('content')
    <!-- Bread crumb and right sidebar toggle -->

    @component('admin.dashboard.breadcumb')
    <li class="breadcrumb-item"><a href="{{url('admin/user')}}">Users</a></li>
    <li class="breadcrumb-item active" aria-current="page">Show</li>
    @endcomponent

    <!-- End Bread crumb and right sidebar toggle -->
    <div class="page-content container-fluid">
        <!-- Start Page Content -->
        <!-- Row -->
        <div class="row">
            <!-- Column -->
            <div class="col-lg-4 col-xlg-3 col-md-5">
                <div class="card">
                    <div class="card-body">
                        <center class="mt-4"> <img src="{{asset('image/user/')}}/{{$user->image}}" class="rounded-circle" width="150" />
                            <h4 class="card-title mt-2">{{$user->name}}</h4>
                            <h6 class="card-subtitle">{{$user->role->name}}</h6>
                        </center>
                    </div>
                    <div>
                        <hr> </div>
                    <div class="card-body">
                        <small class="text-muted">Email address </small>
                        <h6>{{$user->email}}</h6>
                        <small class="text-muted pt-4 db">Phone</small>
                        <h6>{{$user->phone}}</h6>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-8 col-xlg-9 col-md-7">
                <div class="card">
                    <div class="card-body">
                        <form class="form-horizontal form-material"action="{{url('admin/user/'. $user->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')

                            <div class="form-group">
                                <label class="col-md-12">Name</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control form-control-line" name="name" value="{{$user->name}}">

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="example-email" class="col-md-12">Email</label>
                                <div class="col-md-12">
                                    <input type="email"class="form-control form-control-line" name="email" value="{{$user->email}}" disabled>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12">Phone No</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control form-control-line" name="phone" value="{{$user->phone}}">
                                </div>

                                @if ($errors->has('phone'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label class="col-md-12">Old Password</label>
                                <div class="col-md-12">
                                    <input type="password" name="old_password" class="form-control form-control-line">

                                    @if ($errors->has('old_password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('old_password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12">New Password</label>
                                <div class="col-md-12">
                                    <input type="password" name="password" class="form-control form-control-line">

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12">Confirm Password</label>
                                <div class="col-md-12">
                                    <input type="password" name="password_confirmation" class="form-control form-control-line">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12">Photo</label>
                                <div class="col-md-12">
                                    <div class="custom-file mb-3">
                                        <input type="file" name="image" class="custom-file-input" id="customFile">
                                        <label class="custom-file-label form-control" for="customFile">{{$user->image}}</label>

                                        @if ($errors->has('image'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('image') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-12">User Role</label>
                                <div class="col-sm-12">
                                    <select class="form-control form-control-line" name="role">
                                        <option>Select Role</option>
                                        @foreach($roles as $role)
                                        <option value="{{$role->id}}" {{$role->id == $user->role->id ? 'selected' : ''}}>{{$role->role_name}}</option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('role'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('role') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-success">Update Profile</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Column -->
        </div>
        <!-- Row -->
    </div>
@endsection

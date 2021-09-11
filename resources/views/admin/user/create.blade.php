@extends('layouts.admin_layout.admin_layout')
@section('title', 'User Create')

@section('content')
    <!-- Bread crumb and right sidebar toggle -->

    @component('admin.dashboard.breadcumb')
    <li class="breadcrumb-item"><a href="{{url('admin/get-users')}}">User</a></li>
    <li class="breadcrumb-item active" aria-current="page">Create</li>
    @endcomponent

    <!-- End Bread crumb and right sidebar toggle -->
    <div class="page-content container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
						<div class="pull-left">
							<h6 class="card-title mt-1">{{$title}}</h6>
						</div>
						<div class="pull-right">
                            <a href="{{url('/admin/get-users')}}" class="btn btn-outline-info btn-sm"><i class="mdi mdi-arrow-left"></i> Back</a>
						</div>
					</div>
                    <div class="card-body">
                        <form class="form pt-3" method="post" @if(empty($user->id)) action="{{url('admin/get-user-added')}}" @else action="{{url('admin/get-user-added/'.$user->id)}}" @endif enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label>Name</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon11"><i class="ti-user"></i></span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Name" name="name" @if(empty($user->id))value="{{old('name')}}" @else value="{{$user->name}}" @endif >

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon22"><i class="ti-email"></i></span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Email" name="email" @if(empty($user->id))value="{{old('email')}}" @else value="{{$user->email}}" readonly @endif>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Phone</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon11"><i class="ti-user"></i></span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="phone" name="phone" @if(empty($user->id))value="{{old('phone')}}" @else value="{{$user->phone}}" @endif>

                                    @if ($errors->has('phone'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('phone') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            @if(empty($user->password))
                            <div class="form-group">
                                <label>Password</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon33"><i class="ti-lock"></i></span>
                                    </div>
                                    <input type="password" class="form-control" placeholder="Password" name="password">

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            @else

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
                                    <input type="password" class="form-control" placeholder="Password" name="password">

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
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
                            @endif
                            <div class="form-group">
                                <label>Photo</label>
                                <div class="custom-file mb-3">
                                    <input type="file" name="image" class="custom-file-input" id="customFile">
                                     {{-- @if(!empty(Auth::user()->image))
                                    <a href="">view iamge</a>
                                    <input type="hidden" name="current_user_image" value="{{ Auth::user()->image }}">
                                    @endif --}}
                                    <label class="custom-file-label form-control" for="customFile">Choose file</label>
                                    @if ($errors->has('image'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('image') }}</strong>
                                        </span>
                                    @endif
                                    @if(isset($user->id))
                                    <img src="{{url('image/user/'.$user->image)}}" alt="" width="50" height="20">
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label>User Role</label>
                                <select class="form-control custom-select" name="role">
                                    <option>Select Role</option>
                                    @foreach($roles as $role)
                                    <option value="{{$role->id}}" @if(!empty($user->role_id) && $user->role_id == $role->id) selected @endif>{{$role->role_name}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('role'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('role') }}</strong>
                                    </span>
                                @endif
                              </div>
                              </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-success mr-2">@if(empty($user->id))Create @else Update @endif</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection

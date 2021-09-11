@extends('layouts.admin_layout.admin_layout')
@section('title', 'Teacher Create')

@section('content')
    <!-- Bread crumb and right sidebar toggle -->

    @component('admin.dashboard.breadcumb')
    <li class="breadcrumb-item"><a >{{$title}}</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{$title}}</li>
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
                            <a href="{{url('/admin/get-teacher')}}" class="btn btn-outline-info btn-sm"><i class="mdi mdi-arrow-left"></i> Back</a>
						</div>
					</div>
                    <div class="card-body">
                        <form class="form pt-3" method="post" @if(empty($teacher->id)) action="{{url('admin/get-role-teacher-added')}}" @else action="{{url('admin/get-role-teacher-added/'.$teacher->id)}}" @endif enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Name:</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon11"><i class="ti-user"></i></span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Type name" name="name" @if(empty($teacher->id))value="{{old('name')}}" @else value="{{$teacher->name}}" @endif >

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email:</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon22"><i class="ti-email"></i></span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Type Title" name="email" @if(empty($teacher->id))value="{{old('email')}}" @else value="{{$teacher->email}}" readonly @endif>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Phone:</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon11"><i class="ti-user"></i></span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Type Phone" name="phone" @if(empty($teacher->id))value="{{old('phone')}}" @else value="{{$teacher->phone}}" @endif>

                                    @if ($errors->has('phone'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('phone') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Job Title:</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon11"><i class="ti-user"></i></span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Type Job Title" name="job_title" @if(empty($teacher->id))value="{{old('job_title')}}" @else value="{{$teacher->job_title}}" @endif>


                                    @if ($errors->has('job_title'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('job_title') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="exampleInputEmail1">Classes:</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon11"><i class="ti-user"></i></span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Type Job Title" name="classes" @if(empty($teacher->id))value="{{old('classes')}}" @else value="{{$teacher->classes}}" @endif>
                                    @if ($errors->has('job_title'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('job_title') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>



                            <div class="form-group">
                                <label for="exampleInputEmail1">Job Title:</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon11"><i class="ti-user"></i></span>
                                    </div>
                                    <textarea name="text" class="form-control" rows="4">@if(empty($teacher->id))value="{{old('text')}}" @else value="{{$teacher->text}}" @endif</textarea>
                                    @if ($errors->has('job_title'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('job_title') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>



                            <div class="form-group">
                                <label>Department</label>
                                <select class="form-control custom-select" name="department_id">
                                    <option>Select Department</option>
                                    @foreach($department as $role)
                                    <option value="{{$role->id}}" @if(!empty($teacher->department_id) && ($teacher->department_id == $role->id)) selected @endif>{{$role->name}}</option>
                                    @endforeach
                                </select>
                                    @if ($errors->has('department_id'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('department_id') }}</strong>
                                        </span>
                                    @endif
                              </div>

                              <div class="form-group">
                                <label>School</label>
                                <select class="form-control custom-select" name="school_id">
                                    <option>Select School</option>
                                    @foreach($school as $role)
                                    <option value="{{$role->id}}" @if(!empty($teacher->school_id) && ($teacher->department_id == $role->id)) selected @endif>{{$role->name}}</option>
                                    @endforeach
                                </select>
                                    @if ($errors->has('school_id'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('school_id') }}</strong>
                                        </span>
                                    @endif
                              </div>

                            <div class="form-group">
                                <label>Photo</label>
                                <div class="custom-file mb-3">
                                    <input type="file" name="logo" class="custom-file-input" id="customFile">
                                    <label class="custom-file-label form-control" for="customFile">Choose file</label>
                                    @if ($errors->has('logo'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('logo') }}</strong>
                                        </span>
                                    @endif
                                    @if(isset($teacher->id))
                                    <img src="{{url('image/teacher/'.$teacher->logo)}}" alt="" width="50" height="20">
                                    @endif
                                </div>
                            </div>


                        </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-success mr-2">@if(empty($teacher->id))Create @else Update @endif</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection

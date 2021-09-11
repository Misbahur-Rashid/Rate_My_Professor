@extends('layouts.admin_layout.admin_layout')
@section('title', 'Site Setting Create')

@section('content')
    <!-- Bread crumb and right sidebar toggle -->

    @component('admin.dashboard.breadcumb')
    <li class="breadcrumb-item"><a href="{{url('admin/get-users')}}">{{$title}}</a></li>
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
                            <a href="{{url('/admin/get-sitesetting')}}" class="btn btn-outline-info btn-sm"><i class="mdi mdi-arrow-left"></i> Back</a>
						</div>
					</div>
                    <div class="card-body">
                        <form class="form pt-3" method="post" @if(empty($site->id)) action="{{url('admin/get-role-sitesetting-added')}}" @else action="{{url('admin/get-role-sitesetting-added/'.$site->id)}}" @endif enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Title Name:(Home Page)</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon11"><i class="ti-user"></i></span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Type Title" name="title_h" @if(empty($site->id))value="{{old('title_h')}}" @else value="{{$site->title_h}}" @endif >

                                    @if ($errors->has('title_h'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('title_h') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Title Name:(About page)</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon22"><i class="ti-email"></i></span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Type Title" name="title_a" @if(empty($site->id))value="{{old('title_a')}}" @else value="{{$site->title_a}}" readonly @endif>

                                    @if ($errors->has('title_a'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('title_a') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Title Name:(Contact Page)</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon11"><i class="ti-user"></i></span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Type Title" name="title_c" @if(empty($site->id))value="{{old('title_c')}}" @else value="{{$site->title_c}}" @endif>

                                    @if ($errors->has('phone'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('phone') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Description Name:(Home Page)</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon11"><i class="ti-user"></i></span>
                                    </div>
                                    <textarea name="description_h" class="form-control" rows="4">@if(empty($site->id)){{old('description_h')}} @else value="{{$site->description_h}}"@endif</textarea>

                                    @if ($errors->has('description'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Description Name:(About Page)</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon11"><i class="ti-user"></i></span>
                                    </div>
                                    <textarea name="description_a" class="form-control" rows="4">@if(empty($site->id)){{old('description_a')}} @else value="{{$site->description_a}}"@endif</textarea>

                                    @if ($errors->has('description'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Description Name:(Contact Page)</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon11"><i class="ti-user"></i></span>
                                    </div>
                                    <textarea name="description_c" class="form-control" rows="4"> @if(empty($site->id)){{old('description_c')}} @else value="{{$site->description_c}}"@endif</textarea>

                                    @if ($errors->has('description'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>



                            <div class="form-group">
                                <label>Photo</label>
                                <div class="custom-file mb-3">
                                    <input type="file" name="logo" class="custom-file-input" id="customFile">
                                     {{-- @if(!empty(Auth::user()->image))
                                    <a href="">view iamge</a>
                                    <input type="hidden" name="current_user_image" value="{{ Auth::user()->image }}">
                                    @endif --}}
                                    <label class="custom-file-label form-control" for="customFile">Choose file</label>
                                    @if ($errors->has('logo'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('logo') }}</strong>
                                        </span>
                                    @endif
                                    @if(isset($site->id))
                                    <img src="{{url('image/site/'.$site->logo)}}" alt="" width="50" height="20">
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Banner:(About Page)</label>
                                <div class="custom-file mb-3">
                                    <input type="file" name="banner_a" class="custom-file-input" id="customFile">
                                     {{-- @if(!empty(Auth::user()->image))
                                    <a href="">view iamge</a>
                                    <input type="hidden" name="current_user_image" value="{{ Auth::user()->image }}">
                                    @endif --}}
                                    <label class="custom-file-label form-control" for="customFile">Choose file</label>
                                    @if ($errors->has('banner_a'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('banner_a') }}</strong>
                                        </span>
                                    @endif
                                    @if(isset($site->id))
                                    <img src="{{url('image/site/banner'.$site->banner_a)}}" alt="" width="50" height="20">
                                    @endif
                                </div>
                            </div>
                        </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-success mr-2">@if(empty($site->id))Create @else Update @endif</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection

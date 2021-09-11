@extends('layouts.admin_layout.admin_layout')
@section('title', 'Course Create')

@section('content')
    <!-- Bread crumb and right sidebar toggle -->

    @component('admin.dashboard.breadcumb')
    <li class="breadcrumb-item"><a href="{{url('admin/course')}}">Course</a></li>
    <li class="breadcrumb-item active" aria-current="page">Create</li>
    @endcomponent

     <!-- End Bread crumb and right sidebar toggle -->
     <div class="page-content container-fluid">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="material-card card">
                    <div class="card-header">
						<div class="pull-left">
							<h6 class="card-title mt-1">{{ $title }}</h6>
						</div>
						<div class="pull-right">
                            <a href="{{url('/admin/get-role')}}" class="btn btn-outline-info btn-sm"><i class="mdi mdi-arrow-left"></i> Back</a>
						</div>
					</div>
                    <div class="card-body">
                        <form class="form pt-3" method="post" @if(empty($role->id))action="{{url('admin/get-role-post-added')}}" @else action="{{url('admin/get-role-post-added/'.$role->id)}}"@endif>
                            @csrf
                            <div class="form-group">
                                <label>Role Name</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="role name" name="role_name" value="{{$role->role_name}}">

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-success mr-2">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
<script src="{{asset('contents/admin/assets/libs/tinymce/tinymce.min.js')}}"></script>
@endpush

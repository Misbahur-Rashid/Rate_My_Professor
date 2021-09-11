@extends('layouts.admin_layout.admin_layout')
@section('title', $user->name)
@section('content')
    <!-- Bread crumb and right sidebar toggle -->

    @component('admin.dashboard.breadcumb')
    <li class="breadcrumb-item">Recycle</li>
    <li class="breadcrumb-item"><a href="{{url('admin/recycle/user')}}">Users</a></li>
    <li class="breadcrumb-item active" aria-current="page">Show</li>
    @endcomponent

    <!-- End Bread crumb and right sidebar toggle -->
    <div class="page-content container-fluid">
        <!-- Start Page Content -->
        <!-- Row -->
        <div class="row justify-content-center">
            <!-- Column -->
            <div class="col-lg-6 col-xlg-3 col-md-5">
                <div class="card">
                    <div class="card-header">
                        <div class="pull-left">
                            <h6 class="card-title mt-1">{{$user->name}}</h6>
                        </div>
                        <div class="pull-right">
                            <a href="{{url('/admin/recycle/user')}}" class="btn btn-outline-info btn-sm"><i class="mdi mdi-arrow-left"></i> Back</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <center class="mt-4"> <img src="{{asset('image/user')}}/{{$user->image}}" class="rounded-circle" width="150" />
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
        </div>
        <!-- Row -->
    </div>
@endsection

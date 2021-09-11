@extends('layouts.admin_layout.admin_layout')
@section('title', 'Recycle Banner')
@section('content')
    <!-- Bread crumb and right sidebar toggle -->

    @component('admin.dashboard.breadcumb')
    <li class="breadcrumb-item"><a href="{{url('admin/banners')}}">Recycle Banner</a></li>
    <li class="breadcrumb-item active" aria-current="page">Show</li>
    @endcomponent

    <!-- End Bread crumb and right sidebar toggle -->
    <div class="page-content container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="material-card card">
                    <div class="card-header">
                        <div class="pull-left">
                            <h6 class="card-title mt-1">Banners Information</h6>
                        </div>
                        <div class="pull-right">
                            <a href="{{url('/admin/recycle/banners')}}" class="btn btn-outline-info btn-sm"><i class="mdi mdi-arrow-left"></i> Back</a>
                        </div>
                    </div>
                    <div class="card-body">
                         <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="white-box text-center">
                                    <img src="{{asset('storage/banners/'.$banner->image)}}" class="img-fluid">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 pt-3">
                                <h3 class="card-title">{{$banner->title}}</h3>
                                <p>{{$banner->subtitle}}</p>
                                <a target="_blank" href="{{$banner->btn_url}}"><button class="btn btn-primary btn-rounded"> {{$banner->btn_text}} </button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

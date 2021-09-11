@extends('layouts.admin_layout.admin_layout')
@section('title', $product->name)
@section('content')
    <!-- Bread crumb and right sidebar toggle -->
    @component('admin.dashboard.breadcumb')
    <li class="breadcrumb-item"><a href="{{url('admin/products')}}">Products</a></li>
    <li class="breadcrumb-item active" aria-current="page">Show</li>
    @endcomponent
    <!-- End Bread crumb and right sidebar toggle -->

    <!-- Start Page Content -->
    <div class="page-content container-fluid">
        <!-- Start Page Content -->
        <div class="row">
            <!-- Column -->
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="pull-left">
                            <h6 class="card-title mt-1">Product Information</h6>
                        </div>
                        <div class="pull-right">
                            <a href="{{url('/admin/products')}}" class="btn btn-outline-info btn-sm"><i class="mdi mdi-arrow-left"></i> Back</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-6">
                                <div class="white-box text-center"> <img src="{{asset('images/admin_images/admin_gallary/'.$product->image)}}" class="img-responsive" width="250"> </div>
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-6 pl-4">
                                <h3 class="card-title">{{$product->name}}</h3>
                                <p>{{$product->description}}</p>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <h3 class="box-title mt-5">General Info</h3>
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td>Status</td>
                                                @if($product->status ==1)
                                                <td> <span class="badge badge-success badge-pill">Published </span></td>
                                                @else
                                                <td> <span class="badge badge-warning badge-pill">UNPublished </span></td>
                                                @endif
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
        </div>
        <!-- End Page Content -->
    </div>
@endsection

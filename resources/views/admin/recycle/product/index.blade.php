@extends('layouts.admin')
@section('title', 'Recycle Products')
@section('content')
    <!-- Bread crumb and right sidebar toggle -->
    @component('admin.dashboard.breadcumb')
    <li class="breadcrumb-item"><a href="{{url('admin/recycle/products')}}">Recyle Products</a></li>
    @endcomponent
    <!-- End Bread crumb and right sidebar toggle -->

    <!-- Start Page Content -->
    <div class="page-content container-fluid">
        <!-- Start Page Content -->
        <div class="row el-element-overlay">
            @forelse($products as $product)
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="el-card-item">
                        <div class="el-card-avatar el-overlay-1"> 
                            <img src="{{asset('storage/products/'. $product->image)}}" alt="user">
                            <div class="el-overlay">
                                <ul class="list-style-none el-info">
                                    <li class="el-item"><a class="btn default btn-outline image-popup-vertical-fit el-link" href="{{url('admin/recycle/products/'.$product->id)}}"><i class="icon-magnifier"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="d-flex no-block align-items-center">
                            <div class="ml-3">
                                <h4 class="mb-0">{{str_limit($product->name, 12)}}</h4>
                                <span class="text-muted">Tk {{$product->price}}</span>
                            </div>
                            <div class="ml-auto mr-3">
                                <button data-url="{{url('admin/recycle/products/'. $product->id)}}" class="btn-restore btn btn-success btn-circle btn-sm" data-toggle="modal" data-target="#restoreModal"><i class="mdi mdi-recycle"></i></button>
                                <button data-url="{{url('admin/recycle/products/'.$product->id)}}" type="button" class="btn-delete btn btn-danger btn-circle btn-sm" data-toggle="modal" data-target="#deleteModal"><i class="ti-trash"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @empty
                @component('admin.dashboard.error')
                <a href="{{url('admin/products')}}" class="btn btn-danger btn-rounded waves-effect waves-light mb-5">Back to Product</a>
                @endcomponent
            @endforelse
        </div>
        <div class="row">
            <div class="col-md-12">
                {{$products->links()}}
            </div>
        </div>
        <!-- End Page Content -->
        <div class="modal fade" id="restoreModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form  method="post" id="restore-form">
                        @csrf
                        @method('put')
                        <div class="modal-header">
                            <h4 class="modal-title" id="exampleModalLabel1">Are you sure to restore?</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancle</button>
                            <button type="submit" class="btn btn-danger">Restore</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form  method="post" id="delete-form">
                        @csrf
                        @method('delete')
                        <div class="modal-header">
                            <h4 class="modal-title" id="exampleModalLabel1">Are you sure to delete?</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancle</button>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
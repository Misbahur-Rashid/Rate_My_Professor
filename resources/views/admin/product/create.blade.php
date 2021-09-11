@extends('layouts.admin_layout.admin_layout')
@section('title', 'Product Create')
@push('css')
<link rel="stylesheet" href="{{asset('contents/admin/assets/libs/select2/dist/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('contents/admin/assets/libs/dropify/dist/css/dropify.min.css')}}">
@endpush
@section('content')
    <!-- Bread crumb and right sidebar toggle -->
    @component('admin.dashboard.breadcumb')
    <li class="breadcrumb-item"><a href="{{url('admin/products')}}">Product</a></li>
    <li class="breadcrumb-item active" aria-current="page">Create</li>
    @endcomponent
    <!-- End Bread crumb and right sidebar toggle -->

    <!-- Start Page Content -->
    <div class="page-content container-fluid">
        <div class="row">
            <!-- Column -->
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="pull-left">
                            <h6 class="card-title mt-1">Create Image</h6>
                        </div>
                        <div class="pull-right">
                            <a href="{{url('/admin/products')}}" class="btn btn-outline-info btn-sm"><i class="mdi mdi-arrow-left"></i> Back</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{url('admin/products')}}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Image Name</label>
                                            <input name="name" type="text" class="form-control" placeholder="Product Name" value="{{old('name')}}">

                                            @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <!--/span-->

                                    <!--/span-->
                                </div>

                                <h5 class="card-title">Image Description</h5>
                                <div class="row">
                                    <div class="col-md-12 ">
                                        <div class="form-group">
                                            <textarea name="description" class="form-control" rows="4">{{old('description')}}</textarea>

                                            @if ($errors->has('description'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <!--/row-->

                                <div class="row">
                                    <!--/span-->
                                    <div class="col-md-3">
                                        <h5 class="card-title mt-3">Product Main Image</h5>
                                        <input name="image" type="file" id="input-file-now" class="dropify" data-max-file-size="3M">

                                        @if ($errors->has('image'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('image') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="col-md-3">
                                        <h5 class="card-title mt-3">Product Image</h5>
                                        <input name="image_two" type="file" id="input-file-now" class="dropify" data-max-file-size="3M">

                                        @if ($errors->has('image1'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('image1') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="col-md-3">
                                        <h5 class="card-title mt-3">Product Image</h5>
                                        <input name="image_three" type="file" id="input-file-now" class="dropify" data-max-file-size="3M">

                                        @if ($errors->has('image2'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('image2') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="col-md-3">
                                        <h5 class="card-title mt-3">Product Image</h5>
                                        <input name="image_four" type="file" id="input-file-now" class="dropify" data-max-file-size="3M">

                                        @if ($errors->has('image3'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('image3') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Status</label>
                                            <br/>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="customRadioInline1" name="status" class="custom-control-input" checked>
                                                <label class="custom-control-label" for="customRadioInline1">Publish</label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="customRadioInline2" name="status" class="custom-control-input">
                                                <label class="custom-control-label" for="customRadioInline2">Draft</label>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>
                            </div>
                            <div class="form-actions mt-5 text-center">
                                <button type="submit" class="btn btn-success">Create Product</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Column -->
        </div>
        <!-- End Page Content -->
    </div>
@endsection
@push('js')
<script src="{{asset('contents/admin/assets/libs/select2/dist/js/select2.min.js')}}"></script>
<script src="{{asset('contents/admin/dist/js/pages/forms/select2/select2.init.js')}}"></script>
<script src="{{asset('contents/admin/assets/libs/tinymce/tinymce.min.js')}}"></script>
<script src="{{asset('contents/admin/assets/libs/dropify/dist/js/dropify.min.js')}}"></script>

<script>
    $(function () {
        //Dropify init
        $('.dropify').dropify();
        //TinyMCE
        tinymce.init({
            selector:'#features'
        });
    });
</script>
@endpush

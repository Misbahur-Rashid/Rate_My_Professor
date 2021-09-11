@extends('layouts.admin_layout.admin_layout')
@section('title', $course->name)

@section('content')
    <!-- Bread crumb and right sidebar toggle -->

    @component('admin.dashboard.breadcumb')
    <li class="breadcrumb-item"><a href="{{url('admin/course')}}">Course</a></li>
    <li class="breadcrumb-item active" aria-current="page">edit</li>
    @endcomponent

    <!-- End Bread crumb and right sidebar toggle -->
    <div class="page-content container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
						<div class="pull-left">
							<h6 class="card-title mt-1">Update Course</h6>
						</div>
						<div class="pull-right">
                            <a href="{{url('/admin/course')}}" class="btn btn-outline-info btn-sm"><i class="mdi mdi-arrow-left"></i> Back</a>
						</div>
					</div>
                    <div class="card-body">
                        <form class="form pt-3" method="post" action="{{url('admin/course/'.$course->id)}}">
                            @csrf
                            @method('put')

                            <div class="form-group">
                                <label>Course Name</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="name" name="name" value="{{$course->name}}">

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Code</label>
                                <div class="input-group mb-3">
                                    <input type="number" class="form-control" placeholder="code" name="code" value="{{$course->code}}">

                                    @if ($errors->has('code'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('code') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Assessment</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Button Text" name="assessment" value="{{$course->assessment}}">
                                    @if ($errors->has('assessment'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('assessment') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <h5 class="card-title mt-3">Description</h5>
                                <textarea name="text" id="description">{{$course->text}}</textarea>
                                @if ($errors->has('text'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('text') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-success mr-2">Update</button>
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
<script>
    $(function () {
        //TinyMCE
        tinymce.init({
            selector: "#description",
            theme: "modern",
            height: 300,
            plugins: [
                'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                'searchreplace wordcount visualblocks visualchars code fullscreen',
                'insertdatetime media nonbreaking save table contextmenu directionality',
                'emoticons template paste textcolor colorpicker textpattern imagetools'
            ],
            toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
            toolbar2: 'print preview media | forecolor backcolor emoticons',
            image_advtab: true
        });
        tinymce.suffix = ".min";
        tinyMCE.baseURL = '{{ asset('contents/admin/assets/libs/tinymce') }}';
    });
</script>
@endpush


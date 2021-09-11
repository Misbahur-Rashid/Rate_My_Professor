@extends('layouts.admin_layout.admin_layout')
@section('title', $contactmessage->comment)
@section('content')
    <!-- Bread crumb and right sidebar toggle -->

    @component('admin.dashboard.breadcumb')
    <li class="breadcrumb-item"><a href="{{url('admin/feedbacks')}}">FeedBack</a></li>
    <li class="breadcrumb-item active" aria-current="page">View</li>
    @endcomponent

    <!-- End Bread crumb and right sidebar toggle -->
    <div class="page-content container-fluid">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="mail-details bg-white">
                    <div class="card-body border-bottom">
                        <h4 class="mb-0 mt-1 pull-left">FeedBack</h4>
                        <a href="{{url('admin/feedbacks')}}" class="pull-right btn btn-outline-info btn-sm"><i class="mdi mdi-arrow-left"></i>Back</a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="card-body border-bottom">
                        <div class="d-flex no-block align-items-center mb-5">

                            <div class="">
                                <h5 class="mb-0 font-16 font-medium">{{$contactmessage->teacher->name}}</h5>
                                <span>{{$contactmessage->uses[0]->name}}</span>
                                <span>{{$contactmessage->uses[0]->phone}}</span>
                            </div>
                        </div>
                        <h4 class="mb-3">{{$contactmessage->comment}}</h4>
                        <p>{{$contactmessage->rating}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

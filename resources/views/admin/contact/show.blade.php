@extends('layouts.admin_layout.admin_layout')
@section('title', $contactmessage->subject)
@section('content')
    <!-- Bread crumb and right sidebar toggle -->

    @component('admin.dashboard.breadcumb')
    <li class="breadcrumb-item"><a href="{{url('admin/contacts')}}">Messages</a></li>
    <li class="breadcrumb-item active" aria-current="page">View</li>
    @endcomponent

    <!-- End Bread crumb and right sidebar toggle -->
    <div class="page-content container-fluid">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="mail-details bg-white">
                    <div class="card-body border-bottom">
                        <h4 class="mb-0 mt-1 pull-left">Contact Message</h4>
                        <a href="{{url('admin/contacts')}}" class="pull-right btn btn-outline-info btn-sm"><i class="mdi mdi-arrow-left"></i>Back</a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="card-body border-bottom">
                        <div class="d-flex no-block align-items-center mb-5">

                            <div class="">
                                <h5 class="mb-0 font-16 font-medium">{{$contactmessage->name}}</h5>
                                <span>{{$contactmessage->email}}</span>
                                <span>{{$contactmessage->phone}}</span>
                            </div>
                        </div>
                        <h4 class="mb-3">{{$contactmessage->subject}}</h4>
                        <p>{{$contactmessage->message}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

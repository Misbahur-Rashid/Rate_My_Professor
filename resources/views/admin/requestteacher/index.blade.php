@extends('layouts.admin_layout.admin_layout')
@section('title', 'Request Teacher')
@push('css')
<link href="{{asset('contents/admin/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
@endpush
@section('content')
    <!-- Bread crumb and right sidebar toggle -->

    @component('admin.dashboard.breadcumb')
    <li class="breadcrumb-item"><a href="{{url('admin/requestteacher')}}">Request Teacher</a></li>
    @endcomponent

    <!-- End Bread crumb and right sidebar toggle -->
    <div class="page-content container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="material-card card">
                    <div class="card-header">
						<div class="pull-left">
							<h6 class="card-title mt-1">Request Teacher</h6>
						</div>
					</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped border">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Last Name</th>
                                        <th>Department</th>
                                        <th>Designation</th>
                                        <th>CV</th>
                                        <th>Photo</th>
                                        <th>Time</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($contactmessages as $key=>$contactMessage)
                                        <tr class="{{$contactMessage->status == 0 ? 'unreaded' : ''}}">
                                            <td>{{$key + 1}}</td>
                                            <td>{{$contactMessage->name}}</td>
                                            <td>{{$contactMessage->lastname}}</td>
                                            <td>{{$contactMessage->department->name??""}}</td>
                                            <td>{{$contactMessage->job_type}}</td>
                                            <td>
                                                <iframe src="{{asset('image/pdf/') }}/{{ $contactMessage->cv }}" frameborder="0" style="width: 100px;height:100px"></iframe>
                                            </td>
                                            <td>
                                                <img src="{{url('image/req_teacher/'.$contactMessage->photo)}}" alt=""  style="width: 60px;height:40px">
                                            </td>
                                            <td>{{$contactMessage->created_at->diffForHumans()}}</td>
                                            @if($contactMessage->status == ! NULL)
                                            <td><label class="badge badge-success badge-pill">Active</label></td>
                                            @else
                                            <td><label class="badge badge-warning badge-pill">Inactive</label></td>
                                            @endif
                                            <td>
                                                <a href="{{url('admin/requestteacher/'. $contactMessage->id)}}"><button class="btn btn-info btn-circle btn-sm"><i class="mdi mdi-eye"></i></button></a>
                                                <button data-url="{{url('admin/requestteacher/'.$contactMessage->id)}}" class="btn-delete btn btn-danger btn-circle btn-sm" data-toggle="modal" data-target="#deleteModal"><i class="mdi mdi-delete"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
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
                            <h5>Think Before You Want to Delete</h5>
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
@push('js')
<script src="{{asset('contents/admin/assets/extra-libs/DataTables/datatables.min.js')}}"></script>
<script src="{{asset('contents/admin/dist/js/pages/datatable/datatable-basic.init.js')}}"></script>
@endpush

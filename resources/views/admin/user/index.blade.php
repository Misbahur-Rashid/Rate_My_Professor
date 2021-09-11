@extends('layouts.admin_layout.admin_layout')
@section('title', 'Users')
@push('css')
<link href="{{asset('contents/admin/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
@endpush
@section('content')
<!-- Bread crumb and right sidebar toggle -->

@component('admin.dashboard.breadcumb')
<li class="breadcrumb-item"><a href="{{url('admin/users')}}">Users</a></li>
@endcomponent

<!-- End Bread crumb and right sidebar toggle -->
<div class="page-content container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="material-card card">
                <div class="card-header">
                    <div class="pull-left">
                        <h6 class="card-title mt-1">Users Information</h6>
                    </div>
                    <div class="pull-right">
                        @if(Auth::user()->role->id==1)
                        <a href="{{url('/admin/get-user-added')}}" class="btn btn-outline-info btn-sm"><i class="mdi mdi-plus-circle"></i> Create User</a>

                        <a href="{{url('/admin/get-role')}}" class="btn btn-outline-info btn-sm"><i class="mdi mdi-plus-circle"></i> Role view</a>
                        @endif
                    </div>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped border">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>image</th>
                                    <th>Role</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->phone}}</td>
                                    <td>

                                        <img width="30" src="{{asset('image/user/')}}/{{$user->image}}" alt="">
                                    </td>
                                    <td>{{$user->role->role_name}}</td>
                                    @if($user->deleted_at == NULL)
                                    <td><label class="badge badge-success badge-pill">Active</label></td>
                                    @else
                                    <td><label class="badge badge-warning badge-pill">Inactive</label></td>
                                    @endif
                                    <td>
                                        <a href="{{url('admin/get-user-added/'.$user->id)}}"><button class="btn btn-success btn-circle btn-sm"><i class="mdi mdi-pencil"></i></button></a>
                                        <button data-url="{{url('admin/user-delete/'.$user->id)}}" class="btn-delete btn btn-danger btn-circle btn-sm" data-toggle="modal" data-target="#deleteModal"><i class="mdi mdi-delete"></i></button>
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
                <form method="post" id="delete-form">
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
@push('js')
<script src="{{asset('contents/admin/assets/extra-libs/DataTables/datatables.min.js')}}"></script>
<script src="{{asset('contents/admin/dist/js/pages/datatable/datatable-basic.init.js')}}"></script>
@endpush
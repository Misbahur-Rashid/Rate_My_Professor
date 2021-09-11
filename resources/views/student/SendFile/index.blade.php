@extends('layouts.website.website')
@section('title', 'Dashboard')
@section('content')

<style type="text/css">
    .prof li{
        background-color: darkorange;
        padding: 7px;
        margin: 4px;
        border-radius: 15px;
        list-style-type: none;
        width: 130px;
    }
    .prof li a{
        padding-left: 15px;
    }
    .update{
        position: relative;
        top: -137px;
        left: 200px;
    }
    .pull-right{
        position: relative;
    top: -151px;
    }
</style>

<section style="padding-left: 50px">
    <div class="col-lg-3 col-md-4 col-xs-12 align-self-center">
        <h5 class="font-medium text-uppercase mb-0">User Name : <strong style="color: hotpink;font-weight:700">{{ Auth::user()->name }}</strong></h5>
        <h5 class="font-medium text-uppercase mb-0">UserType : <strong style="color: hotpink;font-weight:700">{{ Auth::user()->role->role_name }}</strong></h5>
    </div>
</section>
<section id="user_dashboard_main_section">
    <div class="container">
        <div class="row" style="padding: 15px 0px 15px 0px">
            <div class="col-xl-2 col-md-2">
                <ul class="prof">
                    <li class=""><a href="{{ url('student/dashboard') }}"><i class="fas fa-home"></i> My Profile</a></li>
                    <li class=""><a href="{{ url('student/student-index') }}"><i class="fas fa-shopping-cart"></i>My Jurnal</a></li>
                    <li class=""><a href="{{ url('student/student-password-change') }}"><i class="fas fa-cog"></i> Password Change</a></li>
                    <li> <a style="font-size:15px;color:black;font-weight:600" href="{{ route('logout') }}"onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        <i class="mdi mdi-power"></i><span class="hide-menu">logout</span></a>
                      </li>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          @csrf
                    </form>
                </ul>
            </div>
            <div class="pull-right">
                <a href="{{url('/student/student-create')}}" class="btn btn-danger btn-sm">Send Jernals</a>

            </div>
            <div class="col-md-10">
                <div class="card-body update">
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped border">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Jernal Name</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>File</th>
                                    <th>download</th>
                                    <th>Status</th>
                                    <th>Marks</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($files as $sendfile)
                                    <tr>
                                        <td>{{$sendfile->id}}</td>
                                        <td>{{$sendfile->jernal->jernal_name}}</td>
                                        <td>{{$sendfile->description}}</td>
                                        <td>
                                            <img width="30" src="{{ asset('image/student/') }}/{{ $sendfile->image }}" alt="">

                                        </td>
                                        <td>
                                            <a href="{{ url('student/filed/'.$sendfile->id) }}">View</a>
                                        </td>
                                        <td>
                                            <a href="{{ url('student/download/'.$sendfile->file) }}">Download</a>
                                        </td>
                                        {{-- //<td>{{$sendfile->role->role_name}}</td> --}}
                                        @if($sendfile->status =='1')
                                        <td><label class="badge badge-success badge-pill">Approved</label></td>
                                        @else
                                        <td><label class="badge badge-warning badge-pill">UnApproved</label></td>
                                        @endif
                                        @if($sendfile->mark =='1')
                                        <td><label class="badge badge-success badge-pill">Pass</label></td>
                                        @else
                                        <td><label class="badge badge-warning badge-pill">Fail</label></td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@push('js')
<script type="text/javascript">
$(document).ready(function(){
    $('#image').change(function(e){
        var reader = new FileReader();
        reader.onload=function(e){
            $('#showImage').attr('src,e.target.result');
        }
        reader.readAsDataURL(e.target.files['0']);

    });

});

</script>

@endpush

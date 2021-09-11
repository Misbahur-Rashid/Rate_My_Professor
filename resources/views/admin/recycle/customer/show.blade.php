@extends('layouts.admin')
@section('title', $customer->name)
@section('content')
    <!-- Bread crumb and right sidebar toggle -->

    @component('admin.dashboard.breadcumb')
    <li class="breadcrumb-item"><a href="{{url('admin/recycle/customers')}}">Recycle Customers</a></li>
    <li class="breadcrumb-item active" aria-current="page">Show</li>
    @endcomponent

    <!-- End Bread crumb and right sidebar toggle -->
    <div class="page-content container-fluid">
        <div class="row justify-content-center">
            <div class="col-10">
                <div class="mail-details bg-white">
                    <div class="card-body border-bottom">
                        <h4 class="mb-0 mt-1 pull-left">Customer Information</h4>
                        <a href="{{url('admin/recycle/customers')}}" class="pull-right btn btn-outline-info btn-sm"><i class="mdi mdi-arrow-left"></i>Back</a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="card-body border-bottom">
                        <div class="d-flex no-block align-items-center mb-5">
                            <div class="mr-2">
                                <img src="{{asset('storage/users/default.jpg')}}" alt="user" class="rounded-circle" width="45">
                            </div>
                            <div class="">
                                <h5 class="mb-0 font-16 font-medium">{{$customer->name}}</h5>
                                <span>{{$customer->email}}</span><br>
                                <span>{{$customer->phone}}</span><br>
                                <span>{{$customer->address}}</span>
                            </div>
                        </div>
                        <h4 class="mb-3">Customer History</h4>
                        <table class="table table-responsive">
                            <tr>
                                <td>Customer Since</td>
                                <td>Last Login Date</td>
                                <td>Last Order Date</td>
                                <td>Last Order Total</td>
                                <td>Last Month Total Order</td>
                                <td>Last Year Total Order</td>
                                <td>Total Order</td>
                            </tr>
                            <tr>
                                <td>{{$customer->created_at->format('d/m/Y')}}</td>
                                <td>{{$customer->updated_at->format('d/m/Y')}}</td>
                                @php
                                    $lastOrder = $customer->orders()->latest()->first();
                                    $lastMonthOrder = $customer->orders()->thismonth()->sum('order_total');
                                    $lastYearOrder = $customer->orders()->thismonth()->sum('order_total');
                                    $lastYearOrder = $customer->orders()->thisyear()->sum('order_total');
                                    $totalOrder = $customer->orders()->sum('order_total');
                                @endphp
                                @if( $customer->orders()->count() > 0)
                                <td>{{$lastOrder->created_at->format('d/m/Y')}}</td>
                                <td>Tk {{$lastOrder->order_total}}</td>
                                <td>Tk {{$lastMonthOrder}}</td>
                                <td>Tk {{$lastYearOrder}}</td>
                                <td>Tk {{$totalOrder}}</td>
                                @else
                                <td>--</td>
                                <td>--</td>
                                <td>--</td>
                                <td>--</td>
                                <td>--</td>
                                @endif
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
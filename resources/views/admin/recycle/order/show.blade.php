@extends('layouts.admin')
@section('title', 'Recycled Order')
@section('content')
    <!-- Bread crumb and right sidebar toggle -->

    @component('admin.dashboard.breadcumb')
    <li class="breadcrumb-item">Recycle</li>
    <li class="breadcrumb-item"><a href="{{url('admin/recycle/orders')}}">Orders</a></li>
    <li class="breadcrumb-item active" aria-current="page">Show</li>
    @endcomponent

    <!-- End Bread crumb and right sidebar toggle -->
    <div class="page-content container-fluid">
        <!-- Start Page Content -->
        <!-- Row -->
        <div class="row">
            <div class="col-12">
                <div class="material-card card">
                    <div class="card-header">
                        <div class="pull-left">
                            <h6 class="card-title mt-1">Order Details</h6>
                        </div>
                        <div class="pull-right">
                            <a href="{{url('/admin/recycle/orders')}}" class="btn btn-outline-info btn-sm"><i class="mdi mdi-plus-circle"></i> Back</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped border">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Code</th>
                                        <th>Size</th>
                                        <th>Color</th>
                                        <th>Price</th>
                                        <th>Qty</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($products as $product)
                                    @php
                                        $productCode = App\Product::find($product->product_id);
                                    @endphp
                                    <tr>
                                        <td>{{$product->id}}</td>
                                        <td>{{$product->name}}</td>
                                        <td>{{$productCode->code}}</td>
                                        <td>{{$product->SiZe != NULL ? $product->SiZe : '--'}}</td>
                                        <td>{{$product->color != NULL ? $product->color : '--'}}</td>
                                        <td>{{$product->price}}</td>
                                        <td>{{$product->qty}}</td>
                                        <td>{{$product->qty * $product->price}}</td>
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <td class="text-right" colspan="7">Subtotal:</td>
                                        <td>Tk {{$order->order_total}}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-right" colspan="7">Delivery Charge:</td>
                                        <td>Tk {{$order->shipping_charge}}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-right" colspan="7">Total:</td>
                                        <td>Tk {{$order->order_total + $order->shipping_charge}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="material-card card">
                    <div class="card-header">
                        <div class="pull-left">
                            <h6 class="card-title mt-1">Shipping Information</h6>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped border">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Address</th>
                                        <th>City</th>
                                        <th>Country</th>
                                        <th>Zip Code</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{$order->shipping->id}}</td>
                                        <td>{{$order->shipping->first_name}} {{$order->shipping->last_name}}</td>
                                        <td>{{$order->shipping->email}}</td>
                                        <td>{{$order->shipping->phone}}</td>
                                        <td>{{$order->shipping->address}}</td>
                                        <td>{{$order->shipping->city->name}}</td>
                                        <td>{{$order->shipping->country->name}}.</td>
                                        <td>{{$order->shipping->zip_code}}.</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="material-card card">
                    <div class="card-header">
                        <div class="pull-left">
                            <h6 class="card-title mt-1">Payment Information</h6>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped border">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Card Number</th>
                                        <th>Exp Date</th>
                                        <th>CVV</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{$order->payment->id}}</td>
                                        <td>{{$order->payment->name}}</td>
                                        <td>{{$order->payment->card_number}}</td>
                                        <td>{{$order->payment->exp_month}}-{{$order->payment->exp_year}}</td>
                                        <td>{{$order->payment->cvv}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-6">
                <div class="material-card card">
                    <div class="card-header">
                        <div class="pull-left">
                            <h6 class="card-title mt-1">Customer Information</h6>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped border">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @if($order->customer_id)
                                        <td>{{$order->customer->id}}</td>
                                        <td>{{$order->customer->name}}</td>
                                        <td>{{$order->customer->email}}</td>
                                        <td>{{$order->customer->phone}}</td>
                                        @else
                                        <td colspan="5" class="text-center">Guest User</td>
                                        @endif
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
        <!-- Row -->
    </div>
@endsection
@extends('layouts.frontend.master')
@section('title')
    Customer Orders-Brator
@endsection
{{-- @section('css')
    <style>
        .required {
            color: red;
            font-weight: bold;
        }
    </style>
@endsection --}}
@section('content')
    <!-- bread start-->
    <div class="brator-breadcrumb-area">
        <div class="container-xxxl container-xxl container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="brator-breadcrumb">
                        <ul>
                            <li><a href="#_">Home</a></li>
                            <li class="active-link"> Orders</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- bread end-->
    <div class="brator-cart-header-area">
        <div class="container-xxxl container-xxl container">
            <div class="row">
                <div class="col-lg-12">
                    <h2> Orders</h2>
                </div>
            </div>
        </div>
    </div>

    <form action="{{ route('loginCheck') }}" method="POST" enctype="multipart/form-data">
        @csrf
        {{-- <div class="p-4 mb-4 text-sm text-red-500 rounded-lg  dark:bg-gray-800 dark:text-red-400" role="alert">
            @foreach ($errors->get('password') as $message)
                {{ $message }}<br>
            @endforeach
        </div> --}}
        <div class="brator-cart-area">
            <div class="container-xxxl container-xxl container">
                <div class="row">
                    <div class="col-xl-8 col-lg-12">
                        <div class="brator-cart-info">
                            <div class="brator-contact-form-fields blog-post-comment-box-area">
                                <div style="color: red;" role="alert">
                                    @foreach ($errors->get('password') as $message)
                                        {{ $message }}<br>
                                    @endforeach
                                    @if (session('message'))
                                        {{ session('message') }}
                                    @endif
                                </div>
                                <div class="table-responsive whitespace-nowrap rounded-primary">
                                    @if (count($orders) != 0)
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th class="w-[40%] uppercase">Sl No</th>
                                                    <th class="w-[40%] uppercase">Order</th>
                                                    <th class="w-[40%] uppercase">Order Date</th>
                                                    {{-- <th class="w-[10%] uppercase">Coupon</th> --}}
                                                    <th class="w-[10%] uppercase">Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php $i=1 @endphp

                                                @foreach ($orders as $order)
                                                    <tr>
                                                        <td>{{ $i++ }}</td>
                                                        <td>

                                                            <div class="flex items-center gap-3">
                                                                @foreach ($products as $product)
                                                                    @if ($product->id == $order->product_id)
                                                                        @if ($product->featured_image != null)
                                                                        @else
                                                                            <img src="{{ asset('adminAsset/no-image/noimage.jpeg') }}"
                                                                                class="h-10 w-10 rounded-primary border border-slate-300 dark:border-slate-400"
                                                                                alt="Category" />
                                                                        @endif

                                                                        <div>
                                                                            <h6
                                                                                class="whitespace-nowrap text-sm font-medium text-slate-700 dark:text-slate-100">
                                                                                {{ $product->name }}
                                                                                <strong>×&nbsp;{{ $order->quantity }}</strong>
                                                                            </h6>
                                                                            <p
                                                                                class="truncate text-xs text-slate-500 dark:text-slate-400">
                                                                                Total price: {{ $order->total_price }}
                                                                            </p>

                                                                        </div>
                                                                    @endif
                                                                @endforeach
                                                            </div>
                                                        </td>
                                                        <td> {{ $order->created_at->format('d M Y ') }}</td>

                                                        {{-- <td> {{ $order->coupons }}</td> --}}

                                                        <td>
                                                            <div class="badge badge-soft-success">
                                                                {{ $order->status == '0' ? 'Cancelled' : '' }}
                                                                {{ $order->status == '1' ? 'Processing' : '' }}
                                                                {{ $order->status == '2' ? ' On Hold' : '' }}
                                                                {{ $order->status == '3' ? 'Shipped' : '' }}
                                                        </td>


                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    @else
                                        No orders!
                                    @endif

                                </div>


                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </form>
@endsection

@section('js')
@endsection

@extends('layouts.admin.master')
@section('title')
    Admin - Edit Order
@endsection
@section('css')
    {{-- <script type="module" src="{{ asset('js/components/uploader.js') }}"></script>
<script src="{{ asset('js/custom/uploader.js') }}"></script> --}}
    <!-- Include Dropzone.js via CDN -->
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endsection
@section('content')
    <div class="content">
        <!-- Main Content Starts -->
        <main class="container flex-grow p-4 sm:p-6">
            <!-- Page Title Starts -->
            <div class="mb-6 flex flex-col justify-between gap-y-1 sm:flex-row sm:gap-y-0">
                <h5>Edit Order </h5>

                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="/">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="#">Ecommerce</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="#">Order Edit</a>
                    </li>
                </ol>
            </div>
            <!-- Page Title Ends -->
            <!-- Edit Order Page Starts -->
            <form class="" id="myForm" action="{{ route('order.update', ['order' => $order->id]) }}" method="POST"
                enctype="multipart/form-data">
                @method('PUT')
                @csrf
                {{-- <input name="customer_id" type="hidden" value="{{ $order->customer_id }}" /> --}}

                {{-- <div class="p-4 mb-4 text-sm text-red-500 rounded-lg  dark:bg-gray-800 dark:text-red-400" role="alert">
                    @foreach ($errors->get('sku') as $message)
                        {{ $message }}<br>
                    @endforeach

                    @foreach ($errors->get('make_id') as $message)
                        {{ $message }}<br>
                    @endforeach

                    @foreach ($errors->get('year_id') as $message)
                        {{ $message }}<br>
                    @endforeach

                    @foreach ($errors->get('model_id') as $message)
                        {{ $message }}<br>
                    @endforeach

                    @foreach ($errors->get('parent_category') as $message)
                        {{ $message }}<br>
                    @endforeach
                </div> --}}

                <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
                    <!-- Left side Div Start -->
                    <section class="flex flex-col gap-8 lg:col-span-2">
                        <!-- General  -->
                        <div class="rounded-primary bg-white p-6 shadow-sm dark:bg-slate-800">
                            <h5 class="m-0 p-0 text-xl font-semibold text-slate-700 dark:text-slate-200">Order Information
                            </h5>
                            {{-- <p class="mb-4 p-0 text-sm font-normal text-slate-400">
                                Basic information of your order
                            </p> --}}

                            <div class="py-2">
                                <label class="label label-required mb-1 font-medium" for="name">Product Name
                                </label>
                                <input name="product_id" type="hidden" value="{{ $product->id }}" />
                                <input name="" type="text" class="input" id="name"
                                    value="{{ $product->name }}" disabled />
                            </div>
                            <div class="py-2">
                                <label class="label label-required mb-1 font-medium" for="code">Quantity
                                </label>
                                <input name="quantity" type="text" class="input" id="code"
                                    value="{{ $order->quantity }}" />
                            </div>
                            <div class="py-2">
                                <label class="label label-required mb-1 font-medium"> Order Note </label>
                                <textarea name="note" class="textarea text-start" rows="5" placeholder="Write message"> {{ $order->note }}</textarea>
                            </div>
                        </div>
                        <!-- Pricing -->
                        <div class="rounded-primary bg-white p-6 shadow-sm dark:bg-slate-800">
                            <h5 class="m-0 p-0 text-xl font-semibold text-slate-700 dark:text-slate-200">Pricing
                            </h5>
                            {{-- <p class="mb-4 p-0 text-sm font-normal text-slate-400">
                                Set your pricing strategies to stay ahead of the competition
                            </p> --}}
                            <div class="grid w-full grid-cols-1 gap-4 py-2 md:grid-cols-2">
                                <div class="flex w-full flex-col md:w-auto">
                                    <label class="label mb-1 font-medium" for="sale-price"> Sale Price </label>
                                    <input name="sale_price" type="text" class="input" id="sale-price"
                                        value=" ${{ $product->sale_price }}" disabled />
                                </div>
                                <div class="flex w-full flex-col md:w-auto">
                                    <label class="label mb-1 font-medium" for="cost-price">Sub Total</label>
                                    <input name="" type="text" class="input" id="cost-price"
                                        value="${{ $product->sale_price * $order->quantity }}" />
                                </div>
                            </div>
                            <div class="grid w-full grid-cols-1 gap-4 py-2 md:grid-cols-2">
                                <div class="flex w-full flex-col md:w-auto">
                                    <label class="label mb-1 font-medium" for="tax-amount"> Coupon:   </label>
                                    <input name="coupons" type="text" class="input" id="tax-amount"
                                        value="{{ $order->coupons}}" />
                                </div>
                                <div class="flex w-full flex-col md:w-auto">
                                    <label class="label mb-1 font-medium" for="tax-amount"> Tax Amount
                                        ({{ $product->tax }}%) </label>
                                    <input name="tax" type="text" class="input" id="tax-amount"
                                        value="${{ $product->sale_price * ($product->tax / 100) * $order->quantity }}" />
                                </div>
                            </div>
                            <div class="grid w-full grid-cols-1 gap-4 py-2 md:grid-cols-2">

                                <div class="flex w-full flex-col md:w-auto">
                                    <label class="label mb-1 font-medium" for="cost-price"> Total($) </label>
                                    <input name="total_price" type="text" class="input" id="cost-price"
                                        value="{{ $order->total_price }}" />
                                </div>
                            </div>
                        </div>

                        <!-- Customer Info  -->
                        <div class="rounded-primary bg-white p-6 shadow-sm dark:bg-slate-800">
                            <h5 class="m-0 p-0 text-xl font-semibold text-slate-700 dark:text-slate-200">Customer Info
                            </h5>

                            <div class="grid w-full grid-cols-1 gap-4 py-2 md:grid-cols-2">
                                <div class="flex w-full flex-col md:w-auto">
                                    <label class="label mb-1 font-medium" for="sale-price"> Customer Name </label>
                                    <input name="name" type="text" class="input" id="sale-price"
                                        value=" {{ $order->name }}" />
                                </div>
                                <div class="flex w-full flex-col md:w-auto">
                                    <label class="label mb-1 font-medium" for="cost-price">Company Name</label>
                                    <input name="company_name" type="text" class="input" id="cost-price"
                                        value="{{ $order->company_name }}" />
                                </div>
                            </div>

                            <div class="grid w-full grid-cols-1 gap-4 py-2 md:grid-cols-2">
                                <div class="flex w-full flex-col md:w-auto">
                                    <label class="label mb-1 font-medium" for="tax-amount"> Phone Number
                                    </label>
                                    <input name="phone_number" type="text" class="input" id="tax-amount"
                                        value="{{ $order->phone_number }}" />
                                </div>
                                <div class="flex w-full flex-col md:w-auto">
                                    <label class="label mb-1 font-medium" for="cost-price"> Mail </label>
                                    <input name="mail" type="text" class="input" id="cost-price"
                                        value=" {{ $order->mail }}" />
                                </div>
                            </div>
                        </div>

                        <!-- Customer Address  -->
                        <div class="rounded-primary bg-white p-6 shadow-sm dark:bg-slate-800">
                            <h5 class="m-0 p-0 text-xl font-semibold text-slate-700 dark:text-slate-200">Address
                            </h5>

                            <div class="grid w-full grid-cols-1 gap-4 py-2 md:grid-cols-2">
                                <div class="flex w-full flex-col md:w-auto">
                                    <label class="label mb-1 font-medium" for="cost-price">Country</label>
                                    <input name="country" type="text" class="input" id="cost-price"
                                        value="{{ $order->country }}" />
                                </div>
                                <div class="flex w-full flex-col md:w-auto">
                                    <label class="label mb-1 font-medium" for="sale-price"> Street address</label>
                                    <input name="address" type="text" class="input" id="sale-price"
                                        value=" {{ $order->address }}" />
                                </div>

                            </div>

                            <div class="grid w-full grid-cols-1 gap-4 py-2 md:grid-cols-2">
                                <div class="flex w-full flex-col md:w-auto">
                                    <label class="label mb-1 font-medium" for="tax-amount"> Suburb
                                    </label>
                                    <input name="suburb" type="text" class="input" id="tax-amount"
                                        value="{{ $order->suburb }}" />
                                </div>
                                <div class="flex w-full flex-col md:w-auto">
                                    <label class="label mb-1 font-medium" for="cost-price"> State </label>
                                    <input name="state" type="text" class="input" id="cost-price"
                                        value=" {{ $order->state }}" />
                                </div>
                            </div>

                            <div class="grid w-full grid-cols-1 gap-4 py-2 md:grid-cols-2">
                                <div class="flex w-full flex-col md:w-auto">
                                    <label class="label mb-1 font-medium" for="tax-amount"> Postcode
                                    </label>
                                    <input name="postcode" type="text" class="input" id="tax-amount"
                                        value="{{ $order->postcode }}" />
                                </div>
                            </div>
                        </div>

                        <!-- Inventory  -->
                        {{-- <div class="rounded-primary bg-white p-6 shadow-sm dark:bg-slate-800">
                            <h5 class="m-0 p-0 text-xl font-semibold text-slate-700 dark:text-slate-200">Inventory
                            </h5>
                            <p class="mb-4 p-0 text-sm font-normal text-slate-400">Manage and track your order
                                stocks</p>

                            <div class="grid w-full grid-cols-1 gap-4 py-2 md:grid-cols-2">
                                <div class="flex w-full flex-col md:w-auto">
                                    <label class="label label-required mb-1 font-medium" for="stock-quantity"> Stock
                                        Quantity </label>
                                    <input name="quantity" type="text" class="input" id="stock-quantity"
                                        value=" {{ $product->quantity }}" />
                                    <p class="help-text mt-1">Enter available stock quantity</p>
                                </div>
                                <div class="flex w-full flex-col md:w-auto">
                                    <label class="label mb-1 font-medium" for="low-stock-threshold"> Low Stock
                                        Threshold </label>
                                    <input name="alert_threshold" type="text" class="input" id="low-stock-threshold"
                                        value=" {{ $product->alert_threshold }}" />
                                    <p class="help-text mt-1">Enter low stock quantity alert threshold</p>
                                </div>
                            </div>
                        </div> --}}
                    </section>
                    <!-- Left Side Div End  -->
                    <!-- Right Side Div Start  -->
                    <section class="h-full lg:col-span-1">
                        <!-- Organization -->
                        <div class="sticky top-20 rounded-primary bg-white p-6 shadow dark:bg-slate-800">
                            <h5 class="m-0 p-0 text-xl font-semibold text-slate-700 dark:text-slate-200">
                                Organization</h5>
                            <p class="mb-4 p-0 text-sm font-normal text-slate-400">Better organize your order</p>
                            <div>
                                <label class="label label-required mb-1 font-medium" for="status">Payment Method
                                </label>
                                <select name="payment_method" class="select" id="status">

                                    <option value="bank_transfer" {{ $order->payment_method== 'bank_transfer' ? 'selected' : '' }}>
                                        Direct bank transfer
                                    </option>
                                    <option value="check_payments" {{ $order->payment_method== 'check_payments' ? 'selected' : '' }}>
                                        Check payments
                                    </option>
                                    <option value="cash_on_delivery" {{ $order->payment_method== 'cash_on_delivery' ? 'selected' : '' }}>
                                        Cash on delivery
                                    </option>
                                </select>
                            </div>
                            <div class="flex flex-col gap-4">
                                <div>
                                    <label class="label label-required mb-1 font-medium" for="status"> Status
                                    </label>
                                    <select name="status" class="select" id="status">
                                        <option value="0" {{ $order->status== 0 ? 'selected' : '' }}>
                                            Cancelled
                                        </option>
                                        <option value="1" {{ $order->status== 1 ? 'selected' : '' }}>
                                            Processing
                                        </option>
                                        <option value="2" {{ $order->status== 2 ? 'selected' : '' }}>
                                            On Hold
                                        </option>
                                        <option value="3" {{ $order->status== 2 ? 'selected' : '' }}>
                                            Shipped
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </section>
                    <div class="mt-6 flex w-full items-center justify-end">
                        <button class="btn btn-primary" type="submit">Update</button>
                    </div>
                    <!-- Right Side Div End  -->
                </div>
            </form>
            <!-- Edit Order Page Ends -->
        </main>
        <!-- Main Content Ends -->

        <!-- Footer Starts -->
        <footer class="footer">
            <p class="text-sm">
                Copyright © 2023
                <a class="text-primary-500 hover:underline" href="https://getadmintoolkit.com" target="_blank">
                    Brator
                </a>
            </p>

            <p class="flex items-center gap-1 text-sm">
                Hand-crafted &amp; Made with
                <i class="text-danger-500" data-feather="heart" height="1em" width="1em"></i>
            </p>
        </footer>
        <!-- Footer Ends -->
    </div>
@endsection

@extends('layouts.admin.master')
@section('title')
    Admin - Order Details
@endsection
@section('content')
    <div class="content">
        <!-- Main Content Starts -->
        <main class="container flex-grow p-4 sm:p-6">
            <!-- Page Title Starts -->
            <div class="mb-6 flex flex-col justify-between gap-y-1 sm:flex-row sm:gap-y-0">
                <h5>Order Details # {{ $order->id }}</h5>

                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="/">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="#">Order</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="#">Details</a>
                    </li>
                </ol>
            </div>
            <!-- Page Title Ends -->

            <!-- Order Details Starts -->
            <div class="grid grid-cols-1 gap-y-3 md:gap-x-5 xl:grid-cols-4">
                <div class="col-span-1 xl:col-span-3">
                    <div class="card">
                        <div class="card-body space-y-6">
                            <!-- Order Header Starts -->
                            <div class="flex flex-col justify-between space-y-4 p-1 md:flex-row">
                                <div class="flex items-center justify-center md:justify-start">
                                    <!-- Logo Starts -->
                                    <div class="flex h-16 w-full items-center gap-4 pr-4">
                                        <span class="inline-block flex-shrink-0">
                                            <img src="{{ asset('adminAsset') }}/svg/logo.svg" alt="logo"
                                                class="h-[45px]" />
                                        </span>

                                        <div class="flex flex-col">
                                            <h1 class="flex text-xl">
                                                <span class="font-bold text-slate-800 dark:text-slate-200"> Brator </span>
                                            </h1>
                                            {{-- <p class="whitespace-nowrap text-xs text-slate-400">Simple &amp; Customizable
                                            </p> --}}
                                        </div>
                                    </div>
                                    <!-- Logo Ends -->
                                </div>
                                <div class="flex flex-col items-start justify-center md:items-end">
                                    <h4>Order # {{ $order->id }} </h4>
                                    <p class="my-0 py-0 text-sm font-medium text-slate-700 dark:text-slate-300">
                                        Order Date:
                                        <span class="font-normal text-slate-600 dark:text-slate-300">
                                            {{ date('F d, Y', strtotime($order->created_at)) }}
                                        </span>
                                    </p>
                                    {{-- <p class="my-0 py-0 text-sm font-medium text-slate-700 dark:text-slate-300">
                    Due Date:
                    <span class="font-normal text-slate-600 dark:text-slate-300"> Feb 01, 2023 </span>
                  </p> --}}
                                </div>
                            </div>
                            <!-- Order Header Ends -->

                            <!-- Order Info Starts -->
                            <div class="flex flex-col justify-between space-y-6 p-1 md:flex-row md:space-y-0">
                                <div
                                    class="flex w-full flex-col items-start justify-center md:mb-0 md:w-2/3 md:justify-center">
                                    <p class="text-xs font-medium uppercase text-slate-400">BILLED FROM</p>
                                    <h6 class="my-1">Brator</h6>
                                    <p class="whitespace-nowrap text-sm font-normal text-slate-600 dark:text-slate-300">
                                        206 Yonge St, Toronto - M4S 2A3
                                    </p>
                                    <p class="whitespace-nowrap text-sm font-normal text-slate-600 dark:text-slate-300">
                                        Tel No: (317) 745-1499
                                    </p>
                                    <p class="whitespace-nowrap text-sm font-normal text-slate-600 dark:text-slate-300">
                                        Email: info@admintoolkit.com
                                    </p>
                                </div>

                                <div class="flex w-full flex-col items-start justify-center md:w-1/3 md:items-end">
                                    <p class="text-xs font-medium uppercase text-slate-400">BILLED TO</p>
                                    <h6 class="my-1">{{ $order->name }}</h6>
                                    <p class="whitespace-nowrap text-sm font-normal text-slate-600 dark:text-slate-300">
                                        {{ $order->address . ' , ' . $order->suburb . ' , ' . $order->state . '-' . $order->postcode }}
                                    </p>
                                    <p class="whitespace-nowrap text-sm font-normal text-slate-600 dark:text-slate-300">
                                        Tel No: {{ $order->phone_number }}
                                    </p>
                                    <p class="whitespace-nowrap text-sm font-normal text-slate-600 dark:text-slate-300">
                                        Email: {{ $order->mail }}
                                    </p>
                                </div>
                            </div>
                            <!-- Order Info Ends -->

                            <!-- Product Table Starts -->
                            <div class="w-full overflow-auto p-1">
                                <div class="min-w-[38rem]">
                                    <div
                                        class="table-responsive whitespace-nowrap rounded-primary border border-slate-200 dark:border-slate-600">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Product Name</th>
                                                    <th>Price</th>
                                                    <th>Quantity</th>
                                                    <th class="!text-right">Line Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="flex items-center gap-2">
                                                            @if ($product->featured_image != null)
                                                                <img src="{{ asset($product->featured_image) }}"
                                                                    class="h-12 w-12 rounded-primary border border-slate-200 p-0.5 dark:border-slate-600"
                                                                    alt="product-img" />
                                                            @else
                                                                <img src="{{ asset('adminAsset/no-image/noimage.jpeg') }}"
                                                                    class="h-12 w-12 rounded-primary border border-slate-200 p-0.5 dark:border-slate-600"
                                                                    alt="product-img" />
                                                            @endif
                                                            <div class="flex flex-col items-start justify-center">
                                                                <p
                                                                    class="text-sm font-medium text-slate-700 dark:text-slate-300">
                                                                    {{ $product->name }}</p>
                                                                {{-- <p class="text-xs text-slate-400">Delivery Date: 31/01/3023</p> --}}
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <p class="text-sm text-slate-400">$ {{ $product->sale_price }}</p>
                                                    </td>
                                                    <td>
                                                        <p class="text-sm text-slate-400">{{ $order->quantity }} pcs</p>
                                                    </td>
                                                    <td>
                                                        <p
                                                            class="text-right text-sm font-semibold text-slate-700 dark:text-slate-300">
                                                            ${{ $product->sale_price * $order->quantity }}
                                                        </p>
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="mt-4 flex items-stretch justify-between">
                                        <div class="w-2/5">
                                            <p class="my-2 py-0 text-sm font-semibold">
                                                Status:
                                                <span class="font-normal">
                                                    {{ $order->status == '0' ? 'Cancelled' : '' }}
                                                    {{ $order->status == '1' ? 'Processing' : '' }}
                                                    {{ $order->status == '2' ? ' On Hold' : '' }}
                                                    {{ $order->status == '3' ? 'Shipped' : '' }}
                                                </span>
                                            </p>
                                            <p class="my-2 py-0 text-sm font-semibold">
                                                Payment Method:
                                                <span class="font-normal">
                                                    {{ $order->payment_method == 'bank_transfer' ? 'Direct bank transfer' : '' }}
                                                    {{ $order->payment_method == 'check_payments' ? 'Check payments' : '' }}
                                                    {{ $order->payment_method == 'cash_on_delivery' ? 'Cash on delivery ' : '' }}
                                                </span>
                                            </p>
                                            <p class="m-0 p-0 text-sm font-semibold">Note:</p>
                                            <p>{{ $order->note }} </p>

                                            {{-- <blockquote class="text-sm font-normal text-slate-600 dark:text-slate-400">
                                                It was a pleasure working with you and your team.
                                                <br />
                                                We hope you will keep us in mind for future freelance
                                                <br />
                                                projects. Thank You!
                                            </blockquote> --}}
                                        </div>

                                        <div>
                                            <ul class="space-y-3">
                                                {{-- <li class="flex items-center gap-x-2">
                                                    <span
                                                        class="inline-block w-1/2 text-right text-sm font-medium text-slate-400">Subtotal:</span>
                                                    <span
                                                        class="inline-block w-1/2 pr-6 text-right text-sm font-semibold text-slate-700 dark:text-slate-300">
                                                        $72.00
                                                    </span>
                                                </li> --}}

                                                <li class="flex items-center gap-x-2">
                                                    <span
                                                        class="inline-block w-1/2 text-right text-sm font-medium text-slate-400">
                                                        Coupon({{ $order->coupons }}):
                                                    </span>
                                                    <span
                                                        class="inline-block w-1/2 pr-6 text-right text-sm font-semibold text-slate-700 dark:text-slate-300">
                                                        $0.00
                                                    </span>
                                                </li>
                                                <li class="flex items-center gap-x-2">
                                                    <span
                                                        class="inline-block w-1/2 text-right text-sm font-medium text-slate-400">Tax({{ $product->tax }}%):</span>
                                                    <span
                                                        class="inline-block w-1/2 pr-6 text-right text-sm font-semibold text-slate-700 dark:text-slate-300">
                                                        ${{ $product->sale_price * ($product->tax / 100) * $order->quantity }}
                                                    </span>
                                                </li>
                                            </ul>
                                            <hr class="mb-1 mt-5 border-slate-200 dark:border-slate-600" />
                                            <div class="flex items-center gap-x-2">
                                                <span
                                                    class="inline-block w-1/2 text-right text-sm font-medium text-slate-400">Total:</span>
                                                <span
                                                    class="inline-block w-1/2 pr-6 text-right text-sm font-semibold text-slate-700 dark:text-slate-300">
                                                    ${{ $order->total_price }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Product Table Ends -->

                            <p class="py-2 text-center text-sm">Thanks for your Business</p>
                        </div>
                    </div>
                </div>

                <div class="sticky top-20 col-span-1 h-max">
                    <div class="card">
                        <div class="card-body flex flex-col gap-4">
                            <button class="btn btn-primary w-full">
                                <i data-feather="send" width="1.125rem" height="1.125rem"></i>
                                Send Order
                            </button>

                            <button class="btn btn-primary w-full">
                                <i data-feather="dollar-sign" width="1.125rem" height="1.125rem"></i>
                                Add Payment
                            </button>

                            <div class="flex items-center gap-4 xl:flex-col 2xl:flex-row">
                                <button class="btn btn-outline-primary w-full">
                                    <i data-feather="printer" width="1.125rem" height="1.125rem"></i>
                                    <span>Print</span>
                                </button>
                                <button class="btn btn-outline-primary w-full">
                                    <i data-feather="download" width="1.125rem" height="1.125rem"></i>
                                    <span>Download</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Order Details Ends -->
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

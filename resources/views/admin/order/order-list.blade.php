@extends('layouts.admin.master')
@section('title')
    Admin - Order List
@endsection
@section('content')
    <div class="content">
        <!-- Main Content Starts -->
        <main class="container flex-grow p-4 sm:p-6">
            <!-- Page Title Starts -->
            <div class="mb-6 flex flex-col justify-between gap-y-1 sm:flex-row sm:gap-y-0">
                <h5>Order List</h5>

                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="/">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="#">Ecommerce</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="#">Order List</a>
                    </li>
                </ol>
            </div>
            <!-- Page Title Ends -->

            <!-- Order List Starts -->
            <div class="space-y-4">
                <!-- Order Header Starts -->
                <div class="flex flex-col items-center justify-between gap-y-4 md:flex-row md:gap-y-0">
                    <!-- Customer Search Starts -->
                    <form
                        class="group flex h-10 w-full items-center rounded-primary border border-transparent bg-white shadow-sm focus-within:border-primary-500 focus-within:ring-1 focus-within:ring-inset focus-within:ring-primary-500 dark:border-transparent dark:bg-slate-800 dark:focus-within:border-primary-500 md:w-72">
                        <div class="flex h-full items-center px-2">
                            <i class="h-4 text-slate-400 group-focus-within:text-primary-500" data-feather="search"></i>
                        </div>
                        <input
                            class="h-full w-full border-transparent bg-transparent px-0 text-sm placeholder-slate-400 placeholder:text-sm focus:border-transparent focus:outline-none focus:ring-0"
                            type="text" placeholder="Search" />
                    </form>
                    <!-- Customer Search Ends -->

                    <!-- Customer Action Starts -->
                    <div class="flex w-full items-center justify-between gap-x-4 md:w-auto">
                        <div class="flex items-center gap-x-4">
                            <div class="dropdown" data-placement="bottom-end">
                                <div class="dropdown-toggle">
                                    <button type="button" class="btn bg-white font-medium shadow-sm dark:bg-slate-800">
                                        <i class="w-4" data-feather="filter"></i>
                                        <span class="hidden sm:inline-block">Filter</span>
                                        <i class="w-4" data-feather="chevron-down"></i>
                                    </button>
                                </div>
                                <div class="dropdown-content w-72 !overflow-visible">
                                    <ul class="dropdown-list space-y-4 p-4">
                                        <li class="dropdown-list-item">
                                            <h2 class="my-1 text-sm font-medium">Category</h2>
                                            <select class="tom-select w-full" autocomplete="off">
                                                <option value="">Select a Category</option>
                                                <option value="1">Electronics</option>
                                                <option value="2">Fashion</option>
                                                <option value="3">Accessories</option>
                                            </select>
                                        </li>

                                        <li class="dropdown-list-item">
                                            <h2 class="my-1 text-sm font-medium">Status</h2>
                                            <select class="select">
                                                <option value="">Select to Status</option>
                                                <option value="1">Available</option>
                                                <option value="2">Disabled</option>
                                            </select>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <button class="btn bg-white font-medium shadow-sm dark:bg-slate-800">
                                <i class="h-4" data-feather="upload"></i>
                                <span class="hidden sm:inline-block">Export</span>
                            </button>
                        </div>

                        {{-- <a class="btn btn-primary" href="{{ route('order.create') }}" role="button">
                            <i data-feather="plus" height="1rem" width="1rem"></i>
                            <span class="hidden sm:inline-block">Add Order</span>
                        </a> --}}
                    </div>
                    <!-- Customer Action Ends -->
                </div>
                <!-- Order Header Ends -->

                <!-- Order Table Starts -->
                <div class="table-responsive whitespace-nowrap rounded-primary">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="w-[40%] uppercase">Sl No</th>
                                <th class="w-[40%] uppercase">Order</th>
                                <th class="w-[40%] uppercase">Date & Time</th>
                                <th class="w-[10%] uppercase">Coupon</th>
                                <th class="w-[10%] uppercase">Status</th>
                                <th class="w-[5%] !text-right uppercase">Actions</th>
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
                                                        <img src="{{ asset($product->featured_image) }}"
                                                            class="h-10 w-10 rounded-primary border border-slate-300 dark:border-slate-400"
                                                            alt="order" />
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
                                                        <p class="truncate text-xs text-slate-500 dark:text-slate-400">
                                                            Total price: {{ $order->total_price }}
                                                        </p>

                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </td>
                                    <td> {{ $order->created_at->format('d M Y - H:i:s') }}</td>

                                    <td> {{ $order->coupons }}</td>

                                    <td>
                                        <div class="badge badge-soft-success">
                                            {{ $order->status == '0' ? 'Cancelled' : '' }}
                                            {{ $order->status == '1' ? 'Processing' : '' }}
                                            {{ $order->status == '2' ? ' On Hold' : '' }}
                                            {{ $order->status == '3' ? 'Shipped' : '' }}
                                    </td>
                                    <td>
                                        <div class="flex justify-end">
                                            <div class="dropdown" data-placement="bottom-start">
                                                <div class="dropdown-toggle">
                                                    <i class="w-6 text-slate-400" data-feather="more-horizontal"></i>
                                                </div>
                                                <div class="dropdown-content w-40">
                                                    <ul class="dropdown-list">
                                                        <li class="dropdown-list-item">
                                                            <a href="{{ route('order.show', ['order' => $order->id]) }}" class="dropdown-link">
                                                                <i class="h-5 text-slate-400"
                                                                    data-feather="external-link"></i>
                                                                <span>Details</span>
                                                            </a>
                                                        </li>
                                                        <li class="dropdown-list-item">
                                                            <a href="{{ route('order.edit', ['order' => $order->id]) }}"
                                                                class="dropdown-link">
                                                                <i class="h-5 text-slate-400" data-feather="edit"></i>Edit
                                                            </a>
                                                        </li>
                                                        <li class="dropdown-list-item">
                                                            <a class="dropdown-link">
                                                                <i class="h-5 text-slate-400" data-feather="trash"></i>
                                                                <form
                                                                    action="{{ route('order.destroy', ['order' => $order->id]) }}"
                                                                    method="post">
                                                                    @method('DELETE')
                                                                    @csrf
                                                                    <input type="hidden" value="{{ $order->id }}"
                                                                        name="order_id">
                                                                    <input type="submit" value="Delete"
                                                                        onclick="return confirm('Do you want to Delete Order !')">
                                                                </form>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- Order Table Ends -->

                <!-- Order Pagination Starts -->
                <div class="flex flex-col items-center justify-between gap-y-4 md:flex-row">
                    <p class="text-xs font-normal text-slate-400">Showing 1 to 10 of 50 result</p>
                    <!-- Pagination -->
                    <nav class="pagination">
                        <ul class="pagination-list">
                            <li class="pagination-item">
                                <a class="pagination-link pagination-link-prev-icon" href="#">
                                    <i data-feather="chevron-left" width="1em" height="1em"></i>
                                </a>
                            </li>
                            <li class="pagination-item active">
                                <a class="pagination-link" href="#">1</a>
                            </li>
                            <li class="pagination-item">
                                <a class="pagination-link" href="#">2</a>
                            </li>
                            <li class="pagination-item">
                                <a class="pagination-link" href="#">3</a>
                            </li>
                            <li class="pagination-item">
                                <a class="pagination-link" href="#">4</a>
                            </li>
                            <li class="pagination-item">
                                <a class="pagination-link" href="#">5</a>
                            </li>
                            <li class="pagination-item">
                                <a class="pagination-link pagination-link-next-icon" href="#">
                                    <i data-feather="chevron-right" width="1em" height="1em"></i>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <!-- Order Pagination Ends -->
            </div>
            <!-- Order List Ends -->
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

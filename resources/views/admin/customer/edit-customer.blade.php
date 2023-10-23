@extends('layouts.admin.master')
@section('title')
    Admin - Edit Customer
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
                <h5>Edit Customer </h5>

                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="/">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="#">Ecommerce</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="#">Customer Edit</a>
                    </li>
                </ol>
            </div>
            <!-- Page Title Ends -->
            <!-- Edit Customer Page Starts -->
            <form class="" id="myForm" action="{{ route('customer.update', ['customer' => $customer->id]) }}"
                method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                {{-- <input name="customer_id" type="hidden" value="{{ $customer->id }}" /> --}}
                {{-- <div class="p-4 mb-4 text-sm text-red-500 rounded-lg  dark:bg-gray-800 dark:text-red-400" role="alert">
                    @foreach ($errors->get('sku') as $message)
                        {{ $message }}<br>
                    @endforeach
                </div> --}}

                <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
                    <!-- Left side Div Start -->
                    <section class="flex flex-col gap-8 lg:col-span-2">
                        <!-- Customer Info  -->
                        <div class="rounded-primary bg-white p-6 shadow-sm dark:bg-slate-800">
                            <div style="color: red;" role="alert">
                                @foreach ($errors->get('password') as $message)
                                    {{ $message }}<br>
                                @endforeach
                                @if (session('message'))
                                    {{ session('message') }}
                                @endif
                            </div>
                            <h5 class="m-0 p-0 text-xl font-semibold text-slate-700 dark:text-slate-200">Customer Info
                            </h5>

                            <div class="grid w-full grid-cols-1 gap-4 py-2 md:grid-cols-2">
                                <div class="flex w-full flex-col md:w-auto">
                                    <label class="label mb-1 font-medium"> First Name </label>
                                    <input name="first_name" type="text" class="input"
                                        value=" {{ $customer->first_name }}" />
                                </div>
                                <div class="flex w-full flex-col md:w-auto">
                                    <label class="label mb-1 font-medium">Last Name</label>
                                    <input name="last_name" type="text" class="input"
                                        value="{{ $customer->last_name }}" />
                                </div>
                            </div>

                            <div class="grid w-full grid-cols-1 gap-4 py-2 md:grid-cols-2">
                                <div class="flex w-full flex-col md:w-auto">
                                    <label class="label mb-1 font-medium"> Phone Number
                                    </label>
                                    <input name="phone_number" type="text" class="input"
                                        value="{{ $customer->phone_number }}" />
                                </div>
                                <div class="flex w-full flex-col md:w-auto">
                                    <label class="label mb-1 font-medium"> Mail </label>
                                    <input name="mail" type="text" class="input" value=" {{ $customer->mail }}" />
                                </div>
                            </div>
                            <div class="grid w-full grid-cols-1 gap-4 py-2 md:grid-cols-2">
                                <div class="flex w-full flex-col md:w-auto">
                                    <label class="label mb-1 font-medium"> Date of Birth
                                    </label>
                                    <input name="date_of_birth" type="date" class="input"
                                        value="{{ $customer->date_of_birth }}" />
                                </div>
                                <div class="flex w-full flex-col md:w-auto">
                                    <label class="label mb-1 font-medium"> Gender </label>
                                    <input name="gender" type="text" class="input" value=" {{ $customer->gender }}" />
                                </div>
                            </div>
                        </div>

                        <!-- Customer Address  -->
                        <div class="rounded-primary bg-white p-6 shadow-sm dark:bg-slate-800">
                            <h5 class="m-0 p-0 text-xl font-semibold text-slate-700 dark:text-slate-200">Address
                            </h5>

                            <div class="grid w-full grid-cols-1 gap-4 py-2 md:grid-cols-2">
                                <div class="flex w-full flex-col md:w-auto">
                                    <label class="label mb-1 font-medium">Country</label>
                                    <input name="country" type="text" class="input" value="{{ $customer->country }}" />
                                </div>
                                <div class="flex w-full flex-col md:w-auto">
                                    <label class="label mb-1 font-medium"> Street address</label>
                                    <input name="address" type="text" class="input" value=" {{ $customer->address }}" />
                                </div>

                            </div>

                            <div class="grid w-full grid-cols-1 gap-4 py-2 md:grid-cols-2">
                                <div class="flex w-full flex-col md:w-auto">
                                    <label class="label mb-1 font-medium"> Suburb
                                    </label>
                                    <input name="suburb" type="text" class="input" value="{{ $customer->suburb }}" />
                                </div>
                                <div class="flex w-full flex-col md:w-auto">
                                    <label class="label mb-1 font-medium"> State </label>
                                    <input name="state" type="text" class="input" value=" {{ $customer->state }}" />
                                </div>
                            </div>

                            <div class="grid w-full grid-cols-1 gap-4 py-2 md:grid-cols-2">
                                <div class="flex w-full flex-col md:w-auto">
                                    <label class="label mb-1 font-medium"> Postcode
                                    </label>
                                    <input name="postcode" type="text" class="input"
                                        value="{{ $customer->postcode }}" />
                                </div>
                            </div>
                        </div>
                        <!-- Customer Address  -->
                        <div class="rounded-primary bg-white p-6 shadow-sm dark:bg-slate-800">
                            <h5 class="m-0 p-0 text-xl font-semibold text-slate-700 dark:text-slate-200">Change Password
                            </h5>

                            <div class="grid w-full grid-cols-1 gap-4 py-2 md:grid-cols-2">
                                <div class="flex w-full flex-col md:w-auto">
                                    <label class="label mb-1 font-medium">New Password</label>
                                    <input name="password" type="password" class="input" value="" />
                                </div>

                                <div class="flex w-full flex-col md:w-auto">
                                    <label class="label mb-1 font-medium"> Confirm New Password</label>
                                    <input name="password_confirmation" type="password" class="input" value="" />
                                </div>

                            </div>
                        </div>
                        <div class="rounded-primary bg-white p-6 shadow-sm dark:bg-slate-800">
                            <h5 class="m-0 p-0 text-xl font-semibold text-slate-700 dark:text-slate-200">Change Image
                            </h5>
                            <p class="mb-4 p-0 text-sm font-normal text-slate-400">
                                {{ __('Current  Image') }}
                            </p>
                            @if ($customer->image != null)
                                <img src="{{ asset($customer->image) }}"
                                    class="h-10 w-10 rounded-primary border border-slate-300 dark:border-slate-400"
                                    alt="Category" />
                            @else
                                <img src="{{ asset('adminAsset/no-image/noimage.jpeg') }}"
                                    class="h-10 w-10 rounded-primary border border-slate-300 dark:border-slate-400"
                                    alt="Category" />
                            @endif
                            <p class="mb-4 p-0 text-sm font-normal text-slate-400">
                                {{ __('Change Image') }}
                            </p>
                            <div class="fallback">
                                <input name="image" type="file" />
                            </div>

                        </div>
                    </section>
                    <!-- Left Side Div End  -->
                    <!-- Right Side Div Start  -->
                    <section class="h-full lg:col-span-1">
                        <!-- Organization -->
                        <div class="sticky top-20 rounded-primary bg-white p-6 shadow dark:bg-slate-800">
                            <h5 class="m-0 p-0 text-xl font-semibold text-slate-700 dark:text-slate-200">
                                Organization</h5>
                            <p class="mb-4 p-0 text-sm font-normal text-slate-400">Better organize your customer</p>

                            <div class="flex flex-col gap-4">
                                <div>
                                    <label class="label label-required mb-1 font-medium" for="status"> Status
                                    </label>
                                    <select name="status" class="select" id="status">
                                        <option value="0" {{ $customer->status == 0 ? 'selected' : '' }}>
                                            Deactive
                                        </option>
                                        <option value="1" {{ $customer->status == 1 ? 'selected' : '' }}>
                                            Active
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
            <!-- Edit Customer Page Ends -->
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

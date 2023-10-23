@extends('layouts.admin.master')
@section('title')
    Admin - Edit Image Setting
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
                <h5>Edit Image Setting </h5>

                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="/">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="#">Ecommerce</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="#">Edit Image Setting</a>
                    </li>
                </ol>
            </div>
            <!-- Page Title Ends -->
            <!-- Edit Image Setting Page Starts -->
            <form action="{{ route('image-setting.update', ['image_setting' => $imageSetting->id]) }}" method="POST"
                enctype="multipart/form-data">

                @method('PUT')
                @csrf
                <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
                    <!-- Left side Div Start -->
                    <section class="flex flex-col gap-8 lg:col-span-2">
                        <!-- Image Setting Info  -->
                        <div class="rounded-primary bg-white p-6 shadow-sm dark:bg-slate-800">
                            <div style="color: red;" role="alert">
                                @foreach ($errors->get('password') as $message)
                                    {{ $message }}<br>
                                @endforeach
                                @if (session('message'))
                                    {{ session('message') }}
                                @endif
                            </div>
                            <h5 class="m-0 p-0 text-xl font-semibold text-slate-700 dark:text-slate-200">Image Setting Info
                            </h5>
                            <div class="grid w-full grid-cols-1 gap-4 py-2 md:grid-cols-2">

                                <div class="flex w-full flex-col md:w-auto">
                                    <label class="label mb-1 font-medium"> Name of the image type </label>
                                    <input name="type_name" type="text" class="input"
                                        value="{{ old('type_name') ?? ($imageSetting->type_name ?? '') }}" required />
                                </div>
                            </div>
                            <div class="grid w-full grid-cols-1 gap-4 py-2 md:grid-cols-2">
                                <div class="flex w-full flex-col md:w-auto">
                                    <label class="label mb-1 font-medium">Width (pixels)</label>
                                    <input name="width" type="number" class="input"
                                        value="{{ old('width') ?? ($imageSetting->width ?? '') }}" required />
                                </div>

                            </div>
                            <div class="grid w-full grid-cols-1 gap-4 py-2 md:grid-cols-2">

                                <div class="flex w-full flex-col md:w-auto">
                                    <label class="label mb-1 font-medium">Height (pixels)</label>
                                    <input name="height" type="number" class="input"
                                        value="{{ old('height') ?? ($imageSetting->height ?? '') }}" required />
                                </div>
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
                            <p class="mb-4 p-0 text-sm font-normal text-slate-400">Better organize your Image Setting</p>
                            <div class="flex flex-col gap-4">
                                <div>
                                    <label class="label label-required mb-1 font-medium" for="status"> Image Setting On
                                    </label>
                                    <select name="work_on[]" class="tom-select" multiple=[] id="discountOn">
                                        @foreach ($workOns as $workOn)
                                            @if ($workOn->work_on == 'product')
                                                <option value="product" selected>
                                                    Products
                                                </option>
                                            @elseif ($workOn->work_on == 'category')
                                                <option value="category" selected>
                                                    Categories
                                                </option>
                                            @elseif ($workOn->work_on == 'brand')
                                                <option value="brand" selected>
                                                    Brands
                                                </option>
                                            @endif
                                        @endforeach
                                        {{-- @foreach ($workOns as $workOn)
                                            @if ($workOn->work_on == 'category')
                                                <option value="category" selected>
                                                    Categories
                                                </option>
                                            @else
                                                <option value="category">
                                                    Categories
                                                </option>
                                            @endif
                                        @endforeach
                                        @foreach ($workOns as $workOn)
                                            @if ($workOn->work_on == 'category')
                                                <option value="brand" selected>
                                                    Brands
                                                </option>
                                            @else
                                                <option value="brand">
                                                    Brands
                                                </option>
                                            @endif
                                        @endforeach --}}
                                        <option value="product">
                                            Products
                                        </option>
                                        <option value="category">
                                            Categories
                                        </option>
                                        <option value="brand">
                                            Brands
                                        </option>

                                    </select>
                                </div>
                            </div>
                            <div class="flex flex-col gap-4">
                                <div>
                                    <label class="label label-required mb-1 font-medium" for="status"> Status
                                    </label>
                                    <select name="status" class="select" id="status">
                                        <option value="0" {{ $imageSetting->status == '0' ? 'selected' : '' }}>
                                            In Active
                                        </option>
                                        <option value="1" {{ $imageSetting->status == '1' ? 'selected' : '' }}>
                                            Active
                                        </option>
                                    </select>
                                </div>
                            </div>

                        </div>
                    </section>
                    <div class="mt-6 flex w-full items-center justify-end">
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                    <!-- Right Side Div End  -->
                </div>
            </form>
            <!-- Edit Image Setting Page Ends -->
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

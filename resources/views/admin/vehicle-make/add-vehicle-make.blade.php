@extends('layouts.admin.master')
@section('title')
    Admin - Add Make
@endsection
@section('content')
    <div class="content">
        <!-- Main Content Starts -->
        <main class="container flex-grow p-4 sm:p-6">
            <!-- Page Title Starts -->
            <div class="mb-6 flex flex-col justify-between gap-y-1 sm:flex-row sm:gap-y-0">
                <h5>ADD Make</h5>

                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="/">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="#">Ecommerce</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="#">Add Make</a>
                    </li>
                </ol>
            </div>
            <!-- Page Title Ends -->

            <!-- Edit Product Page Starts -->
            <form class="" action="{{ route('vehicle-make.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="p-4 mb-4 text-sm text-red-500 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                    role="alert">
                    @error('name')
                        {{ $message }}
                    @enderror
                </div>

                <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
                    <!-- Left side Div Start -->
                    <section class="flex flex-col gap-8 lg:col-span-2">
                        <!-- General  -->
                        <div class="rounded-primary bg-white p-6 shadow-sm dark:bg-slate-800">
                            <h5 class="m-0 p-0 text-xl font-semibold text-slate-700 dark:text-slate-200">General
                            </h5>
                            <p class="mb-4 p-0 text-sm font-normal text-slate-400">
                                Basic information of Make
                            </p>

                            <div class="py-2">
                                <label class="label label-required mb-1 font-medium" for="name">Make Name
                                </label>
                                <input type="text" class="input" name="name" id="name" value="Apple" />
                            </div>

                            <div class="py-2">
                                <label class="label label-required mb-1 font-medium"> Description </label>
                                <textarea class="textarea text-start" name="description" rows="5" placeholder="Write message">You can find components related towheels & tyres here aswheels, tyres, TPMS sensors, center caps, etc
                                            </textarea>
                            </div>
                            <div class="py-2">
                                <label class="label label-required mb-1 font-medium" for="name">Website Link
                                </label>
                                <input type="text" class="input" id="link" name="link" value=""
                                    placeholder="Website Link" />
                            </div>
                        </div>

                        <!-- Logo  -->
                        <div class="rounded-primary bg-white p-6 shadow-sm dark:bg-slate-800">
                            <h5 class="m-0 p-0 text-xl font-semibold text-slate-700 dark:text-slate-200">Logo</h5>
                            <p class="mb-4 p-0 text-sm font-normal text-slate-400">
                                Show Make with high-quality images
                            </p>
                            <div id="dropzone-Make-edit" class="dropzone my-5">
                                <div class="dz-message">
                                    <i class="text-slate-500 dark:text-slate-300" width="48" height="48"
                                        data-feather="image"></i>
                                    <p class="max-w-xs text-slate-500 dark:text-slate-300">
                                        Drag & Drop your media files to upload or
                                        <a class="text-primary-500 transition-colors duration-150 hover:text-primary-600 hover:underline"
                                            href="#">
                                            click to browse
                                        </a>
                                    </p>
                                </div>
                                <!-- Fallback for no JavaScript -->
                                <div class="fallback">
                                    <input name="image" type="file" />
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
                            <p class="mb-4 p-0 text-sm font-normal text-slate-400">Better organize your Make</p>
                            <div class="flex flex-col gap-4">
                                <div>
                                    <label class="label label-required mb-1 font-medium" for="status"> Status
                                    </label>
                                    <select name="status" class="select" id="status">
                                        <option value="0">Draft</option>
                                        <option value="1">Inactive</option>
                                        <option value="2">Active</option>
                                    </select>
                                </div>


                            </div>
                        </div>
                    </section>
                    <!-- Right Side Div End  -->
                    <div class="mt-6 flex w-full items-center justify-end">
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </div>
            </form>
            <!-- Edit Product Page Ends -->
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

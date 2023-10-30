@extends('layouts.admin.master')
@section('title')
    Admin - Image Setting List
@endsection
@section('content')
    <div class="content">
        <!-- Main Content Starts -->
        <main class="container flex-grow p-4 sm:p-6">
            <!-- Page Title Starts -->
            <div class="mb-6 flex flex-col justify-between gap-y-1 sm:flex-row sm:gap-y-0">
                <h5>Image Setting List</h5>

                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="/">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="#">Ecommerce</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="#">Image Setting List</a>
                    </li>
                </ol>
            </div>
            <!-- Page Title Ends -->

            <!-- Image Setting List Starts -->
            <div class="space-y-4">
                <!-- Image Setting Header Starts -->
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

                        <a class="btn btn-primary" href="{{ route('image-setting.create') }}" role="button">
                            <i data-feather="plus" height="1rem" width="1rem"></i>
                            <span class="hidden sm:inline-block">Add Image Setting</span>
                        </a>
                    </div>
                    <!-- Customer Action Ends -->
                </div>
                <!-- Image Setting Header Ends -->

                <!-- Image Setting Table Starts -->
                <div class="table-responsive whitespace-nowrap rounded-primary">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="w-[40%] uppercase">Sl No</th>
                                <th class="w-[40%] uppercase">Name</th>
                                <th class="w-[40%] uppercase">Width</th>
                                <th class="w-[10%] uppercase">height</th>
                                <th class="w-[10%] uppercase">Product</th>
                                <th class="w-[10%] uppercase">Categories</th>
                                {{-- <th class="w-[10%] uppercase">Brands</th> --}}
                                <th class="w-[10%] uppercase">Status</th>
                                <th class="w-[5%] !text-right uppercase">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                                $count = 0;
                            @endphp
                            @foreach ($image_settings as $image_setting)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td> {{ $image_setting->type_name }}</td>
                                    <td> {{ $image_setting->width }}</td>
                                    <td> {{ $image_setting->height }}</td>
                                    <td>

                                        @foreach ($work_ons as $work_on)
                                            @if ($work_on->work_on == 'product' && $image_setting->id == $work_on->type_id)
                                                @php
                                                    $count = 1;
                                                @endphp
                                                <div class="badge badge-soft-success">
                                                    &#10003
                                                </div>
                                            @endif
                                        @endforeach

                                        @if ($count != 1)
                                            <div class="badge badge-soft-danger">
                                                &#10006
                                            </div>
                                        @endif
                                    </td>
                                    @php
                                        $count = 0;
                                    @endphp
                                    <td>

                                        @foreach ($work_ons as $work_on)
                                            @if ($work_on->work_on == 'category' && $image_setting->id == $work_on->type_id)
                                                @php
                                                    $count = 1;
                                                @endphp
                                                <div class="badge badge-soft-success">
                                                    &#10003
                                                </div>
                                            @endif
                                        @endforeach

                                        @if ($count != 1)
                                            <div class="badge badge-soft-danger">
                                                &#10006
                                            </div>
                                        @endif
                                    </td>
                                    @php
                                        $count = 0;
                                    @endphp
                                    {{-- <td>

                                        @foreach ($work_ons as $work_on)
                                            @if ($work_on->work_on == 'brand' && $image_setting->id == $work_on->type_id)
                                                @php
                                                    $count = 1;
                                                @endphp
                                                <div class="badge badge-soft-success">
                                                    &#10003
                                                </div>
                                            @endif
                                        @endforeach

                                        @if ($count != 1)
                                            <div class="badge badge-soft-danger">
                                                &#10006
                                            </div>
                                        @endif
                                    </td> --}}
                                    @php
                                        $count = 0;
                                    @endphp
                                    <td>
                                        <div class="badge badge-soft-success">
                                            {{ $image_setting->status == '0' ? 'In Active' : '' }}
                                            {{ $image_setting->status == '1' ? 'Active' : '' }}
                                        </div>
                                    </td>
                                    <td>
                                        <div class="flex justify-end">
                                            <div class="dropdown" data-placement="bottom-start">
                                                <div class="dropdown-toggle">
                                                    <i class="w-6 text-slate-400" data-feather="more-horizontal"></i>
                                                </div>
                                                <div class="dropdown-content w-40">
                                                    <ul class="dropdown-list">
                                                        {{-- <li class="dropdown-list-item">
                                                            <a href="{{ route('image-setting.show', ['image_setting' => $image_setting->id]) }}"
                                                                class="dropdown-link">
                                                                <i class="h-5 text-slate-400"
                                                                    data-feather="external-link"></i>
                                                                <span>Details</span>
                                                            </a>
                                                        </li> --}}
                                                        <li class="dropdown-list-item">
                                                            <a href="{{ route('image-setting.edit', ['image_setting' => $image_setting->id]) }}"
                                                                class="dropdown-link">
                                                                <i class="h-5 text-slate-400" data-feather="edit"></i>Edit
                                                            </a>
                                                        </li>
                                                        <li class="dropdown-list-item">
                                                            <a class="dropdown-link">
                                                                <i class="h-5 text-slate-400" data-feather="trash"></i>
                                                                <form
                                                                    action="{{ route('image-setting.destroy', ['image_setting' => $image_setting->id]) }}"
                                                                    method="post">
                                                                    @method('DELETE')
                                                                    @csrf
                                                                    <input type="hidden"
                                                                        value="{{ $image_setting->id }}" name="order_id">
                                                                    <input type="submit" value="Delete"
                                                                        onclick="return confirm('Do you want to Delete Image Setting !')">
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
                <!-- Image Setting Table Ends -->



                <!-- Image Setting Pagination Starts -->
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
                <!-- Image Setting Pagination Ends -->
                <!-- Image Regenerate thumbnails Starts -->
                <form class="" action="{{ route('regenerate-thumbnails') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="p-4 mb-4 text-sm text-red-500 rounded-lg  dark:bg-gray-800 dark:text-red-400"
                        role="alert">
                        @error('name')
                            {{ $message }}
                        @enderror
                    </div>
                    <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
                        <!-- Left side Div Start -->

                        <!-- Left Side Div End  -->

                        <!-- Right Side Div Start  -->
                        <section class="h-full lg:col-span-1">
                            <!-- Organization -->
                            <div class="sticky top-20 rounded-primary bg-white p-6 shadow dark:bg-slate-800">
                                <h5 class="m-0 p-0 text-xl font-semibold text-slate-700 dark:text-slate-200">
                                    Regenerate thumbnails</h5>
                                <p class="mb-4 p-0 text-sm font-normal text-slate-400"> </p>
                                <div class="flex flex-col gap-4">

                                    <div class="flex flex-col gap-4">
                                        <div>
                                            <label class="label  mb-1 font-medium" for="status"> Select an image
                                            </label>
                                            <select name="worksOn" id="worksOn" class="select">
                                                <option value="all">All</option>
                                                <option value="product">Product</option>
                                                <option value="category">Categories</option>
                                                {{-- <option value="brand">Brands</option> --}}
                                            </select>
                                        </div>
                                    </div>
                                    <div>
                                        <label class="label label-required mb-1 font-medium" for="status"> Select a
                                            format
                                        </label>
                                        <select name="setting_type" class="select" id="imageSetting">
                                            <option value=""></option>

                                        </select>
                                    </div>
                                    <div class="mt-6 flex w-full items-center justify-end">
                                        <button class="btn btn-primary" type="submit">Submit</button>
                                    </div>
                                </div>

                            </div>
                        </section>
                        <!-- Right Side Div End  -->
                    </div>
                </form>
                <!-- Image Regenerate thumbnails Ends -->
            </div>
            <!-- Image Setting List Ends -->
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
@section('js')
    <script>
        // Get a reference to the select element
        const worksOn = document.getElementById('worksOn');
        // let optionsHTMLStr = ""
        var worksOnValue;
        // Add an event listener to listen for the "change" event
        worksOn.addEventListener('change', function() {
            // Get the selected value
            worksOnValue = worksOn.value;
            // Do something with the selected value, for example, log it to the console
            const dataToSend = {
                make_id: worksOnValue,
            };
            var select = document.getElementById('imageSetting');
            axios.post('/get-image-settings', dataToSend)
                .then(function(response) {
                    // console.log(response);
                    var imageSetting = document.getElementById('imageSetting'),
                        optionsHTML_Arr = [],
                        j = response.data.length;
                    // console.log(response.data);
                    optionsHTML_Arr.push(
                        `<option value="all">All</option>`
                    );
                    for (var i = 0; i < j; i++) {
                        // console.log(response.data[i].id);
                        // console.log(response.data[i].name);
                        data = response.data[i].status;
                        // console.log(data);
                        if (response.data[i].status == 1) {
                            optionsHTML_Arr.push(
                                `<option value="${response.data[i].id}"> ${response.data[i].type_name}</option>`
                            );
                        }

                    }
                    imageSetting.innerHTML = optionsHTML_Arr.join('');
                    // console.log(optionsHTML_Arr);
                    // console.log(response.data);
                })
                .catch(function(error) {
                    console.error("Error making the Axios POST request:", error);
                });
        });
    </script>
@endsection

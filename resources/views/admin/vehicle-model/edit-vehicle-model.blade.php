@extends('layouts.admin.master')
@section('title')
    Admin - Edit Model
@endsection
@section('content')
    <div class="content">
        <!-- Main Content Starts -->
        <main class="container flex-grow p-4 sm:p-6">
            <!-- Page Title Starts -->
            <div class="mb-6 flex flex-col justify-between gap-y-1 sm:flex-row sm:gap-y-0">
                <h5>Edit Vehicle model</h5>

                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="/">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="#">Ecommerce</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="#">Edit Vehicle model</a>
                    </li>
                </ol>
            </div>
            <!-- Page Title Ends -->

            <!-- Edit Product Page Starts -->
            <form class="" action="{{ route('vehicle-model.update', ['vehicle_model' => $vehicle_model->id]) }}"
                method="POST">
                @method('PUT')
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
                                Basic information of Vehicle model
                            </p>
                            <div class="py-2">
                                <label class="label label-required mb-1 font-medium" for="name">Vehicle model Name
                                </label>
                                <input type="text" name="name" class="input" id="name"
                                    value="{{ $vehicle_model->name }}" />
                            </div>
                            <div class="py-2">
                                <label class="label  mb-1 font-medium"> Description </label>
                                <textarea name="description" class="textarea text-start" rows="5" placeholder="Write message">{{ $vehicle_model->description }} </textarea>
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
                            <p class="mb-4 p-0 text-sm font-normal text-slate-400">Better organize your Vehicle model</p>
                            <div class="flex flex-col gap-4">
                                <div>
                                    <label class="label label-required mb-1 font-medium" for="status"> Status
                                    </label>
                                    <select name="status" class="select" id="status">
                                        <option value="0" {{ $vehicle_model->status == 0 ? 'selected' : '' }}>Draft
                                        </option>
                                        <option value="1" {{ $vehicle_model->status == 1 ? 'selected' : '' }}>Inactive
                                        </option>
                                        <option value="2" {{ $vehicle_model->status == 2 ? 'selected' : '' }}>Active
                                        </option>
                                    </select>
                                </div>

                                <div>
                                    <label class="label mb-1 font-medium" for="vendor">Vehicle Make</label>
                                    <select name="make_id" class="tom-select" autocomplete="off">

                                        @foreach ($vehicle_makes as $vehicle_make)
                                            @if ($vehicle_make->id == $vehicle_model->make_id)
                                                <option selected value="{{ $vehicle_make->id }}">{{ $vehicle_make->name }}
                                                </option>
                                            @endif
                                            <option value="{{ $vehicle_make->id }}">{{ $vehicle_make->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                {{-- <div>
                                        <label class="label mb-1 font-medium" for="vendor">Engine Fuel Type  </label>
                                        <select name="engine_id" class="tom-select"  autocomplete="off">
                                            @foreach ($engine_types as $engine_type)
                                            @if ($engine_type->name == $vehicle_model->engine_id)
                                            <option selected value="{{$engine_type->name}}">{{$engine_type->name}}</option>
                                            @endif
                                            <option value="{{$engine_type->name}}">{{$engine_type->name}}</option>
                                            @endforeach
                                        </select>
                                    </div> --}}
                            </div>
                        </div>
                    </section>
                    <!-- Right Side Div End  -->
                    <div class="mt-6 flex w-full items-center justify-end">
                        <button class="btn btn-primary" type="submit">Update</button>
                    </div>
            </form>

    </div>
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

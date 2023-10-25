@extends('layouts.admin.master')

@section('title')
    Admin - Add Category
@endsection

@section('content')
    <div class="content">
        <!-- Main Content Starts -->
        <main class="container flex-grow p-4 sm:p-6">
            <!-- Page Title Starts -->
            <div class="mb-6 flex flex-col justify-between gap-y-1 sm:flex-row sm:gap-y-0">
                <h5>ADD Category</h5>

                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="/">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="#">Ecommerce</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="#">Add Category</a>
                    </li>
                </ol>
            </div>

            <!-- Page Title Ends -->

            <!-- Edit Product Page Starts -->
            <form action="{{ route('e-commerce.save-category') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="p-4 mb-4 text-sm text-red-500 rounded-lg  dark:bg-gray-800 dark:text-red-400"
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
                                {{ __('Basic information of category') }}
                            </p>
                            <div class="py-2">
                                <label class="label label-required mb-1 font-medium" for="name">Category Name
                                </label>
                                <input type="text" name="name" class="input" id="name" value="Repair Parts" />
                            </div>


                            <div class="py-2">
                                <label class="label label-required mb-1 font-medium"> Description </label>
                                <textarea name="description" class="textarea text-start" rows="5" placeholder="Write message">You can find components related towheels & tyres here aswheels, tyres, TPMS sensors, center caps, etc
                                     </textarea>
                            </div>
                        </div>

                        <!-- Media  -->
                        <div class="rounded-primary bg-white p-6 shadow-sm dark:bg-slate-800">
                            <h5 class="m-0 p-0 text-xl font-semibold text-slate-700 dark:text-slate-200">Media</h5>
                            <p class="mb-4 p-0 text-sm font-normal text-slate-400">
                                {{ __('Showcase your Category with high-quality images') }}
                            </p>
                            <div id="dropzone-category-edit" class="dropzone my-5">
                                <div class="dz-message">
                                    <i class="text-slate-500 dark:text-slate-300" width="48" height="48"
                                        data-feather="image"></i>
                                    <p class="max-w-xs text-slate-500 dark:text-slate-300">
                                        {{ __('Drag & Drop your media files to upload or') }}
                                        <a class="text-primary-500 transition-colors duration-150 hover:text-primary-600 hover:underline"
                                            href="#">
                                            {{ __('click to browse') }}
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
                            <p class="mb-4 p-0 text-sm font-normal text-slate-400">Better organize your Category</p>
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
                                <div>
                                    <label class="label mb-1 font-medium" for="vendor"> Parent Category </label>
                                    <select name="parent_id" class="tom-select" autocomplete="off">
                                        <option value=""></option>
                                        @foreach ($categories as $category)
                                            @if ($category->parent_id == null)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                {{-- <div>
                                        <label class="label  mb-1 font-medium" for="category">Parent Category
                                        </label>
                                        <select name="parent_id" class="select" id="category">
                                            <option value="Electronics">Electronics</option>
                                            <option value="Fashion">Fashion</option>
                                            <option value="Health Care">Health Care</option>
                                        </select>
                                    </div> --}}

                            </div>
                        </div>
                    </section>
                    <!-- Right Side Div End  -->
                    <div class="mt-6 flex w-full items-center justify-end">
                        <button class="btn btn-primary" type="submit">Submit</button>
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
@section('js')
    <script type="module">
        import Dropzone from 'dropzone';

        new Dropzone('#dropzone-category-edit', {
                url: location.href, //Current Page
                maxFiles: 5,
                maxFilesize: 5,
                addRemoveLinks: true,
                init: function() {
                    const files = [{
                            id: 1,
                            name: 'Product 1',
                            size: 23986,
                            url: '/images/product1.png',
                        },

                    ];

                    files.forEach((file) => {
                        const {
                            id,
                            name,
                            size,
                            url
                        } = file;
                        this.files.push(file);
                        this.displayExistingFile({
                            id,
                            name,
                            size
                        }, url);
                    });

                    this.options.maxFiles = this.options.maxFiles - files.length;

                    this.on('removedfile', (file) => {
                        this.files = this.files.filter((f) => f.id !== file.id);
                        this.options.maxFiles = files.length - this.files.length;
                    });
                },
            }

        );
    </script>
@endsection

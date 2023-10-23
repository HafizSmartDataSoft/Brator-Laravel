@extends('layouts.admin.master')
@section('title')
    Admin - Edit Product
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
                <h5>Edit Product </h5>

                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="/">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="#">Ecommerce</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="#">Product Edit</a>
                    </li>
                </ol>
            </div>
            <!-- Page Title Ends -->

            <!-- Edit Product Page Starts -->
            <form class="" id="myForm" action="{{ route('product.update', ['product' => $product->sku]) }}"
                method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="p-4 mb-4 text-sm text-red-500 rounded-lg  dark:bg-gray-800 dark:text-red-400" role="alert">
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

                    {{-- @error('parent_category')
                        {{ $message }}
                    @enderror --}}

                </div>
                <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
                    <!-- Left side Div Start -->
                    <section class="flex flex-col gap-8 lg:col-span-2">
                        <!-- General  -->
                        <div class="rounded-primary bg-white p-6 shadow-sm dark:bg-slate-800">
                            <h5 class="m-0 p-0 text-xl font-semibold text-slate-700 dark:text-slate-200">General
                            </h5>
                            <p class="mb-4 p-0 text-sm font-normal text-slate-400">
                                Basic information of your product
                            </p>

                            <div class="py-2">
                                <label class="label label-required mb-1 font-medium" for="name">Product Name
                                </label>
                                <input name="name" type="text" class="input" id="name"
                                    value="{{ old('name') ?? ($product->name ?? '') }}" />
                            </div>
                            <div class="py-2">
                                <label class="label label-required mb-1 font-medium" for="code">SKU
                                </label>
                                <input name="sku" type="text" class="input" id="code"
                                    value="{{ old('sku') ?? ($product->sku ?? '') }}" />
                            </div>
                            <div class="py-2">
                                <label class="label label-required mb-1 font-medium"> Description </label>
                                <textarea name="description" class="textarea text-start" rows="5" placeholder="Write message"> {{ $product->description }}</textarea>
                            </div>
                        </div>
                        <!-- Pricing  -->
                        <div class="rounded-primary bg-white p-6 shadow-sm dark:bg-slate-800">
                            <h5 class="m-0 p-0 text-xl font-semibold text-slate-700 dark:text-slate-200">Pricing
                            </h5>
                            <p class="mb-4 p-0 text-sm font-normal text-slate-400">
                                Set your pricing strategies to stay ahead of the competition
                            </p>
                            <div class="grid w-full grid-cols-1 gap-4 py-2 md:grid-cols-2">
                                <div class="flex w-full flex-col md:w-auto">
                                    <label class="label label-required mb-1 font-medium" for="base-price"> Base
                                        Price </label>
                                    <input name="base_price" type="text" class="input" id="base-price"
                                        value="{{ old('base_price') ?? ($product->base_price ?? '') }}" />
                                    <p class="help-text mt-1">Set the product regular price</p>
                                </div>
                                <div class="flex w-full flex-col md:w-auto">
                                    <label class="label mb-1 font-medium" for="sale-price"> Sale Price </label>
                                    <input name="sale_price" type="text" class="input" id="sale-price"
                                        value="{{ old('sale_price') ?? ($product->sale_price ?? '') }}" />
                                    <p class="help-text mt-1">Set the product offer price</p>
                                </div>
                            </div>
                            <div class="grid w-full grid-cols-1 gap-4 py-2 md:grid-cols-2">
                                <div class="flex w-full flex-col md:w-auto">
                                    <label class="label mb-1 font-medium" for="cost-price"> Cost Price </label>
                                    <input name="cost_price" type="text" class="input" id="cost-price"
                                        value="{{ old('cost_price') ?? ($product->cost_price ?? '') }}" />
                                    <p class="help-text mt-1">Set the cost price of the product</p>
                                </div>
                                <div class="flex w-full flex-col md:w-auto">
                                    <label class="label mb-1 font-medium" for="tax-amount"> Tax Amount (%) </label>
                                    <input name="tax" type="text" class="input" id="tax-amount"
                                        value="{{ old('tax') ?? ($product->tax ?? '') }}" />
                                    <p class="help-text mt-1">Set the product tax amount in percentage (%)</p>
                                </div>
                            </div>
                        </div>

                        <!-- Featured image  -->
                        <div class="rounded-primary bg-white p-6 shadow-sm dark:bg-slate-800">
                            <h5 class="m-0 p-0 text-xl font-semibold text-slate-700 dark:text-slate-200">Featured
                                Image</h5>
                            <p class="mb-4 p-0 text-sm font-normal text-slate-400">
                                {{ __('Current Featured Image') }}
                            </p>
                            @if ($product->featured_image != null)
                                <img src="{{ asset($product->featured_image) }}"
                                    class="h-10 w-10 rounded-primary border border-slate-300 dark:border-slate-400"
                                    alt="Category" />
                            @else
                                <img src="{{ asset('adminAsset/no-image/noimage.jpeg') }}"
                                    class="h-10 w-10 rounded-primary border border-slate-300 dark:border-slate-400"
                                    alt="Category" />
                            @endif

                            <p class="mb-4 p-0 text-sm font-normal text-slate-400">
                                {{ __('Change your Featured Image') }}
                            </p>
                            <div id="dropzone-product2-edit" class="dropzone my-5">
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
                                    <input name="featured_image" type="file" />
                                </div>
                            </div>
                        </div>
                        <!-- Gallary  -->
                        <!-- Example of a form that Dropzone can take over -->



                        <div class="rounded-primary bg-white p-6 shadow-sm dark:bg-slate-800">
                            <h5 class="m-0 p-0 text-xl font-semibold text-slate-700 dark:text-slate-200">Gallary
                            </h5>
                            <p class="mb-4 p-0 text-sm font-normal text-slate-400">
                                Available Images
                            </p>
                            @if (count($gallaryImages) != 0)
                                {{-- <div style="white-space: nowrap;"> --}}
                                @foreach ($gallaryImages as $gallaryImage)
                                    <img src="{{ asset($gallaryImage->image) }}"
                                        class="h-10 w-10 rounded-primary border border-slate-300 dark:border-slate-400"
                                        alt="Category" style="display: inline-block; margin-right: 10px;" />
                                @endforeach
                                {{-- </div> --}}
                            @else
                                <img src="{{ asset('adminAsset/no-image/noimage.jpeg') }}"
                                    class="h-10 w-10 rounded-primary border border-slate-300 dark:border-slate-400"
                                    alt="Category" />
                            @endif
                            <!-- Dropzone container -->
                            <div id="myDropzone" class="dropzone">
                                <div class="dz-message">
                                    <span>Maximum 4 files can be Uploaded, <br>
                                        Drop files here or click to upload.</span>
                                </div>
                            </div>
                            {{-- <div id="myDropzone" class="dropzone">
                                <div class="dz-message">
                                    <span>Drop files here or click to upload.</span>
                                </div>
                            </div> --}}
                            {{-- <div id="dropzone-product-edit" class="dropzone my-5">
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
                                    <input name="gallary_image[]" type="file" multiple />
                                </div>
                            </div> --}}
                        </div>
                        <!-- Inventory  -->
                        <div class="rounded-primary bg-white p-6 shadow-sm dark:bg-slate-800">
                            <h5 class="m-0 p-0 text-xl font-semibold text-slate-700 dark:text-slate-200">Inventory
                            </h5>
                            <p class="mb-4 p-0 text-sm font-normal text-slate-400">Manage and track your product
                                stocks</p>
                            <!-- <div class="grid w-full grid-cols-1 gap-4 py-2 md:grid-cols-2">
                                                                                                                                                                                                                                                                                                                                    <div class="flex w-full flex-col md:w-auto">
                                                                                                                                                                                                                                                                                                                                        <label class="label label-required mb-1 font-medium" for="sku"> SKU </label>
                                                                                                                                                                                                                                                                                                                                        <input type="text" class="input" id="sku" value="MBP1001" />
                                                                                                                                                                                                                                                                                                                                        <p class="help-text mt-1">Product Stock Keeping Unit</p>
                                                                                                                                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                                                                                                                                    <div class="flex w-full flex-col md:w-auto">
                                                                                                                                                                                                                                                                                                                                        <label class="label mb-1 font-medium" for="sale-price"> Barcode </label>
                                                                                                                                                                                                                                                                                                                                        <input type="text" class="input" id="sale-price" value="MBP1001" />
                                                                                                                                                                                                                                                                                                                                        <p class="help-text mt-1">Supported Format (ISBN, UPC, GTIN, etc.)</p>
                                                                                                                                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                                                                                                                                </div> -->
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
                            <!-- <div class="grid w-full grid-cols-1 gap-4 py-2 md:grid-cols-2">
                                                                                                                                                                                                                                                                                                                                    <div class="flex w-full flex-col md:w-auto">
                                                                                                                                                                                                                                                                                                                                        <label class="label label-required mb-1 font-medium" for="sku"> Minimum Order
                                                                                                                                                                                                                                                                                                                                            QTY
                                                                                                                                                                                                                                                                                                                                        </label>
                                                                                                                                                                                                                                                                                                                                         <input name="year_id" type="text" class="input" id="sku" value="01" />
                                                                                                                                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                                                                                                                                    <div class="flex w-full flex-col md:w-auto">
                                                                                                                                                                                                                                                                                                                                        <label class="label mb-1 font-medium" for="sale-price"> Max Order QTY </label>
                                                                                                                                                                                                                                                                                                                                         <input name="year_id" type="text" class="input" id="sale-price" value="10" />
                                                                                                                                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                                                                                                                                </div> -->
                        </div>

                    </section>
                    <!-- Left Side Div End  -->

                    <!-- Right Side Div Start  -->
                    <section class="h-full lg:col-span-1">
                        <!-- Organization -->
                        <div class="sticky top-20 rounded-primary bg-white p-6 shadow dark:bg-slate-800">
                            <h5 class="m-0 p-0 text-xl font-semibold text-slate-700 dark:text-slate-200">
                                Organization</h5>
                            <p class="mb-4 p-0 text-sm font-normal text-slate-400">Better organize your product</p>
                            <div class="flex flex-col gap-4">
                                <div>
                                    <label class="label label-required mb-1 font-medium" for="status"> Status
                                    </label>
                                    <select name="status" class="select" id="status">
                                        <option value="0" {{ $product->status == 0 ? 'selected' : '' }}>
                                            Draft
                                        </option>
                                        <option value="1" {{ $product->status == 1 ? 'selected' : '' }}>
                                            Inactive
                                        </option>
                                        <option value="2" {{ $product->status == 2 ? 'selected' : '' }}>
                                            Active
                                        </option>

                                        <option value="3" {{ $product->status == 3 ? 'selected' : '' }}>Out
                                            Stock</option>

                                    </select>
                                </div>

                                <div>
                                    <label class="label label-required mb-1 font-medium" for="category"> Category</label>

                                    <ul id="tree">
                                        @foreach ($categories as $category)
                                            <li>
                                                <label class="label  mb-1 font-medium"><input name="parent_category"
                                                        value="{{ $category->id }}" type="checkbox"
                                                        class="checkbox checkbox-primary parent-checkbox"
                                                        data-id="{{ $category->id }}"
                                                        {{ $product->parent_category == $category->id ? 'Checked' : '' }}>{{ $category->name }}
                                                </label>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>

                                <div>
                                    <label class="label mb-1 font-medium" for="vendor"> Tags </label>
                                    <select name="tag[]" class="tom-select" multiple="" autocomplete="off">
                                        @foreach ($tags as $tag)
                                            {{-- @dd(count($products_tags)) --}}
                                            @if (count($products_tags) != 0)
                                                @foreach ($products_tags as $products_tag)
                                                    @if ($products_tag->tag_id == $tag->id)
                                                        <option selected value="{{ $tag->id }}">{{ $tag->name }}
                                                        </option>
                                                    @else
                                                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                                    @endif
                                                @endforeach
                                            @else
                                                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>

                                <div>
                                    <label class="label mb-1 font-medium" for="vendor"> Make </label>
                                    <select name="make_id" class="tom-select" id="makeSelect" autocomplete="off">
                                        <option value=""> </option>
                                        @foreach ($vehicle_makes as $vehicle_make)
                                            <option value="{{ $vehicle_make->id }}"
                                                {{ $vehicle_make->id == $product->make_id ? 'selected' : '' }}>
                                                {{ $vehicle_make->name }} </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div>
                                    <label class="label mb-1 font-medium" for="vendor">Model</label>
                                    <select name="model_id" id="modelSelect"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 mb-6 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        autocomplete="off" id="modelSelect">
                                        {{-- <option value=""> </option> --}}

                                        @foreach ($vehicle_models as $vehicle_model)
                                            @if ($vehicle_model->id == $product->model_id)
                                                <option value="{{ $vehicle_model->id }}"> {{ $vehicle_model->name }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>

                                <div>
                                    <label class="label mb-1 font-medium" for="vendor">Year</label>
                                    <select name="year_id" id="yearSelect"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 mb-6 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        autocomplete="off">
                                        {{-- <option value=""> </option> --}}

                                        @foreach ($vehicle_years as $vehicle_year)
                                            @if ($vehicle_year->id == $product->year_id)
                                                <option value="{{ $vehicle_year->id }}">{{ $vehicle_year->year }}
                                                </option>
                                            @endif
                                        @endforeach
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
    <script>
        var previousParent;
        // Function to add child checkboxes dynamically
        function addChildCheckboxes(checkbox) {
            previousParent = checkbox;
            const parentLi = checkbox.closest('li');
            const parentId = checkbox.getAttribute('data-id');
            var category = @json($categories);
            var product = @json($product);

            var sub_categories = @json($sub_categories->pluck('sub_category_id')->toArray());
            // console.log(sub_categories.length);

            const ul = document.createElement('ul');
            ul.classList.add('child-ul');

            category.forEach(function(parent) {
                if (parentId == parent.id) {
                    parent.children.forEach(function(childrenEntry) {
                        const li = document.createElement('li');
                        if (product.parent_category == parentId && sub_categories.length != 0) {
                            sub_categories.forEach(function(sub_category) {
                                if (childrenEntry.id == sub_category) {
                                    const li = document.createElement('li');
                                    li.innerHTML = `
                                            <label for="checkbox-sm" class="label label-sm child-checkbox">
                                                <input name="sub_category[]" value="${childrenEntry.id}"
                                                    id="checkbox-sm" class="checkbox checkbox-sm" type="checkbox"
                                                Checked> ${childrenEntry.name}
                                            </label>
                                        `;
                                    ul.appendChild(li);
                                } else if (!sub_categories.includes(childrenEntry.id
                                        .toString())) {
                                    li.innerHTML = `
                                            <label for="checkbox-sm" class="label label-sm child-checkbox">
                                                <input name="sub_category[]" value="${childrenEntry.id}"
                                                    id="checkbox-sm" class="checkbox checkbox-sm" type="checkbox"
                                                > ${childrenEntry.name}
                                            </label>
                                        `;
                                }
                                ul.appendChild(li); // Append the child li to the ul
                            });
                        } else {
                            li.innerHTML = `
                                            <label for="checkbox-sm" class="label label-sm child-checkbox">
                                                <input name="sub_category[]" value="${childrenEntry.id}"
                                                    id="checkbox-sm" class="checkbox checkbox-sm" type="checkbox"
                                                > ${childrenEntry.name}
                                            </label>
                                        `;
                            ul.appendChild(li);
                        }
                    });
                }
            });
            parentLi.appendChild(ul);
        }

        // Edit event listeners to handle checkbox changes for parent checkboxes
        const parentCheckboxes = document.querySelectorAll('input.parent-checkbox');
        // console.log(parentCheckboxes);
        parentCheckboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                if (this.checked) {
                    const childUl = previousParent && previousParent.closest('li') && previousParent
                        .closest('li').querySelector('.child-ul');
                    // if (childUl) {
                    //     childUl.remove();
                    // }
                    // console.log(childUl);
                    if (childUl) {
                        previousParent.checked = false;
                        childUl.remove();
                    }
                    // console.log(previousParent);
                    addChildCheckboxes(this);
                    // console.log(previousParent);
                    // console.log(previousParent);
                } else {
                    const childUl = this.closest('li').querySelector('.child-ul');
                    if (childUl) {
                        childUl.remove();
                    }
                }
            });
        });
    </script>
    <script>
        // Get a reference to the select element
        const makeSelect = document.getElementById('makeSelect');
        // let optionsHTMLStr = ""
        var selectedMake;
        // Edit an event listener to listen for the "change" event
        makeSelect.addEventListener('change', function() {
            // Get the selected value
            selectedMake = makeSelect.value;
            // Do something with the selected value, for example, log it to the console
            const dataToSend = {
                make_id: selectedMake,
            };

            var vehicle_models = @json($vehicle_models);
            // console.log(vehicle_models[0].name);

            var select = document.getElementById('modelSelect');
            axios.post('/get-model-data', dataToSend)
                .then(function(response) {

                    var modelSelect = document.getElementById('modelSelect'),
                        optionsHTML_Arr = [],
                        j = response.data.length;
                        optionsHTML_Arr.push(
                            `<option value=""></option>`
                        );
                    for (var i = 0; i < j; i += 1) {
                        optionsHTML_Arr.push(
                            `<option value="${vehicle_models[i].id}" > ${vehicle_models[i].name}</option>`
                        );
                    }
                    modelSelect.innerHTML = optionsHTML_Arr.join('');
                    // console.log(optionsHTML_Arr);
                    // console.log(response.data);
                })
                .catch(function(error) {
                    console.error("Error making the Axios POST request:", error);
                });
        });




        //                           ModelSelect
        const modelSelect = document.getElementById('modelSelect');
        // let optionsHTMLStr = ""
        // Edit an event listener to listen for the "change" event
        modelSelect.addEventListener('change', function() {
            // Get the selected value
            const selectedModel = modelSelect.value;
            // Do something with the selected value, for example, log it to the console
            const dataToSend = {
                make_id: selectedMake,
                model_id: selectedModel,
            };

            var vehicle_models = @json($vehicle_models);
            // console.log(vehicle_models[0].name);

            var select = document.getElementById('yearSelect');
            axios.post('/get-year-data', dataToSend)
                .then(function(response) {
                    // console.log(response.data[0].id);
                    // console.log(response.data[0].year);
                    var yearSelect = document.getElementById('yearSelect');
                    optionsHTML_Arr = [],
                        j = response.data.length;
                        optionsHTML_Arr.push(
                            `<option value=""></option>`
                        );
                    for (var i = 0; i < j; i += 1) {
                        optionsHTML_Arr.push(
                            `<option value="${response.data[i].id}"> ${response.data[i].year}</option>`
                        );
                    }
                    yearSelect.innerHTML = optionsHTML_Arr.join('');
                    // console.log(optionsHTML_Arr);
                })
                .catch(function(error) {
                    console.error("Error making the Axios POST request:", error);
                });
        });
    </script>

    <script>
        var myDropzone = new Dropzone("#myDropzone", {
            url: "{{ route('save-dropzone-image') }}",
            // url: "{{ route('product.store') }}",
            autoProcessQueue: false,
            paramName: 'file',
            maxFilesize: 5, //  size (in MB)
            maxFiles: 4,
            uploadMultiple: true,
            parallelUploads: 4, // number of file will upload at a time
            acceptedFiles: ".jpg, .jpeg, .png, .gif",
            addRemoveLinks: true,
            dictDefaultMessage: "Drop files here or click to upload.",
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            init: function() {

                // var submitButton = document.getElementById("formbutton");
                var submitButton = document.querySelector("#myForm button[type=submit]");
                var myDropzone = this;

                submitButton.addEventListener("click", function(e) {
                    // console.log(myDropzone);
                    e.preventDefault();
                    e.stopPropagation();
                    myDropzone.processQueue();
                    if (myDropzone.getQueuedFiles().length === 0) {
                        document.getElementById('myForm').submit();
                    }
                });

                this.on("success", function(file, response) {
                    console.log(response);
                });

                this.on("error", function(file, errorMessage) {});
            }
        });
    </script>
@endsection

@extends('layouts.admin.master')
@section('title')
    Admin - Edit Discount
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
                <h5>Edit Discount </h5>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="/">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="#">Ecommerce</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="#">Edit Discount</a>
                    </li>
                </ol>
            </div>
            <!-- Page Title Ends -->
            <!-- Edit Discount Page Starts -->
            <form class="" id="myForm" action="{{ route('discount.update', ['discount' => $discount->id]) }}"
                method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                {{-- <input name="discount_id" type="hidden" value="{{ $discount->id }}" /> --}}
                {{-- <div class="p-4 mb-4 text-sm text-red-500 rounded-lg  dark:bg-gray-800 dark:text-red-400" role="alert">
                    @foreach ($errors->get('sku') as $message)
                        {{ $message }}<br>
                    @endforeach
                </div> --}}

                <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
                    <!-- Left side Div Start -->
                    <section class="flex flex-col gap-8 lg:col-span-2">
                        <!-- Discount Info  -->
                        <div class="rounded-primary bg-white p-6 shadow-sm dark:bg-slate-800">
                            <div style="color: red;" role="alert">
                                @foreach ($errors->get('password') as $message)
                                    {{ $message }}<br>
                                @endforeach
                                @if (session('message'))
                                    {{ session('message') }}
                                @endif
                            </div>
                            <h5 class="m-0 p-0 text-xl font-semibold text-slate-700 dark:text-slate-200">Discount Info
                            </h5>

                            <div class="grid w-full grid-cols-1 gap-4 py-2 md:grid-cols-2">

                                <div class="flex w-full flex-col md:w-auto">
                                    <label class="label mb-1 font-medium"> Coupon Title </label>
                                    <input name="coupon_title" type="text" class="input"
                                        value="{{ old('coupon_title') ?? ($discount->coupon_title ?? '') }}" required />
                                    <p class="help-text mt-1">Customers will see this on checkout.</p>
                                </div>

                                <div class="flex w-full flex-col md:w-auto">
                                    <label class="label mb-1 font-medium">Coupon Code</label>
                                    <input name="coupon_code" type="text" class="input"
                                        value="{{ old('coupon_code') ?? ($discount->coupon_code ?? '') }}" required />
                                    <p class="help-text mt-1">Customers will enter this to apply discount.</p>
                                </div>
                            </div>
                            <div class="grid w-full grid-cols-1 gap-4 py-2 md:grid-cols-2">
                                <div class="flex w-full flex-col md:w-auto">
                                    <label class="label mb-1 font-medium"> Discount </label>
                                    <input name="discount" type="number" class="input"
                                        value="{{ old('discount') ?? ($discount->discount ?? '') }}" required />
                                </div>
                                <div class="flex w-full flex-col md:w-auto">
                                    <label class="label mb-1 font-medium">Coupon Type</label>
                                    <select name="coupon_type" class="select" id="status">
                                        <option value="percentage">
                                            Percentage(%)
                                        </option>
                                        <option value="fixed_amount">
                                            Fixed Amount
                                        </option>

                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Discount validation  -->
                        <div class="rounded-primary bg-white p-6 shadow-sm dark:bg-slate-800">
                            <h5 class="m-0 p-0 text-xl font-semibold text-slate-700 dark:text-slate-200">Validation
                            </h5>

                            <div class="grid w-full grid-cols-1 gap-4 py-2 md:grid-cols-2">
                                <div class="flex w-full flex-col md:w-auto">
                                    <label class="label mb-1 font-medium">Start Date</label>
                                    <input name="start_date" type="datetime-local" class="input"
                                        value="{{ old('start_date') ?? ($discount->start_date ?? '') }}" required />
                                </div>
                                <div class="flex w-full flex-col md:w-auto">
                                    <label class="label mb-1 font-medium"> Expiration Date</label>
                                    <input name="expiration_date" type="datetime-local" class="input"
                                        value="{{ old('expiration_date') ?? ($discount->expiration_date ?? '') }}"
                                        required />
                                </div>
                            </div>

                            <div class="grid w-full grid-cols-1 gap-4 py-2 md:grid-cols-2">
                                <div class="flex w-full flex-col md:w-auto">
                                    <label class="label mb-1 font-medium"> Minimum Amount
                                    </label>
                                    <input name="minimum_amount" type="number" class="input"
                                        value="{{ old('minimum_amount') ?? ($discount->minimum_amount ?? '') }}" />
                                    <p class="help-text mt-1"> Minimum subtotal in which the discount will apply.</p>
                                </div>
                                <div class="flex w-full flex-col md:w-auto">
                                    <label class="label mb-1 font-medium"> Max Uses </label>
                                    <input name="max_uses" type="number" class="input"
                                        value="{{ old('max_uses') ?? ($discount->max_uses ?? '') }}" />
                                    <p class="help-text mt-1">Max number of times this discount can be used.</p>
                                </div>
                            </div>

                            <div class="grid w-full grid-cols-1 gap-4 py-2 md:grid-cols-2">
                                <div class="flex w-full flex-col md:w-auto">
                                    <label class="label mb-1 font-medium"> Use Once Per Customer
                                    </label>
                                    {{-- @if ($discount->max_uses != null) --}}
                                    <p class="help-text mt-1"> <input name="once_check"
                                            {{ $discount->once_check == 1 ? 'checked' : '' }} value="1"
                                            type="checkbox" class="checkbox checkbox-primary parent-checkbox"> Prevent
                                        customers from using this discount more than once.</p>
                                    {{-- @else
                                        <p class="help-text mt-1"> <input name="once_check" value="1" type="checkbox"
                                                class="checkbox checkbox-primary parent-checkbox"> Prevent
                                            customers from using this discount more than once.</p>
                                    @endif --}}

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
                            <p class="mb-4 p-0 text-sm font-normal text-slate-400">Better organize your discount</p>
                            <div class="flex flex-col gap-4">
                                <div>
                                    <label class="label label-required mb-1 font-medium" for="status"> Discount On
                                    </label>
                                    <select name="discount_on" class="select" id="discountOn">
                                        @if ($discount->discount_on == 'all_products')
                                            <option selected value="all_products">
                                                All Products
                                            </option>
                                        @else
                                            <option value="all_products">
                                                All Products
                                            </option>
                                        @endif
                                        @if ($discount->discount_on == 'category')
                                            <option selected value="category">
                                                Category
                                            </option>
                                        @else
                                            <option value="category">
                                                Category
                                            </option>
                                        @endif
                                        @if ($discount->discount_on == 'sub_category')
                                            <option selected value="sub_category">
                                                Sub Category
                                            </option>
                                        @else
                                            <option value="sub_category">
                                                Sub Category
                                            </option>
                                        @endif
                                        @if ($discount->discount_on == 'product')
                                            <option selected value="product">
                                                Product
                                            </option>
                                        @else
                                            <option value="product">
                                                Product
                                            </option>
                                        @endif
                                    </select>
                                </div>
                            </div>

                            <div style="display: none;" id="category">
                                <label class="label mb-1 font-medium" for="vendor"> Category </label>
                                <select name="category[]" class="tom-select" multiple="" autocomplete="off">

                                    @foreach ($categories as $category)
                                        @if ($category->parent_id == null)
                                            @if ($discount->discount_on == 'category')
                                                @foreach ($discount_ons as $discount_on)
                                                    @if ($discount_on->category_id == $category->id)
                                                        <option selected value="{{ $category->id }}">
                                                            {{ $category->name }}
                                                        </option>
                                                    @else
                                                        <option value="{{ $category->id }}">{{ $category->name }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            @else
                                                <option value="{{ $category->id }}">{{ $category->name }}
                                                </option>
                                            @endif
                                        @endif
                                    @endforeach
                                </select>
                            </div>

                            <div style="display: none;" id="sub_category">
                                <label class="label mb-1 font-medium" for="vendor">Sub Category </label>
                                <select name="sub_category[]" multiple="" class="tom-select" autocomplete="off">

                                    @foreach ($categories as $category)
                                        @if ($category->parent_id != null)
                                        @if ($discount->discount_on == 'sub_category')
                                                @foreach ($discount_ons as $discount_on)
                                                    @if ($discount_on->sub_category_id == $category->id)
                                                        <option selected value="{{ $category->id }}">
                                                            {{ $category->name }}
                                                        </option>
                                                    @else
                                                        <option value="{{ $category->id }}">{{ $category->name }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            @else
                                                <option value="{{ $category->id }}">{{ $category->name }}
                                                </option>
                                            @endif
                                        @endif
                                    @endforeach
                                </select>
                            </div>

                            <div style="display: none;" id="product">
                                <label class="label mb-1 font-medium" for="vendor"> Product </label>
                                <select name="product[]" multiple="" class="tom-select" autocomplete="off">

                                    @foreach ($products as $product)
                                        @if ($product->parent_id == null)
                                        @if ($discount->discount_on == 'product')
                                                @foreach ($discount_ons as $discount_on)
                                                    @if ($discount_on->product_id == $product->id)
                                                        <option selected value="{{ $product->id }}">
                                                            {{ $product->name }}
                                                        </option>
                                                    @else
                                                        <option value="{{ $product->id }}">{{ $product->name }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            @else
                                                <option value="{{ $product->id }}">{{ $product->name }}
                                                </option>
                                            @endif
                                        @endif
                                    @endforeach


                                </select>
                            </div>

                            <div>
                                <label class="label mb-1 font-medium" for="vendor"> Excluded Products </label>
                                <select name="excluded[]" multiple="" class="tom-select" id="status">

                                    @foreach ($products as $product)
                                        @if (count($excludes) != 0)
                                            @foreach ($excludes as $exclude)
                                                @if ($exclude->product_id == $product->id)
                                                    <option selected value="{{ $product->id }}">{{ $product->name }}
                                                    </option>
                                                @else
                                                    <option value="{{ $product->id }}">{{ $product->name }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        @else
                                            <option value="{{ $product->id }}">{{ $product->name }}
                                            </option>
                                        @endif
                                        {{-- <option value="{{ $product->id }}">{{ $product->name }} </option> --}}
                                    @endforeach
                                </select>
                            </div>


                            <div class="flex flex-col gap-4">
                                <div>
                                    <label class="label label-required mb-1 font-medium" for="status"> Status
                                    </label>
                                    <select name="status" class="select" id="status">
                                        <option value="0" {{ $discount->status == 0 ? 'selected' : '' }}>In Active
                                        </option>

                                        <option value="1" {{ $discount->status == 1 ? 'selected' : '' }}>Active
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
            <!-- Edit Discount Page Ends -->
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
        document.addEventListener('DOMContentLoaded', function() {
            const discountOn = document.getElementById('discountOn');
            const categoryDiv = document.getElementById('category');
            const sub_categoryDiv = document.getElementById('sub_category');
            const productDiv = document.getElementById('product');
            var selectedMake;
            discountOn.addEventListener('change', function() {
                selectedMake = discountOn.value;
                // console.log(selectedMake);
                if (selectedMake == 'category') {
                    if (categoryDiv.style.display === 'none' || categoryDiv.style.display === '') {
                        categoryDiv.style.display = 'inline';
                        sub_categoryDiv.style.display = 'none';
                        productDiv.style.display = 'none';
                    }
                } else if (selectedMake == 'sub_category') {
                    if (sub_categoryDiv.style.display === 'none' || sub_categoryDiv.style.display === '') {
                        categoryDiv.style.display = 'none';
                        sub_categoryDiv.style.display = 'inline';
                        productDiv.style.display = 'none';
                    }
                } else if (selectedMake == 'product') {
                    if (productDiv.style.display === 'none' || productDiv.style.display === '') {
                        categoryDiv.style.display = 'none';
                        sub_categoryDiv.style.display = 'none';
                        productDiv.style.display = 'inline';
                    }
                } else if (selectedMake == 'all_products') {
                    categoryDiv.style.display = 'none';
                    sub_categoryDiv.style.display = 'none';
                    productDiv.style.display = 'none';
                }
            });
        });
    </script>

@endsection

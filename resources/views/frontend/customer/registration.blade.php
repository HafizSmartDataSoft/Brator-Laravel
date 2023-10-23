@extends('layouts.frontend.master')
@section('title')
Customer Registration-Brator
@endsection
@section('css')
    <style>
        .required {
            color: red;
            font-weight: bold;
        }
    </style>
@endsection
@section('content')
    <!-- bread start-->
    <div class="brator-breadcrumb-area">
        <div class="container-xxxl container-xxl container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="brator-breadcrumb">
                        <ul>
                            <li><a href="#_">Home</a></li>
                            <li class="active-link">Customer Registration</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- bread end-->
    <div class="brator-cart-header-area">
        <div class="container-xxxl container-xxl container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Customer Registration Form</h2>
                </div>
            </div>
        </div>
    </div>

    <form action="{{ route('customer.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        {{-- <div class="p-4 mb-4 text-sm text-red-500 rounded-lg  dark:bg-gray-800 dark:text-red-400" role="alert">
            @foreach ($errors->get('password') as $message)
                {{ $message }}<br>
            @endforeach
        </div> --}}
        <div class="brator-cart-area">
            <div class="container-xxxl container-xxl container">
                <div class="row">
                    <div class="col-xl-8 col-lg-12">
                        <div class="brator-cart-info">
                            <div class="brator-contact-form-fields blog-post-comment-box-area">
                                <div style="color: red;" role="alert">
                                    @foreach ($errors->get('password') as $message)
                                        {{ $message }}<br>
                                    @endforeach
                                </div>
                                <div class="brator-contact-form-field-two-items">

                                    <div class="brator-contact-form-field">
                                        <label>First Name<span class="required">*</span></label>
                                        <input type="text" name="first_name" placeholder="First Name" value="{{old('frist_name')}}" required>
                                    </div>
                                    <div class="brator-contact-form-field">
                                        <label for="last_name">Last Name <span class="required">*</span></label>
                                        <input type="text" name="last_name" placeholder="Last Name" value="{{old('last_name')}}" required>
                                    </div>
                                </div>
                                <div class="brator-contact-form-field-two-items">
                                    <div class="brator-contact-form-field">
                                        <label>Date of Birth<span class="required">*</span></label>
                                        <input type="date" name="date_of_birth" value="{{old('date_of_birth')}}" required>
                                    </div>
                                    <div class="brator-contact-form-field">
                                        <label>Gender<span class="required">*</span></label>
                                        <input type="text"placeholder="Gender" name="gender" value="{{old('gender')}}" required>
                                    </div>
                                </div>
                                <div class="brator-contact-form-field-two-items">
                                    <div class="brator-contact-form-field">
                                        <label>Phone<span class="required">*</span></label>
                                        <input type="text" name="phone_number" value="{{old('phone_number')}}" placeholder="Phone" required>
                                    </div>
                                    <div class="brator-contact-form-field">
                                        <label>Email address<span class="required">*</span></label>
                                        <input type="email" name="mail" value="{{old('mail')}}"
                                            placeholder="Email address" required>
                                    </div>
                                </div>
                                <div class="brator-contact-form-field-two-items">
                                    <div class="brator-contact-form-field">
                                        <label>Country / Region<span class="required">*</span></label>
                                        <input type="text" name="country" value="{{old('country')}}" placeholder="Country / Region" required>
                                    </div>
                                    <div class="brator-contact-form-field">
                                        <label>Street address<span class="required">*</span></label>
                                        <input type="text" name="address" value="{{old('address')}}"
                                            placeholder="House No. and Street Name" required>
                                    </div>
                                </div>
                                <div class="brator-contact-form-field-two-items">
                                    <div class="brator-contact-form-field">
                                        <label>Suburb<span class="required">*</span></label>
                                        <input type="text" name="suburb" value="{{old('suburb')}}" placeholder="Suburb" required>
                                    </div>
                                    <div class="brator-contact-form-field">
                                        <label>State<span class="required">*</span></label>
                                        <input type="text" name="state" value="{{old('state')}}" placeholder="State" required>
                                    </div>
                                </div>

                                <div class="brator-contact-form-field-two-items">
                                    <div class="brator-contact-form-field">
                                        <label>Postcode<span class="required">*</span></label>
                                        <input type="number" name="postcode" value="{{old('postcode')}}" placeholder="Postcode" required>
                                    </div>
                                    <div class="brator-contact-form-field">
                                        <label>Iamge</label>
                                        <input type="file" name="image" value="{{old('image')}}" placeholder="Image" >
                                    </div>
                                </div>
                                <div class="brator-contact-form-field-two-items">
                                    <div class="brator-contact-form-field">
                                        <label>Password<span class="required">*</span></label>
                                        <input type="password" name="password" value="{{old('password')}}" placeholder="Password" required>
                                    </div>
                                    <div class="brator-contact-form-field">
                                        <label>Confirm Password<span class="required">*</span></label>
                                        <input type="password"  name="password_confirmation" value="{{old('password_confirmation')}}" placeholder="Confirm Password" required>
                                    </div>
                                </div>
                                <div class="brator-cart-checkout" >
                                    <div class="brator-cart-checkout-left">
                                        <div class="brator-cart-checkout-fields">
                                            <button>Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </form>
@endsection

@section('js')
@endsection

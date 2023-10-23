@extends('layouts.frontend.master')
@section('title')
    Customer Login-Brator
@endsection
{{-- @section('css')
    <style>
        .required {
            color: red;
            font-weight: bold;
        }
    </style>
@endsection --}}
@section('content')
    <!-- bread start-->
    <div class="brator-breadcrumb-area">
        <div class="container-xxxl container-xxl container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="brator-breadcrumb">
                        <ul>
                            <li><a href="#_">Home</a></li>
                            <li class="active-link">Customer Login</li>
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
                    <h2>Customer Login Form</h2>
                </div>
            </div>
        </div>
    </div>

    <form action="{{ route('loginCheck') }}" method="POST" enctype="multipart/form-data">
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
                                    @if (session('message'))
                                        {{ session('message') }}
                                    @endif
                                </div>

                                <div class="brator-contact-form-field-two-items">
                                    <div class="brator-contact-form-field">
                                        <label>Email address</label>
                                        <input type="email" name="mail" value="{{ old('mail') }}"
                                            placeholder="Email address" required>
                                    </div>
                                    <div class="brator-contact-form-field">

                                    </div>

                                </div>
                                <div class="brator-contact-form-field-two-items">
                                    <div class="brator-contact-form-field">
                                        <label>Password</label>
                                        <input type="password" name="password" value="{{ old('password') }}"
                                            placeholder="Password" required>
                                    </div>
                                    <div class="brator-contact-form-field">
                                    </div>
                                </div>
                                <div class="brator-cart-checkout">
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

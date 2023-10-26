@extends('layouts.frontend.master')
@section('title')
    Cart-Brator
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
                            <li class="active-link">Shoping Cart</li>
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
                    <h3>Shopping Cart</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="brator-cart-area">
        <div class="container-xxxl container-xxl container">
            <div class="row">
                <div class="col-xl-8 col-lg-12">
                    <div class="brator-cart-info">
                        <div class="brator-cart-h">
                            <h3>Your Cart</h3>
                        </div>
                        <div class="brator-cart-list">
                            <div class="brator-cart-list-items title-me">
                                <div class="brator-cart-list-items-title">
                                    <h6>product</h6>
                                </div>
                                <div class="brator-cart-list-items-price">
                                    <h6>price</h6>
                                </div>
                                <div class="brator-cart-list-items-qty-area">
                                    <h6>qty</h6>
                                </div>
                                {{-- <div class="brator-cart-list-items-subtotal">
                                <h6>subtotal</h6>
                            </div> --}}
                                {{-- <div class="brator-cart-list-items-removed"></div> --}}
                            </div>
                            <div class="brator-cart-list-items">
                                <div class="brator-cart-list-items-title">
                                    <div class="img-cart"><a href="#_"><img class="lazyload"
                                                src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                data-src="{{ asset($product->featured_image) }}" alt="alt" /></a></div>
                                    <div class="prodct-info">
                                        <h5><a href="#_">{{ $product->name }}</a></h5>
                                        {{-- <p>19” DIAMETER (19” x 8.5”), White/Sliver</p> --}}
                                    </div>
                                </div>
                                <div class="brator-cart-list-items-price">
                                    <p><sup>${{ $product->sale_price }}</sup><b
                                            class="pub">${{ $product->base_price }}</b>
                                    </p>
                                </div>
                                <div class="brator-cart-list-items-qty-area">
                                    <div class="brator-cart-list-items-qty">
                                        <button class="decrement-count-qty">-</button>
                                        <input type="number" value="1" id="quantity-input" disabled />
                                        <button class="add-count-qty">+</button>
                                    </div>
                                </div>
                                {{-- <div class="brator-cart-list-items-subtotal">
                                <p id="subtotal">$816.2</p>
                            </div> --}}
                                <div class="brator-cart-list-items-removed">
                                    {{-- <button>
                                    <svg class="bi bi-x" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"></path>
                                    </svg>
                                </button> --}}
                                </div>
                            </div>


                        </div>
                        {{-- <div class="brator-cart-checkout">
                            <div class="brator-cart-checkout-left">
                                <div class="brator-cart-checkout-fields">
                                    <input type="text" id="apply-coupon" placeholder="Enter Coupon Code" />
                                    <button>Apply Coupon</button>
                                </div>
                            </div>
                            <div class="brator-cart-checkout-right">
                            </div>
                        </div> --}}
                    </div>

                    <!-- Footer top one start-->
                    <div class="brator-forget-product-slider">
                        <div class="brator-section-header">
                            <div class="brator-section-header-title">
                                <h2>Forgot Something?</h2>
                            </div>
                        </div>
                        <div class="brator-product-slider splide js-splide p-splide"
                            data-splide='{"pagination":false,"type":"loop","perPage":4,"perMove":"1","gap":30, "breakpoints":{ "620" :{ "perPage": "1" },"991" :{ "perPage": "2" }, "1030" :{ "perPage" : "3" }, "1199":{ "perPage" : "4" }, "1500":{ "perPage" : "3" }, "1600":{ "perPage" : "4" }, "1599":{ "perPage" : "3" }, "1920":{ "perPage" : "4" }}}'>
                            <div class="splide__arrows style-one">
                                <button class="splide__arrow splide__arrow--prev">
                                    <svg class="bi bi-chevron-right" xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z">
                                        </path>
                                    </svg>
                                </button>
                                <button class="splide__arrow splide__arrow--next">
                                    <svg class="bi bi-chevron-right" xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z">
                                        </path>
                                    </svg>
                                </button>
                            </div>
                            <div class="splide__track">
                                <div class="splide__list">
                                    <div class="brator-product-single-item-area splide__slide design-two">
                                        <div class="brator-product-single-item-info info-content-left">
                                            <div class="brator-product-single-item-info-left">
                                                @php
                                                    $updated_at = $product->updated_at;
                                                    $currentDate = date('Y-m-d');
                                                    $dateDifference = strtotime($updated_at) - strtotime($currentDate);
                                                    $daysDifference = round($dateDifference / 86400); // 86400 seconds in a day
                                                @endphp

                                                @if ($daysDifference >= 0 && $daysDifference <= 7)
                                                    <div class="yollow-batch">New</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="brator-product-single-item-img"><a href="#_"><img class="lazyload"
                                                    src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                    data-src="{{ asset('assets/frontend') }}/images/shop/product-01.jpg"
                                                    alt="alt" /></a></div>
                                        <div class="brator-product-single-item-mini">
                                            <div class="brator-product-single-item-cat"><a
                                                    href="product-layout-01.html">Brakepro</a></div>
                                            <div class="brator-product-single-item-title">
                                                <h5><a href="#_"> Evolution Sport Drilled and Slotted Brake Kit</a>
                                                </h5>
                                            </div>
                                            <div class="brator-product-single-item-review">
                                                <div class="brator-review">
                                                    <svg class="active" fill="#000000" width="52" height="52"
                                                        version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                        viewBox="0 0 64 64">
                                                        <path
                                                            d="M59.7,23.9l-18.1-2.8L33.4,3.9c-0.6-1.2-2.2-1.2-2.8,0l-8.2,17.3L4.4,23.9c-1.3,0.2-1.8,1.9-0.8,2.8l13.1,13.5l-3.1,18.9  c-0.2,1.3,1.1,2.4,2.3,1.6l16.3-8.9l16.2,8.9c1.1,0.6,2.5-0.4,2.2-1.6l-3.1-18.9l13.1-13.5C61.4,25.8,61,24.1,59.7,23.9z">
                                                        </path>
                                                    </svg>
                                                    <svg class="active" fill="#000000" width="52" height="52"
                                                        version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                        viewBox="0 0 64 64">
                                                        <path
                                                            d="M59.7,23.9l-18.1-2.8L33.4,3.9c-0.6-1.2-2.2-1.2-2.8,0l-8.2,17.3L4.4,23.9c-1.3,0.2-1.8,1.9-0.8,2.8l13.1,13.5l-3.1,18.9  c-0.2,1.3,1.1,2.4,2.3,1.6l16.3-8.9l16.2,8.9c1.1,0.6,2.5-0.4,2.2-1.6l-3.1-18.9l13.1-13.5C61.4,25.8,61,24.1,59.7,23.9z">
                                                        </path>
                                                    </svg>
                                                    <svg class="active" fill="#000000" width="52" height="52"
                                                        version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                        viewBox="0 0 64 64">
                                                        <path
                                                            d="M59.7,23.9l-18.1-2.8L33.4,3.9c-0.6-1.2-2.2-1.2-2.8,0l-8.2,17.3L4.4,23.9c-1.3,0.2-1.8,1.9-0.8,2.8l13.1,13.5l-3.1,18.9  c-0.2,1.3,1.1,2.4,2.3,1.6l16.3-8.9l16.2,8.9c1.1,0.6,2.5-0.4,2.2-1.6l-3.1-18.9l13.1-13.5C61.4,25.8,61,24.1,59.7,23.9z">
                                                        </path>
                                                    </svg>
                                                    <svg class="active" fill="#000000" width="52" height="52"
                                                        version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                        viewBox="0 0 64 64">
                                                        <path
                                                            d="M59.7,23.9l-18.1-2.8L33.4,3.9c-0.6-1.2-2.2-1.2-2.8,0l-8.2,17.3L4.4,23.9c-1.3,0.2-1.8,1.9-0.8,2.8l13.1,13.5l-3.1,18.9  c-0.2,1.3,1.1,2.4,2.3,1.6l16.3-8.9l16.2,8.9c1.1,0.6,2.5-0.4,2.2-1.6l-3.1-18.9l13.1-13.5C61.4,25.8,61,24.1,59.7,23.9z">
                                                        </path>
                                                    </svg>
                                                    <svg class="d-active" fill="#000000" width="52" height="52"
                                                        version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                        viewBox="0 0 64 64">
                                                        <path
                                                            d="M59.7,23.9l-18.1-2.8L33.4,3.9c-0.6-1.2-2.2-1.2-2.8,0l-8.2,17.3L4.4,23.9c-1.3,0.2-1.8,1.9-0.8,2.8l13.1,13.5l-3.1,18.9  c-0.2,1.3,1.1,2.4,2.3,1.6l16.3-8.9l16.2,8.9c1.1,0.6,2.5-0.4,2.2-1.6l-3.1-18.9l13.1-13.5C61.4,25.8,61,24.1,59.7,23.9z">
                                                        </path>
                                                    </svg>
                                                </div>
                                                <div class="brator-review-text">
                                                    <p>14 Reviews</p>
                                                </div>
                                            </div>
                                            <div class="brator-product-single-item-price">
                                                <p><sub>$172.96</sub><b class="pub">$100</b></p>
                                            </div>
                                            <div class="brator-product-single-item-btn"><a
                                                    href="product-layout-01.html">Add to cart</a></div>
                                        </div>
                                    </div>
                                    <div class="brator-product-single-item-area splide__slide design-two">
                                        <div class="brator-product-single-item-info info-content-left">
                                            <div class="brator-product-single-item-info-left">
                                                <div class="stock-out-batch">Out OF stock</div>
                                            </div>
                                        </div>
                                        <div class="brator-product-single-item-img"><a href="#_"><img
                                                    class="lazyload"
                                                    src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                    data-src="{{ asset('assets/frontend') }}/images/shop/product-02.jpg"
                                                    alt="alt" /></a></div>
                                        <div class="brator-product-single-item-mini">
                                            <div class="brator-product-single-item-cat"><a
                                                    href="product-layout-01.html">Machelin</a></div>
                                            <div class="brator-product-single-item-title">
                                                <h5><a href="#_"> Universal 12 V Mini Tire Air Compressor</a></h5>
                                            </div>
                                            <div class="brator-product-single-item-review">
                                                <div class="brator-review">
                                                    <svg class="active" fill="#000000" width="52" height="52"
                                                        version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                        viewBox="0 0 64 64">
                                                        <path
                                                            d="M59.7,23.9l-18.1-2.8L33.4,3.9c-0.6-1.2-2.2-1.2-2.8,0l-8.2,17.3L4.4,23.9c-1.3,0.2-1.8,1.9-0.8,2.8l13.1,13.5l-3.1,18.9  c-0.2,1.3,1.1,2.4,2.3,1.6l16.3-8.9l16.2,8.9c1.1,0.6,2.5-0.4,2.2-1.6l-3.1-18.9l13.1-13.5C61.4,25.8,61,24.1,59.7,23.9z">
                                                        </path>
                                                    </svg>
                                                    <svg class="active" fill="#000000" width="52" height="52"
                                                        version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                        viewBox="0 0 64 64">
                                                        <path
                                                            d="M59.7,23.9l-18.1-2.8L33.4,3.9c-0.6-1.2-2.2-1.2-2.8,0l-8.2,17.3L4.4,23.9c-1.3,0.2-1.8,1.9-0.8,2.8l13.1,13.5l-3.1,18.9  c-0.2,1.3,1.1,2.4,2.3,1.6l16.3-8.9l16.2,8.9c1.1,0.6,2.5-0.4,2.2-1.6l-3.1-18.9l13.1-13.5C61.4,25.8,61,24.1,59.7,23.9z">
                                                        </path>
                                                    </svg>
                                                    <svg class="active" fill="#000000" width="52" height="52"
                                                        version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                        viewBox="0 0 64 64">
                                                        <path
                                                            d="M59.7,23.9l-18.1-2.8L33.4,3.9c-0.6-1.2-2.2-1.2-2.8,0l-8.2,17.3L4.4,23.9c-1.3,0.2-1.8,1.9-0.8,2.8l13.1,13.5l-3.1,18.9  c-0.2,1.3,1.1,2.4,2.3,1.6l16.3-8.9l16.2,8.9c1.1,0.6,2.5-0.4,2.2-1.6l-3.1-18.9l13.1-13.5C61.4,25.8,61,24.1,59.7,23.9z">
                                                        </path>
                                                    </svg>
                                                    <svg class="active" fill="#000000" width="52" height="52"
                                                        version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                        viewBox="0 0 64 64">
                                                        <path
                                                            d="M59.7,23.9l-18.1-2.8L33.4,3.9c-0.6-1.2-2.2-1.2-2.8,0l-8.2,17.3L4.4,23.9c-1.3,0.2-1.8,1.9-0.8,2.8l13.1,13.5l-3.1,18.9  c-0.2,1.3,1.1,2.4,2.3,1.6l16.3-8.9l16.2,8.9c1.1,0.6,2.5-0.4,2.2-1.6l-3.1-18.9l13.1-13.5C61.4,25.8,61,24.1,59.7,23.9z">
                                                        </path>
                                                    </svg>
                                                    <svg class="d-active" fill="#000000" width="52" height="52"
                                                        version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                        viewBox="0 0 64 64">
                                                        <path
                                                            d="M59.7,23.9l-18.1-2.8L33.4,3.9c-0.6-1.2-2.2-1.2-2.8,0l-8.2,17.3L4.4,23.9c-1.3,0.2-1.8,1.9-0.8,2.8l13.1,13.5l-3.1,18.9  c-0.2,1.3,1.1,2.4,2.3,1.6l16.3-8.9l16.2,8.9c1.1,0.6,2.5-0.4,2.2-1.6l-3.1-18.9l13.1-13.5C61.4,25.8,61,24.1,59.7,23.9z">
                                                        </path>
                                                    </svg>
                                                </div>
                                                <div class="brator-review-text">
                                                    <p>14 Reviews</p>
                                                </div>
                                            </div>
                                            <div class="brator-product-single-item-price">
                                                <p><sub>$172.96</sub><b class="pub">$100</b></p>
                                            </div>
                                            <div class="brator-product-single-item-btn"><a
                                                    href="product-layout-01.html">Add to cart</a></div>
                                        </div>
                                    </div>
                                    <div class="brator-product-single-item-area splide__slide design-two">
                                        <div class="brator-product-single-item-info info-content-left">
                                            <div class="brator-product-single-item-info-left">
                                                <div class="off-batch">20% OFF</div>
                                            </div>
                                        </div>
                                        <div class="brator-product-single-item-img"><a href="#_"><img
                                                    class="lazyload"
                                                    src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                    data-src="{{ asset('assets/frontend') }}/images/shop/product-03.jpg"
                                                    alt="alt" /></a></div>
                                        <div class="brator-product-single-item-mini">
                                            <div class="brator-product-single-item-cat"><a
                                                    href="product-layout-01.html">Brake oil</a></div>
                                            <div class="brator-product-single-item-title">
                                                <h5><a href="#_"> Simple Leather Steering Wheel</a></h5>
                                            </div>
                                            <div class="brator-product-single-item-review">
                                                <div class="brator-review">
                                                    <svg class="active" fill="#000000" width="52" height="52"
                                                        version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                        viewBox="0 0 64 64">
                                                        <path
                                                            d="M59.7,23.9l-18.1-2.8L33.4,3.9c-0.6-1.2-2.2-1.2-2.8,0l-8.2,17.3L4.4,23.9c-1.3,0.2-1.8,1.9-0.8,2.8l13.1,13.5l-3.1,18.9  c-0.2,1.3,1.1,2.4,2.3,1.6l16.3-8.9l16.2,8.9c1.1,0.6,2.5-0.4,2.2-1.6l-3.1-18.9l13.1-13.5C61.4,25.8,61,24.1,59.7,23.9z">
                                                        </path>
                                                    </svg>
                                                    <svg class="active" fill="#000000" width="52" height="52"
                                                        version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                        viewBox="0 0 64 64">
                                                        <path
                                                            d="M59.7,23.9l-18.1-2.8L33.4,3.9c-0.6-1.2-2.2-1.2-2.8,0l-8.2,17.3L4.4,23.9c-1.3,0.2-1.8,1.9-0.8,2.8l13.1,13.5l-3.1,18.9  c-0.2,1.3,1.1,2.4,2.3,1.6l16.3-8.9l16.2,8.9c1.1,0.6,2.5-0.4,2.2-1.6l-3.1-18.9l13.1-13.5C61.4,25.8,61,24.1,59.7,23.9z">
                                                        </path>
                                                    </svg>
                                                    <svg class="active" fill="#000000" width="52" height="52"
                                                        version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                        viewBox="0 0 64 64">
                                                        <path
                                                            d="M59.7,23.9l-18.1-2.8L33.4,3.9c-0.6-1.2-2.2-1.2-2.8,0l-8.2,17.3L4.4,23.9c-1.3,0.2-1.8,1.9-0.8,2.8l13.1,13.5l-3.1,18.9  c-0.2,1.3,1.1,2.4,2.3,1.6l16.3-8.9l16.2,8.9c1.1,0.6,2.5-0.4,2.2-1.6l-3.1-18.9l13.1-13.5C61.4,25.8,61,24.1,59.7,23.9z">
                                                        </path>
                                                    </svg>
                                                    <svg class="active" fill="#000000" width="52" height="52"
                                                        version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                        viewBox="0 0 64 64">
                                                        <path
                                                            d="M59.7,23.9l-18.1-2.8L33.4,3.9c-0.6-1.2-2.2-1.2-2.8,0l-8.2,17.3L4.4,23.9c-1.3,0.2-1.8,1.9-0.8,2.8l13.1,13.5l-3.1,18.9  c-0.2,1.3,1.1,2.4,2.3,1.6l16.3-8.9l16.2,8.9c1.1,0.6,2.5-0.4,2.2-1.6l-3.1-18.9l13.1-13.5C61.4,25.8,61,24.1,59.7,23.9z">
                                                        </path>
                                                    </svg>
                                                    <svg class="d-active" fill="#000000" width="52" height="52"
                                                        version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                        viewBox="0 0 64 64">
                                                        <path
                                                            d="M59.7,23.9l-18.1-2.8L33.4,3.9c-0.6-1.2-2.2-1.2-2.8,0l-8.2,17.3L4.4,23.9c-1.3,0.2-1.8,1.9-0.8,2.8l13.1,13.5l-3.1,18.9  c-0.2,1.3,1.1,2.4,2.3,1.6l16.3-8.9l16.2,8.9c1.1,0.6,2.5-0.4,2.2-1.6l-3.1-18.9l13.1-13.5C61.4,25.8,61,24.1,59.7,23.9z">
                                                        </path>
                                                    </svg>
                                                </div>
                                                <div class="brator-review-text">
                                                    <p>14 Reviews</p>
                                                </div>
                                            </div>
                                            <div class="brator-product-single-item-price">
                                                <p><sub>$172.96</sub><b class="pub">$100</b></p>
                                            </div>
                                            <div class="brator-product-single-item-btn"><a
                                                    href="product-layout-01.html">Add to cart</a></div>
                                        </div>
                                    </div>
                                    <div class="brator-product-single-item-area splide__slide design-two">
                                        <div class="brator-product-single-item-info info-content-left">
                                            <div class="brator-product-single-item-info-left">
                                                <div class="off-batch">20% OFF</div>
                                            </div>
                                        </div>
                                        <div class="brator-product-single-item-img"><a href="#_"><img
                                                    class="lazyload"
                                                    src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                    data-src="{{ asset('assets/frontend') }}/images/shop/product-04.jpg"
                                                    alt="alt" /></a></div>
                                        <div class="brator-product-single-item-mini">
                                            <div class="brator-product-single-item-cat"><a
                                                    href="product-layout-01.html">Premiumwheel</a></div>
                                            <div class="brator-product-single-item-title">
                                                <h5><a href="#_"> Carnauba Wash and Wax 64 oz by Norer</a></h5>
                                            </div>
                                            <div class="brator-product-single-item-review">
                                                <div class="brator-review">
                                                    <svg class="active" fill="#000000" width="52" height="52"
                                                        version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                        viewBox="0 0 64 64">
                                                        <path
                                                            d="M59.7,23.9l-18.1-2.8L33.4,3.9c-0.6-1.2-2.2-1.2-2.8,0l-8.2,17.3L4.4,23.9c-1.3,0.2-1.8,1.9-0.8,2.8l13.1,13.5l-3.1,18.9  c-0.2,1.3,1.1,2.4,2.3,1.6l16.3-8.9l16.2,8.9c1.1,0.6,2.5-0.4,2.2-1.6l-3.1-18.9l13.1-13.5C61.4,25.8,61,24.1,59.7,23.9z">
                                                        </path>
                                                    </svg>
                                                    <svg class="active" fill="#000000" width="52" height="52"
                                                        version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                        viewBox="0 0 64 64">
                                                        <path
                                                            d="M59.7,23.9l-18.1-2.8L33.4,3.9c-0.6-1.2-2.2-1.2-2.8,0l-8.2,17.3L4.4,23.9c-1.3,0.2-1.8,1.9-0.8,2.8l13.1,13.5l-3.1,18.9  c-0.2,1.3,1.1,2.4,2.3,1.6l16.3-8.9l16.2,8.9c1.1,0.6,2.5-0.4,2.2-1.6l-3.1-18.9l13.1-13.5C61.4,25.8,61,24.1,59.7,23.9z">
                                                        </path>
                                                    </svg>
                                                    <svg class="active" fill="#000000" width="52" height="52"
                                                        version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                        viewBox="0 0 64 64">
                                                        <path
                                                            d="M59.7,23.9l-18.1-2.8L33.4,3.9c-0.6-1.2-2.2-1.2-2.8,0l-8.2,17.3L4.4,23.9c-1.3,0.2-1.8,1.9-0.8,2.8l13.1,13.5l-3.1,18.9  c-0.2,1.3,1.1,2.4,2.3,1.6l16.3-8.9l16.2,8.9c1.1,0.6,2.5-0.4,2.2-1.6l-3.1-18.9l13.1-13.5C61.4,25.8,61,24.1,59.7,23.9z">
                                                        </path>
                                                    </svg>
                                                    <svg class="active" fill="#000000" width="52" height="52"
                                                        version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                        viewBox="0 0 64 64">
                                                        <path
                                                            d="M59.7,23.9l-18.1-2.8L33.4,3.9c-0.6-1.2-2.2-1.2-2.8,0l-8.2,17.3L4.4,23.9c-1.3,0.2-1.8,1.9-0.8,2.8l13.1,13.5l-3.1,18.9  c-0.2,1.3,1.1,2.4,2.3,1.6l16.3-8.9l16.2,8.9c1.1,0.6,2.5-0.4,2.2-1.6l-3.1-18.9l13.1-13.5C61.4,25.8,61,24.1,59.7,23.9z">
                                                        </path>
                                                    </svg>
                                                    <svg class="d-active" fill="#000000" width="52" height="52"
                                                        version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                        viewBox="0 0 64 64">
                                                        <path
                                                            d="M59.7,23.9l-18.1-2.8L33.4,3.9c-0.6-1.2-2.2-1.2-2.8,0l-8.2,17.3L4.4,23.9c-1.3,0.2-1.8,1.9-0.8,2.8l13.1,13.5l-3.1,18.9  c-0.2,1.3,1.1,2.4,2.3,1.6l16.3-8.9l16.2,8.9c1.1,0.6,2.5-0.4,2.2-1.6l-3.1-18.9l13.1-13.5C61.4,25.8,61,24.1,59.7,23.9z">
                                                        </path>
                                                    </svg>
                                                </div>
                                                <div class="brator-review-text">
                                                    <p>14 Reviews</p>
                                                </div>
                                            </div>
                                            <div class="brator-product-single-item-price">
                                                <p><sub>$172.96</sub><b class="pub">$100</b></p>
                                            </div>
                                            <div class="brator-product-single-item-btn"><a
                                                    href="product-layout-01.html">Add to cart</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Footer top one end-->
                    <!-- Footer top one start-->
                    <div class="brator-app-content-area" style="background-image:url(./assets/images/app-bg-01.png)">
                        <div class="brator-app-content">
                            <h2>Shopping Faster with<br />Brator App</h2>
                            <p>Download and experience our app today</p>
                        </div>
                        <div class="brator-app-btn"><a href="#_"><img class="lazyload"
                                    src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                    data-src="{{ asset('assets/frontend') }}/images/apple.png" alt="alt" /></a><a
                                href="#_"><img src="{{ asset('assets/frontend') }}/images/google.png"
                                    alt="alt" /></a></div>
                    </div>
                    <!-- Footer top one end-->
                </div>
                <div class="col-xl-4 col-lg-5 col-md-7 col-12">
                    <form action="{{ route('product.checkout') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="product_id" value="{{ $product->id }}">

                        <div class="cart-total-area"
                            style="background-image:url({{ asset('assets/frontend') }}/images/cat-bg.png)">
                            <div class="cart-total-header">
                                <h2>Order Summary:<span id="items">1 items </span></h2>
                                <input id="input-items" type="hidden" name="items" value="1">
                            </div>

                            <div class="cart-total-cost">
                                {{-- <div class="cart-total-before-dis item-ditels-cart-total">
                                    <p>Total before discount</p><span id="base_price">{{ $product->base_price }}</span>
                                </div> --}}
                                {{-- <div class="cart-total-dis item-ditels-cart-total">
                                    <p>Discount</p><span id="discount">-
                                        {{ $product->base_price - $product->sale_price }}</span>
                                </div> --}}
                                <div class="cart-total-subtotal item-ditels-cart-total">
                                    <p>Subtotal</p><span id="subtotal">${{ $product->sale_price }}</span>
                                </div>
                                <div class="cart-total-subtotal item-ditels-cart-total">
                                    <p>Tax</p><span id="subtotal">{{ $product->tax }}%</span>
                                </div>
                            </div>
                            {{-- <div class="cart-total-shiping">
                                <select name="cost">
                                    <option value=" Standard Shipping ($20)">Standard Shipping </option>
                                    <option value=" Standard Shipping ($20)">Standard Shipping</option>
                                    <option value=" Standard Shipping ($20)">Standard Shipping </option>
                                </select>
                            </div> --}}
                            <div class="cart-total-amount">
                                <p>Total</p><span
                                    id="total">${{ $product->sale_price + $product->sale_price * ($product->tax / 100) }}</span>
                            </div>
                            <div class="cart-total-process">
                                <button type="submit">Proceed To Checkout</button>
                            </div>
                            <div class="cart-total-accpect-payment">
                                <p>Accept Payment Methods</p>
                                <div class="list-img-pay">
                                    <a href="#_"><img class="lazyload"
                                            src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                            data-src="{{ asset('assets/frontend') }}/images/footer/paypal.png"
                                            alt="logo" /></a><a href="#_"><img
                                            src="{{ asset('assets/frontend') }}/images/footer/master.png"
                                            alt="logo" /></a><a href="#_"><img
                                            src="{{ asset('assets/frontend') }}/images/footer/visa.png"
                                            alt="logo" /></a><a href="#_"><img
                                            src="{{ asset('assets/frontend') }}/images/footer/stripe.png"
                                            alt="logo" /></a><a href="#_"><img
                                            src="{{ asset('assets/frontend') }}/images/footer/klarna.png"
                                            alt="logo" /></a>
                                </div>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            var product = @json($product);
            $('.decrement-count-qty').on('click', function() {
                var value = parseInt($('#quantity-input').val());
                // console.log(value);
                if (!isNaN(value) && value > 1) {
                    currentValue = value - 1;
                    const subtotal = currentValue * product.sale_price;
                    const base_price = currentValue * product.base_price;
                    const discount = currentValue * (product.sale_price - product.base_price);
                    const taxAmount = subtotal * (product.tax / 100);
                    if (product.tax != null) {
                        document.getElementById("total").innerHTML = `$${subtotal + taxAmount}`;
                    } else {
                        document.getElementById("total").innerHTML = `$${subtotal}`;
                    }
                    document.getElementById("subtotal").innerHTML = `$${subtotal}`;
                    // document.getElementById("base_price").innerHTML = base_price;
                    // document.getElementById("discount").innerHTML = discount;
                    document.getElementById("items").innerHTML = `${currentValue} items`;
                    $('#quantity-input').val(currentValue);
                    $('#input-items').val(currentValue);
                }
            });

            $('.add-count-qty').on('click', function() {
                var value = parseInt($('#quantity-input').val());
                if (!isNaN(value) && value < product.quantity) {
                    currentValue = value + 1;
                    const subtotal = currentValue * product.sale_price;
                    // const base_price = currentValue * product.base_price;
                    // const discount = currentValue * (product.sale_price - product.base_price);
                    const taxAmount = subtotal * (product.tax / 100);
                    if (product.tax != null) {
                        document.getElementById("total").innerHTML = `$${subtotal + taxAmount}`;
                    } else {
                        document.getElementById("total").innerHTML = `$${subtotal}`;
                    }
                    document.getElementById("subtotal").innerHTML = `$${subtotal}`;
                    // document.getElementById("base_price").innerHTML = base_price;
                    // document.getElementById("discount").innerHTML = discount;
                    document.getElementById("items").innerHTML = `${currentValue} items`;

                    $('#quantity-input').val(currentValue);
                    $('#input-items').val(currentValue);

                }
            });
        });
    </script>
@endsection

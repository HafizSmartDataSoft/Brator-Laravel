@extends('layouts.frontend.master')
@section('title')
    {{ $product_detail->name }} -Brator
@endsection
@section('content')

    @php
        $num_reviews = count($reviews);
        $total_rating = 0;
        $user_review_check = 0;
    @endphp

    @foreach ($reviews as $review)
        @if (session('customerId') == $review->user_id)
            @php
                $user_review_check = 1;
            @endphp
        @endif
        @php
            $total_rating += $review->rating;
        @endphp
    @endforeach

    @if ($num_reviews != 0)
        @php
            $total_rating = (float) $total_rating / (float) $num_reviews;
            $total_rating = number_format($total_rating, 2);
        @endphp
    @endif





    <!-- bread start-->
    <div class="brator-breadcrumb-area gray-bg">
        <div class="container-xxxl container-xxl container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="brator-breadcrumb">
                        <ul>
                            <li><a href="#_">Home</a></li>
                            <li><a href="#_">All Categories</a></li>
                            <li><a
                                    href="{{ route('product-category.show', ['product_category' => $parent_category->slug]) }}">{{ $parent_category->name }}</a>
                            </li>

                            @foreach ($sub_categories as $sub_category)
                                <li><a
                                        href="{{ route('product-category.show', ['product_category' => $sub_category->slug]) }}">{{ $sub_category->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- bread end-->
    <div class="brator-product-header-layout-area desing-one">
        <div class="container-xxxl container-xxl container">
            <div class="row">
                <div class="col-md-12">
                    <div class="brator-product-header-layout">
                        <div class="brator-product-header-layout-img">
                            <div id="tabs-product-img" class="brator-product-img-tab-list js-tabs design-two">
                                <div class="brator-product-img-tab-header js-tabs__header">
                                    <ul>
                                        {{-- <li><a class="js-tabs__title" href="#"
                                                style="background-image:url({{ asset('assets/frontend') }}/images//product-tab-img-01.jpeg)"></a>
                                        </li>
                                        <li><a class="js-tabs__title" href="#"
                                                style="background-image:url({{ asset('assets/frontend') }}/images//product-tab-img-02.jpeg)"></a>
                                        </li>
                                        <li><a class="js-tabs__title" href="#"
                                                style="background-image:url({{ asset('assets/frontend') }}/images//product-tab-img-03.jpeg)"></a>
                                        </li> --}}
                                        @if (count($gallaryImages) != 0)
                                            @foreach ($gallaryImages as $gallaryImage)
                                                @if ($gallaryImage->image_type == 'small_default' && $gallaryImage->image_type != null)
                                                    <li><a class="js-tabs__title" href="#"
                                                            style="background-image:url({{ asset($gallaryImage->image) }})"></a>
                                                    </li>
                                                @endif
                                            @endforeach
                                        @elseif($product_detail->featured_image)
                                            <li><a class="js-tabs__title" href="#"
                                                    style="background-image:url({{ asset($product_detail->featured_image) }})"></a>
                                            </li>
                                        @else
                                        @endif
                                    </ul>
                                </div>

                                @if (count($gallaryImages) != 0)
                                    @foreach ($gallaryImages as $gallaryImage)
                                        @if ($gallaryImage->image_type == 'large_default' && $gallaryImage->image_type != null)
                                            <div class="js-tabs__content brator-product-img-tab-item"><img
                                                    data-action="zoom" class="lazyload"
                                                    src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                    data-src="{{ asset($gallaryImage->image) }}" alt="alt" />
                                                <p>click image to zoom in</p>
                                            </div>
                                        @endif
                                    @endforeach
                                @else
                                    <div class="js-tabs__content brator-product-img-tab-item"><img data-action="zoom"
                                            class="lazyload"
                                            src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                            data-src="{{ asset($product_detail->featured_image) }}" alt="alt" />
                                        <p>click image to zoom in</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="brator-product-layout-header-content">
                            <div class="brator-product-hero-content">
                                <div class="brator-product-hero-content-info">
                                    {{-- <div class="brator-product-hero-content-brand"><a href="#_">Sparegold</a></div> --}}
                                    {{-- <div class="brator-product-hero-content-brand-img"><a href="#_"> <img
                                                class="lazyload"
                                                src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                data-src="{{ asset('assets/frontend') }}/images/b-p-01.jpg"
                                                alt="as" /></a></div> --}}
                                    <div class="brator-product-hero-content-title">
                                        <h2>{{ $product_detail->name }}</h2>
                                    </div>
                                    <div class="brator-product-hero-content-review">

                                        @php
                                            $updated_at = $product_detail->updated_at;
                                            $currentDate = date('Y-m-d');
                                            $dateDifference = strtotime($updated_at) - strtotime($currentDate);
                                            $daysDifference = round($dateDifference / 86400); // 86400 seconds in a day
                                        @endphp

                                        @if ($daysDifference >= 0 && $daysDifference <= 7)
                                            <div class="yollow-batch">New</div>
                                        @endif
                                        @php
                                            $discount = round((($product_detail->base_price - $product_detail->sale_price) / $product_detail->base_price) * 100);
                                            // @dd($discount)
                                        @endphp
                                        {{-- @if ($discount > 0)
                                            <div class="off-batch">{{ $discount }}% OFF</div>
                                        @endif --}}
                                        <div class="brator-review-product">
                                            <div id="product-rating" data-score="{{ $total_rating }}"></div>
                                            <div class="brator-review">
                                                {{-- <svg class="active" fill="#000000" width="52" height="52"
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
                                                <div class="brator-review-text"> --}}
                                                <p>{{ $num_reviews }} Reviews</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="brator-product-single-item-price">
                                        @if ($product_detail->base_price - $product_detail->sale_price > 0)
                                            <span style="color: green;">${{ $product_detail->sale_price }}</span>
                                            <span
                                                style="text-decoration: line-through; color: red;">${{ $product_detail->base_price }}</span>
                                        @else
                                            <span style="color: green;">${{ $product_detail->sale_price }}</span>
                                        @endif
                                    </div>

                                    <div class="brator-product-hero-content-stock">
                                        <h6> {{ $product_detail->status == 3 ? 'Out Stock' : 'In Stock' }}

                                        </h6>
                                    </div>
                                    <div class="brator-product-single-light-info-area">

                                        {{-- <div class="brator-product-single-light-info-share">
                                            <svg id="lni_lni-map-marker" fill="#000000" width="52" height="52"
                                                version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                viewBox="0 0 64 64" xml:space="preserve">
                                                <g>
                                                    <path
                                                        d="M32,1.3c-13.9,0-25.3,11-25.3,24.4c0,10.7,15.3,28.4,21.9,35.6c0.9,1,2.1,1.5,3.4,1.5c1.3,0,2.5-0.5,3.4-1.5                    c6.6-7.1,21.9-24.9,21.9-35.6C57.3,12.2,45.9,1.3,32,1.3z M32.8,58.9c-0.5,0.5-1.2,0.5-1.6,0c-4.9-5.3-21-23.5-21-33.2                    C10.2,14.1,20,4.8,32,4.8s21.8,9.4,21.8,20.9C53.8,35.4,37.7,53.5,32.8,58.9z">
                                                    </path>
                                                    <path
                                                        d="M32,15.7c-5.9,0-10.8,4.8-10.8,10.8c0,5.9,4.8,10.8,10.8,10.8s10.8-4.8,10.8-10.8C42.8,20.5,37.9,15.7,32,15.7z M32,33.7                    c-4,0-7.3-3.3-7.3-7.3c0-4,3.3-7.3,7.3-7.3c4,0,7.3,3.3,7.3,7.3C39.3,30.4,36,33.7,32,33.7z">
                                                    </path>
                                                </g>
                                            </svg>
                                            <p><span>Ship to</span> North Hills, CA 91343</p>
                                        </div> --}}

                                        <div class="brator-product-single-light-info">

                                            {{-- @if ($discount_on_category)
                                            <div class="brator-product-single-light-info-s cat">
                                                <h5>Coupon: </h5>
                                                @foreach ($discount_on_category as $coupon)
                                                        <a href="#_">{{ $coupon->coupon_code }}</a>
                                                @endforeach
                                            </div>
                                            @endif --}}

                                            <div class="brator-product-single-light-info-s cat">
                                                <h5>Categories: </h5>

                                                <a
                                                    href="{{ route('product-category.show', ['product_category' => $parent_category->slug]) }}">{{ $parent_category->name }}</a>

                                            </div>
                                            <div class="brator-product-single-light-info-s">
                                                {{-- <h5>Part Number: </h5><a href="#_">WS5-451A2</a> --}}
                                            </div>
                                            <div class="brator-product-single-light-info-s">
                                                <h5>Tags:</h5>
                                                @foreach ($tags as $tag)
                                                    <a href="{{ route('product-tag.show', ['product_tag' => $tag->id]) }}">
                                                        {{ $tag->name }} </a>
                                                @endforeach
                                                {{-- <a href="#_">tires</a>
                                                <a href="#_">rims</a>
                                                <a href="#_">sliver</a>
                                                <a href="#_">mercedes</a>
                                                <a href="#_">glc</a> --}}
                                            </div>
                                            <div class="brator-product-single-light-info-s">
                                                <h5>In stock:</h5><span>{{ $product_detail->quantity }} pcs</span>
                                            </div>
                                            <div class="brator-product-single-light-info-s">
                                                <h5>SKU:</h5><span>{{ $product_detail->sku }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="brator-product-hero-content-add-to-cart">
                                    {{-- <div class="brator-product-single-cart-select">
                                        <p>Select Size</p>
                                        <select name="tupe">
                                            <option
                                                value="19” DIAMETER (19” x 8.5”), (+35 Offset, 5 x 112 Bolt Pattern, 73.1mm Hub)">
                                                19” DIAMETER (19” x 8.5”), (+35 Offset, 5 x 112 Bolt Pattern, 73.1mm Hub)
                                            </option>
                                            <option
                                                value="19” DIAMETER (19” x 8.5”), (+35 Offset, 5 x 112 Bolt Pattern, 73.1mm Hub)">
                                                17” DIAMETER (19” x 8.5”), (+35 Offset, 2 x 112 Bolt Pattern, 73.1mm Hub)
                                            </option>
                                            <option
                                                value="19” DIAMETER (19” x 8.5”), (+35 Offset, 5 x 112 Bolt Pattern, 73.1mm Hub)">
                                                12” DIAMETER (19” x 8.5”), (+35 Offset, 6 x 112 Bolt Pattern, 73.1mm Hub)
                                            </option>
                                        </select>
                                    </div> --}}
                                    {{-- <div class="brator-product-single-cart-select">
                                        <p>Select Color</p>
                                        <select name="tupe">
                                            <option value="White/Sliver">White/Sliver</option>
                                            <option value="White/hunt">White/hunt</option>
                                            <option value="White/cores">White/cores</option>
                                        </select>
                                    </div> --}}
                                    <div class="brator-product-single-cart-sub-total">
                                        {{-- <p><span>Subtotal:</span> $816.2</p> --}}
                                    </div>
                                    @if ($product_detail->status != 3)
                                        <div class="brator-product-single-cart-count-add">
                                            {{-- <div class="brator-product-single-cart-count">
                                                <div class="brator-brator-cart-list-items-qty">
                                                    <button class="decrement-count-qty">-</button>
                                                    <input type="number" value="1" id="quantity-input" disabled />
                                                    <button class="add-count-qty">+</button>
                                                </div>
                                            </div> --}}
                                            <div class="brator-product-single-cart-add">
                                                <a href="{{ route('product.cart', ['product' => $product_detail->sku]) }}">
                                                    <button>Add
                                                        to cart</button></a>
                                            </div>
                                        </div>
                                    @endif

                                    <div class="brator-product-single-cart-action">
                                        <div class="brator-product-single-cart-wish">
                                            <button>
                                                <svg class="bi bi-suit-heart-fill" xmlns="http://www.w3.org/2000/svg"
                                                    width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                                    <path
                                                        d="M4 1c2.21 0 4 1.755 4 3.92C8 2.755 9.79 1 12 1s4 1.755 4 3.92c0 3.263-3.234 4.414-7.608 9.608a.513.513 0 0 1-.784 0C3.234 9.334 0 8.183 0 4.92 0 2.755 1.79 1 4 1z">
                                                    </path>
                                                </svg><span>Add to Wishlist</span>
                                            </button>
                                        </div>
                                        <div class="brator-product-single-cart-compare">
                                            <button id="compareButton" data-value="{{ $product_detail->id }}">
                                                <!-- You can set your desired value here -->
                                                <svg class="bi bi-arrow-left-right" xmlns="http://www.w3.org/2000/svg"
                                                    width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd"
                                                        d="M1 11.5a.5.5 0 0 0 .5.5h11.793l-3.147 3.146a.5.5 0 0 0 .708.708l4-4a.5.5 0 0 0 0-.708l-4-4a.5.5 0 0 0-.708.708L13.293 11H1.5a.5.5 0 0 0-.5.5zm14-7a.5.5 0 0 1-.5.5H2.707l3.147 3.146a.5.5 0 1 1-.708.708l-4-4a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 4H14.5a.5.5 0 0 1 .5.5z">
                                                    </path>
                                                </svg><span>Add to Compare</span>
                                            </button>
                                        </div>

                                        <div class="brator-product-single-cart-share">
                                            <button>
                                                <svg id="lni_lni-share" fill="#000000" width="52" height="52"
                                                    version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                    viewBox="0 0 64 64" xml:space="preserve">
                                                    <g></g>
                                                    <path
                                                        d="M29.4,41.7c1,0,1.8-0.8,1.8-1.8V23.8c0-6.1,5-11.1,11.1-11.1h14.6l-6.4,4.8c-0.8,0.6-0.9,1.7-0.4,2.4                        c0.3,0.5,0.9,0.7,1.4,0.7c0.4,0,0.7-0.1,1-0.3l8.6-6.5c1-0.7,1.6-1.8,1.5-2.9c0-1.1-0.6-2.2-1.6-2.9l-8.6-6.3                        C51.8,1,50.7,1.2,50.1,2c-0.6,0.8-0.4,1.9,0.4,2.4L57,9.2H42.3c-8.1,0-14.6,6.6-14.6,14.6v16.1C27.6,40.9,28.4,41.7,29.4,41.7z">
                                                    </path>
                                                    <path
                                                        d="M61,38.2c-1,0-1.8,0.8-1.8,1.8v15.5c0,2.1-1.7,3.8-3.8,3.8H8.6c-2.1,0-3.8-1.7-3.8-3.8V39.9c0-1-0.8-1.8-1.8-1.8                        s-1.8,0.8-1.8,1.8v15.5c0,4,3.3,7.3,7.3,7.3h46.8c4,0,7.3-3.3,7.3-7.3V39.9C62.8,38.9,62,38.2,61,38.2z">
                                                    </path>
                                                </svg><span>Share</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="brator-product-frequently-area">
        <div class="container-xxxl container-xxl container">
            <div class="row">
                <div class="col-xxl-9 col-xl-12">
                    <div class="brator-product-single-frequently">
                        <h2>Frequently Bought Together</h2>
                        <div class="brator-product-single-frequently-list">
                            <div class="product-list-items check-box-product">
                                <div class="brator-product-single-item-area design-two">
                                    <div class="brator-product-single-item-info d-none info-content-flex">
                                        <div class="brator-product-single-item-info-left">

                                        </div>
                                        <div class="brator-product-single-item-info-right"><a href="#_">
                                                <svg class="bi bi-suit-heart-fill" xmlns="http://www.w3.org/2000/svg"
                                                    width="16" height="16" fill="currentColor"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M4 1c2.21 0 4 1.755 4 3.92C8 2.755 9.79 1 12 1s4 1.755 4 3.92c0 3.263-3.234 4.414-7.608 9.608a.513.513 0 0 1-.784 0C3.234 9.334 0 8.183 0 4.92 0 2.755 1.79 1 4 1z">
                                                    </path>
                                                </svg></a></div>
                                    </div>
                                    <div class="brator-product-single-item-img"><a href="#_"><img class="lazyload"
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
                                        <div class="brator-product-single-item-checkbox">
                                            <input type="checkbox" name="condcion" />
                                            <div class="arow-check-right"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="brator-product-single-item-area design-two">
                                    <div class="brator-product-single-item-info d-none info-content-left">
                                        <div class="brator-product-single-item-info-left">
                                            <div class="off-batch">20% OFF</div>
                                        </div>
                                    </div>
                                    <div class="brator-product-single-item-img"><a href="#_"><img class="lazyload"
                                                src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                data-src="{{ asset('assets/frontend') }}/images/shop/product-03.jpg"
                                                alt="alt" /></a></div>
                                    <div class="brator-product-single-item-mini">
                                        <div class="brator-product-single-item-cat"><a href="product-layout-01.html">Brake
                                                oil</a></div>
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
                                        <div class="brator-product-single-item-checkbox">
                                            <input type="checkbox" name="condcion" />
                                            <div class="arow-check-right"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="brator-product-single-item-area design-two">
                                    <div class="brator-product-single-item-info d-none info-content-left">
                                        <div class="brator-product-single-item-info-left">
                                            <div class="off-batch">20% OFF</div>
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
                                            <h5><a href="#_"> Evolution and Slotted Brake</a></h5>
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
                                        <div class="brator-product-single-item-checkbox">
                                            <input type="checkbox" name="condcion" />
                                            <div class="arow-check-right"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="brator-product-single-frequently-total">
                                <h6>Total:</h6><span>$409.27</span>
                                <button>Add All To Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-xl-12">
                    <div class="brator-product-single-posts">
                        <h2>Guide & Blog</h2>
                        <div class="brator-blog-post-sidebar-items">
                            <div class="brator-blog-listing-single-item-area list-type-one">
                                <div class="type-post">
                                    <div class="brator-blog-listing-single-item-thumbnail"><a
                                            class="blog-listing-single-item-thumbnail-link" href="#_"
                                            aria-hidden="true" tabindex="-1"><img class="lazyload"
                                                src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                data-src="{{ asset('assets/frontend') }}/images/blog/blog-01.jpg"
                                                alt="blog-post-blog-01.jpg" /></a></div>
                                    <div class="brator-blog-listing-single-item-content">
                                        <h3 class="brator-blog-listing-single-item-title"><a
                                                href="blog-single.html">Replace Brakes Guide</a></h3>
                                        <div class="brator-blog-listing-single-item-excerpt">
                                            <p>The braking system of a vehicle is an important safety [...]</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="brator-blog-listing-single-item-area list-type-one">
                                <div class="type-post">
                                    <div class="brator-blog-listing-single-item-thumbnail"><a
                                            class="blog-listing-single-item-thumbnail-link" href="#_"
                                            aria-hidden="true" tabindex="-1"><img class="lazyload"
                                                src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                data-src="{{ asset('assets/frontend') }}/images/blog/blog-05.jpg"
                                                alt="blog-post-blog-05.jpg" /></a></div>
                                    <div class="brator-blog-listing-single-item-content">
                                        <h3 class="brator-blog-listing-single-item-title"><a
                                                href="blog-single.html">Things to keep in mind when washing a car</a></h3>
                                        <div class="brator-blog-listing-single-item-excerpt">
                                            <p>The braking system of a vehicle is an important safety [...]</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="brator-blog-listing-single-item-area list-type-one">
                                <div class="type-post">
                                    <div class="brator-blog-listing-single-item-thumbnail"><a
                                            class="blog-listing-single-item-thumbnail-link" href="#_"
                                            aria-hidden="true" tabindex="-1"><img class="lazyload"
                                                src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                data-src="{{ asset('assets/frontend') }}/images/blog/blog-06.jpg"
                                                alt="blog-post-blog-06.jpg" /></a></div>
                                    <div class="brator-blog-listing-single-item-content">
                                        <h3 class="brator-blog-listing-single-item-title"><a
                                                href="blog-single.html">Replace Rims by yourself,why not? All tools need to
                                                prepare</a></h3>
                                        <div class="brator-blog-listing-single-item-excerpt">
                                            <p>The braking system of a vehicle is an important safety [...]</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="brator-blog-listing-single-item-area list-type-one">
                                <div class="type-post">
                                    <div class="brator-blog-listing-single-item-thumbnail"><a
                                            class="blog-listing-single-item-thumbnail-link" href="#_"
                                            aria-hidden="true" tabindex="-1"><img class="lazyload"
                                                src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                data-src="{{ asset('assets/frontend') }}/images/blog/blog-07.jpg"
                                                alt="blog-post-blog-07.jpg" /></a></div>
                                    <div class="brator-blog-listing-single-item-content">
                                        <h3 class="brator-blog-listing-single-item-title"><a
                                                href="blog-single.html">Transmission for old car</a></h3>
                                        <div class="brator-blog-listing-single-item-excerpt">
                                            <p>The braking system of a vehicle is an important safety [...]</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="brator-product-single-tab-area design-one-m">
        <div class="container-xxxl container-xxl container">
            <div class="row">
                <div class="col-xxl-8 col-md-12">
                    <div class="brator-product-single-tab-list js-tabs" id="tabs-product-content">
                        <div class="brator-product-single-tab-header js-tabs__header">
                            <ul>
                                <li><a class="js-tabs__title" href="#">Description </a></li>
                                <li><a class="js-tabs__title" href="#">Specification </a></li>
                                <li><a class="js-tabs__title" href="#">Reviews ({{ $num_reviews }}) </a></li>
                                <li><a class="js-tabs__title" href="#">Product Q&A</a></li>
                            </ul>
                        </div>
                        <div class="js-tabs__content brator-product-single-tab-item">
                            <p>
                                {{ $product_detail->description }}
                            </p><img src="{{ asset($product_detail->featured_image) }}" alt="alt" />
                            {{-- <h6> </h6>
                            <ul>
                                <li>Plastic Hub Centering Ring Ensures a Vibration Free Ride</li>
                                <li>Tight Runout Tolerances Ensure thatwheels are Straight, Round and have Even Thickness
                                </li>
                                <li>Factory Balancing ofwheels to Minimize Vibrations and Need forwheel Weights</li>
                                <li>Load Rating Specified on Everywheel</li>
                                <li>Compatible with All Original Equipment Tire Pressure Monitoring System (TPMS) Sensors
                                </li>
                                <li>Correct Fitment for Your Vehicle</li>
                                <li>Precise and Correctwheel Offset for Your Vehicle</li>
                                <li>Metal Decorative Rivets and Extra Thick Emblems Ensure Lasting Good Looks</li>
                                <li>TSW provides a five-year structural warranty</li>
                                <li>2-Year Warranty on Chrome and Silver Finish</li>
                            </ul>
                            <h6>Warranty</h6>
                            <p>With regular care and regular road conditions, SG offers a two-year finish warranty on
                                itswheels with chrome and painted finishes. SG provides a five-year structural warranty
                                forwheels it manufactures that are structurally unsound because of a manufacturing defect
                                caused by SG that makes the wheel unfit for its ordinary purpose. Damage or issues
                                withwheels manufactured by SG that are not caused by, or the result of, a manufacturing
                                defect by SG are not covered under the warranty.</p> --}}
                        </div>
                        <div class="js-tabs__content brator-product-single-tab-item">
                            <div class="specification-product-area">
                                <div class="specification-product-item">
                                    <div class="specification-product-item-left">
                                        <p>Brand</p>
                                    </div>
                                    <div class="specification-product-item-right header-light">
                                        <p>SpareGold</p>
                                    </div>
                                </div>
                                <div class="specification-product-item">
                                    <div class="specification-product-item-left">
                                        <p>Country</p>
                                    </div>
                                    <div class="specification-product-item-right">
                                        <p>Germany</p>
                                    </div>
                                </div>
                                <div class="specification-product-item">
                                    <div class="specification-product-item-left">
                                        <p>Part Number</p>
                                    </div>
                                    <div class="specification-product-item-right">
                                        <p>WS5-451A2</p>
                                    </div>
                                </div>
                                <div class="specification-product-item">
                                    <div class="specification-product-item-left">
                                        <p>Color</p>
                                    </div>
                                    <div class="specification-product-item-right">
                                        <p>Gray</p>
                                    </div>
                                </div>
                                <div class="specification-product-item">
                                    <div class="specification-product-item-left">
                                        <p>Material</p>
                                    </div>
                                    <div class="specification-product-item-right">
                                        <p>6.5 in</p>
                                    </div>
                                </div>
                                <div class="specification-product-item">
                                    <div class="specification-product-item-left">
                                        <p>Width</p>
                                    </div>
                                    <div class="specification-product-item-right">
                                        <p>73 mm</p>
                                    </div>
                                </div>
                                <div class="specification-product-item">
                                    <div class="specification-product-item-left">
                                        <p>Bore Diameter</p>
                                    </div>
                                    <div class="specification-product-item-right">
                                        <p>Replica 178</p>
                                    </div>
                                </div>
                                <div class="specification-product-item">
                                    <div class="specification-product-item-left">
                                        <p>Surface Finish</p>
                                    </div>
                                    <div class="specification-product-item-right">
                                        <p>Sliver Gloss</p>
                                    </div>
                                </div>
                                <div class="specification-product-item">
                                    <div class="specification-product-item-left">
                                        <p>Warranty</p>
                                    </div>
                                    <div class="specification-product-item-right">
                                        <p>Jante 2-Year Limited Warranty</p>
                                    </div>
                                </div>
                                <div class="specification-product-item">
                                    <div class="specification-product-item-left">
                                        <p>Product Fit</p>
                                    </div>
                                    <div class="specification-product-item-right">
                                        <p>Direct Fit</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="js-tabs__content brator-product-single-tab-item">
                            <div class="brator-review-comment-area">
                                <div class="brator-review-comment">

                                    <div class="brator-review-pint-count">
                                        <h6>{{ $total_rating }}/5 </h6>
                                    </div>

                                    <div class="brator-review-comment-count">

                                        <div class="user-review-rating" data-score="{{ $total_rating }}"></div>

                                        <div class="brator-review-text">
                                            <p>{{ $num_reviews }} Reviews</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="brator-review-comment-list">
                                    @foreach ($reviews as $review)
                                        <div class="brator-review-comment-single-item">
                                            <div class="brator-review-comment-single-img"><img class="lazyload"
                                                    src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                    data-src="{{ asset('assets/frontend') }}/images/profile-03.jpg"
                                                    alt="logo" /></div>
                                            <div class="brator-review-comment-single-content">
                                                <div class="brator-review-comment-single-title">

                                                    <h6> {{ $review->title }} </h6>
                                                    <div class="user-review-rating" data-score="{{ $review->rating }}">
                                                    </div>
                                                    <p>{{ $review->comment }} </p>
                                                </div>
                                                <div class="brator-review-comment-date">
                                                    <h6><a href="#_">{{ $review->user->first_name }} </a>on
                                                        {{ $review->created_at->diffForHumans() }} </h6>
                                                </div>
                                                @if (session('customerId') == $review->user_id)
                                                    <div style="display: inline;" class="brator-review-comment-date">
                                                        <h6><a id="rating_edit" href="#_">Edit </a>
                                                        </h6>
                                                    </div>
                                                @endif

                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            @if (session('customerId'))
                                @if ($user_review_check != 1)
                                    <form id="myForm" action="{{ route('review.store') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $product_detail->id }}">
                                        <div class="brator-contact-form-area product-review-form">
                                            <div class="brator-contact-form-header">
                                                <h2>Write Your Review</h2>
                                            </div>
                                            <div class="product-review-tag"
                                                style="  display: flex;
                                     align-items: center;">
                                                <p>Your Rating</p>
                                                <div id="review-rating"></div>
                                            </div>
                                        </div>
                                        <div class="brator-contact-form-fields">
                                            <div class="brator-contact-form-field">
                                                <input type="text" name="title"
                                                    placeholder="Give your review a tittle (Optional)" />
                                            </div>
                                            <div class="brator-contact-form-field">
                                                <textarea name="comment" placeholder="Write your review here"></textarea>
                                            </div>
                                            <div class="brator-contact-form-field">
                                                <button type="submit">Submit Review</button>
                                            </div>
                                        </div>
                                    </form>
                                @else
                                    <div style="display: none;" id="edit-rating">
                                        @foreach ($reviews as $review)
                                            @if ($review->user_id == session('customerId'))
                                                <form id="myForm"
                                                    action="{{ route('review.update', ['review' => $review->id]) }}"
                                                    method="POST" enctype="multipart/form-data">
                                                    @method('PUT')
                                                    @csrf
                                                    <input type="hidden" name="product_id"
                                                        value="{{ $product_detail->id }}">
                                                    <div class="brator-contact-form-area product-review-form">
                                                        <div class="brator-contact-form-header">
                                                            <h2>Write Your Review</h2>
                                                        </div>
                                                        <div class="product-review-tag"
                                                            style="  display: flex; align-items: center;">
                                                            <p>Your Rating</p>
                                                            <div id="review-rating" data-score="{{ $review->rating }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="brator-contact-form-fields">
                                                        <div class="brator-contact-form-field">
                                                            <input type="text" name="title"
                                                                placeholder="Give your review a tittle (Optional)"
                                                                value="{{ $review->title }}" />
                                                        </div>
                                                        <div class="brator-contact-form-field">
                                                            <textarea name="comment" placeholder="Write your review here">{{ $review->comment }}</textarea>
                                                        </div>
                                                        <div class="brator-contact-form-field">
                                                            <button type="submit">Update Review</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            @endif
                                        @endforeach
                                    </div>
                                @endif
                            @else
                                <p> To give review you need to login first.</p>
                            @endif

                        </div>
                        <div class="js-tabs__content brator-product-single-tab-item">
                            <p>pug</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- bread start-->
    <div class="brator-deal-product-slider recently-view">
        <div class="container-xxxl container-xxl container">
            <div class="row">
                <div class="col-12">
                    <div class="brator-section-header">
                        <div class="brator-section-header-title">
                            <h2>You May Also Like</h2>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="brator-product-slider splide js-splide p-splide"
                        data-splide='{"pagination":false,"type":"loop","perPage":5,"perMove":"1","gap":30, "breakpoints":{ "520" :{ "perPage": "1" },"746" :{ "perPage": "2" }, "768" :{ "perPage" : "3" }, "1090":{ "perPage" : "3" }, "1366":{ "perPage" : "4" }, "1500":{ "perPage" : "4" }, "1920":{ "perPage" : "5" }}}'>
                        <div class="splide__arrows style-two">
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
                                            <div class="yollow-batch">New</div>
                                        </div>
                                    </div>
                                    <div class="brator-product-single-item-img"><a href="#_"><img class="lazyload"
                                                src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                data-src="{{ asset('assets/frontend') }}/images/shop/wheel-01.jpg"
                                                alt="alt" /></a></div>
                                    <div class="brator-product-single-item-mini">
                                        <div class="brator-product-single-item-cat"><a
                                                href="product-layout-01.html">Brakepro</a></div>
                                        <div class="brator-product-single-item-title">
                                            <h5><a href="#_"> Evolution Sport Drilled and Slotted Brake Kit</a></h5>
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
                                        <div class="brator-product-single-item-btn"><a href="product-layout-01.html">Add
                                                to cart</a></div>
                                    </div>
                                </div>
                                <div class="brator-product-single-item-area splide__slide design-two">
                                    <div class="brator-product-single-item-info info-content-left">
                                        <div class="brator-product-single-item-info-left">
                                            <div class="stock-out-batch">Out OF stock</div>
                                        </div>
                                    </div>
                                    <div class="brator-product-single-item-img"><a href="#_"><img class="lazyload"
                                                src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                data-src="{{ asset('assets/frontend') }}/images/shop/wheel-02.jpg"
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
                                        <div class="brator-product-single-item-btn"><a href="product-layout-01.html">Add
                                                to cart</a></div>
                                    </div>
                                </div>
                                <div class="brator-product-single-item-area splide__slide design-two">
                                    <div class="brator-product-single-item-info info-content-left">
                                        <div class="brator-product-single-item-info-left">
                                            <div class="off-batch">20% OFF</div>
                                        </div>
                                    </div>
                                    <div class="brator-product-single-item-img"><a href="#_"><img class="lazyload"
                                                src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                data-src="{{ asset('assets/frontend') }}/images/shop/wheel-03.jpg"
                                                alt="alt" /></a></div>
                                    <div class="brator-product-single-item-mini">
                                        <div class="brator-product-single-item-cat"><a href="product-layout-01.html">Brake
                                                oil</a></div>
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
                                        <div class="brator-product-single-item-btn"><a href="product-layout-01.html">Add
                                                to cart</a></div>
                                    </div>
                                </div>
                                <div class="brator-product-single-item-area splide__slide design-two">
                                    <div class="brator-product-single-item-info info-content-left">
                                        <div class="brator-product-single-item-info-left">
                                            <div class="off-batch">20% OFF</div>
                                        </div>
                                    </div>
                                    <div class="brator-product-single-item-img"><a href="#_"><img class="lazyload"
                                                src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                data-src="{{ asset('assets/frontend') }}/images/shop/wheel-04.jpg"
                                                alt="alt" /></a></div>
                                    <div class="brator-product-single-item-mini">
                                        <div class="brator-product-single-item-cat"><a
                                                href="product-layout-01.html">onwheel</a></div>
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
                                        <div class="brator-product-single-item-btn"><a href="product-layout-01.html">Add
                                                to cart</a></div>
                                    </div>
                                </div>
                                <div class="brator-product-single-item-area splide__slide design-two">
                                    <div class="brator-product-single-item-info info-content-left">
                                        <div class="brator-product-single-item-info-left">
                                            <div class="off-batch">20% OFF</div>
                                        </div>
                                    </div>
                                    <div class="brator-product-single-item-img"><a href="#_"><img class="lazyload"
                                                src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                data-src="{{ asset('assets/frontend') }}/images/shop/wheel-05.jpg"
                                                alt="alt" /></a></div>
                                    <div class="brator-product-single-item-mini">
                                        <div class="brator-product-single-item-cat"><a
                                                href="product-layout-01.html">onwheel</a></div>
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
                                        <div class="brator-product-single-item-btn"><a href="product-layout-01.html">Add
                                                to cart</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- bread end-->

    <div class="brator-plan-pixel-area">
        <div class="container-xxxl container-xxl container">
            <div class="col-12">
                <div class="plan-pixel-area"></div>
            </div>
        </div>
    </div>

    <!-- bread start-->
    @if ($recentlyViewed != null)
        <div class="brator-deal-product-slider recently-view">
            <div class="container-xxxl container-xxl container">
                <div class="row">
                    <div class="col-12">
                        <div class="brator-section-header">
                            <div class="brator-section-header-title">
                                <h6>Recently Viewed</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="brator-product-slider splide js-splide p-splide"
                            data-splide='{"pagination":false,"type":"slide","perPage":5,"perMove":"1","gap":30, "breakpoints":{ "520" :{ "perPage": "1" },"746" :{ "perPage": "2" }, "767" :{ "perPage" : "2" }, "1090":{ "perPage" : "3" }, "1366":{ "perPage" : "4" }, "1500":{ "perPage" : "4" }, "1920":{ "perPage" : "5" }}}'>
                            <div class="splide__arrows style-two">
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
                                    @foreach ($recentlyViewed as $product)
                                        <div class="brator-product-single-item-area splide__slide design-two">
                                            <div class="brator-product-single-item-info info-content-flex">
                                                <div class="brator-product-single-item-info-left">
                                                    @php
                                                        $updated_at = $product->updated_at;
                                                        $currentDate = date('Y-m-d');
                                                        $dateDifference = strtotime($updated_at) - strtotime($currentDate);
                                                        $daysDifference = round($dateDifference / 86400);
                                                    @endphp

                                                    @if ($daysDifference >= 0 && $daysDifference <= 7)
                                                        <div class="yollow-batch">New</div>
                                                    @endif @php
                                                        $discount = round((($product->base_price - $product->sale_price) / $product->base_price) * 100);

                                                        // @dd($discount)

                                                    @endphp
                                                    @if ($discount > 0)
                                                        <div class="off-batch">{{ $discount }}% OFF</div>
                                                    @endif {{-- <div class="stock-out-batch">Out OF stock</div> --}}
                                                </div>
                                                <div class="brator-product-single-item-info-right"><a
                                                        href="{{ route('product-details.show', ['product_detail' => $product->sku]) }}">
                                                        <svg class="bi bi-suit-heart-fill"
                                                            xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" fill="currentColor" viewBox="0 0 16 16">
                                                            <path
                                                                d="M4 1c2.21 0 4 1.755 4 3.92C8 2.755 9.79 1 12 1s4 1.755 4 3.92c0 3.263-3.234 4.414-7.608 9.608a.513.513 0 0 1-.784 0C3.234 9.334 0 8.183 0 4.92 0 2.755 1.79 1 4 1z">
                                                            </path>
                                                        </svg></a></div>
                                            </div>

                                            <div class="brator-product-single-item-img"><a
                                                    href="{{ route('product-details.show', ['product_detail' => $product->sku]) }}"><img
                                                        class="lazyload"
                                                        src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                        data-src="{{ asset($product->featured_image) }}"
                                                        alt="alt" /></a>
                                            </div>

                                            <div class="brator-product-single-item-mini">
                                                @foreach ($categories as $parent_category)
                                                    <div class="brator-product-single-item-cat">
                                                        @if ($parent_category->id == $product->parent_category)
                                                            <a
                                                                href="{{ route('product-details.show', ['product_detail' => $product->sku]) }}">{{ $parent_category->name }}</a>
                                                        @endif
                                                    </div>
                                                @endforeach
                                                <div class="brator-product-single-item-title">
                                                    <h5><a
                                                            href="{{ route('product-details.show', ['product_detail' => $product->sku]) }}">{{ $product->name }}</a>
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
                                                        <svg class="d-active" fill="#000000" width="52"
                                                            height="52" version="1.1"
                                                            xmlns="http://www.w3.org/2000/svg"
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
                                                    <p><sub>${{ $product->sale_price }}</sub><b class="pub">
                                                            ${{ $product->base_price }} </b></p>
                                                </div>
                                                <div class="brator-product-single-item-btn">
                                                    <a href="{{ route('product.cart', ['product' => $product->sku]) }}">Add
                                                        to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <!-- bread end-->
@endsection


@section('js')
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
    <script>
        $(document).ready(function() {
            var product_detail = @json($product_detail);
            $('.decrement-count-qty').on('click', function() {
                var currentValue = parseInt($('#quantity-input').val());
                // console.log(currentValue);
                if (!isNaN(currentValue) && currentValue > 1) {
                    $('#quantity-input').val(currentValue - 1);
                }
            });
            $('.add-count-qty').on('click', function() {
                var currentValue = parseInt($('#quantity-input').val());
                if (!isNaN(currentValue) && currentValue < product_detail.quantity) {
                    $('#quantity-input').val(currentValue + 1);
                }
            });
        });
    </script>

    <script>
        // Get the button element by its ID
        const compareButton = document.getElementById("compareButton");

        // Add a click event listener to the button
        compareButton.addEventListener("click", function() {
            // Get the value from the data-value attribute
            const compare = compareButton.getAttribute("data-value");
            // console.log(compare);
            // Make an AJAX request to send the value to a controller
            $.ajax({
                url: "{{ route('product.store-compare') }}",
                method: 'GET',
                data: {
                    value: compare
                },
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}" // Include the CSRF token in the headers
                },
                success: function(data) {
                    setTimeout(function() {
                        alert("The Product is Added to Compare!");
                    }, 500);
                    // console.log(data);
                    // Update the product list or grid with sorted data
                    // You can replace the content of the product grid or list with the sorted data here.
                },
                error: function(xhr, status, error) {
                    console.error(error);
                    // Handle errors or display an error message to the user.
                }
            });

        });
    </script>

    <script>
        $(document).ready(function() {
            $('#product-rating').raty({
                // score: function() {
                //     return $(this).attr('data-score');
                // },
                // score: 3,
                readOnly: true
            });
            $('.user-review-rating').raty({
                // score: function() {
                //     return $(this).attr('data-score');
                // },
                // score: 3,
                readOnly: true
            });


            // $('#review-rating').raty({
            //     half: true,
            //     // readOnly: true
            // });

            $('#review-rating').raty({
                click: function(score, evt) {
                    // alert('ID: ' + this.id + "\nscore: " + score + "\nevent: " + evt);
                }
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const myDiv = document.getElementById('edit-rating');
            const rating_edit = document.getElementById('rating_edit');

            rating_edit.addEventListener('click', function() {
                // $('#category').hide();
                if (myDiv.style.display === 'none' || myDiv.style.display === '') {
                    myDiv.style.display = 'inline';
                    rating_edit.style.display = 'none';
                } else {
                    myDiv.style.display = 'none'; // Hide the div
                }
            });
        });
        // $('#category').show();
    </script>
    <script>
        // var submitButton = document.getElementById("formbutton");
        var submitButton = document.querySelector("#myForm button[type=submit]");
        submitButton.addEventListener("click", function(e) {
            e.preventDefault();
            e.stopPropagation();
            // Get the div element

            const review_rating = document.getElementById('review-rating');
            const inputElement = review_rating.querySelector('input');
            const inputValue = inputElement.value;
            console.log(inputValue);
            // console.log(store);
            if (inputValue != 0) {
                document.getElementById('myForm').submit();
            } else {
                setTimeout(function() {
                    alert("Please Select a Rating!");
                }, 500);
            }
        });
    </script>
@endsection

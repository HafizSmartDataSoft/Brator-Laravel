@extends('layouts.frontend.master')
@section('title')
    Brator Comparing Products
@endsection
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend') }}/css/compare-style.css" />
@endsection
@section('content')
    <!-- Compare products area start -->
    <div class="brator-deal-product-slider brator-compar-products">
        <div class="container-xxxl container-xxl container">
            <div class="row">
                <div class="col-12">
                    <div class="brator-section-header all-item-left">
                        <div class="brator-section-header-title">
                            <h2>Comparing Products</h2>
                        </div>
                        {{-- <a href="#_">See All Member
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z">
                                </path>
                            </svg>
                        </a> --}}
                    </div>
                </div>
                <div class="col-12">
                    @if ($compareProduct != null)
                        @if (count($compareProduct) != 0)
                            <div class="brator-compare-table-content">
                                <div class="brator-compare-title-full-area">
                                    <div class="brator-compare-title-top">
                                        <p>&nbsp;</p>
                                    </div>
                                    <div class="brator-compare-title-bottom">
                                        <div class="brator-compare-item-title-area">
                                            <div class="brator-compare-title-item">
                                                <p>Description</p>
                                            </div>
                                            <div class="brator-compare-title-item">
                                                <p>Vendor</p>
                                            </div>
                                            <div class="brator-compare-title-item">
                                                <p>Color</p>
                                            </div>
                                            <div class="brator-compare-title-item">
                                                <p>Size</p>
                                            </div>
                                            <div class="brator-compare-title-item">
                                                <p>Material</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="brator-compare-item-box">
                                    <div class="brator-product-slider splide js-splide p-splide"
                                        data-splide='{"pagination":false,"type":"slide","perPage":4,"perMove":"1","gap":0, "breakpoints":{ "520" :{ "perPage": "1" },"746" :{ "perPage": "1" }, "767" :{ "perPage" : "1" }, "1090":{ "perPage" : "2" }, "1366":{ "perPage" : "3" }, "1500":{ "perPage" : "4" }, "1920":{ "perPage" : "4" }}}'>
                                        <div class="splide__arrows style-two">
                                            <button class="splide__arrow splide__arrow--prev">
                                                <svg class="bi bi-chevron-right" xmlns="http://www.w3.org/2000/svg"
                                                    width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd"
                                                        d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z">
                                                    </path>
                                                </svg>
                                            </button>
                                            <button class="splide__arrow splide__arrow--next">
                                                <svg class="bi bi-chevron-right" xmlns="http://www.w3.org/2000/svg"
                                                    width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd"
                                                        d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z">
                                                    </path>
                                                </svg>
                                            </button>
                                        </div>
                                        <div class="splide__track">
                                            <div class="splide__list">
                                                <!-- single slide -->

                                                @foreach ($compareProduct as $product)
                                                    <div class="brator-product-single-item-area splide__slide design-two">
                                                        <div class="brator-compare-product-content">
                                                            <div class="brator-product-single-item-info info-content-flex">
                                                                <div class="brator-product-single-item-info-right">
                                                                    <a
                                                                        href="{{ route('product.delete-compare', ['compare' => $product->id]) }}">
                                                                        <svg aria-hidden="true" focusable="false"
                                                                            data-prefix="far" data-icon="trash-alt"
                                                                            class="svg-inline--fa fa-trash-alt fa-w-14"
                                                                            role="img"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            viewBox="0 0 448 512">
                                                                            <path fill="currentColor"
                                                                                d="M268 416h24a12 12 0 0 0 12-12V188a12 12 0 0 0-12-12h-24a12 12 0 0 0-12 12v216a12 12 0 0 0 12 12zM432 80h-82.41l-34-56.7A48 48 0 0 0 274.41 0H173.59a48 48 0 0 0-41.16 23.3L98.41 80H16A16 16 0 0 0 0 96v16a16 16 0 0 0 16 16h16v336a48 48 0 0 0 48 48h288a48 48 0 0 0 48-48V128h16a16 16 0 0 0 16-16V96a16 16 0 0 0-16-16zM171.84 50.91A6 6 0 0 1 177 48h94a6 6 0 0 1 5.15 2.91L293.61 80H154.39zM368 464H80V128h288zm-212-48h24a12 12 0 0 0 12-12V188a12 12 0 0 0-12-12h-24a12 12 0 0 0-12 12v216a12 12 0 0 0 12 12z">
                                                                            </path>
                                                                        </svg>
                                                                    </a>
                                                                </div>
                                                                <div class="brator-product-single-item-info-left">
                                                                    @php
                                                                        $discount = round((($product->base_price - $product->sale_price) / $product->base_price) * 100);

                                                                        // @dd($discount)
                                                                    @endphp
                                                                    @if ($discount > 0)
                                                                        <div class="off-batch">{{ $discount }}% OFF
                                                                        </div>
                                                                    @endif
                                                                </div>
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
                                                                        <svg class="active" fill="#000000" width="52"
                                                                            height="52" version="1.1"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                            x="0px" y="0px"
                                                                            viewBox="0 0 64 64">
                                                                            <path
                                                                                d="M59.7,23.9l-18.1-2.8L33.4,3.9c-0.6-1.2-2.2-1.2-2.8,0l-8.2,17.3L4.4,23.9c-1.3,0.2-1.8,1.9-0.8,2.8l13.1,13.5l-3.1,18.9  c-0.2,1.3,1.1,2.4,2.3,1.6l16.3-8.9l16.2,8.9c1.1,0.6,2.5-0.4,2.2-1.6l-3.1-18.9l13.1-13.5C61.4,25.8,61,24.1,59.7,23.9z">
                                                                            </path>
                                                                        </svg>
                                                                        <svg class="active" fill="#000000" width="52"
                                                                            height="52" version="1.1"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                            x="0px" y="0px"
                                                                            viewBox="0 0 64 64">
                                                                            <path
                                                                                d="M59.7,23.9l-18.1-2.8L33.4,3.9c-0.6-1.2-2.2-1.2-2.8,0l-8.2,17.3L4.4,23.9c-1.3,0.2-1.8,1.9-0.8,2.8l13.1,13.5l-3.1,18.9  c-0.2,1.3,1.1,2.4,2.3,1.6l16.3-8.9l16.2,8.9c1.1,0.6,2.5-0.4,2.2-1.6l-3.1-18.9l13.1-13.5C61.4,25.8,61,24.1,59.7,23.9z">
                                                                            </path>
                                                                        </svg>
                                                                        <svg class="active" fill="#000000" width="52"
                                                                            height="52" version="1.1"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                            x="0px" y="0px"
                                                                            viewBox="0 0 64 64">
                                                                            <path
                                                                                d="M59.7,23.9l-18.1-2.8L33.4,3.9c-0.6-1.2-2.2-1.2-2.8,0l-8.2,17.3L4.4,23.9c-1.3,0.2-1.8,1.9-0.8,2.8l13.1,13.5l-3.1,18.9  c-0.2,1.3,1.1,2.4,2.3,1.6l16.3-8.9l16.2,8.9c1.1,0.6,2.5-0.4,2.2-1.6l-3.1-18.9l13.1-13.5C61.4,25.8,61,24.1,59.7,23.9z">
                                                                            </path>
                                                                        </svg>
                                                                        <svg class="active" fill="#000000" width="52"
                                                                            height="52" version="1.1"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                            x="0px" y="0px"
                                                                            viewBox="0 0 64 64">
                                                                            <path
                                                                                d="M59.7,23.9l-18.1-2.8L33.4,3.9c-0.6-1.2-2.2-1.2-2.8,0l-8.2,17.3L4.4,23.9c-1.3,0.2-1.8,1.9-0.8,2.8l13.1,13.5l-3.1,18.9  c-0.2,1.3,1.1,2.4,2.3,1.6l16.3-8.9l16.2,8.9c1.1,0.6,2.5-0.4,2.2-1.6l-3.1-18.9l13.1-13.5C61.4,25.8,61,24.1,59.7,23.9z">
                                                                            </path>
                                                                        </svg>
                                                                        <svg class="d-active" fill="#000000"
                                                                            width="52" height="52" version="1.1"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                            x="0px" y="0px"
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
                                                                    @if ($product->base_price - $product->sale_price > 0)
                                                                        <p><sub>${{ $product->sale_price }}</sub><b
                                                                                class="pub">
                                                                                ${{ $product->base_price }} </b></p>
                                                                    @else
                                                                        <p><sub>${{ $product->sale_price }}</sub></p>
                                                                    @endif
                                                                </div>
                                                                <div class="brator-product-single-item-btn"><a
                                                                        href="{{ route('product-details.show', ['product_detail' => $product->sku]) }}">Add
                                                                        to cart</a></div>
                                                            </div>
                                                        </div>
                                                        <div class="brator-compare-product-info">
                                                            <div class="brator-compare-info-list">
                                                                <p>Short unique description</p>
                                                            </div>
                                                            <div class="brator-compare-info-list">
                                                                <p>Guess</p>
                                                            </div>
                                                            <div class="brator-compare-info-list">
                                                                <p>White</p>
                                                            </div>
                                                            <div class="brator-compare-info-list">
                                                                <p>Included Tax</p>
                                                            </div>
                                                            <div class="brator-compare-info-list">
                                                                <p>-</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="col-xxl-9 col-12">
                                <p class="brator-not-found">No product selected to compare .</p>
                            </div>
                        @endif
                    @else
                        <div class="col-xxl-9 col-12">
                            <p class="brator-not-found">No product selected to compare .</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Compare products area end -->
@endsection


@section('js')
    <script>
        // remove promo products area
        let rootElement = document.getElementById("promo-close-button")
        let mainBox = document.querySelector('.sd-promo-products-area')

        function addRemovedClass(el, className) {
            el.classList.add(className)
        }
        rootElement.onclick = e => {
            addRemovedClass(mainBox, 'remove-sd-promo-products-area')
        }
        // animation class
        let addClass = e => {
            document.getElementById("fomo-active-area").classList.add("fomo-open");
        }
        setTimeout(addClass, 1000);
    </script>
@endsection

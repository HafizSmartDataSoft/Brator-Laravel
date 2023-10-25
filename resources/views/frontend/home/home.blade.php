@extends('layouts.frontend.master')

@section('title')
    Brator Home
@endsection

@section('content')
    <!-- Banner style two start -->
    <div class="brator-main-banner-area banner-style-two lazyload"
        data-bg="{{ asset('assets/frontend') }}/images/banner/banner-1.jpg">
        <div class="container-xxxl container-xxl container">
            <div class="row">
                <div class="col-md-12">
                    <div class="brator-main-banner-content">
                        <p>#1 Online Marketplace</p>
                        <h2>Car Spares OEM & Atermarkets</h2>
                    </div>
                    <!-- Search by Vehicle -->
                    <div class="brator-parts-search-box-area search-box-with-banner design-two">
                        <div class="brator-parts-search-box-header">
                            <h2>Search by Vehicle</h2>
                            <p>Filter your results by entering your Vehicle to ensure you find the parts that fit.</p>
                        </div>
                        <form action="{{ route('search') }}" method="GET" enctype="multipart/form-data">
                            @csrf
                            <div class="brator-parts-search-box-form">
                                <select name="year" class="select-year-parts brator-select-active" id="selecteYear">
                                    <option value="">Year</option>
                                    @foreach ($years as $year)
                                        <option value="{{ $year }}">{{ $year}}</option>
                                    @endforeach
                                </select>
                                <select name="make"  class="select-make-parts brator-select-active" id="makeSelect" disabled="disabled">
                                    <option value="anything">Make</option>

                                </select>
                                <select name="model" class="select-model-parts brator-select-active" id="modelSelect"
                                    disabled="disabled">
                                    <option value="anything">Model</option>
                                </select>
                                {{-- <select class="select-sub-model-parts brator-select-active" disabled="disabled">
                                    <option value="anything">Sub Model</option>
                                </select> --}}
                                {{-- <select class="select-engine-parts brator-select-active" disabled="disabled">
                                    <option value="anything">Engine</option>
                                </select> --}}
                                <button type="submit">Search</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Banner style two end -->

    <!-- Brator categories list three area start -->

    <div class="brator-categories-list-area design-two categories-with-load-more gray-bg">
        <div class="container-xxxl container-xxl container">
            <div class="row">
                <div class="col-md-12">
                    <div class="brator-section-header">
                        <div class="brator-section-header-title">
                            <h2>Shop by Categories</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="brator-categories-list">
                        @php
                            $i = 0;
                        @endphp
                        @foreach ($categories as $category)
                            @if ($category->parent_id == null && $i < 14)
                                <div class="brator-categories-single">
                                    <div class="brator-categories-single-img"><a {{-- href="{{ route('product-category.show', ['product_category' => $category->id]) }}"  --}}
                                            href="{{ route('product-category.show', ['product_category' => $category->slug]) }}">
                                            <img class="lazyload"
                                                src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                data-src="{{ asset($category->image) }}" alt="logo" /></a></div>
                                    <div class="brator-categories-single-title">
                                        <p>
                                            <a
                                                href="{{ route('product-category.show', ['product_category' => $category->slug]) }}">
                                                {{ $category->name }}
                                            </a>
                                        </p>
                                    </div>

                                    {{-- <div class="brator-categories-single-sub">
                                    @foreach ($categories as $sub_category)
                                        @if ($category->id == $sub_category->parent_id)
                                            <a href="#_">{{ $sub_category->name }}</a>
                                        @endif
                                    @endforeach
                                </div> --}}

                                    @php
                                        $i++;
                                    @endphp
                                </div>
                            @endif
                        @endforeach
                    </div>
                    {{-- {{ $categories->onEachSide(10)->links() }} --}}
                </div>
                <div id="myDiv" style="display: none;" class="col-md-12">
                    @php
                        $i = 0;
                        $j = 0;
                    @endphp
                    <div class="brator-categories-list">
                        @foreach ($categories as $category)
                            @if ($category->parent_id == null)
                                @if ($i >= 14 && $j < 28)
                                    <div class="brator-categories-single">
                                        <div class="brator-categories-single-img"><a {{-- href="{{ route('product-category.show', ['product_category' => $category->id]) }}"  --}}
                                                href="{{ route('product-category.show', ['product_category' => $category->slug]) }}">
                                                <img class="lazyload"
                                                    src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                    data-src="{{ asset($category->image) }}" alt="logo" /></a></div>
                                        <div class="brator-categories-single-title">
                                            <p>
                                                <a
                                                    href="{{ route('product-category.show', ['product_category' => $category->slug]) }}">
                                                    {{ $category->name }}
                                                </a>
                                            </p>
                                        </div>

                                        {{-- <div class="brator-categories-single-sub">
                                                @foreach ($categories as $sub_category)
                                                    @if ($category->id == $sub_category->parent_id)
                                                        <a href="#_">{{ $sub_category->name }}</a>
                                                    @endif
                                                @endforeach
                                            </div> --}}

                                    </div>
                                    @php
                                        $j++;
                                    @endphp
                                @endif
                                @php
                                    $i++;
                                @endphp
                            @endif
                        @endforeach
                        {{-- @dd($j) --}}
                    </div>
                    {{-- {{ $categories->onEachSide(10)->links() }} --}}
                </div>
                <div style="display: inline;" class="brator-categories-list-load-more">
                    <button id="load_more" class="brator-categories-more-button">Load More</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Brator categories list three area end -->
    <!-- Brator whats hot area start -->
    <div class="brator-offer-slider-area brator-whats-hot-area">
        <div class="container-xxxl container-xxl container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="brator-section-header">
                        <h2>What's Hot</h2>
                    </div>
                    <div class="brator-offer-slider brator-whats-hot-slider splide js-splide p-splide"
                        data-splide='{"autoplay":false, "arrows":true,"pagination":false,"type":"loop","perPage":4,"perMove":"1","gap":15, "breakpoints":{ "520" :{ "perPage": "1" },"767" :{ "perPage": "1" }, "991" :{ "perPage" : "2" }, "1090":{ "perPage" : "2" }, "1366":{ "perPage" : "3" }, "1500":{ "perPage" : "4" }, "1920":{ "perPage" : "4" }}}'>
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
                                <!-- single item -->
                                <div class="splide__slide">
                                    <div class="brator-hot-single-box brator-hot-box-design-one lazyload"
                                        data-bg="{{ asset('assets/frontend') }}/images/hot/hot-1.png">
                                        <div class="brator-hot-box-content">
                                            <div class="brator-hot-box-text">
                                                <p>Keep things running smoothly</p>
                                                <h2>Helix <br />Engine <br />Oils</h2>
                                            </div>
                                            <div class="brator-hot-box-button">
                                                <a href="shop-sub-category.html">Shop Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- single item -->
                                <div class="splide__slide">
                                    <div class="brator-hot-single-box brator-hot-box-design-two lazyload"
                                        data-bg="{{ asset('assets/frontend') }}/images/hot/hot-2.png">
                                        <div class="brator-hot-box-content">
                                            <div class="brator-hot-box-text">
                                                <h2><span>Dunlon</span> Tires<br />& Wheels</h2>
                                                <div class="best-choise-batch">
                                                    <span>Best Choice</span>
                                                </div>
                                            </div>
                                            <div class="brator-hot-box-button">
                                                <a href="shop-sub-category.html">Shop Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- single item -->
                                <div class="splide__slide">
                                    <div class="brator-hot-single-box brator-hot-box-design-three lazyload"
                                        data-bg="{{ asset('assets/frontend') }}/images/hot/hot-3.png">
                                        <div class="brator-hot-box-content">
                                            <div class="brator-hot-box-text">
                                                <p>Big Season Sale Of The Year</p>
                                                <h6>35% OFF</h6>
                                                <h2>Sport Gas Shock <br />Absorers</h2>
                                            </div>
                                            <div class="brator-hot-box-button">
                                                <a href="shop-sub-category.html">Shop Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- single item -->
                                <div class="splide__slide">
                                    <div class="brator-hot-single-box brator-hot-box-design-four lazyload"
                                        data-bg="{{ asset('assets/frontend') }}/images/hot/hot-4.png">
                                        <div class="brator-hot-box-content">
                                            <div class="brator-hot-box-text">
                                                <h2>Super Saver</h2>
                                                <p>Sale up to 70% for over 8,000 products</p>
                                                <div class="best-choise-batch best-use-code-batch">
                                                    <div class="use-code-off">
                                                        <span>USE Code</span><span class="use-code-separator">|</span><span
                                                            class="use-code-code">SUPER70</span>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="brator-hot-box-button">
                                                <a href="shop-sub-category.html">Shop Now</a>
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
    </div>
    <!-- Brator whats hot area end -->
    <div class="brator-plan-pixel-area">
        <div class="row">
            <div class="container-xxxl container-xxl container">
                <div class="col-12">
                    <div class="plan-pixel-area"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Brator featured makes list start -->
    <div class="brator-makes-list-area design-two">
        <div class="container-xxxl container-xxl container">
            <div class="brator-brator-makes-list-tab-list js-tabs" id="tabs-product-content">
                <div class="brator-makes-list-tab-header js-tabs__header">
                    <ul>
                        <li><a class="js-tabs__title" href="#">Featured Makes</a></li>
                        <li><a class="js-tabs__title" href="#">Featured Models</a></li>
                    </ul>
                </div>
                <div class="row js-tabs__content">
                    <div class="col-md-12">
                        <div class="brator-makes-list">
                            <div class="brator-makes-list-single">
                                <a href="shop-sub-category.html">
                                    <span>Accura 1</span>
                                    <svg class="bi bi-chevron-right" xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z">
                                        </path>
                                    </svg>
                                </a>
                            </div>
                            <div class="brator-makes-list-single">
                                <a href="shop-sub-category.html">
                                    <span>Chevy</span>
                                    <svg class="bi bi-chevron-right" xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z">
                                        </path>
                                    </svg>
                                </a>
                            </div>
                            <div class="brator-makes-list-single">
                                <a href="shop-sub-category.html">
                                    <span>Ford</span>
                                    <svg class="bi bi-chevron-right" xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z">
                                        </path>
                                    </svg>
                                </a>
                            </div>
                            <div class="brator-makes-list-single">
                                <a href="shop-sub-category.html">
                                    <span>Dodge</span>
                                    <svg class="bi bi-chevron-right" xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z">
                                        </path>
                                    </svg>
                                </a>
                            </div>
                            <div class="brator-makes-list-single">
                                <a href="shop-sub-category.html">
                                    <span>Ram</span>
                                    <svg class="bi bi-chevron-right" xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z">
                                        </path>
                                    </svg>
                                </a>
                            </div>
                            <div class="brator-makes-list-single"><a href="shop-sub-category.html"><span>Toyota</span>
                                    <svg class="bi bi-chevron-right" xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z">
                                        </path>
                                    </svg></a></div>
                            <div class="brator-makes-list-single"><a href="shop-sub-category.html"><span>Honda</span>
                                    <svg class="bi bi-chevron-right" xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z">
                                        </path>
                                    </svg></a></div>
                            <div class="brator-makes-list-single"><a href="shop-sub-category.html"><span>Nissan</span>
                                    <svg class="bi bi-chevron-right" xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z">
                                        </path>
                                    </svg></a></div>
                            <div class="brator-makes-list-single"><a href="shop-sub-category.html"><span>Jeep</span>
                                    <svg class="bi bi-chevron-right" xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z">
                                        </path>
                                    </svg></a></div>
                            <div class="brator-makes-list-single"><a href="shop-sub-category.html"><span>GMC</span>
                                    <svg class="bi bi-chevron-right" xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z">
                                        </path>
                                    </svg></a></div>
                            <div class="brator-makes-list-single"><a href="shop-sub-category.html"><span>Huyndai</span>
                                    <svg class="bi bi-chevron-right" xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z">
                                        </path>
                                    </svg></a></div>
                            <div class="brator-makes-list-single"><a href="shop-sub-category.html"><span>Kia</span>
                                    <svg class="bi bi-chevron-right" xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z">
                                        </path>
                                    </svg></a></div>
                            <div class="brator-makes-list-single"><a href="shop-sub-category.html"><span>Mercerdess</span>
                                    <svg class="bi bi-chevron-right" xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z">
                                        </path>
                                    </svg></a></div>
                            <div class="brator-makes-list-single"><a href="shop-sub-category.html"><span>BMW</span>
                                    <svg class="bi bi-chevron-right" xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z">
                                        </path>
                                    </svg></a></div>
                            <div class="brator-makes-list-single"><a href="shop-sub-category.html"><span>Audi</span>
                                    <svg class="bi bi-chevron-right" xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z">
                                        </path>
                                    </svg></a></div>
                            <div class="brator-makes-list-single"><a href="shop-sub-category.html"><span>Lexus</span>
                                    <svg class="bi bi-chevron-right" xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z">
                                        </path>
                                    </svg></a></div>
                            <div class="brator-makes-list-single"><a href="shop-sub-category.html"><span>Jaguar</span>
                                    <svg class="bi bi-chevron-right" xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z">
                                        </path>
                                    </svg></a></div>
                            <div class="brator-makes-list-single"><a href="shop-sub-category.html"><span>Volvo</span>
                                    <svg class="bi bi-chevron-right" xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z">
                                        </path>
                                    </svg></a></div>
                            <div class="brator-makes-list-single"><a href="shop-sub-category.html"><span>Rangover</span>
                                    <svg class="bi bi-chevron-right" xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z">
                                        </path>
                                    </svg></a></div>
                            <div class="brator-makes-list-single"><a href="shop-sub-category.html"><span>Porsche</span>
                                    <svg class="bi bi-chevron-right" xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z">
                                        </path>
                                    </svg></a></div>
                            <div class="brator-makes-list-single disable"><a
                                    href="shop-sub-category.html"><span>Accura</span>
                                    <svg class="bi bi-chevron-right" xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z">
                                        </path>
                                    </svg></a></div>
                            <div class="brator-makes-list-single disable"><a
                                    href="shop-sub-category.html"><span>Chevy</span>
                                    <svg class="bi bi-chevron-right" xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z">
                                        </path>
                                    </svg></a></div>
                            <div class="brator-makes-list-single disable"><a
                                    href="shop-sub-category.html"><span>Ford</span>
                                    <svg class="bi bi-chevron-right" xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z">
                                        </path>
                                    </svg></a></div>
                            <div class="brator-makes-list-single disable"><a
                                    href="shop-sub-category.html"><span>Dodge</span>
                                    <svg class="bi bi-chevron-right" xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z">
                                        </path>
                                    </svg></a></div>
                            <div class="brator-makes-list-single disable"><a
                                    href="shop-sub-category.html"><span>Huyndai</span>
                                    <svg class="bi bi-chevron-right" xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z">
                                        </path>
                                    </svg></a></div>
                            <div class="brator-makes-list-single disable"><a
                                    href="shop-sub-category.html"><span>Kia</span>
                                    <svg class="bi bi-chevron-right" xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z">
                                        </path>
                                    </svg></a></div>
                            <div class="brator-makes-list-single disable"><a
                                    href="shop-sub-category.html"><span>Mercerdess</span>
                                    <svg class="bi bi-chevron-right" xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z">
                                        </path>
                                    </svg></a></div>
                            <div class="brator-makes-list-single disable"><a
                                    href="shop-sub-category.html"><span>BMW</span>
                                    <svg class="bi bi-chevron-right" xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z">
                                        </path>
                                    </svg></a></div>
                            <div class="brator-makes-list-single disable"><a
                                    href="shop-sub-category.html"><span>Audi</span>
                                    <svg class="bi bi-chevron-right" xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z">
                                        </path>
                                    </svg></a></div>
                            <div class="brator-makes-list-single disable"><a
                                    href="shop-sub-category.html"><span>Lexus</span>
                                    <svg class="bi bi-chevron-right" xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z">
                                        </path>
                                    </svg></a></div>
                            <div class="brator-makes-list-single disable"><a
                                    href="shop-sub-category.html"><span>Jaguar</span>
                                    <svg class="bi bi-chevron-right" xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z">
                                        </path>
                                    </svg></a></div>
                            <div class="brator-makes-list-single disable"><a
                                    href="shop-sub-category.html"><span>Volvo</span>
                                    <svg class="bi bi-chevron-right" xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z">
                                        </path>
                                    </svg></a></div>
                            <div class="brator-makes-list-single disable">
                                <a href="shop-sub-category.html">
                                    <span>Rangover</span>
                                    <svg class="bi bi-chevron-right" xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z">
                                        </path>
                                    </svg>
                                </a>
                            </div>
                            <div class="brator-makes-list-single disable">
                                <a href="shop-sub-category.html">
                                    <span>Porsche</span>
                                    <svg class="bi bi-chevron-right" xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z">
                                        </path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="brator-makes-list-view-more">
                            <button> <span><b>view more</b>
                                    <svg class="bi bi-chevron-down" xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z">
                                        </path>
                                    </svg></span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="row js-tabs__content">
                    <div class="col-md-12">
                        <div class="brator-makes-list">
                            <div class="brator-makes-list-single">
                                <a href="shop-sub-category.html">
                                    <span>Accura 2</span>
                                    <svg class="bi bi-chevron-right" xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z">
                                        </path>
                                    </svg>
                                </a>
                            </div>
                            <div class="brator-makes-list-single">
                                <a href="shop-sub-category.html">
                                    <span>Chevy 2</span>
                                    <svg class="bi bi-chevron-right" xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z">
                                        </path>
                                    </svg>
                                </a>
                            </div>
                            <div class="brator-makes-list-single">
                                <a href="shop-sub-category.html">
                                    <span>Ford 2</span>
                                    <svg class="bi bi-chevron-right" xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z">
                                        </path>
                                    </svg>
                                </a>
                            </div>
                            <div class="brator-makes-list-single">
                                <a href="shop-sub-category.html">
                                    <span>Dodge 2</span>
                                    <svg class="bi bi-chevron-right" xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z">
                                        </path>
                                    </svg>
                                </a>
                            </div>
                            <div class="brator-makes-list-single">
                                <a href="shop-sub-category.html">
                                    <span>Ram 2</span>
                                    <svg class="bi bi-chevron-right" xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z">
                                        </path>
                                    </svg>
                                </a>
                            </div>
                            <div class="brator-makes-list-single"><a href="shop-sub-category.html"><span>Toyota</span>
                                    <svg class="bi bi-chevron-right" xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z">
                                        </path>
                                    </svg></a></div>
                            <div class="brator-makes-list-single"><a href="shop-sub-category.html"><span>Honda</span>
                                    <svg class="bi bi-chevron-right" xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z">
                                        </path>
                                    </svg></a></div>
                            <div class="brator-makes-list-single"><a href="shop-sub-category.html"><span>Nissan</span>
                                    <svg class="bi bi-chevron-right" xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z">
                                        </path>
                                    </svg></a></div>
                            <div class="brator-makes-list-single"><a href="shop-sub-category.html"><span>Jeep</span>
                                    <svg class="bi bi-chevron-right" xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z">
                                        </path>
                                    </svg></a></div>
                            <div class="brator-makes-list-single"><a href="shop-sub-category.html"><span>GMC 2</span>
                                    <svg class="bi bi-chevron-right" xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z">
                                        </path>
                                    </svg></a></div>
                            <div class="brator-makes-list-single"><a href="shop-sub-category.html"><span>Huyndai</span>
                                    <svg class="bi bi-chevron-right" xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z">
                                        </path>
                                    </svg></a></div>
                            <div class="brator-makes-list-single"><a href="shop-sub-category.html"><span>Kia</span>
                                    <svg class="bi bi-chevron-right" xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z">
                                        </path>
                                    </svg></a></div>
                            <div class="brator-makes-list-single"><a href="shop-sub-category.html"><span>Mercerdess</span>
                                    <svg class="bi bi-chevron-right" xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z">
                                        </path>
                                    </svg></a></div>
                            <div class="brator-makes-list-single"><a href="shop-sub-category.html"><span>BMW 2</span>
                                    <svg class="bi bi-chevron-right" xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z">
                                        </path>
                                    </svg></a></div>
                            <div class="brator-makes-list-single"><a href="shop-sub-category.html"><span>Audi</span>
                                    <svg class="bi bi-chevron-right" xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z">
                                        </path>
                                    </svg></a></div>
                            <div class="brator-makes-list-single"><a href="shop-sub-category.html"><span>Lexus</span>
                                    <svg class="bi bi-chevron-right" xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z">
                                        </path>
                                    </svg></a></div>
                            <div class="brator-makes-list-single"><a href="shop-sub-category.html"><span>Jaguar</span>
                                    <svg class="bi bi-chevron-right" xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z">
                                        </path>
                                    </svg></a></div>
                            <div class="brator-makes-list-single"><a href="shop-sub-category.html"><span>Volvo</span>
                                    <svg class="bi bi-chevron-right" xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z">
                                        </path>
                                    </svg></a></div>
                            <div class="brator-makes-list-single"><a href="shop-sub-category.html"><span>Rangover</span>
                                    <svg class="bi bi-chevron-right" xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z">
                                        </path>
                                    </svg></a></div>
                            <div class="brator-makes-list-single"><a href="shop-sub-category.html"><span>Porsche</span>
                                    <svg class="bi bi-chevron-right" xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z">
                                        </path>
                                    </svg></a></div>
                            <div class="brator-makes-list-single disable"><a
                                    href="shop-sub-category.html"><span>Accura</span>
                                    <svg class="bi bi-chevron-right" xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z">
                                        </path>
                                    </svg></a></div>
                            <div class="brator-makes-list-single disable"><a
                                    href="shop-sub-category.html"><span>Chevy</span>
                                    <svg class="bi bi-chevron-right" xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z">
                                        </path>
                                    </svg></a></div>
                            <div class="brator-makes-list-single disable"><a
                                    href="shop-sub-category.html"><span>Ford</span>
                                    <svg class="bi bi-chevron-right" xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z">
                                        </path>
                                    </svg></a></div>
                            <div class="brator-makes-list-single disable"><a
                                    href="shop-sub-category.html"><span>Dodge</span>
                                    <svg class="bi bi-chevron-right" xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z">
                                        </path>
                                    </svg></a></div>
                            <div class="brator-makes-list-single disable"><a
                                    href="shop-sub-category.html"><span>Huyndai</span>
                                    <svg class="bi bi-chevron-right" xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z">
                                        </path>
                                    </svg></a></div>
                            <div class="brator-makes-list-single disable"><a
                                    href="shop-sub-category.html"><span>Kia</span>
                                    <svg class="bi bi-chevron-right" xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z">
                                        </path>
                                    </svg></a></div>
                            <div class="brator-makes-list-single disable"><a
                                    href="shop-sub-category.html"><span>Mercerdess</span>
                                    <svg class="bi bi-chevron-right" xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z">
                                        </path>
                                    </svg></a></div>
                            <div class="brator-makes-list-single disable"><a
                                    href="shop-sub-category.html"><span>BMW</span>
                                    <svg class="bi bi-chevron-right" xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z">
                                        </path>
                                    </svg></a></div>
                            <div class="brator-makes-list-single disable"><a
                                    href="shop-sub-category.html"><span>Audi</span>
                                    <svg class="bi bi-chevron-right" xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z">
                                        </path>
                                    </svg></a></div>
                            <div class="brator-makes-list-single disable"><a
                                    href="shop-sub-category.html"><span>Lexus</span>
                                    <svg class="bi bi-chevron-right" xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z">
                                        </path>
                                    </svg></a></div>
                            <div class="brator-makes-list-single disable"><a
                                    href="shop-sub-category.html"><span>Jaguar</span>
                                    <svg class="bi bi-chevron-right" xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z">
                                        </path>
                                    </svg></a></div>
                            <div class="brator-makes-list-single disable"><a href="shop-sub-category.html"><span>Volvo
                                        2</span>
                                    <svg class="bi bi-chevron-right" xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z">
                                        </path>
                                    </svg></a></div>
                            <div class="brator-makes-list-single disable">
                                <a href="shop-sub-category.html">
                                    <span>Rangover</span>
                                    <svg class="bi bi-chevron-right" xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z">
                                        </path>
                                    </svg>
                                </a>
                            </div>
                            <div class="brator-makes-list-single disable">
                                <a href="shop-sub-category.html">
                                    <span>Porsche</span>
                                    <svg class="bi bi-chevron-right" xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z">
                                        </path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="brator-makes-list-view-more">
                            <button> <span><b>view more 2</b>
                                    <svg class="bi bi-chevron-down" xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z">
                                        </path>
                                    </svg></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Brator featured makes list end -->
    <!-- Brator best seller product start -->
    <div class="brator-deal-product-slider brator-best-seller">
        <div class="container-xxxl container-xxl container">
            <div class="row">
                <div class="col-12">
                    <div class="brator-best-seller-section-header-area">
                        <div class="brator-section-header all-item-left">
                            <div class="brator-section-header-title">
                                <h2>Best Seller</h2>
                            </div>
                            <a href="#_">See All Products
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z">
                                    </path>
                                </svg>
                            </a>
                        </div>
                        <div class="brator-best-seller-sub-filter-area">
                            <ul class="brator-best-seller-sub-filter-content">
                                <li class="brator-best-seller-sub-filter-list"><a class="active" href="#_">Top
                                        10</a></li>
                                <li class="brator-best-seller-sub-filter-list"><a href="#_">Top Auto Parts</a>
                                </li>
                                <li class="brator-best-seller-sub-filter-list"><a href="#_">Top Car Care</a>
                                </li>
                                <li class="brator-best-seller-sub-filter-list"><a href="#_">Top Wheels &
                                        Tires</a></li>
                                <li class="brator-best-seller-sub-filter-list"><a href="#_">Top Tolls &
                                        Supplies</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="brator-product-slider splide js-splide p-splide"
                        data-splide='{"pagination":false,"type":"loop","perPage":5,"perMove":"1","gap":30, "breakpoints":{ "520" :{ "perPage": "1" },"746" :{ "perPage": "2" }, "767" :{ "perPage" : "2" }, "1090":{ "perPage" : "3" }, "1366":{ "perPage" : "4" }, "1500":{ "perPage" : "4" }, "1920":{ "perPage" : "5" }}}'>
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
                                    <div class="brator-product-single-item-info info-content-flex">
                                        <div class="brator-product-single-item-info-left">
                                            <div class="yollow-batch">New</div>
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
                                                data-src="{{ asset('assets/frontend') }}/images/shop/product-06.jpg"
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
                                            <p class="brator-price-black-text"><sub>$172.96</sub></p>
                                        </div>
                                        <div class="brator-product-single-item-btn"><a href="product-layout-01.html">Add
                                                to cart</a></div>
                                    </div>
                                </div>
                                <div class="brator-product-single-item-area splide__slide design-two">
                                    <div class="brator-product-single-item-info info-content-flex">
                                        <div class="brator-product-single-item-info-left">
                                            <div class="off-batch">20% OFF</div>
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
                                        <div class="brator-product-single-item-btn"><a href="product-layout-01.html">Add
                                                to cart</a></div>
                                    </div>
                                </div>
                                <div class="brator-product-single-item-area splide__slide design-two">
                                    <div class="brator-product-single-item-info info-content-flex">
                                        <div class="brator-product-single-item-info-left">
                                            <div class="brator-product-batch stock-number-batch">2,360 Sold</div>
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
                                                data-src="{{ asset('assets/frontend') }}/images/shop/product-03.jpg"
                                                alt="alt" /></a></div>
                                    <div class="brator-product-single-item-mini">
                                        <div class="brator-product-single-item-cat"><a href="product-layout-01.html">Brake
                                                oil</a></div>
                                        <div class="brator-product-single-item-title">
                                            <h5><a href="#_"> Simple Leather Steering Wheel New</a></h5>
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
                                            <p class="brator-price-black-text"><sub>$172.96</sub></p>
                                        </div>
                                        <div class="brator-product-single-item-btn"><a href="product-layout-01.html">Add
                                                to cart</a></div>
                                    </div>
                                </div>
                                <div class="brator-product-single-item-area splide__slide design-two">
                                    <div class="brator-product-single-item-info info-content-flex">
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
                                    <div class="brator-product-single-item-img"><a href="#_"><img
                                                class="lazyload"
                                                src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                data-src="{{ asset('assets/frontend') }}/images/shop/product-04.jpg"
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
                                            <p class="brator-price-black-text"><sub>$172.96 - $450.25</sub></p>
                                        </div>
                                        <div class="brator-product-single-item-btn"><a href="product-layout-01.html">Add
                                                to cart</a></div>
                                    </div>
                                </div>
                                <div class="brator-product-single-item-area splide__slide design-two">
                                    <div class="brator-product-single-item-info info-content-flex">
                                        <div class="brator-product-single-item-info-left">
                                            <div class="off-batch">20% OFF</div>
                                            <div class="stock-out-batch">Out OF stock</div>
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
                                    <div class="brator-product-single-item-img"><a href="#_"><img
                                                class="lazyload"
                                                src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                data-src="{{ asset('assets/frontend') }}/images/shop/product-05.jpg"
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
    <!-- Brator best seller product end -->
    <!-- Brator essential items start -->
    {{-- <div class="brator-deal-product-slider brator-essential-items">
        <div class="container-xxxl container-xxl container">
            <div class="row">
                <div class="col-12">
                    <div class="brator-section-header all-item-left">
                        <div class="brator-section-header-title">
                            <h2>Essential Items for New Car</h2>
                        </div>
                        <a href="#_">See All Products
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z">
                                </path>
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="col-12">
                    <div class="brator-product-slider splide js-splide p-splide"
                        data-splide='{"pagination":false,"type":"loop","perPage":5,"perMove":"1","gap":30, "breakpoints":{ "520" :{ "perPage": "1" },"746" :{ "perPage": "2" }, "767" :{ "perPage" : "2" }, "1090":{ "perPage" : "3" }, "1366":{ "perPage" : "4" }, "1500":{ "perPage" : "4" }, "1920":{ "perPage" : "5" }}}'>
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
                                    <div class="brator-product-single-item-info info-content-flex">
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
                                    <div class="brator-product-single-item-img"><a href="#_"><img
                                                src="{{ asset('assets/frontend') }}/images/shop/product-06.jpg"
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
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                                    y="0px" viewBox="0 0 64 64">
                                                    <path
                                                        d="M59.7,23.9l-18.1-2.8L33.4,3.9c-0.6-1.2-2.2-1.2-2.8,0l-8.2,17.3L4.4,23.9c-1.3,0.2-1.8,1.9-0.8,2.8l13.1,13.5l-3.1,18.9  c-0.2,1.3,1.1,2.4,2.3,1.6l16.3-8.9l16.2,8.9c1.1,0.6,2.5-0.4,2.2-1.6l-3.1-18.9l13.1-13.5C61.4,25.8,61,24.1,59.7,23.9z">
                                                    </path>
                                                </svg>
                                                <svg class="active" fill="#000000" width="52" height="52"
                                                    version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                                    y="0px" viewBox="0 0 64 64">
                                                    <path
                                                        d="M59.7,23.9l-18.1-2.8L33.4,3.9c-0.6-1.2-2.2-1.2-2.8,0l-8.2,17.3L4.4,23.9c-1.3,0.2-1.8,1.9-0.8,2.8l13.1,13.5l-3.1,18.9  c-0.2,1.3,1.1,2.4,2.3,1.6l16.3-8.9l16.2,8.9c1.1,0.6,2.5-0.4,2.2-1.6l-3.1-18.9l13.1-13.5C61.4,25.8,61,24.1,59.7,23.9z">
                                                    </path>
                                                </svg>
                                                <svg class="active" fill="#000000" width="52" height="52"
                                                    version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                                    y="0px" viewBox="0 0 64 64">
                                                    <path
                                                        d="M59.7,23.9l-18.1-2.8L33.4,3.9c-0.6-1.2-2.2-1.2-2.8,0l-8.2,17.3L4.4,23.9c-1.3,0.2-1.8,1.9-0.8,2.8l13.1,13.5l-3.1,18.9  c-0.2,1.3,1.1,2.4,2.3,1.6l16.3-8.9l16.2,8.9c1.1,0.6,2.5-0.4,2.2-1.6l-3.1-18.9l13.1-13.5C61.4,25.8,61,24.1,59.7,23.9z">
                                                    </path>
                                                </svg>
                                                <svg class="active" fill="#000000" width="52" height="52"
                                                    version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                                    y="0px" viewBox="0 0 64 64">
                                                    <path
                                                        d="M59.7,23.9l-18.1-2.8L33.4,3.9c-0.6-1.2-2.2-1.2-2.8,0l-8.2,17.3L4.4,23.9c-1.3,0.2-1.8,1.9-0.8,2.8l13.1,13.5l-3.1,18.9  c-0.2,1.3,1.1,2.4,2.3,1.6l16.3-8.9l16.2,8.9c1.1,0.6,2.5-0.4,2.2-1.6l-3.1-18.9l13.1-13.5C61.4,25.8,61,24.1,59.7,23.9z">
                                                    </path>
                                                </svg>
                                                <svg class="d-active" fill="#000000" width="52" height="52"
                                                    version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                                    y="0px" viewBox="0 0 64 64">
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
                                            <p class="brator-price-black-text"><sub>$172.96</sub></p>
                                        </div>
                                        <div class="brator-product-single-item-btn"><a href="product-layout-01.html">Add
                                                to cart</a></div>
                                    </div>
                                </div>
                                <div class="brator-product-single-item-area splide__slide design-two">
                                    <div class="brator-product-single-item-info info-content-flex">
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
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                                    y="0px" viewBox="0 0 64 64">
                                                    <path
                                                        d="M59.7,23.9l-18.1-2.8L33.4,3.9c-0.6-1.2-2.2-1.2-2.8,0l-8.2,17.3L4.4,23.9c-1.3,0.2-1.8,1.9-0.8,2.8l13.1,13.5l-3.1,18.9  c-0.2,1.3,1.1,2.4,2.3,1.6l16.3-8.9l16.2,8.9c1.1,0.6,2.5-0.4,2.2-1.6l-3.1-18.9l13.1-13.5C61.4,25.8,61,24.1,59.7,23.9z">
                                                    </path>
                                                </svg>
                                                <svg class="active" fill="#000000" width="52" height="52"
                                                    version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                                    y="0px" viewBox="0 0 64 64">
                                                    <path
                                                        d="M59.7,23.9l-18.1-2.8L33.4,3.9c-0.6-1.2-2.2-1.2-2.8,0l-8.2,17.3L4.4,23.9c-1.3,0.2-1.8,1.9-0.8,2.8l13.1,13.5l-3.1,18.9  c-0.2,1.3,1.1,2.4,2.3,1.6l16.3-8.9l16.2,8.9c1.1,0.6,2.5-0.4,2.2-1.6l-3.1-18.9l13.1-13.5C61.4,25.8,61,24.1,59.7,23.9z">
                                                    </path>
                                                </svg>
                                                <svg class="active" fill="#000000" width="52" height="52"
                                                    version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                                    y="0px" viewBox="0 0 64 64">
                                                    <path
                                                        d="M59.7,23.9l-18.1-2.8L33.4,3.9c-0.6-1.2-2.2-1.2-2.8,0l-8.2,17.3L4.4,23.9c-1.3,0.2-1.8,1.9-0.8,2.8l13.1,13.5l-3.1,18.9  c-0.2,1.3,1.1,2.4,2.3,1.6l16.3-8.9l16.2,8.9c1.1,0.6,2.5-0.4,2.2-1.6l-3.1-18.9l13.1-13.5C61.4,25.8,61,24.1,59.7,23.9z">
                                                    </path>
                                                </svg>
                                                <svg class="active" fill="#000000" width="52" height="52"
                                                    version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                                    y="0px" viewBox="0 0 64 64">
                                                    <path
                                                        d="M59.7,23.9l-18.1-2.8L33.4,3.9c-0.6-1.2-2.2-1.2-2.8,0l-8.2,17.3L4.4,23.9c-1.3,0.2-1.8,1.9-0.8,2.8l13.1,13.5l-3.1,18.9  c-0.2,1.3,1.1,2.4,2.3,1.6l16.3-8.9l16.2,8.9c1.1,0.6,2.5-0.4,2.2-1.6l-3.1-18.9l13.1-13.5C61.4,25.8,61,24.1,59.7,23.9z">
                                                    </path>
                                                </svg>
                                                <svg class="d-active" fill="#000000" width="52" height="52"
                                                    version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                                    y="0px" viewBox="0 0 64 64">
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
                                            <p class="brator-price-black-text"><sub>$172.96</sub></p>
                                        </div>
                                        <div class="brator-product-single-item-btn"><a href="product-layout-01.html">Add
                                                to cart</a></div>
                                    </div>
                                </div>
                                <div class="brator-product-single-item-area splide__slide design-two">
                                    <div class="brator-product-single-item-info info-content-flex">
                                        <div class="brator-product-single-item-info-left">
                                            <div class="brator-product-batch stock-recommended-batch">Recommended
                                            </div>
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

                                    <div class="brator-product-single-item-img"><a href="#_"><img
                                                class="lazyload"
                                                src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                data-src="{{ asset('assets/frontend') }}/images/shop/product-03.jpg"
                                                alt="alt" /></a></div>
                                    <div class="brator-product-single-item-mini">
                                        <div class="brator-product-single-item-cat"><a
                                                href="product-layout-01.html">Brake oil</a></div>
                                        <div class="brator-product-single-item-title">
                                            <h5><a href="#_"> Simple Leather Steering Wheel New</a></h5>
                                        </div>
                                        <div class="brator-product-single-item-review">
                                            <div class="brator-review">
                                                <svg class="active" fill="#000000" width="52" height="52"
                                                    version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                                    y="0px" viewBox="0 0 64 64">
                                                    <path
                                                        d="M59.7,23.9l-18.1-2.8L33.4,3.9c-0.6-1.2-2.2-1.2-2.8,0l-8.2,17.3L4.4,23.9c-1.3,0.2-1.8,1.9-0.8,2.8l13.1,13.5l-3.1,18.9  c-0.2,1.3,1.1,2.4,2.3,1.6l16.3-8.9l16.2,8.9c1.1,0.6,2.5-0.4,2.2-1.6l-3.1-18.9l13.1-13.5C61.4,25.8,61,24.1,59.7,23.9z">
                                                    </path>
                                                </svg>
                                                <svg class="active" fill="#000000" width="52" height="52"
                                                    version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                                    y="0px" viewBox="0 0 64 64">
                                                    <path
                                                        d="M59.7,23.9l-18.1-2.8L33.4,3.9c-0.6-1.2-2.2-1.2-2.8,0l-8.2,17.3L4.4,23.9c-1.3,0.2-1.8,1.9-0.8,2.8l13.1,13.5l-3.1,18.9  c-0.2,1.3,1.1,2.4,2.3,1.6l16.3-8.9l16.2,8.9c1.1,0.6,2.5-0.4,2.2-1.6l-3.1-18.9l13.1-13.5C61.4,25.8,61,24.1,59.7,23.9z">
                                                    </path>
                                                </svg>
                                                <svg class="active" fill="#000000" width="52" height="52"
                                                    version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                                    y="0px" viewBox="0 0 64 64">
                                                    <path
                                                        d="M59.7,23.9l-18.1-2.8L33.4,3.9c-0.6-1.2-2.2-1.2-2.8,0l-8.2,17.3L4.4,23.9c-1.3,0.2-1.8,1.9-0.8,2.8l13.1,13.5l-3.1,18.9  c-0.2,1.3,1.1,2.4,2.3,1.6l16.3-8.9l16.2,8.9c1.1,0.6,2.5-0.4,2.2-1.6l-3.1-18.9l13.1-13.5C61.4,25.8,61,24.1,59.7,23.9z">
                                                    </path>
                                                </svg>
                                                <svg class="active" fill="#000000" width="52" height="52"
                                                    version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                                    y="0px" viewBox="0 0 64 64">
                                                    <path
                                                        d="M59.7,23.9l-18.1-2.8L33.4,3.9c-0.6-1.2-2.2-1.2-2.8,0l-8.2,17.3L4.4,23.9c-1.3,0.2-1.8,1.9-0.8,2.8l13.1,13.5l-3.1,18.9  c-0.2,1.3,1.1,2.4,2.3,1.6l16.3-8.9l16.2,8.9c1.1,0.6,2.5-0.4,2.2-1.6l-3.1-18.9l13.1-13.5C61.4,25.8,61,24.1,59.7,23.9z">
                                                    </path>
                                                </svg>
                                                <svg class="d-active" fill="#000000" width="52" height="52"
                                                    version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                                    y="0px" viewBox="0 0 64 64">
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
                                            <p class="brator-price-black-text"><sub>$172.96</sub></p>
                                        </div>
                                        <div class="brator-product-single-item-btn"><a href="product-layout-01.html">Add
                                                to cart</a></div>
                                    </div>
                                </div>
                                <div class="brator-product-single-item-area splide__slide design-two">
                                    <div class="brator-product-single-item-info info-content-flex">
                                        <div class="brator-product-single-item-info-left">
                                            <div class="off-batch">20% OFF</div>
                                            <div class="brator-product-batch stock-number-batch">2,360 Sold</div>
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
                                    <div class="brator-product-single-item-img"><a href="#_"><img
                                                class="lazyload"
                                                src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                data-src="{{ asset('assets/frontend') }}/images/shop/product-04.jpg"
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
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                                    y="0px" viewBox="0 0 64 64">
                                                    <path
                                                        d="M59.7,23.9l-18.1-2.8L33.4,3.9c-0.6-1.2-2.2-1.2-2.8,0l-8.2,17.3L4.4,23.9c-1.3,0.2-1.8,1.9-0.8,2.8l13.1,13.5l-3.1,18.9  c-0.2,1.3,1.1,2.4,2.3,1.6l16.3-8.9l16.2,8.9c1.1,0.6,2.5-0.4,2.2-1.6l-3.1-18.9l13.1-13.5C61.4,25.8,61,24.1,59.7,23.9z">
                                                    </path>
                                                </svg>
                                                <svg class="active" fill="#000000" width="52" height="52"
                                                    version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                                    y="0px" viewBox="0 0 64 64">
                                                    <path
                                                        d="M59.7,23.9l-18.1-2.8L33.4,3.9c-0.6-1.2-2.2-1.2-2.8,0l-8.2,17.3L4.4,23.9c-1.3,0.2-1.8,1.9-0.8,2.8l13.1,13.5l-3.1,18.9  c-0.2,1.3,1.1,2.4,2.3,1.6l16.3-8.9l16.2,8.9c1.1,0.6,2.5-0.4,2.2-1.6l-3.1-18.9l13.1-13.5C61.4,25.8,61,24.1,59.7,23.9z">
                                                    </path>
                                                </svg>
                                                <svg class="active" fill="#000000" width="52" height="52"
                                                    version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                                    y="0px" viewBox="0 0 64 64">
                                                    <path
                                                        d="M59.7,23.9l-18.1-2.8L33.4,3.9c-0.6-1.2-2.2-1.2-2.8,0l-8.2,17.3L4.4,23.9c-1.3,0.2-1.8,1.9-0.8,2.8l13.1,13.5l-3.1,18.9  c-0.2,1.3,1.1,2.4,2.3,1.6l16.3-8.9l16.2,8.9c1.1,0.6,2.5-0.4,2.2-1.6l-3.1-18.9l13.1-13.5C61.4,25.8,61,24.1,59.7,23.9z">
                                                    </path>
                                                </svg>
                                                <svg class="active" fill="#000000" width="52" height="52"
                                                    version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                                    y="0px" viewBox="0 0 64 64">
                                                    <path
                                                        d="M59.7,23.9l-18.1-2.8L33.4,3.9c-0.6-1.2-2.2-1.2-2.8,0l-8.2,17.3L4.4,23.9c-1.3,0.2-1.8,1.9-0.8,2.8l13.1,13.5l-3.1,18.9  c-0.2,1.3,1.1,2.4,2.3,1.6l16.3-8.9l16.2,8.9c1.1,0.6,2.5-0.4,2.2-1.6l-3.1-18.9l13.1-13.5C61.4,25.8,61,24.1,59.7,23.9z">
                                                    </path>
                                                </svg>
                                                <svg class="d-active" fill="#000000" width="52" height="52"
                                                    version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                                    y="0px" viewBox="0 0 64 64">
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
                                    <div class="brator-product-single-item-info info-content-flex">
                                        <div class="brator-product-single-item-info-left">
                                            <div class="brator-product-batch stock-number-batch">2,360 Sold</div>
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
                                    <div class="brator-product-single-item-img"><a href="#_"><img
                                                class="lazyload"
                                                src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                data-src="{{ asset('assets/frontend') }}/images/shop/product-05.jpg"
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
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                                    y="0px" viewBox="0 0 64 64">
                                                    <path
                                                        d="M59.7,23.9l-18.1-2.8L33.4,3.9c-0.6-1.2-2.2-1.2-2.8,0l-8.2,17.3L4.4,23.9c-1.3,0.2-1.8,1.9-0.8,2.8l13.1,13.5l-3.1,18.9  c-0.2,1.3,1.1,2.4,2.3,1.6l16.3-8.9l16.2,8.9c1.1,0.6,2.5-0.4,2.2-1.6l-3.1-18.9l13.1-13.5C61.4,25.8,61,24.1,59.7,23.9z">
                                                    </path>
                                                </svg>
                                                <svg class="active" fill="#000000" width="52" height="52"
                                                    version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                                    y="0px" viewBox="0 0 64 64">
                                                    <path
                                                        d="M59.7,23.9l-18.1-2.8L33.4,3.9c-0.6-1.2-2.2-1.2-2.8,0l-8.2,17.3L4.4,23.9c-1.3,0.2-1.8,1.9-0.8,2.8l13.1,13.5l-3.1,18.9  c-0.2,1.3,1.1,2.4,2.3,1.6l16.3-8.9l16.2,8.9c1.1,0.6,2.5-0.4,2.2-1.6l-3.1-18.9l13.1-13.5C61.4,25.8,61,24.1,59.7,23.9z">
                                                    </path>
                                                </svg>
                                                <svg class="active" fill="#000000" width="52" height="52"
                                                    version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                                    y="0px" viewBox="0 0 64 64">
                                                    <path
                                                        d="M59.7,23.9l-18.1-2.8L33.4,3.9c-0.6-1.2-2.2-1.2-2.8,0l-8.2,17.3L4.4,23.9c-1.3,0.2-1.8,1.9-0.8,2.8l13.1,13.5l-3.1,18.9  c-0.2,1.3,1.1,2.4,2.3,1.6l16.3-8.9l16.2,8.9c1.1,0.6,2.5-0.4,2.2-1.6l-3.1-18.9l13.1-13.5C61.4,25.8,61,24.1,59.7,23.9z">
                                                    </path>
                                                </svg>
                                                <svg class="active" fill="#000000" width="52" height="52"
                                                    version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                                    y="0px" viewBox="0 0 64 64">
                                                    <path
                                                        d="M59.7,23.9l-18.1-2.8L33.4,3.9c-0.6-1.2-2.2-1.2-2.8,0l-8.2,17.3L4.4,23.9c-1.3,0.2-1.8,1.9-0.8,2.8l13.1,13.5l-3.1,18.9  c-0.2,1.3,1.1,2.4,2.3,1.6l16.3-8.9l16.2,8.9c1.1,0.6,2.5-0.4,2.2-1.6l-3.1-18.9l13.1-13.5C61.4,25.8,61,24.1,59.7,23.9z">
                                                    </path>
                                                </svg>
                                                <svg class="d-active" fill="#000000" width="52" height="52"
                                                    version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                                    y="0px" viewBox="0 0 64 64">
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
                                            <p class="brator-price-black-text"><sub>$172.96</sub></p>
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
    </div> --}}
    <!-- Brator essential items product end -->

    <!-- Brator new arrivals start -->
    {{-- <div class="brator-deal-product-slider brator-new-arrivals">
        <div class="container-xxxl container-xxl container">
            <div class="row">
                <div class="col-12">
                    <div class="brator-section-header all-item-left">
                        <div class="brator-section-header-title">
                            <h2>Essential Items for New Car</h2>
                        </div>
                        <a href="#_">See All Products
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z">
                                </path>
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="col-12">
                    <div class="brator-product-slider splide js-splide p-splide"
                        data-splide='{"pagination":false,"type":"loop","perPage":5,"perMove":"1","gap":30, "breakpoints":{ "520" :{ "perPage": "1" },"746" :{ "perPage": "2" }, "767" :{ "perPage" : "2" }, "1090":{ "perPage" : "3" }, "1366":{ "perPage" : "4" }, "1500":{ "perPage" : "4" }, "1920":{ "perPage" : "5" }}}'>
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
                                    <div class="brator-product-single-item-info info-content-flex">
                                        <div class="brator-product-single-item-info-left">
                                            <div class="yollow-batch">New</div>
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
                                    <div class="brator-product-single-item-img"><a href="#_"><img
                                                class="lazyload"
                                                src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                data-src="{{ asset('assets/frontend') }}/images/shop/product-06.jpg"
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
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                                    y="0px" viewBox="0 0 64 64">
                                                    <path
                                                        d="M59.7,23.9l-18.1-2.8L33.4,3.9c-0.6-1.2-2.2-1.2-2.8,0l-8.2,17.3L4.4,23.9c-1.3,0.2-1.8,1.9-0.8,2.8l13.1,13.5l-3.1,18.9  c-0.2,1.3,1.1,2.4,2.3,1.6l16.3-8.9l16.2,8.9c1.1,0.6,2.5-0.4,2.2-1.6l-3.1-18.9l13.1-13.5C61.4,25.8,61,24.1,59.7,23.9z">
                                                    </path>
                                                </svg>
                                                <svg class="active" fill="#000000" width="52" height="52"
                                                    version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                                    y="0px" viewBox="0 0 64 64">
                                                    <path
                                                        d="M59.7,23.9l-18.1-2.8L33.4,3.9c-0.6-1.2-2.2-1.2-2.8,0l-8.2,17.3L4.4,23.9c-1.3,0.2-1.8,1.9-0.8,2.8l13.1,13.5l-3.1,18.9  c-0.2,1.3,1.1,2.4,2.3,1.6l16.3-8.9l16.2,8.9c1.1,0.6,2.5-0.4,2.2-1.6l-3.1-18.9l13.1-13.5C61.4,25.8,61,24.1,59.7,23.9z">
                                                    </path>
                                                </svg>
                                                <svg class="active" fill="#000000" width="52" height="52"
                                                    version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                                    y="0px" viewBox="0 0 64 64">
                                                    <path
                                                        d="M59.7,23.9l-18.1-2.8L33.4,3.9c-0.6-1.2-2.2-1.2-2.8,0l-8.2,17.3L4.4,23.9c-1.3,0.2-1.8,1.9-0.8,2.8l13.1,13.5l-3.1,18.9  c-0.2,1.3,1.1,2.4,2.3,1.6l16.3-8.9l16.2,8.9c1.1,0.6,2.5-0.4,2.2-1.6l-3.1-18.9l13.1-13.5C61.4,25.8,61,24.1,59.7,23.9z">
                                                    </path>
                                                </svg>
                                                <svg class="active" fill="#000000" width="52" height="52"
                                                    version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                                    y="0px" viewBox="0 0 64 64">
                                                    <path
                                                        d="M59.7,23.9l-18.1-2.8L33.4,3.9c-0.6-1.2-2.2-1.2-2.8,0l-8.2,17.3L4.4,23.9c-1.3,0.2-1.8,1.9-0.8,2.8l13.1,13.5l-3.1,18.9  c-0.2,1.3,1.1,2.4,2.3,1.6l16.3-8.9l16.2,8.9c1.1,0.6,2.5-0.4,2.2-1.6l-3.1-18.9l13.1-13.5C61.4,25.8,61,24.1,59.7,23.9z">
                                                    </path>
                                                </svg>
                                                <svg class="d-active" fill="#000000" width="52" height="52"
                                                    version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                                    y="0px" viewBox="0 0 64 64">
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
                                            <p class="brator-price-black-text"><sub>$172.96</sub></p>
                                        </div>
                                        <div class="brator-product-single-item-btn"><a href="product-layout-01.html">Add
                                                to cart</a></div>
                                    </div>
                                </div>
                                <div class="brator-product-single-item-area splide__slide design-two">
                                    <div class="brator-product-single-item-info info-content-flex">
                                        <div class="brator-product-single-item-info-left">
                                            <div class="yollow-batch">New</div>
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
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                                    y="0px" viewBox="0 0 64 64">
                                                    <path
                                                        d="M59.7,23.9l-18.1-2.8L33.4,3.9c-0.6-1.2-2.2-1.2-2.8,0l-8.2,17.3L4.4,23.9c-1.3,0.2-1.8,1.9-0.8,2.8l13.1,13.5l-3.1,18.9  c-0.2,1.3,1.1,2.4,2.3,1.6l16.3-8.9l16.2,8.9c1.1,0.6,2.5-0.4,2.2-1.6l-3.1-18.9l13.1-13.5C61.4,25.8,61,24.1,59.7,23.9z">
                                                    </path>
                                                </svg>
                                                <svg class="active" fill="#000000" width="52" height="52"
                                                    version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                                    y="0px" viewBox="0 0 64 64">
                                                    <path
                                                        d="M59.7,23.9l-18.1-2.8L33.4,3.9c-0.6-1.2-2.2-1.2-2.8,0l-8.2,17.3L4.4,23.9c-1.3,0.2-1.8,1.9-0.8,2.8l13.1,13.5l-3.1,18.9  c-0.2,1.3,1.1,2.4,2.3,1.6l16.3-8.9l16.2,8.9c1.1,0.6,2.5-0.4,2.2-1.6l-3.1-18.9l13.1-13.5C61.4,25.8,61,24.1,59.7,23.9z">
                                                    </path>
                                                </svg>
                                                <svg class="active" fill="#000000" width="52" height="52"
                                                    version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                                    y="0px" viewBox="0 0 64 64">
                                                    <path
                                                        d="M59.7,23.9l-18.1-2.8L33.4,3.9c-0.6-1.2-2.2-1.2-2.8,0l-8.2,17.3L4.4,23.9c-1.3,0.2-1.8,1.9-0.8,2.8l13.1,13.5l-3.1,18.9  c-0.2,1.3,1.1,2.4,2.3,1.6l16.3-8.9l16.2,8.9c1.1,0.6,2.5-0.4,2.2-1.6l-3.1-18.9l13.1-13.5C61.4,25.8,61,24.1,59.7,23.9z">
                                                    </path>
                                                </svg>
                                                <svg class="active" fill="#000000" width="52" height="52"
                                                    version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                                    y="0px" viewBox="0 0 64 64">
                                                    <path
                                                        d="M59.7,23.9l-18.1-2.8L33.4,3.9c-0.6-1.2-2.2-1.2-2.8,0l-8.2,17.3L4.4,23.9c-1.3,0.2-1.8,1.9-0.8,2.8l13.1,13.5l-3.1,18.9  c-0.2,1.3,1.1,2.4,2.3,1.6l16.3-8.9l16.2,8.9c1.1,0.6,2.5-0.4,2.2-1.6l-3.1-18.9l13.1-13.5C61.4,25.8,61,24.1,59.7,23.9z">
                                                    </path>
                                                </svg>
                                                <svg class="d-active" fill="#000000" width="52" height="52"
                                                    version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                                    y="0px" viewBox="0 0 64 64">
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
                                            <p class="brator-price-black-text"><sub>$172.96 - $472.96</sub></p>
                                        </div>
                                        <div class="brator-product-single-item-btn"><a href="product-layout-01.html">Add
                                                to cart</a></div>
                                    </div>
                                </div>
                                <div class="brator-product-single-item-area splide__slide design-two">
                                    <div class="brator-product-single-item-info info-content-flex">
                                        <div class="brator-product-single-item-info-left">
                                            <div class="yollow-batch">New</div>
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

                                    <div class="brator-product-single-item-img"><a href="#_"><img
                                                class="lazyload"
                                                src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                data-src="{{ asset('assets/frontend') }}/images/shop/product-03.jpg"
                                                alt="alt" /></a></div>
                                    <div class="brator-product-single-item-mini">
                                        <div class="brator-product-single-item-cat"><a
                                                href="product-layout-01.html">Brake oil</a></div>
                                        <div class="brator-product-single-item-title">
                                            <h5><a href="#_"> Simple Leather Steering Wheel New</a></h5>
                                        </div>
                                        <div class="brator-product-single-item-review">
                                            <div class="brator-review">
                                                <svg class="active" fill="#000000" width="52" height="52"
                                                    version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                                    y="0px" viewBox="0 0 64 64">
                                                    <path
                                                        d="M59.7,23.9l-18.1-2.8L33.4,3.9c-0.6-1.2-2.2-1.2-2.8,0l-8.2,17.3L4.4,23.9c-1.3,0.2-1.8,1.9-0.8,2.8l13.1,13.5l-3.1,18.9  c-0.2,1.3,1.1,2.4,2.3,1.6l16.3-8.9l16.2,8.9c1.1,0.6,2.5-0.4,2.2-1.6l-3.1-18.9l13.1-13.5C61.4,25.8,61,24.1,59.7,23.9z">
                                                    </path>
                                                </svg>
                                                <svg class="active" fill="#000000" width="52" height="52"
                                                    version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                                    y="0px" viewBox="0 0 64 64">
                                                    <path
                                                        d="M59.7,23.9l-18.1-2.8L33.4,3.9c-0.6-1.2-2.2-1.2-2.8,0l-8.2,17.3L4.4,23.9c-1.3,0.2-1.8,1.9-0.8,2.8l13.1,13.5l-3.1,18.9  c-0.2,1.3,1.1,2.4,2.3,1.6l16.3-8.9l16.2,8.9c1.1,0.6,2.5-0.4,2.2-1.6l-3.1-18.9l13.1-13.5C61.4,25.8,61,24.1,59.7,23.9z">
                                                    </path>
                                                </svg>
                                                <svg class="active" fill="#000000" width="52" height="52"
                                                    version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                                    y="0px" viewBox="0 0 64 64">
                                                    <path
                                                        d="M59.7,23.9l-18.1-2.8L33.4,3.9c-0.6-1.2-2.2-1.2-2.8,0l-8.2,17.3L4.4,23.9c-1.3,0.2-1.8,1.9-0.8,2.8l13.1,13.5l-3.1,18.9  c-0.2,1.3,1.1,2.4,2.3,1.6l16.3-8.9l16.2,8.9c1.1,0.6,2.5-0.4,2.2-1.6l-3.1-18.9l13.1-13.5C61.4,25.8,61,24.1,59.7,23.9z">
                                                    </path>
                                                </svg>
                                                <svg class="active" fill="#000000" width="52" height="52"
                                                    version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                                    y="0px" viewBox="0 0 64 64">
                                                    <path
                                                        d="M59.7,23.9l-18.1-2.8L33.4,3.9c-0.6-1.2-2.2-1.2-2.8,0l-8.2,17.3L4.4,23.9c-1.3,0.2-1.8,1.9-0.8,2.8l13.1,13.5l-3.1,18.9  c-0.2,1.3,1.1,2.4,2.3,1.6l16.3-8.9l16.2,8.9c1.1,0.6,2.5-0.4,2.2-1.6l-3.1-18.9l13.1-13.5C61.4,25.8,61,24.1,59.7,23.9z">
                                                    </path>
                                                </svg>
                                                <svg class="d-active" fill="#000000" width="52" height="52"
                                                    version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                                    y="0px" viewBox="0 0 64 64">
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
                                            <p class="brator-price-black-text"><sub>$172.96 - $256.55</sub></p>
                                        </div>
                                        <div class="brator-product-single-item-btn"><a href="product-layout-01.html">Add
                                                to cart</a></div>
                                    </div>
                                </div>
                                <div class="brator-product-single-item-area splide__slide design-two">
                                    <div class="brator-product-single-item-info info-content-flex">
                                        <div class="brator-product-single-item-info-left">
                                            <div class="yollow-batch">New</div>
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
                                    <div class="brator-product-single-item-img"><a href="#_"><img
                                                class="lazyload"
                                                src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                data-src="{{ asset('assets/frontend') }}/images/shop/product-04.jpg"
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
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                                    y="0px" viewBox="0 0 64 64">
                                                    <path
                                                        d="M59.7,23.9l-18.1-2.8L33.4,3.9c-0.6-1.2-2.2-1.2-2.8,0l-8.2,17.3L4.4,23.9c-1.3,0.2-1.8,1.9-0.8,2.8l13.1,13.5l-3.1,18.9  c-0.2,1.3,1.1,2.4,2.3,1.6l16.3-8.9l16.2,8.9c1.1,0.6,2.5-0.4,2.2-1.6l-3.1-18.9l13.1-13.5C61.4,25.8,61,24.1,59.7,23.9z">
                                                    </path>
                                                </svg>
                                                <svg class="active" fill="#000000" width="52" height="52"
                                                    version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                                    y="0px" viewBox="0 0 64 64">
                                                    <path
                                                        d="M59.7,23.9l-18.1-2.8L33.4,3.9c-0.6-1.2-2.2-1.2-2.8,0l-8.2,17.3L4.4,23.9c-1.3,0.2-1.8,1.9-0.8,2.8l13.1,13.5l-3.1,18.9  c-0.2,1.3,1.1,2.4,2.3,1.6l16.3-8.9l16.2,8.9c1.1,0.6,2.5-0.4,2.2-1.6l-3.1-18.9l13.1-13.5C61.4,25.8,61,24.1,59.7,23.9z">
                                                    </path>
                                                </svg>
                                                <svg class="active" fill="#000000" width="52" height="52"
                                                    version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                                    y="0px" viewBox="0 0 64 64">
                                                    <path
                                                        d="M59.7,23.9l-18.1-2.8L33.4,3.9c-0.6-1.2-2.2-1.2-2.8,0l-8.2,17.3L4.4,23.9c-1.3,0.2-1.8,1.9-0.8,2.8l13.1,13.5l-3.1,18.9  c-0.2,1.3,1.1,2.4,2.3,1.6l16.3-8.9l16.2,8.9c1.1,0.6,2.5-0.4,2.2-1.6l-3.1-18.9l13.1-13.5C61.4,25.8,61,24.1,59.7,23.9z">
                                                    </path>
                                                </svg>
                                                <svg class="active" fill="#000000" width="52" height="52"
                                                    version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                                    y="0px" viewBox="0 0 64 64">
                                                    <path
                                                        d="M59.7,23.9l-18.1-2.8L33.4,3.9c-0.6-1.2-2.2-1.2-2.8,0l-8.2,17.3L4.4,23.9c-1.3,0.2-1.8,1.9-0.8,2.8l13.1,13.5l-3.1,18.9  c-0.2,1.3,1.1,2.4,2.3,1.6l16.3-8.9l16.2,8.9c1.1,0.6,2.5-0.4,2.2-1.6l-3.1-18.9l13.1-13.5C61.4,25.8,61,24.1,59.7,23.9z">
                                                    </path>
                                                </svg>
                                                <svg class="d-active" fill="#000000" width="52" height="52"
                                                    version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                                    y="0px" viewBox="0 0 64 64">
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
                                            <p class="brator-price-black-text"><sub>$172.96 - $256.85</sub></p>
                                        </div>
                                        <div class="brator-product-single-item-btn"><a href="product-layout-01.html">Add
                                                to cart</a></div>
                                    </div>
                                </div>
                                <div class="brator-product-single-item-area splide__slide design-two">
                                    <div class="brator-product-single-item-info info-content-flex">
                                        <div class="brator-product-single-item-info-left">
                                            <div class="yollow-batch">New</div>
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
                                    <div class="brator-product-single-item-img"><a href="#_"><img
                                                class="lazyload"
                                                src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                data-src="{{ asset('assets/frontend') }}/images/shop/product-05.jpg"
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
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                                    y="0px" viewBox="0 0 64 64">
                                                    <path
                                                        d="M59.7,23.9l-18.1-2.8L33.4,3.9c-0.6-1.2-2.2-1.2-2.8,0l-8.2,17.3L4.4,23.9c-1.3,0.2-1.8,1.9-0.8,2.8l13.1,13.5l-3.1,18.9  c-0.2,1.3,1.1,2.4,2.3,1.6l16.3-8.9l16.2,8.9c1.1,0.6,2.5-0.4,2.2-1.6l-3.1-18.9l13.1-13.5C61.4,25.8,61,24.1,59.7,23.9z">
                                                    </path>
                                                </svg>
                                                <svg class="active" fill="#000000" width="52" height="52"
                                                    version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                                    y="0px" viewBox="0 0 64 64">
                                                    <path
                                                        d="M59.7,23.9l-18.1-2.8L33.4,3.9c-0.6-1.2-2.2-1.2-2.8,0l-8.2,17.3L4.4,23.9c-1.3,0.2-1.8,1.9-0.8,2.8l13.1,13.5l-3.1,18.9  c-0.2,1.3,1.1,2.4,2.3,1.6l16.3-8.9l16.2,8.9c1.1,0.6,2.5-0.4,2.2-1.6l-3.1-18.9l13.1-13.5C61.4,25.8,61,24.1,59.7,23.9z">
                                                    </path>
                                                </svg>
                                                <svg class="active" fill="#000000" width="52" height="52"
                                                    version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                                    y="0px" viewBox="0 0 64 64">
                                                    <path
                                                        d="M59.7,23.9l-18.1-2.8L33.4,3.9c-0.6-1.2-2.2-1.2-2.8,0l-8.2,17.3L4.4,23.9c-1.3,0.2-1.8,1.9-0.8,2.8l13.1,13.5l-3.1,18.9  c-0.2,1.3,1.1,2.4,2.3,1.6l16.3-8.9l16.2,8.9c1.1,0.6,2.5-0.4,2.2-1.6l-3.1-18.9l13.1-13.5C61.4,25.8,61,24.1,59.7,23.9z">
                                                    </path>
                                                </svg>
                                                <svg class="active" fill="#000000" width="52" height="52"
                                                    version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                                    y="0px" viewBox="0 0 64 64">
                                                    <path
                                                        d="M59.7,23.9l-18.1-2.8L33.4,3.9c-0.6-1.2-2.2-1.2-2.8,0l-8.2,17.3L4.4,23.9c-1.3,0.2-1.8,1.9-0.8,2.8l13.1,13.5l-3.1,18.9  c-0.2,1.3,1.1,2.4,2.3,1.6l16.3-8.9l16.2,8.9c1.1,0.6,2.5-0.4,2.2-1.6l-3.1-18.9l13.1-13.5C61.4,25.8,61,24.1,59.7,23.9z">
                                                    </path>
                                                </svg>
                                                <svg class="d-active" fill="#000000" width="52" height="52"
                                                    version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                                    y="0px" viewBox="0 0 64 64">
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
                                            <p class="brator-price-black-text"><sub>$172.96</sub></p>
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
    </div> --}}
    <!-- Brator new new arrivals product end -->

    <!-- Articles and reviews start-->
    <div class="brator-blog-featured-area grid-type design-two">
        <div class="container-xxxl container-xxl container">
            <div class="row">
                <div class="col-md-12">
                    <div class="brator-section-header">
                        <div class="brator-section-header-title">
                            <h2>Articles & Reviews</h2>
                        </div><a href="#_">See All Articles
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z">
                                </path>
                            </svg></a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6 col-lg-12">
                    <div class="brator-blog-listing-single-item-area hug-padding-right">
                        <div class="type-post">
                            <div class="brator-blog-listing-single-item-thumbnail"><a
                                    class="blog-listing-single-item-thumbnail-link" href="#_" aria-hidden="true"
                                    tabindex="-1"><img class="lazyload"
                                        src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                        data-src="{{ asset('assets/frontend') }}/images/blog-grid-01.jpg"
                                        alt="blog-post-blog-grid-01.jpg" /></a></div>
                            <div class="brator-blog-listing-single-item-content">
                                <h3 class="brator-blog-listing-single-item-title"><a href="blog-single.html">Which
                                        countries use vehicles with a right-hand steering wheel, do you know?</a></h3>
                                <div class="brator-blog-listing-single-item-excerpt">
                                    <p>The braking system of a vehicle is an important safety aspect that should not be.
                                        From there, the pump forces the oil into the engine’s lubrication syste [...]
                                    </p>
                                </div>
                                <div class="brator-blog-listing-single-item-info-2"><a class="post-by" href="#_">
                                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                            viewBox="0 0 64 64">
                                            <path class="st0" d="M-9.5,69.7"></path>
                                            <g>
                                                <path
                                                    d="M32,36.3c8.5,0,15.4-6.9,15.4-15.4S40.5,5.6,32,5.6c-8.5,0-15.4,6.9-15.4,15.4S23.5,36.3,32,36.3z M32,8.6    c6.8,0,12.4,5.5,12.4,12.4S38.8,33.3,32,33.3c-6.8,0-12.4-5.5-12.4-12.4S25.2,8.6,32,8.6z">
                                                </path>
                                                <path
                                                    d="M63.5,55.8C54.8,48.4,43.6,44.4,32,44.4S9.2,48.4,0.5,55.8c-0.6,0.5-0.7,1.5-0.2,2.1s1.5,0.7,2.1,0.2    c8.2-6.9,18.6-10.7,29.5-10.7c10.9,0,21.4,3.8,29.5,10.7c0.3,0.2,0.6,0.4,1,0.4c0.4,0,0.8-0.2,1.1-0.5    C64.2,57.3,64.1,56.3,63.5,55.8z">
                                                </path>
                                            </g>
                                        </svg>By<span>Admin</span></a><a href="#_">
                                        <svg class="bi bi-calendar3" xmlns="http://www.w3.org/2000/svg" width="16"
                                            height="16" fill="currentColor" viewBox="0 0 16 16">
                                            <path
                                                d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857V3.857z">
                                            </path>
                                            <path
                                                d="M6.5 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2z">
                                            </path>
                                        </svg><span>Aug 6, 2021</span></a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-12">
                    <div class="hug-padding-left">
                        <div class="brator-blog-listing-single-item-area list-type-one">
                            <div class="type-post">
                                <div class="brator-blog-listing-single-item-thumbnail"><a
                                        class="blog-listing-single-item-thumbnail-link" href="#_"
                                        aria-hidden="true" tabindex="-1"><img class="lazyload"
                                            src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                            data-src="{{ asset('assets/frontend') }}/images/blog/blog-01.jpg"
                                            alt="blog-post-blog-01.jpg" /></a></div>
                                <div class="brator-blog-listing-single-item-content">
                                    <h3 class="brator-blog-listing-single-item-title"><a href="blog-single.html">Replace
                                            Brakes Guide</a></h3>
                                    <div class="brator-blog-listing-single-item-excerpt">
                                        <p>The braking system of a vehicle is an important safety aspect that should not
                                            be [...]</p>
                                    </div>
                                    <div class="brator-blog-listing-single-item-info-2"><a class="post-by"
                                            href="#_">
                                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                viewBox="0 0 64 64">
                                                <path class="st0" d="M-9.5,69.7"></path>
                                                <g>
                                                    <path
                                                        d="M32,36.3c8.5,0,15.4-6.9,15.4-15.4S40.5,5.6,32,5.6c-8.5,0-15.4,6.9-15.4,15.4S23.5,36.3,32,36.3z M32,8.6    c6.8,0,12.4,5.5,12.4,12.4S38.8,33.3,32,33.3c-6.8,0-12.4-5.5-12.4-12.4S25.2,8.6,32,8.6z">
                                                    </path>
                                                    <path
                                                        d="M63.5,55.8C54.8,48.4,43.6,44.4,32,44.4S9.2,48.4,0.5,55.8c-0.6,0.5-0.7,1.5-0.2,2.1s1.5,0.7,2.1,0.2    c8.2-6.9,18.6-10.7,29.5-10.7c10.9,0,21.4,3.8,29.5,10.7c0.3,0.2,0.6,0.4,1,0.4c0.4,0,0.8-0.2,1.1-0.5    C64.2,57.3,64.1,56.3,63.5,55.8z">
                                                    </path>
                                                </g>
                                            </svg>By<span>Admin</span></a><a href="#_">
                                            <svg class="bi bi-calendar3" xmlns="http://www.w3.org/2000/svg"
                                                width="16" height="16" fill="currentColor"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857V3.857z">
                                                </path>
                                                <path
                                                    d="M6.5 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2z">
                                                </path>
                                            </svg><span>Aug 6, 2021</span></a></div>
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
                                    <h3 class="brator-blog-listing-single-item-title"><a href="blog-single.html">Clean
                                            the engine compartment should or not?</a>
                                    </h3>
                                    <div class="brator-blog-listing-single-item-excerpt">
                                        <p>Whether you’re planning to buy a new or used Mercedes S450, you’re sure to
                                            get the [...]</p>
                                    </div>
                                    <div class="brator-blog-listing-single-item-info-2"><a class="post-by"
                                            href="#_">
                                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                viewBox="0 0 64 64">
                                                <path class="st0" d="M-9.5,69.7"></path>
                                                <g>
                                                    <path
                                                        d="M32,36.3c8.5,0,15.4-6.9,15.4-15.4S40.5,5.6,32,5.6c-8.5,0-15.4,6.9-15.4,15.4S23.5,36.3,32,36.3z M32,8.6    c6.8,0,12.4,5.5,12.4,12.4S38.8,33.3,32,33.3c-6.8,0-12.4-5.5-12.4-12.4S25.2,8.6,32,8.6z">
                                                    </path>
                                                    <path
                                                        d="M63.5,55.8C54.8,48.4,43.6,44.4,32,44.4S9.2,48.4,0.5,55.8c-0.6,0.5-0.7,1.5-0.2,2.1s1.5,0.7,2.1,0.2    c8.2-6.9,18.6-10.7,29.5-10.7c10.9,0,21.4,3.8,29.5,10.7c0.3,0.2,0.6,0.4,1,0.4c0.4,0,0.8-0.2,1.1-0.5    C64.2,57.3,64.1,56.3,63.5,55.8z">
                                                    </path>
                                                </g>
                                            </svg>By<span>Admin</span></a><a href="#_">
                                            <svg class="bi bi-calendar3" xmlns="http://www.w3.org/2000/svg"
                                                width="16" height="16" fill="currentColor"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857V3.857z">
                                                </path>
                                                <path
                                                    d="M6.5 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2z">
                                                </path>
                                            </svg><span>Aug 6, 2021</span></a></div>
                                </div>
                            </div>
                        </div>
                        <div class="brator-blog-listing-single-item-area list-type-one">
                            <div class="type-post">
                                <div class="brator-blog-listing-single-item-thumbnail"><a
                                        class="blog-listing-single-item-thumbnail-link" href="#_"
                                        aria-hidden="true" tabindex="-1"><img class="lazyload"
                                            src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                            data-src="{{ asset('assets/frontend') }}/images/blog/blog-08.jpg"
                                            alt="blog-post-blog-08.jpg" /></a></div>
                                <div class="brator-blog-listing-single-item-content">
                                    <h3 class="brator-blog-listing-single-item-title"><a href="blog-single.html">Auto
                                            Parts for Roll Royce</a></h3>
                                    <div class="brator-blog-listing-single-item-excerpt">
                                        <p>Contrary to popular belief, Lorem Ipsum is not simply random text [...]</p>
                                    </div>
                                    <div class="brator-blog-listing-single-item-info-2"><a class="post-by"
                                            href="#_">
                                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                viewBox="0 0 64 64">
                                                <path class="st0" d="M-9.5,69.7"></path>
                                                <g>
                                                    <path
                                                        d="M32,36.3c8.5,0,15.4-6.9,15.4-15.4S40.5,5.6,32,5.6c-8.5,0-15.4,6.9-15.4,15.4S23.5,36.3,32,36.3z M32,8.6    c6.8,0,12.4,5.5,12.4,12.4S38.8,33.3,32,33.3c-6.8,0-12.4-5.5-12.4-12.4S25.2,8.6,32,8.6z">
                                                    </path>
                                                    <path
                                                        d="M63.5,55.8C54.8,48.4,43.6,44.4,32,44.4S9.2,48.4,0.5,55.8c-0.6,0.5-0.7,1.5-0.2,2.1s1.5,0.7,2.1,0.2    c8.2-6.9,18.6-10.7,29.5-10.7c10.9,0,21.4,3.8,29.5,10.7c0.3,0.2,0.6,0.4,1,0.4c0.4,0,0.8-0.2,1.1-0.5    C64.2,57.3,64.1,56.3,63.5,55.8z">
                                                    </path>
                                                </g>
                                            </svg>By<span>Admin</span></a><a href="#_">
                                            <svg class="bi bi-calendar3" xmlns="http://www.w3.org/2000/svg"
                                                width="16" height="16" fill="currentColor"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857V3.857z">
                                                </path>
                                                <path
                                                    d="M6.5 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2z">
                                                </path>
                                            </svg><span>Aug 6, 2021</span></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="brator-plan-pixel-area">
        <div class="container-xxxl container-xxl container">
            <div class="col-12">
                <div class="plan-pixel-area"></div>
            </div>
        </div>
    </div>
    <!-- Articles and reviews end-->

    <!-- Brator featured brands start -->
    <div class="brator-brand-item-area design-three">
        <div class="container-xxxl container-xxl container">
            <div class="row">
                <div class="col-md-12">
                    <div class="brator-section-header">
                        <div class="brator-section-header-title">
                            <h2>Featured Brands</h2>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6">
                    <div class="brator-brand-img"><a href="#_"><img class="lazyload"
                                src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                data-src="{{ asset('assets/frontend') }}/images/brand/brand-10.png"
                                alt="logo" /></a></div>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6">
                    <div class="brator-brand-img"><a href="#_"><img class="lazyload"
                                src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                data-src="{{ asset('assets/frontend') }}/images/brand/brand-09.png"
                                alt="logo" /></a></div>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6">
                    <div class="brator-brand-img"><a href="#_"><img class="lazyload"
                                src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                data-src="{{ asset('assets/frontend') }}/images/brand/brand-08.png"
                                alt="logo" /></a></div>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6">
                    <div class="brator-brand-img"><a href="#_"><img class="lazyload"
                                src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                data-src="{{ asset('assets/frontend') }}/images/brand/brand-07.png"
                                alt="logo" /></a></div>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6">
                    <div class="brator-brand-img"><a href="#_"><img class="lazyload"
                                src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                data-src="{{ asset('assets/frontend') }}/images/brand/brand-11.png"
                                alt="logo" /></a></div>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6">
                    <div class="brator-brand-img"><a href="#_"><img class="lazyload"
                                src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                data-src="{{ asset('assets/frontend') }}/images/brand/brand-12.png"
                                alt="logo" /></a></div>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6">
                    <div class="brator-brand-img"><a href="#_"><img class="lazyload"
                                src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                data-src="{{ asset('assets/frontend') }}/images/brand/brand-13.png"
                                alt="logo" /></a></div>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6">
                    <div class="brator-brand-img"><a href="#_"><img class="lazyload"
                                src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                data-src="{{ asset('assets/frontend') }}/images/brand/brand-14.png"
                                alt="logo" /></a></div>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6">
                    <div class="brator-brand-img"><a href="#_"><img class="lazyload"
                                src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                data-src="{{ asset('assets/frontend') }}/images/brand/brand-15.png"
                                alt="logo" /></a></div>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6">
                    <div class="brator-brand-img"><a href="#_"><img class="lazyload"
                                src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                data-src="{{ asset('assets/frontend') }}/images/brand/brand-16.png"
                                alt="logo" /></a></div>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6">
                    <div class="brator-brand-img"><a href="#_"><img class="lazyload"
                                src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                data-src="{{ asset('assets/frontend') }}/images/brand/brand-17.png"
                                alt="logo" /></a></div>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6">
                    <div class="brator-brand-img"><a href="#_"><img class="lazyload"
                                src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                data-src="{{ asset('assets/frontend') }}/images/brand/brand-18.png"
                                alt="logo" /></a></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Brator featured brands start -->
    <!-- Brator newsletter area start -->
    <div class="brator-newsletter-area design-one design-for-home-two gray-bg border-top-1px-dark-shallow">
        <div class="container-xxxl container-xxl container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="brator-newsletter-content">
                        <h2>Subscribe To Our Newsletter</h2>
                        <p>Register now to get latest updates on promotions & coupons. Don’t worry, we not spam!</p>
                    </div>
                </div>
                <div class="col-lg-1"></div>
                <div class="col-lg-6">
                    <div class="brator-newsletter-form design-one">
                        <div class="news-letter-form"><span class="wpcf7-form-control-wrap email">
                                <input
                                    class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email"
                                    type="email" name="email" value="" size="40"
                                    aria-required="true" aria-invalid="false" placeholder="Enter your email" /></span>
                            <button class="wpcf7-form-control wpcf7-submit" type="submit">Subscribe</button><span
                                class="ajax-loader"></span>
                        </div>
                        <p>By subscribing, you accepted the our<a href="#_">Policy</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Brator newsletter area end -->
@endsection

@section('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const myDiv = document.getElementById('myDiv');
            const load_more = document.getElementById('load_more');

            load_more.addEventListener('click', function() {
                // $('#category').hide();
                if (myDiv.style.display === 'none' || myDiv.style.display === '') {
                    myDiv.style.display = 'inline';
                    load_more.style.display = 'none';
                } else {
                    myDiv.style.display = 'none'; // Hide the div
                }
            });
        });
        // $('#category').show();
    </script>

    <script>
        $('#selecteYear').on('change', function() {
            selectedYear = selecteYear.value;
            // console.log(selectedYear);
            var select = document.getElementById('makeSelect');
            if (select.hasAttribute("disabled")) {
                select.removeAttribute("disabled");
            }
            $.ajax({
                url: "{{ route('get-make-data') }}",
                method: 'POST',
                data: {
                    year_id: selectedYear
                },
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                success: function(data) {
                    // console.log(data.length);

                    var makeSelect = document.getElementById('makeSelect'),
                        optionsHTML_Arr = [],

                        j = data.length;
                    // console.log(data);

                    optionsHTML_Arr.push(
                        `<option value="">Make</option>`
                    );
                    for (var i = 0; i < j; i++) {
                        // console.log(data[i].id);
                        // console.log(data[i].name);
                        // data = data[i];
                        // console.log(data);
                        optionsHTML_Arr.push(
                            `<option value="${data[i].id}"> ${data[i].name}</option>`
                        );
                    }
                    makeSelect.innerHTML = optionsHTML_Arr.join('');
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });
    </script>
    <script>
        $('#makeSelect').on('change', function() {
            selectedYear = makeSelect.value;
            // console.log(selectedYear);
            var select = document.getElementById('modelSelect');
            if (select.hasAttribute("disabled")) {
                select.removeAttribute("disabled");
            }
            $.ajax({
                url: "{{ route('get-model-data') }}",
                method: 'POST',
                data: {
                    make_id: selectedYear
                },
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                success: function(data) {
                    // console.log(data);
                    var modelSelect = document.getElementById('modelSelect'),
                        optionsHTML_Arr = [],
                        j = data.length;
                    // console.log(data);
                    optionsHTML_Arr.push(
                        `<option value="">Model</option>`
                    );
                    for (var i = 0; i < j; i++) {
                        // console.log(data[i].id);
                        // console.log(data[i].name);
                        // data = data[i];
                        // console.log(data);
                        optionsHTML_Arr.push(
                            `<option value="${data[i].id}"> ${data[i].name}</option>`
                        );
                    }
                    modelSelect.innerHTML = optionsHTML_Arr.join('');
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });
    </script>
@endsection

@extends('layouts.frontend.master')

@section('title')
    Recently Viewed -Brator
@endsection
@section('meta')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('content')
    <!-- Blog post grid start-->
    <div class="brator-banner-slider-area">
        <div class="container-xxxl container-xxl container">
            <div class="row brator-sidebar-single-item">
                <div class="col-md-6">
                    <div class="brator-banner-area design-four lazyload">
                        <div class="brator-banner-content">
                            <h4><a href="#_">Recently Viewed</a></h4>
                            <p>

                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="brator-banner-area design-four lazyload">

                        {{-- @if ($category->image)
                            <img class="lazyload"
                                src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                data-src="{{ asset($category->image) }}" alt="logo" /></a>
                        @endif --}}

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Blog post grid end-->
    <!-- bread start-->
    <div class="brator-breadcrumb-area">
        <div class="container-xxxl container-xxl container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="brator-breadcrumb">
                        <ul>
                            <li><a href="#_">Home</a></li>
                            <li><a href="#_">Recently Viewed</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="brator-product-shop-page-area">
        <div class="container-xxxl container-xxl container">
            <div class="row">
                <div class="col-lg-3 md-display-none">
                    <div class="brator-sidebar-area design-one">
                        <div class="close-fillter">
                            <svg class="bi bi-x" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" viewBox="0 0 16 16">
                                <path
                                    d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z">
                                </path>
                            </svg>
                        </div>
                        <div class="brator-sidebar-single-item">
                            <div class="shop-sidebar-title">
                                <h2>Categories</h2>
                            </div>
                            <div class="shop-sidebar-content">
                                <div class="shop-cat-list">
                                    <ul>
                                        @foreach ($categories as $category_li)
                                            <li class="sub-cat"><a
                                                    href="{{ route('product-category.show', ['product_category' => $category_li->slug]) }}">{{ $category_li->name }}</a>
                                                @if (count($category_li->children) != 0)
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd"
                                                            d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z">
                                                        </path>
                                                    </svg>
                                                    <ul>
                                                        @foreach ($category_li->children as $children)
                                                            <li><a
                                                                    href="{{ route('product-category.show', ['product_category' => $children->slug]) }}">
                                                                    {{ $children->name }} </a></li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="brator-sidebar-single-item">
                            <div class="shop-sidebar-title fillter-list-title">
                                <h2>Filter</h2>
                                <button class="rest-all-checkbox">
                                    <svg class="bi bi-arrow-repeat" xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path
                                            d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41zm-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9z">
                                        </path>
                                        <path fill-rule="evenodd"
                                            d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5.002 5.002 0 0 0 8 3zM3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9H3.1z">
                                        </path>
                                    </svg>Reset All
                                </button>
                            </div>
                            <div class="shop-sidebar-content">
                                <div class="brator-filter-item-area">
                                    <div class="brator-filter-item-title current">
                                        <h4>Origins</h4>
                                        <button class="ac-trigger">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd"
                                                    d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z">
                                                </path>
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="brator-filter-item-content-area">
                                        <div class="brator-filter-item-content">
                                            <input type="checkbox" name="origin" />
                                            <div class="brator-filter-item-check-box-content"><span
                                                    class="brator-name">All</span><span class="brator-count">(1.532)</span>
                                            </div>
                                        </div>
                                        <div class="brator-filter-item-content">
                                            <input type="checkbox" name="origin" />
                                            <div class="brator-filter-item-check-box-content"><span
                                                    class="brator-name">OEM</span><span class="brator-count">(1.132)</span>
                                            </div>
                                        </div>
                                        <div class="brator-filter-item-content">
                                            <input type="checkbox" name="origin" />
                                            <div class="brator-filter-item-check-box-content"><span
                                                    class="brator-name">Aftermarkets</span><span
                                                    class="brator-count">(400)</span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="brator-filter-item-area">
                                    <div class="brator-filter-item-title current">
                                        <h4>Diameter</h4>
                                        <button class="ac-trigger">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd"
                                                    d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z">
                                                </path>
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="brator-filter-item-content-area">
                                        <div class="brator-filter-item-content">
                                            <input type="checkbox" name="origin" />
                                            <div class="brator-filter-item-check-box-content"><span
                                                    class="brator-name">19</span><span class="brator-count">(1.532)</span>
                                            </div>
                                        </div>
                                        <div class="brator-filter-item-content">
                                            <input type="checkbox" name="origin" />
                                            <div class="brator-filter-item-check-box-content"><span
                                                    class="brator-name">20</span><span class="brator-count">(1.132)</span>
                                            </div>
                                        </div>
                                        <div class="brator-filter-item-content">
                                            <input type="checkbox" name="origin" />
                                            <div class="brator-filter-item-check-box-content"><span
                                                    class="brator-name">21</span><span class="brator-count">(400)</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="brator-filter-item-area">
                                    <div class="brator-filter-item-title current">
                                        <h4>Width</h4>
                                        <button class="ac-trigger">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd"
                                                    d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z">
                                                </path>
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="brator-filter-item-content-area">
                                        <div class="brator-filter-item-content">
                                            <input type="checkbox" name="origin" />
                                            <div class="brator-filter-item-check-box-content"><span
                                                    class="brator-name">5.5”</span><span
                                                    class="brator-count">(1.532)</span></div>
                                        </div>
                                        <div class="brator-filter-item-content">
                                            <input type="checkbox" name="origin" />
                                            <div class="brator-filter-item-check-box-content"><span
                                                    class="brator-name">6”</span><span class="brator-count">(1.132)</span>
                                            </div>
                                        </div>
                                        <div class="brator-filter-item-content">
                                            <input type="checkbox" name="origin" />
                                            <div class="brator-filter-item-check-box-content"><span
                                                    class="brator-name">6.5</span><span class="brator-count">(400)</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="brator-filter-item-area">
                                    <div class="brator-filter-item-title current">
                                        <h4>Color/Finish</h4>
                                        <button class="ac-trigger">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd"
                                                    d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z">
                                                </path>
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="brator-filter-item-content-area">
                                        <div class="brator-filter-item-content">
                                            <input type="checkbox" name="origin" />
                                            <div class="brator-filter-item-check-box-content"><span
                                                    class="brator-name">5.5”</span><span
                                                    class="brator-count">(1.532)</span></div>
                                        </div>
                                        <div class="brator-filter-item-content">
                                            <input type="checkbox" name="origin" />
                                            <div class="brator-filter-item-check-box-content"><span
                                                    class="brator-name">6”</span><span class="brator-count">(1.132)</span>
                                            </div>
                                        </div>
                                        <div class="brator-filter-item-content">
                                            <input type="checkbox" name="origin" />
                                            <div class="brator-filter-item-check-box-content"><span
                                                    class="brator-name">6.5</span><span class="brator-count">(400)</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="brator-filter-item-area">
                                    <div class="brator-filter-item-title current">
                                        <h4>Offset</h4>
                                        <button class="ac-trigger">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd"
                                                    d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z">
                                                </path>
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="brator-filter-item-content-area">
                                        <div class="brator-filter-item-content">
                                            <input type="checkbox" name="origin" />
                                            <div class="brator-filter-item-check-box-content"><span
                                                    class="brator-name">5.5”</span><span
                                                    class="brator-count">(1.532)</span></div>
                                        </div>
                                        <div class="brator-filter-item-content">
                                            <input type="checkbox" name="origin" />
                                            <div class="brator-filter-item-check-box-content"><span
                                                    class="brator-name">6”</span><span class="brator-count">(1.132)</span>
                                            </div>
                                        </div>
                                        <div class="brator-filter-item-content">
                                            <input type="checkbox" name="origin" />
                                            <div class="brator-filter-item-check-box-content"><span
                                                    class="brator-name">6.5</span><span class="brator-count">(400)</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="brator-filter-item-area">
                                    <div class="brator-filter-item-title current">
                                        <h4>Materials</h4>
                                        <button class="ac-trigger">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd"
                                                    d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z">
                                                </path>
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="brator-filter-item-content-area">
                                        <div class="brator-filter-item-content">
                                            <input type="checkbox" name="origin" />
                                            <div class="brator-filter-item-check-box-content"><span
                                                    class="brator-name">5.5”</span><span
                                                    class="brator-count">(1.532)</span></div>
                                        </div>
                                        <div class="brator-filter-item-content">
                                            <input type="checkbox" name="origin" />
                                            <div class="brator-filter-item-check-box-content"><span
                                                    class="brator-name">6”</span><span class="brator-count">(1.132)</span>
                                            </div>
                                        </div>
                                        <div class="brator-filter-item-content">
                                            <input type="checkbox" name="origin" />
                                            <div class="brator-filter-item-check-box-content"><span
                                                    class="brator-name">6.5</span><span class="brator-count">(400)</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="brator-filter-item-area">
                                    <div class="brator-filter-item-title current">
                                        <h4>Price</h4>
                                        <button class="ac-trigger">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd"
                                                    d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z">
                                                </path>
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="brator-filter-item-content-area">
                                        <div class="brator-filter-item-content">
                                            <input type="checkbox" name="origin" />
                                            <div class="brator-filter-item-check-box-content"><span
                                                    class="brator-name">5.5”</span><span
                                                    class="brator-count">(1.532)</span></div>
                                        </div>
                                        <div class="brator-filter-item-content">
                                            <input type="checkbox" name="origin" />
                                            <div class="brator-filter-item-check-box-content"><span
                                                    class="brator-name">6”</span><span class="brator-count">(1.132)</span>
                                            </div>
                                        </div>
                                        <div class="brator-filter-item-content">
                                            <input type="checkbox" name="origin" />
                                            <div class="brator-filter-item-check-box-content"><span
                                                    class="brator-name">6.5</span><span class="brator-count">(400)</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="brator-filter-item-area">
                                    <div class="brator-filter-item-title current">
                                        <h4>Price</h4>
                                        <button class="ac-trigger">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd"
                                                    d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z">
                                                </path>
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="brator-filter-item-content-area">
                                        <div class="brator-rang-item-input">
                                            <div class="brator-rang-item-input-single">
                                                <input type="number" name="min" value="" />
                                                <div class="brator-rang-item-input-single-text">$ min</div>
                                            </div>
                                            <div class="brator-rang-item-input-single">
                                                <input type="number" name="max" value="" />
                                                <div class="brator-rang-item-input-single-text">$ max</div>
                                            </div>
                                            <div class="brator-rang-item-input-single-btn">
                                                <button class="ac-trigger">Go</button>
                                            </div>
                                        </div>
                                        <div class="brator-rang-item-slider">
                                            <div id="brator-rang-item-slider-nou"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="brator-filter-item-area brand-item">
                                    <div class="brator-filter-item-title current">
                                        <h4>Brands</h4>
                                        <button class="ac-trigger">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd"
                                                    d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z">
                                                </path>
                                            </svg>
                                        </button>
                                        <div class="brator-form">
                                            <input type="search" placeholder="Search brand">
                                            <svg fill="#000000" width="15" height="15" version="1.1"
                                                id="lni_lni-search-alt" xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                viewBox="0 0 64 64" style="enable-background:new 0 0 64 64;"
                                                xml:space="preserve">
                                                <path
                                                    d="M62.1,57L44.6,42.8c3.2-4.2,5-9.3,5-14.7c0-6.5-2.5-12.5-7.1-17.1v0c-9.4-9.4-24.7-9.4-34.2,0C3.8,15.5,1.3,21.6,1.3,28
                                                c0,6.5,2.5,12.5,7.1,17.1c4.7,4.7,10.9,7.1,17.1,7.1c6.1,0,12.1-2.3,16.8-6.8l17.7,14.3c0.3,0.3,0.7,0.4,1.1,0.4
                                                c0.5,0,1-0.2,1.4-0.6C63,58.7,62.9,57.6,62.1,57z M10.8,42.7C6.9,38.8,4.8,33.6,4.8,28s2.1-10.7,6.1-14.6c4-4,9.3-6,14.6-6
                                                c5.3,0,10.6,2,14.6,6c3.9,3.9,6.1,9.1,6.1,14.6S43.9,38.8,40,42.7C32,50.7,18.9,50.7,10.8,42.7z" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="brator-filter-item-content-area">
                                        <div class="brator-filter-item-content">
                                            <input type="checkbox" name="origin" />
                                            <div class="brator-filter-item-check-box-content"><span
                                                    class="brator-name">Wruth</span></div>
                                        </div>
                                        <div class="brator-filter-item-content">
                                            <input type="checkbox" name="origin" />
                                            <div class="brator-filter-item-check-box-content"><span
                                                    class="brator-name">Bosch</span></div>
                                        </div>
                                        <div class="brator-filter-item-content">
                                            <input type="checkbox" name="origin" />
                                            <div class="brator-filter-item-check-box-content"><span
                                                    class="brator-name">Varta</span></div>
                                        </div>
                                        <div class="brator-filter-item-content">
                                            <input type="checkbox" name="origin" />
                                            <div class="brator-filter-item-check-box-content"><span
                                                    class="brator-name">Dorman</span></div>
                                        </div>
                                        <div class="brator-filter-item-content">
                                            <input type="checkbox" name="origin" />
                                            <div class="brator-filter-item-check-box-content"><span
                                                    class="brator-name">Brigdestone</span></div>
                                        </div>
                                        <div class="brator-filter-item-content">
                                            <input type="checkbox" name="origin" />
                                            <div class="brator-filter-item-check-box-content"><span
                                                    class="brator-name">Michelin</span></div>
                                        </div>
                                        <div class="brator-filter-item-content">
                                            <input type="checkbox" name="origin" />
                                            <div class="brator-filter-item-check-box-content"><span
                                                    class="brator-name">Castrol</span></div>
                                        </div>
                                        <div class="brator-filter-item-content">
                                            <input type="checkbox" name="origin" />
                                            <div class="brator-filter-item-check-box-content"><span
                                                    class="brator-name">Wruth</span></div>
                                        </div>
                                        <div class="brator-filter-item-content">
                                            <input type="checkbox" name="origin" />
                                            <div class="brator-filter-item-check-box-content"><span
                                                    class="brator-name">Bosch</span></div>
                                        </div>
                                        <div class="brator-filter-item-content">
                                            <input type="checkbox" name="origin" />
                                            <div class="brator-filter-item-check-box-content"><span
                                                    class="brator-name">Varta</span></div>
                                        </div>
                                        <div class="brator-filter-item-content">
                                            <input type="checkbox" name="origin" />
                                            <div class="brator-filter-item-check-box-content"><span
                                                    class="brator-name">Dorman</span></div>
                                        </div>
                                        <div class="brator-filter-item-content">
                                            <input type="checkbox" name="origin" />
                                            <div class="brator-filter-item-check-box-content"><span
                                                    class="brator-name">Brigdestone</span></div>
                                        </div>
                                        <div class="brator-filter-item-content">
                                            <input type="checkbox" name="origin" />
                                            <div class="brator-filter-item-check-box-content"><span
                                                    class="brator-name">Michelin</span></div>
                                        </div>
                                        <div class="brator-filter-item-content">
                                            <input type="checkbox" name="origin" />
                                            <div class="brator-filter-item-check-box-content"><span
                                                    class="brator-name">Castrol</span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="brator-filter-item-area">
                                    <div class="brator-filter-item-title">
                                        <h4>Ratings</h4>
                                        <button class="ac-trigger">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd"
                                                    d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z">
                                                </path>
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="brator-filter-item-content-area">
                                        <div class="brator-filter-item-content">
                                            <input type="checkbox" name="origin" />
                                            <div class="brator-filter-item-check-box-content"><span
                                                    class="brator-name">Wruth</span></div>
                                        </div>
                                        <div class="brator-filter-item-content">
                                            <input type="checkbox" name="origin" />
                                            <div class="brator-filter-item-check-box-content"><span
                                                    class="brator-name">Bosch</span></div>
                                        </div>
                                        <div class="brator-filter-item-content">
                                            <input type="checkbox" name="origin" />
                                            <div class="brator-filter-item-check-box-content"><span
                                                    class="brator-name">Varta</span></div>
                                        </div>
                                        <div class="brator-filter-item-content">
                                            <input type="checkbox" name="origin" />
                                            <div class="brator-filter-item-check-box-content"><span
                                                    class="brator-name">Dorman</span></div>
                                        </div>
                                        <div class="brator-filter-item-content">
                                            <input type="checkbox" name="origin" />
                                            <div class="brator-filter-item-check-box-content"><span
                                                    class="brator-name">Brigdestone</span></div>
                                        </div>
                                        <div class="brator-filter-item-content">
                                            <input type="checkbox" name="origin" />
                                            <div class="brator-filter-item-check-box-content"><span
                                                    class="brator-name">Michelin</span></div>
                                        </div>
                                        <div class="brator-filter-item-content">
                                            <input type="checkbox" name="origin" />
                                            <div class="brator-filter-item-check-box-content"><span
                                                    class="brator-name">Castrol</span></div>
                                        </div>
                                        <div class="brator-filter-item-content">
                                            <input type="checkbox" name="origin" />
                                            <div class="brator-filter-item-check-box-content"><span
                                                    class="brator-name">Wruth</span></div>
                                        </div>
                                        <div class="brator-filter-item-content">
                                            <input type="checkbox" name="origin" />
                                            <div class="brator-filter-item-check-box-content"><span
                                                    class="brator-name">Bosch</span></div>
                                        </div>
                                        <div class="brator-filter-item-content">
                                            <input type="checkbox" name="origin" />
                                            <div class="brator-filter-item-check-box-content"><span
                                                    class="brator-name">Varta</span></div>
                                        </div>
                                        <div class="brator-filter-item-content">
                                            <input type="checkbox" name="origin" />
                                            <div class="brator-filter-item-check-box-content"><span
                                                    class="brator-name">Dorman</span></div>
                                        </div>
                                        <div class="brator-filter-item-content">
                                            <input type="checkbox" name="origin" />
                                            <div class="brator-filter-item-check-box-content"><span
                                                    class="brator-name">Brigdestone</span></div>
                                        </div>
                                        <div class="brator-filter-item-content">
                                            <input type="checkbox" name="origin" />
                                            <div class="brator-filter-item-check-box-content"><span
                                                    class="brator-name">Michelin</span></div>
                                        </div>
                                        <div class="brator-filter-item-content">
                                            <input type="checkbox" name="origin" />
                                            <div class="brator-filter-item-check-box-content"><span
                                                    class="brator-name">Castrol</span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="brator-filter-item-area">
                                    <div class="brator-filter-item-title current">
                                        <h4>Manufactures</h4>
                                        <button class="ac-trigger">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd"
                                                    d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z">
                                                </path>
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="brator-filter-item-content-area">
                                        <div class="brator-filter-item-content">
                                            <input type="checkbox" name="origin" />
                                            <div class="brator-filter-item-check-box-content"><span
                                                    class="brator-name">Wruth</span></div>
                                        </div>
                                        <div class="brator-filter-item-content">
                                            <input type="checkbox" name="origin" />
                                            <div class="brator-filter-item-check-box-content"><span
                                                    class="brator-name">Bosch</span></div>
                                        </div>
                                        <div class="brator-filter-item-content">
                                            <input type="checkbox" name="origin" />
                                            <div class="brator-filter-item-check-box-content"><span
                                                    class="brator-name">Varta</span></div>
                                        </div>
                                        <div class="brator-filter-item-content">
                                            <input type="checkbox" name="origin" />
                                            <div class="brator-filter-item-check-box-content"><span
                                                    class="brator-name">Dorman</span></div>
                                        </div>
                                        <div class="brator-filter-item-content">
                                            <input type="checkbox" name="origin" />
                                            <div class="brator-filter-item-check-box-content"><span
                                                    class="brator-name">Brigdestone</span></div>
                                        </div>
                                        <div class="brator-filter-item-content">
                                            <input type="checkbox" name="origin" />
                                            <div class="brator-filter-item-check-box-content"><span
                                                    class="brator-name">Michelin</span></div>
                                        </div>
                                        <div class="brator-filter-item-content">
                                            <input type="checkbox" name="origin" />
                                            <div class="brator-filter-item-check-box-content"><span
                                                    class="brator-name">Castrol</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-12">
                    <div class="brator-best-product-slider">
                        <div class="brator-section-header">
                            <div class="brator-section-header-title">
                                <h2>Recently Viewed</h2>
                            </div>
                        </div>

                        @if ($recentlyViewed != null)
                            <div class="brator-product-slider splide js-splide p-splide"
                                data-splide='{"pagination":false,"type":"slide","perPage":4,"perMove":"1","gap":30, "breakpoints":{ "576" :{ "perPage": "1" },"746" :{ "perPage": "2" }, "768" :{ "perPage" : "2" }, "991":{ "perPage" : "3" }, "1399":{ "perPage" : "4" }, "1500":{ "perPage" : "4" }, "1920":{ "perPage" : "4" }}}'>
                                <div class="splide__arrows style-one">
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

                                        @foreach ($recentlyViewed as $product)
                                            <div class="brator-product-single-item-area splide__slide design-two">
                                                <div class="brator-product-single-item-info info-content-flex">
                                                    <div class="brator-product-single-item-info-left">
                                                        @php
                                                        $updated_at = $product->updated_at;
                                                        $currentDate = date('Y-m-d');
                                                        $dateDifference = strtotime($updated_at) - strtotime($currentDate);
                                                        $daysDifference = round($dateDifference / 86400); // 86400 seconds in a day
                                                    @endphp

                                                    @if ($daysDifference >= 0 && $daysDifference <= 7)
                                                        <div class="yollow-batch">New</div>
                                                    @endif                                                         @php
                                                            $discount = round((($product->base_price - $product->sale_price) / $product->base_price) * 100);

                                                            // @dd($discount)
                                                        @endphp
                                                        @if ($discount > 0)
                                                            <div class="off-batch">{{ $discount }}% OFF</div>
                                                        @endif
                                                        {{-- <div class="stock-out-batch">Out OF stock</div> --}}
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
                                                            alt="alt" /></a></div>
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
                                                                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                                                y="0px" viewBox="0 0 64 64">
                                                                <path
                                                                    d="M59.7,23.9l-18.1-2.8L33.4,3.9c-0.6-1.2-2.2-1.2-2.8,0l-8.2,17.3L4.4,23.9c-1.3,0.2-1.8,1.9-0.8,2.8l13.1,13.5l-3.1,18.9  c-0.2,1.3,1.1,2.4,2.3,1.6l16.3-8.9l16.2,8.9c1.1,0.6,2.5-0.4,2.2-1.6l-3.1-18.9l13.1-13.5C61.4,25.8,61,24.1,59.7,23.9z">
                                                                </path>
                                                            </svg>
                                                            <svg class="active" fill="#000000" width="52"
                                                                height="52" version="1.1"
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                                                y="0px" viewBox="0 0 64 64">
                                                                <path
                                                                    d="M59.7,23.9l-18.1-2.8L33.4,3.9c-0.6-1.2-2.2-1.2-2.8,0l-8.2,17.3L4.4,23.9c-1.3,0.2-1.8,1.9-0.8,2.8l13.1,13.5l-3.1,18.9  c-0.2,1.3,1.1,2.4,2.3,1.6l16.3-8.9l16.2,8.9c1.1,0.6,2.5-0.4,2.2-1.6l-3.1-18.9l13.1-13.5C61.4,25.8,61,24.1,59.7,23.9z">
                                                                </path>
                                                            </svg>
                                                            <svg class="active" fill="#000000" width="52"
                                                                height="52" version="1.1"
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                                                y="0px" viewBox="0 0 64 64">
                                                                <path
                                                                    d="M59.7,23.9l-18.1-2.8L33.4,3.9c-0.6-1.2-2.2-1.2-2.8,0l-8.2,17.3L4.4,23.9c-1.3,0.2-1.8,1.9-0.8,2.8l13.1,13.5l-3.1,18.9  c-0.2,1.3,1.1,2.4,2.3,1.6l16.3-8.9l16.2,8.9c1.1,0.6,2.5-0.4,2.2-1.6l-3.1-18.9l13.1-13.5C61.4,25.8,61,24.1,59.7,23.9z">
                                                                </path>
                                                            </svg>
                                                            <svg class="active" fill="#000000" width="52"
                                                                height="52" version="1.1"
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                                                y="0px" viewBox="0 0 64 64">
                                                                <path
                                                                    d="M59.7,23.9l-18.1-2.8L33.4,3.9c-0.6-1.2-2.2-1.2-2.8,0l-8.2,17.3L4.4,23.9c-1.3,0.2-1.8,1.9-0.8,2.8l13.1,13.5l-3.1,18.9  c-0.2,1.3,1.1,2.4,2.3,1.6l16.3-8.9l16.2,8.9c1.1,0.6,2.5-0.4,2.2-1.6l-3.1-18.9l13.1-13.5C61.4,25.8,61,24.1,59.7,23.9z">
                                                                </path>
                                                            </svg>
                                                            <svg class="d-active" fill="#000000" width="52"
                                                                height="52" version="1.1"
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                                                y="0px" viewBox="0 0 64 64">
                                                                <path
                                                                    d="M59.7,23.9l-18.1-2.8L33.4,3.9c-0.6-1.2-2.2-1.2-2.8,0l-8.2,17.3L4.4,23.9c-1.3,0.2-1.8,1.9-0.8,2.8l13  .1,13.5l-3.1,18.9  c-0.2,1.3,1.1,2.4,2.3,1.6l16.3-8.9l16.2,8.9c1.1,0.6,2.5-0.4,2.2-1.6l-3.1-18.9l13.1-13.5C61.4,25.8,61,24.1,59.7,23.9z">
                                                                </path>
                                                            </svg>
                                                        </div>
                                                        <div class="brator-review-text">
                                                            <p>14 Reviews</p>
                                                        </div>
                                                    </div>
                                                    <div class="brator-product-single-item-price">
                                                        @if ($product->base_price - $product->sale_price > 0)
                                                            <p><sub>{{ $product->sale_price }}</sub><b class="pub">
                                                                    {{ $product->base_price }} </b></p>
                                                        @else
                                                            <p><sub>{{ $product->base_price }}</sub></p>
                                                        @endif
                                                    </div>
                                                    <div class="brator-product-single-item-btn"><a
                                                            href="{{ route('product-details.show', ['product_detail' => $product->sku]) }}">Add
                                                            to cart</a></div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>

                                </div>
                            </div>
                        @else
                            <div class="col-xxl-9 col-12">
                                <p class="brator-not-found">No product Viewed.</p>
                            </div>
                        @endif
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
    {{--
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
                                                    <div class="yollow-batch">New</div>
                                                    @php
                                                        $discount = round((($product->base_price - $product->sale_price) / $product->base_price) * 100);

                                                        // @dd($discount)
                                                    @endphp
                                                    @if ($discount > 0)
                                                        <div class="off-batch">{{ $discount }}% OFF</div>
                                                    @endif
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
                                                        alt="alt" /></a></div>
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
                                                        <svg class="d-active" fill="#000000" width="52"
                                                            height="52" version="1.1"
                                                            xmlns="http://www.w3.org/2000/svg"
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
                                                     @if ($product->base_price - $product->sale_price > 0)
                                                        <p><sub>{{ $product->sale_price }}</sub><b class="pub">
                                                                {{ $product->base_price }} </b></p>
                                                    @else
                                                        <p><sub>{{ $product->base_price }}</sub></p>
                                                    @endif
                                                </div>
                                                <div class="brator-product-single-item-btn"><a
                                                        href="{{ route('product-details.show', ['product_detail' => $product->sku]) }}">Add
                                                        to cart</a></div>
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
    --}}
    <!-- bread end-->
@endsection

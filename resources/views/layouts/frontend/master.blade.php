<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>@yield('title')</title>
    <!-- Meta Data        -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=0 shrink-to-fit=no" />
    @yield('meta')
    <!-- Favicons-->
    <link rel="shortcut icon" href="{{ asset('assets/frontend') }}/images/favicon.png" type="image/png" />
    <!-- Google Font-->
    <link href="https://fonts.googleapis.com/css?display=swap&amp;family=Inter:300,400,500,600,700,800"
        rel="stylesheet" />
    <!-- bootstrap grid-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend') }}/css/bootstrap-grid.min.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend') }}/css/splide.min.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend') }}/css/splide-core.min.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend') }}/css/nouislider.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend') }}/css/select2.min.css" />
    <!-- Theme style-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend') }}/css/theme-style.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend') }}/css/theme-style-home-two.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend') }}/css/url.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend') }}/css/rtl.css" />


    @vite([])
    @yield('css')
</head>

<body class="boxed_wrapper ltr">
    <div class="preloader-area">
        <img src="{{ asset('assets/frontend') }}/images/logo.png" alt="Logo">
    </div>
    <!-- page-direction -->
    <div class="page_direction">
        <div class="demo-rtl direction_switch"><button class="rtl">RTL</button></div>
        <div class="demo-ltr direction_switch"><button class="ltr">LTR</button></div>
    </div>
    <!-- page-direction end -->
    <div class="h-infobox__wrapper">
        <div class="tt-header-holder h-infobox__popup">
            <div class="brator-search-area">
                <form class="search-form" role="search" method="get">
                    <input class="search-field" type="search"
                        placeholder="Search by Part Name, Part Number, Vehicle and Brands" name="s"
                        required="required">
                    <button type="submit">
                        <svg fill="#000000" width="52" height="52" version="1.1"
                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                            y="0px" viewBox="0 0 64 64">
                            <path
                                d="M62.1,57L44.6,42.8c3.2-4.2,5-9.3,5-14.7c0-6.5-2.5-12.5-7.1-17.1v0c-9.4-9.4-24.7-9.4-34.2,0C3.8,15.5,1.3,21.6,1.3,28                                c0,6.5,2.5,12.5,7.1,17.1c4.7,4.7,10.9,7.1,17.1,7.1c6.1,0,12.1-2.3,16.8-6.8l17.7,14.3c0.3,0.3,0.7,0.4,1.1,0.4                                c0.5,0,1-0.2,1.4-0.6C63,58.7,62.9,57.6,62.1,57z M10.8,42.7C6.9,38.8,4.8,33.6,4.8,28s2.1-10.7,6.1-14.6c4-4,9.3-6,14.6-6                                c5.3,0,10.6,2,14.6,6c3.9,3.9,6.1,9.1,6.1,14.6S43.9,38.8,40,42.7C32,50.7,18.9,50.7,10.8,42.7z">
                            </path>
                        </svg>
                    </button>
                </form>
                <div class="search-quly">
                    <p>Quick Search:</p><a href="#_">Replacement</a><a href="#_">Parts</a><a
                        href="#_">Brakes</a><a href="#_">Tires</a><a href="#_">Fluids</a><a
                        href="#_">Filters</a><a href="#_">Wipers</a>
                </div>
            </div>
            <div class="brator-header-menu-info text-left"><a href="#_">Order Status</a><span>24/7
                    Support:</span><a class="phomeee" href="#_">1800 500 1234</a></div>
        </div>
    </div>
    @include('frontend.partials.header')

    @yield('content')
    @include('frontend.partials.footer')

    <button class="scroll-top scroll-to-target" data-target="html">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
            <path fill-rule="evenodd"
                d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z">
            </path>
        </svg><span>top</span>
    </button>
    <script src="{{ asset('assets/frontend') }}/js/jquery.js"></script>
    <script src="{{ asset('assets/frontend') }}/js/jquery.raty.js"></script>
    <script src="{{ asset('assets/frontend') }}/js/waypoints.min.js"></script>
    <script src="{{ asset('assets/frontend') }}/js/counterup.min.js"></script>
    <script src="{{ asset('assets/frontend') }}/js/nouislider.js"></script>
    <script src="{{ asset('assets/frontend') }}/js/splide.min.js"></script>
    <script src="{{ asset('assets/frontend') }}/js/lazysizes.min.js"></script>
    <script src="{{ asset('assets/frontend') }}/js/ls.bgset.min.js"></script>
    <script src="{{ asset('assets/frontend') }}/js/tab.js"></script>
    <script src="{{ asset('assets/frontend') }}/js/img-zoom.js"></script>
    <script src="{{ asset('assets/frontend') }}/js/gsap-core.js"></script>
    <script src="{{ asset('assets/frontend') }}/js/scroll-trigger.js"></script>
    <script src="{{ asset('assets/frontend') }}/js/select2.min.js"></script>
    <script src="{{ asset('assets/frontend') }}/js/addIndicators.js"></script>
    <script src="{{ asset('assets/frontend') }}/js/animation.gsap.js"></script>
    <script src="{{ asset('assets/frontend') }}/js/brator-script.js"></script>

    @yield('js')
    {{-- @if (session('success'))
        <script>
            setTimeout(function() {
                alert("{{ session('success') }}");
            }, 500);
        </script>
    @endif
    @if (session('error'))
        <script>
            setTimeout(function() {
                alert("{{ session('error') }}");
            }, 500);
        </script>
    @endif
    @if (session('update_success'))
        <script>
            setTimeout(function() {
                alert("{{ session('update_success') }}");
            }, 500);
        </script>
    @endif --}}
</body>

</html>

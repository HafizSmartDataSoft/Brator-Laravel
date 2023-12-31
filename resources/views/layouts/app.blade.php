<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/scss/app.scss', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">

    <div id="app">
        <!-- Sidebar Starts -->
        <aside class="sidebar">
        <!-- Sidebar Header Starts -->
        <a href="/">
          <div class="sidebar-header">
            <div class="sidebar-logo-icon">
              <img src="/svg/logo-small.svg" alt="logo" class="h-[45px]">
            </div>

            <div class="sidebar-logo-text">
              <h1 class="flex text-xl">
                <span class="font-bold text-slate-800 dark:text-slate-200"> Admin </span>
                <span class="font-semibold text-primary-500">Toolkit</span>
              </h1>

              <p class="whitespace-nowrap text-xs text-slate-400">Simple &amp; Customizable</p>
            </div>
          </div>
        </a>
        <!-- Sidebar Header Ends -->

        <!-- Sidebar Menu Starts -->
        <ul class="sidebar-content simplebar-scrollable-y" data-simplebar="init"><div class="simplebar-wrapper" style="margin: 0px;"><div class="simplebar-height-auto-observer-wrapper"><div class="simplebar-height-auto-observer"></div></div><div class="simplebar-mask"><div class="simplebar-offset" style="right: 0px; bottom: 0px;"><div class="simplebar-content-wrapper" tabindex="0" role="region" aria-label="scrollable content" style="height: 100%; overflow: hidden scroll;"><div class="simplebar-content" style="padding: 0px;">
          <!-- Dashboard -->
          <li>
            <a href="javascript:void(0);" class="sidebar-menu">
              <span class="sidebar-menu-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
              </span>
              <span class="sidebar-menu-text">Dashboard</span>
              <span class="sidebar-menu-arrow">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
              </span>
            </a>
            <ul class="sidebar-submenu">
              <li>
                <a href="/" class="sidebar-submenu-item"> Analytics </a>
              </li>
              <li>
                <a href="./ecommerce.html" class="sidebar-submenu-item">Ecommerce</a>
              </li>
            </ul>
          </li>

          <div class="sidebar-menu-header">Applications</div>

          <!-- Email -->
          <li>
            <a href="./email.html" class="sidebar-menu">
              <span class="sidebar-menu-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
              </span>
              <span class="sidebar-menu-text">Email</span>
            </a>
          </li>
          <!-- Chat -->
          <li>
            <a href="./chat.html" class="sidebar-menu">
              <span class="sidebar-menu-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-square"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
              </span>
              <span class="sidebar-menu-text">Chat</span>
            </a>
          </li>
          <!-- Calendar -->
          <li>
            <a href="./calendar.html" class="sidebar-menu">
              <span class="sidebar-menu-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
              </span>
              <span class="sidebar-menu-text">Calendar</span>
            </a>
          </li>
          <!-- Invoice -->
          <li>
            <a href="javascript:void(0);" class="sidebar-menu">
              <span class="sidebar-menu-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
              </span>
              <span class="sidebar-menu-text">Invoice</span>
              <span class="sidebar-menu-arrow">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
              </span>
            </a>
            <ul class="sidebar-submenu">
              <li>
                <a href="./invoice-create.html" class="sidebar-submenu-item"> Create </a>
              </li>

              <li>
                <a href="./invoice-details.html" class="sidebar-submenu-item"> Details </a>
              </li>
            </ul>
          </li>
          <!-- ecommnerce -->
          <li>
            <a href="javascript:void(0);" class="sidebar-menu active">
              <span class="sidebar-menu-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-bag"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
              </span>
              <span class="sidebar-menu-text">Ecommerce</span>
              <span class="sidebar-menu-arrow rotate">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
              </span>
            </a>
            <ul class="sidebar-submenu" style="height: 180px;">
              <li>
                <a href="./product-list.html" class="sidebar-submenu-item"> Product List </a>
              </li>
              <li>
                <a href="./product-edit.html" class="sidebar-submenu-item active"> Product Edit </a>
              </li>
              <li>
                <a href="./order-list.html" class="sidebar-submenu-item"> Order List </a>
              </li>
              <li>
                <a href="./order-details.html" class="sidebar-submenu-item"> Order Details </a>
              </li>
              <li>
                <a href="./customer-list.html" class="sidebar-submenu-item"> Customer List </a>
              </li>
            </ul>
          </li>
          <!-- Users -->
          <li>
            <a href="javascript:void(0);" class="sidebar-menu">
              <span class="sidebar-menu-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
              </span>
              <span class="sidebar-menu-text">Users</span>
              <span class="sidebar-menu-arrow">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
              </span>
            </a>
            <ul class="sidebar-submenu">
              <li>
                <a href="./user-list.html" class="sidebar-submenu-item">List</a>
              </li>
              <li>
                <a href="./profile.html" class="sidebar-submenu-item"> Profile </a>
              </li>
            </ul>
          </li>
          <!--  Commponents  -->
          <div class="sidebar-menu-header">Components</div>
          <!-- Common  -->
          <li>
            <a href="javascript:void(0);" class="sidebar-menu">
              <span class="sidebar-menu-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-box"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
              </span>
              <span class="sidebar-menu-text">Common</span>
              <span class="sidebar-menu-arrow">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
              </span>
            </a>
            <ul class="sidebar-submenu">
              <li>
                <a href="./accordion.html" class="sidebar-submenu-item"> Accordion </a>
              </li>
              <li>
                <a href="./alert.html" class="sidebar-submenu-item">Alert</a>
              </li>
              <li>
                <a href="./avatar.html" class="sidebar-submenu-item">Avatar</a>
              </li>
              <li>
                <a href="./badge.html" class="sidebar-submenu-item">Badge</a>
              </li>
              <li>
                <a href="./button.html" class="sidebar-submenu-item">Button</a>
              </li>
              <li>
                <a href="./card.html" class="sidebar-submenu-item">Card</a>
              </li>
              <li>
                <a href="./carousel.html" class="sidebar-submenu-item"> Carousel </a>
              </li>

              <li>
                <a href="./drawer.html" class="sidebar-submenu-item">Drawer</a>
              </li>
              <li>
                <a href="./dropdown.html" class="sidebar-submenu-item"> Dropdown </a>
              </li>
              <li>
                <a href="./list-group.html" class="sidebar-submenu-item"> List Group </a>
              </li>
              <li>
                <a href="./modal.html" class="sidebar-submenu-item">Modal</a>
              </li>
              <li>
                <a href="./pagination.html" class="sidebar-submenu-item"> Pagination </a>
              </li>
              <li>
                <a href="./progress-bar.html" class="sidebar-submenu-item"> Progress </a>
              </li>

              <li>
                <a href="./spinner.html" class="sidebar-submenu-item"> Spinner </a>
              </li>
              <li>
                <a href="./tabs.html" class="sidebar-submenu-item">Tab</a>
              </li>
              <li>
                <a href="./toast.html" class="sidebar-submenu-item">Toast</a>
              </li>
              <li>
                <a href="./tooltip.html" class="sidebar-submenu-item"> Tooltip </a>
              </li>
            </ul>
          </li>
          <!-- Forms  -->
          <li>
            <a href="javascript:void(0);" class="sidebar-menu">
              <span class="sidebar-menu-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
              </span>
              <span class="sidebar-menu-text">Forms</span>
              <span class="sidebar-menu-arrow">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
              </span>
            </a>
            <ul class="sidebar-submenu">
              <li>
                <a href="./input.html" class="sidebar-submenu-item">Input</a>
              </li>
              <li>
                <a href="./input-group.html" class="sidebar-submenu-item"> Input Group </a>
              </li>
              <li>
                <a href="./textarea.html" class="sidebar-submenu-item"> Textarea </a>
              </li>
              <li>
                <a href="./checkbox.html" class="sidebar-submenu-item"> Checkbox </a>
              </li>
              <li>
                <a href="./radio.html" class="sidebar-submenu-item">Radio</a>
              </li>
              <li>
                <a href="./toggle.html" class="sidebar-submenu-item">Toggle</a>
              </li>
              <li>
                <a href="./select.html" class="sidebar-submenu-item">Select</a>
              </li>

              <li>
                <a href="./datepicker.html" class="sidebar-submenu-item"> Datepicker </a>
              </li>
              <li>
                <a href="./editor.html" class="sidebar-submenu-item">Editor</a>
              </li>
              <li>
                <a href="./uploader.html" class="sidebar-submenu-item"> Uploader </a>
              </li>
              <li>
                <a href="./form-layout.html" class="sidebar-submenu-item">Layout</a>
              </li>
              <li>
                <a href="./form-validation.html" class="sidebar-submenu-item"> Validation </a>
              </li>
            </ul>
          </li>
          <!-- Tables  -->
          <li>
            <a href="javascript:void(0);" class="sidebar-menu">
              <span class="sidebar-menu-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list"><line x1="8" y1="6" x2="21" y2="6"></line><line x1="8" y1="12" x2="21" y2="12"></line><line x1="8" y1="18" x2="21" y2="18"></line><line x1="3" y1="6" x2="3.01" y2="6"></line><line x1="3" y1="12" x2="3.01" y2="12"></line><line x1="3" y1="18" x2="3.01" y2="18"></line></svg>
              </span>
              <span class="sidebar-menu-text">Tables</span>
              <span class="sidebar-menu-arrow">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
              </span>
            </a>
            <ul class="sidebar-submenu">
              <li>
                <a href="./basic-table.html" class="sidebar-submenu-item"> Basic Table </a>
              </li>
              <li>
                <a href="./data-table.html" class="sidebar-submenu-item"> Data Table </a>
              </li>
            </ul>
          </li>
          <!-- Charts  -->
          <li>
            <a href="./chart.html" class="sidebar-menu">
              <span class="sidebar-menu-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-pie-chart"><path d="M21.21 15.89A10 10 0 1 1 8 2.83"></path><path d="M22 12A10 10 0 0 0 12 2v10z"></path></svg>
              </span>
              <span class="sidebar-menu-text">Charts</span>
            </a>
          </li>
          <!-- Icons-->
          <li>
            <a href="./icons.html" class="sidebar-menu">
              <span class="sidebar-menu-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-italic"><line x1="19" y1="4" x2="10" y2="4"></line><line x1="14" y1="20" x2="5" y2="20"></line><line x1="15" y1="4" x2="9" y2="20"></line></svg>
              </span>
              <span class="sidebar-menu-text">Icons</span>
            </a>
          </li>
          <!-- Typography-->
          <li>
            <a href="./typography.html" class="sidebar-menu">
              <span class="sidebar-menu-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-type"><polyline points="4 7 4 4 20 4 20 7"></polyline><line x1="9" y1="20" x2="15" y2="20"></line><line x1="12" y1="4" x2="12" y2="20"></line></svg>
              </span>
              <span class="sidebar-menu-text">Typography</span>
            </a>
          </li>
          <!--  Pages  -->
          <div class="sidebar-menu-header">Pages</div>
          <!-- Authentication  -->
          <li>
            <a href="javascript:void(0);" class="sidebar-menu">
              <span class="sidebar-menu-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
              </span>
              <span class="sidebar-menu-text">Authentication</span>
              <span class="sidebar-menu-arrow">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
              </span>
            </a>
            <ul class="sidebar-submenu">
              <li>
                <a href="./login.html" class="sidebar-submenu-item">Login</a>
              </li>
              <li>
                <a href="./register.html" class="sidebar-submenu-item"> Register </a>
              </li>
              <li>
                <a href="./recover-password.html" class="sidebar-submenu-item"> Forgot Password </a>
              </li>
              <li>
                <a href="./reset-password.html" class="sidebar-submenu-item"> Reset Password </a>
              </li>
            </ul>
          </li>
          <!-- Miscellaneous  -->
          <li>
            <a href="javascript:void(0);" class="sidebar-menu">
              <span class="sidebar-menu-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
              </span>
              <span class="sidebar-menu-text">Miscellaneous</span>
              <span class="sidebar-menu-arrow">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
              </span>
            </a>
            <ul class="sidebar-submenu">
              <li>
                <a href="./starter.html" class="sidebar-submenu-item"> Starter Page </a>
              </li>
              <li>
                <a href="./comming-soon.html" class="sidebar-submenu-item"> Coming Soon </a>
              </li>
              <li>
                <a href="./maintenance.html" class="sidebar-submenu-item"> Maintenance </a>
              </li>
              <li>
                <a href="./404-error.html" class="sidebar-submenu-item"> Error 404 </a>
              </li>
              <li>
                <a href="./500-error.html" class="sidebar-submenu-item"> Error 500 </a>
              </li>
              <li>
                <a href="./not-authorized.html" class="sidebar-submenu-item"> Not Authorized </a>
              </li>
            </ul>
          </li>
        </div></div></div></div><div class="simplebar-placeholder" style="width: 288px; height: 1012px;"></div></div><div class="simplebar-track simplebar-horizontal" style="visibility: hidden;"><div class="simplebar-scrollbar" style="width: 0px; display: none;"></div></div><div class="simplebar-track simplebar-vertical" style="visibility: visible;"><div class="simplebar-scrollbar" style="height: 613px; transform: translate3d(0px, 0px, 0px); display: block;"></div></div></ul>
        <!-- Sidebar Menu Ends -->
      </aside>
        <!-- End Sidebar -->
        <div class="wrapper">
            @include('layouts.navigation')
            <div class="content">
                <!-- Page Content -->

                <!-- Page Heading -->
                @if (isset($header))
                    <header class="bg-white shadow">
                        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                            {{ $header }}
                        </div>
                    </header>
                @endif
                <main>
                    {{ $slot }}
                </main>
            </div>
        </div>
        @stack('script')
</body>

</html>

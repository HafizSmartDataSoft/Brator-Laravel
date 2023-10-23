<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="wrapper">
        <!-- Header Starts -->
        <header class="header">
          <div class="container-fluid flex items-center justify-between">
            <!-- Sidebar Toggle & Search Starts -->
            <div class="flex items-center space-x-6">
              <button class="sidebar-toggle">
                <span class="flex space-x-4">
                  <svg stroke="currentColor" fill="none" stroke-width="0" viewBox="0 0 24 24" height="22" width="22" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16"></path>
                  </svg>
                </span>
              </button>

              <!-- Mobile Search Starts -->
              <div class="sm:hidden">
                <button type="button" data-trigger="search-modal" class="flex items-center justify-center rounded-full text-slate-500 transition-colors duration-150 hover:text-primary-500 focus:text-primary-500 dark:text-slate-400 dark:hover:text-slate-300">
                  <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                </button>
              </div>
              <!-- Mobile Search Ends -->

              <!-- Searchbar Start -->
              <button type="button" data-trigger="search-modal" class="group hidden h-10 w-72 items-center overflow-hidden rounded-primary bg-slate-100 px-3 shadow-sm dark:border-transparent dark:bg-slate-700 sm:flex">
                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search text-slate-400"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                <span class="ml-2 text-sm text-slate-400">Search</span>
              </button>
              <!-- Searchbar Ends -->
            </div>
            <!-- Sidebar Toggle & Search Ends -->

            <!-- Header Options Starts -->
            <div class="flex items-center">
              <!-- Language Dropdown Starts -->
              <div class="dropdown" data-strategy="absolute">
                <div class="dropdown-toggle px-3">
                  <button type="button" class="inline-flex items-center gap-2 text-sm text-slate-600 hover:text-slate-700 focus:text-slate-700 dark:text-slate-400 dark:hover:text-slate-300 dark:focus:text-slate-300">
                    <span class="fi fi-gb"></span>
                    <span class="hidden font-medium md:inline-block">English</span>
                    <span class="inline-block font-medium md:hidden">EN</span>
                  </button>
                </div>

                <div class="dropdown-content mt-3 w-40">
                  <ul class="dropdown-list">
                    <li class="dropdown-list-item">
                      <button class="dropdown-btn" type="button">
                        <span class="fi fi-gb"></span>
                        <span class="">English</span>
                      </button>
                    </li>
                    <li class="dropdown-list-item">
                      <button class="dropdown-btn" type="button">
                        <span class="fi fi-de"></span>
                        <span class="">German</span>
                      </button>
                    </li>
                    <li class="dropdown-list-item">
                      <button class="dropdown-btn" type="button">
                        <span class="fi fi-gf"></span>
                        <span class="">French</span>
                      </button>
                    </li>
                    <li class="dropdown-list-item">
                      <button class="dropdown-btn" type="button">
                        <span class="fi fi-sa"></span>
                        <span class="">Arabic</span>
                      </button>
                    </li>
                    <li class="dropdown-list-item">
                      <button class="dropdown-btn" type="button">
                        <span class="fi fi-cn"></span>
                        <span class="">Chinese</span>
                      </button>
                    </li>
                    <li class="dropdown-list-item">
                      <button class="dropdown-btn" type="button">
                        <span class="fi fi-bd"></span>
                        <span class="">Bangla</span>
                      </button>
                    </li>
                  </ul>
                </div>
              </div>
              <!-- Language Dropdown Ends -->

              <!-- Dark Mood Toggle Starts -->
              <div class="dropdown" data-strategy="absolute" id="theme-switcher-dropdown">
                <button class="dropdown-toggle px-3 text-slate-500 hover:text-slate-700 focus:text-primary-500 dark:text-slate-400 dark:hover:text-slate-300 dark:focus:text-primary-500" type="button">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-moon hidden dark:block"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path></svg>
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-sun block dark:hidden"><circle cx="12" cy="12" r="5"></circle><line x1="12" y1="1" x2="12" y2="3"></line><line x1="12" y1="21" x2="12" y2="23"></line><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line><line x1="1" y1="12" x2="3" y2="12"></line><line x1="21" y1="12" x2="23" y2="12"></line><line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line></svg>
                </button>

                <div class="dropdown-content mt-3 w-36">
                  <ul class="dropdown-list">
                    <li class="dropdown-list-item">
                      <button type="buttton" class="dropdown-btn" data-theme-mode="light">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-sun"><circle cx="12" cy="12" r="5"></circle><line x1="12" y1="1" x2="12" y2="3"></line><line x1="12" y1="21" x2="12" y2="23"></line><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line><line x1="1" y1="12" x2="3" y2="12"></line><line x1="21" y1="12" x2="23" y2="12"></line><line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line></svg>
                        <span>Light</span>
                      </button>
                    </li>

                    <li class="dropdown-list-item">
                      <button type="buttton" class="dropdown-btn" data-theme-mode="dark">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-moon"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path></svg>
                        <span>Dark</span>
                      </button>
                    </li>

                    <li class="dropdown-list-item">
                      <button type="buttton" class="dropdown-btn active" data-theme-mode="system">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-monitor"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect><line x1="8" y1="21" x2="16" y2="21"></line><line x1="12" y1="17" x2="12" y2="21"></line></svg>
                        <span>System</span>
                      </button>
                    </li>
                  </ul>
                </div>
              </div>
              <!-- Dark Mood Toggle Ends -->

              <!-- Notification Dropdown Starts -->
              <div class="dropdown -mt-0.5" data-strategy="absolute">
                <div class="dropdown-toggle px-3">
                  <button class="relative mt-1 flex items-center justify-center rounded-full text-slate-500 transition-colors duration-150 hover:text-slate-700 focus:text-primary-500 dark:text-slate-400 dark:hover:text-slate-300 dark:focus:text-primary-500">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg>
                    <span class="absolute -right-1 -top-1.5 flex h-4 w-4 items-center justify-center rounded-full bg-danger-500 text-[11px] text-slate-200">
                      5
                    </span>
                  </button>
                </div>

                <div class="dropdown-content mt-3 w-[17.5rem] divide-y dark:divide-slate-700 sm:w-80">
                  <div class="flex items-center justify-between px-4 py-4">
                    <h6 class="text-slate-800 dark:text-slate-300">Notifications</h6>
                    <button class="text-xs font-medium text-slate-600 hover:text-primary-500 dark:text-slate-300">
                      Clear All
                    </button>
                  </div>

                  <div class="h-80 w-full" data-simplebar="init"><div class="simplebar-wrapper" style="margin: 0px;"><div class="simplebar-height-auto-observer-wrapper"><div class="simplebar-height-auto-observer"></div></div><div class="simplebar-mask"><div class="simplebar-offset" style="right: 0px; bottom: 0px;"><div class="simplebar-content-wrapper" tabindex="0" role="region" aria-label="scrollable content" style="height: auto; overflow: hidden;"><div class="simplebar-content" style="padding: 0px;">
                    <ul>
                      <li class="flex cursor-pointer gap-4 px-4 py-3 transition-colors duration-150 hover:bg-slate-100/70 dark:hover:bg-slate-700">
                        <div class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-full bg-blue-100 text-blue-500">
                          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-circle"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
                        </div>

                        <div>
                          <h6 class="text-sm font-normal">New order received</h6>
                          <p class="text-xs text-slate-400">Order #1234 has been placed</p>
                          <p class="mt-1 flex items-center gap-1 text-xs text-slate-400">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clock"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                            <span>2 min ago</span>
                          </p>
                        </div>
                      </li>

                      <li class="flex cursor-pointer gap-4 px-4 py-3 transition-colors duration-150 hover:bg-slate-100/70 dark:hover:bg-slate-700">
                        <div class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-full bg-yellow-100 text-yellow-500">
                          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-triangle"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12.01" y2="17"></line></svg>
                        </div>

                        <div>
                          <h6 class="text-sm font-normal">High CPU usage</h6>
                          <p class="text-xs text-slate-400">CPU usage is at 92%</p>
                          <p class="mt-1 flex items-center gap-1 text-xs text-slate-400">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clock"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                            <span>5 min ago</span>
                          </p>
                        </div>
                      </li>

                      <li class="flex cursor-pointer gap-4 px-4 py-3 transition-colors duration-150 hover:bg-slate-100/70 dark:hover:bg-slate-700">
                        <div class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-full bg-green-100 text-green-500">
                          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                        </div>

                        <div>
                          <h6 class="text-sm font-normal">Your order has been shipped</h6>
                          <p class="text-xs text-slate-400">Order #1234 has been shipped</p>
                          <p class="mt-1 flex items-center gap-1 text-xs text-slate-400">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clock"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                            <span>10 min ago</span>
                          </p>
                        </div>
                      </li>

                      <li class="flex cursor-pointer gap-4 px-4 py-3 transition-colors duration-150 hover:bg-slate-100/70 dark:hover:bg-slate-700">
                        <div class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-full bg-danger-100 text-danger-500">
                          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                        </div>

                        <div>
                          <h6 class="text-sm font-normal">Something went wrong</h6>
                          <p class="text-xs text-slate-400">Order #1234 has been placed</p>
                          <p class="mt-1 flex items-center gap-1 text-xs text-slate-400">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clock"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                            <span>1 hour ago</span>
                          </p>
                        </div>
                      </li>

                      <li class="flex cursor-pointer gap-4 px-4 py-3 transition-colors duration-150 hover:bg-slate-100/70 dark:hover:bg-slate-700">
                        <div class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-full bg-green-100 text-green-500">
                          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                        </div>

                        <div>
                          <h6 class="text-sm font-normal">Your order has been shipped</h6>
                          <p class="text-xs text-slate-400">Order #1234 has been shipped</p>
                          <p class="mt-1 flex items-center gap-1 text-xs text-slate-400">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clock"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                            <span>10 min ago</span>
                          </p>
                        </div>
                      </li>
                    </ul>
                  </div></div></div></div><div class="simplebar-placeholder" style="width: 0px; height: 0px;"></div></div><div class="simplebar-track simplebar-horizontal" style="visibility: hidden;"><div class="simplebar-scrollbar" style="width: 0px; display: none;"></div></div><div class="simplebar-track simplebar-vertical" style="visibility: hidden;"><div class="simplebar-scrollbar" style="height: 0px; display: none;"></div></div></div>

                  <div class="px-4 py-2">
                    <button class="btn btn-primary-plain btn-sm w-full" type="button">
                      <span>View More</span>
                      <svg xmlns="http://www.w3.org/2000/svg" width="1rem" height="1rem" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                    </button>
                  </div>
                </div>
              </div>
              <!-- Notification Dropdown Ends -->

              <!-- Profile Dropdown Starts -->
              <div class="dropdown" data-strategy="absolute">
                <div class="dropdown-toggle pl-3">
                  <button class="group relative flex items-center gap-x-1.5" type="button">
                    <div class="avatar avatar-circle avatar-indicator avatar-indicator-online">
                      <img class="avatar-img group-focus-within:ring group-focus-within:ring-primary-500" src="/images/avatar1.png" alt="Avatar 1">
                    </div>
                  </button>
                </div>

                <div class="dropdown-content mt-1 w-56 divide-y dark:divide-slate-600">
                  <div class="px-4 py-3">
                    <p class="text-sm">Signed in as</p>
                    <p class="truncate text-sm font-medium">admin@example.com</p>
                  </div>
                  <div class="py-1">
                    <a href="javascript:void(0)" class="dropdown-link">
                      <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user text-slate-500"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                      <span>Profile</span>
                    </a>
                    <a href="javascript:void(0)" class="dropdown-link">
                      <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings text-slate-500"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>
                      <span>Settings</span>
                    </a>
                    <a href="javascript:void(0)" class="dropdown-link">
                      <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-help-circle text-slate-500"><circle cx="12" cy="12" r="10"></circle><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path><line x1="12" y1="17" x2="12.01" y2="17"></line></svg>
                      <span>Support</span>
                    </a>
                  </div>
                  <div class="py-1">
                    <form method="POST" action="#">
                      <button type="submit" class="dropdown-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out text-slate-500"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                        <span>Sign out</span>
                      </button>
                    </form>
                  </div>
                </div>
              </div>
              <!-- Profile Dropdown Ends -->
            </div>
            <!-- Header Options Ends -->
          </div>
        </header>
        <!-- Header Ends -->

        <!-- Page Content Starts -->
        <div class="content">
          <!-- Main Content Starts -->
          <main class="container flex-grow p-4 sm:p-6">
            <!-- Page Title Starts -->
            <div class="mb-6 flex flex-col justify-between gap-y-1 sm:flex-row sm:gap-y-0">
              <h5>Product Edit</h5>

              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="/">Home</a>
                </li>
                <li class="breadcrumb-item">
                  <a href="#">Ecommerce</a>
                </li>
                <li class="breadcrumb-item">
                  <a href="#">Product Edit</a>
                </li>
              </ol>
            </div>
            <!-- Page Title Ends -->

            <!-- Edit Product Page Starts -->
            <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
              <!-- Left side Div Start -->
              <section class="flex flex-col gap-8 lg:col-span-2">
                <!-- General  -->
                <div class="rounded-primary bg-white p-6 shadow-sm dark:bg-slate-800">
                  <h5 class="m-0 p-0 text-xl font-semibold text-slate-700 dark:text-slate-200">General</h5>
                  <p class="mb-4 p-0 text-sm font-normal text-slate-400">
                    Customize the basic information of your product
                  </p>
                  <div class="py-2">
                    <label class="label label-required mb-1 font-medium" for="name"> Name </label>
                    <input type="text" class="input" id="name" value="MacBook Pro 2023">
                  </div>
                  <div class="py-2">
                    <label class="label label-required mb-1 font-medium" for="code"> Code </label>
                    <input type="text" class="input" id="code" value="MBP-2023">
                  </div>
                  <div class="py-2">
                    <label class="label label-required mb-1 font-medium"> Message </label>
                    <textarea class="textarea text-start" rows="5" placeholder="Write message">Introducing the new MacBook Pro 2023 - the ultimate powerhouse for creators and professionals. With the latest M-series chip, stunning Retina display, and up to 32GB of RAM, this laptop delivers lightning-fast performance and unparalleled graphics capabilities.
                </textarea>
                  </div>
                </div>
                <!-- Pricing  -->
                <div class="rounded-primary bg-white p-6 shadow-sm dark:bg-slate-800">
                  <h5 class="m-0 p-0 text-xl font-semibold text-slate-700 dark:text-slate-200">Pricing</h5>
                  <p class="mb-4 p-0 text-sm font-normal text-slate-400">
                    Set your pricing strategies to stay ahead of the competition
                  </p>
                  <div class="grid w-full grid-cols-1 gap-4 py-2 md:grid-cols-2">
                    <div class="flex w-full flex-col md:w-auto">
                      <label class="label label-required mb-1 font-medium" for="base-price"> Base Price </label>
                      <input type="text" class="input" id="base-price" value="1699.99">
                      <p class="help-text mt-1">Set the product regular price</p>
                    </div>
                    <div class="flex w-full flex-col md:w-auto">
                      <label class="label mb-1 font-medium" for="sale-price"> Sale Price </label>
                      <input type="text" class="input" id="sale-price" value="1699.99">
                      <p class="help-text mt-1">Set the product offer price</p>
                    </div>
                  </div>
                  <div class="grid w-full grid-cols-1 gap-4 py-2 md:grid-cols-2">
                    <div class="flex w-full flex-col md:w-auto">
                      <label class="label mb-1 font-medium" for="cost-price"> Cost Price </label>
                      <input type="text" class="input" id="cost-price" value="1200.00">
                      <p class="help-text mt-1">Set the cost price of the product</p>
                    </div>
                    <div class="flex w-full flex-col md:w-auto">
                      <label class="label mb-1 font-medium" for="tax-amount"> Tax Amount (%) </label>
                      <input type="text" class="input" id="tax-amount" value="15">
                      <p class="help-text mt-1">Set the product tax amount in percentage (%)</p>
                    </div>
                  </div>
                </div>
                <!-- Media  -->
                <div class="rounded-primary bg-white p-6 shadow-sm dark:bg-slate-800">
                  <h5 class="m-0 p-0 text-xl font-semibold text-slate-700 dark:text-slate-200">Media</h5>
                  <p class="mb-4 p-0 text-sm font-normal text-slate-400">
                    Showcase your product with high-quality images
                  </p>
                  <div id="dropzone-product-edit" class="dropzone my-5 dz-clickable dz-started">
                    <div class="dz-message">
                      <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-image text-slate-500 dark:text-slate-300"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><circle cx="8.5" cy="8.5" r="1.5"></circle><polyline points="21 15 16 10 5 21"></polyline></svg>
                      <p class="max-w-xs text-slate-500 dark:text-slate-300">
                        Drag &amp; Drop your media files to upload or
                        <a class="text-primary-500 transition-colors duration-150 hover:text-primary-600 hover:underline" href="#">
                          click to browse
                        </a>
                      </p>
                    </div>
                    <!-- Fallback for no JavaScript -->


                </div>
                <!-- Inventory  -->
                <div class="rounded-primary bg-white p-6 shadow-sm dark:bg-slate-800">
                  <h5 class="m-0 p-0 text-xl font-semibold text-slate-700 dark:text-slate-200">Inventory</h5>
                  <p class="mb-4 p-0 text-sm font-normal text-slate-400">Manage and track your product stocks</p>
                  <div class="grid w-full grid-cols-1 gap-4 py-2 md:grid-cols-2">
                    <div class="flex w-full flex-col md:w-auto">
                      <label class="label label-required mb-1 font-medium" for="sku"> SKU </label>
                      <input type="text" class="input" id="sku" value="MBP1001">
                      <p class="help-text mt-1">Product Stock Keeping Unit</p>
                    </div>
                    <div class="flex w-full flex-col md:w-auto">
                      <label class="label mb-1 font-medium" for="sale-price"> Barcode </label>
                      <input type="text" class="input" id="sale-price" value="MBP1001">
                      <p class="help-text mt-1">Supported Format (ISBN, UPC, GTIN, etc.)</p>
                    </div>
                  </div>
                  <div class="grid w-full grid-cols-1 gap-4 py-2 md:grid-cols-2">
                    <div class="flex w-full flex-col md:w-auto">
                      <label class="label label-required mb-1 font-medium" for="stock-quantity"> Stock Quantity </label>
                      <input type="text" class="input" id="stock-quantity" value="200">
                      <p class="help-text mt-1">Enter available stock quantity</p>
                    </div>
                    <div class="flex w-full flex-col md:w-auto">
                      <label class="label mb-1 font-medium" for="low-stock-threshold"> Low Stock Threshold </label>
                      <input type="text" class="input" id="low-stock-threshold" value="50">
                      <p class="help-text mt-1">Enter low stock quantity alert threshold</p>
                    </div>
                  </div>
                </div>
                <!-- Shipping  -->
                <div class="rounded-primary bg-white p-6 shadow-sm dark:bg-slate-800">
                  <h5 class="m-0 p-0 text-xl font-semibold text-slate-700 dark:text-slate-200">Shipping</h5>
                  <label for="toggle-sm" class="toggle toggle-sm mb-4 mt-1">
                    <input class="toggle-input peer sr-only" id="toggle-sm" type="checkbox" checked="">
                    <div class="toggle-body"></div>
                    <span class="label !text-slate-400"> This product requires shipping </span>
                  </label>
                  <div class="grid w-full grid-cols-1 gap-4 py-2 md:grid-cols-2">
                    <div class="flex w-full flex-col md:w-auto">
                      <label class="label label-required mb-1 font-medium" for="weight"> Weight </label>
                      <input type="text" class="input" id="weight" value="4.5">
                      <p class="help-text mt-1">Enter your product weight</p>
                    </div>
                    <div class="flex w-full flex-col md:w-auto">
                      <label class="label mb-1 font-medium" for="unit"> Unit </label>
                      <input type="text" class="input" id="unit" value="Kg">
                      <p class="help-text mt-1">Enter the product weight unit</p>
                    </div>
                  </div>
                  <div class="grid w-full grid-cols-1 gap-4 py-2 md:grid-cols-3">
                    <div class="flex w-full flex-col justify-center md:w-auto">
                      <label class="label label-required my-2 font-medium" for="dimensions-length">
                        Dimension(L x W x H)
                      </label>
                      <input type="text" class="input" id="dimensions-length" value="10">
                      <p class="help-text mt-1">Enter your product dimension in cm</p>
                    </div>
                    <div class="flex w-full flex-col justify-center md:w-auto">
                      <input type="text" class="input" id="dimension-weight" value="20">
                    </div>
                    <div class="flex w-full flex-col justify-center md:w-auto">
                      <input type="text" class="input" id="dimensions-height" value="50">
                    </div>
                  </div>
                </div>
              </section>
              <!-- Left Side Div End  -->

              <!-- Right Side Div Start  -->
              <section class="h-full lg:col-span-1">
                <!-- Organization -->
                <div class="sticky top-20 rounded-primary bg-white p-6 shadow dark:bg-slate-800">
                  <h5 class="m-0 p-0 text-xl font-semibold text-slate-700 dark:text-slate-200">Organization</h5>
                  <p class="mb-4 p-0 text-sm font-normal text-slate-400">Better organize your product</p>
                  <div class="flex flex-col gap-4">
                    <div>
                      <label class="label label-required mb-1 font-medium" for="status"> Status </label>
                      <select class="select" id="status">
                        <option value="">Draft</option>
                        <option value="1">Inactive</option>
                        <option value="2">Active</option>
                        <option value="2">Out Stock</option>
                      </select>
                    </div>
                    <div>
                      <label class="label label-required mb-1 font-medium" for="category"> Category </label>
                      <select class="select" id="category">
                        <option value="">Electronics</option>
                        <option value="2">Fashion</option>
                        <option value="2">Health Care</option>
                      </select>
                    </div>
                    <div>
                      <label class="label mb-1 font-medium" for="vendor"> Tags </label>
                      <select class="tom-select tomselected ts-hidden-accessible" multiple="multiple" autocomplete="off" id="tomselect-1" tabindex="-1">


                        <option value="3">Shoes</option>
                        <option value="4">Furniture</option>
                        <option value="5">Fashion</option>
                        <option value="6">Gadget</option>
                        <option value="7">Health</option>
                        <option value="8">Care</option>
                        <option value="9">Beauty</option>
                        <option value="10">Smart</option>
                        <option value="11">Watch</option>
                        <option value="12">Headphone</option>
                      <option selected="" value="1">Apple</option><option selected="" value="2">Laptop</option></select><div class="ts-wrapper tom-select multi plugin-dropdown_input has-items"><div class="ts-control" role="combobox" aria-haspopup="listbox" aria-expanded="false" aria-controls="tomselect-1-ts-dropdown" id="tomselect-1-ts-control" tabindex="0"><div data-value="1" class="item" data-ts-item="">Apple</div><div data-value="2" class="item" data-ts-item="">Laptop</div><input class="items-placeholder" tabindex="-1" placeholder=""></div><div class="ts-dropdown multi plugin-dropdown_input" style="display: none;"><div class="dropdown-input-wrap"><input type="select-multiple" autocomplete="off" size="1" tabindex="-1" class="dropdown-input"></div><div role="listbox" tabindex="-1" class="ts-dropdown-content" id="tomselect-1-ts-dropdown"></div></div></div>
                    </div>
                    <div>
                      <label class="label mb-1 font-medium" for="brand"> Brand </label>
                      <select class="select" id="brand">
                        <option value="">Apple</option>
                        <option value="1">Apex</option>
                        <option value="2">Lotto</option>
                        <option value="3">Samsung</option>
                      </select>
                    </div>
                    <div>
                      <label class="label mb-1 font-medium" for="vendor"> Vendor </label>
                      <select class="select" id="vendor">
                        <option value="">Star Tech</option>
                        <option value="1">All Store</option>
                        <option value="2">GameEight</option>
                        <option value="2">Vitech</option>
                      </select>
                    </div>
                    <div>
                      <label class="label mb-1 font-medium" for="vendor"> Template </label>
                      <select class="select" id="vendor">
                        <option value="">Default</option>
                        <option value="1">Boxed</option>
                        <option value="2">Minimal</option>
                      </select>
                    </div>
                  </div>
                </div>
              </section>
              <!-- Right Side Div End  -->
            </div>
            <!-- Edit Product Page Ends -->
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
              <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart text-danger-500"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
            </p>
          </footer>
          <!-- Footer Ends -->
        </div>
        <!-- Page Content Ends -->
      </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<aside class="sidebar">
    <!-- Sidebar Header Starts -->
    <a href="/dashboard">
        <div class="sidebar-header">
            <div class="sidebar-logo-icon">
                <img src="{{ asset('adminAsset') }}/svg/logo.svg" alt="logo" class="h-[45px]" />
            </div>

            <div class="sidebar-logo-text">
                <h1 class="flex text-xl">
                    <span class="font-bold text-slate-800 dark:text-slate-200"> Brator </span>
                    <span class="font-semibold text-primary-500">Admin</span>
                </h1>

                <p class="whitespace-nowrap text-xs text-slate-400">Simple &amp; Customizable</p>
            </div>
        </div>
    </a>
    <!-- Sidebar Header Ends -->

    <!-- Sidebar Menu Starts -->
    <ul class="sidebar-content">
        <!-- Dashboard -->
        <li>
            <a href="javascript:void(0);" class="sidebar-menu active">
                <span class="sidebar-menu-icon">
                    <i data-feather="home"></i>
                </span>
                <span class="sidebar-menu-text">Dashboard</span>
                <span class="sidebar-menu-arrow">
                    <i data-feather="chevron-right"></i>
                </span>
            </a>
            <ul class="sidebar-submenu">
                <li>
                    <a href="/dashboard" class="sidebar-submenu-item active">Analytics</a>
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
                    <i data-feather="mail"></i>
                </span>
                <span class="sidebar-menu-text">Email</span>
            </a>
        </li>
        <!-- Chat -->
        <li>
            <a href="./chat.html" class="sidebar-menu">
                <span class="sidebar-menu-icon">
                    <i data-feather="message-square"></i>
                </span>
                <span class="sidebar-menu-text">Chat</span>
            </a>
        </li>
        <!-- Calendar -->
        <li>
            <a href="./calendar.html" class="sidebar-menu">
                <span class="sidebar-menu-icon">
                    <i data-feather="calendar"></i>
                </span>
                <span class="sidebar-menu-text">Calendar</span>
            </a>
        </li>
        <!-- Invoice -->
        <li>
            <a href="javascript:void(0);" class="sidebar-menu">
                <span class="sidebar-menu-icon">
                    <i data-feather="file-text"></i>
                </span>
                <span class="sidebar-menu-text">Invoice</span>
                <span class="sidebar-menu-arrow">
                    <i data-feather="chevron-right"></i>
                </span>
            </a>
            <ul class="sidebar-submenu">
                <li>
                    <a href="./invoice-create.html" class="sidebar-submenu-item"> Create </a>
                         <ul class="sidebar-submenu">
                <li>
                    <a href="./invoice-create.html" class="sidebar-submenu-item"> Create </a>
                </li>

                <li>
                    <a href="./invoice-details.html" class="sidebar-submenu-item"> Details </a>
                </li>
            </ul>
                </li>

                <li>
                    <a href="./invoice-details.html" class="sidebar-submenu-item"> Details </a>
                </li>
            </ul>
        </li>
        <!-- ecommnerce -->
        <li>
            @php
                $menu_items = [
                    // 'Add Category' => 'e-commerce.add-category',
                    ' Order  ' => 'order.index',
                    ' Discount  ' => 'discount.index',
                    ' Customer  ' => 'customer.index',
                    'Category' => 'e-commerce.category-list',
                    'Image Setting' => 'image-setting.index',

                    'Product' => 'product.index',
                    'Review' => 'review.index',
                    ' Tags ' => 'product-tag.index',
                    // "Add Vehicle Make" => "vehicle-make.create",
                    ' Vehicle Make ' => 'vehicle-make.index',
                    // "Add Vehicle Model" => "vehicle-model.create",
                    ' Vehicle Model ' => 'vehicle-model.index',
                    // 'Add Year' => 'vehicle-year.create',
                    ' Year  ' => 'vehicle-year.index',
                    // "Add Fuel Type" => "fuel-type.create",
                    ' Fuel Type' => 'fuel-type.index',
                    // "Add Engine Type" => "engine-type.create",
                    ' Engine Type' => 'engine-type.index',
                    // "Add Model" => "e-commerce.add-model",
                    // "Add Make" => "make.create",
                    // "Add Brand" => "e-commerce.add-brand",
                    // 'Add Product' => 'e-commerce.add-product',
                    // "Product List" => "e-commerce.product-list"
                ];
            @endphp
            <a href="javascript:void(0);" class="sidebar-menu">
                <span class="sidebar-menu-icon">
                    <i data-feather="shopping-bag"></i>
                </span>
                <span class="sidebar-menu-text">Ecommerce</span>
                <span class="sidebar-menu-arrow {{ request()->is('e-commerce/*') ? 'rotate' : '' }}">
                    <i data-feather="chevron-right"></i>
                </span>
            </a>
            <ul class="sidebar-submenu" @if (request()->is('e-commerce/*')) style="height: 180px" @endif>


                @foreach ($menu_items as $label => $route)
                    @include('admin.partials.sidebar.item', [
                        'label' => $label,
                        'route_name' => $route,
                    ])
                @endforeach

                {{-- <li>
                    <a href="{{route('make.index')}}" class="sidebar-submenu-item">Add Make</a>
                </li> --}}

                {{-- <li>
                <a href="./order-list.html" class="sidebar-submenu-item"> Order List </a>
            </li>
            <li>
                <a href="./order-details.html" class="sidebar-submenu-item"> Order Details </a>
            </li>
            <li>
                <a href="./customer-list.html" class="sidebar-submenu-item"> Customer List </a>
            </li> --}}
            </ul>
        </li>
        <!-- Users -->
        <li>
            <a href="javascript:void(0);" class="sidebar-menu">
                <span class="sidebar-menu-icon">
                    <i data-feather="users"></i>
                </span>
                <span class="sidebar-menu-text">Users</span>
                <span class="sidebar-menu-arrow">
                    <i data-feather="chevron-right"></i>
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
        {{-- <div class="sidebar-menu-header">Components</div>
        <!-- Common  -->

        <li>
            <a href="javascript:void(0);" class="sidebar-menu">
                <span class="sidebar-menu-icon">
                    <i data-feather="box"></i>
                </span>
                <span class="sidebar-menu-text">Common</span>
                <span class="sidebar-menu-arrow">
                    <i data-feather="chevron-right"></i>
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
                    <i data-feather="edit"></i>
                </span>
                <span class="sidebar-menu-text">Forms</span>
                <span class="sidebar-menu-arrow">
                    <i data-feather="chevron-right"></i>
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
                    <i data-feather="list"></i>
                </span>
                <span class="sidebar-menu-text">Tables</span>
                <span class="sidebar-menu-arrow">
                    <i data-feather="chevron-right"></i>
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
                    <i data-feather="pie-chart"></i>
                </span>
                <span class="sidebar-menu-text">Charts</span>
            </a>
        </li>
        <!-- Icons-->
        <li>
            <a href="./icons.html" class="sidebar-menu">
                <span class="sidebar-menu-icon">
                    <i data-feather="italic"></i>
                </span>
                <span class="sidebar-menu-text">Icons</span>
            </a>
        </li>
        <!-- Typography-->
        <li>
            <a href="./typography.html" class="sidebar-menu">
                <span class="sidebar-menu-icon">
                    <i data-feather="type"></i>
                </span>
                <span class="sidebar-menu-text">Typography</span>
            </a>
        </li> --}}
        <!--  Pages  -->
        <div class="sidebar-menu-header">Pages</div>
        <!-- Authentication  -->
        <li>
            <a href="javascript:void(0);" class="sidebar-menu">
                <span class="sidebar-menu-icon">
                    <i data-feather="lock"></i>
                </span>
                <span class="sidebar-menu-text">Authentication</span>
                <span class="sidebar-menu-arrow">
                    <i data-feather="chevron-right"></i>
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
                    <i data-feather="grid"></i>
                </span>
                <span class="sidebar-menu-text">Miscellaneous</span>
                <span class="sidebar-menu-arrow">
                    <i data-feather="chevron-right"></i>
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
    </ul>
    <!-- Sidebar Menu Ends -->
</aside>

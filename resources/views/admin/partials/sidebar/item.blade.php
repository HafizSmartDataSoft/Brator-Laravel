<li>
    <a href="{{ route($route_name) }}" class="sidebar-submenu-item {{ request()->routeIs($route_name) ? "active" : "" }}"> {{ $label }} </a>
</li>

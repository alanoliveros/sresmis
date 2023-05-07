<li class="nav-item">
    <a class="nav-link collapsed" href="{{ route('sresmis.admin.dashboard') }}">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
    </a>
</li>

<!-- End Dashboard Nav -->


<li class="nav-heading">Template</li>



<li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-menu-button-wide"></i><span>Components</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    {{-- <ul id="components-nav"
        class="nav-content collapse {{
        Request::routeIs('sresmis.admin.components-alerts') ||
        Request::routeIs('sresmis.admin.components-accordion') ||
        Request::routeIs('sresmis.admin.components-badges') ||
        Request::routeIs('sresmis.admin.components-breadcrumbs') ||
        Request::routeIs('sresmis.admin.components-buttons') ||
        Request::routeIs('sresmis.admin.components-cards') ||
        Request::routeIs('sresmis.admin.components-carousel') ||
        Request::routeIs('sresmis.admin.components-list-group') ||
        Request::routeIs('sresmis.admin.components-modal') ||
        Request::routeIs('sresmis.admin.components-tabs') ||
        Request::routeIs('sresmis.admin.components-pagination') ||
        Request::routeIs('sresmis.admin.components-progress') ||
        Request::routeIs('sresmis.admin.components-spinners') ||
        Request::routeIs('sresmis.admin.components-tooltips') ? 'show' : '' }}"
        data-bs-parent="#sidebar-nav">
        <li><a class="{{ Request::routeIs('sresmis.admin.components-alerts') ? 'active' : '' }}" href="{{route('sresmis.admin.components-alerts')}}"><i class="bi bi-circle"></i><span>Alerts</span></a></li>
        <li><a class="{{ Request::routeIs('sresmis.admin.components-accordion') ? 'active' : '' }}" href="{{route('sresmis.admin.components-accordion')}}"><i class="bi bi-circle"></i><span>Accordion</span></a></li>
        <li><a class="{{ Request::routeIs('sresmis.admin.components-badges') ? 'active' : '' }}" href="{{route('sresmis.admin.components-badges')}}"><i class="bi bi-circle"></i><span>Badges</span></a></li>
        <li><a class="{{ Request::routeIs('sresmis.admin.components-breadcrumbs') ? 'active' : '' }}" href="{{route('sresmis.admin.components-breadcrumbs')}}"><i class="bi bi-circle"></i><span>Breadcrumbs</span></a></li>
        <li><a class="{{ Request::routeIs('sresmis.admin.components-buttons') ? 'active' : '' }}" href="{{route('sresmis.admin.components-buttons')}}"><i class="bi bi-circle"></i><span>Buttons</span></a></li>
        <li><a class="{{ Request::routeIs('sresmis.admin.components-cards') ? 'active' : '' }}" href="{{route('sresmis.admin.components-cards')}}"><i class="bi bi-circle"></i><span>Cards</span></a></li>
        <li><a class="{{ Request::routeIs('sresmis.admin.components-carousel') ? 'active' : '' }}" href="{{route('sresmis.admin.components-carousel')}}"><i class="bi bi-circle"></i><span>Carousel</span></a></li>
        <li><a class="{{ Request::routeIs('sresmis.admin.components-list-group') ? 'active' : '' }}" href="{{route('sresmis.admin.components-list-group')}}"><i class="bi bi-circle"></i><span>List group</span></a></li>
        <li><a class="{{ Request::routeIs('sresmis.admin.components-modal') ? 'active' : '' }}" href="{{route('sresmis.admin.components-modal')}}"><i class="bi bi-circle"></i><span>Modal</span></a></li>
        <li><a class="{{ Request::routeIs('sresmis.admin.components-tabs') ? 'active' : '' }}" href="{{route('sresmis.admin.components-tabs')}}"><i class="bi bi-circle"></i><span>Tabs</span></a></li>
        <li><a class="{{ Request::routeIs('sresmis.admin.components-pagination') ? 'active' : '' }}" href="{{route('sresmis.admin.components-pagination')}}"><i class="bi bi-circle"></i><span>Pagination</span></a></li>
        <li><a class="{{ Request::routeIs('sresmis.admin.components-progress') ? 'active' : '' }}" href="{{route('sresmis.admin.components-progress')}}"><i class="bi bi-circle"></i><span>Progress</span></a></li>
        <li><a class="{{ Request::routeIs('sresmis.admin.components-spinners') ? 'active' : '' }}" href="{{route('sresmis.admin.components-spinners')}}"><i class="bi bi-circle"></i><span>Spinners</span></a></li>
        <li><a class="{{ Request::routeIs('sresmis.admin.components-tooltips') ? 'active' : '' }}" href="{{route('sresmis.admin.components-tooltips')}}"><i class="bi bi-circle"></i><span>Tooltips</span></a></li>
    </ul> --}}
    @php
        $components =   [
                            ['name' => 'Alerts', 'route' => 'admin.components-alerts'],
                            ['name' => 'Accordion', 'route' => 'admin.components-accordion'],
                        ];
    @endphp

    <ul id="components-nav"
        class="nav-content collapse {{ in_array(request()->route()->getName(),array_column($components, 'route'))? 'show': '' }}"
        data-bs-parent="#sidebar-nav">
        @foreach ($components as $component)
            <li>
                <a class="{{ request()->routeIs($component['route']) ? 'active' : '' }}"
                    href="{{ route($component['route']) }}">
                    <i class="bi bi-circle"></i><span>{{ $component['name'] }}</span>
                </a>
            </li>
        @endforeach
    </ul>
</li>

<li class="nav-heading">Pages</li>

<li class="nav-item">
    <a class="nav-link collapsed" href="{{ route('admin.users-profile') }}">
        <i class="bi bi-person"></i>
        <span>Profile</span>
    </a>
</li><!-- End Profile Page Nav -->

<li class="nav-item">
    <a class="nav-link collapsed" href="pages-faq.html">
        <i class="bi bi-question-circle"></i>
        <span>F.A.Q</span>
    </a>
</li><!-- End F.A.Q Page Nav -->

<li class="nav-item">
    <a class="nav-link collapsed" href="pages-contact.html">
        <i class="bi bi-envelope"></i>
        <span>Contact</span>
    </a>
</li><!-- End Contact Page Nav -->

<li class="nav-item">
    <a class="nav-link collapsed" href="pages-register.html">
        <i class="bi bi-card-list"></i>
        <span>Register</span>
    </a>
</li><!-- End Register Page Nav -->

<li class="nav-item">
    <a class="nav-link collapsed" href="pages-login.html">
        <i class="bi bi-box-arrow-in-right"></i>
        <span>Login</span>
    </a>
</li><!-- End Login Page Nav -->

<li class="nav-item">
    <a class="nav-link collapsed" href="pages-error-404.html">
        <i class="bi bi-dash-circle"></i>
        <span>Error 404</span>
    </a>
</li><!-- End Error 404 Page Nav -->

<li class="nav-item">
    <a class="nav-link collapsed" href="pages-blank.html">
        <i class="bi bi-file-earmark"></i>
        <span>Blank</span>
    </a>
</li><!-- End Blank Page Nav -->

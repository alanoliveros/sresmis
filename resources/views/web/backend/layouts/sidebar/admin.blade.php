<li class="nav-item">
    <a class="nav-link collapsed" href="{{route('sresmis.admin.dashboard')}}">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
    </a>
</li>

<!-- End Dashboard Nav -->



<li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#analytics-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-bar-chart"></i><span>Analytics</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    @php
        $components = [
            ['name' => 'Promotion Rate', 'route' => 'admin.components-alerts'],
            ['name' => 'Retention Rate', 'route' => 'admin.components-accordion'],
            ['name' => 'Cohort Survival Rate', 'route' => 'admin.components-accordion'],
            ['name' => 'Graduation Rate', 'route' => 'admin.components-accordion'],
            ['name' => 'Drop-out Rate', 'route' => 'admin.components-accordion'],
            ['name' => 'Failure Rate', 'route' => 'admin.components-accordion'],
            ['name' => 'Completion Rate', 'route' => 'admin.components-accordion'],
            ['name' => 'Achievement Rate', 'route' => 'admin.components-accordion'],
            ['name' => 'Transition Rate', 'route' => 'admin.components-accordion'],
            ['name' => 'Cohort Survival Rate', 'route' => 'admin.components-accordion'],
        ];
    @endphp
    <ul id="analytics-nav"
        class="nav-content collapse {{ in_array(request()->route()->getName(), array_column($components, 'route')) ? 'show' : '' }}"
        data-bs-parent="#sidebar-nav">
        @foreach ($components as $component)
            <li>
                <a class="{{ request()->routeIs($component['route']) ? 'active' : '' }}"
                   href="{{ route($component['route']) }}">
                    <i class="bi bi-circle">
                    </i><span>{{ $component['name'] }}</span>
                </a>
            </li>
        @endforeach
    </ul>
</li>

<li class="nav-item">
    <a class="nav-link collapsed" href="{{route('sresmis.admin.dashboard')}}">
        <i class="bi bi-person-lines-fill"></i>
        <span>Enrolment Profile</span>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#users-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-person-fill"></i><span>Users</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    @php
        $components = [
            ['name' => 'Admin', 'route' => 'admin.components-alerts'],
            ['name' => 'Student', 'route' => 'admin.components-accordion'],
            ['name' => 'Teacher', 'route' => 'admin.components-accordion'],
        ];
    @endphp
    <ul id="users-nav"
        class="nav-content collapse {{ in_array(request()->route()->getName(), array_column($components, 'route')) ? 'show' : '' }}"
        data-bs-parent="#sidebar-nav">
        @foreach ($components as $component)
            <li>
                <a class="{{ request()->routeIs($component['route']) ? 'active' : '' }}"
                   href="{{ route($component['route']) }}">
                    <i class="bi bi-circle">
                    </i><span>{{ $component['name'] }}</span>
                </a>
            </li>
        @endforeach
    </ul>
</li><!-- End Users -->

<li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#academic-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-menu-button-wide"></i><span>Academic</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    @php
        $components = [
            ['name' => 'Daily Attendance', 'route' => 'admin.components-alerts'],
            ['name' => 'Subject', 'route' => 'admin.components-accordion'],
            ['name' => 'Class', 'route' => 'admin.components-accordion'],
            ['name' => 'Class room', 'route' => 'admin.components-accordion'],
        ];
    @endphp
    <ul id="academic-nav"
        class="nav-content collapse {{ in_array(request()->route()->getName(), array_column($components, 'route')) ? 'show' : '' }}"
        data-bs-parent="#sidebar-nav">
        @foreach ($components as $component)
            <li>
                <a class="{{ request()->routeIs($component['route']) ? 'active' : '' }}"
                   href="{{ route($component['route']) }}">
                    <i class="bi bi-circle">
                    </i><span>{{ $component['name'] }}</span>
                </a>
            </li>
        @endforeach
    </ul>
</li><!-- End Users -->

<li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#back-office-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-basket3"></i><span>Back office</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>

    @php
        $components = [
            ['name' => 'Library', 'route' => 'admin.components-alerts'],
            ['name' => 'Session', 'route' => 'admin.components-accordion'],
            ['name' => 'Noticeboard', 'route' => 'admin.components-accordion'],
        ];
    @endphp
    <ul id="back-office-nav"
        class="nav-content collapse {{ in_array(request()->route()->getName(), array_column($components, 'route')) ? 'show' : '' }}"
        data-bs-parent="#sidebar-nav">
        @foreach ($components as $component)
            <li>
                <a class="{{ request()->routeIs($component['route']) ? 'active' : '' }}"
                   href="{{ route($component['route']) }}">
                    <i class="bi bi-circle">
                    </i><span>{{ $component['name'] }}</span>
                </a>
            </li>
        @endforeach
    </ul>
</li><!-- End Users -->


<li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#settings-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-gear"></i><span>Settings</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>

    @php
        $components = [
            ['name' => 'System settings', 'route' => 'admin.components-alerts'],
            ['name' => 'Website settings', 'route' => 'admin.components-alerts'],
            ['name' => 'School settings', 'route' => 'admin.components-accordion'],
            ['name' => 'About', 'route' => 'admin.components-accordion'],
        ];
    @endphp
    <ul id="settings-nav"
        class="nav-content collapse {{ in_array(request()->route()->getName(), array_column($components, 'route')) ? 'show' : '' }}"
        data-bs-parent="#sidebar-nav">
        @foreach ($components as $component)
            <li>
                <a class="{{ request()->routeIs($component['route']) ? 'active' : '' }}"
                   href="{{ route($component['route']) }}">
                    <i class="bi bi-circle">
                    </i><span>{{ $component['name'] }}</span>
                </a>
            </li>
        @endforeach
    </ul>
</li><!-- End Users -->



<li class="nav-heading">Template</li>

<li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-menu-button-wide"></i><span>Components</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>

    @php
        $components = [
            ['name' => 'Alerts', 'route' => 'admin.components-alerts'],
            ['name' => 'Accordion', 'route' => 'admin.components-accordion'],
            ['name' => 'Badges', 'route' => 'admin.components-badges'],
            ['name' => 'Breadcrumbs', 'route' => 'admin.components-breadcrumbs'],
            ['name' => 'Buttons', 'route' => 'admin.components-buttons'],
            ['name' => 'Cards', 'route' => 'admin.components-cards'],
            ['name' => 'Carousel', 'route' => 'admin.components-carousel'],
            ['name' => 'List group', 'route' => 'admin.components-list-group'],
            ['name' => 'Modal', 'route' => 'admin.components-modal'],
            ['name' => 'Tabs', 'route' => 'admin.components-tabs'],
            ['name' => 'Pagination', 'route' => 'admin.components-pagination'],
            ['name' => 'Progress', 'route' => 'admin.components-progress'],
            ['name' => 'Spinners', 'route' => 'admin.components-spinners'],
            ['name' => 'Tooltips', 'route' => 'admin.components-tooltips'],
        ];
    @endphp

    <ul id="components-nav"
        class="nav-content collapse {{ in_array(request()->route()->getName(), array_column($components, 'route')) ? 'show' : '' }}"
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


</li><!-- End Components Nav -->

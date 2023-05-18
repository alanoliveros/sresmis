<li class="nav-item">
    <a class="nav-link collapsed" href="{{route('admin.dashboard')}}">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
        {{--<i class="spinner-border" style="width: 15px; height: 15px; margin-left: 20px"></i>--}}
    </a>
</li>

<!-- End Dashboard Nav -->

<li class="nav-item">
    <a class="nav-link collapsed" href="{{route('enrollmentprofile.dashboard')}}">
        <i class="bi bi-person-lines-fill"></i>
        <span>Enrolment Profile</span>
        {{--<i class="spinner-border" style="width: 15px; height: 15px; margin-left: 20px"></i>--}}
    </a>
</li>

<li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#analytics-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-bar-chart"></i><span>Analytics</span>
        {{--<i class="spinner-border" style="width: 15px; height: 15px; margin-left: 20px"></i>--}}
        <i class="bi bi-chevron-down ms-auto"></i>
    </a>
    @php
        $components = [
            ['name' => 'Promotion Rate', 'route' => 'admin.analytics'],
            ['name' => 'Retention Rate', 'route' => 'admin.retention'],
            /*['name' => 'Cohort Survival Rate', 'route' => 'admin.cohort'],
            ['name' => 'Graduation Rate', 'route' => 'admin.graduation'],
            ['name' => 'Drop-out Rate', 'route' => 'admin.dropout'],
            ['name' => 'Failure Rate', 'route' => 'admin.failure'],
            ['name' => 'Completion Rate', 'route' => 'admin.completion'],
            ['name' => 'Achievement Rate', 'route' => 'admin.achievement'],
            ['name' => 'Transition Rate', 'route' => 'admin.transition'],
            ['name' => 'Participation Rate', 'route' => 'admin.participation'],*/
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
    <a class="nav-link collapsed" data-bs-target="#users-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-person-fill"></i><span>Users</span>
        {{--<i class="spinner-border" style="width: 15px; height: 15px; margin-left: 20px"></i>--}}
        <i class="bi bi-chevron-down ms-auto"></i>
    </a>
    @php
        $components = [
            ['name' => 'Teacher', 'route' => 'admin.users-teacher'],
            ['name' => 'Student', 'route' => 'admin.users-student'],
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
        <i class="bi bi-menu-button-wide"></i><span>Academic</span>
        {{--<i class="spinner-border" style="width: 15px; height: 15px; margin-left: 20px"></i>--}}
        <i class="bi bi-chevron-down ms-auto"></i>
    </a>
    @php
        $components = [
            /*['name' => 'Daily Attendance', 'route' => 'admin.daily-attendance'],*/
            /*['name' => 'Grade Level', 'route' => 'admin.grade-level'],*/
            /*['name' => 'Section', 'route' => 'admin.section'],*/
            /*['name' => 'Class schedule', 'route' => 'admin.class'],*/
            ['name' => 'Class', 'route' => 'section.index'],
            ['name' => 'Subject', 'route' => 'admin.subject'],
            ['name' => 'Class schedule', 'route' => 'class-schedule.index'],
            /*['name' => 'Class room', 'route' => 'admin.class-room'],*/
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
        <i class="bi bi-basket3"></i><span>Back office</span>
        {{--<i class="spinner-border" style="width: 15px; height: 15px; margin-left: 20px"></i>--}}
        <i class="bi bi-chevron-down ms-auto"></i>
    </a>

    @php
        $components = [
            ['name' => 'Library', 'route' => 'admin.library'],
            ['name' => 'Session', 'route' => 'admin.session'],
            ['name' => 'Noticeboard', 'route' => 'admin.noticeboard'],
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
        <i class="bi bi-gear"></i><span>Settings</span>
        {{--<i class="spinner-border" style="width: 15px; height: 15px; margin-left: 20px"></i>--}}
        <i class="bi bi-chevron-down ms-auto"></i>
    </a>

    @php
        $components = [
            ['name' => 'System settings', 'route' => 'admin.system-settings'],
            ['name' => 'Website settings', 'route' => 'admin.website-settings'],
            ['name' => 'School settings', 'route' => 'admin.school-settings'],
            ['name' => 'About', 'route' => 'admin.about'],
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



{{--<li class="nav-heading">Template</li>--}}

<li class="nav-item">
    <a class="nav-link {{ Request::routeIs('teacher.dashboard') ? 'active' : '' }}"
        href="{{ route('teacher.dashboard') }}">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
    </a>
</li><!-- End Dashboard Nav -->

{{-- Students Information --}}
<li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-person-video2"></i><span>Students Information</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    @php
        $informations = [['name' => 'Advisory', 'route' => 'sresmis.teacher.advisory'], ['name' => 'Subject', 'route' => 'sresmis.teacher.by-subject']];
    @endphp
    <ul id="components-nav"
        class="nav-content collapse {{ in_array(request()->route()->getName(),array_column($informations, 'route'))? 'show': '' }}"
        data-bs-parent="#sidebar-nav">
        @foreach ($informations as $information)
            <li>
                <a class="{{ request()->routeIs($information['route']) ? 'active' : '' }}"
                    href="{{ route($information['route']) }}">
                    <i class="bi bi-circle"></i><span>{{ $information['name'] }}</span>
                </a>
            </li>
        @endforeach
    </ul>
</li>
{{-- End Students Information --}}

<li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-bar-chart"></i><span>Student Attendance</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
            <a href="{{ route('teacher.class-attendance.advisory') }}">
                <i class="bi bi-circle"></i><span>Advisory</span>
            </a>
        </li>
        <li>
            <a href="charts-apexcharts.html">
                <i class="bi bi-circle"></i><span>Subject</span>
            </a>
        </li>

    </ul>
</li><!-- End Charts Nav -->
<li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-calendar3"></i><span>Class Schedules</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
            <a href="icons-bootstrap.html">
                <i class="bi bi-circle"></i><span>Advisory</span>
            </a>
        </li>
        <li>
            <a href="icons-remix.html">
                <i class="bi bi-circle"></i><span>Subject</span>
            </a>
        </li>
    </ul>
</li><!-- End Icons Nav -->
<li class="nav-item">
    <a class="nav-link {{ Request::routeIs('sresmis.teacher.student-grades') ? 'active' : '' }}"
        href="{{ route('sresmis.teacher.student-grades') }}">
        <i class="bi bi-award fs-5"></i>
        <span>Student Grades</span>
    </a>
</li><!-- End Profile Page Nav -->

<li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-file-earmark-spreadsheet-fill fs-5"></i></i><span>School Forms</span><i
            class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
            <a href="{{ route('teacher.sf1-view') }}">
                <i class="bi bi-circle"></i><span>SF1</span>
            </a>
        </li>
        <li>
            <a href="{{ route('teacher.sf2-view') }}">
                <i class="bi bi-circle"></i><span>SF2</span>
            </a>
        </li>
        <li>
            <a href="{{ route('teacher.sf9-view') }}">
                <i class="bi bi-circle"></i><span>SF9</span>
            </a>
        </li>
        <li>
            <a href="{{ route('teacher.sf10-view') }}">
                <i class="bi bi-circle"></i><span>SF10</span>
            </a>
        </li>
    </ul>
</li><!-- End Forms Nav -->
<li class="nav-item">
    <a class="nav-link {{ Request::routeIs('sresmis.teacher.student-grades') ? 'active' : '' }}"
        href="{{ route('teacher.mailbox') }}">
        <i class="bi bi-chat-left-dots"></i>
        <span>Mailbox</span>
    </a>
</li><!-- End Profile Page Nav -->

<li class="nav-item">
    <a class="nav-link " href="{{route('sresmis.teacher.dashboard')}}">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
    </a>
</li><!-- End Dashboard Nav -->

<li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-person-video2"></i><span>Students Information</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="components-nav" class="nav-content collapse {{ Request::routeIs('sresmis.teacher.advisory') || Request::routeIs('sresmis.teacher.by-subject') ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
        <li >
            <a class="{{ Request::routeIs('sresmis.teacher.advisory') ? 'active' : '' }}" href="{{route('sresmis.teacher.advisory')}}">
                <i class="bi bi-circle"></i><span>Advisory</span>
            </a>
        </li>
        <li>
            <a class="{{ Request::routeIs('sresmis.teacher.by-subject') ? 'active' : '' }}" href="{{route('sresmis.teacher.by-subject')}}">
                <i class="bi bi-circle"></i><span>Subject</span>
            </a>
        </li>
    </ul>
</li>
<li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-bar-chart"></i><span>Student Attendance</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
            <a href="charts-chartjs.html">
                <i class="bi bi-circle"></i><span>Chart.js</span>
            </a>
        </li>
        <li>
            <a href="charts-apexcharts.html">
                <i class="bi bi-circle"></i><span>ApexCharts</span>
            </a>
        </li>
        <li>
            <a href="charts-echarts.html">
                <i class="bi bi-circle"></i><span>ECharts</span>
            </a>
        </li>
    </ul>
</li><!-- End Charts Nav -->

<li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-layout-text-window-reverse"></i><span>Student Grades</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
            <a href="tables-general.html">
                <i class="bi bi-circle"></i><span>General Tables</span>
            </a>
        </li>
        <li>
            <a href="tables-data.html">
                <i class="bi bi-circle"></i><span>Data Tables</span>
            </a>
        </li>
    </ul>
</li><!-- End Tables Nav -->

<li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-file-earmark-spreadsheet-fill fs-5"></i></i><span>School Forms</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
            <a href="forms-elements.html">
                <i class="bi bi-circle"></i><span>Form Elements</span>
            </a>
        </li>
        <li>
            <a href="forms-layouts.html">
                <i class="bi bi-circle"></i><span>Form Layouts</span>
            </a>
        </li>
        <li>
            <a href="forms-editors.html">
                <i class="bi bi-circle"></i><span>Form Editors</span>
            </a>
        </li>
        <li>
            <a href="forms-validation.html">
                <i class="bi bi-circle"></i><span>Form Validation</span>
            </a>
        </li>
    </ul>
</li><!-- End Forms Nav -->
<li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-calendar3"></i><span>Class Schedules</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
            <a href="icons-bootstrap.html">
                <i class="bi bi-circle"></i><span>Bootstrap Icons</span>
            </a>
        </li>
        <li>
            <a href="icons-remix.html">
                <i class="bi bi-circle"></i><span>Remix Icons</span>
            </a>
        </li>
        <li>
            <a href="icons-boxicons.html">
                <i class="bi bi-circle"></i><span>Boxicons</span>
            </a>
        </li>
    </ul>
</li><!-- End Icons Nav -->

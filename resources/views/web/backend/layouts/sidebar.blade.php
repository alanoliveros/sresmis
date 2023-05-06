<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        @if(auth()->user()->role == 1)
            @include('web.backend.layouts.sidebar.admin')
        @elseif(auth()->user()->role == 2)
            @include('web.backend.layouts.sidebar.teacher')
        @elseif(auth()->user()->role == 3)
            @include('web.backend.layouts.sidebar.student')
        @endif

    </ul>

</aside><!-- End Sidebar-->

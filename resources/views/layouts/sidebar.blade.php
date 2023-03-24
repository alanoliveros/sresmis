<aside class="left-sidebar" data-sidebarbg="skin5">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav" class="pt-4">
                @if(auth()->user()->role == 'admin')

                    @include('layouts.sidebar-component.admin-sidebar')

                @endif @if(auth()->user()->role == 'teacher')
                    @include('layouts.sidebar-component.teacher-sidebar')
                @endif
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>

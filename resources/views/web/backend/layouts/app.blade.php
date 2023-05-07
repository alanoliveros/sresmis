<!DOCTYPE html>
<html lang="en">

<!-- ======= Head ======= -->
@include('web.backend.layouts.head')<!-- End Head -->

<body>
<!-- ======= Header ======= -->
@include('web.backend.layouts.header')<!-- End Header -->

<!-- ======= Sidebar ======= -->
@include('web.backend.layouts.sidebar')<!-- End Sidebar-->

<!-- ======= Main ======= -->
@yield('content')<!-- Main-->

<!-- ======= Footer ======= -->
@include('web.backend.layouts.footer')<!-- End Footer -->

<!-- Vendor JS Files -->
<!-- Template Main JS File -->
@include('web.backend.layouts.script')<!-- End -->
</body>

</html>

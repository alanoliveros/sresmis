<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>@yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content="" name="description">
    <meta content="" name="keywords">

    @include('web.backend.layouts.head.links')

    @include('web.backend.layouts.head.css')

    <!-- =======================================================
    * Template Name: NiceAdmin
    * Updated: Mar 09 2023 with Bootstrap v5.2.3
    * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
</head>

<body>

@yield('content')

<!-- End #main -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"
        integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{ asset('storage/backend/assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ asset('storage/backend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('storage/backend/assets/vendor/chart.js/chart.umd.js') }}"></script>
<script src="{{ asset('storage/backend/assets/vendor/echarts/echarts.min.js') }}"></script>
<script src="{{ asset('storage/backend/assets/vendor/quill/quill.min.js') }}"></script>
<script src="{{ asset('storage/backend/assets/vendor/tinymce/tinymce.min.js') }}"></script>
<script src="{{ asset('storage/backend/assets/vendor/php-email-form/validate.js') }}"></script>


<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js" defer></script>

</body>

</html>

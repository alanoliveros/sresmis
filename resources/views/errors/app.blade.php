<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>@yield('title')</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <link href="{{ asset('storage/backend/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('storage/backend/assets/css/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('storage/backend/assets/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('storage/backend/assets/css/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('storage/backend/assets/css/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ asset('storage/backend/assets/css/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('storage/backend/assets/css/style.css') }}" rel="stylesheet">

</head>

<body>

    @yield('content')

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('storage/backend/assets/js/apexcharts.min.js') }}"></script>
    <script src="{{ asset('storage/backend/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('storage/backend/assets/js/chart.umd.js') }}"></script>
    <script src="{{ asset('storage/backend/assets/js/echarts.min.js') }}"></script>
    <script src="{{ asset('storage/backend/assets/js/quill.min.js') }}"></script>
    <script src="{{ asset('storage/backend/assets/js/simple-datatables.js') }}"></script>
    <script src="{{ asset('storage/backend/assets/js/tinymce.min.js') }}"></script>
    <script src="{{ asset('storage/backend/assets/js/validate.js') }}"></script>
    <script src="{{ asset('storage/backend/assets/js/main.js') }}"></script>

</body>

</html>

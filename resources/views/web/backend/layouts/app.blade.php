<!DOCTYPE html>
<html lang="en">


@include('web.backend.layouts.head')


<body>
@include('web.backend.layouts.header')


@include('web.backend.layouts.sidebar')


@yield('content')


@include('web.backend.layouts.footer')



@include('web.backend.layouts.script')


</body>

</html>

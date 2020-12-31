<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title')</title>

    <link href="{{ asset('public/backend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('public/backend/font-awesome/css/font-awesome.css')}}" rel="stylesheet">

    <link href="{{ asset('public/backend/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('public/backend/css/style.css') }}" rel="stylesheet">

    @yield('custom-css')

</head>

<body class="gray-bg">

    @yield('content')

    <!-- Mainly scripts -->
    <script src="{{ asset('public/backend/js/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('public/backend/js/popper.min.js') }}"></script>
    <script src="{{ asset('public/backend/js/bootstrap.js') }}"></script>

    @yield('custom-js')

</body>

</html>

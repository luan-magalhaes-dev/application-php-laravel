<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('layouts.dashboard.head')
    @yield('extra-styles')
    <link rel="stylesheet"
          href="{{ asset('css/app.css') }}">
</head>

<body class="theme-green theme-dark">
@include('layouts.dashboard.loader')
<div class="overlay"></div>
@include('layouts.dashboard.left_sidebar')
<section class="content">
    <div class="body_scroll">
        @yield('content')
    </div>
</section>
@include('layouts.dashboard.scripts')
@yield('extra-scripts')
</body>
</html>

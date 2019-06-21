@php
/** @var \App\Services\SiteContext $site */
$site = app()->make(\App\services\SiteContext::class);
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    @section('css')
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
    @show
</head>
<body>
    <div id="app">
        @section('header')
        @show

        @section('main')
        @show
    </div>
<footer class="container mt-3 text-center">
    © 2019 {{ $site->copyright }}. All rights reserved.
</footer>
<!-- Scripts -->
@section('script')
    <script src="{{ mix('/js/manifest.js') }} "></script>
    <script src="{{ mix('/js/vendor.js') }}"></script>
    <script src="{{ mix('/js/app.js') }}"></script>
@show
</body>
</html>

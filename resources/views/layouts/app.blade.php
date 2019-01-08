<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'LaraBBS') - Laravel 进阶教程</title>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

</head>

<body>
{{-- route_class 是helpers自定义的函数 --}}
<div id="app" class="{{ route_class() }}-page">

    {{-- 引入导航栏 --}}
    @include('layouts._navbar')

    <div class="container">

        {{-- 引入消息栏 --}}
        @include('common._messages')

        {{-- 留下空间 放内容 --}}
        @yield('content')

    </div>

    @include('layouts._footer')
</div>

<!-- Scripts -->
<script src="{{ mix('js/app.js') }}"></script>
</body>

</html>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('app_name') }} - @yield('title', 'Index')</title>
    @vite('resources/assets/admin/sass/app.scss')
</head>
<body data-bs-theme="dark">
    @yield('content')
    @vite('resources/assets/admin/js/app.js')
</body>
</html>

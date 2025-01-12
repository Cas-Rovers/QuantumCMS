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
    <main @auth class="d-flex flex-nowrap" id="top" @endauth>
        @auth
            @include('admin.layouts.sidebar')
            <div class="content w-100">
                @include('admin.layouts.top-navbar')
                <section class="my-3 mx-3">
                    @yield('content')
                </section>
            </div>
        @endauth
        @guest
            <div class="content w-100">
                <section>
                    @yield('content')
                </section>
            </div>
        @endguest
    </main>
    @vite('resources/assets/admin/js/app.js')
    @stack('scripts')
</body>
</html>

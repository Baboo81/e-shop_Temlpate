<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $pageTitle ?? config('app.name', 'Laravel') }}</title>

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('assets/css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/products/index.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/cart/index.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/nav.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/libs/aos/aos.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <!-- Scripts JS -->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}" defer></script>


    <!-- Styles spécifiques à une page -->
    @yield('styles')

    @stack('scripts')
</head>
<body class="">
    <div class="">

        {{-- Header visible (logo/bandeau) --}}
        @include('partials.header')

        {{-- Navbar --}}
        @include('partials.nav')

        {{-- Page Heading --}}
        @isset($header)
            <header class=""">
                <div class="">
                    {{ $header }}
                </div>
            </header>
        @endisset

        {{-- Page Content --}}
        <main class="">
            @yield('content')
        </main>

        {{-- Footer --}}
        @include('partials.footer')

    </div>
</body>
</html>

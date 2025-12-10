<!DOCTYPE html>
<html lang="fr">
    <head>
        @include('partials.header')
    </head>
    <body>
        @include('partials.nav')
        <main>
            @yield('content')
        </main>
        <footer>
            @include('partials.footer')
        </footer>
    </body>
</html>

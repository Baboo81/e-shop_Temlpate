{{-- partials/header.blade.php --}}
<header class="bg-white shadow-sm">
    <div class="container py-3 d-flex justify-content-between align-items-center">
        {{-- Logo --}}
        <a href="{{ route('home') }}" class="navbar-brand">
            <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" height="50">
        </a>

        {{-- Message / Bandeau optionnel --}}
        <div class="header-text">
            <p class="mb-0">Bienvenue sur notre mini-shop !</p>
        </div>
    </div>
</header>

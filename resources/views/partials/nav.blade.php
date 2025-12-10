<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">

        {{-- Logo / Home --}}
        <a class="navbar-brand" href="{{ route('home') }}">Home</a>

        {{-- Mobile toggler --}}
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        {{-- Menu --}}
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            {{-- Liens à gauche --}}
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <li class="nav-item">
                    <a class="nav-link{{ request()->routeIs('home') ? ' active' : '' }}" href="{{ route('home') }}">
                        Accueil
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link{{ request()->routeIs('products.index') ? ' active' : '' }}" href="{{ route('products.index') }}">
                        Boutique
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link{{ request()->routeIs('cart.index') ? ' active' : '' }}" href="{{ route('cart.index') }}">
                        Panier
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">Ma future page</a>
                </li>

            </ul>

            {{-- Zone à droite : auth / guest --}}
            <ul class="navbar-nav ms-auto">

                {{-- Utilisateur non connecté --}}
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Se connecter</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Créer un compte</a>
                    </li>
                @endguest

                {{-- Utilisateur connecté --}}
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                           data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>

                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            <li>
                                <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                    Mon profil
                                </a>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button class="dropdown-item" type="submit">
                                        Se déconnecter
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @endauth

            </ul>

        </div>
    </div>
</nav>

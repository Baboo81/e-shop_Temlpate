@extends('layouts.app')

@section('content')
<section class="row banner">
    <div class="overlay"></div>
    <div class="content">
        <h1 class="mainTitle text-center">Sensei BonsaiKa</h1>
    </div>
</section>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4 p-5">

            <div class="card shadow-sm rounded-5">
                <div class="card-body text-center py-5">

                    <h1 class="mb-4">Bienvenue chez Sensei BonsaiKa</h1>

                    @auth
                    <p class="fs-5">
                        Ravie de te revoir, <strong>{{ Auth::user()->name }}</strong> !
                    </p>
                    <a href="{{ route('dashboard') }}" class="btn btn-primary mt-3">
                        Aller au Dashboard
                    </a>
                    @else
                    <p class="fs-5">
                        Bienvenue ! Vous pouvez vous connecter ou créer un compte pour accéder à plus de contenu.
                    </p>
                    <a href="{{ route('login') }}" class="btn btn-outline-primary me-2">Se connecter</a>
                    <a href="{{ route('register') }}" class="btn btn-primary">Créer un compte</a>
                    @endauth

                </div>
            </div>

        </div>
    </div>

</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row min-vh-100 justify-content-center align-items-center">
        <div class="col-md-6">
            <div class="card text-center p-4 shadow">
                <h1 class="text-success mb-3">✅ Paiement confirmé</h1>

                <p class="mb-4">
                    Merci pour votre commande 🙏
                    Votre paiement a bien été traité.
                </p>

                <a href="{{ route('home') }}" class="btn btn-primary">
                    Retour à l’accueil
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

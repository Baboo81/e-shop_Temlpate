@extends('layouts.app')

@section('content')
<div class="container py-5">

    <div class="card shadow-lg border-0" style="border-radius: 20px;">
        <div class="row g-0">

            {{-- Image du produit --}}
            <div class="col-md-5">
                @if($product->image)
                    <img src="{{ asset('assets/img/'. $product->image) }}"
                         class="img-fluid h-100 w-100"
                         style="object-fit: cover; border-top-left-radius: 20px; border-bottom-left-radius: 20px;">
                @else
                    <div class="d-flex align-items-center justify-content-center h-100 bg-light"
                         style="border-top-left-radius: 20px; border-bottom-left-radius: 20px;">
                        <span class="text-muted">Aucune image</span>
                    </div>
                @endif
            </div>

            {{-- Infos produit --}}
            <div class="col-md-7">
                <div class="p-4">

                    <h1 class="fw-bold mb-3">{{ $product->name }}</h1>

                    <p class="text-muted fs-5">
                        {{ $product->description }}
                    </p>

                    <div class="my-4">
                        <span class="h3 text-success fw-bold">{{ number_format($product->price, 2) }} €</span>
                    </div>

                    <a href="{{ route('cart.add', $product) }}"
                       class="btn btn-success btn-lg px-4 shadow-sm"
                       style="border-radius: 10px;">
                       Ajouter au panier
                    </a>

                    <div class="mt-4">
                        <a href="{{ route('products.index') }}" class="text-decoration-none">
                            ← Retour aux produits
                        </a>
                    </div>

                </div>
            </div>

        </div>
    </div>

</div>
@endsection

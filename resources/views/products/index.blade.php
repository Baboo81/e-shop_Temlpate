@extends('layouts.app')

@section('content')
    <div class="container py-5">
        {{-- Search Zone --}}
        <div class="row search-bar">
            <div class="col-12 my-5">
                <h1 class="my-5 text-center fw-bold">Notre Boutique</h1>
                <form action="{{ route('products.search') }}" method="GET" class="search-bar my-5">
                    <div class="input-group position-relative">
                        <i class="bi bi-search"
                            style="position:absolute; top:50%; left:10px; transform:translateY(-50%); color:#777; z-index: 5;"></i>
                        <input type="text" name="search" value="{{ request('search') }}"
                            placeholder="Rechercher un produit" class="form-control rounded-5 ps-5">
                    </div>
                </form>
            </div>
        </div>
        {{-- Search Zone END --}}

        <div class="row g-4">

            @foreach ($products as $product)
                <div class="col-md-4 col-sm-6">
                    <div class="card h-100 shadow-sm border-0" style="border-radius: 20px; overflow: hidden;">

                        {{-- Image produit --}}
                        @if ($product->image)
                            <img src="{{ asset('assets/img/' . $product->image) }}" class="card-img-top"
                                style="height: 250px; object-fit: cover;">
                        @else
                            <div class="d-flex align-items-center justify-content-center bg-light" style="height: 250px;">
                                <span class="text-muted">Pas d'image</span>
                            </div>
                        @endif

                        {{-- Contenu --}}
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-bold">{{ $product->name }}</h5>

                            <p class="card-text text-muted" style="flex-grow:1;">
                                {{ Str::limit($product->description, 80) }}
                            </p>

                            <p class="fw-bold mb-2">{{ number_format($product->price, 2) }} €</p>

                            <div class="d-grid gap-2 mt-auto">
                                <a href="{{ route('products.show', $product->id) }}" class="btn btn-outline-primary">
                                    Voir le produit
                                </a>
                                <form action="{{ route('cart.add', $product->id) }}" method="POST">
                                    @csrf
                                    <button class="btn btn-success">
                                        Ajouter au panier
                                    </button>
                                </form>
                            </div>

                        </div>

                    </div>
                </div>
            @endforeach

        </div>

    </div>
@endsection

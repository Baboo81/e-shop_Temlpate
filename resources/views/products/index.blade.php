@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Nos produits</h1>

    <div class="row">
        @foreach($products as $product)
            <div class="col-md-4 mb-3">
                <div class="card">
                    @if($product->image)
                        <img src="{{ $product->image }}" class="card-img-top" alt="">
                    @endif

                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p>{{ $product->price }} €</p>

                        <a href="{{ route('products.show', $product) }}" class="btn btn-primary">
                            Voir le produit
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection

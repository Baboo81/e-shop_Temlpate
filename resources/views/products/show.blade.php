@extends('layouts.app')

@section('content')
<div class="container">

    <h1>{{ $product->name }}</h1>

    @if($product->image)
        <img src="{{ $product->image }}" class="img-fluid mb-3">
    @endif

    <p>{{ $product->description }}</p>
    <p><strong>{{ $product->price }} €</strong></p>

    <a href="{{ route('cart.add', $product) }}" class="btn btn-success">
        Ajouter au panier
    </a>

</div>
@endsection

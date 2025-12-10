@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Votre panier</h1>

    @if(!$cart)
        <p>Votre panier est vide.</p>
    @else

        <table class="table">
            <thead>
                <tr>
                    <th>Produit</th>
                    <th>Prix</th>
                    <th>Quantité</th>
                    <th>Total</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                @php $total = 0; @endphp

                @foreach($cart as $id => $item)
                    @php $total += $item['price'] * $item['quantity']; @endphp

                    <tr>
                        <td>{{ $item['name'] }}</td>
                        <td>{{ $item['price'] }} €</td>
                        <td>{{ $item['quantity'] }}</td>
                        <td>{{ $item['price'] * $item['quantity'] }} €</td>
                        <td>
                            <a href="{{ route('cart.remove', $id) }}" class="btn btn-danger">
                                Supprimer
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>

            <tfoot>
                <tr>
                    <th colspan="3">Total</th>
                    <th>{{ $total }} €</th>
                </tr>
            </tfoot>
        </table>

        <form action="{{ route('order.store') }}" method="POST">
            @csrf
            <button class="btn btn-success">Passer commande</button>
        </form>

    @endif
</div>
@endsection

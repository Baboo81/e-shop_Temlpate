@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row min-vh-100 d-flex justify-content-center align-items-center">
        <section class="confirm-commande">
            <div class="card col-12 rounded-5">
            <h1 class="text-center my-5">Votre panier</h1>

            @if (!$cart)
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

                    @foreach ($cart as $id => $item)
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
                    <div class="text-center my-5">
                        <form action="{{ route('order.store') }}" method="POST">
                            @csrf
                            <button class="btn btn-success">Passer commande</button>
                        </form>
                    </div>
                    @endif
                </div>
            </div>
        </section>
    </div>
</div>
@endsection

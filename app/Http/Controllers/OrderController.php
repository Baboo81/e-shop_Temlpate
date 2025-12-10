<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function store()
    {
        $cart = session('cart', []);

        if (!$cart) {
            return back()->with('error', 'Votre panier est vide.');
        }

        $total = array_reduce($cart, fn($sum, $item) => $sum + ($item['price'] * $item['quantity']), 0);

        Order::create([
            'user_id' => auth()->id(),
            'items' => json_encode($cart),
            'total' => $total,
        ]);

        session()->forget('cart');

        return redirect('/products')->with('success', 'Commande passée avec succès !');
    }
}

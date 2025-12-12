<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class ProductController extends Controller
{
    /**
     * Affiche la liste de tous les produits (page boutique);
     * Gestion de la search bar;
     */
    public function index(Request $request)
    {
        //Serach bar
        if ($request->filled('search')) {
            $search = $request->input('search');

            $products = Product::where('name', 'LIKE', "%{$search}%")
                               ->orWhere('description', 'LIKE', "%{$search}%")
                               ->paginate(12)
                               ->appends(['search' => $search]);
        } else {
            // Paginator vide
            $products = new LengthAwarePaginator([], 0, 12);
        }

        $products = Product::all();
        return view('products.index', compact('products'));
    }

    /**
     * Affiche un seul produit (fiche produit)
     * $product est injecté automatiquement via le route model binding
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

}

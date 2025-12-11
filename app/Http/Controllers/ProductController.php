<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Affiche la liste de tous les produits (page boutique)
     */
    public function index()
    {
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

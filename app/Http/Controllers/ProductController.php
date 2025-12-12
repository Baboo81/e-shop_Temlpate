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

        $products = Product::all();
        return view('products.index', compact('products'));
    }

    /**
     * Search Zone
     */
    public function search(Request $request)
    {
        //Serach bar

        // Vérifie si l'utilisateur a tapé quelque chose
        if ($request->filled('search')) {
            $search = $request->input('search');

            // On cherche le premier produit correspondant
            $product = Product::where('name', 'LIKE', "%{$search}%")
                              ->orWhere('description', 'LIKE', "%{$search}%")
                              ->first();

            if ($product) {
                // Redirige directement vers la page show
                return redirect()->route('products.show', $product->id);
            } else {
                // Aucun produit trouvé, retourne sur la page de recherche avec un message
                return back()->with('error', 'Aucun produit trouvé pour votre recherche.');
            }
        }
        //Si l'utilisateur n'a rien tapé, on retourne sur la page d'index
        return redirect()->route('products.index');
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

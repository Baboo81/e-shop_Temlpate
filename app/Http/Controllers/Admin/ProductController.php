<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;//Pour hériter des fonctionnalités de base
use App\Models\Product;//Sert à manipuler la table : products
use Illuminate\Support\Facades\Storage;//pour gérer les fichier/images sur le disque
use Illuminate\Http\Request;//Récupère les données du form

class ProductController extends Controller
{
    /**
     * Liste des produits :
     * Récupère tous les produits de DB, triés par date de création grâce à created_at, du plus récent au plus ancien.
     * Passe les produits à la vue admin.products via compact('products').
     */
    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->get();
        return view('admin.products.index', compact('products'));
    }

    /**
     * Formulaire création :
     * Affiche le formulaire pour créer un nouveau produit.
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Stocker un nouveau produit :
     * Validation des données envoyées par le formulaire
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'image' => 'nullable|image|max:2048',
        ]);

        //Si un fichier image est uploadé, on le stocke dans  /storage/app/public/products
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        //Création du produit dans la DB
        Product::create($data);

        //Redirection vers la liste des produits avec message flash : success
        return redirect()->route('admin.products.index')->with('success', 'Produit créé avec succès !');
    }

    /**
     * Formulaire d'édition :
     * Affiche le formulaire d'édition pour un produit spécifique.
     * $product est injecté automatiquement par Laravel grâce au route model binding.
     */
    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    /**
     * Mettre à jour le produit :
     * Validation des données du formulaire d'édition
     */
    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            //Supprime l'ancienne img si existante
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            //Stocke la nouvelle img et met à jour $data['image']
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        $product->update($data);

        return redirect()->route('admin.products.index')->with('success', 'Produit mis à jour !');
    }

    /**
     * Supprimer un produit :
     * Supprime l'img du produit si elle existe,
     * Supprime le produit de la DB,
     * Redirige avec msg flash
     */
    public function destroy(Product $product)
    {
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Produit supprimé');
    }
}

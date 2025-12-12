<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

////////////////////////////
// PAGE D’ACCUEIL        //
///////////////////////////
Route::get('/home', function () {
    return view('home'); // home.blade.php
})->name('home');

////////////////////////////
// MINI-SHOP             //
///////////////////////////

//Search Zone
Route::get('/products', [ProductController::class, 'index'])->name('products.index');

// Liste des produits
Route::get('/', [ProductController::class, 'index'])->name('products.index');

// Détail produit
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

// Panier
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::get('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
Route::get('/cart/remove/{product}', [CartController::class, 'remove'])->name('cart.remove');

// Passer une commande (auth seulement)
Route::post('/order', [OrderController::class, 'store'])
    ->middleware('auth')
    ->name('order.store');

////////////////////////////
//        CRUD            //
///////////////////////////
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('products', \App\Http\Controllers\Admin\ProductController::class);
});

///////////////////////////////
// DASHBOARD & PROFIL (auth)//
/////////////////////////////
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

////////////////////////////////////////////////////////////
// ROUTES BREEZE (auth, login, register, forgot password…)//
////////////////////////////////////////////////////////////
require __DIR__.'/auth.php';

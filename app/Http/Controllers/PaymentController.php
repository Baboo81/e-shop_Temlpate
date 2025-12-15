<?php

namespace App\Http\Controllers;
use Stripe\Stripe; //Classe servant à configurer la clé de l'API
use Stripe\PaymentIntent; //Classe pour les tentatives de paiement côté stripe

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Affiche la page de paiment (checkout)
     * et crée une intention de paiement avec Stripe
     */
    public function create()
    {
        //On définit la clé secrète Stripe qui sera stockée dans .env(STRIPE_SECRET)
        //Cette clé ne doit jamais se trouver côté front-end
        Stripe::setApiKey(config('services.stripe.secret'));

        //Ensuite nous récupérons le total du panier depuis la session,
        //Stripe travail en centimes donc nous devons donc multiplier par 100
        $total = session('cart_total') * 100;

        //Ensuite nous allons créer l'intention de paiement Stripe :
        //Stripe va gérer :
        // - la validation de la carte
        // - le 3D sécure si néc,
        // - la sécurité PCI-DSS
        $intent = PaymentIntent::create([
            //Montant à payer en centimes :
            'amount' => $total,

            //Devise utilisée :
            'currency' => 'eur',
        ]);

        //On retourne la vue checkout, qui transmet le clt_secret ce qui permettra au front de confirmer le paiment sans jamais exposer la clé au front-end
        return view('checkout', [
            'clientSecret' => $intent->client_secret,
        ]);
    }
}

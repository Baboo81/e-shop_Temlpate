@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row min-vh-100 justify-content-center align-items-center">
        <div class="col-md-6">
            <div class="card p-4">
                <h1 class="mb-4">Paiement sécurisé</h1>

                <form id="payment-form">
                    <div id="card-element" class="mb-3"></div>

                    <button id="submit" class="btn btn-success w-100">
                        Payer
                    </button>
                </form>

                <div id="card-errors" class="text-danger mt-3"></div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://js.stripe.com/v3/"></script>

<script>
const stripe = Stripe("{{ config('services.stripe.key') }}");

// Création des éléments Stripe
const elements = stripe.elements();
const card = elements.create('card');
card.mount('#card-element');

// Soumission du formulaire
document.getElementById('payment-form').addEventListener('submit', async (e) => {
    e.preventDefault();

    const { paymentIntent, error } = await stripe.confirmCardPayment(
        "{{ $clientSecret }}",
        {
            payment_method: {
                card: card
            }
        }
    );

    if (error) {
        document.getElementById('card-errors').textContent = error.message;
    } else {
        window.location.href = "{{ route('payment.success') }}";
    }
});
</script>
@endpush

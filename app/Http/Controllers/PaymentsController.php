<?php

namespace App\Http\Controllers;

use App\Models\Apartment;
use App\Models\Sponsorship;
use Illuminate\Http\Request;
use Braintree;
use Braintree\Transaction;

class PaymentsController extends Controller
{

    public function make(Request $request)
    {
        $payload = $request->input('payload', false);
        $nonce = $payload['nonce'];
        $status = Transaction::sale([
            'amount' => '10.00',
            'paymentMethodNonce' => $nonce,
            'options' => [
                'submitForSettlement' => True
            ]
        ]);



        return response()->json($status);
    }
    public function index(Apartment $apartment, Sponsorship $sponsorship)
    {

        return view('payment.payment', compact('apartment', 'sponsorship'));
    }
}

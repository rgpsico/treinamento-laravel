<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Stripe\Charge;
use Stripe\StripeClient;

class StripeController extends Controller
{

    public function index()
    {
        return view('stripe.index');
    }


    public function testeJogo()
    {
        return view('teste.jogo');
    }



    public function pagamento(Request $request)
    {
        $valor = 10 * 100;
        $email = "rgyr2010@hotmail.com";

        dd($request->all());
        $token = $request->input('stripeToken');



        try {
            \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

            $charge = Charge::create([
                'amount' => 1000, // valor em centavos
                'currency' => 'usd',
                'source' =>  $token, // substitua pelo stripeToken gerado pelo Stripe.js ou pela CLI do Stripe
                'description' => 'Exemplo de pagamento com cartão de crédito',
            ]);

            // Criar um pagamento com um cliente existente
            $charge = Charge::create([
                'amount' => 1000, // valor em centavos
                'currency' => 'usd',
                'customer' => 'cus_Jra0CxJpEFLbk1', // substitua pelo ID de cliente válido
                'description' => 'Exemplo de pagamento com cliente existente',
            ]);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }

        return response()->json(['success' => true]);
    }

    public function treinoStripe()
    {
        $stripe = new StripeClient(env('STRIPE_SECRET'));

        $res = $stripe->tokens->create([
            'card' => [
                'number' => '4242424242424242',
                'exp_month' => '07',
                'exp_year' => '2025',
                'cvc' => '123',
                'name' => 'Fabi revendedora da Silva',
                'address_line1' => 'Av. Pa;ulista, 1000',
                'address_line2' => 'Apto 123',
                'address_city' => 'São Paulo',
                'address_state' => 'SP',
                'address_zip' => '01310-100',
                'address_country' => 'BR'
            ]
        ]);

        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        // Criar um pagamento com um cliente existente
        $response =  $stripe->charges->create([
            'amount' => 1000, // valor em centavos
            'currency' => 'usd',
            'source' => $res->id, // substitua pelo token de cartão válido
            'description' => 'Exemplo de pagamento com cartão de crédito',
        ]);

        dd($response->status);
    }

    public function all()
    {
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        $charges = \Stripe\Charge::all();
        $data = $charges->data;

        return response()->json(['content' => $data]);
    }


    public function teste()
    {
        return view('teste.index');
    }
}

<?php

namespace App\Http\Controllers;

use Exception;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Stripe\Charge;
use Stripe\StripeClient;

class TreinoController extends Controller
{

    public function gpt()
    {
        $client = new Client(); //GuzzleHttp\Client

        $search = "laravel get ip address";

        $data = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer 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',
        ])
            ->post("https://api.openai.com/v1/chat/completions", [
                "model" => "gpt-3.5-turbo-16k-0613",
                'messages' => [
                    [
                        "role" => "user",
                        "content" => $search
                    ]
                ],
                'temperature' => 0.5,
                "max_tokens" => 200,
                "top_p" => 1.0,
                "frequency_penalty" => 0.52,
                "presence_penalty" => 0.5,
                "stop" => ["11."],
            ])
            ->json();

        return response()->json($data);
    }
}

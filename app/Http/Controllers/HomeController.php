<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        return Inertia::render('Home', [
            'user' => $user,
        ]);
    }
}

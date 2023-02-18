<?php

use App\Modulos\Entregadores\Http\Controllers\MeuController;
use Illuminate\Support\Facades\Route;

Route::get('/modulo', [MeuController::class, 'index']);

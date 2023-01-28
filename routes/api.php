<?php

use App\Http\Controllers\ItensController;
use App\Http\Controllers\ProprietarioController;
use App\Http\Controllers\UserdataController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('/auth', [UserdataController::class,'authApi']);

Route::post('/register', [UserdataController::class, 'store']);


Route::delete('/propietario/{id}/delete', [ProprietarioController::class, 'delete']);

Route::group(['prefix' => '/itens'], function () {
    Route::post('/store', [ItensController::class, 'store']);
    Route::delete('/{id}/delete', [ItensController::class, 'delete']);
});



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

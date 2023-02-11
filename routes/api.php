<?php

use App\Http\Controllers\Api\ImovelApicontroller;
use App\Http\Controllers\ItensController;
use App\Http\Controllers\ListaEsperaController;
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



Route::group(['prefix' => '/imovel'], function () {
    Route::post('/store', [ImovelApicontroller::class, 'store']);
    Route::get('/{id}/delete', [ImovelApicontroller::class, 'delete']);
});



Route::group(['prefix' => '/listaEspera'], function () {
    Route::post('/store', [ListaEsperaController::class, 'storeApi'])->name('lista.esperaApi');
    Route::delete('/{id}/delete', [ListaEsperaController::class, 'delete']);
});


Route::get('/teste', function(){
    return 'aqui';
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

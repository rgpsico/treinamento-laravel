<?php

use App\Http\Controllers\ComercioController;
use App\Http\Controllers\EntregadoresController;
use App\Http\Controllers\ImovelController;
use App\Http\Controllers\ProfissionaisController;
use App\Http\Controllers\UserdataController;
use app\Modulos\Entregadores\Models\Entregadores;
use Illuminate\Support\Facades\Route;

Route::get('/teste', [UserdataController::class, 'teste'])->name('novo.teste');
Route::get('/home', [ImovelController::class, 'home'])->name('novo.home');

Route::get('/login', [UserdataController::class, 'login'])->name('user.login');
Route::post('/login', [UserdataController::class, 'auth'])->name('user.auth');

Route::get('/logout', [UserdataController::class, 'logout'])->name('logout');;
Route::get('/', [ImovelController::class, 'categoria']);

Route::get('/register', [UserdataController::class, 'register'])->name('user.create');;
Route::get('/registerAmigo', [UserdataController::class, 'registerAmigo'])->name('user.registerAmigo');;
Route::get('/registerHome', [EntregadoresController::class, 'registerHome'])->name('entregadores.registerHome');

Route::post('/storeIndicacao', [UserdataController::class, 'storeIndicacao'])->name('user.storeIndicacao');;
Route::post('/store', [UserdataController::class, 'store'])->name('user.store');;




Route::group(['prefix' => '/public'], function () {
    Route::get('/', [ImovelController::class, 'categoria'])->name('novo.categoria');

    Route::group(['prefix' => '/imoveis'], function () {
        Route::get('', [ImovelController::class, 'listarN'])->name('listar.imoveis.public');
        Route::get('/{id}/detalhes', [ImovelController::class, 'detalhes'])->name('show.imovel.public');
    });

    Route::group(['prefix' => '/comercio'], function () {
        Route::get('', [ComercioController::class, 'indexPublic'])->name('listar.comercio.public');
        Route::get('/{id}/show', [ComercioController::class, 'showPublic'])->name('show.comercio.public');
    });


    Route::group(['prefix' => '/entregadores'], function () {
        Route::get('', [EntregadoresController::class, 'listar'])->name('listar.entregadores.public');
        Route::get('/{id}/detalhes', [EntregadoresController::class, 'show'])->name('show.entregadores.public');
    });


    Route::group(['prefix' => '/profissionais'], function () {
        Route::get('', [ProfissionaisController::class, 'listar'])->name('listar.profissionais.public');
        Route::get('/{id}/detalhes', [ProfissionaisController::class, 'profissionalPageBootrap'])->name('show.profissionais.public');
    });
});

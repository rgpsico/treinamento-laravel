<?php

use App\Events\PostCreated;
use App\Http\Controllers\DashBoardController;
use App\Http\Controllers\ImovelController;
use App\Http\Controllers\ItensController;
use App\Http\Controllers\ProprietarioController;
use App\Http\Controllers\UserdataController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;


Route::get('/', [ImovelController::class,'listarN'])->name('novo.listar');
Route::get('/detalhes/{id}/show', [ImovelController::class,'detalhes'])->name('detalhes');
Route::get('/categoria', [ImovelController::class,'categoria'])->name('novo.categoria');
Route::get('/home', [ImovelController::class,'home'])->name('novo.home');


Route::get('/login', [UserdataController::class,'login'])->name('user.login');
Route::post('/login', [UserdataController::class,'auth'])->name('user.auth');
Route::get('/register', [UserdataController::class,'register'])->name('user.create');;
Route::post('/store', [UserdataController::class,'store'])->name('user.store');;
Route::get('/logout', [UserdataController::class,'logout'])->name('logout');;


Route::get('/list', [ImovelController::class,'index'])->name('imovel.list');
Route::get('/{id}/show', [ImovelController::class,'show'])->name('imovel.show');

Route::group(['prefix' => '/imovel', 'middleware' => 'auth'], function () {
    Route::get('/{user_id}/users', [ImovelController::class,'myImoveis'])->name('imovel.users');
    Route::get('/search', [ImovelController::class,'search'])->name('imovel.search');
  

    Route::get('/{id}/edit', [ImovelController::class,'edit'])->name('imovel.edit');
    Route::post('/{id}/update', [ImovelController::class,'update'])->name('imovel.update');
    Route::get('/create', [ImovelController::class,'create'])->name('imovel.create');
    Route::post('/post', [ImovelController::class,'store'])->name('imovel.store');
    Route::post('/{id}/destroy', [ImovelController::class,'destroy'])->name('imovel.destroy');
   
        Route::group(['prefix' => '/proprietario'], function () {
        Route::get('/', [ProprietarioController::class,'index'])->name('proprietario.index');
        Route::get('/{id}/edit', [ProprietarioController::class,'edit'])->name('proprietario.edit');
        Route::put('/{id}/update', [ProprietarioController::class,'update'])->name('proprietario.update');
        Route::get('/create', [ProprietarioController::class,'create'])->name('proprietario.create');
        Route::post('/post', [ProprietarioController::class,'store'])->name('proprietario.store');
        Route::post('/{id}/destroy', [ProprietarioController::class,'destroy'])->name('proprietario.destroy');
    });

    Route::group(['prefix' => '/itens'], function () {
        Route::get('/', [ItensController::class,'index'])->name('itens.index');
         Route::get('/{id}/edit', [ItensController::class,'edit'])->name('itens.edit');
        Route::post('/{id}/update', [ItensController::class,'update'])->name('itens.update');
        Route::get('/create', [ItensController::class,'create'])->name('itens.create');
        Route::post('/post', [ItensController::class,'store'])->name('itens.store');
        Route::post('/{id}/destroy', [ItensController::class,'destroy'])->name('itens.destroy');
    });
});

Route::middleware(['auth'])->get('/dashboard', [DashBoardController::class, 'index'])->name('dashboard');




    










<?php

use App\Events\PostCreated;
use App\Http\Controllers\DashBoardController;
use App\Http\Controllers\ImovelController;
use App\Http\Controllers\UserdataController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

Route::get('/categoria', [ImovelController::class,'categoria']);
Route::get('/listar', [ImovelController::class,'listarN']);
Route::get('/detalhes', [ImovelController::class,'detalhes']);


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
});



Route::group(['prefix' => '/dashboard', 'middleware' => 'auth'], function () {
    Route::get('/', [DashBoardController::class, 'index'])->name('dashboard');
});









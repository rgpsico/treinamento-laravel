<?php

use App\Events\PostCreated;
use App\Http\Controllers\ImovelController;
use App\Http\Controllers\UserdataController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;


Route::get('/login', [UserdataController::class,'login'])->name('user.login');
Route::post('/login', [UserdataController::class,'auth'])->name('user.auth');
Route::get('/register', [UserdataController::class,'register'])->name('user.create');;
Route::post('/store', [UserdataController::class,'store'])->name('user.store');;
Route::get('/logout', [UserdataController::class,'logout'])->name('logout');;



Route::get('/imovel/{user_id}/users', [ImovelController::class,'myImoveis'])->name('imovel.users');
Route::get('/imovel/search', [ImovelController::class,'search'])->name('imovel.search');
Route::get('/imovel/list', [ImovelController::class,'index'])->name('imovel.list');
Route::get('/imovel/{id}/show', [ImovelController::class,'show'])->name('imovel.show');
Route::get('/imovel/{id}/edit', [ImovelController::class,'edit'])->name('imovel.edit');
Route::post('/imovel/{id}/update', [ImovelController::class,'update'])->name('imovel.update');
Route::get('/imovel/create', [ImovelController::class,'create'])->name('imovel.create')->middleware('auth');;

Route::post('/imovel/post', [ImovelController::class,'store'])->name('imovel.store');

Route::post('/imovel/{id}/destroy', [ImovelController::class,'destroy'])->name('imovel.destroy');












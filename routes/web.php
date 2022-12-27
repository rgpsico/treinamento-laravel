<?php

use App\Events\PostCreated;
use App\Http\Controllers\UserdataController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;


Route::post('/login', [UserdataController::class,'login'])->name('professor.login');
Route::post('/register', [UserdataController::class,'register'])->name('professor.register');;


Route::get('/professor/list', [UserdataController::class,'index'])->name('professor.index');

Route::get('/professor/create', [UserdataController::class,'create'])->name('professor.create');

Route::get('/professor/profile', [UserdataController::class,'index'])->name('professor.show');

Route::get('/professor', [UserdataController::class,'index'])->name('professor.index');










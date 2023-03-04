<?php

use App\Events\PostCreated;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ConfiguracaoController;
use App\Http\Controllers\DashBoardController;
use App\Http\Controllers\ImovelController;
use App\Http\Controllers\ItensController;
use App\Http\Controllers\ListaEsperaController;
use App\Http\Controllers\PermissoesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProprietarioController;
use App\Http\Controllers\RedisController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UserdataController;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

Route::get('/teste', [CategoryController::class, 'teste'])->name('novo.teste');

Route::get('/imoveis', [ImovelController::class, 'listarN'])->name('novo.listar');
Route::get('/detalhes/{id}/show', [ImovelController::class, 'detalhes'])->name('detalhes');
Route::get('/', [ImovelController::class, 'categoria'])->name('novo.categoria');
Route::get('/home', [ImovelController::class, 'home'])->name('novo.home');


Route::group(['prefix' => '/admin'], function () {

    Route::group(['prefix' => '/categoria'], function () {
        Route::get('/', [CategoryController::class, 'index'])->name('category.index');
        Route::get('/{id}/show', [CategoryController::class, 'show'])->name('category.show');
        Route::get('/create', [CategoryController::class, 'create'])->name('category.create');
        Route::get('/{id}/edit', [CategoryController::class, 'edit'])->name('category.edit');
        Route::put('/{id}/update', [CategoryController::class, 'edit'])->name('category.update');
        Route::post('/post', [CategoryController::class, 'store'])->name('category.store');
        Route::post('/{id}/destroy', [CategoryController::class, 'destroy'])->name('category.destroy');
    });


    Route::group(['prefix' => '/users'], function () {
        Route::get('/', [UserdataController::class, 'index'])->name('users.index');
        Route::post('/profileUpdate', [UserdataController::class, 'profileUpdate'])->name('users.profileUpdate');
    });


    Route::group(['prefix' => '/profile'], function () {
        Route::get('/', [ProfileController::class, 'index'])->name('profile.index');
        Route::get('/create', [ProfileController::class, 'create'])->name('profile.create');
        Route::get('/{id}/edit', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::get('/{id}/addPermissoes', [ProfileController::class, 'addPermissoes'])->name('profile.addPermissoes');
        Route::post('/store', [ProfileController::class, 'store'])->name('profile.store');
        Route::post('/{id}/update', [ProfileController::class, 'update'])->name('profile.update');
        Route::post('/addProfileAndPermissao', [ProfileController::class, 'addProfileAndPermissao'])->name('profile.addProfileAndPermissao');
    });


    Route::group(['prefix' => '/espera'], function () {
        Route::get('/', [ListaEsperaController::class, 'index'])->name('espera.index');
        Route::get('/create', [ListaEsperaController::class, 'create'])->name('espera.create');
        Route::get('/{id}/edit', [ListaEsperaController::class, 'edit'])->name('espera.edit');
        Route::post('/store', [ListaEsperaController::class, 'store'])->name('espera.store');
        Route::post('/{id}/update', [ListaEsperaController::class, 'update'])->name('espera.update');
        Route::delete('/{id}/destroy', [ListaEsperaController::class, 'destroy'])->name('espera.destroy');
    });


    Route::group(['prefix' => '/permissoes'], function () {
        Route::get('/', [PermissoesController::class, 'index'])->name('permissoes.index');
        Route::get('/create', [PermissoesController::class, 'create'])->name('permissoes.create');
        Route::get('/{id}/edit', [PermissoesController::class, 'edit'])->name('permissoes.edit');
        Route::post('/store', [PermissoesController::class, 'store'])->name('permissoes.store');
        Route::post('/{id}/update', [PermissoesController::class, 'update'])->name('permissoes.update');
    });
});

Route::get('/login', [UserdataController::class, 'login'])->name('user.login');
Route::post('/login', [UserdataController::class, 'auth'])->name('user.auth');
Route::get('/register', [UserdataController::class, 'register'])->name('user.create');;
Route::post('/store', [UserdataController::class, 'store'])->name('user.store');;
Route::get('/logout', [UserdataController::class, 'logout'])->name('logout');;


Route::get('/list', [ImovelController::class, 'index'])->name('imovel.list');
Route::get('/{id}/show', [ImovelController::class, 'show'])->name('imovel.show');

Route::group(['prefix' => '/imovel', 'middleware' => 'auth'], function () {
    Route::get('/{user_id}/users', [ImovelController::class, 'myImoveis'])->name('imovel.users');
    Route::get('/search', [ImovelController::class, 'search'])->name('imovel.search');


    Route::get('/{id}/edit', [ImovelController::class, 'edit'])->name('imovel.edit');
    Route::post('/{id}/update', [ImovelController::class, 'update'])->name('imovel.update');
    Route::get('/create', [ImovelController::class, 'create'])->name('imovel.create');
    Route::post('/post', [ImovelController::class, 'store'])->name('imovel.store');
    Route::post('/{id}/destroy', [ImovelController::class, 'destroy'])->name('imovel.destroy');

    Route::group(['prefix' => '/proprietario'], function () {
        Route::get('/', [ProprietarioController::class, 'index'])->name('proprietario.index');
        Route::get('/{id}/edit', [ProprietarioController::class, 'edit'])->name('proprietario.edit');
        Route::put('/{id}/update', [ProprietarioController::class, 'update'])->name('proprietario.update');
        Route::get('/create', [ProprietarioController::class, 'create'])->name('proprietario.create');
        Route::post('/post', [ProprietarioController::class, 'store'])->name('proprietario.store');
        Route::post('/{id}/destroy', [ProprietarioController::class, 'destroy'])->name('proprietario.destroy');
    });






    Route::group(['prefix' => '/itens'], function () {
        Route::get('/', [ItensController::class, 'index'])->name('itens.index');
        Route::get('/{id}/edit', [ItensController::class, 'edit'])->name('itens.edit');
        Route::post('/{id}/update', [ItensController::class, 'update'])->name('itens.update');
        Route::get('/create', [ItensController::class, 'create'])->name('itens.create');
        Route::post('/post', [ItensController::class, 'store'])->name('itens.store');
        Route::post('/{id}/destroy', [ItensController::class, 'destroy'])->name('itens.destroy');
    });
});

Route::middleware(['auth'])->get('/dashboard', [DashBoardController::class, 'index'])->name('dashboard');


Route::get('/redis', [RedisController::class, 'index']);

Route::get('/treino', [SiteController::class, 'index']);

Route::get('/create-posts', function () {
    $user = User::first();
    $post = $user->posts()->create([
        'title' => Str::random('150'),
        'body' => Str::random('100')
    ]);

    event(new PostCreated($post));

    return 'ok';
});

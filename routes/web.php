<?php

use App\Events\PostCreated;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ComercioController;
use App\Http\Controllers\ConfiguracaoController;
use App\Http\Controllers\DashBoardController;
use App\Http\Controllers\DepoimentoController;
use App\Http\Controllers\EntregadoresController;
use App\Http\Controllers\ImovelController;
use App\Http\Controllers\ItensController;
use App\Http\Controllers\ListaEsperaController;
use App\Http\Controllers\LogsController;
use App\Http\Controllers\PermissoesController;
use App\Http\Controllers\PermissoesCategoriaController;
use App\Http\Controllers\ProprietarioController;
use App\Http\Controllers\RedisController;
use App\Http\Controllers\RegrasController;
use App\Http\Controllers\SaloesController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UserdataController;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

Route::get('/teste', [UserdataController::class, 'teste'])->name('novo.teste');

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


    Route::group(['prefix' => '/depoimento'], function () {
        Route::get('/', [DepoimentoController::class, 'index'])->name('depoimento.index');
        Route::get('/{id}/show', [DepoimentoController::class, 'show'])->name('depoimento.show');
        Route::get('/create', [DepoimentoController::class, 'create'])->name('depoimento.create');
        Route::get('/{id}/edit', [DepoimentoController::class, 'edit'])->name('depoimento.edit');
        Route::put('/{id}/update', [DepoimentoController::class, 'edit'])->name('depoimento.update');
        Route::post('/post', [DepoimentoController::class, 'store'])->name('depoimento.store');
        Route::post('/{id}/destroy', [DepoimentoController::class, 'destroy'])->name('depoimento.destroy');
    });


    Route::group(['prefix' => '/log'], function () {
        Route::get('/', [LogsController::class, 'index'])->name('log.index');
        Route::get('/{id}/show', [LogsController::class, 'show'])->name('log.show');
        Route::get('/create', [LogsController::class, 'create'])->name('log.create');
        Route::get('/{id}/edit', [LogsController::class, 'edit'])->name('log.edit');
        Route::put('/{id}/update', [LogsController::class, 'edit'])->name('log.update');
        Route::post('/post', [LogsController::class, 'store'])->name('log.store');
        Route::post('/{id}/destroy', [LogsController::class, 'destroy'])->name('log.destroy');
    });


    Route::group(['prefix' => '/users'], function () {
        Route::get('/', [UserdataController::class, 'index'])->name('users.index');
        Route::get('/{id}/show', [UserdataController::class, 'show'])->name('users.show');
        Route::get('/create', [UserdataController::class, 'create'])->name('users.create');
        Route::get('/{id}/edit', [UserdataController::class, 'edit'])->name('users.edit');
        Route::post('/{id}/update', [UserdataController::class, 'update'])->name('users.update');
        Route::delete('/{id}/destroy', [UserdataController::class, 'edit'])->name('users.destroy');
        Route::post('/addPermisssao', [UserdataController::class, 'addPermissao'])->name('users.addPermissao');
    });








    Route::group(['prefix' => '/permissoesCategoria'], function () {
        Route::get('/', [PermissoesCategoriaController::class, 'index'])->name('permissoes_categoria.index');
        Route::post('/store', [PermissoesCategoriaController::class, 'store'])->name('permissoes_categoria.store');
        Route::get('/create', [PermissoesCategoriaController::class, 'create'])->name('permissoes_categoria.create');
        Route::get('/{id}/edit', [PermissoesCategoriaController::class, 'edit'])->name('permissoes_categoria.edit');
        Route::delete('/{id}/destroy', [PermissoesCategoriaController::class, 'destroy'])->name('permissoes_categoria.destroy');
        Route::post('/{id}/update', [PermissoesCategoriaController::class, 'update'])->name('permissoes_categoria.update');
    });


    Route::group(['prefix' => '/espera'], function () {
        Route::get('/', [ListaEsperaController::class, 'index'])->name('espera.index');
        Route::get('/create', [ListaEsperaController::class, 'create'])->name('espera.create');
        Route::get('/{id}/edit', [ListaEsperaController::class, 'edit'])->name('espera.edit');
        Route::post('/store', [ListaEsperaController::class, 'store'])->name('espera.store');
        Route::post('/{id}/update', [ListaEsperaController::class, 'update'])->name('espera.update');
        Route::any('/{id}/destroy', [ListaEsperaController::class, 'destroy'])->name('espera.destroy');
    });


    Route::group(['prefix' => '/permissoes'], function () {
        Route::get('/', [PermissoesController::class, 'index'])->name('permissoes.index');
        Route::get('/create', [PermissoesController::class, 'create'])->name('permissoes.create');
        Route::get('/{id}/edit', [PermissoesController::class, 'edit'])->name('permissoes.edit');
        Route::post('/store', [PermissoesController::class, 'store'])->name('permissoes.store');
        Route::post('/{id}/update', [PermissoesController::class, 'update'])->name('permissoes.update');
        Route::delete('/{id}/destroy', [PermissoesController::class, 'destroy'])->name('permissoes.destroy');
    });
});

Route::get('/login', [UserdataController::class, 'login'])->name('user.login');
Route::post('/login', [UserdataController::class, 'auth'])->name('user.auth');
Route::get('/register', [UserdataController::class, 'register'])->name('user.create');;
Route::post('/store', [UserdataController::class, 'store'])->name('user.store');;
Route::get('/logout', [UserdataController::class, 'logout'])->name('logout');;


Route::get('/list', [ImovelController::class, 'index'])->name('imovel.list');

Route::group(['prefix' => '/imovel', 'middleware' => 'auth'], function () {
    Route::get('/{user_id}/myimoveis', [ImovelController::class, 'myImoveis'])->name('imovel.users');
    Route::get('/search', [ImovelController::class, 'search'])->name('imovel.search');
    Route::get('/{id}/show', [ImovelController::class, 'show'])->name('imovel.show');
    Route::get('/all', [ImovelController::class, 'all'])->name('imovel.all');



    Route::get('/{id}/edit', [ImovelController::class, 'edit'])->name('imovel.edit');
    Route::post('/{id}/update', [ImovelController::class, 'update'])->name('imovel.update');
    Route::get('/create', [ImovelController::class, 'create'])->name('imovel.create');
    Route::post('/post', [ImovelController::class, 'store'])->name('imovel.store');
    Route::delete('/{id}/destroy', [ImovelController::class, 'destroy'])->name('imovel.destroy');

    Route::group(['prefix' => '/proprietario'], function () {
        Route::get('/', [ProprietarioController::class, 'index'])->name('proprietario.index');
        Route::get('/{id}/edit', [ProprietarioController::class, 'edit'])->name('proprietario.edit');
        Route::put('/{id}/update', [ProprietarioController::class, 'update'])->name('proprietario.update');
        Route::get('/create', [ProprietarioController::class, 'create'])->name('proprietario.create');
        Route::post('/post', [ProprietarioController::class, 'store'])->name('proprietario.store');
        Route::delete('/{id}/destroy', [ProprietarioController::class, 'destroy'])->name('proprietario.destroy');
        Route::post('/{id}/show', [ProprietarioController::class, 'destroy'])->name('proprietario.show');
    });






    Route::group(['prefix' => '/itens'], function () {
        Route::get('/', [ItensController::class, 'index'])->name('itens.index');
        Route::get('/{id}/edit', [ItensController::class, 'edit'])->name('itens.edit');
        Route::put('/{id}/update', [ItensController::class, 'update'])->name('itens.update');
        Route::get('/create', [ItensController::class, 'create'])->name('itens.create');
        Route::post('/post', [ItensController::class, 'store'])->name('itens.store');
        Route::delete('/{id}/destroy', [ItensController::class, 'destroy'])->name('itens.destroy');
    });

    Route::group(['prefix' => '/regras'], function () {
        Route::get('/', [RegrasController::class, 'index'])->name('regras.index');
        Route::get('/{id}/edit', [RegrasController::class, 'edit'])->name('regras.edit');
        Route::put('/{id}/update', [RegrasController::class, 'update'])->name('regras.update');
        Route::get('/create', [RegrasController::class, 'create'])->name('regras.create');
        Route::post('/post', [RegrasController::class, 'store'])->name('regras.store');
        Route::delete('/{id}/destroy', [RegrasController::class, 'destroy'])->name('regras.destroy');
    });
});


Route::group(['prefix' => '/comercio'], function () {
    Route::get('/', [ComercioController::class, 'index'])->name('comercio.index');
    Route::get('/{id}/edit', [ComercioController::class, 'edit'])->name('comercio.edit');
    Route::put('/{id}/update', [ComercioController::class, 'update'])->name('comercio.update');
    Route::get('/create', [ComercioController::class, 'create'])->name('comercio.create');
    Route::get('/registerHome', [ComercioController::class, 'registerHome'])->name('comercio.registerHome');
    Route::post('/post', [ComercioController::class, 'store'])->name('comercio.store');
    Route::delete('/{id}/destroy', [ComercioController::class, 'destroy'])->name('comercio.destroy');
});

Route::group(['prefix' => '/saloes'], function () {
    Route::get('/', [SaloesController::class, 'index'])->name('saloes.index');
    Route::get('/{id}/edit', [SaloesController::class, 'edit'])->name('saloes.edit');
    Route::put('/{id}/update', [SaloesController::class, 'update'])->name('saloes.update');
    Route::get('/create', [SaloesController::class, 'create'])->name('saloes.create');
    Route::post('/post', [SaloesController::class, 'store'])->name('saloes.store');
    Route::delete('/{id}/destroy', [SaloesController::class, 'destroy'])->name('saloes.destroy');
});

Route::group(['prefix' => '/entregadores'], function () {
    Route::get('/', [EntregadoresController::class, 'index'])->name('entregadores.index');
    Route::get('/{id}/edit', [EntregadoresController::class, 'edit'])->name('entregadores.edit');
    Route::put('/{id}/update', [EntregadoresController::class, 'update'])->name('entregadores.update');
    Route::get('/registerHome', [EntregadoresController::class, 'registerHome'])->name('entregadores.registerHome');
    Route::get('/create', [EntregadoresController::class, 'create'])->name('entregadores.create');
    Route::post('/post', [EntregadoresController::class, 'store'])->name('entregadores.store');
    Route::delete('/{id}/destroy', [EntregadoresController::class, 'destroy'])->name('entregadores.destroy');
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

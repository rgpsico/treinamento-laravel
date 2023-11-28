<?php

use App\Http\Controllers\Api\ComercioApiController;
use App\Http\Controllers\Api\ImovelApicontroller;
use App\Http\Controllers\Api\UserApiController;
use App\Http\Controllers\Api\EntregadoresApiController;
use App\Http\Controllers\Api\ProfissaoApiController;
use App\Http\Controllers\Api\ProfissionaisApiController;
use App\Http\Controllers\ImageApiController;
use App\Http\Controllers\ItensController;
use App\Http\Controllers\ListaEsperaController;
use App\Http\Controllers\ProprietarioController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\TreinoController;
use App\Http\Controllers\UserdataController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::apiResource('acl', UserApiController::class);


Route::get('/treinoStripeAll', [StripeController::class, 'all'])->name('stripe.all');

Route::post('/treinoStripe', [StripeController::class, 'treinoStripe'])->name('stripe.treinoStripe');

Route::post('/pagamento', [StripeController::class, 'pagamento'])->name('stripe.pagamento');

Route::post('/auth', [UserdataController::class, 'authApi']);

Route::post('/register', [UserdataController::class, 'store']);

Route::post('/cadastrar-profissao', [ProfissionaisApiController::class, 'storeProfissao']);


Route::delete('/propietario/{id}/delete', [ProprietarioController::class, 'delete']);


Route::group(['prefix' => '/profissao'], function () {
    Route::post('/store', [ProfissaoApiController::class, 'storeProfissao'])->name('profissao.store');;
    Route::put('/{id}', [ProfissaoApiController::class, 'update'])->name('profissao.update');;
    Route::delete('/{id}', [ProfissaoApiController::class, 'delete'])->name('profissao.delete');
});


Route::group(['prefix' => '/users'], function () {
    Route::post('/post', [UserApiController::class, 'store']);
    Route::put('/{id}/update', [UserApiController::class, 'update']);
    Route::put('/{id}/updateAdmin', [UserApiController::class, 'updateAdmin']);
});


Route::group(['prefix' => '/itens'], function () {
    Route::post('/store', [ItensController::class, 'store']);
    Route::delete('/{id}/delete', [ItensController::class, 'delete']);
});

Route::group(['prefix' => '/gpt'], function () {
    Route::post('/', [TreinoController::class, 'gpt']);
});

Route::post('/upload-imagem', [UserApiController::class, 'upload'])->name('user.upload');


Route::group(['prefix' => '/imovel'], function () {
    Route::get('/search', [ImovelApicontroller::class, 'search']);
    Route::get('/', [ImovelApicontroller::class, 'index']);
    Route::post('/store', [ImovelApicontroller::class, 'store']);
    Route::get('/{id}/delete', [ImovelApicontroller::class, 'delete']);
    Route::put('/{id}/update', [ImovelApicontroller::class, 'update']);
    Route::post('/delete-selected', [ImovelApicontroller::class, 'deleteSelected'])->name('delete-selected');
});


Route::group(['prefix' => '/galeria'], function () {
    Route::delete('/{id}/delete', [ImageApiController::class, 'delete']);
});

Route::group(['prefix' => '/profissionalImage'], function () {
    Route::delete('/{id}/delete', [ProfissionaisApiController::class, 'delete']);
});



Route::group(['prefix' => '/listaEspera'], function () {
    Route::get('/all', [ListaEsperaController::class, 'get']);
    Route::post('/store', [ListaEsperaController::class, 'storeApi'])->name('lista.esperaApi');
    Route::delete('/{id}/delete', [ListaEsperaController::class, 'delete']);
});


Route::group(['prefix' => '/entregadores'], function () {
    Route::put('/{id}/update', [EntregadoresApiController::class, 'updateEntregador']);
    Route::put('/{id}/updatestatus', [EntregadoresApiController::class, 'updateStatus']);
});


Route::group(['prefix' => '/comercio'], function () {
    Route::put('/{id}/update', [ComercioApiController::class, 'updateEntregador']);
    Route::put('/{id}/updatestatus', [ComercioApiController::class, 'updateStatus']);
});

Route::get('/teste', function () {
    exec('"C:\Program Files\Google\Chrome\Application\chrome.exe" "https://www.google.com"');

    return true;
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

<?php

namespace App\Modulos\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class MeuModuloServiceProvider extends ServiceProvider
{
    protected $url_dir = "../app/Modulos/Entregadores/routes";


    public function boot()
    {

        // Route::namespace('App\Modulos\Entregadores\Http\Controllers')
        //     ->group($this->url_dir . '/web.php');

        $this->loadViewsFrom($this->url_dir . '/../resources/views', 'entregadores');

        $this->publishes([
            $this->url_dir . '/../resources/views' => base_path('resources/views/vendor/entregadores'),
        ], 'views');
    }
}

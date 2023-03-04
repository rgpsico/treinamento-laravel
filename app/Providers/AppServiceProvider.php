<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider;

class AppServiceProvider extends AuthServiceProvider
{

    protected $policies = [
        // Aqui você pode definir as políticas para seus modelos
    ];

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();


        Gate::define('ver-itens', function ($user) {
            if ($user->UserProfile  === null) {
                return false;
            }

            $permissoes = $user->UserProfile->flatMap(function ($perfil) {
                return $perfil->permissoes->pluck('nome');
            });

            return $permissoes->contains('ver-itens');
        });
    }
}

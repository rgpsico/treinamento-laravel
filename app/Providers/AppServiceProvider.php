<?php

namespace App\Providers;

use App\Models\ProfilePermissoes;
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
            if (!$user->profile) {
                return false;
            }
            $id_profile = $user->profile->profile_id;

            $todasAsPermissoes = ProfilePermissoes::where('profile_id', $id_profile)->get();

            foreach ($todasAsPermissoes as $value) {
                foreach ($value->permissoes as $permissoes) {
                    if ($permissoes->name == 'ver-itens') {
                        return true;
                    }
                }
            }
        });
    }
}

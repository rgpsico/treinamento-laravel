<?php

namespace App\Providers;

use App\Models\Permissoes;
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

        $permissoes = Permissoes::all();

        foreach ($permissoes as $permissao) {
            Gate::define($permissao->name, function ($user) use ($permissao) {
                return $user->temPermissao($permissao->name);
            });
        }
    }
}

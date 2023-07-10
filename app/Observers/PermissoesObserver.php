<?php

namespace App\Observers;

use App\Models\Permissoes;
use Illuminate\Support\Facades\Cache;


class PermissoesObserver
{
    /**
     * Listen to the Permissoes created event.
     *
     * @param  Permissoes  $permissao
     * @return void
     */
    public function created(Permissoes $permissao)
    {
        Cache::forget('permissoes');
    }

    /**
     * Listen to the Permissoes updated event.
     *
     * @param  Permissoes  $permissao
     * @return void
     */
    public function updated(Permissoes $permissao)
    {
        Cache::forget('permissoes');
    }

    /**
     * Listen to the Permissoes deleting event.
     *
     * @param  Permissoes  $permissao
     * @return void
     */
    public function deleted(Permissoes $permissao)
    {
        Cache::forget('permissoes');
    }
}

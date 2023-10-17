<?php

namespace App\View\Components;

use App\Models\UserTipo;
use Illuminate\View\Component;

class SelectTipoProfissional extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $tipos = UserTipo::all();
        return view('components.select-tipo-profissional', ['tipos' => $tipos]);
    }
}

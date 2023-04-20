<?php

namespace App\View\Components;

use Illuminate\View\Component;

class listComponent extends Component
{
    public $model;
    public $route;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($model, $route)
    {
        $this->model = $model;
        $this->route = $route;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.list-component');
    }
}

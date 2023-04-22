<?php

namespace App\View\Components;

use Illuminate\View\Component;

class listComponent extends Component
{
    public $model;
    public $routeUrl;
    public $pasta;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($model, $routeUrl = null, $pasta)
    {
        $this->model = $model;
        $this->routeUrl = $routeUrl;
        $this->pasta = $pasta;
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

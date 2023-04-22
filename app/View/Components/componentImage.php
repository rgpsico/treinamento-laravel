<?php

namespace App\View\Components;

use Illuminate\View\Component;

class componentImage extends Component
{
    public $pasta;
    public $image;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($pasta, $image)
    {
        $this->pasta = $pasta;
        $this->image = $image;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.component-image');
    }
}

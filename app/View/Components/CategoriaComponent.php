<?php

namespace App\View\Components;

use App\Models\Category;
use Illuminate\View\Component;

class CategoriaComponent extends Component
{
    public $category;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $catCompo =  $this->category->all();

        return view('components.categoria-component', compact('catCompo'));
    }
}

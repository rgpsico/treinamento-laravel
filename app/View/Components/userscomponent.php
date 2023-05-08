<?php

namespace App\View\Components;

use App\Models\User;
use Illuminate\View\Component;

class userscomponent extends Component
{

    public $col;
    public $typeValue;
    public $users;


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($col = '4', $typeValue = 'name')
    {
        $this->col = $col;
        $this->typeValue = $typeValue;
        $this->users = User::all();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.userscomponent', [
            'users' => $this->users,
            'col' => $this->col,
            'typeValue' => $this->typeValue
        ]);
    }
}

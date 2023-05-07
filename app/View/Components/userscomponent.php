<?php

namespace App\View\Components;

use App\Models\User;
use Illuminate\View\Component;

class userscomponent extends Component
{
    protected $users;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->users = $user;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $users = $this->users->all(['id', 'name']);
        return view('components.userscomponent', compact('users'));
    }
}

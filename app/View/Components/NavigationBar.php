<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class NavigationBar extends Component
{
    public bool $isLoggedIn;
    /**
     * Create a new component instance.
     */
    public function __construct(bool $isLoggedIn)
    {
        $this->isLoggedIn = $isLoggedIn;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.navigation-bar');
    }
}

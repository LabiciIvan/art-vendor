<?php

namespace App\View\Components;

use App\Models\Item as ModelsItem;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Item extends Component
{
    public $item;

    /**
     * Create a new component instance.
     */
    public function __construct(ModelsItem $item)
    {
        $this->item = $item;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.item');
    }
}

<?php

namespace App\View\Components\setup-place\step-3;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class set-price extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.setup-place.step-3.set-price');
    }
}

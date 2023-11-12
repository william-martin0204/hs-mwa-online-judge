<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InOutArea extends Component
{
    public string $title;
    public string $value;
    /**
     * Create a new component instance.
     */
    public function __construct(string $title, string $value)
    {
        $this->title = $title;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.in-out-area');
    }
}

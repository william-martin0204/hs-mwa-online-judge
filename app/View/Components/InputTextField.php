<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InputTextField extends Component
{
    public string $name;
    public string $label;
    public null|string $value;

    /**
     * Create a new component instance.
     */
    public function __construct(string $name, string $label, string $value = null)
    {
        $this->name = $name;
        $this->label = $label;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.input-text-field');
    }
}

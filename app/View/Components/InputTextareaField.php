<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InputTextareaField extends Component
{
    public string $name;
    public string $label;
    public string $value;

    /**
     * Create a new component instance.
     */
    public function __construct(string $name, string $label, string $value = '')
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
        return view('components.input-textarea-field');
    }
}

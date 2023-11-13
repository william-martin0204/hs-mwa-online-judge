<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InputTextField extends Component
{
    public string $name;

    public string $label;

    public ?string $value;

    public string $type;

    /**
     * Create a new component instance.
     */
    public function __construct(string $name, string $label, string $value = null, string $type = 'text')
    {
        $this->name = $name;
        $this->label = $label;
        $this->value = $value;
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.input-text-field');
    }
}

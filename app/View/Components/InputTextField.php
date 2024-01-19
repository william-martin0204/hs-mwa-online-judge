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

    public string $placeholder;

    public bool $isLivewire;

    /**
     * Create a new component instance.
     */
    public function __construct(string $name, string $label = '', string $value = null, string $type = 'text', string $placeholder = '', bool $isLivewire = false)
    {
        $this->name = $name;
        $this->label = $label;
        $this->value = $value;
        $this->type = $type;
        $this->placeholder = $placeholder;
        $this->isLivewire = $isLivewire;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.input-text-field');
    }
}

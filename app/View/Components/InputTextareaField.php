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

    public string $placeholder;

    public bool $isLivewire;

    public string $rows;

    /**
     * Create a new component instance.
     */
    public function __construct(string $name, string $label = '', string $value = '', string $placeholder = '', bool $isLivewire = false, string $rows = '10')
    {
        $this->name = $name;
        $this->label = $label;
        $this->value = $value;
        $this->placeholder = $placeholder;
        $this->rows = $rows;
        $this->isLivewire = $isLivewire;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.input-textarea-field');
    }
}

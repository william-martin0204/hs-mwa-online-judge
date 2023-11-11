<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TagSticker extends Component
{
    public string $index;
    public string $name;

    /**
     * Create a new component instance.
     */
    public function __construct(string $index, string $name)
    {
        $this->index = $index;
        $this->name = $name;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.tag-sticker');
    }
}

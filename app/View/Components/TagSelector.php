<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TagSelector extends Component
{
    public $tags;

    public $currenttags;

    /**
     * Create a new component instance.
     */
    public function __construct($tags, $currenttags = null)
    {
        $this->tags = $tags;
        $this->currenttags = $currenttags == null ? [] : $currenttags->pluck('id')->toArray();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.tag-selector');
    }
}

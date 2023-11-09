<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SiteLayoutNavbarMobile extends Component
{

    public array $menu_items;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->menu_items = [
            ['label' => 'Welcome', 'route' => 'welcome.index'],
            ['label' => 'Problems', 'route' => 'problems.index'],
            ['label' => 'Submissions', 'route' => 'submissions.index'],
            // ['label' => 'My Account', 'route' => null],
            // ['label' => 'Sign Out', 'route' => null],
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.site-layout-navbar-mobile');
    }
}

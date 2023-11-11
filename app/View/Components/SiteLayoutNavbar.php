<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SiteLayoutNavbar extends Component
{
    public array $menu_items;

    /**
     * Create a new component instance.
     */
    public function __construct(bool $mobile = false)
    {
        $this->menu_items = [
            ['label' => 'Welcome', 'route' => 'welcome.index'],
            ['label' => 'Problems', 'route' => 'problems.index'],
            ['label' => 'Leaderboard', 'route' => 'leaderboard.index'],
            ['label' => 'Submissions', 'route' => 'submissions.index'],
            ['label' => 'Tags', 'route' => 'tags.index'],
        ];

        // if ($mobile) {
        //     $this->menu_items[] = ['label' => 'My Account', 'route' => null];
        //     $this->menu_items[] = ['label' => 'Sign Out', 'route' => null];
        // }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.site-layout-navbar');
    }
}

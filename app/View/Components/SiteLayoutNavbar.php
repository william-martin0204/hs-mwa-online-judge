<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SiteLayoutNavbar extends Component
{
    public bool $mobile;

    public array $menu_items;

    /**
     * Create a new component instance.
     */
    public function __construct(bool $mobile = false)
    {
        $this->mobile = $mobile;
        $this->menu_items = [
            ['label' => 'Welcome', 'route' => 'welcome.index'],
            ['label' => 'Problems', 'route' => 'problems.index'],
            ['label' => 'Leaderboard', 'route' => 'profile.index'],
            ['label' => 'Submissions', 'route' => 'submissions.index'],
            ['label' => 'Tags', 'route' => 'tags.index'],
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.site-layout-navbar');
    }
}

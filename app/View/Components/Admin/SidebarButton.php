<?php

namespace App\View\Components\Admin;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SidebarButton extends Component
{
    public string $route;

    public string $type;

    public string $icon;

    public string $label;

    /**
     * Create a new component instance.
     */
    public function __construct($route = 'admin.dashboard', $type = 'solid', $icon = 'code', $label = 'admin.dashboard.sidebar.buttons.default_label')
    {
        $this->route = $route;
        $this->type = $type;
        $this->icon = $icon;
        $this->label = $label;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('admin.components.buttons.sidebar-button');
    }
}

<?php

namespace App\View\Components\Admin\Widgets;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DataCard extends Component
{
    public ?string $title;
    public ?string $value;
    public ?string $text;
    public ?string $percentageChange;
    public ?string $iconClass;
    public ?string $iconColor;

    /**
     * Create a new component instance.
     */
    public function __construct(
        ?string $title = null,
        ?string $value = null,
        ?string $text = null,
        ?string $percentageChange = s,
        ?string $iconClass = null,
        ?string $iconColor = null
    )
    {
        $this->title = $title;
        $this->value = $value;
        $this->text = $text;
        $this->percentageChange = $percentageChange;
        $this->iconClass = $iconClass;
        $this->iconColor = $iconColor;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('admin.components.widgets.datacard');
    }
}

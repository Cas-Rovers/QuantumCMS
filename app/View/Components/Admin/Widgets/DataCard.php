<?php

    namespace App\View\Components\Admin\Widgets;

    use Closure;
    use Illuminate\Contracts\View\View;
    use Illuminate\View\Component;

    class DataCard extends Component
    {
        public ?string $dataCardType;

        public ?string $title;

        public ?string $cardData;

        public ?string $cardSubData;

        public ?string $faIcons;

        public ?string $iconPath;

        public ?string $color;

        /**
         * Create a new component instance.
         */
        public function __construct(
            ?string $dataCardType = null,
            ?string $title = null,
            ?string $cardData = null,
            ?string $cardSubData = null,
            ?string $faIcons = null,
            ?string $iconPath = null,
            ?string $color = null
        ) {
            $this->dataCardType = $dataCardType;
            $this->title = $title;
            $this->cardData = $cardData;
            $this->cardSubData = $cardSubData;
            $this->faIcons = $faIcons;
            $this->iconPath = $iconPath;
            $this->color = $color;
        }

        /**
         * Get the view / contents that represent the component.
         */
        public function render(): View|Closure|string
        {
            return view('admin.components.widgets.datacard');
        }
    }

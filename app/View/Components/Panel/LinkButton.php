<?php

namespace App\View\Components\Panel;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class LinkButton extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $linkTo
    )
    {
        $this->linkTo = 'panel.'.$linkTo;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.panel.link-button');
    }
}

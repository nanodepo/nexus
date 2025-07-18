<?php

namespace NanoDepo\Nexus\Views\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Button extends Component
{
    public function __construct(
        public string $variant = 'filled',
        public string $color = 'primary',
        public ?string $before = null,
        public ?string $after = null,
        public ?string $href = null,
        public bool $disabled = false,
    ) {}

    public function render(): View
    {
        if ($this->href) {
            return view('ui::components.link');
        } else {
            return view('ui::components.button');
        }
    }
}

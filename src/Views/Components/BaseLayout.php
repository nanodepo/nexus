<?php

namespace NanoDepo\GemsUI\Views\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BaseLayout extends Component
{
    public function render(): View
    {
        return view('ui::layouts.base');
    }
}

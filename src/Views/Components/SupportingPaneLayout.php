<?php

namespace NanoDepo\GemsUI\Views\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SupportingPaneLayout extends Component
{
    public function render(): View
    {
        return view('ui::layouts.supporting-pane');
    }
}

<?php

namespace NanoDepo\GemsUI\Views\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ListDetailLayout extends Component
{
    public function __construct(public bool $visibleList = false) {}

    public function render(): View
    {
        return view('ui::layouts.list-detail');
    }
}

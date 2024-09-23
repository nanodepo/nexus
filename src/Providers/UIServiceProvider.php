<?php

namespace NanoDepo\GemsUI\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Livewire\Volt\Volt;

class UIServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'ui');
        Blade::componentNamespace('NanoDepo\\GemsUI\\Views\\Components', 'ui');
        Volt::mount([
            __DIR__.'/../resources/views/components/volt'
        ]);
    }
}
<?php

namespace NanoDepo\GemsUI\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Livewire\Volt\Volt;

class UIServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/thumbnail.php', 'thumbnail');
    }

    public function boot(): void
    {
        $this->publishes([
            __DIR__.'/../config/thumbnail.php' => config_path('thumbnail.php'),
            __DIR__.'/../resources/css/uikit.css' => resource_path('css/uikit.css'),
        ], 'gems-ui');

        $this->loadRoutesFrom(__DIR__.'/../routes.php');

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'ui');
        Blade::componentNamespace('NanoDepo\\GemsUI\\Views\\Components', 'ui');
        Volt::mount([
            __DIR__.'/../resources/views/components/volt'
        ]);
    }
}

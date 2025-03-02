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
        $this->mergeConfigFrom(__DIR__.'/../config/theme.php', 'theme');
    }

    public function boot(): void
    {
        $this->publishes([
            __DIR__.'/../config/thumbnail.php' => config_path('thumbnail.php'),
            __DIR__.'/../config/theme.php' => config_path('theme.php'),
        ], 'gems-ui');

        $this->loadRoutesFrom(__DIR__.'/../routes.php');

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'ui');
        Blade::componentNamespace('NanoDepo\\GemsUI\\Views\\Components', 'ui');
        Volt::mount([
            __DIR__.'/../resources/views/components/volt'
        ]);
    }
}

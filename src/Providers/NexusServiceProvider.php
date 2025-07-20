<?php

namespace NanoDepo\Nexus\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Livewire\Volt\Volt;

class NexusServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/nexus.php', 'nexus');
    }

    public function boot(): void
    {
        $this->publishes([
            __DIR__.'/../config/nexus.php' => config_path('nexus.php'),
        ], 'nexus');

        $this->loadRoutesFrom(__DIR__.'/../routes.php');

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'ui');
        Blade::componentNamespace('NanoDepo\\Nexus\\Views\\Components', 'ui');
        Volt::mount([
            __DIR__.'/../resources/views/components/volt'
        ]);
    }
}

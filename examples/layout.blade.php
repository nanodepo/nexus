<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" @class(['dark' => !auth()->user()?->dark_mode])>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500&display=swap" rel="stylesheet" />

    @stack('styles')

    <!-- Alpine Plugins -->
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/anchor@3.x.x/dist/cdn.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/collapse@3.x.x/dist/cdn.min.js"></script>

    <!-- Scripts -->
    @vite([
        'resources/css/app.css',
        'resources/css/gems-ui.css',
        'resources/js/app.js'
    ])

    <!-- Styles -->
    @livewireStyles
</head>
<body
    x-data="{ drawer: @js(auth()->user()->drawer), helper: false }"
    x-on:toggle-helper="helper = !helper"
    x-on:toggle-drawer="drawer = !drawer"
    class="flex flex-col h-screen select-none text-light-on-surface dark:text-dark-on-surface bg-light-background dark:bg-dark-background font-sans antialiased overflow-y-auto overflow-x-hidden"
>

<div class="flex flex-row items-center justify-between flex-none h-16 px-6">
    <div class="flex flex-row items-center">
        <div x-on:click="$dispatch('toggle-drawer')" class="flex flex-col items-center justify-center flex-none cursor-pointer">
            <div class="flex items-center justify-center w-12 h-12 text-light-on-surface-variant dark:text-dark-on-surface-variant rounded-full">
                <x-icon::bars-3 type="solid" class="w-7 h-7" />
            </div>
        </div>

        <div class="hidden sm:flex ml-6">
            <x-ui::logo />
        </div>
    </div>

    <div class="flex flex-row items-center gap-2">
        <x-ui::circle x-on:click="$dispatch('toggle-helper')" icon="light-bulb" />

        <div class="relative">
            <div class="absolute -top-1 -right-2">
                <x-ui::badge color="tertiary">12</x-ui::badge>
            </div>
            <x-ui::circle icon="bell" />
        </div>

        @livewire('switch-mode')

        <x-ui::avatar class="w-10 h-10" url="https://placehold.co/64x64?text=AW" />
    </div>
</div>

<div class="relative flex flex-row flex-auto pb-22 sm:pb-0">
    <x-navigation />

    <main class="relative flex flex-col w-full sm:px-6 pb-16 overflow-hidden">
        {{ $slot }}

        <div x-ref="scrim" x-cloak class="hidden fixed inset-0 transform backdrop-blur-xs pointer-events-auto transition-all z-0">
            <div class="absolute inset-0 bg-light-surface-variant/50 dark:bg-dark-surface-variant/50"></div>
        </div>
    </main>

    <div x-cloak x-bind:class="{ 'w-0': !helper, 'w-88': helper }" class="absolute sm:relative top-0 right-0 bottom-0 flex flex-col flex-none bg-light-background dark:bg-dark-background overflow-hidden transition-all">
        <div x-bind:class="{ 'hidden': !helper }" class="flex flex-col w-88 py-6 pr-6">
            <x-ui::section>
                <x-ui::title title="Onboarding" subtitle="Lorem ipsum dolor sit amet" />

                {{ auth()->user()->name }}
            </x-ui::section>
        </div>
    </div>
</div>

@livewire('alert')
@livewireScripts
@stack('scripts')

</body>
</html>

@props(['label', 'icon', 'href', 'active' => false])

<div x-data="{ opened: @js($active) }" x-bind:class="{ 'bg-light-primary/5 dark:bg-dark-primary/5 my-1': opened }" class="flex flex-col rounded-2xl transition-all">
    <div class="flex flex-row items-center justify-between h-14 pr-4 rounded-full text-light-on-surface-variant dark:text-dark-on-surface-variant cursor-pointer">
        <a href="{{ $href }}" class="flex flex-row items-center flex-auto h-14 pl-4" wire:navigate>
            <x-dynamic-component :component="str($icon)->prepend('icon::')->value()" />
            <div class="pl-3 text-sm tracking-wide leading-5 {{ $active ? 'font-bold' : 'font-medium' }}">{{ $label }}</div>
        </a>
        <div
            x-on:click="opened = !opened"
            x-bind:class="{ 'rotate-180': opened }"
            x-cloak
            class="p-2 flex-none hover:bg-light-primary/5 dark:hover:bg-dark-primary/5 rounded-full transform transition cursor-pointer"
        >
            <x-icon::chevron-down class="w-6 h-6" />
        </div>
    </div>

    <div x-show="opened" x-collapse x-cloak class="flex flex-col px-3 pb-3">
        {{ $slot }}
    </div>
</div>

@props(['label', 'icon', 'href', 'active' => false, 'small' => false])

<div x-data="{ opened: @js($active) }" x-bind:class="{ 'bg-section my-1': opened }" class="flex flex-col rounded-2xl transition-all">
    <div x-bind:class="{ 'hover:bg-secondary': !opened }" class="flex flex-row items-center justify-between h-14 pr-4 rounded-full text-on-section hover:text-on-background cursor-pointer transition">
        <a href="{{ $href }}" class="flex flex-row items-center flex-auto h-14 pl-4" wire:navigate>
            <x-dynamic-component :component="str($icon)->prepend('icon::')->value()" />
            @if(!$small)
                <div class="pl-3 text-sm tracking-wide leading-5 {{ $active ? 'font-bold' : 'font-medium' }}">{{ $label }}</div>
            @endif
        </a>
        @if(!$small)
            <div
                x-on:click="opened = !opened"
                x-bind:class="{ 'rotate-180': opened }"
                x-cloak
                class="p-2 flex-none hover:bg-hint/10 rounded-full transform transition cursor-pointer"
            >
                <x-icon::chevron-down class="w-6 h-6" />
            </div>
        @endif
    </div>

    <div x-show="opened" x-collapse x-cloak class="flex flex-col gap-1 px-3 pb-3">
        {{ $slot }}
    </div>
</div>

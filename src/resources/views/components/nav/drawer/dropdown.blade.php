@props(['label', 'icon', 'active' => false])

<div x-data="{ opened: @js($active) }" x-bind:class="{ 'active': opened }" class="dropdown-item">
    <div x-bind:class="{ 'active': opened }" class="element">
        <a {{ $attributes }} class="content">
            <div class="flex-none">
                <x-dynamic-component :component="'icon::'.$icon" :type="$active ? 'solid' : 'outline'" />
            </div>

            <div class="text">{{ $label }}</div>
        </a>

        <div x-cloak x-on:click="opened = !opened" x-bind:class="{ 'rotate-180': opened }" class="trigger">
            <x-icon::chevron-down type="micro" />
        </div>
    </div>

    <div x-show="opened" x-collapse x-cloak class="slot">
        {{ $slot }}
    </div>
</div>

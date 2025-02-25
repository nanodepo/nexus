@props([
    'title',
    'icon' => null,
    'subtitle' => null,
    'active' => false,
    'disabled' => false,
])

<div
    x-data="{ opened: false }"
    x-modelable="opened"
    class="flex flex-col flex-auto transition overflow-hidden"
    x-bind:class="{ 'bg-secondary': opened, 'hover:bg-secondary': !opened }"
>
    <x-ui::list.value
        :icon="$icon"
        :title="$title"
        :description="$subtitle"
        x-on:click="opened = !opened"
    >
        <x-icon::chevron-down type="mini" class="w-5 h-5 transition-all" x-bind:class="{ '-rotate-180': opened }" />
    </x-ui::list.value>

    <div x-show="opened" x-collapse x-cloak class="flex flex-col">
        {{ $slot }}
    </div>
</div>

@props(['hint' => ''])

@php
    $ref = str(str()->random(8))->prepend('hint');
@endphp

<div
    x-data="{ show: false }"
    x-on:mouseenter="show = true"
    x-on:mouseleave="show = false"
    class="flex flex-col"
>
    <div x-ref="{{ $ref }}" class="flex flex-col">
        {{ $slot }}
    </div>

    <template x-teleport="body">
        <div
            x-show="show"
            x-anchor.top.offset.10="$refs.{{ $ref }}"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="transform opacity-0 scale-75"
            x-transition:enter-end="transform opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-75"
            x-transition:leave-start="transform opacity-100 scale-100"
            x-transition:leave-end="transform opacity-0 scale-75"
            x-cloak
            {{ $attributes->merge(['class' => 'flex flex-col z-50 my-1 px-4 py-2 text-xs bg-foreground text-section rounded-sm shadow-dropdown overflow-hidden']) }}
        >
            {{ $hint }}
        </div>
    </template>
</div>

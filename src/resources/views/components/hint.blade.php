@props([
    'hint' => '',
    'position' => 'bottom',
    'width' => 44,
])

@php
    $ref = str(str()->random(8))->prepend('hint');
@endphp

<div
    x-data="{ hint: false }"
    x-on:mouseenter="hint = true"
    x-on:mouseleave="hint = false"
    class="flex flex-col"
>
    <div x-ref="{{ $ref }}" class="flex flex-col">
        {{ $slot }}
    </div>

    <div
        x-show="hint"
        x-anchor.{{ $position }}="$refs.{{ $ref }}"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="transform opacity-0 scale-95"
        x-transition:enter-end="transform opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-75"
        x-transition:leave-start="transform opacity-100 scale-100"
        x-transition:leave-end="transform opacity-0 scale-95"
        x-cloak
        {{ $attributes->merge(['class' => 'flex flex-col z-50 mt-1 px-4 py-2 text-xs bg-white dark:bg-black text-light-on-surface dark:text-dark-on-surface rounded overflow-hidden'])->class('w-'.$width) }}
    >
        {{ $hint }}
    </div>
</div>

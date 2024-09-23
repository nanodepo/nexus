@props([
    'title',
    'color',
    'description' => null,
    'icon' => null,
    'small' => false,
])

<div class="relative inline-flex h-5 {{ $small ? 'w-7' : '' }}">
    <div
        @if($small)
        x-data="{ show: @js(!$small) }"
        x-on:mouseenter="show = true"
        x-on:mouseleave="show = false"
        x-bind:class="{ 'absolute z-10': show }"
        @endif
        {{ $attributes->merge(['class' => 'inline-flex flex-row items-center h-5 py-0.5 px-1.5 text-white rounded']) }}
        title="{{ $description }}"
        style="background: {{ $color }}"
    >
        @if(!is_null($icon))
            <div class="flex-none">
                <x-dynamic-component component="icon::{{ $icon }}" type="micro" />
            </div>
        @endif

        <div
            @if($small)
                x-show="show"
            style="display: none"
            @endif
            class="ml-1.5 text-xs font-medium leading-4 truncate"
        >
            {{ $title }}
        </div>
    </div>
</div>

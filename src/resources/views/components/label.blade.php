@props([
    'title',
    'color',
    'description' => null,
    'icon' => null,
])

<div class="relative inline-flex h-5">
    <div
        {{ $attributes->merge(['class' => 'inline-flex flex-row items-center h-5 py-0.5 px-1.5 text-white rounded']) }}
        title="{{ $description }}"
        style="background: {{ $color }}"
    >
        @if(!is_null($icon))
            <div class="flex-none">
                <x-dynamic-component component="icon::{{ $icon }}" type="micro" />
            </div>
        @endif

        <div class="ml-1.5 mr-1 text-xs font-medium leading-4 truncate">
            {{ $title }}
        </div>
    </div>
</div>

@props([
    'title',
    'color',
    'icon',
    'description' => null,
])

<x-ui::hint class="w-52">
    <div {{ $attributes->merge(['class' => 'inline-flex flex-row items-center h-5 py-0.5 px-1.5 text-white rounded']) }} style="background: {{ $color }}">
        <x-dynamic-component component="icon::{{ $icon }}" type="micro" />
    </div>

    <x-slot name="hint">
        <div class="text-sm font-bold">{{ $title }}</div>
        @if($description)
            <div class="mt-1 text-xs">
                {{ $description }}
            </div>
        @endif
    </x-slot>
</x-ui::hint>

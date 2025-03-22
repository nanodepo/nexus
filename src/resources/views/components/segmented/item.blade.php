@props([
    'active' => false,
    'icon' => null,
    'text' => null,
    'disabled' => false,
])

<a {{ $attributes }} @class(['item', 'active' => $active, 'pointer-events-none opacity-50' => $disabled])>
    @if(!is_null($icon))
        <div class="flex-none">
            <x-dynamic-component :component="'icon::'.$icon" type="mini" />
        </div>
    @endif
    @if(!is_null($text))
        <div class="truncate">{{ $text }}</div>
    @endif
</a>

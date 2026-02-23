@props(['icon', 'color' => 'primary', 'variant' => 'text', 'disabled' => false])

@if($attributes->has('href'))
    <a {{ $attributes->merge(['class' => 'circle'])->class([$variant, $color, 'opacity-50 pointer-events-none' => $disabled]) }}>
        <x-dynamic-component component="icon::{{ $icon }}" type="mini" />
    </a>
@else
    <button
        type="{{ $attributes->get('type', 'button') }}"
        {{ $attributes->merge(['class' => 'circle'])->class([$variant, $color, 'disabled:opacity-50 disabled:pointer-events-none']) }}
        @disabled($disabled)
        wire:loading.attr="disabled"
    >
        <x-dynamic-component component="icon::{{ $icon }}" type="mini" />
    </button>
@endif

@props(['icon', 'variant' => 'default', 'color' => 'primary', 'disabled' => false])

@if($attributes->has('href'))
    <a {{ $attributes->merge(['class' => 'circle'])->class([$variant, $color, 'pointer-events-none opacity-50' => $disabled]) }}>
        <x-dynamic-component component="icon::{{ $icon }}" type="mini" />
    </a>
@else
    <div {{ $attributes->merge(['class' => 'circle'])->class([$variant, $color, 'pointer-events-none opacity-50' => $disabled]) }}>
        <x-dynamic-component component="icon::{{ $icon }}" type="mini" />
    </div>
@endif

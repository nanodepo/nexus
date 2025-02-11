@props(['icon', 'variant' => 'default', 'disabled' => false])

@if($attributes->has('href'))
    <a {{ $attributes->merge(['class' => 'circle'])->class([$variant, 'pointer-events-none opacity-50' => $disabled]) }}>
        <x-dynamic-component component="icon::{{ $icon }}" type="mini" />
    </a>
@else
    <div {{ $attributes->merge(['class' => 'circle'])->class([$variant, 'pointer-events-none opacity-50' => $disabled]) }}>
        <x-dynamic-component component="icon::{{ $icon }}" type="mini" />
    </div>
@endif

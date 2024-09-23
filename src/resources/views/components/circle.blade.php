@props(['icon', 'variant' => 'default', 'color' => 'primary'])

@if($attributes->has('href'))
    <a {{ $attributes->merge(['class' => 'circle'])->class([$variant, $color]) }}>
        <x-dynamic-component component="icon::{{ $icon }}" type="mini" />
    </a>
@else
    <div {{ $attributes->merge(['class' => 'circle'])->class([$variant, $color]) }}>
        <x-dynamic-component component="icon::{{ $icon }}" type="mini" />
    </div>
@endif

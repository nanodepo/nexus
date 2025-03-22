@props(['color' => 'primary'])

<div {{ $attributes->merge(['class' => 'badge '.$color]) }}>
    {{ $slot }}
</div>

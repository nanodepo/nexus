@props(['color' => '#4095BF'])

<style>
@php
    $colors = generateTheme($color);
@endphp

html {
@foreach($colors->light as $name => $color)
    {{ str('--ndn-:name: :color;')->replace(':name', $name)->replace(':color', $color)->replace('_', '-')->value() }}
@endforeach
}
html.dark {
@foreach($colors->dark as $name => $color)
    {{ str('--ndn-:name: :color;')->replace(':name', $name)->replace(':color', $color)->replace('_', '-')->value() }}
@endforeach
}
</style>

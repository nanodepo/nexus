@props(['active' => false])

<a {{ $attributes->merge(['class' => 'item'])->class([
    'link' => !$active,
    'active' => $active
]) }}>
    {{ $slot }}
</a>

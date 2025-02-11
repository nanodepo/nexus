@props(['active' => false])

<a {{ $attributes->merge(['class' => 'p-1 text-xs tracking-wide'])->class([
    'link text-subtitle transition' => !$active,
    'font-medium' => $active
]) }}>
    {{ $slot }}
</a>

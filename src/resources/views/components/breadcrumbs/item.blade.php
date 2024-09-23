@props(['active' => false])

<a {{ $attributes->merge(['class' => 'p-1 text-xs tracking-wide'])->class([
    'link text-light-on-surface-variant dark:text-dark-on-surface-variant transition' => !$active,
    'font-medium' => $active
]) }}>
    {{ $slot }}
</a>

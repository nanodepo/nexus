@props(['label', 'icon', 'active' => false])

<a {{ $attributes->merge(['class' => 'group item'])->class(['active' => $active]) }}>
    <div class="icon">
        <x-dynamic-component :component="'icon::'.$icon" :type="$active ? 'solid' : 'outline'" />
    </div>
    <div class="text">{{ $label }}</div>
</a>

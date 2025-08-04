@props(['label', 'icon', 'active' => false, 'badge' => false])

<a {{ $attributes->merge(['class' => 'group item'])->class(['active' => $active]) }}>
    <div class="icon">
        <x-dynamic-component :component="'icon::'.$icon" :type="$active ? 'solid' : 'outline'" />
    </div>
    <div class="text">{{ $label }}</div>
    @if($badge)
        <x-ui::badge.small class="absolute top-1 right-2" />
    @endif
</a>

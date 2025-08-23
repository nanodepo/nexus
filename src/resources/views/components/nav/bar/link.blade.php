@props(['label', 'icon', 'active' => false, 'badge' => false, 'disabled' => false])

<a {{ $attributes->merge(['class' => 'group item'])->class(['active' => $active, 'opacity-50 pointer-events-none cursor-default' => $disabled]) }}>
    <div class="icon">
        <x-dynamic-component :component="'icon::'.$icon" :type="$active ? 'solid' : 'outline'" />
    </div>
    <div class="text">{{ $label }}</div>
    @if(is_bool($badge) && $badge)
        <x-ui::badge.small class="absolute top-1 right-2" />
    @elseif(is_string($badge) || is_integer($badge))
        <x-ui::badge class="absolute top-0 right-0">{{ $badge }}</x-ui::badge>
    @endif
</a>

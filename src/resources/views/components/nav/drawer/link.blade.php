@props(['label', 'icon', 'active' => false])

<a {{ $attributes->merge(['class' => 'item'])->class(['active' => $active]) }}>
    <div class="content">
        <div class="flex-none">
            <x-dynamic-component :component="'icon::'.$icon" :type="$active ? 'solid' : 'outline'" />
        </div>

        <div class="text">{{ $label }}</div>
    </div>

    @if(isset($badge) && $badge->isNotEmpty())
        <div class="drawer-badge">{{ $badge }}</div>
    @endif
</a>

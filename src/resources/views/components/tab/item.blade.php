@props(['name', 'label', 'icon' => null, 'badge' => null, 'disabled' => false])

<a
    x-data="{ name: @js($name) }"
    class="item {{ $disabled ? 'opacity-50 pointer-events-none' : '' }}"
    x-bind:class="{ 'active': name == active }"
    x-on:click="active = name"
    {{ $attributes }}
>
    <div class="title">
        @if($icon)
            <div class="flex-none">
                <x-dynamic-component :component="'icon::'.$icon" type="mini" />
            </div>
        @endif
        <div class="">{{ $label }}</div>
        @if($badge)
            <div class="flex-none">
                <x-ui::badge>{{ $badge }}</x-ui::badge>
            </div>
        @endif
    </div>
</a>

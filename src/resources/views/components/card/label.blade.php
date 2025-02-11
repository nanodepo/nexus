@props([
    'color' => 'primary',
    'icon' => null,
])

<div class="absolute top-3 left-0 flex flex-row items-center space-x-1 py-1 px-1.5 rounded-r bg-button text-on-button">
    @if($icon)
        <x-dynamic-component component="icon::{{ $icon }}" type="micro" />
    @endif
    @if($slot->isNotEmpty())
        <div class="text-xs font-medium tracking-wide">{{ $slot }}</div>
    @endif
</div>

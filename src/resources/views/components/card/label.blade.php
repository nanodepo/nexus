@props([
    'color' => 'primary',
    'icon' => null,
])

<div class="label">
    @if($icon)
        <x-dynamic-component component="icon::{{ $icon }}" type="micro" />
    @endif
    @if($slot->isNotEmpty())
        <div>{{ $slot }}</div>
    @endif
</div>

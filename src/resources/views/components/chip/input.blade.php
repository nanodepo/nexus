@props([
    'text' => null,
    'icon' => null,
    'action' => true,
    'disabled' => false,
])

<x-chip.layout :disabled="$disabled" {{ $attributes->class(['cursor-default' => $action]) }}>

    @if($icon)
        <x-dynamic-component component="icon::{{ $icon }}" type="mini" class="w-4.5 h-4.5" />
    @endif

    @if($text)
        <span @class(['mx-2'])>{{ $text }}</span>
    @endif

    @if($action)
        <x-icon::x-mark wire:click="{{ $action }}" type="mini" class="w-4.5 h-4.5 cursor-pointer" />
    @endif

</x-chip.layout>

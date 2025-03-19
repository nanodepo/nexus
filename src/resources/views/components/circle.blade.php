@props(['icon', 'variant' => 'default', 'disabled' => false, 'destructive' => false])

@php
    $class = [
        'flex justify-center items-center flex-none w-9 h-9 focus:outline-none focus:ring-0 rounded-full cursor-pointer transition',
        'hover:bg-gray/20 focus:bg-gray/20' => $variant == 'default' && !$destructive,
        'hover:bg-gray/20 focus:bg-gray/20 hover:text-destructive focus:text-destructive' => $variant == 'default' && $destructive,
        'bg-button text-on-button' => $variant == 'filled' && !$destructive,
        'bg-destructive text-on-button' => $variant == 'filled' && $destructive,
        'border border-hint hover:border-button focus:border-button active:border-button' => $variant == 'outlined' && !$destructive,
        'border border-hint focus:border-destructive text-destructive' => $variant == 'outlined' && $destructive,
        'text-button hover:bg-button focus:bg-button active:bg-button hover:text-on-button focus:text-on-button' => $variant == 'text' && !$destructive,
        'text-destructive hover:bg-destructive focus:bg-destructive active:bg-destructive hover:text-on-button focus:text-on-button' => $variant == 'text' && $destructive,
        'pointer-events-none opacity-50' => $disabled
    ];
@endphp

@if($attributes->has('href'))
    <a {{ $attributes->class($class) }}>
        <x-dynamic-component component="icon::{{ $icon }}" type="mini" />
    </a>
@else
    <button {{ $attributes->class($class) }}>
        <x-dynamic-component component="icon::{{ $icon }}" type="mini" />
    </button>
@endif

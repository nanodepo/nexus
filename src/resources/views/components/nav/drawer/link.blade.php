@props([
    'label',
    'icon',
    'active' => false,
    'badge' => null,
])

<a
    {{ $attributes }}
    @class([
        'flex flex-row items-center justify-between h-14 pl-4 pr-6 rounded-full',
        'text-light-on-secondary-container dark:text-dark-on-secondary-container bg-light-secondary-container dark:bg-dark-secondary-container' => $active,
        'text-light-on-surface-variant dark:text-dark-on-surface-variant' => !$active
    ])
    wire:navigate
>
    <div class="flex flex-row items-center">
        <x-dynamic-component :component="str($icon)->prepend('icon::')->value()" :type="$active ? 'solid' : 'outline'" />
        <div class="pl-3 text-sm tracking-wide leading-5 {{ $active ? 'font-bold' : 'font-medium' }}">
            {{ $label }}
        </div>
    </div>
    <div class="text-sm tracking-wide leading-5 font-medium">{{ $badge }}</div>
</a>

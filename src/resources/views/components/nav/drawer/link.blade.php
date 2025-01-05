@props(['label', 'icon', 'active' => false, 'small' => false, 'badge' => null])

@if(!$small)
    <a
        {{ $attributes }}
        @class([
            'flex flex-row items-center justify-between h-14 pl-4 pr-6 rounded-full transition cursor-pointer',
            'text-light-on-secondary-container dark:text-dark-on-secondary-container bg-light-secondary-container dark:bg-dark-secondary-container' => $active,
            'text-light-on-surface-variant dark:text-dark-on-surface-variant hover:bg-light-secondary-container/12 dark:hover:bg-dark-secondary-container/12' => !$active
        ])
    >
        <div class="flex flex-row items-center">
            <x-dynamic-component :component="str($icon)->prepend('icon::')->value()" :type="$active ? 'solid' : 'outline'" />
            <div class="pl-3 text-sm tracking-wide leading-5 {{ $active ? 'font-bold' : 'font-medium' }}">
                {{ $label }}
            </div>
        </div>
        <div class="text-sm tracking-wide leading-5 font-medium">{{ $badge }}</div>
    </a>
@else
    <a {{ $attributes }} class="flex flex-col items-center basis-16 grow shrink-0 pr-3 pl-4">
        <div class="flex items-center justify-center w-16 h-8 {{ $active ? 'text-light-on-secondary-container dark:text-dark-on-secondary-container bg-light-secondary-container dark:bg-dark-secondary-container' : 'text-light-on-surface-variant dark:text-dark-on-surface-variant' }}  rounded-full">
            <x-dynamic-component :component="str('icon::')->append($icon)->value()" :type="$active ? 'solid' : 'outline'" />
        </div>
        <div class="mt-1 text-base font-medium tracking-wide leading-6 {{ $active ? 'text-light-on-surface dark:text-dark-on-surface' : 'text-light-on-surface-variant dark:text-dark-on-surface-variant' }}">
            {{ $label }}
        </div>
    </a>
@endif

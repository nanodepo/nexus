@props(['title', 'link', 'icon', 'active' => false])

<a href="{{ $link }}" class="flex flex-col items-center basis-16 grow shrink-0 pr-3 pl-4" wire:navigate>
    <div class="flex items-center justify-center w-16 h-8 {{ $active ? 'text-light-on-secondary-container dark:text-dark-on-secondary-container bg-light-secondary-container dark:bg-dark-secondary-container' : 'text-light-on-surface-variant dark:text-dark-on-surface-variant' }}  rounded-full">
        <x-dynamic-component :component="str('icon::')->append($icon)->value()" :type="$active ? 'solid' : 'outline'" />
    </div>
    <div class="mt-1 text-base font-medium tracking-wide leading-6 {{ $active ? 'text-light-on-surface dark:text-dark-on-surface' : 'text-light-on-surface-variant dark:text-dark-on-surface-variant' }}">
        {{ $title }}
    </div>
</a>
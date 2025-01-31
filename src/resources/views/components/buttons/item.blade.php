@props([
    'active' => false,
    'icon' => null,
    'text' => null,
    'disabled' => false,
])

<a {{ $attributes }} @class([
    'flex flex-row items-center justify-center flex-auto w-16 p-2.5 font-medium leading-4 text-sm tracking-wide border-y first:border-l border-r first:rounded-l-full last:rounded-r-full transition overflow-hidden',
    'hover:bg-light-secondary/8 dark:hover:bg-dark-secondary/8 border-light-outline dark:border-dark-outline' => !$active,
    '-ml-px text-light-on-secondary dark:text-dark-on-secondary bg-light-secondary dark:bg-dark-secondary border-light-secondary dark:border-dark-secondary' => $active,
    'pointer-events-none opacity-50' => $disabled
])>
    @if(!is_null($icon))
        <div class="flex-none">
            <x-dynamic-component :component="'icon::'.$icon" type="mini" />
        </div>
    @endif
    @if(!is_null($text))
        <div class="ml-2 truncate">{{ $text }}</div>
    @endif
</a>

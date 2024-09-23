@props([
    'active' => false,
    'icon' => null,
    'text' => null,
    'disabled' => false,
])

<a {{ $attributes }} @class([
    'flex flex-row items-center justify-center flex-auto w-16 p-2.5 font-medium leading-4 text-sm tracking-wide border-y first:border-x last:border-x first:rounded-l-full last:rounded-r-full transition',
    'hover:bg-light-primary/8 dark:hover:bg-dark-primary/8 border-light-outline dark:border-dark-outline' => !$active,
    'text-light-on-primary dark:text-dark-on-primary bg-light-primary dark:bg-dark-primary border-light-primary dark:border-dark-primary' => $active,
    'pointer-events-none opacity-50' => $disabled
])>
    @if(!is_null($icon))
        <div class="flex-none">
            <x-dynamic-component :component="'icon::'.$icon" type="mini" />
        </div>
    @endif
    @if(!is_null($text))
        <div class="ml-2">{{ $text }}</div>
    @endif
</a>

@props([
    'before' => null,
    'title' => null,
    'after' => null,
    'color' => 'primary',
    'active' => false,
    'disabled' => false,
])

<button
    type="button" {{ $attributes->class([
        'inline-flex flex-none justify-center items-center h-8 px-2 rounded-lg focus:outline-none focus:ring-none transition',

        'text-light-on-surface-variant dark:text-dark-on-surface-variant hover:text-light-primary dark:hover:text-dark-primary hover:bg-light-primary/8 dark:hover:bg-dark-primary/8 focus:bg-light-primary/12 dark:focus:bg-dark-primary/12 active:bg-light-primary/12 dark:active:bg-dark-primary/12 border border-light-outline dark:border-dark-outline hover:border-light-primary dark:hover:border-dark-primary' => $color == 'primary' && !$active,
        'bg-light-primary/14 dark:bg-dark-primary/14 text-light-primary dark:text-dark-primary border border-light-primary dark:border-dark-primary' => $color == 'primary' && $active,

        'text-light-on-surface-variant dark:text-dark-on-surface-variant hover:text-light-secondary dark:hover:text-dark-secondary hover:bg-light-secondary/8 dark:hover:bg-dark-secondary/8 focus:bg-light-secondary/12 dark:focus:bg-dark-secondary/12 active:bg-light-secondary/12 dark:active:bg-dark-secondary/12 border border-light-outline dark:border-dark-outline hover:border-light-secondary dark:hover:border-dark-secondary' => $color == 'secondary' && !$active,
        'bg-light-secondary/14 dark:bg-dark-secondary/14 text-light-secondary dark:text-dark-secondary border border-light-secondary dark:border-dark-secondary' => $color == 'secondary' && $active,

        'text-light-on-surface-variant dark:text-dark-on-surface-variant hover:text-light-tertiary dark:hover:text-dark-tertiary hover:bg-light-tertiary/8 dark:hover:bg-dark-tertiary/8 focus:bg-light-tertiary/12 dark:focus:bg-dark-tertiary/12 active:bg-light-tertiary/12 dark:active:bg-dark-tertiary/12 border border-light-outline dark:border-dark-outline hover:border-light-tertiary dark:hover:border-dark-tertiary' => $color == 'tertiary' && !$active,
        'bg-light-tertiary/14 dark:bg-dark-tertiary/14 text-light-tertiary dark:text-dark-tertiary border border-light-tertiary dark:border-dark-tertiary' => $color == 'tertiary' && $active,

        'text-light-on-surface-variant dark:text-dark-on-surface-variant hover:text-light-error dark:hover:text-dark-error hover:bg-light-error/8 dark:hover:bg-dark-error/8 focus:bg-light-error/12 dark:focus:bg-dark-error/12 active:bg-light-error/12 dark:active:bg-dark-error/12 border border-light-outline dark:border-dark-outline hover:border-light-error dark:hover:border-dark-error' => $color == 'error' && !$active,
        'bg-light-error/14 dark:bg-dark-error/14 text-light-error dark:text-dark-error border border-light-error dark:border-dark-error' => $color == 'error' && $active,

        'pointer-events-none opacity-50' => $disabled
]) }}>
    @if($before)
        <x-dynamic-component component="icon::{{ $before }}" type="mini" class="w-4.5 h-4.5" />
    @endif

    @if($title)
        <div class="mx-2 leading-4 text-sm font-medium tracking-wide">{{ $title }}</div>
    @endif

    @if($after)
        <x-dynamic-component component="icon::{{ $after }}" type="mini" class="w-4.5 h-4.5" />
    @endif
</button>

@props(['color' => 'error'])

<div @class([
    'flex flex-row items-center justify-center h-4 px-1.5 leading-none text-xs font-medium tracking-tighter rounded-full',
    'text-light-on-error dark:text-dark-on-error bg-light-error dark:bg-dark-error' => $color == 'error',
    'text-light-on-primary dark:text-dark-on-primary bg-light-primary dark:bg-dark-primary' => $color == 'primary',
    'text-light-on-secondary dark:text-dark-on-secondary bg-light-secondary dark:bg-dark-secondary' => $color == 'secondary',
    'text-light-on-tertiary dark:text-dark-on-tertiary bg-light-tertiary dark:bg-dark-tertiary' => $color == 'tertiary',
])>
    {{ $slot }}
</div>

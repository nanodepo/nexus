@props([
    'color' => 'primary',
    'icon' => null,
])

<div @class([
    'absolute top-3 left-0 flex flex-row items-center space-x-1 py-1 px-1.5 rounded-r',
    'bg-light-on-primary-container dark:bg-dark-on-primary-container text-light-on-primary dark:text-dark-on-primary' => $color == 'primary',
    'bg-light-on-secondary-container dark:bg-dark-on-secondary-container text-light-on-secondary dark:text-dark-on-secondary' => $color == 'secondary',
    'bg-light-on-tertiary-container dark:bg-dark-on-tertiary-container text-light-on-tertiary dark:text-dark-on-tertiary' => $color == 'tertiary',
    'bg-light-on-error-container dark:bg-dark-on-error-container text-light-on-error dark:text-dark-on-error' => $color == 'error',
])>
    @if($icon)
        <x-dynamic-component component="icon::{{ $icon }}" type="micro" />
    @endif
    @if($slot->isNotEmpty())
        <div class="text-xs font-medium tracking-wide">{{ $slot }}</div>
    @endif
</div>

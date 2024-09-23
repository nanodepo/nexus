@props([
    'key' => null,
    'value' => null,
    'hovered' => false,
])

<div @class([
    'flex flex-row items-center px-6 py-2',
    'hover:bg-light-primary/5 dark:hover:bg-dark-primary/5' => $hovered
])>
    @if(!is_null($key))
        <div class="{{ $slot->isEmpty() ? 'basis-1/2' : 'basis-1/3' }} grow shrink-0 text-sm text-light-on-surface-variant dark:text-dark-on-surface-variant overflow-hidden">{{ $key }}</div>
    @endif
    @if(!is_null($value))
        <div class="{{ $slot->isEmpty() ? 'basis-1/2' : 'basis-1/3' }} grow shrink-0 text-sm text-light-on-surface dark:text-dark-on-surface overflow-hidden">{{ $value }}</div>
    @endif
    @if(!$slot->isEmpty())
        <div class="flex flex-row justify-end basis-auto grow-0 shrink text-sm text-light-on-surface dark:text-dark-on-surface overflow-hidden">{{ $slot }}</div>
    @endif
</div>

@props([
    'title' => null,
    'completed' => false,
    'active' => false,
    'first' => false,
    'last' => false,
])

@if(!$first)
    <div @class([
        'flex-auto h-1',
        'bg-light-primary dark:bg-dark-primary' => $completed || $active,
        'bg-light-primary/12 dark:bg-dark-primary/12' => !$completed && !$active,
    ])></div>
@endif

<x-hint>
    @if($completed)
        <div class="flex items-center justify-center flex-none w-7 h-7 p-1 bg-light-primary dark:bg-dark-primary rounded-full">
            <x-icon::check type="micro" />
        </div>
    @elseif($active)
        <div class="flex-none w-5 h-5 p-1.5 bg-light-primary dark:bg-dark-primary rounded-full">
            <div class="w-2 h-2 bg-light-on-primary dark:bg-dark-on-primary rounded-full"></div>
        </div>
    @else
        <div class="flex items-center justify-center flex-none w-7 h-7 p-1 bg-light-primary/12 dark:bg-dark-primary/12 text-light-outline dark:text-dark-outline rounded-full">
            <x-icon::lock-closed type="micro" />
        </div>
    @endif

    <x-slot name="hint">
        {{ $title }}
    </x-slot>
</x-hint>

@if(!$last)
    <div @class([
        'flex-auto h-1',
        'bg-light-primary dark:bg-dark-primary' => $completed,
        'bg-light-primary/12 dark:bg-dark-primary/12' => !$completed,
    ])></div>
@endif

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
        'bg-button' => $completed || $active,
        'bg-hint' => !$completed && !$active,
    ])></div>
@endif

<x-ui::hint>
    @if($completed)
        <div class="flex items-center justify-center flex-none w-7 h-7 p-1 bg-button rounded-full">
            <x-icon::check type="micro" />
        </div>
    @elseif($active)
        <div class="flex-none w-5 h-5 p-1.5 bg-button rounded-full">
            <div class="w-2 h-2 bg-on-button rounded-full"></div>
        </div>
    @else
        <div class="flex items-center justify-center flex-none w-7 h-7 p-1 bg-hint text-on-button rounded-full">
            <x-icon::lock-closed type="micro" />
        </div>
    @endif

    <x-slot name="hint">
        {{ $title }}
    </x-slot>
</x-ui::hint>

@if(!$last)
    <div @class([
        'flex-auto h-1',
        'bg-button' => $completed,
        'bg-hint' => !$completed,
    ])></div>
@endif

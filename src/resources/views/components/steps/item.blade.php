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
        'bg-primary' => $completed || $active,
        'bg-hint' => !$completed && !$active,
    ])></div>
@endif

<x-ui::hint :hint="$title">
    @if($completed)
        <div class="completed">
            <x-icon::check type="micro" />
        </div>
    @elseif($active)
        <div class="active">
            <div class="icon"></div>
        </div>
    @else
        <div class="pending">
            <x-icon::lock-closed type="micro" />
        </div>
    @endif
</x-ui::hint>

@if(!$last)
    <div @class([
        'flex-auto h-1',
        'bg-primary' => $completed,
        'bg-hint' => !$completed,
    ])></div>
@endif

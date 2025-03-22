@props(['before' => null, 'title' => null, 'after' => null, 'color' => 'primary', 'active' => false])

<button type="button" {{ $attributes->class(['chip', $color, 'active' => $active]) }}>
    @if($before)
        <x-dynamic-component component="icon::{{ $before }}" type="mini" class="w-4.5 h-4.5" />
    @endif

    @if($title)
        <div class="title">{{ $title }}</div>
    @endif

    @if($after)
        <x-dynamic-component component="icon::{{ $after }}" type="mini" class="w-4.5 h-4.5" />
    @endif
</button>

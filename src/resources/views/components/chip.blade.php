@props([
    'before' => null,
    'title' => null,
    'after' => null,
    'active' => false,
    'disabled' => false,
])

<button type="button" {{ $attributes->class([
        'inline-flex flex-none justify-center items-center h-8 px-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-accent/30 transition',
        'text-on-section hover:bg-background focus:bg-background active:bg-background border border-hint hover:border-accent focus:border-accent active:border-accent' => !$active,
        'bg-button text-on-button border border-button' => $active,
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

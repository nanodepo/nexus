<button
    {{ $attributes->class([
        'button disabled:opacity-50 disabled:pointer-events-none',
        $color,
        $variant,
        'px-4' => $slot->isNotEmpty(),
        'px-2.5' => $slot->isEmpty(),
    ]) }}
    @disabled($disabled)
    wire:loading.attr="disabled"
>
    @if(isset($before))
        <div class="flex flex-none size-5">
            <x-dynamic-component component="icon::{{ $before }}" type="mini" />
        </div>
    @endif

    @if($slot->isNotEmpty())
        <div class="flex flex-auto px-2">{{ $slot }}</div>
    @endif

    @if(isset($after))
        <div class="flex flex-none size-5">
            <x-dynamic-component component="icon::{{ $after }}" type="mini" />
        </div>
    @endif
</button>


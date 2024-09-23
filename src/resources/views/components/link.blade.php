<a
    href="{{ $href }}"
    {{ $attributes->class([
        'button', $variant, $color,
        'px-4' => $slot->isNotEmpty(),
        'px-2.5' => $slot->isEmpty(),
        'pointer-events-auto' => !$disabled,
        'opacity-50 pointer-events-none' => $disabled,
    ]) }}
    @disabled($disabled)
    wire:loading.attr="disabled"
>
    @if(isset($before))
        <div class="flex flex-none w-5 h-5">
            <x-dynamic-component component="icon::{{ $before }}" type="mini" />
        </div>
    @endif

    @if($slot->isNotEmpty())
        <div class="flex flex-auto px-2">{{ $slot }}</div>
    @endif

    @if(isset($after))
        <div class="flex flex-none w-5 h-5">
            <x-dynamic-component component="icon::{{ $after }}" type="mini" />
        </div>
    @endif
</a>


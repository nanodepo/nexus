<button
    {{ $attributes->class([
        'relative inline-flex flex-row justify-start items-center py-2.5 h-10 font-medium leading-4 rounded-full text-sm tracking-wide focus:outline-none focus:ring-0 transition cursor-pointer',
        'bg-button text-on-button' => $variant == 'filled' && !$destructive,
        'bg-destructive text-on-button' => $variant == 'filled' && $destructive,
        'border border-hint focus:border-button text-button' => $variant == 'outlined' && !$destructive,
        'border border-hint focus:border-destructive text-destructive' => $variant == 'outlined' && $destructive,
        'hover:bg-button focus:bg-button active:bg-button text-on-background hover:text-on-button' => $variant == 'text' && !$destructive,
        'hover:bg-destructive focus:bg-destructive active:bg-destructive text-destructive hover:text-on-button' => $variant == 'text' && $destructive,
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
</button>


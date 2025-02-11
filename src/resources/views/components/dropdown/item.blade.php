@props(['icon' => null, 'disabled' => false, 'hidden' => false])

<a {{ $attributes->merge(['class' => 'flex flex-row items-center flex-none whitespace-nowrap px-4 py-2 text-on-section hover:bg-background cursor-pointer transition'])->class(['pointer-events-none opacity-50' => $disabled, 'hidden' => $hidden]) }} x-on:click="open = false">
    @if(!is_null($icon))
        <x-dynamic-component component="icon::{{ $icon }}" type="mini" class="flex-none w-4.5 h-4.5 mr-3" />
    @endif
    <div class="flex-auto text-sm truncate">
        {{ $slot }}
    </div>
</a>


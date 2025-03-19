@props(['icon', 'text' => null, 'hint' => null, 'destructive' => false])

@if($hint)
    <x-ui::hint :hint="$hint" class="w-44">
        <div {{ $attributes->merge(['class' => 'flex flex-row items-center flex-none space-x-1 text-xs tracking-wide'])->class(['text-destructive' => $destructive]) }}>
            <x-dynamic-component component="icon::{{ $icon }}" type="micro" />
            @if($text)
                <div>{{ $text }}</div>
            @endif
        </div>
    </x-ui::hint>
@else
    <div {{ $attributes->merge(['class' => 'flex flex-row items-center flex-none space-x-1 text-xs tracking-wide'])->class(['text-destructive' => $destructive]) }}>
        <x-dynamic-component component="icon::{{ $icon }}" type="micro" />
        @if($text)
            <div>{{ $text }}</div>
        @endif
    </div>
@endif



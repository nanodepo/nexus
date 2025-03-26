@props(['header' => null, 'title' => null, 'hint' => null, 'color' => 'default', 'disabled' => false, 'destructive' => false])

<div {{ $attributes->merge(['class' => 'section'])->class(['opacity-50 pointer-events-none' => $disabled]) }}>
    @if(!is_null($header))
        <div class="px-6 text-sm font-medium leading-5 tracking-wide {{ $destructive ? 'text-destructive' : 'text-section-header' }}">
            {{ $header }}
        </div>
    @endif

    <div class="content {{ $color }} {{ $destructive ? 'ring-2 ring-destructive' : '' }}">
        @if(!is_null($title))
            <div class="text-sm font-medium leading-5 tracking-wide {{ $destructive ? 'text-destructive' : 'text-accent' }}">
                {{ $title }}
            </div>
        @endif

        <div class="flex flex-col flex-auto">
            {{ $slot }}
        </div>
    </div>

    @if(!is_null($hint))
        <div class="px-3 text-xs tracking-wide text-hint">
            {{ $hint }}
        </div>
    @endif
</div>

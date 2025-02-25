@props(['header' => null, 'title' => null, 'hint' => null, 'disabled' => false, 'destructive' => false])

<div {{ $attributes->merge(['class' => 'flex flex-col gap-1'])->class(['opacity-50 pointer-events-none' => $disabled]) }}>
    @if(!is_null($header))
        <div class="px-6 text-sm font-medium leading-5 tracking-wide text-section-header">
            {{ $header }}
        </div>
    @endif

    <div class="relative flex flex-col w-full flex-auto gap-3 px-6 py-3 bg-section text-on-section overflow-hidden sm:rounded-xl shadow {{ $destructive ? 'ring-2 ring-destructive' : '' }}">
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

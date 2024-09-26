@props(['disabled' => false])

<div {{ $attributes->merge(['class' => 'relative flex flex-col flex-none w-full text-on-section bg-section overflow-hidden sm:rounded-2xl'])->class(['opacity-50 pointer-events-none' => $disabled]) }}>
    @if(isset($header))
        <div {{ $header->attributes->merge(['class' => 'flex flex-col pt-3']) }}>
            {{ $header }}
        </div>
    @endif

    @if(isset($content))
        <div {{ $content->attributes->merge(['class' => 'flex-auto overflow-hidden p-6 sm:rounded-2xl']) }}>
            {{ $content }}
        </div>
    @else
        <div class="flex-auto overflow-hidden p-6">
            {{ $slot }}
        </div>
    @endif

    @if(isset($footer))
        <div {{ $footer->attributes->merge(['class' => 'flex flex-row justify-between px-6 pb-3']) }}>
            {{ $footer }}
        </div>
    @endif
</div>

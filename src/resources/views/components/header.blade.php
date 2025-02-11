@props(['title', 'subtitle' => null])

<div {{ $attributes->merge(['class' => 'flex flex-col gap-1']) }}>
    <div class="text-2xl font-bold tracking-wide text-center text-on-section">
        {{ $title }}
    </div>
    @if(!is_null($subtitle))
        <div class="text-sm tracking-wide text-center text-balance text-subtitle">
            {{ $subtitle }}
        </div>
    @endif
</div>

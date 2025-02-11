@props(['title', 'subtitle' => null])

<div {{ $attributes->merge(['class' => 'flex flex-col gap-1']) }}>
    <div class="text-sm font-medium tracking-wide text-accent">{{ $title }}</div>
    @if(!is_null($subtitle))
        <div class="text-sm text-balance tracking-wide text-subtitle">{{ $subtitle }}</div>
    @endif
</div>

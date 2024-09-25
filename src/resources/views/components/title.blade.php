@props(['title', 'subtitle' => null])

<div {{ $attributes->merge(['class' => 'flex flex-col gap-1']) }}>
    <div class="text-sm font-medium tracking-wide text-light-primary dark:text-dark-primary">{{ $title }}</div>
    @if(!is_null($subtitle))
        <div class="text-sm text-balance tracking-wide text-light-on-surface-variant dark:text-dark-on-surface-variant">{{ $subtitle }}</div>
    @endif
</div>

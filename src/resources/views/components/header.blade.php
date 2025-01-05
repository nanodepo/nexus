@props(['title', 'subtitle' => null])

<div {{ $attributes->merge(['class' => 'flex flex-col gap-1']) }}>
    <div class="text-2xl font-bold tracking-wide text-center text-light-on-surface dark:text-dark-on-surface">
        {{ $title }}
    </div>
    @if(!is_null($subtitle))
        <div class="text-sm tracking-wide text-center text-balance text-light-on-surface-variant dark:text-dark-on-surface-variant">
            {{ $subtitle }}
        </div>
    @endif
</div>

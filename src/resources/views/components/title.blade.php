@props([
    'title' => null,
    'subtitle' => null,
    'action' => null
])

<div {{ $attributes->merge(['class' => 'flex flex-row']) }}>
    <div class="flex flex-col flex-auto justify-center">
        <div class="text-xs font-medium tracking-wide text-light-on-surface dark:text-dark-on-surface uppercase">{{ $title }}</div>
        @if(isset($subtitle))
            <div class="mt-1 text-sm text-balance text-light-on-surface-variant dark:text-dark-on-surface-variant">{{ $subtitle }}</div>
        @endif
    </div>

    <div class="flex flex-row items-center justify-center flex-none">
        {{ $action }}
    </div>
</div>

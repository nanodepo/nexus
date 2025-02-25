@props(['label', 'hint' => null, 'max' => 0])

<div x-data="{ field: '' }" x-modelable="field" {{ $attributes->merge(['class' => 'flex flex-col gap-1']) }}>
    <div class="text-xs font-medium tracking-wide text-subtitle">{{ $label }}</div>

    {{ $slot }}

    @if($hint || $max > 0)
        <div class="flex flex-row justify-between gap-3 px-3">
            <div class="text-xs tracking-wide text-hint">{{ $hint }}</div>
            @if($max > 0)
                <div class="text-xs tracking-wide text-hint" x-text="field.length + ' / {{ $max }}'"></div>
            @endif
        </div>
    @endif
</div>

@props(['label', 'hint' => null, 'max' => 0])

<div x-data="{ field: '' }" x-modelable="field" {{ $attributes->merge(['class' => 'field']) }}>
    <div class="label">{{ $label }}</div>

    {{ $slot }}

    @if($hint || $max > 0)
        <div class="flex flex-row justify-between gap-3 px-3">
            <div class="hint">{{ $hint }}</div>
            @if($max > 0)
                <div class="flex-none hint" x-text="field.length + ' / {{ $max }}'"></div>
            @endif
        </div>
    @endif

    @if($attributes->wire('model'))
        @error($attributes->wire('model')->value)
            <div class="validation-error">{{ $message }}</div>
        @enderror
    @endif
</div>

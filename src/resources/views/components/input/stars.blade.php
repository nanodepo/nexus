@props(['min' => 1, 'max' => 5, 'value' => 0, 'disabled' => false])

<div
    x-data="{ count: @js($value ?? $min) }"
    x-modelable="count"
    {{ $attributes }}
    @class(['stars', 'pointer-events-none opacity-50' => $disabled])
>
    @for($i = $min; $i <= $max; $i++)
        <div x-on:click="count = {{ $i }}" class="cursor-pointer">
            <template x-if="count >= {{ $i }}">
                <x-icon::star type="solid" class="star active" />
            </template>
            <template x-if="count < {{ $i }}">
                <x-icon::star class="star" />
            </template>
        </div>
    @endfor
</div>

@if($attributes->wire('model'))
    @error($attributes->wire('model')->value)
        <div class="validation-error">{{ $message }}</div>
    @enderror
@endif

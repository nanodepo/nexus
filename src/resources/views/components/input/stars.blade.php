@props([
    'min' => 1,
    'max' => 5,
    'value' => null,
    'disabled' => false,
    'required' => false,
])

<div
    x-data="{ count: {{ $value ?? 0 }} }"
    x-modelable="count"
    {{ $attributes }}
    @class([
        'flex flex-row flex-none space-x-2 py-1',
        'pointer-events-none opacity-50' => $disabled
    ])
>
    @for($i = $min; $i <= $max; $i++)
        <div x-on:click="count = {{ $i }}" class="cursor-pointer">
            <template x-if="count >= {{ $i }}">
                <x-icon::star type="solid" class="w-6 h-6 text-accent" />
            </template>
            <template x-if="count < {{ $i }}">
                <x-icon::star class="w-6 h-6" />
            </template>
        </div>
    @endfor
</div>

@if($attributes->wire('model'))
    @error($attributes->wire('model')->value)
        <div class="py-2 text-sm tracking-wide text-destructive">{{ $message }}</div>
    @enderror
@endif

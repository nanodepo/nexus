@props([
    'name' => '',
    'label' => '',
    'min' => 1,
    'max' => 5,
    'value' => null,
    'disabled' => false,
    'required' => false,
])

<x-input.label :label="$label" />

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
                <x-icon::star type="solid" class="w-6 h-6" />
            </template>
            <template x-if="count < {{ $i }}">
                <x-icon::star class="w-6 h-6" />
            </template>
        </div>
    @endfor

    <input type="hidden" name="{{ $name }}" x-bind:value="count" />
</div>

@error(str($name)->replace('[', '.')->rtrim(']')->toString())
<div class="py-2 text-sm font-medium text-light-error dark:text-dark-error">{{ $message }}</div>
@enderror

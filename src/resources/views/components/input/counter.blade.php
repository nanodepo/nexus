@props(['min' => 0, 'max' => 100, 'value' => null, 'disabled' => false])

<div
    x-data="{ count: {{ $value ?? $min }} }"
    x-modelable="count"
    {{ $attributes }}
    @class(['group counter', 'pointer-events-none opacity-50' => $disabled])
>
    <div x-on:click="count--" x-bind:class="{ 'pointer-events-none opacity-50': count <= {{ $min }} }" class="minus">
        <x-icon::minus type="mini" class="w-4 h-4" />
    </div>
    <input
        type="text"
        class="counter-input"
        x-model="count"
    />
    <div x-on:click="count++" x-bind:class="{ 'pointer-events-none opacity-50': count >= {{ $max }} }" class="plus">
        <x-icon::plus type="mini" class="w-4 h-4" />
    </div>
</div>

@props([
    'min' => 0,
    'max' => 100,
    'value' => null,
    'disabled' => false,
])

<div
    x-data="{ count: {{ $value ?? $min }} }"
    x-modelable="count"
    {{ $attributes }}
    @class([
        'flex flex-row flex-none w-32 h-9',
        'pointer-events-none opacity-50' => $disabled
    ])
>
    <div x-on:click="count--" x-bind:class="{ 'pointer-events-none opacity-50': count <= {{ $min }} }" class="flex items-center justify-center w-9 h-9 border-l border-y border-hint rounded-l-lg cursor-pointer">
        <x-icon::minus type="mini" class="w-4 h-4" />
    </div>
    <input
        type="text"
        class="flex items-center justify-center w-14 h-9 text-sm text-center border border-hint outline-none bg-transparent outline-0 focus:border-1 focus:border-hint focus:outline-0 focus:ring-0"
        x-model="count"
    />
    <div x-on:click="count++" x-bind:class="{ 'pointer-events-none opacity-50': count >= {{ $max }} }" class="flex items-center justify-center w-9 h-9 border-r border-y border-hint rounded-r-lg cursor-pointer">
        <x-icon::plus type="mini" class="w-4 h-4" />
    </div>
</div>

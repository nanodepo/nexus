@props([
    'name' => '',
    'min' => 0,
    'max' => 100,
    'value' => null,
    'disabled' => false,
])

<div
    x-data="{ count: {{ $value ?? 0 }} }"
    x-modelable="count"
    {{ $attributes }}
    @class([
        'flex flex-row flex-none w-32 h-9',
        'pointer-events-none opacity-50' => $disabled
    ])
>
    <div x-on:click="count--" x-bind:class="{ 'pointer-events-none opacity-50': count <= {{ $min }} }" class="flex items-center justify-center w-9 h-9 border-l border-y border-light-outline dark:border-dark-outline rounded-l-lg cursor-pointer">
        <x-icon::minus type="mini" class="w-4 h-4" />
    </div>
    <input
        type="text"
        class="flex items-center justify-center w-14 h-9 text-sm text-center border border-light-outline dark:border-dark-outline outline-none bg-transparent dark:bg-transparent"
        x-model="count"
    />
    <div x-on:click="count++" x-bind:class="{ 'pointer-events-none opacity-50': count >= {{ $max }} }" class="flex items-center justify-center w-9 h-9 border-r border-y border-light-outline dark:border-dark-outline rounded-r-lg cursor-pointer">
        <x-icon::plus type="mini" class="w-4 h-4" />
    </div>
</div>

@error(str($name)->replace('[', '.')->rtrim(']')->toString())
<div class="py-2 text-sm font-medium text-light-error dark:text-dark-error">{{ $message }}</div>
@enderror

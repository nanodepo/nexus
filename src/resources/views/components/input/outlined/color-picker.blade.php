@props([
    'name' => '',
    'label' => null,
    'type' => 'text',
    'value' => null,
    'required' => false,
    'disabled' => false,
])

@php
    $fieldName = str($name)->replace('[', '.')->rtrim(']')->toString();
    $error = $errors->has($fieldName) ? $errors->first($fieldName) : null;
@endphp

<div
    x-data="{
    @if($attributes->wire('model')->value)
        color: @entangle($attributes->wire('model')),
    @else
        color: @js($value ?? '#000000'),
    @endif
    colors: {
        gray: {
            light: '#9ca3af',
            dark: '#374151'
        },
        red: {
            light: '#f87171',
            dark: '#b91c1c'
        },
        orange: {
            light: '#fb923c',
            dark: '#c2410c'
        },
        green: {
            light: '#4ade80',
            dark: '#15803d'
        },
        blue: {
            light: '#60a5fa',
            dark: '#1d4ed8'
        },
        purple: {
            light: '#c084fc',
            dark: '#7e22ce'
        },
        pink: {
            light: '#f472b6',
            dark: '#be185d'
        },
    },
    setColor(color) {
        this.color = color
    }
}" class="flex flex-col w-full"
>

    <div @class([
        'relative w-full h-12 mb-3',
        'opacity-50' => $disabled
    ])>

        <input
            type="{{ $type }}"
            name="{{ $name }}"
            value="{{ $value }}"
            placeholder=" "
            maxlength="7"
            @class([
                'peer w-full h-full px-4 text-sm font-sans font-normal rounded border outline outline-0',
                'bg-transparent dark:bg-transparent text-light-on-surface dark:text-dark-on-surface border-light-outline dark:border-dark-outline border-t-transparent dark:border-t-transparent transition-all',
                'focus:outline-0 focus:border-2 focus:border-t-transparent dark:focus:border-t-transparent focus:border-light-primary dark:focus:border-dark-primary focus:ring-0',
                'placeholder-shown:border placeholder-shown:border-light-outline dark:placeholder-shown:border-dark-outline placeholder-shown:border-t-light-outline dark:placeholder-shown:border-t-dark-outline',
            ])
            @required($required)
            @disabled($disabled)
            x-model="color"
        />

        <x-input.outlined.label :label="$label" :required="$required" />

    </div>

    <div class="flex flex-row justify-start items-center">
        <label class="flex justify-center items-center flex-none w-16 h-16 mr-2 rounded cursor-pointer group" x-bind:style="{ backgroundColor: color }">
            <input type="color" x-model="color" class="w-0 h-0 opacity-0">
            <x-icon::swatch class="w-6 h-6 text-white dark:text-black transition drop-shadow" />
        </label>

        <div class="flex flex-row">

            <div class="flex flex-col mr-2">
                <div class="w-7 h-7 mb-2 rounded cursor-pointer" x-on:click="setColor(colors.gray.light)" x-bind:style="{ backgroundColor: colors.gray.light }"></div>
                <div class="w-7 h-7 rounded cursor-pointer" x-on:click="setColor(colors.gray.dark)" x-bind:style="{ backgroundColor: colors.gray.dark }"></div>
            </div>

            <div class="flex flex-col mr-2">
                <div class="w-7 h-7 mb-2 rounded cursor-pointer" x-on:click="setColor(colors.red.light)" x-bind:style="{ backgroundColor: colors.red.light }"></div>
                <div class="w-7 h-7 rounded cursor-pointer" x-on:click="setColor(colors.red.dark);" x-bind:style="{ backgroundColor: colors.red.dark }"></div>
            </div>

            <div class="flex flex-col mr-2">
                <div class="w-7 h-7 mb-2 rounded cursor-pointer" x-on:click="setColor(colors.orange.light)" x-bind:style="{ backgroundColor: colors.orange.light }"></div>
                <div class="w-7 h-7 rounded cursor-pointer" x-on:click="setColor(colors.orange.dark)" x-bind:style="{ backgroundColor: colors.orange.dark }"></div>
            </div>

            <div class="flex flex-col mr-2">
                <div class="w-7 h-7 mb-2 rounded cursor-pointer" x-on:click="setColor(colors.green.light)" x-bind:style="{ backgroundColor: colors.green.light }"></div>
                <div class="w-7 h-7 rounded cursor-pointer" x-on:click="setColor(colors.green.dark)" x-bind:style="{ backgroundColor: colors.green.dark }"></div>
            </div>

            <div class="flex flex-col mr-2">
                <div class="w-7 h-7 mb-2 rounded cursor-pointer" x-on:click="setColor(colors.blue.light)" x-bind:style="{ backgroundColor: colors.blue.light }"></div>
                <div class="w-7 h-7 rounded cursor-pointer" x-on:click="setColor(colors.blue.dark)" x-bind:style="{ backgroundColor: colors.blue.dark }"></div>
            </div>

            <div class="flex flex-col mr-2">
                <div class="w-7 h-7 mb-2 rounded cursor-pointer" x-on:click="setColor(colors.purple.light)" x-bind:style="{ backgroundColor: colors.purple.light }"></div>
                <div class="w-7 h-7 rounded cursor-pointer" x-on:click="setColor(colors.purple.dark)" x-bind:style="{ backgroundColor: colors.purple.dark }"></div>
            </div>

            <div class="flex flex-col">
                <div class="w-7 h-7 mb-2 rounded cursor-pointer" x-on:click="setColor(colors.pink.light)" x-bind:style="{ backgroundColor: colors.pink.light }"></div>
                <div class="w-7 h-7 rounded cursor-pointer" x-on:click="setColor(colors.pink.dark)" x-bind:style="{ backgroundColor: colors.pink.dark }"></div>
            </div>

        </div>
    </div>
</div>


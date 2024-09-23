@props([
    'name' => '',
    'label' => null,
    'type' => 'text',
    'value' => null,
    'required' => false,
    'disabled' => false,
    'hint' => null,
    'max' => 0,
])

@php
    $fieldName = str($name)->replace('[', '.')->rtrim(']')->toString();
    $error = $errors->has($fieldName) ? $errors->first($fieldName) : null;
@endphp

<div
    @if($attributes->wire('model')->value)
        x-data="{ field: @entangle($attributes->wire('model')) }"
    @else
        x-data="{ field: @js($value) }"
    @endif
>

    <div @class([
        'relative w-full h-12',
        'opacity-50' => $disabled
    ])>

        <input
            type="{{ $type }}"
            name="{{ $name }}"
            value="{{ $value }}"
            placeholder=" "
            @if($max > 0)
                maxlength="{{ $max }}"
            @endif
            {{ $attributes }}
            @class([
                'peer w-full h-full px-4 text-sm font-sans font-normal rounded border outline outline-0',
                'bg-transparent text-light-on-surface border-light-outline dark:text-dark-on-surface border-light-outline dark:border-dark-outline border-t-transparent dark:border-t-transparent transition-all',
                'focus:outline-0 focus:border-2 focus:border-t-transparent dark:focus:border-t-transparent focus:border-light-primary dark:focus:border-dark-primary focus:ring-0',
                'placeholder-shown:border placeholder-shown:border-light-outline dark:placeholder-shown:border-dark-outline placeholder-shown:border-t-light-outline dark:placeholder-shown:border-t-dark-outline',
            ])
            @required($required)
            @disabled($disabled)
            x-model="field"
        />

        <x-input.outlined.label :label="$label" :required="$required" />

    </div>

    @if(!is_null($error) || !is_null($hint) || $max > 0)
        <div x-data="{ max: @js($max) }" class="flex flex-row px-4 mt-1 text-xs tracking-wide text-light-on-surface-variant dark:text-dark-on-surface-variant">
            <div class="flex flex-col flex-auto">
                @if(!is_null($error))
                    <div class="mb-1 text-light-error dark:text-dark-error">{{ $error }}</div>
                @endif
                @if(!is_null($hint))
                    <div>{{ $hint }}</div>
                @endif
            </div>
            @if($max > 0)
                <div class="flex-none ml-2" x-text="field.toString().length+'/'+max"></div>
            @endif
        </div>
    @endif
</div>

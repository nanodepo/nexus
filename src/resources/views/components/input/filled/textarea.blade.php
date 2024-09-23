@props([
    'name' => '',
    'label' => null,
    'rows' => 4,
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
        'relative w-full bg-light-primary/5 hover:bg-light-primary/8 dark:bg-dark-primary/5 dark:hover:bg-dark-primary/8 rounded-t border-b border-light-outline dark:border-dark-outline transition',
        'opacity-50' => $disabled
    ])>

        <textarea
            rows="{{ $rows }}"
            name="{{ $name }}"
            placeholder=" "
            @if($max > 0)
                maxlength="{{ $max }}"
            @endif
            {{ $attributes->wire('model')->value ? $attributes->wire('model') : '' }}
            @class([
                'peer w-full h-full px-4 pb-0 pt-5 text-sm font-sans font-normal border-b border-t-0 border-x-0 outline outline-0',
                'bg-transparent text-light-on-surface dark:text-dark-on-surface border-transparent transition-all',
                'focus:outline-0 focus:border focus:border-t-0 focus:border-x-0 focus:border-light-primary dark:focus:border-dark-primary focus:ring-0',
            ])
            @required($required)
            @disabled($disabled)
            x-model="field"
            style="margin-bottom: -7px"
        >{{ $attributes->wire('model')->value ? null : $value }}</textarea>

        <x-input.filled.label :label="$label" :required="$required" />

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
                <div class="flex-none ml-2" x-text="field.length+'/'+max"></div>
            @endif
        </div>
    @endif
</div>

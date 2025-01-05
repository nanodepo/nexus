@props(['type' => 'text', 'label' => null, 'hint' => null])

@php
    $field = str($attributes->get('name', 'default'))->replace('[', '.')->rtrim(']')->toString();
    $error = $errors->has($field) ? $errors->first($field) : null;
@endphp

<div
    x-data="{ field: '' }"
    x-modelable="field"
    {{ $attributes->wire('model')->value ? $attributes->wire('model') : null }}
    class="flex flex-col w-full"
>
    <div @class(['field', 'opacity-50 pointer-events-none' => $attributes->get('disabled', false)])>

        <textarea
            x-model="field"
            type="{{ $type }}"
            {{ $attributes->wire('model')->directive ? $attributes->except($attributes->wire('model')->directive) : $attributes }}
            placeholder=" "
            class="textarea peer"
            style="margin-bottom: -7px"
        ></textarea>

        <x-ui::input.label :label="$label" :required="$attributes->get('required', false)" />
    </div>

    @if(!is_null($error) || is_string($hint) || $attributes->has('max'))
        <div class="flex flex-row px-4 mt-1 text-xs tracking-wide text-hint">
            <div class="flex flex-col flex-auto">
                @if(!is_null($error))
                    <div class="mb-1 text-error">{{ $error }}</div>
                @endif

                @if(!is_null($hint))
                    <div>{{ $hint }}</div>
                @endif
            </div>

            @if($attributes->has('max'))
                <div class="flex-none ml-2">
                    <span x-text="field.length"></span>
                    <span>/</span>
                    <span>{{ $attributes->get('max') }}</span>
                </div>
            @endif
        </div>
    @endif
</div>

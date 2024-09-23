@props([
    'name' => '',
    'label' => null,
    'type' => 'text',
    'value' => null,
    'placeholder' => 'Search...',
    'required' => false,
    'disabled' => false,
    'hint' => null,
    'max' => 0,
])

@php
    $fieldName = str($name)->replace('[', '.')->rtrim(']')->toString();
    $error = $errors->has($fieldName) ? $errors->first($fieldName) : null;
@endphp

<div>

    <div @class([
    'relative w-full h-10 bg-light-primary/5 hover:bg-light-primary/8 dark:bg-dark-primary/5 dark:hover:bg-dark-primary/8 rounded-full transition',
    'opacity-50' => $disabled
])>

        <input
            type="{{ $type }}"
            name="{{ $name }}"
            value="{{ $value }}"
            placeholder="{{ $placeholder }}"
            {{ $attributes }}
            @class([
                'peer w-full h-full px-4 py-0 text-sm font-sans font-normal border border-transparent outline outline-0 rounded-full',
                'bg-transparent text-light-on-surface dark:text-dark-on-surface border-transparent transition-all',
                'focus:outline-0 focus:border focus:border-light-primary dark:focus:border-dark-primary focus:ring-0',
            ])
            @required($required)
            @disabled($disabled)
        />

    </div>
</div>

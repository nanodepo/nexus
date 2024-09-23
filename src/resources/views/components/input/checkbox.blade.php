@props([
    'name' => '',
    'label' => null,
    'value' => null,
    'required' => false,
    'disabled' => false,
    'checked' => false,
    'hint' => null,
    'id' => null,
])

<label @class([
    'relative flex flex-row items-center cursor-pointer',
    'opacity-50' => $disabled
])>

    <input
        id="{{ $id }}"
        type="checkbox"
        name="{{ $name }}"
        value="{{ $value }}"
        {{ $attributes->wire('model') }}
        @required($required)
        @disabled($disabled)
        @checked($checked)
        class="w-5 h-5 {{ $label ? 'mr-3' : '' }} rounded bg-light-primary/8 dark:bg-dark-primary/8  text-light-primary dark:text-dark-primary border-light-outline dark:border-dark-outline focus:outline-none focus:border-light-primary dark:focus:border-dark-primary focus:ring-2 focus:ring-light-primary/38 dark:focus:ring-dark-primary/38 ring-offset-4 ring-offset-light-surface dark:ring-offset-dark-surface disabled:opacity-50 transition"
    />

    <x-input.label :label="$label" :required="$required" :hint="$hint" />

</label>

@error(str($name)->replace('[', '.')->rtrim(']')->toString())
<div class="py-2 text-sm font-medium text-light-error">{{ $message }}</div>
@enderror

@props([
    'value' => 1,
    'disabled' => false,
    'checked' => false,
    'type' => 'checkbox',
])

<label @class([
    'relative inline-flex items-center',
    'cursor-pointer' => !$disabled,
    'opacity-50 cursor-default' => $disabled
])>
    <input
        type="{{ $type }}"
        value="{{ $value }}"
        {{ $attributes->merge() }}
        class="sr-only peer"
        @disabled($disabled)
        @checked($checked)
    />
    <div class="switch"></div>
</label>

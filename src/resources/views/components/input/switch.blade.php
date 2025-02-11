@props([
    'id' => null,
    'name' => '',
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
        id="{{ $id }}"
        name="{{ $name }}"
        value="{{ $value }}"
        {{ $attributes->merge() }}
        class="sr-only peer"
        @disabled($disabled)
        @checked($checked)
    />
    <div class="w-11 h-6 bg-hint peer-focus:outline-none peer-focus:ring-0 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-section-separator after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-section-separator after:border-section-separator after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-button"></div>
</label>

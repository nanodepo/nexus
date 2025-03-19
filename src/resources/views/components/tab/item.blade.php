@props(['name', 'label', 'disabled' => false])

<a
    x-data="{ name: @js($name) }"
    class="flex justify-center flex-none py-1.5 {{ $disabled ? 'opacity-50 pointer-events-none' : '' }}"
    x-bind:class="{ 'border-b-2 border-accent text-accent font-medium': name == active, 'border-b-2 border-transparent hover:text-on-section cursor-pointer': name != active }"
    x-on:click="active = name"
    {{ $attributes }}
>
    <div class="py-1.5 px-4 hover:bg-accent/10 rounded-lg transition">
        {{ $label }}
    </div>
</a>

@props(['name', 'label'])

<a
    x-data="{ name: @js($name) }"
    class="flex justify-center flex-none py-1.5"
    x-bind:class="{ 'border-b-2 border-accent text-accent font-medium': name == active, 'border-b-2 border-transparent hover:text-on-section cursor-pointer': name != active }"
    x-on:click="active = name"
>
    <div class="py-1.5 px-4 hover:bg-accent/10 rounded-lg transition">
        {{ $label }}
    </div>
</a>

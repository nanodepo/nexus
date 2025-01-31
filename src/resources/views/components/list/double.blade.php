@props(['before', 'after'])

<x-ui::list.item {{ $attributes }}>
    <x-slot name="before">
        <x-dynamic-component :component="str($before)->prepend('icon::')->value()" />
    </x-slot>

    <x-slot name="after">
        <div class="text-hint group-hover:text-on-section transition">
            <x-dynamic-component :component="str($after)->prepend('icon::')->value()" />
        </div>
    </x-slot>
</x-ui::list.item>

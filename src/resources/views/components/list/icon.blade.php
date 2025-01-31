@props(['icon'])

<x-ui::list.item {{ $attributes }}>
    <x-slot name="before">
        <x-dynamic-component :component="str($icon)->prepend('icon::')->value()" />
    </x-slot>

    @if(isset($after) && $after->isNotEmpty())
        <x-slot name="after">
            {{ $after }}
        </x-slot>
    @endif
</x-ui::list.item>

@props(['icon', 'color' => 'primary'])

<x-ui::list.item {{ $attributes->class(['text-primary' => $color == 'primary', 'text-secondary' => $color == 'secondary', 'text-tertiary' => $color == 'tertiary', 'text-error' => $color == 'error']) }}>
    <x-slot name="before">
        <x-dynamic-component :component="str($icon)->prepend('icon::')->value()" />
    </x-slot>

    @if(isset($after) && $after->isNotEmpty())
        <x-slot name="after">
            {{ $after }}
        </x-slot>
    @endif
</x-ui::list.item>

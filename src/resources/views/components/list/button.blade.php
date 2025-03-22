@props(['icon', 'destructive' => false])

<x-ui::list.item {{ $attributes->class(['text-accent' => !$destructive, 'text-destructive' => $destructive]) }}>
    <x-slot name="before">
        <x-dynamic-component :component="str($icon)->prepend('icon::')->value()" />
    </x-slot>

    @if(isset($after) && $after->isNotEmpty())
        <x-slot name="after">
            {{ $after }}
        </x-slot>
    @endif
</x-ui::list.item>

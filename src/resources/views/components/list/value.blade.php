@props(['icon' => null, 'accent' => false])

<x-ui::list.item {{ $attributes }}>
    @if($icon)
        <x-slot name="before">
            <x-dynamic-component :component="str($icon)->prepend('icon::')->value()" />
        </x-slot>
    @endif

    <x-slot name="after">
        <div class="flex flex-row items-center justify-end {{ $accent ? 'link text-accent' : 'text-subtitle' }}">
            {{ $slot }}
        </div>
    </x-slot>
</x-ui::list.item>

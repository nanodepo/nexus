<x-ui::list.item
    {{ $attributes }}
    :truncate="false"
>
    @if(isset($before) && $before->isNotEmpty())
        <x-slot name="before">
            {{ $before }}
        </x-slot>
    @endif

    @if(isset($after) && $after->isNotEmpty())
        <x-slot name="after">
            {{ $after }}
        </x-slot>
    @endif
</x-ui::list.item>

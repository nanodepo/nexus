@props([
    'list' => false,
    'image' => null,
    'title' => null,
    'subtitle' => null,
    'text' => null,
    'label' => null,
    'labelIcon' => null,
    'labelColor' => 'primary',
])

<x-dynamic-component {{ $attributes }} :component="$list ? 'supports.card.list' : 'supports.card.layout'">

    @if($label)
        <x-slot name="label">
            <x-card.label :color="$labelColor" :icon="$labelIcon">{{ $label }}</x-card.label>
        </x-slot>
    @endif

    <x-slot name="image">
        <x-card.image :url="$image" :list="$list" />
    </x-slot>

    <x-slot name="content">
        <x-card.content :title="$title" :subtitle="$subtitle" :text="$text" :list="$list" />
    </x-slot>

    <x-slot name="footer">
        {{ $footer ?? $slot }}
    </x-slot>

</x-dynamic-component>

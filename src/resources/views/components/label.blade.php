@props(['title', 'color', 'icon' => null])

<div
    {{ $attributes->merge(['class' => 'label'])->class(['pl-1 pr-2' => !is_null($icon), 'px-2' => is_null($icon)]) }}
    style="background: {{ $color }}"
>
    @if(!is_null($icon))
        <div class="flex-none">
            <x-dynamic-component component="icon::{{ $icon }}" type="micro" />
        </div>
    @endif

    <div>{{ $title }}</div>
</div>

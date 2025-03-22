<div
    x-data="{ active: null }"
    x-modelable="active"
    {{ $attributes->merge(['class' => 'tabs']) }}
>
    {{ $slot }}
</div>

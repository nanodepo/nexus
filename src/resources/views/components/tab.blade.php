<div
    x-data="{ active: null }"
    x-modelable="active"
    {{ $attributes->merge(['class' => 'flex flex-row justify-around flex-auto items-end border-b border-section-separator text-sm text-subtitle overflow-x-auto overflow-y-hidden']) }}
>
    {{ $slot }}
</div>

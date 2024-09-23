<div {{ $attributes->merge([
    'class' => 'flex flex-row justify-between flex-auto items-end text-sm text-light-on-surface-variant dark:text-dark-on-surface-variant overflow-x-auto overflow-y-hidden'
]) }}>
    {{ $slot }}
</div>

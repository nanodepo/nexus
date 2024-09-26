<div {{ $attributes->merge([
    'class' => 'flex flex-row justify-around flex-auto items-end border-b border-light-primary/5 dark:border-dark-primary/12 text-sm text-light-on-surface-variant dark:text-dark-on-surface-variant overflow-x-auto overflow-y-hidden'
]) }}>
    {{ $slot }}
</div>

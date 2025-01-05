<nav {{ $attributes->merge(['class' => 'flex flex-col justify-between w-full rounded-r-3xl overflow-x-hidden overflow-y-auto text-light-on-surface-variant dark:text-dark-on-surface-variant']) }}>
    <div class="flex flex-col gap-1 w-full px-3 py-6">
        {{ $slot }}
    </div>
</nav>

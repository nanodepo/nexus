@props(['label', 'active' => false])

<a {{ $attributes->merge(['class' => 'flex justify-center flex-none py-1.5'])->class([
    'border-b-2 border-light-primary dark:border-dark-primary text-light-primary dark:text-dark-primary font-medium' => $active,
    'border-b-2 border-transparent text-light-on-surface-variant dark:text-dark-on-surface-variant hover:text-light-on-surface dark:hover:text-dark-on-surface cursor-pointer' => !$active
]) }}>
    <div class="py-1.5 px-4 hover:bg-light-primary/5 dark:hover:bg-dark-primary/5 rounded-lg transition">
        {{ $label }}
    </div>
</a>

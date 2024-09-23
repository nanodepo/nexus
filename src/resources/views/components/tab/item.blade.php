@props([
    'label',
    'active' => false,
])

<a
    {{
        $attributes->merge(['class' => 'flex justify-center shrink-0 grow basis-auto p-4'])
            ->class([
                '-mb-px border-b-2 border-light-primary dark:border-dark-primary text-light-on-surface dark:text-dark-on-surface font-medium' => $active,
                'border-b border-light-primary/12 dark:border-dark-primary/12 text-light-on-surface-variant dark:text-dark-on-surface-variant hover:text-light-on-surface dark:hover:text-dark-on-surface cursor-pointer' => !$active
            ])
    }}
>
    {{ $label }}
</a>

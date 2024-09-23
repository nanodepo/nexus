@props([
    'label' => null,
    'required' => false,
])

<label
    class="
        absolute -top-1.5 left-0 flex w-full h-full

        pointer-events-none select-none
        font-normal truncate leading-tight peer-focus:leading-tight peer-placeholder-shown:leading-[4.3]

        peer-placeholder-shown:text-light-on-surface-variant dark:peer-placeholder-shown:text-dark-on-surface-variant
        peer-disabled:text-light-on-surface-variant dark:peer-disabled:text-dark-on-surface-variant
        peer-disabled:peer-placeholder-shown:text-light-on-surface-variant dark:peer-disabled:peer-placeholder-shown:text-dark-on-surface-variant transition-all
        peer-placeholder-shown:text-sm text-xs peer-focus:text-xs

        before:content[' '] before:block before:box-border before:w-2.5 before:h-1.5
        before:mt-1.5 before:mr-1 peer-placeholder-shown:before:border-transparent
        before:rounded-tl before:border-t peer-focus:before:border-t-2 before:border-l
        peer-focus:before:border-l-2 before:pointer-events-none before:transition-all

        after:content[' '] after:block
        after:flex-grow after:box-border after:w-2.5 after:h-1.5 after:mt-1.5
        after:ml-1 peer-placeholder-shown:after:border-transparent after:rounded-tr
        after:border-t peer-focus:after:border-t-2 after:border-r peer-focus:after:border-r-2
        after:pointer-events-none after:transition-all

        text-light-on-surface-variant dark:text-dark-on-surface-variant peer-focus:text-light-primary dark:peer-focus:text-dark-primary

        before:border-light-outline dark:before:border-dark-outline peer-focus:before:!border-light-primary dark:peer-focus:before:!border-dark-primary
        after:border-light-outline dark:after:border-light-outline peer-focus:after:!border-light-primary dark:peer-focus:after:!border-dark-primary
    "
>
    @if(!is_null($label))
        {{ $label }}
        @if($required)
            <span class="ml-1 text-light-error dark:text-dark-error">*</span>
        @endif
    @endif
</label>

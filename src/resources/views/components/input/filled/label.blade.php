@props([
    'label' => null,
    'required' => false,
])

<label
    class="
        absolute top-1.5 left-0 flex w-full h-full px-4

        pointer-events-none select-none
        font-normal truncate leading-tight peer-focus:leading-tight peer-placeholder-shown:leading-[2.6]
        text-xs peer-placeholder-shown:text-sm peer-focus:text-xs

        peer-placeholder-shown:text-light-on-surface-variant dark:peer-placeholder-shown:text-dark-on-surface-variant
        peer-disabled:text-light-on-surface-variant dark:peer-disabled:text-dark-on-surface-variant
        peer-disabled:peer-placeholder-shown:text-light-on-surface-variant dark:peer-disabled:peer-placeholder-shown:text-dark-on-surface-variant

        text-light-on-surface-variant dark:text-dark-on-surface-variant peer-focus:text-light-primary dark:peer-focus:text-dark-primary
        transition-all
    "
>
    @if(!is_null($label))
        {{ $label }}
        @if($required)
            <span class="ml-1 text-light-error dark:text-dark-error">*</span>
        @endif
    @endif
</label>

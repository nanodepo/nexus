@props(['label' => null, 'required' => false])

<label class="label peer-focus:leading-tight peer-placeholder-shown:leading-[2.6] peer-placeholder-shown:text-sm peer-focus:text-xs peer-focus:text-light-primary dark:peer-focus:text-dark-primary">
    @if(!is_null($label))
        {{ $label }}
        @if($required)
            <span class="ml-1 text-light-error dark:text-dark-error">*</span>
        @endif
    @endif
</label>

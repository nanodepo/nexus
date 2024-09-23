@props([
    'label' => null,
    'required' => false,
    'hint' => null,
])

<div class="flex flex-row items-center relative" x-data="{ hint: false }">
    @if(!is_null($label))
        <div class="text-sm text-light-on-surface dark:text-dark-on-surface">
            {{ $label }}
            @if($required)
                <span class="text-light-error dark:text-dark-error">*</span>
            @endif
        </div>
    @endif

    @if(!is_null($hint))
        <div x-on:mouseenter="hint = true" x-on:mouseleave="hint = false">
            <x-icon::question-mark-circle type="solid" class="w-4 h-4 ml-2 text-light-on-surface-variant dark:text-dark-on-surface-variant" />
        </div>
        <div class="absolute bottom-6 px-4 py-2 text-xs bg-white dark:bg-black text-light-on-surface dark:text-dark-on-surface rounded cursor-help" x-show="hint" style="display: none">{{ $hint }}</div>
    @endif
</div>

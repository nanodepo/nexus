<x-ui::hint>
    <div {{ $attributes->merge(['class' => 'text-hint hover:text-on-section transition']) }}>
        <x-icon::question-mark-circle type="micro" />
    </div>

    <x-slot name="hint">
        {{ $slot }}
    </x-slot>
</x-ui::hint>


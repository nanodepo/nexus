<x-hint>
    <div class="ml-2 text-light-outline dark:text-dark-outline hover:text-light-on-surface dark:hover:text-dark-on-surface transition">
        <x-icon::question-mark-circle type="micro" />
    </div>

    <x-slot name="hint">
        {{ $slot }}
    </x-slot>
</x-hint>


<x-modal.confirmation
    wire:model="modal"
    :title="$title"
    :subtitle="$subtitle"
>
    <x-slot name="footer">
        <x-button.text icon="trash" color="error" wire:click="apply">
            {{ __('Удалить') }}
        </x-button.text>

        <x-button.filled icon="face-smile" wire:click="cancel">
            {{ __('Нет, вернуться') }}
        </x-button.filled>
    </x-slot>
</x-modal.confirmation>

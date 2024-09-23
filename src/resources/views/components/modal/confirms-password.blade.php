@props([
    'title' => __("Требуется подтверждение"),
    'subtitle' => __("Вы действительно хотите это сделать? Вероятнее всего, отменить его будет невозможно."),
    'button' => __("Подтвердить")
])

@php
    $confirmableId = md5($attributes->wire('then'));
@endphp

<span
    {{ $attributes->wire('then') }}
    x-data
    x-ref="span"
    x-on:click="$wire.startConfirmingPassword('{{ $confirmableId }}')"
    x-on:password-confirmed.window="setTimeout(() => $event.detail.id === '{{ $confirmableId }}' && $refs.span.dispatchEvent(new CustomEvent('then', { bubbles: false })), 250);"
>
    {{ $slot }}
</span>

@once
    <x-modal.confirmation
        wire:model.live="confirmingPassword"
        :title="$title"
        :subtitle="$subtitle"
    >

        <div class="mt-4" x-data="{}" x-on:confirming-password.window="setTimeout(() => $refs.confirmable_password.focus(), 250)">
            <x-input.filled.text
                type="password"
                name="confirmablePassword"
                label="{{ __('Пароль') }}"
                x-ref="confirmable_password"
                wire:model="confirmablePassword"
                wire:keydown.enter="confirmPassword"
            />
        </div>

        <x-slot name="footer">
            <x-button.text wire:click="stopConfirmingPassword">
                {{ __('Отменить') }}
            </x-button.text>

            <x-button.filled dusk="confirm-password-button" wire:click="confirmPassword">
                {{ $button }}
            </x-button.filled>
        </x-slot>
    </x-modal.confirmation>
@endonce

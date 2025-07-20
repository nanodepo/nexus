<?php

use Livewire\Volt\Component;

new class extends Component {
    public bool $mode = false;

    public function mount(): void
    {
        $this->mode = settings()->dark;
    }

    public function updatedMode($value): void
    {
        if (auth()->check()) {
            $user = auth()->user();
            $settings = $user->settings;
            $settings->dark = $value;
            $user->settings = $settings;
            $user->save();
        }
    }
} ?>

<div
    x-data="{ mode: $wire.entangle('mode').live }"
    x-init="$watch('mode', value => value ? document.documentElement.classList.add('dark') : document.documentElement.classList.remove('dark'))"
>
    <x-ui::circle
        x-on:click="mode = !mode"
        :icon="$mode ? 'sun' : 'moon'"
    />
</div>

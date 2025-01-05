<?php

use Livewire\Volt\Component;

new class extends Component {
    public bool $mode = false;

    public function mount(): void
    {
        $this->mode = auth()->user()->dark_mode;
    }

    public function updatedMode($value): void
    {
        auth()->user()->update(['dark_mode' => $value]);
    }
} ?>

<x-ui::circle
    x-data="{ mode: $wire.entangle('mode').live }"
    x-init="$watch('mode', value => value ? document.documentElement.classList.remove('dark') : document.documentElement.classList.add('dark'))"
    x-on:click="mode = !mode"
    :icon="auth()->user()?->dark_mode ? 'moon' : 'sun'"
/>

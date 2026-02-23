<?php

use Livewire\Attributes\On;
use Livewire\Volt\Component;

new class extends Component
{
    public string $type = 'secondary';
    public ?string $message = null;
    public bool $show = false;

    public function mount(): void
    {
        if (alert()->has()) {
            $this->make(
                type: alert()->get()->type(),
                message: alert()->get()->message()
            );
        }
    }

    #[On('makeAlert')]
    public function make(string $type, string $message): void
    {
        if ($type == 'error') {
            $this->type = 'destructive';
        } else {
            $this->type = $type;
        }
        $this->message = $message;
        $this->show = true;
        $this->dispatch('alert');
    }

    public function close(): void
    {
        $this->reset();
    }
} ?>

<div
    x-data="{
        show: false,
        timeout: null,
        showAlert() {
            clearTimeout(this.timeout);
            this.show = true;
            this.timeout = setTimeout(() => { this.show = false }, 5000);
        }
    }"
    x-init="
        @if(alert()->has())
            showAlert();
        @endif
    "
    x-on:alert="showAlert"
>
    <div
        x-show="show"
        style="display: none;"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 transform -translate-y-24 scale-80"
        x-transition:enter-end="opacity-100 transform translate-y-0 scale-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 transform scale-100 translate-y-0"
        x-transition:leave-end="opacity-0 transform scale-80 -translate-y-24"
        class="fixed left-1/2 top-0 -translate-x-1/2 flex flex-col justify-center items-center w-full max-w-md p-4 z-50 pointer-events-none"
    >
        <!-- bg-primary-container bg-secondary-container bg-tertiary-container bg-success-container bg-destructive-container -->
        <!-- text-on-primary-container text-on-secondary-container text-on-tertiary-container text-on-success-container text-on-destructive-container -->
        <div x-on:click="show = false" class="flex flex-row justify-between items-center gap-3 py-1 pr-2 pl-3 rounded-lg shadow-sm pointer-events-auto bg-{{ $type }}-container text-on-{{ $type }}-container">
            <div class="self-center  font-medium text-sm">{{ $message }}</div>
            <div class="flex flex-row justify-between items-center flex-none size-5 rounded-full cursor-pointer">
                <x-icon::x-mark type="micro" />
            </div>
        </div>
    </div>

</div>

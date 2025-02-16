<?php

use Livewire\Attributes\On;
use Livewire\Volt\Component;

new class extends Component
{
    public string $type = 'primary';
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
        $this->type = $type;
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
        x-transition:enter-start="opacity-0 transform translate-x-48 scale-80"
        x-transition:enter-end="opacity-100 transform translate-x-0 scale-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 transform scale-100 translate-y-0"
        x-transition:leave-end="opacity-0 transform scale-80 -translate-y-24"
        class="fixed right-0 top-0 flex flex-col justify-end items-end w-full max-w-md p-4 z-50 pointer-events-none"
    >
        <div @class([
            'flex flex-row justify-between items-start p-2 rounded-md shadow pointer-events-auto',
            'bg-button text-on-button' => $type != 'error',
            'bg-destructive text-white' => $type == 'error',
        ])>
            <div class="flex flex-row items-start">
                <div @class([
                    'p-2 rounded-lg',
                    'bg-on-button/10' => $type != 'error',
                    'bg-white/10' => $type == 'error',
                ])>
                    @if($type == 'error')
                        <x-icon::face-frown type="mini" />
                    @else
                        <x-icon::face-smile type="mini" />
                    @endif
                </div>
                <div class="self-center px-2 font-medium text-sm">{{ $message }}</div>
            </div>
            <x-ui::circle x-on:click="show = false" icon="x-mark" />
        </div>
    </div>

</div>

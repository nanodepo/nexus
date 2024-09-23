@props([
    'title' => null,
    'subtitle' => null,
    'footer' => null
])

<x-modal.base wire:model="{{ $attributes->wire('model')->value }}">
    <div class="flex flex-col items-center">
        <div class="flex justify-center items-center flex-none w-24 h-24 mb-6 bg-light-error dark:bg-dark-error text-light-on-error dark:text-dark-on-error rounded-full">
            <x-icon::finger-print class="w-12 h-12" />
        </div>
        <x-title
            :title="$title"
            :subtitle="$subtitle"
            class="text-center"
        />
    </div>

    @if(isset($slot))
        <div class="">
            {{ $slot }}
        </div>
    @endif

    @if(!is_null($footer))
        <x-slot name="footer">
            {{ $footer }}
        </x-slot>
    @endif
</x-modal.base>

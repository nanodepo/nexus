@props(['width' => 'max-w-lg'])

<x-ui::modal {{ $attributes }} class="items-end">
    <div
        x-show="modal"
        x-transition:enter="ease-out duration-300"
        x-transition:enter-start="opacity-0 translate-y-44"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="ease-in duration-200"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 translate-y-44"
        class="flex flex-col w-full {{ $width }} max-h-screen bg-section rounded-t-3xl overflow-hidden shadow-xl transform transition-all z-50"
    >

        <div class="flex items-center justify-center pt-3">
            <div x-on:click="modal = false" class="w-12 h-1 rounded bg-hint"></div>
        </div>

        <div class="flex flex-col p-6 overflow-auto">
            {{ $slot }}
        </div>

        @if(isset($footer) && $footer->isNotEmpty())
            <div class="flex flex-row items-center justify-between flex-none w-full py-3 px-6">
                {{ $footer }}
            </div>
        @endif

    </div>
</x-ui::modal>

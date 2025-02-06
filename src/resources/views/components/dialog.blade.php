@props(['width' => 'max-w-lg'])

<x-ui::modal {{ $attributes }} class="items-center">
    <div
        x-show="modal"
        x-transition:enter="ease-out duration-300"
        x-transition:enter-start="opacity-0 scale-75 -translate-y-20"
        x-transition:enter-end="opacity-100 scale-100 translate-y-0"
        x-transition:leave="ease-in duration-200"
        x-transition:leave-start="opacity-100 scale-100 translate-y-0"
        x-transition:leave-end="opacity-0 scale-75 -translate-y-20"
        class="flex flex-col w-full {{ $width }} max-h-modal py-3 bg-light-background dark:bg-dark-background rounded-3xl overflow-hidden shadow-modal transform transition-all z-50"
    >
        @if(isset($header) && $header->isNotEmpty())
            <div class="flex flex-row items-center justify-between flex-none w-full pb-3 px-6">
                {{ $header }}
            </div>
        @endif

        <div class="flex flex-col flex-auto w-full py-3 px-6 overflow-y-auto overflow-x-hidden">
            {{ $content ?? $slot }}
        </div>

        @if(isset($footer) && $footer->isNotEmpty())
            <div class="flex flex-row items-center justify-between flex-none w-full pt-3 px-6">
                {{ $footer }}
            </div>
        @endif
    </div>
</x-ui::modal>

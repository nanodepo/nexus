@props(['width' => 'max-w-lg', 'bottom' => true])

<x-ui::modal {{ $attributes }} class="{{ $bottom ? 'items-end' : 'items-start' }}">
    <div
        x-show="modal"
        x-transition:enter="ease-out duration-300"
        x-transition:enter-start="opacity-0 {{ $bottom ? 'translate-y-44' : '-translate-y-44' }}"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="ease-in duration-200"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 {{ $bottom ? 'translate-y-44' : '-translate-y-44' }}"
        class="sheet {{ $width }} {{ $bottom ? 'rounded-t-3xl' : 'rounded-b-3xl' }}"
    >
        @if($bottom)
            <div class="flex items-center justify-center">
                <div x-on:click="modal = false" class="w-12 h-1 rounded-sm bg-hint"></div>
            </div>
        @endif

        @if(isset($header) && $header->isNotEmpty())
            <div class="modal-header">
                {{ $header }}
            </div>
        @endif

        <div class="modal-content">
            {{ $content ?? $slot }}
        </div>

        @if(isset($footer) && $footer->isNotEmpty())
            <div class="modal-footer">
                {{ $footer }}
            </div>
        @endif

        @if(!$bottom)
            <div class="flex items-center justify-center">
                <div x-on:click="modal = false" class="w-12 h-1 rounded-sm bg-hint"></div>
            </div>
        @endif

    </div>
</x-ui::modal>

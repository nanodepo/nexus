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
        class="dialog {{ $width }}"
    >
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
    </div>
</x-ui::modal>

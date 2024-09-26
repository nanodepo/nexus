@props(['size' => 'max-w-2xl'])

<div
    x-data="{
        modal: false
    }"
    x-modelable="modal"
    x-on:close.stop="modal = false"
    x-on:keydown.escape.window="modal = false"
    x-show="modal"
    {{ $attributes }}
    class="fixed flex flex-row justify-center items-end inset-0 z-50"
    style="display: none;"
>

    <div
        x-show="modal"
        x-on:click="modal = false"
        x-transition:enter="ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 transform backdrop-blur-xs transition-all"
    >
        <div class="absolute inset-0 bg-light-surface-variant/50 dark:bg-dark-surface-variant/50"></div>
    </div>

    <div
        x-show="modal"
        x-transition:enter="ease-out duration-300"
        x-transition:enter-start="opacity-0 translate-y-44"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="ease-in duration-200"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 translate-y-44"
        class="flex flex-col w-full {{ $size }} max-h-modal bg-light-background dark:bg-dark-background rounded-t-3xl overflow-hidden shadow-modal transform transition-all z-50"
    >

        <div class="flex items-center justify-center pt-3">
            <div x-on:click="modal = false" class="w-12 h-0.5 bg-light-outline-variant dark:bg-dark-outline-variant"></div>
        </div>

        <div class="flex flex-col p-6 overflow-auto">
            {{ $slot }}
        </div>

        @if(isset($footer))
            <div class="flex flex-row items-center justify-between flex-none w-full py-4 px-6">
                {{ $footer }}
            </div>
        @endif

    </div>

</div>

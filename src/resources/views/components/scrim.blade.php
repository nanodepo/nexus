<div
    {{ $attributes }}
    x-cloak
    x-data="{ show: false }"
    x-modelable="show"
    x-show="show"
    x-on:click="show = false"
    x-transition:enter="ease-out duration-300"
    x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100"
    x-transition:leave="ease-in duration-200"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
    class="fixed inset-0 z-0 transform backdrop-blur-xs transition-all"
>
    <div class="absolute inset-0 bg-light-surface-variant/50 dark:bg-dark-surface-variant/50"></div>
</div>

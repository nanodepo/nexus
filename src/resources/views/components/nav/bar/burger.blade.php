@props(['title'])

<div x-on:click="drawer = !drawer" class="flex flex-col items-center basis-16 grow shrink-0 pt-3 pb-4 cursor-pointer">
    <div class="flex items-center justify-center w-16 h-8 text-light-on-surface-variant dark:text-dark-on-surface-variant rounded-full">
        <x-icon::bars-3 />
    </div>
    <div class="mt-1 text-base font-medium tracking-wide leading-6 text-light-on-surface-variant dark:text-dark-on-surface-variant">
        {{ $title }}
    </div>
</div>
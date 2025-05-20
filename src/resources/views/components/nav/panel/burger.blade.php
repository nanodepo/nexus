@props(['flexible' => false])

<div
    x-on:toggle-drawer="$store.drawer = !$store.drawer"
    x-on:click="$dispatch('toggle-drawer')"
    @if($flexible)
        x-bind:class="{ 'w-12 sm:w-22': !$store.drawer }"
    @endif
    class="flex flex-col items-center justify-center flex-none cursor-pointer"
>
    <div class="flex items-center justify-center w-12 h-12 text-subtitle rounded-full">
        <x-icon::bars-3 type="solid" class="w-8 h-8" />
    </div>
</div>

<div
    {{ $attributes->merge(['class' => 'fixed flex flex-row justify-center px-3 inset-0 z-10']) }}
    x-cloak
    x-data="{ modal: false, close: function () { this.modal = false } }"
    x-modelable="modal"
    x-on:close.stop="modal = false"
    x-on:keydown.escape.window="modal = false"
    x-show="modal"
>
    <x-ui::scrim x-model="modal" />

    {{ $slot }}
</div>

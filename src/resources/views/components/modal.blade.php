<div
    {{ $attributes->merge(['class' => 'modal']) }}
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

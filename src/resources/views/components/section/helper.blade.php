@props(['name'])

<x-ui::section
    x-data="{
        show: false,
        check: function(name) {
            if (name == '{{ $name }}') {
                this.show = true;
            }
        }
    }"
    x-show="show"
    x-on:open-helper.window="check($event.detail.name)"
    x-init="
        $watch('show', function(val) {
            let id = $store.helper.opened.indexOf('{{ $name }}');
            if (id == -1 && val) {
                $store.helper.attach('{{ $name }}');
            }
            if (id != -1 && !val) {
                $store.helper.detach('{{ $name }}');
            }
        });
    "
    {{ $attributes }}
>
    {{ $header ?? null }}

    <div class="hidden absolute top-1 right-10 flex flex-col items-center justify-center w-9 h-9" wire:loading.class.remove="hidden">
        <x-icon::cog6-tooth class="w-5 h-5 text-hint animate-loading" type="mini" />
    </div>

    <x-ui::circle x-on:click="show = false" icon="x-mark" class="absolute top-1 right-1" />

    {{ $slot }}
</x-ui::section>

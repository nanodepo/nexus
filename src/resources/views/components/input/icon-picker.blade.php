@php
    $icons = collect(Storage::disk('icons')->files())->map(function ($item) {
        return str($item)->remove('.php')->headline()->slug()->value();
    });
@endphp

<div
    {{ $attributes }}
    x-data="{ opened: false, icon: null }"
    x-modelable="icon"
    class="flex flex-col flex-none"
>
    <div x-on:click="opened = true">
        {{ $slot }}
    </div>

    <template x-teleport="body">
        <x-ui::dialog x-model="opened">
            <x-slot name="header">
                <x-ui::title
                    title="Выберите иконку"
                    subtitle="Иконки взяты из набора Heroicons"
                />
            </x-slot>

            <x-slot name="content">
                <div class="flex flex-row flex-wrap justify-center gap-1">
                    @foreach($icons as $i)
                        <div class="flex justify-center items-center w-10 h-10 text-subtitle hover:text-light-on-surface dark:hover:text-dark-on-surface border border-light-secondary/8 dark:border-dark-secondary/8 hover:border-light-secondary/12 dark:hover:border-dark-secondary/12 hover:bg-light-secondary/8 dark:hover:bg-dark-secondary/8 cursor-pointer transition">
                            <x-dynamic-component x-on:click="icon = '{{ $i }}'; opened = false" type="solid" :component="'icon::'.$i" class="w-8 h-8" />
                        </div>
                    @endforeach
                </div>
            </x-slot>
        </x-ui::dialog>
    </template>
</div>

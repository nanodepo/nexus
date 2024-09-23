@props([
    'label',
    'disabled' => false,
    'required' => false,
    'search' => false,
    'name',
    'items'
])

<div
    class="w-full"
    x-data="{
        opened: false,
        with_search: @js($search),
        search: '',
        value: '',
        has_livewire: @js($attributes->get('wire:model.live')),
        toggle: function() { this.opened = !this.opened },
        items: @js($items),
        checked: function(index) {
            const item = this.items[index];
            item.checked = !item.checked;

            const value = item.value;
            const values = this.value.split(',').filter(Boolean);

            if (item.checked) {
                values.push(value);
            } else {
                const valueIndex = values.indexOf(value);
                if (valueIndex > -1) {
                    values.splice(valueIndex, 1);
                }
            }

            this.value = values.join(',');

            if(this.has_livewire !== null) $wire.set(this.has_livewire, this.value)
        },
        get filteredItems() {
            const searchTerm = this.search.toLowerCase();
            return this.items.filter(item => item.title.toLowerCase().includes(searchTerm));
        }
    }"
    {{ $attributes->wire('model') }}
>
    <div
        @class([
            'relative w-full h-12 bg-light-primary/5 hover:bg-light-primary/8 dark:bg-dark-primary/5 dark:hover:bg-dark-primary/8 rounded-t border-b border-light-outline dark:border-dark-outline transition',
            'opacity-50' => $disabled
        ])
        :class="{ 'border-light-primary dark:border-dark-primary': focus }"
    >
        <div class="flex justify-between items-center px-2">
            <div class="text-sm">{{ $label }}</div>
            <x-navigation.top.icon x-on:click="toggle" icon="chevron-left" x-bind:class="{ '-rotate-90': opened }" />
        </div>
    </div>

    <div x-ref="options" x-show="opened" class="bg-light-primary/5 dark:bg-dark-primary/5 rounded-b max-h-52 overflow-y-auto" x-cloak>
        <div x-show="with_search" class="m-4">
            <x-input.text x-model="search" />
        </div>
        <template x-for="(item, index) in filteredItems" :key="index">
            <div x-on:click="checked(index)" class="flex justify-between cursor-pointer border-b border-transparent py-4 px-2 items-center hover:bg-light-primary/5 hover:dark:bg-dark-primary/5 ">
                <div class="flex gap-2 items-center">
                    <template x-if="item.image !== undefined">
                        <div class='w-10 h-10 flex-none bg-light-primary/12 dark:bg-dark-primary/12 rounded-full bg-center' :style="{ 'background-image': 'url('+item.image+')' }"></div>
                    </template>
                    <div class="flex flex-col items-center gap-2">
                        <div x-text="item.title"></div>
                        <template x-if="item.subtitle !== undefined">
                            <div  x-text="item.subtitle"></div>
                        </template>
                    </div>
                </div>
                <div class="w-5 h-5 rounded border-dark-primary border" :class="item.checked && 'bg-dark-primary'"></div>
            </div>
        </template>
    </div>

    <input hidden x-model="value" type="text" name="{{ $name }}" />

</div>

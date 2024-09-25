@php
    $ref = str(str()->random(8))->prepend('dropdown');
@endphp

<div
    x-data="{ open: false }"
    x-modelable="open"
    {{ $attributes->merge()->class(['pointer-events-none cursor-default opacity-50' => $attributes->has('disabled')]) }}
>
    <div x-on:click="open = !open" x-ref="{{ $ref }}" {{ $trigger->attributes }}>
        {{ $trigger }}
    </div>

    <template x-teleport="body">
        <div
            x-show="open"
            x-anchor="$refs.{{ $ref }}"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="transform opacity-0 scale-95"
            x-transition:enter-end="transform opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-75"
            x-transition:leave-start="transform opacity-100 scale-100"
            x-transition:leave-end="transform opacity-0 scale-95"
            x-on:click.away="open = false"
            x-on:close.stop="open = false"
            {{ $content->attributes->merge(['class' => 'absolute z-50 mt-1 rounded-md shadow-lg']) }}
        >
            <div class="py-1 bg-white dark:bg-black  text-light-on-surface dark:text-dark-on-surface rounded-md">
                {{ $content }}
            </div>
        </div>
    </template>
</div>

@php
    $ref = str(str()->random(8))->prepend('dropdown');
@endphp

<div
    x-data="dropdown"
    x-modelable="open"
    {{ $attributes->class(['pointer-events-none cursor-default opacity-50' => $attributes->has('disabled')]) }}
>
    <div x-bind="trigger" x-ref="{{ $ref }}" {{ $trigger->attributes }}>
        {{ $trigger }}
    </div>

    <template x-teleport="body">
        <div
            x-bind="dialogue"
            x-anchor.offset.10="$refs.{{ $ref }}"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="transform opacity-0 scale-95 -translate-y-4"
            x-transition:enter-end="transform opacity-100 scale-100 translate-y-0"
            x-transition:leave="transition ease-in duration-75"
            x-transition:leave-start="transform opacity-100 scale-100 translate-y-0"
            x-transition:leave-end="transform opacity-0 scale-95 -translate-y-4"
            {{ $content->attributes->merge(['class' => 'absolute z-50']) }}
        >
            <div class="dropdown">
                {{ $content }}
            </div>
        </div>
    </template>
</div>

@props([
    'name' => '',
    'value' => null,
    'disabled' => false,
])

<div
    x-data="{
        time: '00:00',
        value: @js($value)
    }"
    x-init="
        if(value !== null) time = value;

        $watch('time', value => {
            const split = value.split(':')
            const hours = parseInt(split[0]);
            const minutes = parseInt(split[1]);

            if (hours > 23 || minutes > 59) {
                time = '23:59';
            }
        })
    "
    x-modelable="time"
    {{ $attributes }}
>
    <x-chip.input
        icon="clock"
        :action="false"
        :disabled="$disabled"
    >
        <x-slot name="text">
            <input
                @if($disabled) disabled @endif
                name="{{ $name }}"
                x-mask="99:99"
                class="px-0 py-0 border-0 outline-none bg-transparent w-10"
                x-model="time"
            />
        </x-slot>
    </x-chip.input>
</div>

@props([
    'name' => '',
    'value' => null,
    'disabled' => false,
    'minute_step' => 15,
])

<div
    x-data="{
        time: @js($value)
    }"
    x-modelable="time"
    {{ $attributes }}
>
    <x-dropdown>
        <x-slot name="trigger">
            <x-chip.dropdown icon="clock">
                <x-slot name="text">
                    <span x-text="time"></span>
                </x-slot>
            </x-chip.dropdown>
        </x-slot>

        <x-slot name="content">
            <div class="max-h-36 overflow-y-auto w-24">
                @php($end_time = now()->copy()->startOfDay()->addDay()->subMinutes($minute_step))
                @for($time = now()->copy()->startOfDay(); $time <= $end_time; $time->addMinutes($minute_step))
                    <x-dropdown.item
                        id="time_{{ $time->format('H:i') }}"
                        x-on:click="time = '{{ $time->format('H:i') }}'"
                        x-bind:class="{ 'dark:bg-dark-primary bg-light-primary': time === '{{ $time->format('H:i') }}' }"
                    >
                        <span x-bind:class="{ 'dark:text-dark-on-primary text-light-on-primary': time === '{{ $time->format('H:i') }}' }">
                            {{ $time->format('H:i') }}
                        </span>
                    </x-dropdown.item>
                @endfor
            </div>
        </x-slot>
    </x-dropdown>

    <input name="{{ $name }}" hidden x-model="time" />
</div>

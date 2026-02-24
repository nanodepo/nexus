@php
    use NanoDepo\Nexus\Theme\ThemeRegistry;
    $palette = ThemeRegistry::colors();
    $first = reset($palette);
    $defaultColor = is_string($first) ? $first : '#9a9a9a';
@endphp

<div
    {{ $attributes }}
    x-data="{
        color: @js($defaultColor),
        setColor(color) {
            this.color = color;
        }
    }"
    x-modelable="color"
    class="flex flex-row justify-start items-center"
>
    <label
        class="flex justify-center items-center flex-none w-16 h-16 mr-2 rounded-sm cursor-pointer group"
        x-bind:style="{ backgroundColor: color }"
    >
        <input
            type="color"
            x-model="color"
            class="w-0 h-0 opacity-0"
        >
        <div class="flex flex-col items-center justify-center gap-1 text-on-background transition drop-shadow-sm">
            <x-icon::pencil-square type="solid" />
            <div
                x-text="color"
                class="text-xs font-medium"
            ></div>
        </div>
    </label>

    <div class="grid grid-cols-7 gap-2">
        @foreach ($palette as $name => $value)
            <div
                class="w-7 h-7 rounded-sm cursor-pointer"
                x-on:click="setColor(@js($value))"
                title="{{ $name }}"
                style="background-color: {{ $value }};"
            ></div>
        @endforeach
    </div>
</div>

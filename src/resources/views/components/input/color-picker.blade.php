@php
    $paletteRaw = config('nexus.palette', []);
    $palette = [];
    if (is_array($paletteRaw)) {
        foreach ($paletteRaw as $name => $value) {
            if (is_array($value)) {
                $hex = $value['light'] ?? $value['dark'] ?? (is_string(reset($value)) ? reset($value) : null);
            } else {
                $hex = $value;
            }
            if (is_string($hex)) {
                $palette[$name] = $hex;
            }
        }
    }
    $first = is_array($palette) ? reset($palette) : null;
    $defaultColor = is_string($first) ? $first : '#9a9a9a';
@endphp

<div
    {{ $attributes }}
    x-data="{
        color: @js($defaultColor),
        colors: @js($palette),
        setColor(color) {
            this.color = color;
        }
    }"
    x-modelable="color"
    class="flex flex-row justify-start items-center"
>
    <label class="flex justify-center items-center flex-none w-16 h-16 mr-2 rounded-sm cursor-pointer group" x-bind:style="{ backgroundColor: color }">
        <input type="color" x-model="color" class="w-0 h-0 opacity-0">
       <div class="flex flex-col items-center justify-center gap-1 text-on-background transition drop-shadow-sm">
           <x-icon::pencil-square type="solid" />
           <div x-text="color" class="text-xs font-medium"></div>
       </div>
    </label>

    <div class="grid grid-cols-7 gap-2">
        <template x-for="(value, name) in colors" :key="name">
            <div
                class="w-7 h-7 rounded-sm cursor-pointer"
                x-on:click="setColor(value)"
                x-bind:title="name"
                x-bind:style="{ backgroundColor: value }"
            ></div>
        </template>
    </div>
</div>

<div
    {{ $attributes }}
    x-data="{
        color: '#9a9a9a',
        colors: {
            gray: { light: '#9ca3af', dark: '#374151' },
            red: { light: '#f87171', dark: '#b91c1c' },
            orange: { light: '#fb923c', dark: '#c2410c' },
            green: { light: '#4ade80', dark: '#15803d' },
            blue: { light: '#60a5fa', dark: '#1d4ed8' },
            purple: { light: '#c084fc', dark: '#7e22ce' },
            pink: { light: '#f472b6', dark: '#be185d' }
        },
        setColor(color) {
            this.color = color;
        }
    }"
    x-modelable="color"
    class="flex flex-row justify-start items-center"
>
    <label class="flex justify-center items-center flex-none w-16 h-16 mr-2 rounded-sm cursor-pointer group" x-bind:style="{ backgroundColor: color }">
        <input type="color" x-model="color" class="w-0 h-0 opacity-0">
        <x-icon::swatch type="solid" class="w-6 h-6 text-white dark:text-black transition drop-shadow-sm" />
    </label>

    <div class="flex flex-row gap-2">
        <template x-for="c in colors">
            <div class="flex flex-col gap-2">
                <div class="w-7 h-7 rounded-sm cursor-pointer" x-on:click="setColor(c.light)" x-bind:style="{ backgroundColor: c.light }"></div>
                <div class="w-7 h-7 rounded-sm cursor-pointer" x-on:click="setColor(c.dark)" x-bind:style="{ backgroundColor: c.dark }"></div>
            </div>
        </template>
    </div>
</div>

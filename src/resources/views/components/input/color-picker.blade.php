<div
    {{ $attributes }}
    x-data="{
        color: '#9a9a9a',
        colors: {
            red: { light: '#cc241d', dark: '#d24416' },
            orange: { light: '#d65d0e', dark: '#d77d10' },
            yellow: { light: '#d79921', dark: '#b79917' },
            green: { light: '#98971a', dark: '#7b9c41' },
            aqua: { light: '#689d62', dark: '#47937b' },
            blue: { light: '#458588', dark: '#6a7bad' },
            purple: { light: '#b16286', dark: '#c9405e' }
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
       <div class="flex flex-col items-center justify-center gap-1 text-on-background transition drop-shadow-sm">
           <x-icon::pencil-square type="solid" />
           <div x-text="color" class="text-xs font-medium"></div>
       </div>
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

@props([
    'name' => '',
    'label' => null,
    'value' => null,
    'disabled' => false,
])

<label
    x-data="{
        preview: @js($value ? Storage::disk('images')->url($value) : null),
        name: null
    }"
    @class([
        'flex flex-col justify-center items-center w-full h-full text-light-on-surface-variant dark:text-dark-on-surface-variant hover:text-light-on-surface dark:hover:text-dark-on-surface bg-light-primary/8 dark:bg-dark-primary/8 hover:bg-light-primary/12 dark:hover:bg-dark-primary/12 border border-dashed border-light-outline dark:border-dark-outline bg-cover bg-center overflow-hidden rounded-2xl transition cursor-pointer',
        'opacity-50 pointer-events-none' => $disabled
    ])
    x-bind:style="{ backgroundImage: 'url('+preview+')', backgroundSize: 'cover' }"
>

    <x-icon::paper-clip x-show="!preview" class="w-6 h-6" />
    @if($label)
        <div x-show="!preview" class="mt-2 text-center text-sm font-medium text-light-on-surface-variant dark:text-dark-on-surface-variant">{{ $label }}</div>
    @endif

    <input
        type="file"
        name="{{ $name }}"
        @disabled($disabled)
        class="hidden"
        @if($attributes->wire('model')->value)
            wire:model.defer="{{ $attributes->wire('model')->value }}"
        @endif
        x-ref="image"
        x-on:change="
            name = $refs.image.files[0].name;
            const reader = new FileReader();
            reader.onload = (e) => {
                preview = e.target.result;
            };
            reader.readAsDataURL($refs.image.files[0]);
        "
    />

    <div
        x-show="preview"
        x-on:click="name = null; preview = null;"
        class="flex flex-col justify-center items-center w-full h-full bg-light-error-container/75 dark:bg-dark-error-container/75 text-light-on-error-container dark:text-dark-on-error-container opacity-0 hover:opacity-100 transition"
        style="display: none"
    >
        <x-icon::trash class="w-6 h-6" />
    </div>

</label>

{{--@error(str($name)->replace('[', '.')->rtrim(']')->toString())--}}
{{--    <div class="py-2 text-sm font-medium text-light-error dark:text-dark-error">{{ $message }}</div>--}}
{{--@enderror--}}

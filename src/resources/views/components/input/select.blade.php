<div class="flex flex-col gap-1 flex-auto">
    <select {{ $attributes->merge(['class' => 'input peer']) }}>
        {{ $slot }}
    </select>

    @if($attributes->wire('model'))
        @error($attributes->wire('model')->value)
            <div class="validation-error">{{ $message }}</div>
        @enderror
    @endif
</div>

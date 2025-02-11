<div class="flex flex-col flex-auto">
    <select {{ $attributes->merge(['class' => 'input peer']) }}>
        {{ $slot }}
    </select>

    @if($attributes->wire('model'))
        @error($attributes->wire('model')->value)
            <div class="text-xs tracking-wide text-destructive">{{ $message }}</div>
        @enderror
    @endif
</div>

@props(['type' => 'text'])

<div class="flex flex-col flex-auto">
    <input type="{{ $type }}" {{ $attributes->merge(['class' => 'input']) }} />
    @if($attributes->wire('model'))
        @error($attributes->wire('model')->value)
            <div class="px-3 mt-1 text-xs tracking-wide text-destructive">{{ $message }}</div>
        @enderror
    @endif
</div>

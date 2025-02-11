<div class="flex flex-col flex-auto">
    <textarea {{ $attributes->merge(['class' => 'input']) }}>{{ $slot }}</textarea>
    @if($attributes->wire('model'))
        @error($attributes->wire('model')->value)
            <div class="text-xs tracking-wide text-destructive">{{ $message }}</div>
        @enderror
    @endif
</div>

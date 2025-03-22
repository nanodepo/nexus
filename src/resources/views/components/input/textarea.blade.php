<div class="flex flex-col gap-1 flex-auto">
    <textarea {{ $attributes->merge(['class' => 'input']) }}>{{ $slot }}</textarea>
    @if($attributes->wire('model'))
        @error($attributes->wire('model')->value)
            <div class="validation-error">{{ $message }}</div>
        @enderror
    @endif
</div>

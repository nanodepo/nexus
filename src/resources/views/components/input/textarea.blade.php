<div class="flex flex-col flex-auto">
    <textarea {{ $attributes->merge(['class' => 'm-0 px-3 py-2 bg-secondary rounded-md border border-section-separator hover:border-hint outline-0 focus:border-accent focus:outline-0 focus:ring-2 focus:ring-gray/30 disabled:opacity-50 disabled:pointer-events-none transition']) }}>{{ $slot }}</textarea>
    @if($attributes->wire('model'))
        @error($attributes->wire('model')->value)
            <div class="text-xs tracking-wide text-destructive">{{ $message }}</div>
        @enderror
    @endif
</div>

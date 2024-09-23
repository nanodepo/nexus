<option {{ $attributes->merge(['class' => 'text-light-on-surface dark:text-dark-on-surface bg-light-background dark:bg-dark-background']) }}>
    {{ $slot }}
</option>

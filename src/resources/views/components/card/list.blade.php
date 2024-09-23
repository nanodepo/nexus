<a {{ $attributes->merge(['class' => 'relative flex flex-row flex-auto h-28 bg-light-primary/5 dark:bg-dark-primary/5 hover:bg-light-primary/8 dark:hover:bg-dark-primary/8 hover:shadow-light-2 rounded-lg transition overflow-hidden']) }}>
    @if(isset($label))
        {{ $label }}
    @endif

    @if(isset($image))
        {{ $image }}
    @endif

    <div class="flex flex-col w-full p-3 overflow-hidden">
        @if(isset($content))
            {{ $content }}
        @endif

        @if(isset($footer))
            {{ $footer }}
        @endif
    </div>
</a>

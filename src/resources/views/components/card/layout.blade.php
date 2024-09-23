<a {{ $attributes->merge(['class' => 'relative flex flex-col flex-auto pb-6 bg-light-primary/5 dark:bg-dark-primary/5 hover:bg-light-primary/8 dark:hover:bg-dark-primary/8 hover:shadow-light-2 rounded-2xl transition overflow-hidden']) }}>
    @if(isset($label))
        {{ $label }}
    @endif

    <div class="flex flex-col flex-auto space-y-6">
        @if(isset($header))
            {{ $header }}
        @endif

        @if(isset($image))
            {{ $image }}
        @endif

        @if(isset($content))
            {{ $content }}
        @endif

        @if(isset($footer))
            {{ $footer }}
        @endif
    </div>
</a>

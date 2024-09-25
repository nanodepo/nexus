@props([
    'image' => null,
    'title' => null,
    'subtitle' => null,
    'text' => null,
])

<a {{ $attributes->merge(['class' => 'relative flex flex-col flex-auto pb-6 bg-light-primary/5 dark:bg-dark-primary/5 hover:bg-light-primary/8 dark:hover:bg-dark-primary/8 hover:shadow-light-2 rounded-2xl transition overflow-hidden']) }}>
    @if(isset($label))
        {{ $label }}
    @endif

    <div class="flex flex-col flex-auto gap-6 {{ (is_null($image) && !isset($header)) ? 'pt-6' : '' }} overflow-hidden">
        @if(isset($header))
            <x-ui::card.header>{{ $header }}</x-ui::card.header>
        @endif

        @if(is_string($image))
            <x-ui::card.image :url="$image" />
        @elseif($image?->isNotEmpty())
            {{ $image }}
        @endif

        @if(isset($content))
            <x-ui::card.content>{{ $content }}</x-ui::card.content>
        @else
            <x-ui::card.content :title="$title" :subtitle="$subtitle" :text="$text" />
        @endif

        @if($slot->isNotEmpty())
            {{ $slot }}
        @endif

        @if(isset($footer))
            <x-ui::card.footer>{{ $footer }}</x-ui::card.footer>
        @endif
    </div>
</a>

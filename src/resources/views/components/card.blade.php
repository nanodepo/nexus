@props(['image' => null, 'title' => null, 'subtitle' => null, 'text' => null])

<a {{ $attributes->merge(['class' => 'card']) }}>
    <div class="flex flex-col flex-auto gap-3 {{ (is_null($image) && !isset($header)) ? 'pt-3' : '' }}">
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

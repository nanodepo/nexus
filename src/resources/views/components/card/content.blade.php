@props(['title' => null, 'subtitle' => null, 'text' => null])

<div class="content">
    @if($slot->isEmpty())
        @if($title)
            <div class="title">{{ $title }}</div>
        @endif
        @if($subtitle)
            <div class="subtitle">{{ $subtitle }}</div>
        @endif
        @if($text)
            <div class="text">{{ $text }}</div>
        @endif
    @else
        {{ $slot }}
    @endif
</div>

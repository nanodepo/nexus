@props(['title' => null, 'subtitle' => null, 'text' => null])

<div class="flex flex-col flex-auto gap-1 px-4">
    @if($slot->isEmpty())
        @if($title)
            <div class="text-base font-medium truncate text-on-section">
                {{ $title }}
            </div>
        @endif
        @if($subtitle)
            <div class="line-clamp-3 text-sm text-subtitle">
                {{ $subtitle }}
            </div>
        @endif
        @if($text)
            <div class="line-clamp-3 text-xs text-subtitle">
                {{ $text }}
            </div>
        @endif
    @else
        {{ $slot }}
    @endif
</div>

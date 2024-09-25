@props(['title' => null, 'subtitle' => null, 'text' => null])

<div class="flex flex-col flex-auto px-6 space-y-2">
    @if($slot->isEmpty())
        @if($title)
            <div class="text-lg font-medium truncate text-light-on-surface dark:text-dark-on-surface">
                {{ $title }}
            </div>
        @endif
        @if($subtitle)
            <div class="line-clamp-3 text-sm text-light-on-surface-variant dark:text-dark-on-surface-variant">
                {{ $subtitle }}
            </div>
        @endif
        @if($text)
            <div class="line-clamp-3 text-xs text-light-on-surface-variant dark:text-dark-on-surface-variant">
                {{ $text }}
            </div>
        @endif
    @else
        {{ $slot }}
    @endif
</div>

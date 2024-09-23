@props([
    'title' => null,
    'subtitle' => null,
    'text' => null,
    'list' => false,
])

<div class="flex flex-col flex-auto {{ $list ? 'space-y-1' : 'px-6 space-y-2' }}">
    @if($slot->isEmpty())
        @if($title)
            <div class="{{ $list ? 'text-base' : 'text-lg' }}  font-medium truncate text-light-on-surface dark:text-dark-on-surface">
                {{ $title }}
            </div>
        @endif
        @if($subtitle)
            <div class="{{ $list ? 'line-clamp-1' : 'line-clamp-3' }} text-sm text-light-on-surface-variant dark:text-dark-on-surface-variant">
                {{ $subtitle }}
            </div>
        @endif
        @if($text)
            <div class="{{ $list ? 'line-clamp-1' : 'line-clamp-3' }} text-xs text-light-on-surface-variant dark:text-dark-on-surface-variant">
                {{ $text }}
            </div>
        @endif
    @else
        {{ $slot }}
    @endif
</div>

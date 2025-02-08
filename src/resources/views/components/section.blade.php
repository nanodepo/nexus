@props(['disabled' => false, 'color' => null])

<div {{ $attributes->merge(['class' => 'relative flex flex-col flex-none w-full py-3 overflow-hidden sm:rounded-2xl'])->class([
    'bg-section text-on-section' => is_null($color),
    'bg-light-primary-container dark:bg-dark-primary-container text-light-on-primary-container dark:text-dark-on-primary-container' => $color == 'primary',
    'bg-light-secondary-container dark:bg-dark-secondary-container text-light-on-secondary-container dark:text-dark-on-secondary-container' => $color == 'secondary',
    'bg-light-tertiary-container dark:bg-dark-tertiary-container text-light-on-tertiary-container dark:text-dark-on-tertiary-container' => $color == 'tertiary',
    'bg-light-error-container dark:bg-dark-error-container text-light-on-error-container dark:text-dark-on-error-container' => $color == 'error',
    'opacity-50 pointer-events-none' => $disabled,
]) }}>
    @if(isset($header) && $header->isNotEmpty())
        <div {{ $header->attributes->merge(['class' => 'flex flex-row justify-between px-6']) }}>
            {{ $header }}
        </div>
    @endif

    @if(isset($content) && $content->isNotEmpty())
        <div {{ $content->attributes->merge(['class' => 'flex-auto overflow-hidden px-6 py-3 sm:rounded-2xl']) }}>
            {{ $content }}
        </div>
    @elseif(isset($slot) && $slot->isNotEmpty())
        <div class="flex-auto overflow-hidden">
            {{ $slot }}
        </div>
    @endif

    @if(isset($footer) && $footer->isNotEmpty())
        <div {{ $footer->attributes->merge(['class' => 'flex flex-row justify-between px-6']) }}>
            {{ $footer }}
        </div>
    @endif
</div>

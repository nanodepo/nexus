@props([
    'title',
    'subtitle' => null,
    'icon' => null,
    'type' => 'secondary',
])

<div {{ $attributes->merge(['class' => 'flex flex-col']) }}>
    <div @class([
        'flex flex-row justify-between items-center gap-3 py-1 px-3',
        'bg-light-primary-container dark:bg-dark-primary-container text-light-on-primary-container dark:text-dark-on-primary-container' => $type == 'primary',
        'bg-light-secondary-container dark:bg-dark-secondary-container text-light-on-secondary-container dark:text-dark-on-secondary-container' => $type == 'secondary',
        'bg-light-tertiary-container dark:bg-dark-tertiary-container text-light-on-tertiary-container dark:text-dark-on-tertiary-container' => $type == 'tertiary',
        'bg-light-error-container dark:bg-dark-error-container text-light-on-error-container dark:text-dark-on-error-container' => $type == 'error',
    ])>
        <div class="flex flex-row items-center flex-auto gap-3">
            @if($icon)
                <div @class([
                    'p-2 rounded-full',
                    'bg-light-on-primary/8 dark:bg-dark-on-primary/8' => $type == 'primary',
                    'bg-light-on-secondary/8 dark:bg-dark-on-secondary/8' => $type == 'secondary',
                    'bg-light-on-tertiary/8 dark:bg-dark-on-tertiary/8' => $type == 'tertiary',
                    'bg-light-on-error/8 dark:bg-dark-on-error/8' => $type == 'error',
                ])>
                    <x-dynamic-component component="icon::{{ $icon }}" type="solid" />
                </div>
            @endif

            <div class="flex flex-col justify-center flex-auto">
                <div class="font-medium text-sm">{{ $title }}</div>
                @if($subtitle)
                    <div class="text-xs">{{ $subtitle }}</div>
                @endif
            </div>
        </div>

        @if($slot->isNotEmpty())
            <div class="flex-none">
                {{ $slot }}
            </div>
        @endif
    </div>
</div>

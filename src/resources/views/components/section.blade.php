@props([
    'title' => null,
    'subtitle' => null,
    'action' => null,
    'disabled' => false,
])

<div {{ $attributes->merge(['class' => 'relative flex flex-col flex-none w-full text-light-on-surface dark:text-dark-on-surface bg-light-primary/5 dark:bg-dark-primary/5 overflow-hidden sm:rounded-2xl'])->class(['opacity-50 pointer-events-none' => $disabled]) }}>
    <div class="flex flex-col w-full flex-auto overflow-hidden">
        @if(isset($header))
            <div class="flex flex-col pt-3">
                {{ $header }}
            </div>
        @endif

        <div class="flex-auto overflow-hidden p-6">
            {{ $content ?? $slot }}
        </div>

        @if(isset($footer))
            <div class="flex flex-row justify-between px-6 pb-3">
                {{ $footer }}
            </div>
        @endif
    </div>
</div>

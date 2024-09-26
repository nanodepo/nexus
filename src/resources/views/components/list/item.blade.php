@props([
    'title',
    'subhead' => null,
    'subtitle' => null,
    'description' => null,
    'active' => false,
    'disabled' => false,
])

<div @class([
    'flex flex-row items-center flex-auto gap-6 px-6 py-3 hover:bg-light-primary/8 dark:hover:bg-dark-primary/8 transition',
    'bg-section' => $active,
    'pointer-events-none opacity-50' => $disabled,
])>

    @if(isset($before) && $before->isNotEmpty())
        <div class="flex-none">
            {{ $before }}
        </div>
    @endif

    <a {{ $attributes->merge(['class' => 'flex flex-col flex-auto overflow-hidden'])->class(['group' => array_key_exists('href', $attributes->getAttributes())]) }}>
        @if($subhead)
            <div class="tracking-wide leading-6 text-sm text-hint truncate">{{ $subhead }}</div>
        @endif

        <div class="leading-6 font-medium tracking-wide truncate text-on-section group-hover:text-light-primary dark:group-hover:text-dark-primary group-hover:underline transition">{{ $title }}</div>

        @if($subtitle)
            <div class="inline-flex flex-row items-center space-x-2 tracking-wide leading-6 text-sm text-subtitle truncate">{{ $subtitle }}</div>
        @endif

        @if($description)
            <div class="tracking-wide leading-5 text-xs text-hint truncate">{{ $description }}</div>
        @endif
    </a>

    @if(isset($after) && $after->isNotEmpty())
        <div class="flex flex-row items-center justify-end flex-none">
            {{ $after }}
        </div>
    @endif
</div>

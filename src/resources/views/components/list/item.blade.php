@props([
    'title',
    'subhead' => null,
    'subtitle' => null,
    'description' => null,
    'badge' => false,
    'active' => false,
    'disabled' => false,
    'truncate' => true,
])

<a {{ $attributes->merge(['class' => 'group flex flex-row flex-auto gap-6 px-6 py-3 hover:bg-light-primary/8 dark:hover:bg-dark-primary/8 overflow-hidden transition cursor-pointer'])->class(['items-center' => $truncate, 'pointer-events-none opacity-50' => $disabled, 'bg-light-primary/5 dark:bg-dark-primary/5' => $active]) }}>

    @if(isset($before) && $before->isNotEmpty())
        <div {{ $before->attributes->merge(['class' => 'flex-none']) }}>
            {{ $before }}
        </div>
    @endif

    <div class="flex flex-col flex-auto overflow-hidden">
        @if($subhead)
            <div class="tracking-wide leading-6 text-sm text-hint truncate">{{ $subhead }}</div>
        @endif

        <div class="flex flex-row items-center">
            <div class="leading-6 font-medium tracking-wide {{ $truncate ? 'truncate' : '' }} {{ $attributes->has('href') ? 'group-hover:text-light-primary dark:group-hover:text-dark-primary group-hover:underline' : '' }} transition">{{ $title }}</div>
            @if($badge)
                <div class="w-1.5 h-1.5 ml-2 rounded-full bg-primary"></div>
            @endif
        </div>

        @if($subtitle)
            <div class="inline-flex flex-row items-center space-x-2 tracking-wide leading-6 text-sm text-subtitle {{ $truncate ? 'truncate' : '' }}">{{ $subtitle }}</div>
        @endif

        @if($description)
            <div class="tracking-wide leading-5 text-xs text-hint {{ $truncate ? 'truncate' : '' }}">{{ $description }}</div>
        @endif
    </div>

    @if(isset($after) && $after->isNotEmpty())
        <div {{ $after->attributes->merge(['class' => 'flex flex-row items-center justify-end flex-none']) }}>
            {{ $after }}
        </div>
    @endif
</a>

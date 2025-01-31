@props([
    'type',
    'title',
    'subhead' => null,
    'subtitle' => null,
    'description' => null,
    'badge' => false,
    'disabled' => false,
    'truncate' => true,
])

<label @class([
    'flex flex-row flex-auto gap-6 px-6 py-3 hover:bg-light-primary/8 dark:hover:bg-dark-primary/8 overflow-hidden transition cursor-pointer',
    'items-center' => $truncate,
    'pointer-events-none opacity-50' => $disabled,
])>

    <div class="flex-none">
        <input
            {{ $attributes }}
            type="{{ $type }}"
            class="w-5 h-5 rounded bg-light-primary/8 dark:bg-dark-primary/8  text-light-primary dark:text-dark-primary border-light-outline dark:border-dark-outline focus:outline-none focus:border-light-primary dark:focus:border-dark-primary focus:ring-2 focus:ring-light-primary/38 dark:focus:ring-dark-primary/38 ring-offset-4 ring-offset-light-surface dark:ring-offset-dark-surface disabled:opacity-50 transition"
        />
    </div>

    <div class="flex flex-col flex-auto overflow-hidden">
        @if($subhead)
            <div class="tracking-wide leading-6 text-sm text-hint truncate">{{ $subhead }}</div>
        @endif

        <div class="flex flex-row items-center">
            <div class="leading-6 font-medium tracking-wide {{ $truncate ? 'truncate' : '' }} transition">{{ $title }}</div>
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
        <div class="flex flex-row items-center justify-end flex-none">
            {{ $after }}
        </div>
    @endif
</label>

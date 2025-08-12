@props([
    'title',
    'subhead' => null,
    'subtitle' => null,
    'description' => null,
    'badge' => false,
    'disabled' => false,
    'truncate' => true,
])

<label @class(['item', 'items-center' => $truncate, 'pointer-events-none opacity-50' => $disabled])>

    <div class="flex flex-col items-center justify-center flex-none w-6 h-6">
        <x-ui::input.radio {{ $attributes }} />
    </div>

    <div class="flex flex-col flex-auto overflow-hidden">
        @if($subhead)
            <div class="subhead">{{ $subhead }}</div>
        @endif

        <div class="flex flex-row items-center">
            <div @class(['title', 'truncate' => $truncate])>{{ $title }}</div>
            @if($badge)
                <div class="list-badge"></div>
            @endif
        </div>

        @if($subtitle)
            <div @class(['subtitle', 'truncate' => $truncate])>{{ $subtitle }}</div>
        @endif

        @if($description)
            <div @class(['description', 'truncate' => $truncate])>{{ $description }}</div>
        @endif
    </div>

    @if(isset($after) && $after->isNotEmpty())
        <div class="flex flex-row items-center justify-end flex-none">
            {{ $after }}
        </div>
    @endif
</label>

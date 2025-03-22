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

<a {{ $attributes->merge(['class' => 'group item'])->class(['items-center' => $truncate, 'pointer-events-none opacity-50' => $disabled, 'active' => $active]) }}>

    @if(isset($before) && $before->isNotEmpty())
        <div {{ $before->attributes->merge(['class' => 'flex-none']) }}>
            {{ $before }}
        </div>
    @endif

    <div class="flex flex-col flex-auto overflow-hidden">
        @if($subhead)
            <div class="subhead">{{ $subhead }}</div>
        @endif

        <div class="flex flex-row items-center">
            <div @class(['title', 'truncate' => $truncate, 'link' => $attributes->has('href')])>{{ $title }}</div>
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
        <div {{ $after->attributes->merge(['class' => 'flex flex-row items-center justify-end flex-none']) }}>
            {{ $after }}
        </div>
    @endif
</a>

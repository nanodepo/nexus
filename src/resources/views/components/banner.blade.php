@props([
    'title',
    'subtitle' => null,
    'icon' => null,
    'color' => 'default',
])

<div {{ $attributes->merge(['class' => 'flex flex-col']) }}>
    <div @class(['banner', $color])>
        <div class="flex flex-row items-center flex-auto gap-3">
            @if($icon)
                <div class="p-2 rounded-full">
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

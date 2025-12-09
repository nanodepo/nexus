<div {{ $attributes->merge(['class' => 'flex flex-row items-center justify-between flex-none h-16.5 gap-3']) }}>
    @if(isset($left) && $left->isNotEmpty())
        <div {{ $left->attributes->merge(['class' => 'flex flex-row items-center']) }}>
            {{ $left }}
        </div>
    @endif

    @if(isset($center) && $center->isNotEmpty())
        <div {{ $center->attributes->merge(['class' => 'flex flex-row items-center flex-auto']) }}>
            {{ $center }}
        </div>
    @endif

    @if(isset($right) && $right->isNotEmpty())
        <div {{ $right->attributes->merge(['class' => 'flex flex-row items-center']) }}>
            {{ $right }}
        </div>
    @endif
</div>

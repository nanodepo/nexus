<div {{ $attributes->merge(['class' => 'flex flex-col flex-auto container gap-6 overflow-hidden']) }}>
    @if(isset($breadcrumbs) && $breadcrumbs->isNotEmpty())
        <div class="flex flex-col px-3 overflow-hidden">
            {{ $breadcrumbs }}
        </div>
    @endif

    <div class="flex flex-col sm:flex-row flex-auto overflow-hidden">
        @if(isset($left) && $left->isNotEmpty())
            <div {{ $left->attributes->merge(['class' => 'flex flex-col sm:basis-76 gap-6 sm:px-3 pb-6 overflow-hidden']) }}>
                {{ $left }}
            </div>
        @endif

        @if(isset($content) && $content->isNotEmpty())
            <div {{ $content->attributes->merge(['class' => 'flex flex-col flex-auto gap-6 sm:px-3 pb-6 overflow-hidden']) }}>
                {{ $content }}
            </div>
        @endif

        @if(isset($right) && $right->isNotEmpty())
            <div {{ $right->attributes->merge(['class' => 'flex flex-col sm:basis-76 gap-6 sm:px-3 pb-6 overflow-hidden']) }}>
                {{ $right }}
            </div>
        @endif
    </div>
</div>

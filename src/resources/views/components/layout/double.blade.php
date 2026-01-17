<div {{ $attributes->merge(['class' => 'flex flex-col flex-auto container gap-6 overflow-hidden']) }}>
    @if(isset($breadcrumbs) && $breadcrumbs->isNotEmpty())
        <div class="flex flex-col px-3 overflow-hidden">
            {{ $breadcrumbs }}
        </div>
    @endif

    <div class="flex flex-col sm:flex-row flex-auto overflow-hidden">
        @if(isset($left) && $left->isNotEmpty())
            <div class="flex flex-col flex-auto sm:basis-1/2 sm:grow-0 gap-6 sm:px-3 pb-6 overflow-hidden">
                {{ $left }}
            </div>
        @endif

        @if(isset($right) && $right->isNotEmpty())
            <div class="flex flex-col flex-auto sm:basis-1/2 sm:grow-0 gap-6 sm:px-3 pb-6 overflow-hidden">
                {{ $right }}
            </div>
        @endif
    </div>
</div>

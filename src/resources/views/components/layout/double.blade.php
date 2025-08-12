<div x-data="{ size: 664 }" {{ $attributes->merge(['class' => 'flex flex-col flex-auto gap-3 overflow-hidden']) }}>
    @if(isset($breadcrumbs) && $breadcrumbs->isNotEmpty())
        <div class="flex flex-col px-3 overflow-hidden">
            {{ $breadcrumbs }}
        </div>
    @endif

    <div x-bind:class="{ 'flex-row': width >= size, 'flex-col': width < size }" class="flex flex-auto sm:px-1.5 overflow-hidden">
        @if(isset($left) && $left->isNotEmpty())
            <div x-bind:class="{ 'basis-1/2 grow-0': width >= size, 'flex-auto': width < size }" class="flex flex-col gap-3 sm:px-1.5 pb-3 overflow-hidden">
                {{ $left }}
            </div>
        @endif

        @if(isset($right) && $right->isNotEmpty())
            <div x-bind:class="{ 'basis-1/2 grow-0': width >= size, 'flex-auto': width < size }" class="flex flex-col gap-3 sm:px-1.5 pb-3 overflow-hidden">
                {{ $right }}
            </div>
        @endif
    </div>
</div>

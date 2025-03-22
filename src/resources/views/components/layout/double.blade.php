<div class="flex flex-col flex-auto gap-3 overflow-hidden">
    @if(isset($breadcrumbs) && $breadcrumbs->isNotEmpty())
        <div class="flex flex-col px-3 overflow-hidden">
            {{ $breadcrumbs }}
        </div>
    @endif

    <div x-bind:class="{ 'flex-row': width >= 664, 'flex-col': width < 664 }" class="flex flex-auto sm:px-1.5 overflow-hidden">
        @if(isset($left) && $left->isNotEmpty())
            <div x-bind:class="{ 'basis-1/2 grow-0': width >= 664, 'flex-auto': width < 664 }" class="flex flex-col gap-3 sm:px-1.5 pb-3 overflow-hidden">
                {{ $left }}
            </div>
        @endif

        @if(isset($right) && $right->isNotEmpty())
            <div x-bind:class="{ 'basis-1/2 grow-0': width >= 664, 'flex-auto': width < 664 }" class="flex flex-col gap-3 sm:px-1.5 pb-3 overflow-hidden">
                {{ $right }}
            </div>
        @endif
    </div>
</div>

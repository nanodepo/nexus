<div class="flex flex-col flex-auto gap-3 overflow-hidden">
    @if(isset($breadcrumbs) && $breadcrumbs->isNotEmpty())
        <div class="flex flex-col px-3 overflow-hidden">
            {{ $breadcrumbs }}
        </div>
    @endif

    <div class="flex flex-col flex-auto gap-3 sm:px-3 pb-3 overflow-hidden">
        {{ $content }}
    </div>
</div>

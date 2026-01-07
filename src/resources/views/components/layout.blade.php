<div class="flex flex-col flex-auto gap-6 overflow-hidden">
    @if(isset($breadcrumbs) && $breadcrumbs->isNotEmpty())
        <div class="flex flex-col px-6 overflow-hidden">
            {{ $breadcrumbs }}
        </div>
    @endif

    <div class="flex flex-col flex-auto gap-6 sm:px-6 pb-6 overflow-hidden">
        {{ $content }}
    </div>
</div>
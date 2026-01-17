<div {{ $attributes->merge(['class' => 'flex flex-col flex-auto container gap-6 overflow-hidden']) }}>
    @if(isset($breadcrumbs) && $breadcrumbs->isNotEmpty())
        <div class="flex flex-col px-3 overflow-hidden">
            {{ $breadcrumbs }}
        </div>
    @endif

    <div class="flex flex-col flex-auto items-center overflow-hidden">
        <div class="flex flex-col flex-auto w-full gap-6 sm:px-3 pb-6 overflow-hidden">
            {{ $content }}
        </div>
    </div>
</div>

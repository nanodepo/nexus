<div {{ $attributes->merge(['class' => 'relative flex flex-row flex-auto sm:px-3']) }}>
    <div x-bind:class="{ 'w-22': !$store.drawer, 'w-64 xl:w-72 2xl:w-80': $store.drawer }" class="relative hidden sm:flex flex-col flex-none transition-all">
        {{ $drawer }}
    </div>

    <main x-data="container" x-ref="container" class="relative flex flex-col flex-auto overflow-hidden">
        {{ $slot }}
    </main>

    <div class="relative flex-none bg-background sm:bg-transparent" x-bind:class="{ 'w-0': !$store.helper.on, 'w-full sm:w-64 xl:w-72 2xl:w-80': $store.helper.on }">
        <div x-bind:class="{ 'hidden': !$store.helper.on }" class="sticky top-4 flex flex-col flex-auto gap-3 px-3 sm:px-0">
            {{ $helper }}
        </div>
    </div>
</div>

<nav class="fixed top-0 bottom-0 left-0 flex flex-col justify-between w-80 sm:w-88 h-screen rounded-r-3xl overflow-y-auto text-light-on-surface-variant dark:text-dark-on-surface-variant bg-light-surface-container dark:bg-dark-surface-container lg:bg-transparent dark:lg:bg-transparent">
    <div class="flex flex-col w-full px-3 py-6">
        {{ $content }}
    </div>

    <div>
        {{ $footer ?? null }}
    </div>
</nav>

<x-app-layout>

    <div class="flex flex-col xl:flex-row -m-3 sm:py-6">
        <div class="flex flex-col flex-auto w-full p-3">
            {{ $slot }}
        </div>

        <div class="flex flex-row flex-wrap xl:flex-col w-full xl:max-w-xs p-6 sm:p-0">
            {{ $pane }}
        </div>
    </div>

</x-app-layout>

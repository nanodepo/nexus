<x-app-layout>

    <div class="flex flex-col md:flex-row sm:h-screen -mx-3 sm:overflow-hidden">
        <div @class([
            'flex-col w-full sm:h-screen md:max-w-xs sm:py-6 px-1',
            'flex' => $visibleList,
            'hidden md:flex' => !$visibleList,
        ])>
            <div class="flex flex-col flex-auto px-2 sm:overflow-y-auto">
                {{ $list }}
            </div>
        </div>

        <div @class([
            'flex-col flex-auto w-full sm:h-screen sm:py-6 px-1',
            'flex' => !$visibleList,
            'hidden md:flex' => $visibleList,
        ])>
            <div class="flex flex-col flex-auto px-2 sm:overflow-y-auto">
                {{ $slot }}
            </div>
        </div>
    </div>

</x-app-layout>

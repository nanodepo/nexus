@props(['title' => null, 'subtitle' => null])

<x-ui::dialog {{ $attributes }}>
    <div class="flex flex-col items-center">
        <div class="flex justify-center items-center flex-none w-24 h-24 my-6 bg-light-error dark:bg-dark-error text-light-on-error dark:text-dark-on-error rounded-full">
            <x-icon::finger-print class="w-12 h-12" />
        </div>

        <x-ui::header :title="$title" :subtitle="$subtitle" class="text-center" />
    </div>

    @if(isset($slot) && $slot->isNotEmpty())
        <div class="flex flex-col">
            {{ $slot }}
        </div>
    @endif

    @if(isset($footer) && $footer->isNotEmpty())
        <x-slot name="footer">
            {{ $footer }}
        </x-slot>
    @endif
</x-ui::dialog>

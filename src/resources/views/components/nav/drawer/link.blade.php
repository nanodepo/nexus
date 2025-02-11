@props(['label', 'icon', 'active' => false, 'small' => false, 'badge' => null])

@if(!$small)
    <a
        {{ $attributes }}
        @class([
            'flex flex-row items-center justify-between flex-auto h-14 pl-4 pr-6 rounded-full transition cursor-pointer overflow-hidden',
            'text-on-section bg-secondary' => $active,
            'text-subtitle hover:bg-secondary hover:text-on-section' => !$active
        ])
    >
        <div class="flex flex-row items-center flex-auto overflow-hidden">
            <div class="flex-none">
                <x-dynamic-component :component="str($icon)->prepend('icon::')->value()" :type="$active ? 'solid' : 'outline'" />
            </div>
            <div class="pl-3 text-sm tracking-wide leading-5 truncate {{ $active ? 'font-bold' : 'font-medium' }}">
                {{ $label }}
            </div>
        </div>
        <div class="flex-none text-sm tracking-wide leading-5 font-medium">{{ $badge }}</div>
    </a>
@else
    <a {{ $attributes }} class="flex flex-col items-center basis-16 grow shrink-0 pr-3 pl-4 overflow-hidden">
        <div class="flex items-center justify-center flex-none w-16 h-8 {{ $active ? 'text-on-section bg-secondary' : 'text-on-section' }}  rounded-full">
            <x-dynamic-component :component="str('icon::')->append($icon)->value()" :type="$active ? 'solid' : 'outline'" />
        </div>
        <div class="mt-1 text-base font-medium tracking-wide leading-6 truncate {{ $active ? 'text-on-section' : 'text-subtitle' }}">
            {{ $label }}
        </div>
    </a>
@endif

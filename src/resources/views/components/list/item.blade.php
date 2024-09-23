@props([
    'title' => '',
    'subtitle' => null,
    'active' => false,
    'disabled' => false,
])

<div @class([
    'flex flex-row items-center flex-auto px-6 hover:bg-light-primary/5 dark:hover:bg-dark-primary/5 transition',
    'bg-light-primary/8 dark:bg-dark-primary/8' => $active,
    'pointer-events-none opacity-50' => $disabled,
])>

    <a {{ $attributes->merge(['class' => 'flex flex-row flex-auto items-center w-full h-14 overflow-hidden'])->class(['group' => array_key_exists('href', $attributes->getAttributes())]) }}>
        @if(isset($object))
            <div class="flex-none">
                {{ $object }}
            </div>
        @endif

        <div @class([
            'flex flex-col flex-auto w-full overflow-hidden',
            'pl-3' => isset($object),
            'pr-3' => isset($action)
        ])>
            <div class="inline-block w-full text-sm font-medium tracking-wide truncate text-light-on-surface dark:text-dark-on-surface group-hover:text-light-primary dark:group-hover:text-dark-primary group-hover:underline transition">
                {{ $title }}
            </div>
            @if(!is_null($subtitle))
                <div class="inline-block h-5 w-full mt-1 text-xs tracking-wide truncate text-light-on-surface-variant dark:text-dark-on-surface-variant">
                    {{ $subtitle }}
                </div>
            @endif
        </div>
    </a>

    @if(isset($action))
        <div class="flex-none">
            {{ $action }}
        </div>
    @endif

</div>

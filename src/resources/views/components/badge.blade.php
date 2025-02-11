@props(['color' => 'error'])

<div @class([
    'flex flex-row items-center justify-center h-4 px-1.5 leading-none text-xs font-medium tracking-tighter rounded-full',
    'text-on-button bg-button' => $color == 'primary',
    'text-on-button bg-destructive' => $color == 'error',
])>
    {{ $slot }}
</div>

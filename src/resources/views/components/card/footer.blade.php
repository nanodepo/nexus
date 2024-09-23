@props([
    'list' => false,
])

<div class="flex flex-row flex-none items-center justify-between {{ $list ? '' : 'px-6' }}">
    {{ $slot }}
</div>

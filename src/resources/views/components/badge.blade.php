@props(['destructive' => false])

<div class="flex flex-row items-center justify-center h-4 px-1.5 {{ $destructive ? 'bg-destructive' : 'bg-button' }} text-on-button leading-none text-xs font-medium tracking-tighter rounded-full">
    {{ $slot }}
</div>

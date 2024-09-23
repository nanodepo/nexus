@props(['url' => null, 'is_online' => false])
<div class="relative">
    <div {{ $attributes->merge(['class' => 'relative flex items-center justify-center flex-none text-light-on-surface-variant dark:text-dark-on-surface-variant bg-light-primary/12 dark:bg-dark-primary/12 rounded-full bg-center']) }} style="background-size: cover; background-image: url('{{ $url }}')">
        @if(is_null($url))
            <x-icon::user type="mini" />
        @endif
    </div>
    @if($is_online)
        <div class="absolute bottom-0 right-0 w-3 h-3 border-2 border-light-background dark:border-dark-background rounded-full bg-light-primary dark:bg-dark-primary"></div>
    @endif
</div>

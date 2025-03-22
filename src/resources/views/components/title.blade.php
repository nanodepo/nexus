@props(['title', 'subtitle' => null, 'destructive' => false])

<div {{ $attributes->merge(['class' => 'other']) }}>
    <div @class(['title', 'destructive' => $destructive])>{{ $title }}</div>
    @if(!is_null($subtitle))
        <div class="subtitle">{{ $subtitle }}</div>
    @endif
</div>

@props(['title', 'subtitle' => null])

<div {{ $attributes->merge(['class' => 'header']) }}>
    <div class="header-title">{{ $title }}</div>
    @if(!is_null($subtitle))
        <div class="header-subtitle">{{ $subtitle }}</div>
    @endif
</div>

@props(['url' => null, 'is_online' => false, 'icon' => 'user'])
<div class="relative">
    <div {{ $attributes->merge(['class' => 'avatar']) }} style="background-size: cover; background-image: url('{{ $url }}')">
        @if(is_null($url))
            <x-dynamic-component component="icon::{{ $icon }}" type="mini" />
        @endif
    </div>
    @if($is_online)
        <div class="online"></div>
    @endif
</div>

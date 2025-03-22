@props(['icon', 'text' => null, 'destructive' => false])

<div {{ $attributes->merge(['class' => 'meta'])->class(['text-destructive' => $destructive]) }}>
    <x-dynamic-component component="icon::{{ $icon }}" type="micro" />
    @if($text)
        <div>{{ $text }}</div>
    @endif
</div>



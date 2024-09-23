@props([
    'aspect' => 'aspect-video',
    'url' => asset('images/500.svg'),
    'list' => false,
])

<div
    class="flex justify-center items-center flex-none {{ $list ? 'aspect-square lg:aspect-video' : $aspect }} bg-center {{ $list ? 'rounded-lg' : 'rounded-2xl' }}"
    style="background-size: cover; background-image: url('{{ $url }}')"
></div>

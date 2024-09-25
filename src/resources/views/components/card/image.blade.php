@props([
    'aspect' => 'aspect-video',
    'url' => asset('images/500.svg'),
])

<div
    class="flex justify-center items-center flex-none {{ $aspect }} bg-center rounded-2xl"
    style="background-size: cover; background-image: url('{{ $url }}')"
></div>

@props(['aspect' => 'aspect-video', 'url' => asset('images/500.svg')])

<div @class(['image', $aspect]) style="background-size: cover; background-image: url('{{ $url }}')"></div>

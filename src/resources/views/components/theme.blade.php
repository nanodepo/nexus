<style>
    html {
        @foreach(config('theme.light') as $name => $color)
            {{ str('--tg-theme-:name-color: :color;')->replace(':name', $name)->replace(':color', $color)->value() }}
        @endforeach
    }
    html.dark {
        @foreach(config('theme.dark') as $name => $color)
            {{ str('--tg-theme-:name-color: :color;')->replace(':name', $name)->replace(':color', $color)->value() }}
        @endforeach
    }
</style>

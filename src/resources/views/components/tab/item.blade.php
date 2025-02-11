@props(['label', 'active' => false])

<a {{ $attributes->merge(['class' => 'flex justify-center flex-none py-1.5'])->class([
    'border-b-2 border-accent text-accent font-medium' => $active,
    'border-b-2 border-transparent hover:text-on-section cursor-pointer' => !$active
]) }}>
    <div class="py-1.5 px-4 hover:bg-accent/10 rounded-lg transition">
        {{ $label }}
    </div>
</a>

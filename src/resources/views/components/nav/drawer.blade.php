<nav {{ $attributes->merge(['class' => 'drawer']) }}>
    <div class="nav-content">
        {{ $slot }}
    </div>
</nav>

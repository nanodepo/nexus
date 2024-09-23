@props([
    'progress' => 0,
    'text' => true,
])

<div {{ $attributes->merge(['class' => 'relative']) }}>
    <svg class="w-full h-full" viewBox="0 0 100 100">
        <!-- Background circle -->
        <circle
            class="text-light-primary/8 dark:text-dark-primary/8 stroke-current"
            stroke-width="5"
            cx="50"
            cy="50"
            r="40"
            fill="transparent"
        ></circle>
        <!-- Progress circle -->
        <circle
            class="text-light-primary dark:text-dark-primary progress-ring stroke-current"
            stroke-width="5"
            stroke-linecap="round"
            cx="50"
            cy="50"
            r="40"
            fill="transparent"
            stroke-dashoffset="{{ lerp(400, 150, $progress / 100) }}"
        ></circle>
    </svg>

    <div class="absolute top-0 right-0 bottom-0 left-0 flex justify-center items-center w-full h-full">
        <div class="text-sm font-bold">
            {{ $progress }}
            @if($text)
                %
            @endif
        </div>
    </div>
</div>

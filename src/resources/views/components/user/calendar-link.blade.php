@php use Domains\User\Models\User; @endphp
@props([
    'user' => null,
    'presence'
])
@if($user instanceof User)
    <div class="flex">
        <a
            title="{{ $user->name }}"
            href="{{ route('users.show', $user->id) }}"
            class="flex flex-row flex-none gap-2 items-center {{ $user->trashed() ? 'pointer-events-none' : 'group' }}"
        >
            <x-calendar-avatar :url="thumbnail($user->avatar, '32x32', 'profile')" class="w-8 h-8" :presence="$presence" />

            <div class="{{ $user->trashed() ? 'line-through' : 'group-hover:underline' }} capitalize text-sm font-base tracking-wide truncate text-light-on-surface dark:text-dark-on-surface group-hover:text-light-primary dark:group-hover:text-dark-primary transition">
                {{ $user->name }}
            </div>
        </a>
    </div>
@endif

@php use Domains\User\Models\User; @endphp
@props([
    'user' => null,
    'noAvatar' => false,
    'noName' => false,
])

@if($user instanceof User || $user instanceof stdClass)
    <div class="flex">
        @if($noAvatar && $noName)
            <span class="text-sm text-light-error dark:text-dark-error">Ты вызвал коллапс во вселенной...</span>
        @else
            <a
                @if($noName) title="{{ $user->name }}"
                @endif href="{{ route('users.show', $user->id) }}"
                class="flex flex-row flex-none items-center {{ $user instanceof User && $user->trashed() ? 'pointer-events-none' : 'group' }}"
            >
                @if(!$noAvatar)
                    <x-avatar :url="thumbnail($user->avatar, '32x32', 'profile')" class="w-8 h-8" />
                @endif
                @if(!$noName)
                    <div class="{{ $noAvatar ?: 'ml-2' }} {{ $user instanceof User && $user->trashed() ? 'line-through' : 'group-hover:underline' }} capitalize text-sm font-base tracking-wide truncate text-light-on-surface dark:text-dark-on-surface group-hover:text-light-primary dark:group-hover:text-dark-primary transition">
                        {{ $user->name }}
                    </div>
                @endif
            </a>
        @endif
    </div>
@endif

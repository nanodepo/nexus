<?php

use Livewire\Attributes\On;
use Livewire\Volt\Component;

new class extends Component {
    public bool $mode = false;

    public function mount(): void
    {
        $this->mode = auth()->user()->drawer;
    }

    #[On('toggle-drawer')]
    public function toggle(): void
    {
        $this->mode = !$this->mode;
        auth()->user()->update(['drawer' => $this->mode]);
    }
} ?>

<div x-bind:class="{ 'w-22': !drawer, 'w-88': drawer }" class="relative hidden sm:flex flex-col flex-none transition-all">
    <div
        x-bind:class="{ 'hidden': !drawer }"
        @if(!auth()->user()->drawer)
            x-cloak
        @endif
        class="flex flex-col w-64 md:w-72 xl:w-80 2xl:w-88"
    >
        <x-ui::nav.drawer>
            <x-ui::nav.drawer.header title="Menu" class="mb-1" />

            <x-ui::nav.drawer.link
                label="Home"
                icon="home"
            />

            <x-ui::nav.drawer.dropdown
                label="Members"
                icon="users"
                href="/"
                :active="true"
            >
                <x-ui::nav.drawer.link
                    label="Invite"
                    icon="user-plus"
                />

                <x-ui::nav.drawer.divider />

                <x-ui::nav.drawer.link
                    label="Jason Walker"
                    icon="user-circle"
                />

                <x-ui::nav.drawer.link
                    label="Frank Malcov"
                    icon="user-circle"
                    active
                />

                <x-ui::nav.drawer.link
                    label="Sofia Martinez"
                    icon="user-circle"
                />
            </x-ui::nav.drawer.dropdown>

            <x-ui::nav.drawer.header title="Other" class="mt-3 mb-1" />

            <x-ui::nav.drawer.link
                label="Settings"
                icon="cog-8-tooth"
            />
        </x-ui::nav.drawer>
    </div>

    <div
        x-bind:class="{ 'hidden': drawer }"
        @if(auth()->user()->drawer) x-cloak @endif
        class="flex flex-col w-22"
    >
        <x-ui::nav.rail>
            <x-ui::nav.rail.link
                title="Home"
                link="/"
                icon="home"
            />

            <x-ui::nav.rail.link
                title="Members"
                link="/"
                icon="users"
                active
            />

            <x-ui::nav.rail.link
                title="Invite"
                link="/"
                icon="user-plus"
            />

            <x-ui::nav.rail.link
                title="Settings"
                link="/"
                icon="cog-8-tooth"
            />
        </x-ui::nav.rail>
    </div>
</div>

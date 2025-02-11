@livewire('drawer')

<div
    x-data="{ opened: false }"
    x-cloak
    x-show="opened"
    x-on:toggle-drawer.window="opened = !opened"
    class="fixed top-0 left-0 bottom-0 flex sm:hidden z-10"
>
    <x-ui::scrim x-model="opened" />

    <div
        x-show="opened"
        x-transition:enter="ease-out duration-300"
        x-transition:enter-start="-translate-x-88"
        x-transition:enter-end="translate-x-0"
        x-transition:leave="ease-in duration-200"
        x-transition:leave-start="translate-x-0"
        x-transition:leave-end="-translate-x-88"
        class="flex flex-col h-full w-88 transform transition-all"
    >
        <x-ui::nav.drawer class="h-full w-88 bg-background">
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

            <x-ui::nav.drawer.link
                label="Looooooooooooong menuuuuu iteeeeeeem"
                icon="bug-ant"
                badge="12"
            />

            <x-ui::nav.drawer.header title="Other" class="mt-3 mb-1" />

            <x-ui::nav.drawer.link
                label="Settings"
                icon="cog-8-tooth"
            />
        </x-ui::nav.drawer>
    </div>
</div>

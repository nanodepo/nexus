<div class="hidden lg:block">
    <x-ui::nav.drawer>
        <x-slot name="content">
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
        </x-slot>

        <x-slot name="footer">
            @livewire('switch-mode')
        </x-slot>
    </x-ui::nav.drawer>
</div>

<div class="hidden sm:block lg:hidden">
    <x-ui::nav.rail>
        <x-slot name="top">
            <x-ui::nav.rail.burger />
        </x-slot>

        <x-slot name="middle">
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
        </x-slot>

        <x-slot name="bottom">
            @livewire('switch-mode')
        </x-slot>
    </x-ui::nav.rail>
</div>

<div class="block sm:hidden">
    <x-ui::nav.bar>
        <x-ui::nav.bar.link
            title="Home"
            link="/"
            icon="home"
        />

        <x-ui::nav.bar.link
            title="Members"
            link="/"
            icon="users"
        />

        <x-ui::nav.bar.link
            title="Invite"
            link="/"
            icon="user-plus"
        />

        <x-ui::nav.bar.burger title="Menu" />
    </x-ui::nav.bar>
</div>

<div x-show="drawer" class="fixed top-0 left-0 block lg:hidden" style="display: none">
    <div
        x-show="drawer"
        x-on:click="drawer = false"
        x-transition:enter="ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 transform backdrop-blur-xs transition-all"
    >
        <div class="absolute inset-0 bg-light-surface-variant/50 dark:bg-dark-surface-variant/50"></div>
    </div>
    <div
        x-show="drawer"
        x-transition:enter="ease-out duration-300"
        x-transition:enter-start="-translate-x-88"
        x-transition:enter-end="translate-x-0"
        x-transition:leave="ease-in duration-200"
        x-transition:leave-start="translate-x-0"
        x-transition:leave-end="-translate-x-88"
        class="transform transition-all"
    >
        <x-ui::nav.drawer>
            <x-slot name="content">
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
            </x-slot>

            <x-slot name="footer">
                @livewire('switch-mode')
            </x-slot>
        </x-ui::nav.drawer>
    </div>
</div>

@props([
    'id' => 'editor',
    'name' => '',
    'placeholder' =>  __('Ваши мысли...'),
    'height' => 100,
])

@php
    $uid = $id . substr(str_shuffle('ABCDEF0123456789'), 0, 6);
@endphp

@pushonce('styles')
    <link rel="stylesheet" href="https://unpkg.com/easymde/dist/easymde.min.css">
    <script src="https://unpkg.com/easymde/dist/easymde.min.js"></script>
@endpushonce

<div
    x-data="{
        value: '',
        choice: {},
        users: [],
        teams: [],
        list: false,
        loadData: async function() {
            await window.axios.get('/api/get-editor-data').then(response => {
                this.users = response.data.users;
                this.teams = response.data.teams;
            });
        },
        resolveTaggedEntity: async function(entity, entity_id) {
            let data
            await window.axios.post('/api/resolve-tagged-entity', {entity: entity, entity_id: entity_id, url: window.location.href}).then(response => {
                data = response.data;
            });
            return await data.data;
        },
        showList: async function () {
            await this.loadData();
            this.list = true;

            return new Promise((resolve, reject) => {
                const interval = setInterval(() => {
                    if (this.choice.entity_type && this.choice.entity_id) {
                        clearInterval(interval);
                        resolve(this.resolveTaggedEntity(this.choice.entity_type, this.choice.entity_id));
                    }
                }, 300);
            });
        },
        choose: function(entity, entity_id) {
            this.list = false
            this.choice = {
                entity_type: entity,
                entity_id: entity_id
            };
        }
     }"
    x-modelable="value"
    {{ $attributes }}
    x-init="
        window.{{ $uid }} || (window.{{ $uid }} = new EasyMDE({
            element: $refs.{{ $uid }},
            toolbar: false,
            status: false,
            forceSync: true,
            placeholder: '{{ $placeholder }}',
            minHeight: '{{ $height }}px',
            SpellChecker: false,
            nativeSpellcheck: false
        }));

        window.{{ $uid }}.codemirror.on('change', async () => {
            let ntext = window.{{ $uid }}.value();

            if (ntext.endsWith('@')) {
                ntext = ntext.slice(0, -1)
                showList().then((data) => {
                    window.{{ $uid }}.value(ntext + data.tag)
                });
                choice = {}
            } else {
                if(list) list = false
            }
            users = {}
            value = ntext
        });
    "
    x-cloak
    class="easymde-editor-mini flex flex-col"
>
    <div x-show="list" class="flex flex-col max-h-52 py-3 overflow-y-auto text-bold bg-light-primary/5 dark:bg-dark-primary/5 border-y border-light-primary/12 dark:border-dark-primary/12" style="display:none;">

        <div class="px-6 mb-3">
            <x-title
                :title="__('Выберите сотрудника')"
                :subtitle="__('Вы можете тегнуть сотрудника и ему придет уведомление')"
            >
                <x-slot name="action">
                    <x-navigation.top.icon icon="x-mark" x-on:click="list = false" />
                </x-slot>
            </x-title>
        </div>

        <template x-if="users">
            <template x-for="user in users" :key="user.id">
                <div x-on:click="choose('user', user.id)" class="flex flex-row items-center flex-auto px-6 hover:bg-light-primary/5 dark:hover:bg-dark-primary/5 transition cursor-pointer">
                    <a class="group flex flex-row flex-auto items-center w-full h-14 overflow-hidden">
                        <div class="flex-none">
                            <div class="relative">
                                <div class="relative">
                                    <div
                                        class="relative flex-none bg-light-primary/12 dark:bg-dark-primary/12 rounded-full bg-center w-9 h-9"
                                        x-bind:style="{ 'background-size': 'cover', 'background-image': 'url(' + user.avatar + ')' }"
                                    ></div>
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-col flex-auto w-full overflow-hidden pl-3 pr-3">
                            <div x-text="user.name" class="inline-block w-full text-sm font-medium tracking-wide truncate text-light-on-surface dark:text-dark-on-surface group-hover:text-light-primary dark:group-hover:text-dark-primary group-hover:underline transition"></div>

                            <div class="inline-block h-5 w-full mt-1 text-xs tracking-wide truncate text-light-on-surface-variant dark:text-dark-on-surface-variant">
                                <div class="inline-flex flex-row items-center space-x-2">
                                    <div class="flex flex-row items-center flex-none space-x-1 text-xs tracking-wide">
                                        <x-icon::identification type="micro" />
                                        <div x-text="user.role" class="capitalize"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </template>
        </template>

    </div>

    <div class="">
        <textarea x-ref="{{ $uid }}" x-model="value" name="{{ $name }}"></textarea>
    </div>
</div>

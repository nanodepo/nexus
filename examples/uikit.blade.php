<x-layouts.app>

    <x-ui::base-layout>
        <x-slot name="left">
            <x-ui::section>

                <div class="mb-1 text-2xl font-bold tracking-wide text-center text-light-on-surface dark:text-dark-on-surface">
                    Buttons
                </div>
                <div class="mb-6 text-sm tracking-wide text-center text-balance text-light-on-surface-variant dark:text-dark-on-surface-variant">
                    Четыре стиля и четыре цвета, с возможностью добавить иконку в начале и в конце кнопки.
                </div>

                <div class="flex flex-col items-center gap-6">
                    <div class="flex flex-row gap-3">
                        <x-ui::button before="plus">Filled</x-ui::button>
                        <x-ui::button variant="tonal" after="chevron-down">Tonal</x-ui::button>
                        <x-ui::button variant="outlined" before="gift" after="arrow-long-right">Outline</x-ui::button>
                        <x-ui::button href="#!" variant="text">Text</x-ui::button>
                    </div>

                    <div class="flex flex-row gap-3">
                        <x-ui::button color="secondary" before="plus">Filled</x-ui::button>
                        <x-ui::button color="secondary" variant="tonal" after="chevron-down">Tonal</x-ui::button>
                        <x-ui::button color="secondary" variant="outlined" before="gift" after="arrow-long-right">Outline</x-ui::button>
                        <x-ui::button href="#!" color="secondary" variant="text">Text</x-ui::button>
                    </div>

                    <div class="flex flex-row gap-3">
                        <x-ui::button color="tertiary" before="plus">Filled</x-ui::button>
                        <x-ui::button color="tertiary" variant="tonal" after="chevron-down">Tonal</x-ui::button>
                        <x-ui::button color="tertiary" variant="outlined" before="gift" after="arrow-long-right">Outline</x-ui::button>
                        <x-ui::button href="#!" color="tertiary" variant="text">Text</x-ui::button>
                    </div>

                    <div class="flex flex-row gap-3">
                        <x-ui::button color="error" before="plus">Filled</x-ui::button>
                        <x-ui::button color="error" variant="tonal" after="chevron-down">Tonal</x-ui::button>
                        <x-ui::button color="error" variant="outlined" before="gift" after="arrow-long-right">Outline</x-ui::button>
                        <x-ui::button href="#!" color="error" variant="text">Text</x-ui::button>
                    </div>

                    <div class="flex flex-row gap-3">
                        <x-ui::button disabled before="plus">Filled</x-ui::button>
                        <x-ui::button disabled variant="tonal" after="chevron-down">Tonal</x-ui::button>
                        <x-ui::button disabled variant="outlined" before="gift" after="arrow-long-right">Outline</x-ui::button>
                        <x-ui::button disabled href="#!" variant="text">Text</x-ui::button>
                    </div>
                </div>
            </x-ui::section>

            <x-ui::section>

                <div class="mb-1 text-2xl font-bold tracking-wide text-center text-light-on-surface dark:text-dark-on-surface">
                    Chips
                </div>
                <div class="mb-6 text-sm tracking-wide text-center text-balance text-light-on-surface-variant dark:text-dark-on-surface-variant">
                    Читайте доку M3 если не знаете что такое чипы.
                </div>

                <div class="flex flex-col items-center gap-6">
                    <div class="flex flex-row flex-wrap justify-center gap-3">
                        <x-ui::chip before="fire" />
                        <x-ui::chip title="Empty" />
                        <x-ui::chip before="cube" title="Icon" />
                        <x-ui::chip before="user" title="Double" after="chevron-down" />
                        <x-ui::chip title="Go" after="arrow-long-right" />
                        <x-ui::chip before="folder" title="Secondary" color="secondary" />
                        <x-ui::chip before="folder-plus" title="Tertiary" color="tertiary" />
                        <x-ui::chip before="folder-open" title="Error" color="error" />
                        <x-ui::chip before="folder-arrow-down" title="Active" active />
                        <x-ui::chip before="folder-minus" title="Disabled" disabled />
                    </div>
                </div>
            </x-ui::section>

            <x-ui::section>
                <div class="mb-1 text-2xl font-bold tracking-wide text-center text-light-on-surface dark:text-dark-on-surface">
                    Banners
                </div>

                <div class="mb-6 text-sm tracking-wide text-center text-balance text-light-on-surface-variant dark:text-dark-on-surface-variant">
                    Баннеры можно выводить как в секциях так и в базовом шаблоне, на всю ширину экрана.
                </div>

                <div class="flex flex-col gap-4">
                    <x-ui::banner
                        title="Погиб поэт! - невольник чести - пал, оклеветанный молвой..."
                        class="-mx-6"
                    />

                    <x-ui::banner
                        title="Мы придумали как решить проблему века!"
                        type="primary"
                        icon="bolt"
                        class="-mx-6"
                    />

                    <x-ui::banner
                        title="Обновление #241021"
                        subtitle="Новые функции уже ждут вас."
                        type="tertiary"
                        icon="cake"
                        class="-mx-6"
                    >
                        <x-ui::button variant="outlined" :href="route('home')" color="tertiary">Подробнее</x-ui::button>
                    </x-ui::banner>

                    <x-ui::banner
                        title="Deploy error!"
                        subtitle="При развертывании приложения произошла ошибка."
                        type="error"
                        icon="bug-ant"
                        class="-mx-6"
                    >
                        <x-ui::circle icon="x-mark" :href="route('home')" color="error" />
                    </x-ui::banner>
                </div>
            </x-ui::section>

            <x-ui::section>
                <div class="mb-1 text-2xl font-bold tracking-wide text-center text-light-on-surface dark:text-dark-on-surface">
                    List
                </div>
                <div class="mb-6 text-sm tracking-wide text-center text-balance text-light-on-surface-variant dark:text-dark-on-surface-variant">
                    Списки и элементы списков (представлены стандартные реализации, но вы можете определять свои, базируясь на этих).
                </div>

                <x-ui::list>
                    <x-ui::list.item title="Empty list item" />

                    <x-ui::list.item title="Standard list item" subtitle="Subtitle item and icon">
                        <x-slot name="before">
                            <x-icon::diamond />
                        </x-slot>
                    </x-ui::list.item>

                    <x-ui::list.item
                        subhead="Subhead"
                        title="Extend list item"
                        subtitle="Subtitle item and icon"
                        description="Description extended list item"
                    >
                        <x-slot name="before">
                            <x-ui::avatar class="w-12 h-12" url="https://placehold.co/64x64?text=AW" />
                        </x-slot>

                        <x-slot name="after">
                            <x-ui::circle icon="ellipsis-vertical" />
                        </x-slot>
                    </x-ui::list.item>
                </x-ui::list>
            </x-ui::section>

            <x-ui::section>
                <div class="mb-1 text-2xl font-bold tracking-wide text-center text-light-on-surface dark:text-dark-on-surface">
                    Cards
                </div>
                <div class="mb-6 text-sm tracking-wide text-center text-balance text-light-on-surface-variant dark:text-dark-on-surface-variant">
                    Типичные карточки, которые можно использовать по разному, где только душа пожелает
                </div>

                <div class="flex flex-row flex-wrap -m-3">

                    <div class="w-1/2 p-3">
                        <x-ui::card
                            title="Гиперион"
                            subtitle="История о путешествинниках"
                            text="Blade автоматически определит класс, связанный с этим компонентом, используя pascal-case для имени компонента. Подкаталоги также поддерживаются с использованием нотации «точка»."
                        />
                    </div>

                    <div class="w-1/2 p-3">
                        <x-ui::card
                            title="Падение Гипериона"
                            subtitle="Шрайк и дерево боли"
                            class="border border-light-outline dark:border-dark-outline hover:border-light-primary dark:hover:border-dark-primary"
                        >
                            <x-slot name="header">
                                <div class="flex flex-row items-center flex-auto gap-3 overflow-hidden">
                                    <x-ui::avatar class="w-8 h-8" url="https://placehold.co/64x64?text=AW" />
                                    <div class="flex flex-col overflow-hidden">
                                        <div class="text-xs font-medium truncate">Bernhard Wilson</div>
                                        <div class="text-xs truncate text-light-on-surface-variant dark:text-dark-on-surface-variant">1 hour 46 min ago</div>
                                    </div>
                                </div>

                                <div class="flex flex-row flex-none gap-1">
                                    <x-ui::circle icon="pencil" />
                                    <x-ui::circle icon="trash" color="error" />
                                </div>
                            </x-slot>
                        </x-ui::card>
                    </div>

                    <div class="w-1/2 p-3">
                        <x-ui::card
                            title="Эндимион"
                            subtitle="Это не история о греческом полубоге и богине луны"
                            image="https://placehold.co/600x400"
                            class="border border-transparent hover:border-light-outline-variant dark:hover:border-dark-outline-variant"
                        >
                            <x-slot name="label">
                                <x-ui::card.label icon="fire">Hot</x-ui::card.label>
                            </x-slot>

                            <x-slot name="footer">
                                <x-ui::circle icon="star" variant="outlined" color="tertiary" />
                                <x-ui::button>Купить</x-ui::button>
                            </x-slot>
                        </x-ui::card>
                    </div>

                    <div class="w-1/2 p-3">
                        <x-ui::card
                            title="Восход Эндимиона"
                            subtitle="Пока в своих странствиях я не добрался до этой книги"
                            text="Нет в наличии"
                        >
                            <x-slot name="image">
                                <x-ui::card.image url="https://placehold.co/600x600" aspect="aspect-square" />
                            </x-slot>
                        </x-ui::card>
                    </div>

                </div>

            </x-ui::section>
        </x-slot>

        <x-slot name="right">
            <x-ui::section>
                <div class="mb-1 text-2xl font-bold tracking-wide text-center text-light-on-surface dark:text-dark-on-surface">
                    Input
                </div>
                <div class="mb-6 text-sm tracking-wide text-center text-balance text-light-on-surface-variant dark:text-dark-on-surface-variant">
                    Поля ввода, чекбоксы, выпадающие списки и радио кнопки.
                </div>

                <div class="flex flex-col gap-4">

                    <x-ui::input
                        name="name"
                        label="Your Name"
                        max="16"
                        maxlength="16"
                        hint="Введите ваше имя"
                        required
                    />

                    @livewire('test-input')

                    <x-ui::input
                        name="org"
                        label="Organization"
                        disabled
                    />

                    <x-ui::input.textarea
                        name="description"
                        label="Description"
                        rows="6"
                        hint="Можно использовать Markdown"
                        required
                    />

                    <x-ui::input.checkbox label="Вам есть 18 лет?" />

                    <div class="flex flex-row">
                        <div class="flex flex-col w-1/2 gap-3">
                            <x-ui::input.label label="Вы любите котов?" />
                            <x-ui::input.radio name="cat" label="Да" checked />
                            <x-ui::input.radio name="cat" label="Нет" disabled />
                        </div>

                        <div class="flex flex-col w-1/2 gap-3">
                            <x-ui::input.label label="Выберите уровень сложности" />
                            <x-ui::input.counter min="0" max="7" value="3" />
                        </div>
                    </div>

                    <x-ui::input.stars label="Оцените погоду за окном" min="1" max="5" />

                    <div class="flex flex-row justify-between">
                        <x-ui::input.label label="Вы ходили сегодня в магазин за хлебом?" />
                        <x-ui::input.switch />
                    </div>

                </div>
            </x-ui::section>

            <x-ui::section>
                <x-ui::header
                    title="Other"
                    subtitle="Куча атомарной фигни или всё что не является чем-то серьезным."
                    class="mb-6"
                />

                <div class="flex flex-col gap-6">
                    <div class="flex flex-row items-center gap-3">
                        <x-ui::avatar class="w-16 h-16" />
                        <x-ui::avatar class="w-12 h-12" url="https://placehold.co/64x64?text=AW" />
                        <x-ui::avatar class="w-10 h-10" url="https://placehold.co/64x64?text=BW" is_online="true" />
                    </div>

                    <p>Lorem ipsum dolor <a href="#!" class="link text-light-primary dark:text-dark-primary">sit amet</a>, consectetur...</p>

                    <div class="">
                        <x-ui::button color="primary" before="bell" x-on:click="$dispatch('makeAlert', { type: 'primary', message: 'You Win!' })">Push Alert</x-ui::button>
                        <x-ui::button color="error" before="bell-slash" x-on:click="$dispatch('makeAlert', { type: 'error', message: 'Get Out!' })">Push Danger</x-ui::button>
                    </div>

                    <x-ui::breadcrumbs>
                        <x-ui::breadcrumbs.item>Home</x-ui::breadcrumbs.item>
                        <x-ui::breadcrumbs.divider />
                        <x-ui::breadcrumbs.item>Users</x-ui::breadcrumbs.item>
                        <x-ui::breadcrumbs.divider />
                        <x-ui::breadcrumbs.item active>Bernhard Wilson</x-ui::breadcrumbs.item>
                    </x-ui::breadcrumbs>

                    <div class="flex flex-row gap-3">
                        <x-ui::circle icon="fire" :href="route('home')" />
                        <x-ui::circle icon="fire" color="error" />
                        <x-ui::circle icon="fire" variant="filled" color="primary" />
                        <x-ui::circle icon="fire" variant="tonal" color="secondary" />
                        <x-ui::circle icon="fire" variant="outlined" color="tertiary" />
                        <x-ui::circle icon="fire" variant="text" color="error" />

                        <div class="relative">
                            <div class="absolute top-0 right-0">
                                <x-ui::badge.small />
                            </div>
                            <x-ui::circle icon="fire" />
                        </div>

                        <div class="relative">
                            <div class="absolute -top-1 -right-2">
                                <x-ui::badge color="tertiary">12</x-ui::badge>
                            </div>
                            <x-ui::circle icon="fire" />
                        </div>
                    </div>

                    <div class="flex flex-row gap-1">
                        <x-ui::label icon="fire" title="Hot" color="#cc2a2a" />
                        <x-ui::label icon="cube" title="Learn" color="#2a2acc" />
                        <x-ui::label.small icon="cake" title="Birthday!" description="Lorem ipsum dolor sit amet." color="#2acc2a" />
                    </div>

                    <x-ui::title title="Header" />
                    <x-ui::title title="Lorem ipsum!" subtitle="Lorem ipsum dolor sit amet, consectetur..." />

                    <div class="flex flex-row justify-start">
                        <x-ui::question-helper>
                            Этот текст видно при <br>
                            наведении или тапе на иконку.
                        </x-ui::question-helper>
                    </div>

                    <div class="flex flex-row justify-start gap-3">
                        <x-ui::meta icon="user" />
                        <x-ui::meta icon="calendar" text="26.10.24" />
                        <x-ui::meta icon="clock" text="22:00" error />
                        <x-ui::meta icon="cube" text="Lorem" hint="Lorem ipsum dolor" />
                    </div>

                    <div class="flex flex-row">
                        <x-ui::dropdown>
                            <x-slot name="trigger">
                                <x-ui::button color="primary" after="chevron-down">City</x-ui::button>
                            </x-slot>

                            <x-slot name="content">
                                <x-ui::dropdown.item>Poltava</x-ui::dropdown.item>
                                <x-ui::dropdown.item icon="check">Kyiv</x-ui::dropdown.item>
                            </x-slot>
                        </x-ui::dropdown>
                    </div>

                    <x-ui::steps>
                        <x-ui::steps.item title="First" completed first />
                        <x-ui::steps.item title="Second" active />
                        <x-ui::steps.item title="Last" last />
                    </x-ui::steps>

                    <x-ui::tab>
                        <x-ui::tab.item label="First" active />
                        <x-ui::tab.item label="Second" />
                        <x-ui::tab.item label="Last" />
                    </x-ui::tab>

                    <div x-data="{ base: false, confirmation: false }" class="flex flex-row gap-3">
                        <x-ui::button x-on:click="base = true" color="secondary" before="face-smile">Modal</x-ui::button>
                        <x-ui::button x-on:click="confirmation = true" color="secondary" before="face-frown" variant="tonal">Confirmation</x-ui::button>

                        <x-ui::modal x-model="base">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi assumenda autem corporis culpa debitis, dignissimos earum eveniet exercitationem facilis fuga, fugit itaque laudantium nemo odio odit quos similique ut vero!
                        </x-ui::modal>

                        <x-ui::modal.confirmation
                            x-model="confirmation"
                            title="Вы действительно хотите удалить товар?"
                            subtitle="Отменить это действие и вернуть товар будет невозможно."
                        >
                            <x-slot name="footer">
                                <x-ui::button variant="text">Cancel</x-ui::button>
                                <x-ui::button color="error">Delete</x-ui::button>
                            </x-slot>
                        </x-ui::modal.confirmation>
                    </div>

                </div>

            </x-ui::section>

        </x-slot>
    </x-ui::base-layout>

</x-layouts.app>

<x-layouts.app>

    <x-ui::base-layout>
        <x-slot name="left">
            <x-ui::section header="Colors">
                <div class="flex flex-col items-center justify-center gap-1">
                    <div class="w-full px-6 py-2 rounded bg-background">background</div>
                    <div class="w-full px-6 py-2 rounded bg-on-background text-hint">on-background</div>
                    <div class="w-full px-6 py-2 rounded bg-secondary">secondary</div>
                    <div class="w-full px-6 py-2 rounded bg-hint">hint</div>
                    <div class="w-full px-6 py-2 rounded bg-link">link</div>
                    <div class="w-full px-6 py-2 rounded bg-accent">accent</div>
                    <div class="w-full px-6 py-2 rounded bg-subtitle">subtitle</div>
                    <div class="w-full px-6 py-2 rounded bg-destructive">destructive</div>
                    <div class="w-full px-6 py-2 rounded bg-button">button</div>
                    <div class="w-full px-6 py-2 rounded bg-on-button text-hint">on-button</div>
                    <div class="w-full px-6 py-2 rounded bg-section">section</div>
                    <div class="w-full px-6 py-2 rounded bg-section-header">section-header</div>
                    <div class="w-full px-6 py-2 rounded bg-section-separator">section-separator</div>
                    <div class="w-full px-6 py-2 rounded bg-on-section text-hint">on-section</div>
                </div>
            </x-ui::section>

            <x-ui::section
                title="Buttons"
                hint="Один цвет, три варианта"
            >
                <div class="flex flex-col items-center gap-3">
                    <div class="flex flex-row gap-3">
                        <x-ui::button before="plus">Filled</x-ui::button>
                        <x-ui::button variant="outlined" before="gift" after="arrow-long-right">Outline</x-ui::button>
                        <x-ui::button href="#!" variant="text">Text</x-ui::button>
                    </div>

                    <div class="flex flex-row gap-3">
                        <x-ui::button disabled before="plus">Filled</x-ui::button>
                        <x-ui::button disabled variant="outlined" before="gift" after="arrow-long-right">Outline</x-ui::button>
                        <x-ui::button disabled href="#!" variant="text">Text</x-ui::button>
                    </div>
                </div>
            </x-ui::section>

            <x-ui::section
                title="Chips"
                hint="Читайте доку M3 если не знаете что такое чипы"
            >
                <div class="flex flex-row flex-wrap justify-center gap-3">
                    <x-ui::chip before="fire" />
                    <x-ui::chip title="Empty" />
                    <x-ui::chip before="cube" title="Icon" />
                    <x-ui::chip before="user" title="Double" after="chevron-down" />
                    <x-ui::chip title="Go" after="arrow-long-right" />
                    <x-ui::chip before="folder-arrow-down" title="Active" active />
                    <x-ui::chip before="folder-minus" title="Disabled" disabled />
                </div>
            </x-ui::section>

            <x-ui::section
                title="Banners"
                hint="Баннеры можно выводить как в секциях так и в базовом шаблоне, на всю ширину экрана"
            >
                <div class="flex flex-col gap-3">
                    <x-ui::banner
                        title="Погиб поэт! - невольник чести - пал, оклеветанный молвой..."
                        class="-mx-6"
                    />

                    <x-ui::banner
                        title="Обновление #241021"
                        type="primary"
                        icon="cake"
                        class="-mx-6"
                    >
                        <x-ui::button :href="route('home')" color="tertiary">Подробнее</x-ui::button>
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

            <x-ui::section
                title="List"
                hint="Списки и элементы списков (представлены стандартные реализации, но вы можете определять свои, базируясь на этих)"
            >
                <x-ui::list>
                    <x-ui::list.item title="Empty list item" />

                    <x-ui::list.item title="Standard list item" subtitle="Subtitle item and icon">
                        <x-slot name="before">
                            <x-icon::diamond />
                        </x-slot>
                    </x-ui::list.item>

                    <x-ui::list.item
                        href="#!"
                        subhead="Subhead"
                        title="Extend list item"
                        subtitle="Subtitle item and icon"
                        description="Description extended list item"
                        badge
                    >
                        <x-slot name="before">
                            <x-ui::avatar class="w-12 h-12" url="https://placehold.co/64x64?text=AW" />
                        </x-slot>

                        <x-slot name="after">
                            <x-ui::circle icon="ellipsis-vertical" />
                        </x-slot>
                    </x-ui::list.item>

                    <x-ui::list.info
                        title="Info list item"
                        description="Description extended list item extended list item Description extended list item Description extended list item"
                    >
                        <x-slot name="before">
                            <x-icon::cube />
                        </x-slot>
                    </x-ui::list.info>

                    <x-ui::list.icon
                        icon="emerald"
                        title="Icon list item"
                        subtitle="Subtitle item and icon"
                    />

                    <x-ui::list.double
                        before="calendar"
                        after="arrow-long-right"
                        title="Double icon list item"
                    />

                    <x-ui::list.button
                        icon="fire"
                        title="Button list item"
                    />

                    <x-ui::list.button
                        icon="bug-ant"
                        title="Button list item (with error)"
                        destructive
                    />

                    <x-ui::list.value
                        icon="ruby"
                        title="Value list item"
                        :accent="false"
                    >
                        Select
                    </x-ui::list.value>

                    <x-ui::list.radio
                        name="r1"
                        title="Radio list item"
                        subtitle="Subtitle item and radio"
                    />

                    <x-ui::list.checkbox
                        name="r1"
                        title="Checkbox list item"
                        subtitle="Subtitle item and checkbox"
                    />
                </x-ui::list>
            </x-ui::section>

            <x-ui::section
                title="Cards"
                hint="Типичные карточки, которые можно использовать по разному, где только душа пожелает"
            >
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
                            class="border border-hint hover:border-accent"
                        >
                            <x-slot name="header">
                                <div class="flex flex-row items-center flex-auto gap-3 overflow-hidden">
                                    <x-ui::avatar class="w-8 h-8" url="https://placehold.co/64x64?text=AW" />
                                    <div class="flex flex-col overflow-hidden">
                                        <div class="text-xs font-medium truncate">Bernhard Wilson</div>
                                        <div class="text-xs truncate text-hint">1 hour 46 min ago</div>
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
            <x-ui::section
                title="Input"
                hint="Поля ввода, чекбоксы, выпадающие списки и радио кнопки."
            >
                <div class="flex flex-col gap-6">

                    <x-ui::field label="Name">
                        <x-ui::input
                            name="name"
                            placeholder="Your Name"
                            required
                        />
                    </x-ui::field>

                    <x-ui::field label="Поле со счетчиком" hint="Lorem ipsum dolor sit amet" max="160">
                        <x-ui::input
                            name="position"
                            placeholder="Position"
                            x-model="field"
                            max="160"
                            maxlength="160"
                        />
                    </x-ui::field>

                    <x-ui::input
                        name="org"
                        placeholder="Organization"
                        disabled
                    />

                    <x-ui::divider />

                    <x-ui::input.textarea
                        name="description"
                        placeholder="Description"
                        rows="6"
                        required
                    />

                    <x-ui::divider />

                    <x-ui::input.select
                        name="city"
                        placeholder="City"
                    >
                        <x-ui::input.select.item value="poltava">Poltava</x-ui::input.select.item>
                        <x-ui::input.select.item value="odessa">Odessa</x-ui::input.select.item>
                    </x-ui::input.select>

                    <x-ui::divider />

                    <x-ui::input.checkbox />
                    <x-ui::input.checkbox disabled />

                    <x-ui::divider />

                    <div class="flex flex-col w-1/2 gap-3">
                        <x-ui::input.radio name="cat" checked />
                        <x-ui::input.radio name="cat" />
                        <x-ui::input.radio name="cat" disabled />
                    </div>

                    <x-ui::divider />

                    <div class="flex flex-col w-1/2 gap-3">
                        <x-ui::input.counter min="0" max="7" value="3" />
                    </div>

                    <x-ui::divider />

                    <x-ui::input.stars min="1" max="5" />

                    <x-ui::divider />

                    <div class="flex flex-row justify-between">
                        <x-ui::input.switch />
                    </div>

                </div>
            </x-ui::section>

            <x-ui::section
                title="Other"
                hint="Куча атомарной фигни или всё что не является чем-то серьезным."
            >
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

                    <x-ui::segmented>
                        <x-ui::segmented.item icon="fire" text="Fire to fire" />
                        <x-ui::segmented.item icon="home" text="This is my home" active />
                        <x-ui::segmented.item icon="diamond" text="Diamond" />
                        <x-ui::segmented.item icon="topaz" text="Topaz" />
                    </x-ui::segmented>

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
                        <x-ui::circle icon="fire" variant="filled" />
                        <x-ui::circle icon="fire" variant="filled" disabled />
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

                    <x-ui::tab class="-mx-6">
                        <x-ui::tab.item label="First" active />
                        <x-ui::tab.item label="Second" />
                        <x-ui::tab.item label="Last" />
                    </x-ui::tab>

                    <div x-data="{ sheet: false, dialog: false, confirmation: false }" class="flex flex-row gap-3">
                        <x-ui::button x-on:click="sheet = true" before="face-smile">Sheet</x-ui::button>
                        <x-ui::button x-on:click="dialog = true" before="face-smile" variant="outlined">Dialog</x-ui::button>
                        <x-ui::button x-on:click="confirmation = true" before="face-frown" variant="text">Confirmation</x-ui::button>

                        <x-ui::sheet x-model="sheet">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi assumenda autem corporis culpa debitis, dignissimos earum eveniet exercitationem facilis fuga, fugit itaque laudantium nemo odio odit quos similique ut vero!
                        </x-ui::sheet>

                        <x-ui::dialog x-model="dialog">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi assumenda autem corporis culpa debitis, dignissimos earum eveniet exercitationem facilis fuga, fugit itaque laudantium nemo odio odit quos similique ut vero!
                        </x-ui::dialog>

                        <x-ui::modal.confirmation
                            x-model="confirmation"
                            title="Хотите удалить товар?"
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

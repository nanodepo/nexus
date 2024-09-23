@props(['tips', 'autostart' => false])

<div
    x-data="{
        tips: @js($tips),
        seen: $persist([]),
        current: null,
        run() {
            this.refresh();
            this.search();
        },
        refresh() {
            let ids = [];

            for (const tip of this.tips) {
                ids.push(tip.id);
            }

            arrDiff = function arrayDiff(a, b) {
                let arr = a;
                for (let i = 0; i < b.length; i++) {
                    arr = arr.filter(item => item !== b[i]);
                }
                return arr;
            }

            this.seen = arrDiff(this.seen, ids);
        },
        search() {
            for (const tip of this.tips) {
                if (!this.seen.includes(tip.id)) {
                    this.select(tip);
                    break;
                }
            }
        },
        select(tip) {
            this.current = tip;
            $refs.scrim.classList.remove('hidden');
            this.getElement(tip.id).classList.add('z-50');
            this.getElement(tip.id).scrollIntoView({ block: 'center', inline: 'nearest', behavior: 'smooth' });
        },
        hide(uid) {
            this.getElement(uid).classList.remove('z-50');
            $refs.scrim.classList.add('hidden');
            this.current = null;
        },
        confirm() {
            this.seen.push(this.current.id);
            this.hide(this.current.id);
            this.search();
        },
        getId() {
            return this.current ? this.current.id : null;
        },
        getElement(id) {
            return document.getElementById(id);
        }
    }"
     x-init="
        @if($autostart && request()->has('help'))
            run();
        @endif
     "
    x-on:show-tips.window="run();"
>
    @foreach($tips as $tip)
        <div
            x-anchor.offset.15.{{ $tip['position'] }}="getElement('{{ $tip['id'] }}')"
            x-show="'{{ $tip['id'] }}' == getId()"
            x-cloak
            class="absolute rounded-xl bg-light-primary-container dark:bg-dark-primary-container text-light-on-primary-container dark:text-dark-on-primary-container z-10"
        >
            <div x-anchor.offset.10.{{ $tip['position'] }}="getElement('{{ $tip['id'] }}')" class="absolute {{ $tip['position'] == 'bottom' ? '-top-4' : '-bottom-4' }} w-8 h-8 rotate-45 bg-light-primary-container dark:bg-dark-primary-container"></div>

            <div class="relative flex flex-col w-56">
                <div class="px-3 pt-3 pb-1.5 z-10">
                    <div class="text-sm font-medium">{{ $tip['title'] }}</div>
                    <div class="mt-1 text-xs">{{ $tip['text'] }}</div>
                </div>

                <div class="flex flex-row items-center justify-between rounded-b-xl overflow-hidden">
                    <div class="px-3 py-1.5 text-xs">
                        <span>{{ $loop->index + 1 }}</span>
                        <span>/</span>
                        <span>{{ count($tips) }}</span>
                    </div>

                    <div
                        x-on:click="confirm"
                        class="flex flex-row items-center justify-center px-3 py-1.5 text-xs font-medium rounded-tl-lg hover:bg-light-primary/5 dark:hover:bg-dark-primary/5 transition cursor-pointer"
                    >
                        <div class="mr-2">{{ $tip['button'] }}</div>
                        <x-icon::arrow-long-right />
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

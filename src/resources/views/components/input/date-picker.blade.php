@props([
    'name' => '',
    'label' => 'Выбрать дату',
    'value' => null,
    'disabled' => false,
    'with_label' => true
])

@php
    $ref = str(str()->random(8))->prepend('datepicker');
@endphp

<div
    x-data="{
        showDatepicker: false,
        datepickerValue: '',
        selectedDate: @js($value),
        dateFormat: 'DD-MM-YYYY',
        month: '',
        year: '',
        no_of_days: [],
        blankdays: [],
        x_month_names: ['Отходняк', 'Зубостук', 'Какашняк', 'Возвраптиц', 'Май', 'Июнь', 'Июль', 'Июрь', 'Сентементябрь', 'Охтыябрь', 'Насукабрь', 'Нувотивсебрь'],
        month_names: ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'],
        month_short_names: ['Янв', 'Фев', 'Мар', 'Апр', 'Май', 'Июн', 'Июл', 'Авг', 'Сен', 'Окт', 'Ноя', 'Дек'],
        days: ['Вс', 'Пн', 'Вт', 'Ср', 'Чт', 'Пт', 'Сб'],
        initDate() {
            let today;
            if (this.selectedDate) {
                today = new Date(Date.parse(this.selectedDate));
            } else {
                today = new Date();
            }
            this.month = today.getMonth();
            this.year = today.getFullYear();
            this.datepickerValue = this.selectedDate ? this.formatDateForDisplay(today) : null;
        },
        formatDateForDisplay(date) {
            let formattedDay = this.days[date.getDay()];
            let formattedDate = ('0' + date.getDate()).slice(-2); // appends 0 (zero) in single digit date
            let formattedMonth = this.month_names[date.getMonth()];
            let formattedMonthShortName = this.month_short_names[date.getMonth()];
            let formattedMonthInNumber = ('0' + (parseInt(date.getMonth()) + 1)).slice(-2);
            let formattedYear = date.getFullYear();

            if (this.dateFormat === 'DD-MM-YYYY') {
                return `${formattedDate}-${formattedMonthInNumber}-${formattedYear}`; // 02-04-2021
            }

            if (this.dateFormat === 'YYYY-MM-DD') {
                return `${formattedYear}-${formattedMonthInNumber}-${formattedDate}`; // 2021-04-02
            }

            if (this.dateFormat === 'D d M, Y') {
                return `${formattedDay} ${formattedDate} ${formattedMonthShortName} ${formattedYear}`; // Tue 02 Mar 2021
            }

            return `${formattedDay} ${formattedDate} ${formattedMonth} ${formattedYear}`;
        },
        isSelectedDate(date) {
            const d = new Date(this.year, this.month, date);
            return this.datepickerValue === this.formatDateForDisplay(d);
        },
        isToday(date) {
            const today = new Date();
            const d = new Date(this.year, this.month, date);
            return today.toDateString() === d.toDateString();
        },
        getDateValue(date) {
            let selectedDate = new Date(this.year, this.month, date);
            this.datepickerValue = this.formatDateForDisplay(selectedDate);
            this.isSelectedDate(date);
            this.showDatepicker = false;
        },
        getNoOfDays() {
            let i;
            let daysInMonth = new Date(this.year, this.month + 1, 0).getDate();

            // find where to start calendar day of week
            let dayOfWeek = new Date(this.year, this.month).getDay();

            let blankdaysArray = [];
            for (i = 1; i <= dayOfWeek; i++) {
                blankdaysArray.push(i);
            }

            let daysArray = [];
            for (i = 1; i <= daysInMonth; i++) {
                daysArray.push(i);
            }

            this.blankdays = blankdaysArray;
            this.no_of_days = daysArray;
        }
    }"
    x-init="[initDate(), getNoOfDays()]"
    x-modelable="datepickerValue"
    x-cloak
    {{ $attributes }}
    class="flex flex-col flex-none"
>

    <input type="hidden" name="{{ $name }}" x-bind:value="datepickerValue" />

    <x-ui::chip
        x-show="datepickerValue != null"
        x-on:click="datepickerValue = null"
        before="calendar"
        after="x-mark"
        :disabled="$disabled"
    >
        @if($with_label)
            <x-slot name="title">
                <span x-text="datepickerValue"></span>
            </x-slot>
        @endif
    </x-ui::chip>

    <x-ui::chip
        x-show="datepickerValue == null"
        x-on:click="showDatepicker = !showDatepicker"
        x-on:keydown.escape="showDatepicker = false"
        before="calendar"
        :title="$with_label ? $label : ''"
        :disabled="$disabled"
        x-ref="{{ $ref }}"
    />

    <div
        x-anchor.offset.4="$refs.{{ $ref }}"
        x-show.transition="showDatepicker"
        x-on:click.away="showDatepicker = false"
        class="flex flex-col p-4 bg-surface text-on-section rounded-md border border-hint shadow-dropdown z-50"
        style="width: 17rem"
    >
        <div class="flex flex-row justify-between items-center mb-2">
            <div>
                <span x-text="@js(random_int(-256, 256) == 8) ? x_month_names[month] : month_names[month]" class="text-lg font-bold text-on-section"></span>
                <span x-text="year" class="ml-1 text-lg text-subtitle font-normal"></span>
            </div>

            <div class="flex flex-row items-center justify-center">
                <button
                    type="button"
                    class="inline-flex p-1 bg-front hover:bg-section text-subtitle hover:text-on-section rounded-l-full focus:outline-hidden focus:shadow-outline transition cursor-pointer"
                    x-on:click="if (month == 0) { year--; month = 12; } month--; getNoOfDays()"
                >
                    <x-icon::chevron-left type="solid" />
                </button>
                <button
                    type="button"
                    class="inline-flex p-1 bg-front hover:bg-section text-subtitle hover:text-on-section rounded-r-full focus:outline-hidden focus:shadow-outline transition cursor-pointer"
                    x-on:click="if (month == 11) { month = 0; year++; } else { month++; } getNoOfDays()"
                >
                    <x-icon::chevron-right type="solid" />
                </button>
            </div>
        </div>

        <div class="flex flex-row flex-wrap mb-3 -mx-1">
            <template x-for="(day, index) in days" :key="index">
                <div style="width: 14.26%" class="px-0.5">
                    <div x-text="day" class="font-medium text-center text-xs text-subtitle"></div>
                </div>
            </template>
        </div>

        <div class="flex flex-wrap -mx-1">

            <template x-for="blankday in blankdays">
                <div style="width: 14.28%" class="text-center border p-1 border-transparent text-sm"></div>
            </template>

            <template x-for="(date, dateIndex) in no_of_days" :key="dateIndex">
                <div style="width: 14.28%" class="px-1 mb-1 text-on-section">
                    <div
                        @click="getDateValue(date)" x-text="date" class="cursor-pointer text-center text-sm leading-loose rounded-full transition ease-in-out duration-100" :class="{
                      'bg-primary text-on-primary font-bold': isToday(date) == true,
                      'hover:bg-primary-container hover:text-on-primary-container': isToday(date) == false && isSelectedDate(date) == false,
                    }"
                    ></div>
                </div>
            </template>

        </div>
    </div>

</div>

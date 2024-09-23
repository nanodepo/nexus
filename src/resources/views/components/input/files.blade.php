@props([
    'name' => '',
    'label' => null,
    'value' => null,
    'disabled' => false,
    'is_livewire' => true,
    'max_attachments' => 10,
])

<div
    class="flex flex-wrap gap-4"
    x-init="handleFilePast()"
    x-data='{
        new_attached: [],
        drag_enter: false,
        is_livewire: @json($attributes->wire('model')->value !== false),
        attached: [],
        isImage: function(file) {
            return file.type.includes("image/")
        },
        handleFilePast: function() {
            document.addEventListener("paste", (event) => {
                const items = event.clipboardData.items;
                const new_files_list = new ClipboardEvent("").clipboardData || new DataTransfer()
                new_files_list.files = $refs.files.files;

                for (let i = 0; i < items.length; i++) {
                    if (items[i].kind === "file") {
                        const file = items[i].getAsFile();
                        new_files_list.items.add(file);
                    }
                }
                Array.from($refs.files.files).forEach((file) => {
                    new_files_list.items.add(file)
                })

                $refs.files.files = new_files_list.files;
                this.attach()
            });
        },
        handleFileDrop: function (e) {
            if (e.dataTransfer.files.length > 0) {
                const files = e.dataTransfer.files;
                const new_files_list = new ClipboardEvent("").clipboardData || new DataTransfer()
                Array.from(files).forEach((file) => {
                    new_files_list.items.add(file)
                })
                Array.from($refs.files.files).forEach((file) => {
                    new_files_list.items.add(file)
                })
                if(this.is_livewire) {
                    $wire.uploadMultiple("attachments", files, (uploadedFilename) => {}, () => {}, (e) => {})
                }
                $refs.files.files = new_files_list.files;
                this.attach()
            }
        },
        remove: function(index) {
            if (index > -1) {
                const files = $refs.files.files;
                const new_files_list = new ClipboardEvent("").clipboardData || new DataTransfer();

                Array.from(files).forEach((item, i) => {
                    if (i !== index) {
                        new_files_list.items.add(files[i])
                    }
                })

                $refs.files.files = new_files_list.files;
                this.attach()
            }
        },
        attach: function() {
            this.new_attached = [];
            Array.from($refs.files.files).forEach((item, index) => {
                const split_name = item.name.split(".")
                const is_image = this.isImage(item)

                if(is_image) {
                    const reader = new FileReader()
                    reader.onload = (e) => {
                        this.new_attached.push({
                            extension: split_name[split_name.length - 1],
                            preview: e.target.result,
                            index: index
                        })
                    };
                    reader.readAsDataURL(item)
                } else {
                    this.new_attached.push({
                        extension: split_name[split_name.length - 1],
                        preview: false,
                        index: index
                    })
                }
            })
            this.attached = this.new_attached
        }
    }
'
>
    <label
        @class([
            'relative flex flex-col justify-center items-center w-22 h-22 text-center px-2 text-light-on-surface-variant dark:text-dark-on-surface-variant hover:text-light-on-surface dark:hover:text-dark-on-surface bg-light-primary/8 dark:bg-dark-primary/8 hover:bg-light-primary/12 dark:hover:bg-dark-primary/12 border border-dashed border-light-outline dark:border-dark-outline bg-cover bg-center overflow-hidden rounded-2xl transition cursor-pointer',
            'opacity-50 pointer-events-none' => $disabled
        ])
    >
        <div
            x-on:drop="drag_enter = false"
            x-on:drop.prevent="handleFileDrop($event)"
            x-on:dragover.prevent="drag_enter = true"
            x-on:dragleave.prevent="drag_enter = false"
            class="flex justify-center items-center  absolute top-0 left-0 bg-light-tertiary/60 dark:bg-dark-tertiary/60 text-light-on-tertiary dark:text-dark-on-tertiary text-xs w-full h-full opacity-0 transition"
            x-bind:class="{'opacity-100': drag_enter}"
        >Отпустите файлы для загрузки
        </div>
        <input
            type="file"
            name="{{ $name }}"
            accept="image/png, image/jpeg, application/json, application/xml, application/vnd.openxmlformats-officedocument.wordprocessingml.document, text/csv, application/pdf, application/vnd.rar, application/zip"
            multiple
            class="hidden"
            @disabled($disabled)
            @if($attributes->wire('model')->value)
                wire:model.defer="{{ $attributes->wire('model')->value }}"
            @endif
            x-ref="files"
            x-on:change="attach()"
        />
        @if($max_attachments > 0)
            <input name="max_attachments" value="{{ $max_attachments }}" type="number" class="hidden">
        @endif
        <x-icon::paper-clip x-show="!drag_enter" />
    </label>

    @if(isset($preview))
        {{ $preview }}
    @else
        <template x-for="file in attached">
            <div class="relative">
                <div
                    :style="file.preview && 'background-image: url(\'' + file.preview + '\'); background-size: cover;'"
                    class="font-bold bg-light-primary uppercase text-xs flex flex-col justify-center items-center w-22 h-22 text-light-on-surface-variant dark:text-dark-on-surface-variant hover:text-light-on-surface dark:hover:text-dark-on-surface hover:bg-light-primary/12 dark:hover:bg-dark-primary/12 bg-cover bg-center overflow-hidden rounded-2xl transition cursor-pointer"
                >
                    <span :class="file.preview && 'hidden'" x-text="file.extension"></span>
                </div>
                <div x-on:click="remove(file.index)" class="absolute rounded-2xl cursor-pointer opacity-0 hover:opacity-100 top-0 left-0 transition flex flex-col justify-center items-center bg-light-error-container/75 dark:bg-dark-error-container/75 text-light-on-error-container dark:text-dark-on-error-container w-22 h-22">
                    <x-icon::trash class="w-6 h-6" />
                </div>
            </div>
        </template>
    @endif
</div>

@if($max_attachments > 0)
    @error('max_attachments')
    <div class="py-2 text-sm font-medium text-light-error dark:text-dark-error">{{ $message }}</div>
    @enderror
@endif

@error(str($name)->replace('[', '.')->rtrim(']')->append('*')->toString())
<div class="py-2 text-sm font-medium text-light-error dark:text-dark-error">{{ $message }}</div>
@enderror

@props([
    'id' => 'editor',
    'name' => 'text',
    'value' => null,
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
    x-data="{ value: '' }"
    x-modelable="value"
    {{ $attributes }}
    x-on:change="value = window.{{ $uid }}.value()"
    x-init="
        window.{{ $uid }} || (window.{{ $uid }} = new EasyMDE({
            element: $refs.{{ $uid }},
            status: false,
            placeholder: '{{ $placeholder }}',
            insertTexts: {
                bold: '**',
                italic: '__',
                code: '```'
            },
            minHeight: '{{ $height }}px',
            SpellChecker: false,
            nativeSpellcheck: false,
            toolbar: [
                'bold',
                'italic',
                'unordered-list',
                'ordered-list',
                '|',
                'link',
                'image',
                'code',
                'table',
                // '|',
                // {
                //     name: 'custom',
                //     action: (editor) => {
                //         var cm = editor.codemirror;
                //
                //         var text;
                //         var start = '[Bernhard Wilson]';
                //         var end = '(https://nanodepo.net/user/bernhard.wilson)';
                //
                //         var startPoint = cm.getCursor('start');
                //         var endPoint = cm.getCursor('end');
                //
                //         text = cm.getSelection();
                //         cm.replaceSelection(start + text + end);
                //
                //         startPoint.ch += start.length;
                //         endPoint.ch = startPoint.ch + text.length;
                //
                //
                //         cm.setSelection(startPoint, endPoint);
                //         cm.focus();
                //
                //     },
                //     className: 'fa fa-user',
                //     title: 'Add user link',
                // },
                '|',
                'preview',
                'side-by-side',
                'fullscreen',
                '|',
                'guide'
            ]
        }));
        window.{{ $uid }}.value(@js(old($name, $value ?? '')));
    "
    x-cloak
>

    <textarea
        x-ref="{{ $uid }}"
        x-model="value"
        name="{{ $name }}"
    ></textarea>
</div>

@push('styles')
    <link rel="stylesheet" href="{{ asset('ckeditor5/ckeditor5.css') }}">
    <style>
        /* 讓編輯器內容可以滾動 */
        .ck-editor__editable {
            height: 500px;
        }
    </style>
@endpush

@push('scripts')
    <script src="{{ asset('ckeditor5/zh.umd.js') }}"></script>

    <script type="importmap">
        {
            "imports": {
                "ckeditor5": "https://cdn.ckeditor.com/ckeditor5/43.3.1/ckeditor5.js",
                "ckeditor5/": "https://cdn.ckeditor.com/ckeditor5/43.3.1/"
            }
        }
    </script>
    <script type="module">
        import {
            ClassicEditor,
            Essentials,
            Paragraph,
            Bold,
            Italic,
            Font,
            Alignment,
            Heading,
            List,
            Link,
            Image,
            Table,
            MediaEmbed,
            ImageUpload,
            SimpleUploadAdapter
        } from 'ckeditor5';

        ClassicEditor
            .create(document.querySelector('.ckeditor5'), {
                language: 'zh',
                simpleUpload: {
                    uploadUrl: '{{ route('admin.upload.image') }}',
                    upload: {
                        types: ['jpeg', 'png', 'gif', 'jpg', 'webp']
                    }
                },
                plugins: [
                    Essentials,
                    Paragraph,
                    Bold,
                    Italic,
                    Font,
                    Alignment,
                    Heading,
                    List,
                    Link,
                    Image,
                    Table,
                    MediaEmbed,
                    ImageUpload,
                    SimpleUploadAdapter
                ],
                toolbar: {
                    items: [
                        'fontSize', 'fontFamily', '|',
                        'fontColor', 'fontBackgroundColor', '|',
                        'bold', 'italic', 'underline', 'strikethrough', '|',
                        'alignment',
                        '|',
                        'bulletedList', 'numberedList', '|',
                        'outdent', 'indent', '|',
                        'link', 'imageUpload', 'mediaEmbed', '|',
                        'blockQuote', 'insertTable', '|',
                        'undo', 'redo'
                    ]
                },
                alignment: {
                    options: ['left', 'center', 'right', 'justify']
                },
                heading: {
                    options: [{
                            model: 'paragraph',
                            title: '段落',
                            class: 'ck-heading_paragraph'
                        },
                        {
                            model: 'heading1',
                            view: 'h1',
                            title: '標題 1',
                            class: 'ck-heading_heading1'
                        },
                        {
                            model: 'heading2',
                            view: 'h2',
                            title: '標題 2',
                            class: 'ck-heading_heading2'
                        },
                        {
                            model: 'heading3',
                            view: 'h3',
                            title: '標題 3',
                            class: 'ck-heading_heading3'
                        }
                    ]
                },
                fontSize: {
                    options: [
                        'tiny',
                        'small',
                        'default',
                        'big',
                        'huge'
                    ]
                },
                fontSize: {
                    options: [
                        8,
                        9,
                        10,
                        11,
                        12,
                        14,
                        16,
                        18,
                        20,
                        22,
                        24,
                        26,
                        28,
                        36,
                        48,
                        72
                    ],
                    supportAllValues: true
                },
                image: {
                    toolbar: [
                        'imageTextAlternative', '|',
                        'imageStyle:alignLeft',
                        'imageStyle:alignCenter',
                        'imageStyle:alignRight', '|',
                        'imageStyle:full',
                        'imageStyle:side'
                    ],
                    styles: [
                        'full',
                        'side',
                        'alignLeft',
                        'alignCenter',
                        'alignRight'
                    ]
                },
                table: {
                    contentToolbar: [
                        'tableColumn',
                        'tableRow',
                        'mergeTableCells',
                        'tableCellProperties',
                        'tableProperties'
                    ]
                },
                mediaEmbed: {
                    previewsInData: true
                }
            })
            .then(editor => {
                window.editor = editor;
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endpush

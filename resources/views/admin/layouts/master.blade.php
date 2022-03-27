<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>فروشگاه ویژگان</title>
    <link rel="stylesheet" href="{{url('panel/plugins/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{url('panel/dist/css/adminlte.min.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{{url('panel/dist/css/bootstrap-rtl.min.css')}}">
    <link rel="stylesheet" href="{{url('panel/plugins/select2/select2.min.css')}}">
    <link rel="stylesheet" href="{{url('panel/plugins/sweet_alert/sweetalert2.min.css')}}">
    <link rel="stylesheet" href="{{url('panel/dist/css/custom-style.css')}}">
    <link rel="stylesheet" href="{{url('panel/plugins/dropzone/css/dropzone.css')}}">
    <link rel="stylesheet" href="{{url('panel/plugins/colorpicker/css/bootstrap-colorpicker.min.css')}}">
    <link rel="stylesheet" href="{{url('panel/plugins/tinymce/content.min.css')}}">
    <link rel="stylesheet" href="{{url('panel/plugins/tinymce/skin.min.css')}}">
    <link rel="stylesheet" href="{{url('css/custom.css')}}">
    @livewireStyles
</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">
@include('admin.partials.header')
@include('admin.partials.sidebar')
<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @yield('content')
    </div>
    <!-- /.content-wrapper -->
</div>
<!-- jQuery -->
<script src="{{url('panel/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{url('panel/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{url('panel/dist/js/adminlte.min.js')}}"></script>
<script src="{{url('panel/plugins/select2/select2.full.min.js')}}"></script>
<script src="{{url('panel/plugins/sweet_alert/sweetalert2.all.min.js')}}"></script>
<script src="{{url('panel/plugins/dropzone/js/dropzone.js')}}"></script>
<script src="{{url('panel/plugins/colorpicker/js/bootstrap-colorpicker.min.js')}}"></script>
<script src="{{url('panel/plugins/tinymce/tinymce.min.js')}}"></script>
<script src="{{url('js/custom.js')}}"></script>

<script>
    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()
    });

    tinymce.init({
        selector: '.myEditor',
        setup: function (ed) {
            ed.on("keyup", function () {
                $('#livepreviewTinymce').html(tinymce.activeEditor.getContent());
            });
        },
        plugins: 'link media image preview',
        menubar: 'insert view',
        skin_url: '/css',
        toolbar: 'removeformat preview link media image undo redo styleselect bold italic alignleft aligncenter alignright alignjustify outdent indent',
        images_upload_url: "admin/upload_with_tinymce",
        file_picker_types: 'image',
        images_upload_handler: example_image_upload_handler,
        file_picker_callback: function (cb, value, meta) {
            var input = document.createElement('input');
            input.setAttribute('type', 'file');
            input.setAttribute('accept', 'image/*');

            /*
              Note: In modern browsers input[type="file"] is functional without
              even adding it to the DOM, but that might not be the case in some older
              or quirky browsers like IE, so you might want to add it to the DOM
              just in case, and visually hide it. And do not forget do remove it
              once you do not need it anymore.
            */

            input.onchange = function () {
                var file = this.files[0];

                var reader = new FileReader();
                reader.onload = function () {
                    /*
                      Note: Now we need to register the blob in TinyMCEs image blob
                      registry. In the next release this part hopefully won't be
                      necessary, as we are looking to handle it internally.
                    */
                    var id = 'blobid' + (new Date()).getTime();
                    var blobCache = tinymce.activeEditor.editorUpload.blobCache;
                    var base64 = reader.result.split(',')[1];
                    var blobInfo = blobCache.create(id, file, base64);
                    blobCache.add(blobInfo);

                    /* call the callback and populate the Title field with the file name */
                    cb(blobInfo.blobUri(), {title: file.name});
                };
                reader.readAsDataURL(file);
            };

            input.click();
        },

        video_template_callback: function (data) {
            var src = data.sourcemime;
            if (src.search('video') === 0) {
                console.log("asd");
                return '<video class="nima" width="' + data.width + '" height="' + data.height + '"' + (data.poster ? ' poster="' + data.poster + '"' : '') + ' controls="controls">\n' + '<source src="' + data.source + '"' + (data.sourcemime ? ' type="' + data.sourcemime + '"' : '') + ' />\n' + (data.altsource ? '<source src="' + data.altsource + '"' + (data.altsourcemime ? ' type="' + data.altsourcemime + '"' : '') + ' />\n' : '') + '</video>';
            } else if (src.search('audio') === 0) {
                return '<audio controls>' + '\n<source src="' + data.source1 + '"' + (data.source1mime ? ' type="' + data.source1mime + '"' : '') + ' />\n' + '</audio>';
            }
        }
    });

    function example_image_upload_handler(blobInfo, success, failure, progress) {
        var xhr, formData;

        xhr = new XMLHttpRequest();
        xhr.withCredentials = true;
        xhr.open('POST', "{{url('admin/upload_with_tinymce')}}");

        xhr.upload.onprogress = function (e) {
            progress(e.loaded / e.total * 100);
        };

        xhr.onload = function () {
            var json;

            if (xhr.status === 403) {
                failure('HTTP Error: ' + xhr.status, {remove: true});
                return;
            }

            if (xhr.status < 200 || xhr.status >= 300) {
                failure('HTTP Error: ' + xhr.status);
                return;
            }

            console.log(xhr.status);
            json = JSON.parse(xhr.responseText);

            if (!json || typeof json.location != 'string') {
                failure('Invalid JSON: ' + xhr.responseText);
                return;
            }

            success(json.location);
        };

        xhr.onerror = function () {
            failure('Image upload failed due to a XHR Transport error. Code: ' + xhr.status);
        };

        formData = new FormData();
        formData.append('file', blobInfo.blob(), blobInfo.filename());

        xhr.send(formData);
    }

</script>
@livewireScripts
@yield('scripts')

</body>

</html>

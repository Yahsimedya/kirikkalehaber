<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Limitless - Responsive Web Application Kit by Eugene Kopyov</title>
    <meta name="csrf-token" content="{{csrf_token()}}"><!-- Otmatik alt kategori seçmek için ekledik-->
    <!-- FONT AWESOME-->
    <link rel="preload" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" as="style"
          onload="this.rel='stylesheet'" onerror="this.href='stylesheet' " defer>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" defer>
    <link rel="preload" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" as="style"
          onload="this.rel='stylesheet'" onerror="this.href='stylesheet' ">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- FONT AWESOME-->
    <!-- POPPİNS FONT-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap"
          rel="stylesheet">
    <!-- POPPİNS FONT-->
    <link rel="preload" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" as="style"
          onload="this.rel='stylesheet'" onerror="this.href='stylesheet' " defer>

    <link rel="preload" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" as="style"
          onload="this.rel='stylesheet'" onerror="this.href='stylesheet' ">
    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet"
          type="text/css">
    <link href="{{asset('backend/global_assets/css/icons/icomoon/styles.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('backend/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('backend/assets/css/bootstrap_limitless.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('backend/assets/css/layout.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('backend/assets/css/components.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('backend/assets/css/colors.min.css')}}" rel="stylesheet" type="text/css">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="{{asset('backend/global_assets/picker/coloris.min.css')}}">


    <!-- /global stylesheets -->

    <!-- Core JS files -->

    <script src="{{asset('backend/global_assets/js/main/jquery.min.js')}}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="{{asset('backend/global_assets/js/main/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('backend/global_assets/js/plugins/loaders/blockui.min.js')}}"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script src="{{asset('backend/global_assets/js/plugins/visualization/d3/d3.min.js')}}"></script>
    <script src="{{asset('backend/global_assets/js/plugins/visualization/d3/d3_tooltip.js')}}"></script>
    <script src="{{asset('backend/global_assets/js/plugins/forms/styling/switchery.min.js')}}"></script>
    <script src="{{asset('backend/global_assets/js/plugins/ui/moment/moment.min.js')}}"></script>
    <script src="{{asset('backend/global_assets/js/plugins/pickers/daterangepicker.js')}}"></script>
    <script src="{{asset('backend/global_assets/js/plugins/pickers/daterangepicker.js')}}"></script>
    <script src="{{asset('backend/global_assets/js/plugins/pickers/colorpicker.js')}}"></script>

    <script src="{{asset('backend/assets/js/app.js')}}"></script>
    <script src="{{asset('backend/global_assets/js/plugins/forms/selects/select2.min.js')}}"></script>
    <script src="{{asset('backend/global_assets/js/demo_pages/form_select2.js')}}"></script>

    <script src="{{asset('backend/global_assets/js/plugins/extensions/jquery_ui/interactions.min.js')}}"></script>

    <script src="{{asset('backend/global_assets/js/demo_pages/dashboard.js')}}"></script>
    <script src="{{asset('backend/global_assets/js/demo_charts/pages/dashboard/light/streamgraph.js')}}"></script>
    <script src="{{asset('backend/global_assets/js/demo_charts/pages/dashboard/light/sparklines.js')}}"></script>
    <script src="{{asset('backend/global_assets/js/demo_charts/pages/dashboard/light/lines.js')}}"></script>
    <script src="{{asset('backend/global_assets/js/demo_charts/pages/dashboard/light/areas.js')}}"></script>
    <script src="{{asset('backend/global_assets/js/demo_charts/pages/dashboard/light/donuts.js')}}"></script>
    <script src="{{asset('backend/global_assets/js/demo_charts/pages/dashboard/light/bars.js')}}"></script>
    <script src="{{asset('backend/global_assets/js/demo_charts/pages/dashboard/light/progress.js')}}"></script>
    <script src="{{asset('backend/global_assets/js/demo_charts/pages/dashboard/light/heatmaps.js')}}"></script>
    <script src="{{asset('backend/global_assets/js/demo_charts/pages/dashboard/light/pies.js')}}"></script>
    <script src="{{asset('backend/global_assets/js/demo_charts/pages/dashboard/light/bullets.js')}}"></script>
    <!-- /theme JS files -->
    <script src="{{asset('backend/global_assets/js/plugins/tables/datatables/datatables.min.js')}}"></script>
    <script src="{{asset('backend/global_assets/js/plugins/tables/datatables/extensions/responsive.min.js')}}"></script>
    <script src="{{asset('backend/global_assets/js/demo_pages/datatables_responsive.js')}}"></script>
    {{-- <link href="https://nightly.datatables.net/css/jquery.dataTables.css" rel="stylesheet" type="text/css" /> --}}
    {{-- <script src="https://nightly.datatables.net/js/jquery.dataTables.js"></script> --}}
    <script src=" https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <script src="{{asset('backend/global_assets/js/plugins/forms/styling/uniform.min.js')}}"></script>
    <script src="{{asset('backend/global_assets/js/demo_pages/form_layouts.js')}}"></script>
    <script src="{{asset('backend/global_assets/js/plugins/editors/ckeditor/ckeditor.js')}}"></script>
    <script src="{{asset('backend/global_assets/js/demo_pages/editor_ckeditor_default.js')}}"></script>
    <script src="{{asset('backend/global_assets/js/plugins/forms/tags/tagsinput.min.js')}}"></script>
    <script src="{{asset('backend/global_assets/js/demo_pages/form_controls_extended.js')}}"></script>
    <script src="{{asset('backend/global_assets/js/plugins/forms/inputs/maxlength.min.js')}}"></script>
    <script src="{{asset('backend/global_assets/js/demo_pages/form_checkboxes_radios.js')}}"></script>
    <script src="{{asset('backend/global_assets/js/plugins/uploaders/dropzone.min.js')}}"></script>

    <script src="{{asset('backend/global_assets/js/demo_pages/uploader_dropzone.js')}}"></script>
    <script src="{{asset('global_assets/js/plugins/loaders/blockui.min.js')}}"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script src="{{asset('global_assets/js/plugins/uploaders/dropzone.min.js')}}"></script>

    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{asset('global_assets/js/demo_pages/uploader_dropzone.js')}}"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/dropzone.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/min/dropzone.min.js"></script>
    <script type="text/javascript" src="{{asset('backend/global_assets/picker/coloris.min.js')}}"></script>
    <script type="text/javascript">

        Coloris({
            el: '.coloris',
            swatches: [
                '#264653',
                '#2a9d8f',
                '#e9c46a',
                '#f4a261',
                '#e76f51',
                '#d62828',
                '#023e8a',
                '#0077b6',
                '#0096c7',
                '#00b4d8',
                '#48cae4',
            ]
        });

    </script>
    <script>
        var dropzone = new Dropzone('#file-upload', {
            previewTemplate: document.querySelector('#preview-template').innerHTML,
            parallelUploads: 3,
            thumbnailHeight: 150,
            thumbnailWidth: 150,
            maxFilesize: 5,
            filesizeBase: 1500,
            thumbnail: function (file, dataUrl) {
                if (file.previewElement) {
                    file.previewElement.classList.remove("dz-file-preview");
                    var images = file.previewElement.querySelectorAll("[data-dz-thumbnail]");
                    for (var i = 0; i < images.length; i++) {
                        var thumbnailElement = images[i];
                        thumbnailElement.alt = file.name;
                        thumbnailElement.src = dataUrl;
                    }
                    setTimeout(function () {
                        file.previewElement.classList.add("dz-image-preview");
                    }, 1);
                }
            }
        });

        var minSteps = 6,
            maxSteps = 60,
            timeBetweenSteps = 100,
            bytesPerStep = 100000;

        dropzone.uploadFiles = function (files) {
            var self = this;

            for (var i = 0; i < files.length; i++) {

                var file = files[i];
                totalSteps = Math.round(Math.min(maxSteps, Math.max(minSteps, file.size / bytesPerStep)));

                for (var step = 0; step < totalSteps; step++) {
                    var duration = timeBetweenSteps * (step + 1);
                    setTimeout(function (file, totalSteps, step) {
                        return function () {
                            file.upload = {
                                progress: 100 * (step + 1) / totalSteps,
                                total: file.size,
                                bytesSent: (step + 1) * file.size / totalSteps
                            };

                            self.emit('uploadprogress', file, file.upload.progress, file.upload
                                .bytesSent);
                            if (file.upload.progress == 100) {
                                file.status = Dropzone.SUCCESS;
                                self.emit("success", file, 'success', null);
                                self.emit("complete", file);
                                self.processQueue();
                            }
                        };
                    }(file, totalSteps, step), duration);
                }
            }
        }

    </script>

    <style>
        .dropzone {

            border-radius: 13px;
            max-width: 100%;
            margin-left: auto;
            margin-right: auto;
            border: 2px dotted ;
            margin-top: 50px;
        }

    </style>
    <style type="text/css">
        @import url(https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap);

        input {
            width: 150px;
            height: 32px;
            padding: 0 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-family: inherit;
            font-size: inherit;
            font-weight: inherit;
            box-sizing: border-box;
        }

        .examples {
            display: flex;
            flex-wrap: wrap;
        }

        .example {
            flex-shrink: 0;
            width: 300px;
            margin-bottom: 30px;
        }

        .square .clr-field button,
        .circle .clr-field button {
            width: 22px;
            height: 22px;
            left: 5px;
            right: auto;
            border-radius: 5px;
        }

        .square .clr-field input,
        .circle .clr-field input {
            padding-left: 36px;
        }

        .circle .clr-field button {
            border-radius: 50%;
        }

        .full .clr-field button {
            width: 100%;
            height: 100%;
            border-radius: 5px;
        }

    </style>
</head>

<body>

<script>
    @if(Session::has('message'))
    var type = "{{Session::get('alert-type','info')}}"

    switch (type) {
        case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;
        case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;
        case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;
        case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
    }
    @endif
</script>
@include('admin.body.header')


<!-- Page content -->
<div class="page-content">

    @include('admin.body.sidebar')

    <div class="content-wrapper">

        @yield('admin')

        @include('admin.body.footer')
    </div>
</div>
<!-- /page content -->
<script>
    $(document).ready(function () {

        $("#tokenfield").tagsinput();

        //         $("#tokenfield").tagsinput({
        //   tagClass: 'big'
        // });
    });
</script>
</body>
</html>

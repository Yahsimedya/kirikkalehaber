@extends('admin.admin_master')

@section('admin')

    <div class="content">

        <!-- Removable thumbnails -->
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">Foto Galeriye Fotoğraf Yükle</h5>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>
                        <a class="list-icons-item" data-action="reload"></a>
                        <a class="list-icons-item" data-action="remove"></a>
                    </div>
                </div>
            </div>


            <div class="card-body">
                <p class="mb-3">Example of a <code>multiple</code> file uploader based on <code>Dropzone.js</code> library. Dropzone.js is a light weight JavaScript library that turns an HTML element into a dropzone. This means that a user can drag and drop a file onto it, and the file gets uploaded to the server via AJAX. By default Dropzone is a multiple file uploader, so this example is a basic setup. Uploading process runs automatically and image thumbnail previews are shown right after file selection.</p>

                <p class="font-weight-semibold">Multiple file upload example:</p>
                <div class="form-group pt-4 pb-4">
                    <a class="btn btn-success float-right" href="{{route('galery.detail',$photocategory->photocategory_id)}}"><i class="icon-stack-plus" aria-hidden="true"></i>
                        Fotoları Gör
                    </a></div>
                <form action="{{route('update.photo')}}" class="dropzone dz-clickable" id="dropzone_multiple" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="photocategory_id" id="dropzone_remove" value="{{$photocategory->photocategory_id}}">

                    <div class="dz-default dz-message"><button class="dz-button" type="button">Drop files to upload <span>or CLICK</span></button></div>
                </form>
            </div>
        </div>
        <!-- /removable thumbnails -->
    </div>
    <script>
        Dropzone.autoDiscover = false;

        $("#dropzone_multiple").dropzone({
            paramName: "file", // The name that will be used to transfer the file
            dictDefaultMessage: 'Drop files to upload <span>or CLICK</span>',
            maxFilesize: 1, // MB
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },

            acceptedFiles: 'image/*'

        });
    </script>
@endsection

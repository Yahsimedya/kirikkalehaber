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

                <div class="form-group pt-4 pb-4">
                    <a class="btn btn-success float-right" href="{{route('galery.detail',$photocategory->photocategory_id)}}"><i class="icon-stack-plus" aria-hidden="true"></i>
                        Fotoları Gör
                    </a></div>
                <form action="{{route('update.photo')}}" class="dropzone dz-clickable" id="dropzone_multiple" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="photocategory_id" id="dropzone_remove" value="{{$photocategory->photocategory_id}}">

                    <div class="dz-default dz-message">
                        <button class="dz-button" type="button">
                            Fotoğrafları sürükle yada tıkla
                        </button></div>
                </form>
            </div>
        </div>
        <!-- /removable thumbnails -->
    </div>
    <script>
        Dropzone.autoDiscover = false;

        $("#dropzone_multiple").dropzone({
            paramName: "file", // The name that will be used to transfer the file
            dictDefaultMessage: 'Fotoğrafları sürükle yada tıkla',
            maxFilesize: 1, // MB
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },

            acceptedFiles: 'image/*'

        });
    </script>
@endsection

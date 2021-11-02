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
                <p class="mb-3">Sürükle bırak metoduyla  oluşturmuş olduğunuz foto galeriye fotoğraf <code>yükleyebilirsiniz</code> Yüklediğiniz fotoğrafları <code>Fotoları Gör</code> butonu yardımıyla görebilir, sıralayabilir yada içerik ekleyebilirsiniz</p>

                <!-- <form action="#" class="dropzone" id="dropzone_remove"></form> -->
                <div class="form-group pt-4 pb-4">
                    <a class="btn btn-success float-right" href=""><i class="icon-stack-plus" aria-hidden="true"></i>
                        Fotoları Gör
                    </a></div>
                <form action="{{route('update.photo', $photocategory)}}" class="dropzone" >
                    @csrf
                    <input type="hidden" name="image" id="dropzone_remove" value="">

                </form>

            </div>
        </div>
        <!-- /removable thumbnails -->
    </div>
@endsection

@extends('admin.admin_master')
@section('admin')



    <section class="content">


        <div class="box box-primary">
            <div class="content-header">
                <h1>Yönetici Düzenle</h1>
                <hr>
            </div>

            <div class="box-body">


                <!-- Default box -->


                <!-- /.box-header -->
                <a class="btn btn-success" href="{{route('all.orderImagesPage',$id)}}"><i class="fa fa-plus" aria-hidden="true"></i>
                    Fotoları Gör
                </a>

                <div id="dropzone">
                    <form action="{{ route('OrderphotoUpload',$id) }}" class="dropzone" id="file-upload" enctype="multipart/form-data">
                        @csrf
                        <div class="dz-message">
                            Yüklemek istediğiniz Fotoları Sürükleyin<br>
                        </div>
                    </form>
                </div>


            </div>
            <!-- /.box-body -->
        </div>

    </section>

@endsection

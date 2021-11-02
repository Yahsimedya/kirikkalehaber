@extends('admin.admin_master')
@section('admin')


    <section class="content">
        <div class="content-header">
            <h1>Kullanıcı Güncelle</h1>
            <div align="right">


            </div>
        </div>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            <form action="{{route('anadoluajans.userupdate')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">

                    <div class="row">


                        <div class="col-lg-6"><label>Kullanıcı Adı</label>


                            <input type="text" value="{{$data->username}}" name="username" required="" class="form-control">
                            <input type="hidden" value="{{$data->id}}" name="id" required="" class="form-control">
                        </div>
                        <div class="col-lg-6"><label> Şifre</label>
                            <input type="password" value="{{$data->password}}" name="password" required="" class="form-control">
                        </div>
                    </div>
                </div>


                <div class="form-group">

                    <div class="row">


                    </div>


                </div>

                <div align="right" class="box-footer">
                    <button type="submit" class="btn btn-success" name="iha_insert">Güncelle</button>
                </div>
            </form>

        </div>
    </section>




@endsection

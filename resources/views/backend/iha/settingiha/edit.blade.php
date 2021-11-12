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

            <form action="{{route('setting.userupdate')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">

                    <div class="row">

                        <div class="col-lg-6"><label>İHA RSS Kullanıcı Kodu</label>
                            <input type="text" value="{{$data->iha_usercode}}" name="iha_usercode" required="" class="form-control">
                            <input type="hidden" value="{{$data->id}}" name="id" required="" class="form-control">
                        </div>
                        <div class="col-lg-6"><label>İHA Kullanıcı Adı</label>


                            <input type="text" value="{{$data->iha_username}}" name="iha_username" required="" class="form-control">
                        </div>
                    </div>
                </div>


                <div class="form-group">

                    <div class="row">
                        <div class="col-lg-6"><label>İHA Şifre</label>
                            <input type="password" value="{{$data->iha_password}}" name="iha_password" required="" class="form-control">
                        </div>
                        <div class="col-lg-6"><label>İHA Rss Şifre</label>
                            <input type="password" value="{{$data->iha_rss}}" name="iha_rss" required="" class="form-control">
                        </div>
                    </div>


                </div>

                <div class="form-check form-check-center form-check-switchery form-check-switchery-md">
                    <label class="form-check-label">
                        Otomatik Haber Botu
                        <input type="checkbox" name="auto_Bot" class="form-input-switchery" @if($data->auto_Bot==1) checked @endif data-fouc>
                    </label>
                </div>






                <div align="right" class="box-footer">
                    <button type="submit" class="btn btn-success" name="iha_insert">Güncelle</button>
                </div>
            </form>

        </div>
    </section>




@endsection

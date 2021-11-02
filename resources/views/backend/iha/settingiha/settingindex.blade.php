@extends('admin.admin_master')
@section('admin')

    <?php
    $say = 0;
    ?>


    @if($sayi==0)

        <section class="content">
            <div class="content-header">
                <h1>Kullanıcı Ekle</h1>
                <div align="right">


                </div>
            </div>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">

                <form action="{{route('settingiha.useradd')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">

                        <div class="row">

                            <div class="col-lg-6"><label>Kullanıcı Kodu</label>
                                <input type="text" name="iha_usercode" required="" class="form-control">
                            </div>
                            <div class="col-lg-6"><label>İHA Kullanıcı Adı</label>


                                <input type="text" name="iha_username" required="" class="form-control">
                            </div>
                        </div>
                    </div>


                    <div class="form-group">

                        <div class="row">
                            <div class="col-lg-6"><label>İHA Şifre</label>
                                <input type="password" name="iha_password" required="" class="form-control">
                            </div>
                            <div class="col-lg-6"><label>İHA Rss Şifre</label>
                                <input type="password" name="iha_rss" required="" class="form-control">
                            </div>
                        </div>


                    </div>

                    <div align="right" class="box-footer">
                        <button type="submit" class="btn btn-success" name="iha_insert">Ekle</button>
                    </div>
                </form>

            </div>
        </section>


    @else

        <section class="content">


            <div class="box box-primary">

                <div class="content-header">
                    <h1>Kullanıcılar</h1>
                    <div align="right">


                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th align="center" width="5">#</th>
                            <th>İHA Kullanıcı Adı</th>
                            <th>İHA Kullanıcı Kodu</th>
                            <th>İHA Şifre</th>
                            <th>Düzenle</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($setting as $row)

                            <tr>
                                <td> {{$say++}}</td>
                                <td>{{$row->iha_username}}</td>
                                <td>{{$row->iha_usercode}}</td>

                                <td>{{$row->iha_password}}</td>

                                <td align="center" width="5"><a href="{{route('editpage.iha',$row->id)}}"> <i class="icon-cog3"
                                                                            style="font-size: 27px;color: #073f92;"></i></a>
                                </td>

                            </tr>
                        @endforeach


                    </table>
                </div>
                <!-- /.box-body -->
            </div>



    @endif




@endsection

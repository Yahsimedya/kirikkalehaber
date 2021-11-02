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

                <form action="{{route('setting.useradd')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">

                        <div class="row">

                            <div class="col-lg-6"><label>Kullanıcı Adı</label>
                                <input type="text" name="username" required="" class="form-control">
                            </div>

                        </div>
                    </div>


                    <div class="form-group">

                        <div class="row">
                            <div class="col-lg-6"><label>Şifre</label>
                                <input type="password" name="password" required="" class="form-control">
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
                            <th>Kullanıcı Adı</th>
                            <th>Şifre</th>

                        </tr>
                        </thead>
                        <tbody>

                        @foreach($setting as $row)

                            <tr>
                                <td> {{$say++}}</td>
                                <td>{{$row->username}}</td>
                                <td>{{$row->password}}</td>


                                <td align="center" width="5"><a href="{{route('editpage.anadoluajans',$row->id)}}"> <i
                                            class="icon-cog3"
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

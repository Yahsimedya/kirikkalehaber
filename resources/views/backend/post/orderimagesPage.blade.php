@extends('admin.admin_master')
@section('admin')

    <div class="content">



        <div class="card">
            <div class="card-header">
                <h1>Resim Düzenle</h1>
                <hr>
            </div>

            <div class="card-body">


                <!-- Default box -->
                <!-- /.box-header -->
                <form action="{{route('Orderphotodelete',$id)}}"  method="POST" >
                    @csrf
                    <input type="hidden" name="haber_id" value="">

                    <div align="right" class="col-md-12">
                        <button type="submit" href="{{route('Orderphotodelete',1,31)}}" name="urunfotosil" class="btn btn-danger "><i class="fa fa-trash" aria-hidden="true"></i> Seçilenleri Sil</button>
                        <button type="submit" href="" name="kapakfotosec" class="btn btn-danger "><i class="fa fa-trash" aria-hidden="true"></i>Güncelle</button>

                        <a class="btn btn-success" href="{{route('all.orderImagesUploadPage',$id)}}"><i class="fa fa-plus" aria-hidden="true"></i> Haber Fotoğrafı Yükle</a>
                    </div>
                    <div class="clearfix"></div>


                    <div class="x_content row" id="sortable">

                        @foreach($orderImages as $row)
                            <div class="col-md-3 mt-2" id="item-<?php echo "haberfoto_id" ?>">

                                <div class="border">

                                    <div class="image view view-first sortable"  >
                                        <input type="hidden" name="image" value="{{$row->image}}">
                                        <img src="{{asset($row->image)}}" class="img-fluid" style="max-height: 200px" >



                                    </div>


                                    <div class="form-group ml-2">
                                        <div class="form-check form-check-inline mt-4">
                                            <label class="form-check-label">
                                                <input type="radio"  class="form-check-input-styled-success" name="haberfoto_kapak" value="{{$row->id}}"  <?php //  if ($haberfoto1==$haberfoto2) { echo "checked"; }   ?> > kapak
                                            </label>
                                        </div>
                               <!--      <input type="text" name="secilifoto" value="{{$row->image}}">-->
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <input type="checkbox" name="urunfotosec[]" class="form-check-input-styled" value="{{$row->id}}"> Seç
                                            </label>
                                        </div>
                                    </div>


                                </div>
                            </div>


                    @endforeach
                </form>


            <!--  <?php //} ?>-->
            </div>

        </div>


        <!-- /.box-body -->
    </div>

    </div>
    <!-- /.content -->
    <!-- /.content-wrapper -->
    <script type="text/javascript">
        $(document).ready(function() {

            $(function() {
                $("#sortable").sortable({
                    revert: true,
                    handle: ".sortable",
                    stop: function(event, ui) {
                        var data = $(this).sortable('serialize');
                        console.log(data);
                        $.ajax({
                            type: "post",
                            dataType: "json",
                            data: data,
                            url: "netting/order-ajax.php?haberfoto_sira=true",
                            success: function(msg) {
                                console.log(msg.islemSonuc);
                                console.log(msg.islemMsg);

                            }

                        });
                    }
                });
                $("#sortable").disableSelection();
            });

        });
    </script>

@endsection

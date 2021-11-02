@extends('admin.admin_master')

@section('admin')

<script>
	$(document).ready(function() {

        $('#btnn').click(function(){
                    $.ajax({
                        type : "POST",
                        url: 'fotogaleri-crud.php',
                        data: $('#form').serialize(),
                        success:function(donen_veri)
                        {
                            alert("başarılı")						;
                            // $('#form').trigger("reset");
                            // window.opener.location.reload(true);// popupın açıldığı sayfayı refresh eder.
                            // window.close();
                                            // alert("Silindi");
                        },
                    })
                })

        // 		$('#yakala a').click(function() {
        // var sectionId =$(this).attr('sectionId');
        // $.post("islemler.php?islem=sil",{"urunid":sectionId},function(post_veri){
        // // $(".sonuc2").html(post_veri);
        // window.location.reload();
        // })
        // })



                });

</script>

<!-- Content Wrapper. Contains page content -->
  <!-- Content Header (Page header) -->


<?php
// if(isset($_POST['urunfotosil'])) {
//     $fotogaleri_id=$_POST['fotogaleri_id'];

//    echo $checklist = $_POST['galerifotosec'];


// //    foreach($checklist as $list) {

//        $sil=$db->genelsorgu("DELETE from fotogaleri_foto where fotogaleri_fotoid=:foto_id");
//        $kontrol=$sil->execute(array(
//            'foto_id' => $list
//            ));
// //    }
// echo $eskiresim=$_POST["eskiyol"];
// unlink($eskiresim);

//    if ($kontrol) {
// // echo "başarılı";
//        Header("Location:../yonetim/fotogaleriresim-gor.php?fotogaleri_id=$fotogaleri_id&durum=ok");

//    } else {

//        Header("Location:../yonetim/fotogaleriresim-gor.php?fotogaleri_id=$fotogaleri_id&durum=ok");
//    }


// }
?>
  <div class="content">



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
{{--
@php
    dd($photos);
@endphp --}}
@foreach ($photos as $photo )
@endforeach

<!-- Default box -->
<!-- /.box-header -->

<form id="form"  action="{{route('add.text', $photo->photocategory_id)}}" method="POST" enctype="multipart/form-data">
    @csrf
<input type="hidden" name="" value="">



  <div align="right" class="col-md-12">
    <button id="btnn" type="submit" name="action"  class="btn btn-danger float-right "><i class="icon-redo" aria-hidden="true" value="updatephoto"></i> Güncelle</button>

      {{-- <a class="btn btn-success" href="fotogaleri-yukle.php?fotogaleri_id="><i class="icon-cloud-upload" aria-hidden="true"></i> Ürün Fotoğraf Yükle</a> --}}
    </div>
  <div class="clearfix"></div>


 <div class="x_content row"  id="sortable">

@foreach ($photos as $foto )

    <div class="col-md-3" id="item-" >
    <div style="padding:5px; margin-top:10px; border-radius:5px;border: 1px solid #c9c9c9;" >
    <label>
    <input type="hidden" class="form-check-input-styled-success"  name="eskiyol[]"  value="{{$foto->photo}}" >

    <!-- <input type="hidden" class="form-check-input-styled-success"  name="galerifotosec[]"  value="../img/fotogaleri/webp/" > -->

    {{-- <input type="checkbox" class="form-check-input-styled-success"  name="galerifotosec[]"  value="" >Fotoğraf Seç --}}

      <div class="image view view-first sortable" style="margin-top:20px;" >

<img src="{{asset($foto->photo)}}" class="img-fluid" />
<textarea class="form-control mt-2" name="photo_text[]" id="" cols="30" rows="5">{{$foto->photo_text}}</textarea> </div>

{{-- <input type="text" name="tekliyol"  value="{{asset($foto->photo)}}" > --}}

      <input type="hidden" name="fotogaleri_fotoid[]"  value="{{$foto->id}}" >
      <a href="{{route('delete.photo',$foto->id)}}" type="submit" id="deleteRecord{{$foto->id}}" name="action"  class="btn btn-danger"><i class="icon-trash" aria-hidden="true" value="sil"></i>  Sil</a>

      <!-- <input type="text" name="fotogaleri_id"  value="" > -->
      {{-- <input type="text" name="foto_isim[]"  value="{{$foto->photo}}" > --}}


      </label>

      <label>

    </label>
    <!-- <input type="radio" class="form-check-input-styled-success"  name="foto_kapak"  value="1" >Kapak -->

    </div>
  </div>
  @endforeach




</form>


 </div>



  <!-- /.box-body -->
  </div>

 </div>

<!-- /.content -->
<!-- /.content-wrapper -->
{{-- <script type="text/javascript">
   $(document).ready(function(){

$(function() {
  $("#sortable").sortable({

    revert:true,
    handle:".sortable",
    stop:function(event,ui) {
        var foto_id = $(this).val();
      var data=$(this).sortable('serialize');
      console.log(data);
      $.ajax({
        type:"post",
        dataType:"json",
        data:data,
        url:"{{  url('/get/order/') }}/"+foto_id",
        success:function(msg) {
          console.log(msg.islemSonuc);
          console.log(msg.islemMsg);

        }

      });
    }
  });
  $("#sortable").disableSelection();
});

});
</script> --}}
@endsection

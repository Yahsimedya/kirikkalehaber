@extends('admin.admin_master')
@section('admin')

    <script>
    $(document).ready(function(e) {

        $('#sunucu').hide();
        $('#pcinput').show();
        // $('#al').attr('name', ''); // Д°NPUT NAME DEДћД°ЕћTД°RDД°K
        // $('#pcinput').attr('name', ''); // Д°NPUT NAME DEДћД°ЕћTД°RDД°K

        $("#pccheck").on('click', function() {
            $('#pcinput').show();
            $('#sunucu').hide();

            // $("input[type='file']").removeAttr('haberfoto_resimyol');
            // $("input:file").removeAttr('name');

            // $('#al').attr('name', ''); // Д°NPUT NAME DEДћД°ЕћTД°RDД°K
            $('#pcinput').attr('name', 'gorsel'); //Д°NPUT NAME DEДћД°ЕћTД°RDД°K
            $('#al').attr('name', ''); //Д°NPUT NAME DEДћД°ЕћTД°RDД°K

        });
        $("#sunucucheck").on('click', function() {
            $('#pcinput').hide();

            $('#sunucu').show();

            // $('#al').attr('name', 'haberfoto_resimyol'); //Д°NPUT NAME DEДћД°ЕћTД°RDД°K
            $('#al').attr('name', 'gorsel'); //Д°NPUT NAME DEДћД°ЕћTД°RDД°K
            $('#pcinput').attr('name', ''); //Д°NPUT NAME DEДћД°ЕћTД°RDД°K


        });

    });
</script>
<script>
    $(document).ready(function(e) {

        $("#search").keyup(function() {
            $("#show_up").show();
            var text = $(this).val();
            $.ajax({

                type: 'GET',
                url: 'netting/order-ajax.php',
                data: 'txt=' + text,

                success: function(data) {
                    $("#show_up").html(data);

                }

            });


        })

    });
</script>
<script>
    $(document).ready(function() {
        // var fotosec = $('#foto_sec');
        // var fotayaeris = fotosec.getElementsByClassName('check')[0];

        $($(this)).on('click', '#foto_sec', function() {
            display($(this));
            // $("#modal-default").hide();
            $(this).closest('.kaldir');

            // $(this).addClass('kaldir').siblings().removeClass('kaldir');

        });

        $("#foto_sec").on('click', function() {
            $(this).children(".kaldir").css("height", "100%");

        });
        $("#show_up ").on('click', function() {
            $('#modal_full').modal('hide');
            // alert("tamam");
        });

    });

    function display($this) {

        var source = $("img", $this).attr("src");
        var subStr = source.substring(13, 250);

        // alert("The souce of the image is " + source);
        $("#al").val(subStr);

    }

    // $('#al').html(veri);
</script>








    <div class="content">

        <div class="card">

            <div class="card-body">



<div class="content-wrapper">
    <!-- Content Header (Page header) -->


    <section class="content">

        <form action="{{route('notification.send')}}" method="POST">
            @csrf
            <div class="form-group">
                <label>Başlık</label>
                <div class="row">
                    <div class="col-xs-12">
                        <input type="text" name="title" required="" class="form-control">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Bildirim İçeriği</label>
                <div class="row">
                    <div class="col-xs-12">
                        <input type="text" name="body" required="" class="form-control">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Bildirim Türü</label>
                <div class="row">
                    <div class="col-xs-12">
                        <select name="bildirim_turu" id="">
                            <option value="politika">politika</option>
                            <option value="onemliGelismeler">Öenmeli GeliЕџmeler</option>
                            <option value="ekonomi">Ekonomi</option>
                            <option value="spor">Spor</option>
                            <option value="magazin">Magazin</option>

                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Haber ID</label>
                <div class="row">
                    <div class="col-xs-12">
                        <input type="text" name="id" required="" class="form-control">
                    </div>
                </div>
            </div>


            <!-- <input type="text" name="bildirim_turu"> -->
            <button class="btn btn-success" type="submit" name="bildirimgonder">Gönder</button>
        </form>
        <div id="modal_full" class="modal fade" tabindex="-1">
            <div class="modal-dialog modal-full">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Full width modal</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <div class="modal-body">
                        <input type="text" class="form-control" name="names" placeholder="ForoДџrafД± ismiyle arayД±nД±z" id="search">
                        <div id="show_up"></div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-link" data-dismiss="modal">Kapat</button>
                        <button type="button" class="btn bg-primary">DeДџiЕџiklikleri Kaydet</button>
                    </div>
                </div>
            </div>
        </div>       </div>
            </div>
        </div>

</div>
</section>
@endsection

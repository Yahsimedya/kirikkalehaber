@extends('main.home_master')
@section('title',$sehir->district_tr)
@section('meta_keywords',$sehir->district_keywords)
@section('meta_description',$sehir->district_description)
@section('content')

    <div class="container position-relative">
        <div class="row " style="right: 0">
            {{--        <div class="col-md-2 pb-4 pt-4 position-absolute float-right right-0">--}}
            {{--            <select class="form-control" id="subdistrict_id" name="subdistrict_id">--}}
            {{--                <option value="">{{$sehir->district_tr." İlçeleri"}}</option>--}}
            {{--                @foreach($subdistricts as $subdis)--}}
            {{--                    <option value="{{$subdis->id}}">{{$subdis->subdistrict_tr}}</option>--}}

            {{--                @endforeach--}}
            {{--            </select>--}}
            {{--        </div>--}}

            <form id="form" class="text-center pb-3 mt-4 " >
                @csrf
                <div class="position-absolute col-md-2 col-12" style="right: 0">

                    <select id="district_id" name="district_id" class="form-control">
                        <option value="">Diğer İller</option>
                        @foreach($alldistrict as $district)
                            <option
                                @php if($sehir->id == $district->id ) { echo "selected";} @endphp value="{{$district->id}}">{{$district->district_tr}}</option>

                        @endforeach
                    </select>
                </div>

            </form>

        </div>
        <div class="row" id="gotur">

            {{--        {{dd($sehirsay)}}--}}
            @if($sehirsay!=0)


                <div class="col-md-8 pb-4 pt-4">
                    <h2><b>{{$sehir->district_tr. " Haberleri"}}</b></h2>
                    <h5>{{$sehir->district_tr." haber , ".$sehir->district_tr." son dakika haberleri ve gelişmeleri."}}</h5>


                </div>


                <div class="col-md-2 pb-4 pt-4">


                </div>


                @foreach ($districts as $row)

                    <div class="col-md-4">
                        <a href="{{URL::to('/'.str_slug($row->title_tr).'/'.$row->id.'/'.'haberi')}}">
                            <div class="card kart kart-width shadow mb-2" style="">
                                <img class="img-fluid kart_img" src="{{asset($row->image)}}"/>
                                <div class="card-body kart-body  bordercolor-6 border-3 text-dark">
                                    <p class="card-text">{{$row->title_tr}}</p>
                                </div>
                            </div>
                        </a>

                    </div>
                @endforeach
            @else
                <div class="container ">
                    <div class="row shadow  mt-5 mb-5" style="height: 500px">
                        <div class="col-md-12 justify-content-center align-self-center">
                            <h5 class="mx-auto my-auto text-center">{{$sehir->district_tr." iline ait haber bulunamadı."}}</h5>

                        </div>
                    </div>
                </div>
            @endif

        </div>
        <div class="row">
            <div class="w-100" id="al"></div>
        </div>
    </div>
    {{--<script type="text/javascript">--}}
    {{--    $(document).ready(function() {--}}
    {{--        $('select[name="district_id"]').on('change', function(){--}}
    {{--            var district_id = $(this).val();--}}
    {{--            if(district_id) {--}}
    {{--                $.ajax({--}}
    {{--                    url: "{{url('/get/subdistrict/') }}/"+district_id,--}}
    {{--                    type:"GET",--}}
    {{--                    dataType:"json",--}}
    {{--                    success:function(data) {--}}
    {{--                        $("#subdistrict_id").empty();--}}
    {{--                        $.each(data,function(key,value){--}}
    {{--                            $("#subdistrict_id").append('<option value="'+value.id+'">'+value.subdistrict_tr+'</option>');--}}
    {{--                        });--}}
    {{--                        // console.log(data);--}}
    {{--                    },--}}

    {{--                });--}}
    {{--            } else {--}}
    {{--                alert('danger');--}}
    {{--            }--}}
    {{--        });--}}
    {{--    });--}}
    {{--</script>--}}
    <script>
        $(document).ready(function (e) {


            $('#form select').on('change', function () {
                e = $('#district_id').val();
// var str =$(this).serialize();
                $.ajax({
                    type: "POST",
                    url: "{{route('il.yerel')}}",
                    headers: {'X-CSRF-TOKEN': '{{csrf_token()}}'},
                    data: $('#form').serialize(),
                    // dataType:"json",
                    success: function (donen) {
                        veri = donen;

                        $('#sehirsec').attr("disabled", false);
                        $('#al').html(veri);
                        console.log(veri);
                    },
                })
                $('#gotur').hide();
            });

        });
    </script>
@endsection

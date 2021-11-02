@extends('main.home_master')

@section('content')
{{--    @php--}}
{{--       dd($veri);--}}
{{--    @endphp--}}

    <script>
        $(document).ready(function(e) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#havadurum select').on('change',function(){
                e =$('#ilsec').val();
// var str =$(this).serialize();
                $.ajax({
                    type : "POST",
                    url: "{{  route('il.ajax') }}",
                    headers: {'X-CSRF-TOKEN':'{{csrf_token()}}'},
                    data: {ilsec:$('#ilsec').val()},
                    success:function(donen)
                    {
                        veri=donen;
                        console.log(veri);

                        $('#ilsec').attr("disabled",false);
                        $('#cek').html(veri);
                    },
                })


            });
{{--            e =$('#ilsec').val();--}}
{{--// var str =$(this).serialize();--}}
{{--            $.ajax({--}}
{{--                type : "POST",--}}
{{--                url: "{{  route('hava.durum') }}",--}}
{{--                headers: {'X-CSRF-TOKEN':'{{csrf_token()}}'},--}}
{{--                data: $('#havadurum').serialize(),--}}
{{--                success:function(donen)--}}
{{--                {--}}
{{--                    veri=donen;--}}
{{--                    $('#ilsec').attr("disabled",false);--}}
{{--                    $('#cek').html(veri);--}}
{{--// console.log();--}}
{{--                },--}}
{{--            })--}}
        });
    </script>


<div class="container pt-5 mt-5" >
    <h1 class="text-dark font-weight-bold pt-3">Hava Durumu</h1>
        <form id="havadurum">
            <div class="input-group">
                <select class="custom-select minimal" id="ilsec"  aria-label="Example select with button addon">
                    <option >Şehir Seç</option>

                    @foreach($sehir as $city)

                        <option  value="{{$city->sehir_ad}}">{{$city->sehir_ad}}</option>
                    @endforeach

                </select>
                <div class="input-group-append">
                    <!-- <button class="btn btn-outline-secondary" type="button">Getir</button> -->
                </div>
            </div>
        </form>

    <div id="cek"></div>

    <div class="row mt-3 mb-3" >

        <div class="col-md-4 pt-5 pb-5 bg-white shadow text-center">

            <h2 class="font-weight-bold text-danger">{{$gelenil}}</h2>
            <h4 class="  p-3">{{Carbon\Carbon::now()->locale('tr')->dayName}}</h4>

            <h2 class="pb-3 font-weight-normal text-info text-danger"> {{$day1}}&#8451;</h2>
            <h2 class="font-weight-light text-danger">{{$Birgundurum}}</h2>
        </div>
        <div class="col-md-4 text-center">
            <div class="border bg-white shadow border-info">
                <h2 class=" border-bottom border-info p-3">{{Carbon\Carbon::now()->addDays(1)->locale('tr')->dayName}}</h2>
                <img class="img-fluid pt-3 pb-3" src="img/hava-durumu.png"/>
                <p class="font-weight-light">{{$Ikigundurum}}</p>
                <h2 class="pb-3 font-weight-normal text-info">{{$day2}}&#8451;</h2>
            </div>
        </div>
        <div class="col-md-4 text-center">
            <div class="border bg-white shadow border-info">
                <h2 class=" border-bottom border-info p-3">{{Carbon\Carbon::now()->addDays(2)->locale('tr')->dayName}}</h2>
                <img class="img-fluid pt-3 pb-3" src="img/hava-durumu.png"/>
                <p class="font-weight-light">{{$Ucgundurum}}</p>
                <h2 class="pb-3 font-weight-normal text-info">{{$day3}} &#8451;</h2>
            </div>
        </div>
    </div>



</div>
@endsection

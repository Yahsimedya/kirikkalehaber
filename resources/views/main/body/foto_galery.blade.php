@extends('main.home_master')
@section('content')

    <div class="container pt-5">
        <div class="row mt-3 mb-3">
            <div class="col-md-8 shadow-lg rounded pt-4 pb-2 ">
                <h1 class="text-dark pb-2" style="font-family: Poppins; font-weight: 800;font-size: 34px;">{{$category->title}}</h1>
                <!-- <h2 style="font-size: 20px;">Güne yükselişle başlayan gram altın 382 lirayla tüm zamanların en yüksek
                    seviyesinden işlem görüyor. Aynı dakikalarda çeyrek altın 625 lira, cumhuriyet altını da 2.549
                    liradan satılıyor.</h2> -->
                <div class="float-right mr-2 col-md-4"><i class="far fa-calendar-alt  text-danger pr-1"></i> {{ \Carbon\Carbon::parse($category->created_at)->isoFormat('DD MMMM YYYY') }}</div>
@php
$i=0;
@endphp
                @foreach($photos as $row)
@php
$i++;
@endphp

                <div class="pb-4">
                    <div class="col-md-12 mb-3 pl-2">
                        <div class="bg-danger text-center mb-2 rakam" style="width: 30px;"><span class="align-middle text-white">{{$i}}</span></div>
                            <img src="{{asset($row->photo)}}" height="450" width="100%" alt="">
                    </div>

                    <p class="col-md-12 mb-3 pl-2 text-dark">{{$row->photo_text}}</p>
                </div>
                @endforeach

            </div>
            <div class="col-md-4">
                @foreach($relatedgalery as $row)

                <div class="card kart kart-width shadow mb-3" style=""><a href="">
                        <img class="img-fluid"  src="{{asset($row->photo)}}" alt="">

                        <div class="card-body kart-body  bordercolor-2 border-3 text-dark">
                            <p class="card-text card-kisalt text-center">{{$row->title}}</p>
                        </div>
                    </a>
                </div>
                @endforeach

            </div>
        </div>

    </div>

@endsection

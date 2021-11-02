@extends('main.home_master')
@section('title',"Ara")

@section('content')



    <div class="container  mt-5 mb-5">
        <h1 class="text-dark font-weight-bold pt-3">Arama Sonuçları</h1>
        @foreach($searchNews as $news)



            <div class="row shadow-lg p-4">
                <div class="row pt-2">
                    <div class="col-md-3"><a target="_blank"
                                             href="{{URL::to('/'.str_slug($news->title_tr).'/'.$news->id.'/'.'haberi')}}">

                            <picture>
                                <source type="image/png" data-srcset="{{$news->image}}" srcset="{{$news->image}}">
                                <img data-srcset="{{$news->image}}" alt="" class="img-fluid w-75 h-100 lazyloaded" style=" "
                                     srcset="{{$news->image}}">
                            </picture>

                        </a></div>
                    <a target="_blank"
                       href="{{URL::to('/'.str_slug($news->title_tr).'/'.$news->id.'/'.'haberi')}}">
                    </a>
                    <div class="col-md-9"><a target="_blank"
                                             href="{{URL::to('/'.str_slug($news->title_tr).'/'.$news->id.'/'.'haberi')}}">
                            <h6>    {{$news->title_tr}}</h6>
                            <p class="card-kisalt" style="font-size: 14px;">{!!$news->subtitle_tr!!}</p></a>
                    </div>
                </div>
            </div>


        @endforeach

    </div>

@endsection


















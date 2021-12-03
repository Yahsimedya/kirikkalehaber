@extends('main.home_master')

@section('content')
<div class="container mt-5 mb-5">
    <div class="row">
        @foreach($sondakika as $row)
        <div class="col-md-3 mb-5">
            <div class="card shadow kart d-inline-block  ">
                {{--                            {{$row->category->category_tr}}--}}
                <a href="{{URL::to('/'.str_slug($row->title_tr).'/'.$row->id.'/'.'haberi')}}">

                    <img class="card-img-top lazy" height="180" src="{{asset($row->image)}}"
                         onerror="this.onerror=null;this.src='{{$webSiteSetting->defaultImage}}';"
                         alt="Kavga ettiği amcasını sokak ortasında tabancayla vurdu" style="">
                    <div class="card-body align-middle d-table-cell">
                        <p class="card-baslik text-left d-table-cell"><b class="card-kisalt">{{$row->title_tr}}</b></p>
                        {{--                                <span class="card__kategori position-absolute">3. Sayfa</span>--}}
                    </div>
                </a>
                <span style="color:{{$row->category->categorycolor}}"><u style="background-color: {{$row->category->categorycolor}}"></u>{{\Carbon\Carbon::parse($row->updated_at)->format('H:i')}}</span>
            </div>

        </div>
        @endforeach


        <div class="col-md-3"></div>
        <div class="col-md-3"></div>
        <div class="col-md-3"></div>
    </div>
</div>
@endsection

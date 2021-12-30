@extends('main.home_master')

{{--@section('title',$category->category_tr." Haberleri")--}}
{{--@section('meta_keywords',$category->category_keywords)--}}
{{--@section('meta_description',$category->category_description)--}}
@section('content')


    <div class="container mt-5">

        @if($count!=0)

            <h1 class="text-dark font-weight-bold pt-3">
            </h1>

            <div class="row">
                <div class="col-md-8  pb-2">
                    <div class="swiper-container kategori-slider mb-2">
                        <div class="swiper-wrapper" style="height:100%;">
{{--                            {{dd($tagPosts)}}--}}
                            @foreach ($tagPosts as $row)

                                <div class="swiper-slide">
                                    <a href="{{URL::to('/'.str_slug($row->title_tr).'/'.$row->post_id.'/'.'haberi')}}">

                                        <div class="position-relative">
                                            <img src="{{asset($row->image)}}" class="img-fluid slider-foto swiper-lazy" alt="">

                                        </div>

                                        <div class="swiper-lazy-preloader swiper-lazy-preloader-white">

                                        </div>
                                    </a>



                                </div>
                            @endforeach


                        </div>

                        <div class="swiper-pagination anamanset-pagination"></div>
                        <div class="swiper-button-next manset-next"></div>
                        <div class="swiper-button-prev manset-prev"></div>
                    </div>

                    <div class="row pt-2">
                        <div class="col-md-12 pt-2 pb-2">
                            <img class="float-left w-100" src="img/728x90.png" alt="">
                        </div>
                        @foreach ($tagPostsSlideralti as $row)
                            <div class="col-md-6">
                                <a href="{{URL::to('/'.str_slug($row->title_tr).'/'.$row->post_id.'/'.'haberi')}}">
                                    <div class="card kart kart-width shadow mb-2" style="">
                                        <img class="img-fluid kart_img" src="{{asset($row->image)}}" />
                                        <div class="card-body kart-body  bordercolor-6 border-3 text-dark">
                                            <p class="card-text">{{$row->title_tr}}</p>
                                        </div>
                                    </div>
                                </a>

                            </div>
                        @endforeach
                    </div>
{{--                    {{$tagPosts->links('pagination-links')}}--}}

                </div>
                <div class="col-md-4">
                    <div class="text-center mb-2">
                        <img class="img-fluid w-100" src="img/336x280.jpg">
                    </div>
                    @foreach ($nextnews as $row )

                        <a href="{{URL::to('/'.str_slug($row->title_tr).'/'.$row->post_id.'/'.'haberi')}}"><div class="card kart kart-width shadow mb-2" style="">
                                <img class="img-fluid kart_img" src="{{asset($row->image)}}" />
                                <div class="card-body kart-body  bordercolor-6 border-3 text-dark">
                                    <p class="card-text">{{$row->title_tr}}</p>
                                </div>
                            </div></a>
                @endforeach


                <!--SIRADAKİ HABERLER-->

                    <div class="position-relative mt-3">
                        <p class="detay__sidebar-baslik "><b>SIRADAKİ</b> <span>HABERLER</span></p>
                    </div>
                    <div class="list-group detay__liste mt-3">
                        @php
                            $i=0;
                        @endphp
                        @foreach ($nextnews as $row )
                            @php
                                $i++;
                            @endphp
                            <a href="{{URL::to('/'.str_slug($row->title_tr).'/'.$row->post_id.'/'.'haberi')}}" class="list-group-item list-group-item-action detay__liste-item ">
                                <i class="detay__liste-rakam d-table-cell align-middle">{{$i}}</i>
                                <span class="d-table-cell">{{$row->title_tr}}</span>
                            </a>
                        @endforeach



                    </div>
                    <!--SIRADAKİ HABERLER-->

                    <div class="text-center mt-3 mb-2">
                        <img class="img-fluid w-100" src="img/336x280.jpg">
                    </div>
                </div>

            </div>
        @else
            <div class="container">
                <div class="row">
                    <div class="col-md-12  bg-light shadow d-flex w-100 mb-5" style="min-height: 400px;">
                        <h3 class="text-secondary text-center mx-auto my-auto">Kategoride Haber Bulunamadı</h3>
                    </div>

                </div>
            </div>
        @endif


    </div>
@endsection

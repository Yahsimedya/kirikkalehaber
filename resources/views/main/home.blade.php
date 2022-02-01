@extends('main.home_master')
@section('title',$seoset->meta_title)
@section('meta_keywords',$seoset->meta_keyword)
@section('meta_description',htmlspecialchars_decode(stripslashes($seoset->meta_description),ENT_QUOTES))
@section('google_analytics',$seoset->google_analytics)
@section('google_verification',$seoset->google_verification)
@section('adsense_code',$seoset->adsense_code)

@section('content')
    <?php
    $socials = DB::table('socials')->get();
    $kurlar = Session::get('kurlar');
    $veri = Session::get('havadurumu');
    $icon = Session::get('icon');
    ?>
    <style>


        .detay__sidebar-baslik::before {
            background: {{$themeSetting[0]->siteColorTheme}}         !important;
        }

        .anamanset-pagination > .swiper-pagination-bullet-active {
            background-color: {{$themeSetting[0]->siteColorTheme}}                   !important;
        }

        .pagination-1 > .swiper-pagination-bullet-active, .pagination-2 > .swiper-pagination-bullet-active {
            background-color: {{$themeSetting[0]->siteColorTheme}}                                    !important;
        }

        .media.media-weather {
            color: #fff;
            position: relative;
            overflow: visible;
        }


        .siyaset {
            background-image: linear-gradient(-10deg, {{$themeSetting[0]->economy}}, {{$themeSetting[0]->economy}}) !important;
        }

        .ekonomi {
            background-image: linear-gradient(-10deg, {{$themeSetting[0]->politics}}, {{$themeSetting[0]->politics}}) !important;
        }

        .spor {
            background-image: linear-gradient(-10deg, {{$themeSetting[0]->sport}}, {{$themeSetting[0]->sport}}) !important;
        }

        .custom-select {
            border: none;
            margin-right: 10px;
            background-color: transparent;
            color: white;
            background: linear-gradient(
                45deg, transparent 50%, white 50%), linear-gradient(
                135deg, white 50%, transparent 50%), linear-gradient(to right, {{$themeSetting[0]->siteColorTheme}}, {{$themeSetting[0]->siteColorTheme}});
            background-position: calc(100% - 21px) calc(1em + 2px), calc(100% - 16px) calc(1em + 2px), 100% 0;
            background-size: 5px 5px, 5px 5px, 2.5em 2.5em;
            background-repeat: no-repeat;
        }

        select option {
            margin: 40px;

            background: rgba(0, 0, 0, 0.3);
            color: #fff;
            text-shadow: 0 1px 0 rgba(0, 0, 0, 0.4);
        }

        .media.media-weather .media-body {
            overflow: visible;
            position: relative;
            width: auto;
        }

        .media.media-weather .media-body:before {
            background: #007bfd;
            right: 0;
            top: 0;
        }

        .media.media-weather .media-body:after {
            background: #6e8398;
            left: 0;
            top: 0;
        }

        .media.media-weather .media-body .wi, .media.media-weather .media-body .fa {
            background: #fff;
            border-radius: 50px;
            color: #6e8398;
            float: left;
            font-size: 25px;
            display: block;
            line-height: 48px;
            position: relative;
            height: 48px;
            width: 48px;
            z-index: 1;
            text-align: center;
        }
    </style>
    <script>
        $(document).ready(function (e) {


            $('#form select').on('change', function () {
                e = $('#sehirsec').val();
// var str =$(this).serialize();
                $.ajax({
                    type: "POST",
                    url: "{{route('il.namaz')}}",
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
    <script>
        $(document).ready(function (e) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#havadurum select').on('change', function () {
                e = $('#ilsec').val();
// var str =$(this).serialize();
                $.ajax({
                    type: "POST",
                    url: "{{  route('il.home') }}",
                    headers: {'X-CSRF-TOKEN': '{{csrf_token()}}'},
                    data: {ilsec: $('#ilsec').val()},
                    success: function (donen) {
                        veri = donen;
                        console.log(veri);

                        $('#ilsec').attr("disabled", false);
                        $('#cek').html(veri);
                    },
                })
            });
            {{--            e = $('#ilsec').val();--}}
            {{--// var str =$(this).serialize();--}}
            {{--            $.ajax({--}}
            {{--                type: "POST",--}}
            {{--                url: "{{  route('il.stabilhome') }}",--}}
            {{--                headers: {'X-CSRF-TOKEN': '{{csrf_token()}}'},--}}
            {{--                data: $('#havadurum').serialize(),--}}
            {{--                success: function (donen) {--}}
            {{--                    veri = donen;--}}
            {{--                    $('#ilsec').attr("disabled", false);--}}
            {{--                    $('#cek').html(veri);--}}
            {{--// console.log();--}}
            {{--                },--}}
            {{--            })--}}
        });

    </script>
    @if (!empty($sondakika[0]->headline))

        <section class="section-sdk position-relative d-flex w-100" style="margin-top:0px;">
            <div class="container ">
                <div class="simple-marquee-container" style="z-index: 999;">
                    <a href="{{route('breakingnews')}}">
                        <div class="marquee-sibling">
                            Son Dakika
                        </div>
                    </a>
                    <div class="marquee">
                        <ul class="marquee-content-items">
                            @foreach ($sondakika as $row)
                                @if(($row->headline==1) )
                                    <a href="
                                    {{URL::to('/'.str_slug($row->title_tr).'/'.$row->id.'/'.'haberi')}}

                                        ">
                                        <li><strong>

                                                {{ $row->title_tr }}

                                            </strong></li>
                                    </a>
                            @endif
                        @endforeach
                        <!-- <li>Item 2</li>
          <li>Item 3</li>
          <li>Item 4</li>
                            <li>Item 5</li> -->

                        </ul>
                    </div>
                </div>
            </div>

            @endif


        </section>

        <!--AÇILIP KAPANABİLİR REKLAM ALANI-->
        <!-- <div class="row mb-5 mt-5">
            </div> -->
        <div class="container text-center mt-2 position-relative">
            <!-- HABER DETAY REKLAM 336x270 -->

            <!-- HABER DETAY REKLAM 336x270 -->

            <div class="row">
                <div class="col-12 padding-left">
                    {{--                    <div class="kapat float-left"><a id="kapat" class="kapat__link " href="">X</a></div>--}}

                    <div class="reklam-alani mt-1 mb-1 text-center">
                        <!--  ÜST BLOK 970x250 REKLAM-->
                        @foreach($ads as $ad)
                            @if($ad->type==1 && $ad->category_id==9)
                                <a target="_blank" href="{{$ad->link}}"><img class="img-fluid pb-1 pt-3 lazyload"
                                                                             width="1140"
                                                                             height="250"
                                                                             data-src="{{asset($ad->ads)}}"></a>
                            @elseif($ad->type==2 && $ad->category_id==9)
                                <div class="w-100">{!!$ad->ad_code!!}</div>
                        @endif
                    @endforeach
                    <!--  ÜST BLOK 970x250 REKLAM-->

                    </div>


                    <!------------------KAPANABİLİR HEAD REKLAM ALANI -------------------->
                </div>
            </div>

        </div>


        <!--AÇILIP KAPANABİLİR REKLAM ALANI-->
        <div class="container mt-2">
            <div class="row">
                @foreach($surmanset as $row)
                    <div class="col-lg-3 col-md-6 col-sm-12 pb-2 d-none d-md-block padding-left kartlar">
                        <div class="card shadow  d-inline-block  ">
                            {{--                            {{$row->category->category_tr}}--}}
                            <a href="{{URL::to('/'.str_slug($row->title_tr).'/'.$row->id.'/'.'haberi')}}">
                                @if($row->headlinetag==1)
                                    <div class="sondakika top-left">
                                        <span>Son Dakika</span>
                                    </div>
                                @elseif($row->flahtag==1)
                                    <div class="flashhaber top-left">
                                        <span>Flaş Haber</span>
                                    </div>
                                @elseif($row->attentiontag==1)
                                    <div class="haberedikkat top-left">
                                        <span>Bu Habere Dikkat</span>
                                    </div>
                                @endif
                                <img class="card-img-top lazy" height="180" src="{{asset($row->image)}}"
                                     onerror="this.onerror=null;this.src='{{$webSiteSetting->defaultImage}}';"
                                     alt="Kavga ettiği amcasını sokak ortasında tabancayla vurdu" style="">
                                <div class="card-body align-middle d-table-cell">
                                    <p class="card-baslik text-left d-table-cell"><b
                                            class="card-kisalt">{{$row->title_tr}}</b></p>
                                    {{--                                <span class="card__kategori position-absolute">3. Sayfa</span>--}}
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach


            </div>
            <div class="row">

                <div class="col-md-8 col-12 col-sm-8 text-danger mb-2">
                    <div class="swiper-container kategori-slider mb-2">
                        <div class="swiper-wrapper" style="height:100%;">

                            @for($i=0;$i<=24;$i++)
                                <div class="swiper-slide" style="position:relative">
                                    <a href="{{URL::to('/'.str_slug($home[$i]->title_tr).'/'.$home[$i]->id.'/'.'haberi')}}">
                                        <div class="position-relative">
                                            <img class="img-fluid slider-foto swiper-lazy   lazyload"
                                                 width="100%"
                                                 onerror="this.onerror=null;this.src='{{$webSiteSetting->defaultImage}}';"
                                                 data-src="{{ asset($home[$i]->image) }}"/>
                                            @if($themeSetting[0]->slider_title!=0)
                                                <div class="kartlar__effect position-absolute">
                                                    <p class="ana-manset-text">{{$home[$i]->title_tr}}</p>
                                                </div>
                                            @endif
                                            @if(isset($home[$i]->posts_video))
                                                <div class="videohaber top-right">
                                                    <span><i class="fa fa-play"></i> Video</span>
                                                </div>
                                            @endif
                                            @if($home[$i]->headlinetag==1)
                                                <div class="sondakikaSlider top-left">
                                                    <span>Son Dakika</span>
                                                </div>
                                            @elseif($home[$i]->flahtag==1)
                                                <div class="flashhaberSlider top-left">
                                                    <span>Flaş Haber</span>
                                                </div>
                                            @elseif($home[$i]->attentiontag==1)
                                                <div class="haberedikkatSlider top-left">
                                                    <span>Bu Habere Dikkat</span>
                                                </div>
                                            @endif
                                        </div>
                                    </a>
                                </div>
                            @endfor


                        </div>
                        <!-- Add Pagination -->
                        <div class="swiper-pagination anamanset-pagination">
                        </div>
                        <div class="swiper-button-next manset-next pt-5 mt-5"></div>
                        <div class="swiper-button-prev manset-prev pt-5 mt-5"></div>
                    </div>


                    <div class="row mt-0">

                        @if($themeSetting[0]->fotogaleri!=0)
                            <div class="col-md-6 mt-3 ">
                                <div class="card-header border-left border-red border-3"
                                     style="border-color: {{$themeSetting[0]->siteColorTheme}} !important;color: {{$themeSetting[0]->siteColorTheme}} !important;"
                                >
                                    <h5 class=" text-dark">Foto Galeri</h5>
                                    <div class="butonlar">
                                        <div class="swiper-button-prev prev-1"
                                             style="border-color: {{$themeSetting[0]->siteColorTheme}} !important;color: {{$themeSetting[0]->siteColorTheme}} !important;"></div>
                                        <div class="swiper-pagination pagination-1"
                                             style="border-color: {{$themeSetting[0]->siteColorTheme}} !important;color: {{$themeSetting[0]->siteColorTheme}} !important;"></div>
                                        <div class="swiper-button-next next-1"
                                             style="border-color: {{$themeSetting[0]->siteColorTheme}} !important;color: {{$themeSetting[0]->siteColorTheme}} !important;"></div>
                                    </div>
                                </div>
                                <div class="swiper-container slider1">
                                    <!-- Additional required wrapper -->
                                    <div class="swiper-wrapper">
                                        <!-- Slides -->


                                        @foreach ($fotogaleri as $row )

                                            @if(empty(!$row->photocategory_id))
                                                <div class="swiper-slide position-relative">
                                                    <a href="{{route('photo.gallerydetail',$row->photocategory_id)}}">
                                                        <div class="swiper-slide__foto "><img class="img-fluid lazyload"
                                                                                              onerror="this.onerror=null;this.src='{{$webSiteSetting->defaultImage}}';"
                                                                                              data-src="{{asset($row->photo)}}"/>
                                                        </div>
                                                    </a>
                                                    <span class="yazi-span">{{$row->category_title	}}</span>
                                                </div>
                                        @endif

                                    @endforeach

                                    <!-- <div class="swiper-slide">Slide 1</div>
                <div class="swiper-slide">Slide 1</div>
                <div class="swiper-slide">Slide 1</div>
                <div class="swiper-slide">Slide 1</div> -->


                                    </div>
                                    <!-- If we need pagination -->

                                    <!-- If we need navigation buttons -->


                                    <!-- If we need scrollbar -->
                                </div>
                            </div>
                        @endif

                        @if($themeSetting[0]->videogaleri!=0 )
                            <div class="col-md-6 mt-3 ">
                                <div class="card-header border-left  border-3"
                                     style="border-color: {{$themeSetting[0]->siteColorTheme}} !important;color: {{$themeSetting[0]->siteColorTheme}} !important;"
                                >
                                    <h5 class=" text-dark">Video Galeri</h5>
                                    <div class="butonlar">
                                        <div class="swiper-button-prev prev-2"
                                             style="border-color: {{$themeSetting[0]->siteColorTheme}} !important;color: {{$themeSetting[0]->siteColorTheme}} !important;"></div>
                                        <div class="swiper-pagination pagination-2"
                                             style="border-color: {{$themeSetting[0]->siteColorTheme}} !important;color: {{$themeSetting[0]->siteColorTheme}} !important;"></div>
                                        <div class="swiper-button-next next-2"
                                             style="border-color: {{$themeSetting[0]->siteColorTheme}} !important;color: {{$themeSetting[0]->siteColorTheme}} !important;"></div>
                                    </div>
                                </div>
                                <div class="swiper-container slider2">
                                    <!-- Additional required wrapper -->
                                    <div class="swiper-wrapper">
                                        <!-- Slidessssssssss -->

                                        @foreach ($video_gallary as $row )

                                            <div class="swiper-slide position-relative">
                                                <a href="{{URL::to('/'.Str::slug($row->title_tr).'/'.$row->id.'/'.'haberi')}}">
                                                    <div class="swiper-slide__foto "><img class="img-fluid lazyload"
                                                                                          onerror="this.onerror=null;this.src='{{$webSiteSetting->defaultImage}}';"
                                                                                          data-src="{{asset($row->image)}}"/>
                                                    </div>
                                                    <span class="yazi-span">{{$row->title_tr}}</span>
                                                </a>
                                            </div>

                                        @endforeach

                                    </div>
                                    <!-- If we need pagination -->

                                    <!-- If we need navigation buttons -->


                                    <!-- If we need scrollbar -->
                                </div>
                            </div>
                        @endif

                    </div>


                </div>
                <!--SLİDER YANI 4 KOLON-->
                <div class="col-md-4 position-relative text-center">
                    <div
                        class="col-md-12 mb-1 shadow-sm d-flex align-items-center border-left border-red border-3 color-red"
                        style="height:50px; border-color:{{$themeSetting[0]->siteColorTheme}}!important; ">

                        <p class="p-0 m-0 mb-2 font-weight-bold text-dark position-relative float-left mr-5">Bizi Takip
                            Edin</p>
                        <div class="social-icons float-right position-relative">
                            @foreach($socials as $social)
                                <a class="facebook" href="{{$social->facebook}}"><i
                                        class="fa fa-facebook text-light"></i></a>
                                <a class="twitter" href="{{$social->twitter}}"><i class="fa fa-twitter text-light"></i></a>
                                <a class="youtube" href="{{$social->youtube}}"><i class="fa fa-youtube text-light"></i></a>
                                <a class="facebook" style="background-color: deeppink" href="{{$social->instagram}}"><i
                                        class="fa fa-instagram text-light"></i></a>
                                <a class="linkedin" href="{{$social->linkedin}}"><i
                                        class="fa fa-linkedin text-light"></i></a>
                        @endforeach
                        <!-- <a class="whatsapp" href="#"><i class="fa fa-youtube"></i></a> -->
                        </div>
                    </div>
                    <!--SLİDER YANI REKLAM ALANI 300x600-->
                    <!-- <img class="img-fluid lazyload" data-src="img/sag-reklam.png"> -->
                    <div class="swiper-container sag-slider">
                        <div class="swiper-wrapper" style="height:100%;">

                            @foreach ($sagmanset as $row )

                                <div class="swiper-slide">
                                    <a href="{{URL::to('/'.str_slug($row->title_tr).'/'.$row->id.'/'.'haberi')}}"><img
                                            class="img-fluid sag-manset-img swiper-lazy lazyloaded swiper-lazy-loaded lazyload"
                                            data-src="{{asset($row->image)}}"
                                            onerror="this.onerror=null;this.src='{{$webSiteSetting->defaultImage}}';"></a>
                                    <a href="{{URL::to('/'.str_slug($row->title_tr).'/'.$row->id.'/'.'haberi')}}">
                                        @if($themeSetting[0]->slider_title!=0)

                                            <div class="kartlar__effect position-absolute">
                                                <p class="sag-manset-text">{{$row->title_tr}}</p>
                                            </div>
                                        @endif
                                    </a>
                                </div>
                            @endforeach

                        </div>
                        <!-- Add Pagination -->
                        <div class="swiper-pagination sag-pagination"></div>
                    </div>

                    <!--SLİDER YANI REKLAM ALANI 300x600-->


                    <div class="row mt-2">
                        {{--                <div class="col-md-12 ">--}}

                        {{--                    <a href="hava-durum">--}}
                        {{--                        <img data-src="./img/ogle.png" class="lazyload float-left mt-2 ml-2 lazyload">--}}
                        {{--                        <div class="card-header bg-dark border-left border-red border-3 text-center mt-1 text-light">--}}
                        {{--                            Namaz Vakitleri--}}
                        {{--                        </div>--}}
                        {{--                    </a>--}}
                        {{--                </div>--}}

                    </div>


                    <div class="col-md-12 ">
                        <!--  ÜST BLOK 336x280 REKLAM-->
                        @foreach($ads as $ad)
                            @if($ad->type==1 && $ad->category_id==17)
                                <a href="{{$ad->link}}"><img class="img-fluid pb-1 pt-2 lazyload" width="336"
                                                             height="280"
                                                             src="{{asset($ad->ads)}}"></a>
                            @elseif($ad->type==2 && $ad->category_id==17)
                                <div class="w-100">{!!$ad->ad_code!!}</div>
                        @endif
                    @endforeach
                    <!--  ÜST BLOK 336x280 REKLAM-->
                    </div>
                </div>
                <!--SLİDER YANI 4 KOLON-->

            </div>
            <!-- DÖVİZ KURLARI-->
            {{--        {{var_dump($kurlar)}}--}}
            {{--{{$kurlar['dolar']['oran']}}--}}

            <div class="container">
                <div class="row mb-2">
                    <div class="col-md-9 shadow border-left border-3 ml-0 mr-0"
                         style="border-color:{{$themeSetting[0]->siteColorTheme}}!important;">
                        <div class="col-md-3 col-3 text-dark float-left text-center"><b>Dolar </b>
                            <div class="deger ">
                                @if(number_format($kurlar['DOLAR']['oranyonu'],2)>0)
                                    <i class="fa fa-sort-up align-middle pt-1 pr-1 text-success"></i>
                                @else
                                    <i class="fa fa-sort-down align-middle pt-1 pr-1 text-danger mb-3 "></i>
                                @endif
                                {{ number_format($kurlar['DOLAR']['satis'],3) }}
                            </div>
                        </div>
                        <div class="col-md-3 col-3 text-dark float-left text-center"><b>Euro</b>
                            <div class="deger">
                                @if(number_format($kurlar['EURO']['oranyonu'],2)>0)
                                    <i class="fa fa-sort-up align-middle pt-1 pr-1 text-success"></i>
                                @else
                                    <i class="fa fa-sort-down align-middle pt-1 pr-1 text-danger mb-3 "></i>
                                @endif
                                {{  number_format($kurlar['EURO']['satis'],3) }}</div>
                        </div>
                        <div class="col-md-3 col-3 float-left text-dark text-center"><b>Çeyrek Altın</b>
                            <div class="deger">
                                @if(isset($kurlar['ceyrekaltin']['oranyonu'])>0)
                                    <i class="fa fa-sort-up align-middle pt-1 pr-1 text-success"></i>
                                @else
                                    <i class="fa fa-sort-down align-middle pt-1 pr-1 text-danger mb-3 "></i>
                                @endif
                                {{ $kurlar['ceyrekaltin']['satis'] }}</div>

                        </div>
                        <div class="col-md-3 col-3 float-left text-dark text-center"><b>Altın</b>
                            <div class="deger">
                                @if(isset($kurlar['ALTIN']['oranyonu'])>0)
                                    <i class="fa fa-sort-up align-middle pt-1 pr-1 text-success"></i>
                                @else
                                    <i class="fa fa-sort-down align-middle pt-1 pr-1 text-danger mb-3 "></i>
                                @endif
                                {{$kurlar['ALTIN']['satis'] }}</div>

                        </div>
                    </div>
                    <div class="col-md-3 shadow" style="background-color: {{$themeSetting[0]->siteColorTheme}}">
                        <div class="mx-auto my-auto h-100 row d-flex align-items-center">
                            <form id="havadurum" class="col-md-8 col-8">

                                {{--                    <div style="width: 178px;" class="">--}}
                                <select style="" id="ilsec"
                                        class=" form-select align-middle custom-select bg-transparent border-light text-light "
                                        name="">
                                    <option value="{{Str::upper("KIRIKKALE")}}">KIRIKKALE</option>
                                    @foreach($sehir as $il)
                                        <option value="{{Str::upper($il->sehir_ad)}}">{{$il->sehir_ad}}</option>
                                    @endforeach
                                </select>
                                {{--                    </div>--}}
                            </form>
                            <div class="col-md-4 col-4 text-white" id="cek"> {!! $icon !!} {{$veri}}</div>

                        </div>
                    </div>

                </div>
            </div>
            <!-- DÖVİZ KURLARI-->

        </div>

        <!-- KÖŞE YAZARLARI -->
        <div class="container">
            <!--  ÜST BLOK 1140x90 REKLAM-->
            @foreach($ads as $ad)
                @if($ad->type==1 && $ad->category_id==16)
                    <a href="{{$ad->link}}"><img class="img-fluid pb-1 pt-2 lazyload" width="1140" height="90"
                                                 onerror="this.onerror=null;this.src='{{$webSiteSetting->defaultImage}}';"
                                                 data-src="{{asset($ad->ads)}}"></a>
                @elseif($ad->type==2 && $ad->category_id==16)
                    <div class="w-100">{!!$ad->ad_code!!}</div>
                @endif
            @endforeach

            @if(count($authors)>0)
            <!--  ÜST BLOK 1140x90 REKLAM-->
                <div class="position-relative mt-3 ">
                    <b>YAZARLARIMIZ</b>
                    <p class="detay__sidebar-baslik "></p>
                </div>
                <div class="row">
                    <div class="col-md-12 col-12 pr-2">
                        <div class="swiper-container mySwiper">
                            <div class="swiper-wrapper">
                                @foreach($authors as $author)

                                    <div class="swiper-slide border" style="min-height: 285px;max-height: 285px;">
                                        <a href=" {{URL::to('/'.str_slug($author->title).'/'.$author->id)}}">
                                            <img data-src="{{asset($author->image)}}"
                                                 onerror="this.onerror=null;this.src='{{$webSiteSetting->defaultImage}}';"
                                                 class="img-fluid lazyload" alt="">
                                            <div style="color:{{$themeSetting[0]->siteColorTheme}}!important;"
                                                 class="text-center text-orange-400">{{Str::limit($author->name,17)}}</div>
                                            <div
                                                class="text-center text-orange-400 font-weight-thin card-kisalt"
                                            >{{$author->title}}</div>
                                        </a>
                                    </div>
                                @endforeach

                            </div>
                            <!--
                          <div class="swiper-button-next"></div>
                          <div class="swiper-button-prev"></div>
                          -->
                            <div class="swiper-pagination" style="bottom:-5px!important;"></div>
                        </div>
                    </div>

                </div>

            @endif

            <div class="position-relative mt-3 ">
                <b>EN ÇOK OKUNANLAR</b>
                <p class="detay__sidebar-baslik "></p>
            </div>
            <div class="row">
                <div class="col-md-9 col-12 pl-0">
                    <ul class="list-group p-2">
                        @foreach($endNews as $row)
                            <li class="list-group-item card-kisalttek"><img data-src="{{asset($row->image)}}"
                                                                            onerror="this.onerror=null;this.src='{{$webSiteSetting->defaultImage}}';"
                                                                            class="img-fluid lazyload"
                                                                            width="100px"> {{$row->title_tr}}</li>
                        @endforeach
                    </ul>
                </div>


                <div class="col-md-3 col-12 pt-2">
                    <div class="col-md-12 pb-1 mb-1" style="background: linear-gradient(
100deg
 , #262626, #515151);">
                        <div class="">
                            <div class="position-relative position-relative  text-center pt-3 pb-3">
                                <div class="pb-0 pt-1 mx-auto " style="font-size: 19px;
    color: white;"><b>NAMAZ</b> <span>VAKİTLERİ</span></div>
                                {{--                            <p class="detay__sidebar-baslik "></p>--}}
                            </div>

                            <form id="form" class="text-center pb-2">
                                @csrf
                                <select class="btn dropdown-toggle btn-light" name="sehirsec" id="">
                                    <option value="548">KIRIKKALE</option>

                                    @foreach($sehir as $row)
                                        <option value="{{$row->id}}">{{$row->sehir_ad}}</option>
                                    @endforeach
                                </select>
                            </form>
                            @php
                                $now = Carbon\Carbon::now()->format('H:i');
                                $vakitler=Session::get('vakitler');
                                $imsak = $vakitler["imsak"];
                                $gunes = $vakitler['gunes'];
                                $ogle = $vakitler['ogle'];
                                $ikindi = $vakitler['ikindi'];
                                $aksam = $vakitler['aksam'];
                                $yatsi = $vakitler['yatsi'];

                            @endphp


                            {{--        {{$now=Carbon\Carbon::now()->format('H:i:S')}}--}}
                            <table class="table table-borderless text-light w-100 mb-2" id="gotur">

                                <tbody>

                                {{--                                @if ($now->between($imsak, $gunes))--}}
                                @if ($now>=$imsak && $now<=$gunes)
                                    <tr data-hour="05:26" data-time-name="imsak" class="bg-light text-dark">
                                @else
                                    <tr data-hour="05:26" data-time-name="imsak">
                                        @endif
                                        <td class="text-center"><i class="wi wi-day-fog text-warning"></i></td>
                                        <td class="text-uppercase ">İmsak</td>
                                        <td class="font-weight-bold imsak ">{{$vakitler['imsak']}}
                                        </td>
                                        <td>
                                            @if ($now>=$imsak)
                                                <i class="fas fa-check-circle text-success"></i>
                                            @else
                                                <i class="fas fa-hourglass text-warning"></i>
                                            @endif
                                        </td>
                                    </tr>
                                    {{--                                    @if ($now->between($gunes, $ogle))--}}
                                    @if ($now>=$gunes && $now<=$ogle)
                                        <tr data-hour="05:26" data-time-name="imsak" class="bg-light text-dark">
                                    @else
                                        <tr data-hour="05:26" data-time-name="imsak">
                                            @endif
                                            <td class="text-center"><i class="wi wi-sunrise text-warning"></i></td>
                                            <td class="text-uppercase">Güneş</td>
                                            <td class="font-weight-bold gunes">{{$vakitler["gunes"]}}</td>
                                            <td>
                                                @if ($now>=$gunes)
                                                    <i class="fas fa-check-circle text-success"></i>
                                                @else
                                                    <i class="fas fa-hourglass text-warning"></i>
                                                @endif
                                            </td>
                                        </tr>
                                        {{--                                        @if ($now->between($ogle, $ikindi))--}}
                                        @if ($now>=$ogle && $now<=$ikindi)
                                            <tr data-hour="05:26" data-time-name="imsak" class="bg-light text-dark">
                                        @else
                                            <tr data-hour="05:26" data-time-name="imsak">
                                                @endif
                                                <td class="text-center"><i class="wi wi-day-sunny text-warning"></i>
                                                </td>
                                                <td class="text-uppercase">Öğle</td>
                                                <td class="font-weight-bold ogle">{{$vakitler["ogle"]}}</td>
                                                <td>
                                                    @if ($now>=$ogle)
                                                        <i class="fas fa-check-circle text-success"></i>
                                                    @else
                                                        <i class="fas fa-hourglass text-warning"></i>
                                                    @endif
                                                </td>
                                            </tr>
                                            {{--                                            @if ($now->between($ikindi, $aksam))--}}
                                            @if ($now>=$ikindi && $now<=$aksam)

                                                <tr data-hour="05:26" data-time-name="imsak" class="bg-light text-dark">
                                                    @endif
                                                    <td class="text-center"><i class="wi wi-sunset text-warning"></i>
                                                    </td>
                                                    <td class="text-uppercase">İkindi</td>
                                                    <td class="font-weight-bold ikindi">{{$vakitler["ikindi"]}}

                                                        {{--                                                        @if($now<$ikindi)--}}
                                                        {{--                                                            {{ $dateDiff = Carbon\Carbon::now()->diffInMinutes($ikindi,false)}}--}}

                                                        {{--                                                        @endif--}}

                                                    </td>
                                                    <td>
                                                        {{--                                                        @if($now->between($ikindi,$aksam) || $now>$ikindi)--}}
                                                        @if ($now>=$ikindi)

                                                            <i class="fas fa-check-circle text-success"></i>
                                                        @else
                                                            <i class="fas fa-hourglass text-warning"></i>
                                                        @endif
                                                    </td>
                                                </tr>
                                                {{--                                                @if ($now->between($aksam, $yatsi))--}}
                                                @if ($now>=$aksam && $now<=$yatsi)

                                                    <tr data-hour="05:26" data-time-name="imsak"
                                                        class="bg-light text-dark">
                                                        @endif
                                                        <td class="text-center"><i
                                                                class="wi wi-moonrise text-warning"></i></td>
                                                        <td class="text-uppercase">Akşam</td>
                                                        <td class="font-weight-bold aksam">{{$vakitler["aksam"]}}

                                                        </td>
                                                        <td>
                                                            @if ($now>=$aksam)
                                                                <i class="fas fa-check-circle text-success"></i>
                                                            @else
                                                                <i class="fas fa-hourglass text-warning"></i>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    @if ($now<$imsak)
                                                        <tr data-hour="05:26" data-time-name="imsak"
                                                            class="bg-light text-dark">
                                                            @endif
                                                            <td class="text-center"><i
                                                                    class="wi wi-night-clear text-warning"></i></td>
                                                            <td class="text-uppercase">Yatsı</td>
                                                            <td class="font-weight-bold yatsi">{{$vakitler["yatsi"]}}</td>
                                                            <td>
                                                                @if($now>=$yatsi)
                                                                    <i class="fas fa-check-circle text-success"></i>
                                                                @else
                                                                    <i class="fas fa-hourglass text-warning"></i>
                                                                @endif
                                                            </td>
                                                        </tr>
                                </tbody>
                            </table>
                            <div class="w-100" id="al"></div>
                        </div>


                    </div>
                </div>

            </div>
            <!--Namaz vakitleri-->
        </div>
        @if(count($video_gallary)>7)
            <section class="bg-dark mt-3 pt-3 pb-3">
                <div class="container">
                    <div class="m-2 d-flex justify-content-center">
                        <img class="text-center" width="300px" src="{{asset('image/videologo.png')}}">
                    </div>
                    <div class="row">
                        <div class="col-md-6 p-2">
                            <div class="video-overlay">
                                <i class="fa fa-play-circle"></i></div>
                            <a href="{{URL::to('/'.Str::slug($video_gallary[0]->title_tr).'/'.$video_gallary[0]->id.'/'.'haberi')}}">
                                <img class="img-fluid" src="{{$video_gallary[0]->image}}"></a></div>
                        <div class="col-md-6 ">
                            <div class="row">
                                <div class="col-md-6 mt-2"
                                     style="padding-left: 7px !important;padding-right: 7px !important;">
                                    <div class="video-overlay"><i class="fa fa-play-circle"></i></div>
                                    <a href="{{URL::to('/'.Str::slug($video_gallary[1]->title_tr).'/'.$video_gallary[1]->id.'/'.'haberi')}}">
                                        <img class="img-fluid" src="{{$video_gallary[1]->image}}"></a>
                                </div>
                                <div class="col-md-6 mt-2"
                                     style="padding-left: 7px !important;padding-right: 7px !important;">
                                    <div class="video-overlay"><i class="fa fa-play-circle"></i></div>
                                    <a href="{{URL::to('/'.Str::slug($video_gallary[2]->title_tr).'/'.$video_gallary[2]->id.'/'.'haberi')}}">
                                        <img class="img-fluid" src="{{$video_gallary[2]->image}}"></a></div>
                                <div class="col-md-6 mt-2"
                                     style="padding-left: 7px !important;padding-right: 7px !important;">


                                    <div class="video-overlay"><i class="fa fa-play-circle"></i></div>
                                    <a href="{{URL::to('/'.Str::slug($video_gallary[3]->title_tr).'/'.$video_gallary[3]->id.'/'.'haberi')}}">
                                        <img class="img-fluid" src="{{$video_gallary[3]->image}}"></a></div>
                                <div class="col-md-6 mt-2"
                                     style="padding-left: 7px !important;padding-right: 7px !important;">
                                    <div class="video-overlay"><i class="fa fa-play-circle"></i></div>
                                    <a href="{{URL::to('/'.Str::slug($video_gallary[4]->title_tr).'/'.$video_gallary[4]->id.'/'.'haberi')}}">
                                        <img class="img-fluid" src="{{$video_gallary[4]->image}}"></a></div>
                            </div>
                        </div>
                        <div class="col-md-3 d-flex"
                             style="width: 150px; padding-left: 7px !important;padding-right: 7px !important;">
                            <div class="position-relative float-left">
                                <div class="video-overlay"><i class="fa fa-play-circle"></i></div>
                                <a href="{{URL::to('/'.Str::slug($video_gallary[5]->title_tr).'/'.$video_gallary[5]->id.'/'.'haberi')}}">
                                    <img class="img-fluid" width="150" src="{{$video_gallary[5]->image}}"></a>
                            </div>
                            <p class="ml-1 float-left text-white text-center my-auto"
                               style="width: 117px;font-size: 14px; display: -webkit-box;-webkit-line-clamp: 3;-webkit-box-orient: vertical; overflow:hidden;">{{$video_gallary[5]->title_tr}}
                            </p>
                        </div>
                        <div class="col-md-3 d-flex"
                             style="width: 150px; padding-left: 7px !important;padding-right: 7px !important;">
                            <div class="position-relative float-left">
                                <div class="video-overlay"><i class="fa fa-play-circle"></i></div>
                                <a href="{{URL::to('/'.Str::slug($video_gallary[6]->title_tr).'/'.$video_gallary[6]->id.'/'.'haberi')}}">
                                    <img class="img-fluid" width="150" src="{{$video_gallary[6]->image}}"></a>
                            </div>
                            <p class="ml-1 float-left text-white text-center my-auto"
                               style="width: 117px;font-size: 14px; display: -webkit-box;-webkit-line-clamp: 3;-webkit-box-orient: vertical; overflow:hidden;"
                            >{{$video_gallary[6]->title_tr}}
                            </p>
                        </div>
                        <div class="col-md-3 d-flex"
                             style="width: 150px; padding-left: 7px !important;padding-right: 7px !important;">
                            <div class="position-relative float-left">
                                <div class="video-overlay"><i class="fa fa-play-circle"></i></div>
                                <a href="{{URL::to('/'.Str::slug($video_gallary[7]->title_tr).'/'.$video_gallary[7]->id.'/'.'haberi')}}">
                                    <img class="img-fluid" width="150" src="{{$video_gallary[7]->image}}"></a>
                            </div>
                            <p class="ml-1 float-left text-white text-center my-auto"
                               style="width: 117px;font-size: 14px; display: -webkit-box;-webkit-line-clamp: 3;-webkit-box-orient: vertical; overflow:hidden;"
                            >{{$video_gallary[7]->title_tr}}
                            </p>
                        </div>
                        <div class="col-md-3 d-flex"
                             style="width: 150px; padding-left: 7px !important;padding-right: 7px !important;">
                            <div class="position-relative float-left">
                                <div class="video-overlay"><i class="fa fa-play-circle"></i></div>
                                <a href="{{URL::to('/'.Str::slug($video_gallary[8]->title_tr).'/'.$video_gallary[8]->id.'/'.'haberi')}}">
                                    <img class="img-fluid" width="150" src="{{$video_gallary[8]->image}}"></a>
                            </div>
                            <p class="ml-1 float-left text-white text-center my-auto"
                               style="width: 117px;font-size: 14px; display: -webkit-box;-webkit-line-clamp: 3;-webkit-box-orient: vertical; overflow:hidden;"
                            >{{$video_gallary[8]->title_tr}}
                            </p>
                        </div>
                    </div>
                </div>
            </section>
        @endif
        <div class="container">
            <div class="row">
                <!--  ÜST BLOK 1140x90 REKLAM-->
                @foreach($ads as $ad)
                    @if($ad->type==1 && $ad->category_id==18)
                        <div class="col-md-12">
                            <a href="{{$ad->link}}"><img
                                    onerror="this.onerror=null;this.src='{{$webSiteSetting->defaultImage}}';"
                                    class="img-fluid pb-2 pt-1 lazyload" width="1140" height="90"
                                    data-src="{{asset($ad->ads)}}"></a>
                        </div>
                    @elseif($ad->type==2 && $ad->category_id==18)
                        <div class="w-100">{!!$ad->ad_code!!}</div>
                    @endif
                @endforeach
            </div>
        </div>
        <!---EKONOMİ HABERLERİ-->
        <section class="siyaset pb-4">

            <div class="container pt-2 pb-2">

                <!--  ÜST BLOK 1140x90 REKLAM-->
                <h4 class="pt-2 pb-2 ana-baslik">
                    Öne Çıkan {{$ekonomimanset[0]->category->category_tr}} Haberleri


                </h4>
                <!-- <div class="row"> -->
                <div class="col-md-12 p-0 m-0">

                    <div class="swiper-container siyaset"
                         style="background-color:{{$themeSetting[0]->siteColorTheme}}!important;">
                        <div class="swiper-wrapper">
                            <!-------------ECONOMY FEATURED---->
                            @foreach ($ekonomimanset as $row )
                                @if($row->featured ==1)
                                    <div class="swiper-slide" style="">
                                        <div class="card kart kart-width kart-margin shadow" style="">
                                            <a href="{{URL::to('/'.str_slug($row->title_tr).'/'.$row->id.'/'.'haberi')}}">
                                                <img
                                                    onerror="this.onerror=null;this.src='{{$webSiteSetting->defaultImage}}';"
                                                    class="img_fluid kart_img lazyload" src="{{asset($row->image)}}"
                                                    alt="Card image cap"></a>

                                            <div class="card-body kart-body   border-3 text-dark"
                                                 style="border-top:1px solid {{$themeSetting[0]->economy}}">
                                                @if($row->headlinetag==1)
                                                    <div class="short-tag"
                                                         style="background-color:{{$themeSetting[0]->economy}}">
                                                        <span>Son Dakika</span>
                                                    </div>
                                                @else
                                                    <div class="short-tag category"
                                                         style="background-color:{{$themeSetting[0]->economy}}">
                                                        <span>{{$row->category->category_tr}}</span>
                                                    </div>
                                                @endif
                                                <p class="card-text"
                                                   style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 2;  -webkit-box-orient: vertical;">{{$row->title_tr}}</p>
                                            </div>

                                        </div>
                                    </div>
                                @endif



                            @endforeach


                        </div>
                        <!-- Add Pagination -->
                        <div class="spor-buton">
                            <div class="swiper-pagination spor-pagination"></div>
                            <!-- Add Arrows -->
                            <div class="swiper-button-next white-next"></div>
                            <div class="swiper-button-prev white-prev"></div>
                        </div>
                    </div>
                </div>
                <!-- </div> -->
            </div>
        </section>


        <!---EKONOMİ HABERLERİ-->
        <div class="container pt-2 pb-2">
            <div class="row">
                @foreach($ekonomi as $homes)



                    <div class="col-md-4 float-left mb-3  ">
                        <div class="card kart kart-width kart-margin shadow" style="">
                            <a href="{{URL::to('/'.str_slug($homes->title_tr).'/'.$homes->id.'/'.'haberi')}}">
                                <img onerror="this.onerror=null;this.src='{{$webSiteSetting->defaultImage}}';"
                                     class="img_fluid kart_img lazyload" src="{{asset($homes->image)}}"
                                     alt="Card image cap"></a>
                            @if($homes->headlinetag==1)
                                <div class="short-tag" style="background-color:{{$themeSetting[0]->economy}}">
                                    <span>Son Dakika</span>
                                </div>
                            @else
                                <div class="short-tag category" style="background-color:{{$themeSetting[0]->economy}}">
                                    <span>{{$homes->category->category_tr}}</span>
                                </div>
                            @endif
                            <div class="card-body kart-body   border-3 text-dark"
                                 style="border-top:1px solid {{$themeSetting[0]->economy}}">
                                <p class="card-text"
                                   style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 2;  -webkit-box-orient: vertical;">{{$homes->title_tr}}</p>
                            </div>
                        </div>
                    </div>





                @endforeach
            </div>
        </div>




        <!---EKONOMİ HABERLERİ-->
        <div class="container pt-2 pb-2">
            <div class="row">
                <!--  ÜST BLOK 1140x90 REKLAM-->
                @foreach($ads as $ad)
                    @if($ad->type==1 && $ad->category_id==19)
                        <div class="col-md-12">
                            <a href="{{$ad->link}}"><img class="img-fluid pb-2 pt-1 lazyload" width="1140" height="90"
                                                         src="{{asset($ad->ads)}}"></a>
                        </div>
                    @elseif($ad->type==2 && $ad->category_id==19)
                        <div class="w-100">{!!$ad->ad_code!!}</div>
                    @endif
                @endforeach
            </div>
        </div>

        <section class=" pb-4" style="background-color: {{$themeSetting[0]->agenda}};">
            <div class="container pt-2 pb-2">
                <h4 class="pt-2 pb-2 ana-baslik">Öne Çıkan {{$gundemmanset[0]->category->category_tr}} Haberleri</h4>
                <!-- <div class="row"> -->
                <div class="col-md-12 p-0 m-0">

                    <div class="swiper-container ekonomi"
                         style="background-image: linear-gradient(-10deg, {{$themeSetting[0]->agenda}}, {{$themeSetting[0]->agenda}}) !important">
                        <div class="swiper-wrapper" style="background-color: {{$themeSetting[0]->agenda}}">
                            @foreach($gundemmanset as $homes)
                                <div class="swiper-slide" style="">
                                    <div class="card kart kart-width shadow" style="">
                                        <a href="{{URL::to('/'.str_slug($homes->title_tr).'/'.$homes->id.'/'.'haberi')}}">
                                            <img
                                                onerror="this.onerror=null;this.src='{{$webSiteSetting->defaultImage}}';"
                                                class="img-fluid kart_img lazyload" src="{{asset($homes->image)}}"
                                            /></a>

                                        <div class="card-body kart-body   border-3 text-dark"
                                             style="border-top-color:{{$themeSetting[0]->agenda}}; ">
                                            @if($homes->headlinetag==1)
                                                <div class="short-tag"
                                                     style="background-color:{{$themeSetting[0]->agenda}}">
                                                    <span>Son Dakika</span>
                                                </div>
                                            @else
                                                <div class="short-tag category"
                                                     style="background-color:{{$themeSetting[0]->agenda}}">
                                                    <span>{{$homes->category->category_tr}}</span>
                                                </div>
                                            @endif
                                            <p class="card-text">{{ $homes->title_tr}}</p>
                                        </div>
                                    </div>
                                </div>

                            @endforeach


                        </div>
                        <!-- Add Pagination -->
                        <div class="spor-buton">
                            <div class="swiper-pagination spor-pagination"></div>
                            <!-- Add Arrows -->
                            <div class="swiper-button-next white-next"></div>
                            <div class="swiper-button-prev white-prev"></div>
                        </div>
                    </div>
                </div>
                <!-- </div> -->
            </div>

        </section>

        <div class="container pt-2 pb-2">
            <div class="row">
                <!--  ÜST BLOK 1140x90 REKLAM-->
            </div>
        </div>

        <!---EKONOMİ HABERLERİ-->
        <div class="container pt-2 pb-2">
            <div class="row">
                @foreach($gundem as $homes)
                    <div class="col-md-4 float-left mb-3  ">
                        <div class="card kart kart-width kart-margin shadow" style="">
                            <a href="{{URL::to('/'.str_slug($homes->title_tr).'/'.$homes->id.'/'.'haberi')}}">
                                <img onerror="this.onerror=null;this.src='{{$webSiteSetting->defaultImage}}';"
                                     class="img_fluid kart_img lazyload" data-src=" {{asset($homes->image)}}"
                                     alt="Card image cap"></a>

                            <div class="card-body kart-body   border-3 text-dark"
                                 style="border-top-color:{{$themeSetting[0]->agenda}}; ">
                                @if($homes->headlinetag==1)
                                    <div class="short-tag" style="background-color:{{$themeSetting[0]->agenda}}">
                                        <span>Son Dakika</span>
                                    </div>
                                @else
                                    <div class="short-tag category"
                                         style="background-color:{{$themeSetting[0]->agenda}}">
                                        <span>{{$homes->category->category_tr}}</span>
                                    </div>
                                @endif
                                <p class="card-text">{{ $homes->title_tr}}</p>
                            </div>
                        </div>
                    </div>




                @endforeach
            </div>
        </div>


        <div class="container">
            <div class="row">
                <!--  ÜST BLOK 1140x90 REKLAM-->
                @foreach($ads as $ad)
                    @if($ad->type==1 && $ad->category_id==20)
                        <div class="col-md-12">
                            <a href="{{$ad->link}}"><img class="img-fluid pb-2 pt-1 lazyload" width="1140" height="90"
                                                         data-src="{{asset($ad->ads)}}"></a>
                        </div>
                    @elseif($ad->type==2 && $ad->category_id==20)
                        <div class="w-100">{!!$ad->ad_code!!}</div>
                    @endif
                @endforeach
            </div>
        </div>

        <!---EKONOMİ HABERLERİ-->
        <section class="ekonomi pb-4">
            <div class="container pt-2 pb-2">
                <h4 class="pt-2 pb-2 ana-baslik">Öne Çıkan {{$siyasetmanset[0]->category->category_tr}} Haberleri </h4>
                <!-- <div class="row"> -->
                <div class="col-md-12">
                    <div class="swiper-container ekonomi">
                        <div class="swiper-wrapper">


                            @foreach($siyasetmanset as $homes)

                                <div class="swiper-slide" style="">
                                    <div class="card kart kart-width shadow" style="">
                                        <a href="{{URL::to('/'.str_slug($homes->title_tr).'/'.$homes->id.'/'.'haberi')}}">
                                            <img
                                                onerror="this.onerror=null;this.src='{{$webSiteSetting->defaultImage}}';"
                                                class="img-fluid kart_img lazyload"
                                                data-src="{{asset($homes->image)}}"/><a/>
                                            <div class="card-body kart-body   border-3 text-dark"
                                                 style="border-top-color:{{$themeSetting[0]->politics}}; ">
                                                @if($homes->headlinetag==1)
                                                    <div class="short-tag"
                                                         style="background-color:{{$themeSetting[0]->politics}}">
                                                        <span>Son Dakika</span>
                                                    </div>
                                                @else
                                                    <div class="short-tag category"
                                                         style="background-color:{{$themeSetting[0]->politics}}">
                                                        <span>{{$homes->category->category_tr}}</span>
                                                    </div>
                                                @endif
                                                <p class="card-text">{{ $homes->title_tr}}</p>
                                            </div>
                                    </div>
                                </div>
                            @endforeach


                        </div>
                        <!-- Add Pagination -->
                        <div class="spor-buton">
                            <div class="swiper-pagination spor-pagination"></div>
                            <!-- Add Arrows -->
                            <div class="swiper-button-next white-next"></div>
                            <div class="swiper-button-prev white-prev"></div>
                        </div>
                    </div>
                </div>

                <!-- </div> -->
            </div>
        </section>
        <div class="container pt-2 pb-2">
            <div class="row">
                @foreach($siyaset as $homes)
                    <div class="col-md-4 float-left mb-3  ">
                        <div class="card kart kart-width kart-margin shadow" style="">
                            <a href="{{URL::to('/'.str_slug($homes->title_tr).'/'.$homes->id.'/'.'haberi')}}">
                                <img onerror="this.onerror=null;this.src='{{$webSiteSetting->defaultImage}}';"
                                     class="img_fluid kart_img lazyload" data-src=" {{asset($homes->image)}}"
                                     alt="Card image cap"></a>

                            <div class="card-body kart-body   border-3 text-dark"
                                 style="border-top-color:{{$themeSetting[0]->agenda}}; ">
                                @if($homes->headlinetag==1)
                                    <div class="short-tag" style="background-color:{{$themeSetting[0]->politics}}">
                                        <span>Son Dakika</span>
                                    </div>
                                @else
                                    <div class="short-tag category"
                                         style="background-color:{{$themeSetting[0]->politics}}">
                                        <span>{{$homes->category->category_tr}}</span>
                                    </div>
                                @endif
                                <p class="card-text">{{ $homes->title_tr}}</p>
                            </div>
                        </div>
                    </div>




                @endforeach
            </div>
        </div>
        <div class="container">
            <div class="row">
                <!--  ÜST BLOK 1140x90 REKLAM-->
                @foreach($ads as $ad)
                    @if($ad->type==1 && $ad->category_id==21)
                        <div class="col-md-12">
                            <a href="{{$ad->link}}"><img
                                    onerror="this.onerror=null;this.src='{{$webSiteSetting->defaultImage}}';"
                                    class="img-fluid pb-2 pt-1 lazyload" width="1140" height="90"
                                    data-src="{{asset($ad->ads)}}"></a>
                        </div>
                    @elseif($ad->type==2 && $ad->category_id==21)
                        <div class="w-100">{!!$ad->ad_code!!}</div>
                    @endif
                @endforeach
            </div>
        </div>
        <!---Siyaset HABERLERİ-->

        <div class="container">
            <div class="row">

            </div>
        </div>
        <!--SPOR SLİDER-->
        <section class="spor pb-4">
            <div class="container pt-2 pb-2">

                <h4 class="pt-2 pb-2 ana-baslik">Öne Çıkan {{$spormanset[0]->category->category_tr}} Haberleri</h4>
                <!-- <div class="row"> -->
                <div class="col-md-12">
                    <div class="swiper-container spor">
                        <div class="swiper-wrapper">

                            @foreach($spormanset as $homes)

                                <div class="swiper-slide" style="">
                                    <div class="card kart kart-width shadow" style="">
                                        <a href="{{URL::to('/'.str_slug($homes->title_tr).'/'.$homes->id.'/'.'haberi')}}">
                                            <img
                                                onerror="this.onerror=null;this.src='{{$webSiteSetting->defaultImage}}';"
                                                class="img-fluid kart_img lazyload"
                                                data-src="{{asset($homes->image)}}"/></a>
                                        <div class="card-body kart-body   border-3 text-dark"
                                             style="border-top-color:{{$themeSetting[0]->sport}}; ">
                                            @if($homes->headlinetag==1)
                                                <div class="short-tag"
                                                     style="background-color:{{$themeSetting[0]->sport}}">
                                                    <span>Son Dakika</span>
                                                </div>
                                            @else
                                                <div class="short-tag category"
                                                     style="background-color:{{$themeSetting[0]->sport}}">
                                                    <span>{{$homes->category->category_tr}}</span>
                                                </div>
                                            @endif
                                            <p class="card-text">{{ $homes->title_tr}}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach


                        </div>
                        <!-- Add Pagination -->
                        <div class="spor-buton">
                            <div class="swiper-pagination spor-pagination"></div>
                            <!-- Add Arrows -->
                            <div class="swiper-button-next white-next"></div>
                            <div class="swiper-button-prev white-prev"></div>
                        </div>
                    </div>
                </div>
                <!-- </div> -->
            </div>
        </section>
        <!--SPOR SLİDER-->

        <div class="container">
            <div class="col-md-12">
                <!--  ÜST BLOK 1140x90 REKLAM-->
                @foreach($ads as $ad)
                    @if($ad->type==1 && $ad->category_id==23)
                        <div class="col-md-12">
                            <a href="{{$ad->link}}"><img
                                    onerror="this.onerror=null;this.src='{{$webSiteSetting->defaultImage}}';"
                                    class="img-fluid pb-2 pt-1 lazyload" width="1140" height="90"
                                    data-src="{{asset($ad->ads)}}"></a>
                        </div>
                    @elseif($ad->type==2 && $ad->category_id==23)
                        <div class="w-100">{!!$ad->ad_code!!}</div>
                    @endif
                @endforeach


            </div>
            <div class="row">

                <div class="col-lg-8">
                    <div class="row mt-3">
                        @foreach($spor as $homes)

                            <div class="col-md-6 float-left mb-3  ">
                                <div class="card kart kart-width kart-margin shadow" style="">
                                    <a href="{{URL::to('/'.str_slug($homes->title_tr).'/'.$homes->id.'/'.'haberi')}}">
                                        <img onerror="this.onerror=null;this.src='{{$webSiteSetting->defaultImage}}';"
                                             class="img_fluid kart_img lazyload" data-src=" {{asset($homes->image)}}"
                                             alt="Card image cap"></a>
                                    <div class="card-body kart-body   border-3 text-dark"
                                         style="border-top-color:{{$themeSetting[0]->sport}}; ">
                                        @if($homes->headlinetag==1)
                                            <div class="short-tag" style="background-color:{{$themeSetting[0]->sport}}">
                                                <span>Son Dakika</span>
                                            </div>
                                        @else
                                            <div class="short-tag category"
                                                 style="background-color:{{$themeSetting[0]->sport}}">
                                                <span>{{$homes->category->category_tr}}</span>
                                            </div>
                                        @endif
                                        <p class="card-text">{{ $homes->title_tr}}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    <!--  ÜST BLOK 1140x90 REKLAM-->
                        @foreach($ads as $ad)
                            @if($ad->type==1 && $ad->category_id==22)
                                <div class="col-md-12">
                                    <a href="{{$ad->link}}"><img
                                            onerror="this.onerror=null;this.src='{{$webSiteSetting->defaultImage}}';"
                                            class="img-fluid pb-2 pt-1 lazyload" width="1140" height="90"
                                            data-src="{{asset($ad->ads)}}"></a>
                                </div>
                            @elseif($ad->type==2 && $ad->category_id==22)
                                <div class="w-100">{!!$ad->ad_code!!}</div>
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-4" style="">
                    <div class="row mt-3">
                        <div class="col-md-12 ">
                            <div class="card-header card-spor  position-relative">
                                <div class=" card-spor__link text-left pad text-center">
                                    <!--<img class="img-fluid lazyload" style="margin: 1px 15px 0px -21px;" width="30" height="30" data-src="./img/superlig.png">--><b>Süper
                                        Lig</b> Puan Durumu
                                </div>
                            </div>

                        @include('main.body.puan-durumu')

                        <!--PUAN TABLOSU-->
                        </div>

                    </div>
                </div>

            </div>
        </div>




        <div class="container">


            <!-- <link rel="stylesheet" href="https://unpkg.com/swiper/css/swiper.min.css"> -->
            <!-- Footer -->
            <footer class="page-footer font-small blue-grey lighten-5">
                <div class="kapsayici" style="position:relative;">


                    <div id="footer-kapat" class="kapat-buton"><span>Reklamı Kapat</span></div>
                    <div class="desktop-sticy" style="width:100%; height:auto;">
                        <div class="reklam-alani mt-1 mb-1 text-center">
                            <a target="_blank" href=""><img data-src="./img/reklamlar/" class="img-fluid lazyload "
                                                            alt=""></a>

                        </div>

                        <div class="reklam-alani mt-3 text-center">
                        </div>
                    </div>
                </div>
        </div>


@endsection

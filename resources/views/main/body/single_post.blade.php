@extends('main.home_master')
@section('title',$post->title_tr)
@section('meta_keywords',$post->keywords_tr)
@section('meta_description',$post->description_tr)
@section('og:site_name',$seoset->meta_title)
@section('og:title',$post->title_tr)
@section('og:description',$post->title_tr)
@section('og:image',asset($post->image))
@section('og:url',url()->current())
@section('twitter:url',url()->current())
@section('twitter:domain',Request::root())
@section('twitter:site',$seoset->meta_title)
@section('twitter:title',$post->title_tr)

@section('content')
    <?php
    $themeSetting = DB::table('themes')->get();
    ?>
    <style>
        .detay-pagination > .swiper-pagination-bullet-active {
            background-color: {{$themeSetting[0]->siteColorTheme}} !important;
        }

        .detay__liste-rakam {
            color: {{$themeSetting[0]->siteColorTheme}} !important;
        }
    </style>
    {{--     @php--}}
    {{--    dd($ads);--}}
    {{--@endphp--}}


    <div class="container  pt-3">
        <div class="row mt-3 mb-3 ">
            <div class="col-md-8  h-100 p-0">

                <div class="shadow-lg  h-100 rounded pt-2 pb-2 p-3">
                    <h1 class="text-dark" style="font-family: Poppins; font-weight: 800;font-size: 34px;">
                        @if (session()->get('lang') == 'english')
                            {{ Str::ucFirst($post->title_en) }}
                        @else
                            {{ Str::ucFirst($post->title_tr) }}
                        @endif
                    </h1>
                    <h2 style="font-size: 20px;">

                            {{ Str::ucFirst($post->subtitle_tr) }}

                    </h2>
                    @foreach($ads as $ad)
                        @if($ad->type==1 && $ad->category_id==3)
                            <img class="img-fluid pb-2 pt-1" onerror="this.onerror=null;this.src='{{asset($webSiteSetting->defaultImage)}}';" width="100%" height="90" src="{{asset($ad->ads)}}">
                        @elseif($ad->type==2 && $ad->category_id==3)
                            <div class="w-100">{!!$ad->ad_code!!}</div>
                        @endif
                    @endforeach

                    <div class="text-center ">

                        <div class="video-container">
                            @if (!empty($post->posts_video))
                                <iframe width="100%" height="400"
                                        src="https://www.youtube.com/embed/{{$post->posts_video }}"
                                        title="YouTube video player" frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen></iframe>
                            @else
                                <img src="{{ asset($post->image) }}" onerror="this.onerror=null;this.src='{{asset($webSiteSetting->defaultImage)}}';" class="img-fluid mb-3" alt="">
                            @endif
                        </div>
                        <img src="" alt="">
                    </div>
                    <ul class="detay__kategori list-unstyled pb-3 social-icons font-weight-bold">
                        <!-- <li class="float-left mr-2"><i class="fa fa-circle  text-danger pr-1"></i>Kategori : Gündem</li> -->
                        <li class="float-left mr-2"><i class="fa fa-calendar-alt  text-danger pr-1">
                            </i> {{ \Carbon\Carbon::parse($post->created_at)->isoFormat('DD MMMM YYYY') }}</li>
                        <li class="float-left mr-2"><i
                                class="fa fa-clock  text-danger pr-1"></i>{{ Carbon\Carbon::parse($post->created_at)->isoFormat('HH:mm') }}
                        </li>
                        <li class="float-left mr-2"><i class="fa fa-user  text-danger pr-1"></i>
                            @if(empty($post->user->name)) Admin @else  {{ $post->user->name }} @endif </li>
                        <li class="float-left mr-2"><span
                                class="text-danger">İL:</span> {{ $post->districts->district_tr}}
                        </li>
                        <li class="float-left mr-2"><span
                                class="text-danger">Kategori:</span>{{ $post->category->category_tr}}
                        </li>
                        <a target="_blank"
                           href="https://www.facebook.com/sharer.php?u={{ URL::to('/' . str_slug($post->title_tr) . '/' . $post->id . '/' . 'haberi') }}"
                           class="facebook">

                            <li class="list-inline-item"><i style="padding: 6px;" class="fab fa-facebook-f"></i></li>
                        </a>
                        <a target="_blank"
                           href="https://twitter.com/share?url={{ URL::to('/' . str_slug($post->title_tr). '/' . $post->id . '/' . 'haberi') }}"
                           class="twitter">
                            <li class="list-inline-item"><i style="padding: 6px;" class="fab fa-twitter"></i></li>
                        </a>
                        <a href="https://wa.me/?text={{ URL::to('/' . str_slug($post->title_tr). '/' . $post->id . '/' . 'haberi') }}"
                           class="whatsapp">
                            <li class="list-inline-item"><i style="padding: 6px;" class="fab fa-whatsapp"></i></li>
                        </a>
                        <!-- <li class="float-left mr-2"><i class="fa fa-user  text-danger pr-1"></i><img width="80" src="img/aa.png"></li> -->

                        <li class="float-left mr-2"><img src=""></li>

                    </ul>
                    <hr>
                    <!-- İÇERİK KARE REKLAM ALANI 250x250 -->
                    <div class="float-left pr-3 pl-0">
                        @foreach($ads as $ad)
                            @if($ad->type==1 && $ad->category_id==1)
                                <img class="img-fluid pb-2 pt-1"  width="100%" height="90" src="{{asset($ad->ads)}}">
                            @elseif($ad->type==2 && $ad->category_id==1)
                                <div class="w-100">{!!$ad->ad_code!!}</div>
                            @endif
                        @endforeach
                    </div>
                    <!-- İÇERİK KARE REKLAM ALANI 250x250 -->

                    <div style="min-height:300px">{!! $post->details_tr !!}</div>

                    {{--                    {{$post->post()->name}}--}}
                    {{--                    <div class="row p-3">--}}

                    {{--                        @foreach($nextrelated as $relate)--}}
                    {{--                            --}}{{--    {{dd($relate)}}--}}
                    {{--                            <img src="{{asset($relate->image)}}" width="200" alt="">--}}
                    {{--                        @endforeach--}}
                    {{--                    </div>--}}
                    <div class="row p-3">
                        @foreach($tagName as $relate)
                            {{--    {{dd($relate)}}--}}

                            <a href="{{ URL::to('/etiket/'.str_slug($relate->name).'/'.$relate->id) }}">
                                <div class="btn btn-sm btn-secondary  d-inline-block float-left ml-1 mb-2">{{$relate->name}}
                                </div>
                            </a>
                        @endforeach
                    </div>
                    @if ($tagCount>=1)

                        @foreach($maybeRelated as $row)
                            <a href="{{ URL::to('/' . str_slug($row->title_tr). '/' . $row->post_id . '/' . 'haberi') }}">
                        <div class="row p-3 border-top">
                                <div class="col-md-5"><img height="200" class="img-fluid" src="{{asset($row->image)}}"></div>
                                <div class="col-md-7 my-auto">
                                    <small class="font-weight-bold text-secondary">İlginizi Çekebilir</small>
                                    <p class="card-kisalt font-weight-bold">{{$row->title_tr}}</p>
                                </div>
                            </div>
                            </a>
                        @endforeach
                    @endif

                <!-- İÇERİK KARE REKLAM ALANI 728x90 -->

                    @foreach($ads as $ad)
                        @if($ad->type==1 && $ad->category_id==12)
                            <img class="img-fluid pb-2 pt-1" onerror="this.onerror=null;this.src='{{asset($webSiteSetting->defaultImage)}}';" width="100%" height="90" src="{{asset($ad->ads)}}">
                        @elseif($ad->type==2 && $ad->category_id==12)
                            <div class="w-100">{!!$ad->ad_code!!}</div>
                    @endif
                @endforeach

                <!-- order images-->


                    <!-- İÇERİK KARE REKLAM ALANI 728x90 -->

                    <div class="row">
                        <!--     <div class="col-md-6 ">
                                <h4 class="text-dark">Abone Ol : </h4>
                            </div>-->
                        <!-- <div class="col-md-6 ">
                                <h4 class="text-dark  d-inline float-left pr-3">Paylaş </h4>
                                <ul class="list-inline float-left social-icons position-relative">
                                    <a href="" class="facebook">
                                        <li class="list-inline-item"><i class="fa fa-facebook"></i></li>
                                    </a>
                                    <a href="" class="twitter">
                                        <li class="list-inline-item"><i class="fa fa-twitter"></i></li>
                                    </a>
                                    <a href="" class="whatsapp">
                                        <li class="list-inline-item"><i class="fa fa-whatsapp"></i></li>
                                    </a>
                                </ul>
                            </div>
                        </div>
                    </div>

                     <div class="position-relative col-md-12 p-2 mt-3">
                    <p class="detay__sidebar-baslik "><b>İLGİNİZİ</b> <span>ÇEKEBİLİR</span></p>
                    </div> -->


                        <div class="col-md-12 shadow-lg p-3 mt-3 bg-light">
                            <h3 class="text-dark">Haber Yorumları</h3>
                            @foreach($comments as $comment)
                                <hr>
                                <span class="text-dark"><i class="fa fa-user pr-1"></i>{{$comment->name}}</span>
                                <br>
                                <span class="position-relative" id="cevap">{{$comment->details}}</span>
                            @endforeach


                        </div>
                        <div class="col-md-12 shadow-lg  p-3 mt-3 bg-light">

                            <p class="text-dark"></p>
                            <span class="position-relative" id="cevap"><h5><i
                                        class="fa fa-pencil pr-1"></i>Yorum Yaz</h5></span>

                            <form id="formum" action="{{route('add.comments',$post->id)}}" method="post">
                            @csrf
                            <!-- <label for="">İsminiz</label> -->
                                <input type="text" name="name" id="isim" class="form-control mt-1"
                                       placeholder="Adınızı Yazınız"/>
                                <!-- <label for="">Yorumunuz</label> -->
                                <input type="text" name="details" id="yorum" class="form-control mt-1"
                                       placeholder="Yorumunuzu Yazınız"/>
                                <div class="row mt-2">
                                    <div class="col-md-2 col-6">
                                        @php
                                            $guvenlikkodu= rand(10000,99999);
                                        @endphp
                                        <p class="btn btn-success">{{$guvenlikkodu}}</p>


                                    </div>
                                    <div class="col-md-10 col-6">
                                        <input class="form-control" name="guvenlik" placeholder="Güvenlik Kodu"
                                               type="text">


                                    </div>
                                    <input type="hidden" name="posts_id" value="{{$post->id}}" id="haber_id">
                                    <input type="hidden" name="guvenlikkodu" value="{{$guvenlikkodu}}">
                                    <input type="hidden" name="yorumicerik" id="yorumicerik" class="form-control"
                                           aria-describedby="emailHelp" value="">

                                </div>

                                <button class="btn text-white"
                                        style="background-color: {{$themeSetting[0]->siteColorTheme}}">Gönder
                                </button>

                            </form>


                            <!-- <div id="cevap" class="mt-3"></div> -->
                            <div id="cevapgetir"></div>


                        </div>
                    </div>
                </div>

            </div>

            <div class="col-md-4">
                @foreach($ads as $ad)
                    @if($ad->type==1 && $ad->category_id==7)
                        <a href="{{$ad->link}}"><img onerror="this.onerror=null;this.src='{{asset($webSiteSetting->defaultImage)}}';" class="img-fluid pb-1 pt-3" width="100%" height="90"
                                                     src="{{asset($ad->ads)}}"></a>
                    @elseif($ad->type==2 && $ad->category_id==7)
                        <div class="w-100">{!!$ad->ad_code!!}</div>
                    @endif
                @endforeach
                <!-- HABER DETAY SLİDER -->
                <div class="swiper-container detay-slider mb-2">
                    <div class="swiper-wrapper">
                        {{--@php--}}
                        {{--    $manset =DB::table('posts')->where('category_id',$post->category_id)->where('manset',1)->where('status',1)->orderBy('updated_at','desc')->limit(10)->get();--}}
                        {{--@endphp--}}
                        @foreach ($slider as $row )

                            <div class="swiper-slide">
                                <a href="{{'/'.str_slug($row->title_tr).'/'.$row->id.'/'.'haberi'}}">
                                    <img onerror="this.onerror=null;this.src='{{asset($webSiteSetting->defaultImage)}}';" src="{{asset($row->image)}}" class="img-fluid kart_img" alt="">
                                    {{-- <div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div> --}}
                                </a>
                            </div>
                        @endforeach


                    </div>
                    <!-- Add Pagination -->
                    <div class="swiper-pagination detay-pagination"></div>
                </div>
                <!-- HABER DETAY REKLAM 336x270 -->
                @foreach($ads as $ad)
                    @if($ad->type==1 && $ad->category_id==2)
                        <a href="{{$ad->link}}"><img onerror="this.onerror=null;this.src='{{asset($webSiteSetting->defaultImage)}}';" class="img-fluid pb-1 pt-3" width="100%" height="90"
                                                     src="{{asset($ad->ads)}}"></a>
                    @elseif($ad->type==2 && $ad->category_id==2)
                        <div class="w-100">{!!$ad->ad_code!!}</div>
                    @endif
                @endforeach
                    @foreach($ads as $ad)
                        @if($ad->type==1 && $ad->category_id==4)
                            <a href="{{$ad->link}}"><img class="img-fluid pb-1 pt-3" width="100%" height="90"
                                                         src="{{asset($ad->ads)}}"></a>
                        @elseif($ad->type==2 && $ad->category_id==4)
                            <div class="w-100">{!!$ad->ad_code!!}</div>
                        @endif
                    @endforeach
            <!-- HABER DETAY REKLAM 336x270 -->
                <!-- HABER DETAY SLİDER -->
                <div class="">

                    <div class="reklam-alani mt-1 mb-1 text-center">
                        <a target="_blank" href="">

                        </a>

                    </div>
                    <div class="reklam-alani mt-3 text-center">

                    </div>
                </div>
                @php
                    @endphp
                @foreach ( $random as $row)

                    <a target="_blank" href="{{URL::to('/'.str_slug($row->title_tr).'/'.$row->id.'/'.'haberi')}}">
                        <div class="card kart kart-width shadow mt-3">
                            <img onerror="this.onerror=null;this.src='{{asset($webSiteSetting->defaultImage)}}';" src="{{asset($row->image)}}" class="img-fluid kart_img" alt="">
                            <div class="card-body kart-body  bordercolor-1 border-3 text-dark">
                                <p class="card-text card-kisalt">

                                    {{ Str::ucFirst($row->title_tr) }}
                                </p>
                            </div>
                        </div>
                    </a>
            @endforeach

            <!--SIRADAKİ HABERLER-->

                    <div class="reklam-alani mt-1 mb-1 text-center">
                        <a target="_blank" href="">
                            @foreach($ads as $ad)
                                @if($ad->type==1 && $ad->category_id==5)
                                    <a href="{{$ad->link}}"><img onerror="this.onerror=null;this.src='{{asset($webSiteSetting->defaultImage)}}';" class="img-fluid pb-1 pt-3" width="100%" height="90"
                                                                 src="{{asset($ad->ads)}}"></a>
                                @elseif($ad->type==2 && $ad->category_id==5)
                                    <div class="w-100">{!!$ad->ad_code!!}</div>
                                @endif
                            @endforeach
                        </a>

                    </div>
                <div class="position-relative mt-3">
                    @if (session()->get('lang') == 'english')
                        <b>NEXT</b> <span>NEWS</span>
                    @else
                        <b>SIRADAKİ</b> <span>HABERLER</span>
                    @endif
                    <p class="detay__sidebar-baslik "></p>
                </div>
                <div class="list-group detay__liste mt-3">
                    @php
                        $dateS = \Carbon\Carbon::now()->startOfMonth()->subMonth(3);
                        $dateE = \Carbon\Carbon::now()->startOfMonth();
                        $i=0;
                        $nextnews =DB::table('posts')->where('category_id',$post->category_id)->where('manset',1)->where('status',1)->orderBy('updated_at','desc')->limit(10)->get();
                    @endphp
                    @foreach ($nextnews as $row )
                        @php $i++; @endphp
                        <a href="{{URL::to('/'.str_slug($row->title_tr).'/'.$row->id.'/'.'haberi')}}"
                           class="list-group-item list-group-item-action detay__liste-item ">
                            <i class="detay__liste-rakam d-table-cell align-middle">{{$i}}</i>
                            <span class="d-table-cell">
                            @if (session()->get('lang') == 'english')
                                    {{ Str::ucFirst($row->title_en) }}
                                @else
                                    {{ Str::ucFirst($row->title_tr) }}
                                @endif</span>
                        </a>
                    @endforeach

                </div>

                <!--SIRADAKİ HABERLER-->
                    @foreach($ads as $ad)
                        @if($ad->type==1 && $ad->category_id==6)
                            <a href="{{$ad->link}}"><img onerror="this.onerror=null;this.src='{{asset($webSiteSetting->defaultImage)}}';" class="img-fluid pb-1 pt-3" width="100%" height="90"
                                                         src="{{asset($ad->ads)}}"></a>
                        @elseif($ad->type==2 && $ad->category_id==6)
                            <div class="w-100">{!!$ad->ad_code!!}</div>
                        @endif
                    @endforeach
            </div>



            <!-- <div class="col-md-8 p-0 d-none d-sm-block">

                </div> -->

        </div>
    </div>
    </div>
@endsection

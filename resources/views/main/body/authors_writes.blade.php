{{--@foreach($yaziPost as $yaziPostlar)--}}
@section('title',$yaziPost->title)
@section('meta_keywords',$yaziPost->keywords)
@section('meta_description',$yaziPost->description)
@section('og:site_name',$seoset->meta_title)
@section('og:title',$yaziPost->title)
@section('og:description',$yaziPost->title)
@section('og:image',asset($yaziPost->author->image))
@section('og:url',url()->current())
@section('twitter:url',url()->current())
@section('twitter:domain',Request::root())
@section('twitter:site',$seoset->meta_title)
@section('twitter:title',$yaziPost->title)

@extends('main.home_master')
{{--@endforeach--}}

@section('content')
    <style>
        .siteTema{
            color: {{$themeSetting[0]->siteColorTheme}};
        }
    </style>
    <div class="container">

        <div class="col-lg-12 bg-light my-2">
            <div class="d-flex align-items-center justify-content-between">
                <div class="col-lg-6">
                    <div class="d-flex">
                        <div class="flex-shrink-0">
                            <img class="rounded-circle border border-secondary border-5" height="175px" width="175px"
                                 src="{{asset($yazardes->image)}}">
                        </div>
                        <div class="flex-grow-1 ms-3 pt-4">
                            <p class="ml-3  ">Köşe Yazarı</p>
                            <p class="ml-3 "><b>{{$yazardes->name}}</b></p>
                            <p class="ml-3  ">{{$yazardes->mail}}</p>
                        </div>
                    </div>

                </div>

                <div class="col-lg-6 ">
                    <ul class=" float-right d-flex align-items-center" style="list-style-type: none;">
                        <li><a target="_blank" href="https://www.facebook.com/sharer.php?u={{ URL::to('/' . str_slug($yaziPost->title) . '/' . $yaziPost->id) }}"><i
                                    class="fa-brands fa-facebook text-primary p-2  border border-light rounded-circle"
                                    style="font-size:25px;"></i>
                            </a>
                        </li>
                        <li><a target="_blank" href="https://twitter.com/share?url={{ URL::to('/' . str_slug($yaziPost->title). '/' . $yaziPost->id ) }}"><i
                                    class="fa-brands fa-twitter text-info p-2  border border-light rounded-circle"
                                    style="font-size:25px;"></i>
                            </a>
                        </li>
                        <li><a target="_blank" href="https://wa.me/?text={{ URL::to('/' . str_slug($yaziPost->title). '/' . $yaziPost->id) }}"><i
                                    class="fab fa-whatsapp text-success p-2 fa-color border border-light rounded-circle"
                                    style="font-size:25px;"></i>
                            </a>
                        </li>

                    </ul>


                </div>
            </div>
        </div>



        <div class="row">

            <div class="container col-lg-8">

                <div class="container  mt-2 mb-5">


                    <div class="row  pt-4">
                        <div class="container col-lg-12">
                            <div class="row" style="opacity: 0.2;font-weight: 600">

                                <li style="list-style-type: none;">

                                    <i class="fas fa-calendar fa-md siteTema" ></i>&nbsp{{ \Carbon\Carbon::parse($yaziPost->created_at)->isoFormat('DD MMMM YYYY') }}
                                </li>
                            </div>
                        </div>
                        <h1 class="text-dark font-weight-bold pt-3"> {{$yaziPost->title}}</h1>
                        <br>


                        {!! $yaziPost->text !!}
                    </div>

                </div>
            </div>

            <div class="container col-lg-4 mt-5 mb-5">
                <div class="position-relative mt-3">
                    <div class="flex-shrink-0">
                        <ul class="d-flex align-items-center justify-content-between p-0" style="list-style-type: none;">
                            <li class="m-0">
                                <img class="rounded-circle border border-light border-5 p-1 bg-light" height="100px" width="100px"
                                     src="{{asset($yazardes->image)}}">
                            </li>
                            <li>
                                <a href="{{route('Author_post',[$yazardes->name,$yazardes->id])}}" class="float-right ">
                                    Tüm Yazıları
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>




                <div class="position-relative mt-3">

                    <b>DİĞER </b> <span>YAZILARI</span>

                    <p class="detay__sidebar-baslik "></p>
                </div>
                <div class="list-group detay__liste mt-3">
                    {{--                    @php--}}

                    {{--                        $nextauthors = DB::table('authors')->where('status', 1)->orderByDesc('id')->limit(10)--}}
                    {{--          ->get();--}}

                    {{--                    @endphp--}}
                    @foreach ($nextauthors_posts as $row )
{{--{{dd($nextauthors_posts)}}--}}
                        <div class="card  text-white">
                            <a href="{{URL::to('/'.str_slug($row->title).'/'.$row->id)}}">

                                <div class="card" >
                                    <div class="row no-gutters">

                                        <div class="col-md-3 text-center text-secondary bg-light d-flex align-items-center">

                                            <div class="d-flex flex-column">
                                                <div class="pl-3 siteTema" style="font-size: 22px"><b>{{ \Carbon\Carbon::parse($row->created_at)->isoFormat('DD') }}</b></div>
                                                <div class="pl-3"> {{ \Carbon\Carbon::parse($yaziPost->created_at)->isoFormat('MMMM') }}</div>



                                          </div>

                                        </div>
                                        <div class="col-md-9">
                                            <div class="card-body">
                                                <p class="card-text">{{ Str::ucFirst($row->title) }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </a>

                        </div>

                        <br>

                    @endforeach
                    <a  href="{{route('Author_post',[$yazardes->name,$yazardes->id])}}" class="float-right ">
                        Tüm Yazıları
                    </a>

                </div>

            </div>

        </div>

        <div class="col-md-12 shadow-lg p-3 mt-3">
            <h3 class="text-dark">Yazar Yorumları</h3>


            @foreach($comments as $comment)
                <hr>
                <span class="text-dark"><i class="fa fa-user pr-1"></i>{{$comment->name}}</span>
                <br>
                <span class="position-relative" id="cevap">{{$comment->details}}</span>
            @endforeach


        </div>
        <div class="col-md-12 shadow-lg  p-3 mt-3 ">

            <p class="text-dark"></p>
            <span class="position-relative" id="cevap"><h5><i
                        class="fa fa-pencil pr-1"></i>Yorum Yaz</h5></span>

            <form id="formum" action="{{route('add.authorscomments',$yaziPost->id)}}" method="post">
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
                    <input type="hidden" name="authors_posts_id" value="{{$yazardes->id}}" id="haber_id">
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








@endsection










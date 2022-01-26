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
                        <li><a target="_blank" href="{{$yazardes->facebook}}"><i
                                    class="fa fa-facebook-square text-primary p-2  border border-light rounded-circle"
                                    style="font-size:25px;"></i>
                            </a>
                        </li>
                        <li><a target="_blank" href="{{$yazardes->twitter}}"><i
                                    class="fa fa-twitter-square text-info p-2  border border-light rounded-circle"
                                    style="font-size:25px;"></i>
                            </a>
                        </li>
                        <li><a target="_blank" href="{{$yazardes->youtube}}"><i
                                    class="fa fa-youtube-square text-danger p-2 fa-color border border-light rounded-circle"
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
                            <div class="row">

                                <li style="list-style-type: none;">
                                   &nbsp Ekleme Tarihi:
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

                        <div class="card  text-white">
                            <a href="{{URL::to('/'.str_slug($row->name).'/'.$row->id)}}">

                                <div class="card" >
                                    <div class="row no-gutters">

                                        <div class="col-md-3 text-center text-secondary bg-light d-flex align-items-center">

                                            <div class="d-flex flex-column">
                                                <div class="pl-3 siteTema" style="font-size: 22px"><b>{{ \Carbon\Carbon::parse($yaziPost->created_at)->isoFormat('DD') }}</b></div>
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
    </div>








@endsection










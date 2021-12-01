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
    <div class="container">
        <div class="row">

            <div class="container col-lg-8">

                <div class="container  mt-2 mb-5">

                    <div class="row shadow-lg p-4">
                        <h1 class="text-dark font-weight-bold pt-3"> {{$yaziPost->title}}</h1>
                        <br>
                        <div class="container col-lg-12">
                            <div class="row">

                                <li style="list-style-type: none;">
                                    <i class="fas fa-calendar fa-lg"
                                       style="color:red"></i>&nbsp{{date('d-m-Y', strtotime($yaziPost->created_at))}}
                                    <i class="fas fa-clock fa-lg"
                                       style="color:red"></i>&nbsp{{date('H:i:s', strtotime($yaziPost->created_at))}}
                                </li>
                            </div>
                        </div>

                        {!! $yaziPost->text !!}
                    </div>

                </div>
            </div>
            @php
                $yazardes=DB::table('authors')->where('id','=',$yaziPost->authors_id)->get();
            @endphp
            <div class="container col-lg-4 mt-5 mb-5">
                @foreach($yazardes as $yazars)
                    <div class="position-relative d-table-cell align-middle">

                        <div class="kapsayici position-relative">
                            <div class="kartlar__effect position-absolute">
                            </div>
                            <img src="/{{$yazars->image}}" onerror="this.onerror=null;this.src='{{asset($webSiteSetting->defaultImage)}}';" class="detay-image"
                                 style="width: 100%;max-height: 250px;object-fit: fill;" alt="">
                        </div>

                        <div class="position-relative  text-light" style="background-color: {{$websetting->siteColorTheme}}">
                            <p class=" detay-text text-center text-light align-middle" style="height: auto;">
                                <b>{{$yazars->name}}</b></p>
                            <div class="row text-center p-2">
                                <div class="col-md-3 p-1">
                                    <a target="_blank" href="{{$yazars->facebook}}"><i
                                            class="fa fa-facebook-square text-light p-2  border border-light rounded-circle"
                                            style="font-size:25px;"></i>
                                        <p class="text-light">Facebook</p></a>
                                </div>
                                <div class="col-md-3 p-1">
                                    <a target="_blank" href="{{$yazars->twitter}}"><i
                                            class="fa fa-twitter-square text-light p-2  border border-light rounded-circle"
                                            style="font-size:25px;"></i>
                                        <p class="text-light">Twitter</p></a>

                                </div>
                                <div class="col-md-3 p-1"><a target="_blank" href="#"><i
                                            class="fa fa-instagram text-light p-2  border border-light rounded-circle"
                                            style="font-size:25px;"></i>
                                        <p class="text-light">İnstagram</p></a>

                                </div>
                                <div class="col-md-3 p-1"><a target="_blank" href="{{$yazars->youtube}}"><i
                                            class="fa fa-youtube-square text-light p-2  border border-light rounded-circle"
                                            style="font-size:25px;"></i>
                                        <p class="text-light">Youtube</p></a>

                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="position-relative mt-3">

                        <b>SIRADAKİ</b> <span>YAZILAR</span>

                        <p class="detay__sidebar-baslik "></p>
                    </div>
                    <div class="list-group detay__liste mt-3">
                        @php
                            $i=0;


                        @endphp
                        @foreach ($nextauthors_posts as $row )
                            @php
                                $i++;
                            @endphp
                            <a href="{{URL::to('/'.str_slug($row->title).'/'.$row->id)}}"

                               class="list-group-item list-group-item-action detay__liste-item ">
                                <i class="detay__liste-rakam d-table-cell align-middle">{{$i}}</i>
                                <span class="d-table-cell">

                                        {{ Str::ucFirst($row->title) }}
                                    </span>
                            </a>
                        @endforeach

                    </div>
                @endforeach
                <div class="position-relative mt-3">

                    <b>DİĞER </b> <span>YAZARLAR</span>

                    <p class="detay__sidebar-baslik "></p>
                </div>
                <div class="list-group detay__liste mt-3">
                    {{--                    @php--}}

                    {{--                        $nextauthors = DB::table('authors')->where('status', 1)->orderByDesc('id')->limit(10)--}}
                    {{--          ->get();--}}

                    {{--                    @endphp--}}
                    @foreach ($OtherAuthors as $row )

                        <div class="card bg-dark text-white">
                            <a href="{{URL::to('/'.str_slug($row->name).'/'.$row->id)}}">

                                <img class="card-img" onerror="this.onerror=null;this.src='{{asset($webSiteSetting->defaultImage)}}';" src="{{asset($row->image)}}" alt="Card image">
                                <div class="card-img-overlay">
                                    <h5 class="card-title"> {{ Str::ucFirst($row->name) }}</h5>
                                </div>
                            </a>

                        </div>

                        <br>

                    @endforeach

                </div>
            </div>

        </div>
    </div>








@endsection










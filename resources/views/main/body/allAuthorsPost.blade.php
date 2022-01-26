{{--@foreach($yaziPost as $yaziPostlar)--}}
@section('title',$yazardes->name)
@section('meta_keywords',$yazardes->name)
@section('meta_description',$yazardes->name)
@section('og:site_name',$seoset->meta_title)
@section('og:title',$yazardes->name)
@section('og:description',$yazardes->name)
@section('og:image',asset($yazardes->image))
@section('og:url',url()->current())
@section('twitter:url',url()->current())
@section('twitter:domain',Request::root())
@section('twitter:site',$seoset->meta_title)
@section('twitter:title',$yazardes->name)

@extends('main.home_master')
{{--@endforeach--}}

@section('content')

    <style>

        .siteTema:hover{
           background-color:  {{$themeSetting[0]->siteColorTheme}};
            color: white;
        }

        .limitle{ overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp:1;}
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
                                    class="fa fa-facebook-square text-secondary p-2  border border-light rounded-circle"
                                    style="font-size:25px;"></i>
                            </a>
                        </li>
                        <li><a target="_blank" href="{{$yazardes->twitter}}"><i
                                    class="fa fa-twitter-square text-secondary p-2  border border-light rounded-circle"
                                    style="font-size:25px;"></i>
                            </a>
                        </li>
                        <li><a target="_blank" href="{{$yazardes->youtube}}"><i
                                    class="fa fa-youtube-square text-secondary p-2  border border-light rounded-circle"
                                    style="font-size:25px;"></i>
                            </a>
                        </li>

                    </ul>


                </div>
            </div>
        </div>
        <div class="row">

            <div class="container col-lg-12">
                    <div class="row  pt-4">
                        @foreach($nextauthors_posts as $posts)
                            <div class="col-lg-4">
                                <div class="card mt-4">
                                    <div class="card-body">
                                        <h5 class="card-title limitle">{{Str::ucFirst($posts->title) }}</h5>
                                        <p class="card-text">{{ \Carbon\Carbon::parse($posts->created_at)->isoFormat('DD MMMM YYYY') }}</p>
                                        <a href="{{URL::to('/'.str_slug($posts->title).'/'.$posts->id)}}" class="btn btn-light float-right siteTema">Devamını Oku...</a>
                                    </div>
                                </div>
                            </div>



                        @endforeach
                </div>

            </div>
        </div>

    </div>
    <div class="d-flex justify-content-center mb-5">
    {{$nextauthors_posts->links('pagination-links')}}
    </div>

@endsection


















@foreach($fixedPage as $detail)
@section('title',$detail->title)
@section('meta_keywords',$detail->keyword)
@section('meta_description',$detail->description)
@extends('main.home_master')

@section('content')
@endforeach
    <div class="container  mt-5 mb-5">
        <h1 class="text-dark font-weight-bold pt-3"> {{$detail->title}}</h1>
        <div class="row shadow-lg p-4">
            @php
            echo $detail->content
            @endphp
        </div>


    </div>

@endsection










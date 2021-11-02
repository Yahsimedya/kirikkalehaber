@section('title',"")

@extends('main.home_master')

@section('content')

    <div class="container  mt-5 mb-5">
        <h1 class="text-dark font-weight-bold pt-3">Tüm Kategoriler</h1>
        <div class="row shadow-lg p-4">
            <div class="container">
                <div class="row">
                    @foreach($allcategories as $detail)

                        <div class="col-sm-3">
                            <div class="container">
                                <div class="container">
                                    <a href="{{ URL::to('/' . str_slug($detail->category_tr) . '/' . $detail->id) }}">
                                        <div class="card">


                                            <div class="card-body" style="text-align: center">
                                                <i class="fa fa-paperclip w-100 text-center pt-3 pb-3 text-secondary"></i>

                                                @if (session()->get('lang') == 'english')
                                                    {{ $detail->category_en }}
                                                @else
                                                    {{ $detail->category_tr }}

                                                @endif
                                            </div>
                                        </div>
                                    </a>


                                </div>
                            </div>
                            <br>
                            <br>
                        </div>

                    @endforeach

                    <div class="col-sm-3">
                        <div class="container">
                            <div class="container">
                                <a href="{{route('yerelhaberler')}}">
                                    <div class="card">


                                        <div class="card-body" style="text-align: center">
                                            <i class="fa fa-paperclip w-100 text-center pt-3 pb-3 text-secondary"></i>

                                            Yerel
                                        </div>
                                    </div>
                                </a>

                            </div>
                        </div>
                        <br>
                        <br>
                    </div>


                </div>

            </div>


        </div>


    </div>

@endsection




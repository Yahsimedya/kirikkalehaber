@php
    use App\Models\Category;
use App\Models\WebsiteSetting;
    $category=Category::limit(11)->get();
    $websetting=WebsiteSetting::first();
    $themeSetting=DB::table('themes')->get();
$themeSetting=DB::table('themes')->get();
if(!empty(Session::get('kurlar'))) {
$vakitler=Session::get('vakitler');
} else {
$vakitler = array(
            "imsak" => '0',
            "gunes" => '0',
            "ogle" => '0',
            "ikindi" => '0',
            "aksam" => '0',
            "yatsi" => '0',
        );
}
if(!empty(Session::get('kurlar'))) {
$kurlar=Session::get('kurlar');
} else{
    $kurlar=[
         'DOLAR' => [
                'oran' => '0',
                'oranyonu' => 0,00,
                'satis' => '0'

            ],
            'EURO' => [
                'oran' => '0',
                'oranyonu' => 0,00,
                'satis' => '0'
            ],
            'ALTIN' => [
                'oran' => '0',
                'oranyonu' => 0,00,
                'satis' => '0'

            ],
            'ceyrekaltin' => [
                'oran' => '0',
                'oranyonu' => 0,00,
                'satis' => '0'
            ]

];
}
$veri=Session::get('havadurumu');
$icon=Session::get('icon');
$gelenil=Session::get('gelenil');
@endphp

<style>


    .dropdown:hover .dropdown-menu {
        display: block;
        margin-top: 0;
    }

    .table-borderless > tbody > tr > td,
    .table-borderless > tbody > tr > th,
    .table-borderless > tfoot > tr > td,
    .table-borderless > tfoot > tr > th,
    .table-borderless > thead > tr > td,
    .table-borderless > thead > tr > th {
        border: none;
    }


    .close{
        position:absolute;
        color:#fff;
        top:20px;
        right:50px;
        font-size:1.7em;
        cursor:pointer;
        display:none;
        z-index:999999;
        -webkit-transform:rotate(0deg);
        transform:rotate(0deg);
        -webkit-transition: all 600ms cubic-bezier(0.68, -0.55, 0.265, 1.55);
        transition:         all 600ms cubic-bezier(0.68, -0.55, 0.265, 1.55);
    }

    .close:hover{
        font-size:2.4em;
        -webkit-transform:rotate(360deg);
        transform:rotate(360deg);
    }
    /*-------------- saerch section -----------*/
    .search{
        position:absolute;
        top:50%;
        left:50%;
        -webkit-transform:translate(-50%, -50%);
        transform:translate(-50%, -50%);
        border-radius:1000px;
        width:0;
        height:0;
        background:#03a9f4;
        -webkit-transition: all .4s linear;
        transition:  all .4s linear;
        z-index: 9999;
    }

    .search i{
        color:#03a9f4;
        font-size:1.7em;
        cursor:pointer;
    }

    .search .input{
        position: absolute;
        top: 57%;
        left: 38%;
        -webkit-transform: translate(-50%, -50%);
        transform: translate(-50%, 11%);
        width: 350px;
        height: 40px;
        background: transparent;
        border: none;
        outline: none;
        border-bottom: 3px solid #eee;
        color: #eee;
        font-size: 1.3em;
        display: none;
    }


    .search.open{
        height:4000px;
        width:4000px;
    }
</style>


@foreach($themeSetting as $navbar)
    @if($navbar->header==0)
        <nav id="navbar_top"
             class="navbar navbar-expand-lg navbar-light bg-white p-0 m-0 shadow-sm border-top border-danger border-top">
            <div class="container">
                <!-- <a class="navbar-brand" href="#">Navbar</a> -->
                {{--        {{dd($websetting)}}--}}
                <a href="{{URL::to('/')}}"> <img width="200" src="{{asset($websetting->logo)}}" alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse bg-white" id="main_nav"
                     style="z-index:999;background-color: white;">
                    <ul class="navbar-nav ml-auto mx-auto" style="background-color: white;">

                        <li class="nav-item"><a class="nav-link" href="{{URL::to('/') }}">Ana Sayfa</a></li>


                        @foreach ($category as $row)
                            @php
                                $subcategory=  \App\Models\Subcategory::where('category_id',$row->id)->get();

                                    $say = count($subcategory);
                            @endphp
                            {{-- <li class="nav-item dropdown">

                                    <a class="nav-link" href="tumu">{{$row->category_tr}}</a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                                      </div>
                                </li> --}}
                            <div class=" dropdown">
                                {{--                        <button --}}
                                {{--                           data-toggle="dropdown" aria-haspopup="true"--}}
                                {{--                           aria-expanded="false">--}}

                                <a style="box-shadow: none;" class="btn @if ($say> 0) dropdown-toggle @endif nav-item"
                                   id="dropdownMenuButton" class=""
                                   href="{{ URL::to('/Category/' . str_slug($row->category_tr) . '/' . $row->id) }}">
                                    @if (session()->get('lang') == 'english')
                                        {{ $row->category_en }}
                                    @else
                                        {{ $row->category_tr }}

                                    @endif
                                </a>

                                {{--                        </button>--}}
                                @if ($say > 0)

                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                                        @foreach ($subcategory as $row)


                                            <a class="dropdown-item" style="box-shadow: none;"
                                               href="{{ URL::to('/Category/' . str_slug($row->subcategory_tr) . '/' . $row->id) }}">
                                                @if (session()->get('lang') == 'english')
                                                    {{ $row->subcategory_en }}
                                                @else
                                                    {{ $row->subcategory_tr }}

                                                @endif

                                            </a>

                                            {{-- <a class="dropdown-item" href="#">Another action</a>
                                      <a class="dropdown-item" href="#">Something else here</a> --}}
                                        @endforeach

                                    </div>
                                @endif

                            </div>
                        @endforeach
                        <a style="box-shadow: none;" class="btn  "
                           id="dropdownMenuButton"
                           href="{{route('TumKategoriler')}}">
                            Tümü
                        </a>
                    </ul>


                    <form class="form-inline mt-1 mt-md-0 position-relative" action="{{route('search')}}" method="POST">
                        @csrf
                        <input class="form-control mr-sm-2 rounded-pill" name="searchtext" type="text"
                               placeholder="Arama Yap"
                               style="width: 150px; ">
                        <button class="btn btn-danger my-2 my-sm-0 rounded-pill position-relative float-right ml-5"
                                style=" background-color:  {{$themeSetting[0]->siteColorTheme}} !important;"
                                type="submit"><i
                                class="fa fa-search"></i>
                        </button>
                    </form>
                </div>

                <ul class="list-group">
                <!--
            @if (session()->get('lang') == 'turkish')
                    <li class="list-group-item"><a href="{{ route('lang.english') }}">İngilizce</a></li>
            @else
                    <li class="list-group-item"><a href="{{ route('lang.turkish') }}">Turkish</a></li>
            @endif
                    </ul>

-->
            </div>

        </nav>

    @elseif($navbar->header==1)
        <section class="border-top border-danger border-3 " style="background-color:white;">
            <div class="container" style="background-color:white;">
                <div class="row">
                    <div class=" col-md-2 col-12 mr-auto my-auto text-center p-2"><a class="justify-content-start" href="{{URL::to('/')}}">
                            <img width="150" src="{{asset($websetting->logo)}}" alt=""></a></div>
                    <div class="col-md-4 d-none d-md-block p-2 ml-auto my-auto">
                        @if($kurlar)
                        <ul class="d-flex flex-wrap list-group-horizontal-sm d-inline-block my-auto  float-right">
                            <li class="deger  list-unstyled mr-2 d-flex align-items-center">
                                @if(number_format($kurlar['DOLAR']['oranyonu'],2)>0)
                                    <i class="fa fa-sort-up align-middle pt-1 pr-1 text-success"></i>
                                @else
                                    <i class="fa fa-sort-down align-middle pt-1 pr-1 text-danger mb-3 "></i>
                                @endif
                                <div class="d-inline-block" style="font-size: 13px; line-height: 14px;"><span
                                        style="font-weight: bold">Dolar</span><br/>
                                    <span
                                        style="font-size: 13px;">{{ number_format($kurlar['DOLAR']['satis'],3) }}</span>
                                </div>
                            </li>
                            <li class="deger  list-unstyled mr-2 d-flex align-items-center">
                                @if(number_format($kurlar['EURO']['oranyonu'],2)>0)
                                    <i class="fa fa-sort-up align-middle pt-1 pr-1 text-success"></i>
                                @else
                                    <i class="fa fa-sort-down align-middle pt-1 pr-1 text-danger mb-3 "></i>
                                @endif
                                <div class="d-inline-block" style="font-size: 13px; line-height: 14px;"><span
                                        style="font-weight: bold">Euro</span><br/>
                                    <span style="font-size: 13px;">{{number_format($kurlar['EURO']['satis'],3) }}</span>
                                </div>
                            </li>
                            <li class="deger  list-unstyled mr-2 d-flex align-items-center">
                                @if(isset($kurlar['ceyrekaltin']['oranyonu'])>0)
                                    <i class="fa fa-sort-up align-middle pt-1 pr-1 text-success"></i>
                                @else
                                    <i class="fa fa-sort-down align-middle pt-1 pr-1 text-danger mb-3 "></i>
                                @endif
                                <div class="d-inline-block" style="font-size: 13px; line-height: 14px;"><span
                                        style="font-weight: bold">Ç.Altın</span><br/>
                                    <span
                                        style="font-size: 13px;">{{ number_format((float)$kurlar['ceyrekaltin']['satis'],3) }}</span>
                                </div>
                            </li>
                            <li class="deger  list-unstyled mr-2 d-flex align-items-center">
                                @if(isset($kurlar['ALTIN']['oranyonu'])>0)
                                    <i class="fa fa-sort-up align-middle pt-1 pr-1 text-success"></i>
                                @else
                                    <i class="fa fa-sort-down align-middle pt-1 pr-1 text-danger mb-3 "></i>
                                @endif
                                <div class="d-inline-block" style="font-size: 13px; line-height: 14px;"><span
                                        style="font-weight: bold">Altın</span><br/>
                                    <span
                                        style="font-size: 13px;">{{ number_format($kurlar['ALTIN']['satis'],3) }}</span>
                                </div>
                            </li>
                        </ul>
                            @endif
                    </div>
                    <div class="col-md-1 col-4 my-auto border-left border-right text-center">
                <span style="color:#31958a; font-size: 13px ">{{$gelenil}}<br>

                {!! $icon !!}
                {{$veri}}&deg;</span>
                    </div>
                    <div class="col-md-2 col-5 my-auto text-success text-center" style="font-size: 13px">
                        @php $now = Carbon\Carbon::now()->format('H:i');
                  $imsak = $vakitler["imsak"];
                                $gunes = $vakitler['gunes'];
                                $ogle = $vakitler['ogle'];
                                $ikindi = $vakitler['ikindi'];
                                $aksam = $vakitler['aksam'];
                                $yatsi = $vakitler['yatsi'];
                        @endphp
                        @if($now < $imsak )
                            @php $startTime = Carbon\Carbon::parse($now);
                    $finishTime = Carbon\Carbon::parse($gunes);
                $totalDuration = $finishTime->diff($startTime)->format('%H:%i');
                            @endphp

                            <div class="kalansure">
                                <span>{{ $totalDuration}}</span>
                                <p> İmsak'a Kalan Süre</p>
                            </div>


                        @elseif($now<$ogle )
                            @php $startTime = Carbon\Carbon::parse($now);
                    $finishTime = Carbon\Carbon::parse($ogle);
                $totalDuration = $finishTime->diff($startTime)->format('%H:%i');
                            @endphp

                            <div class="kalansure">
                                <span>{{ $totalDuration}}</span>
                                <p> Öğleye kalan Süre</p>
                            </div>
                        @elseif($now<$ikindi)
                            @php $startTime = Carbon\Carbon::parse($now);
                    $finishTime = Carbon\Carbon::parse($ikindi);
                $totalDuration = $finishTime->diff($startTime)->format('%H:%i');
                            @endphp
                            {{--                    <span style="    font-size: 16px;font-weight: 700;color: #006726;letter-spacing: .25px;padding: 5px 6px;background: #e6f0e7;display: block;position: relative;">{{ $totalDuration}}</span>--}}
                            <div class="kalansure">
                                <span>{{ $totalDuration}}</span>
                                <p>İkindi'ye Kalan Süre</p>
                            </div>
                        @elseif ($now<$aksam )
                            @php $startTime = Carbon\Carbon::parse($now);
                    $finishTime = Carbon\Carbon::parse($aksam);
                $totalDuration = $finishTime->diff($startTime)->format('%H:%i');
                            @endphp
                            <div class="kalansure">
                                <span>{{ $totalDuration}}</span>
                                <p>Akşam'a Kalan Süre</p>

                            </div>
                        @elseif($now<$yatsi )
                            @php $startTime = Carbon\Carbon::parse($now);
                    $finishTime = Carbon\Carbon::parse($yatsi);
                $totalDuration = $finishTime->diff($startTime)->format('%H:%i');
                            @endphp
                            <div class="kalansure">
                                <span>{{ $totalDuration}}</span>
                                <p>Yatsıy'a Kalan Süre</p>
                            </div>


                        @endif
                    </div>

                    {{--        <div class="col-md-2">--}}
                    {{--        </div>--}}
                    {{--        <div class="col-md-6 my-auto">--}}

                    {{--        </div>--}}
                    {{--        <div class="col-md-2 my-auto">--}}


                    {{--        </div>--}}


                    <div class="col-md-2 col-2">
                        <form class="form-inline mt-1 mt-md-0 position-relative" action="{{route('search')}}"
                              method="POST">
                            @csrf
                            <div class="close">
                                <i class="fa fa-close"></i>
                            </div>
                            <div class="search mt-2">
                                <i class="fa fa-search" style="color: {{$themeSetting[0]->siteColorTheme}}"></i>
                                <input type="text" name="searchtext" class="input mt-5" placeholder="Arama Yap">
                            </div>

                        <!----- close button

                            <form class="form-inline mt-1 mt-md-0 position-relative" action="{{route('search')}}" method="POST">

                        <input class="form-control mr-sm-2 rounded-pill" name="searchtext" type="text" placeholder="Arama Yap"
                               style="width: 150px; ">
                        <button class="btn btn-primary my-2 my-sm-0 rounded-pill position-absolute search"
                                style=" background-color:  {{$themeSetting[0]->siteColorTheme}} !important;" type="submit"><i
                                class="fa fa-search"></i>
                        </button>----->


                        </form>

                    </div>

                </div>
            </div>
        </section>
        <nav id="navbar_top"
             class="navbar navbar-expand-lg navbar-light bg-white p-0 m-0 shadow-sm border-top">


            <div class="container">
                <!-- <a class="navbar-brand" href="#">Navbar</a> -->
                {{--        {{dd($websetting)}}--}}
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse navbar-light" id="main_nav"
                     style="z-index:999;background-color: white;">
                    <ul class="navbar-nav ml-auto mx-auto" style="background-color: white;">

                        <li class="nav-item"><a class="nav-link" href="{{URL::to('/') }}">Ana Sayfa</a></li>


                        @foreach ($category as $row)
                            @php
                                $subcategory= \App\Models\Subcategory::where('category_id',$row->id)->get();

                                    $say = count($subcategory);
                            @endphp
                            {{-- <li class="nav-item dropdown">

                                    <a class="nav-link" href="tumu">{{$row->category_tr}}</a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                                      </div>
                                </li> --}}
                            <div class=" dropdown">
                                {{--                        <button --}}
                                {{--                           data-toggle="dropdown" aria-haspopup="true"--}}
                                {{--                           aria-expanded="false">--}}

                                <a style="box-shadow: none;"
                                   class="btn @if ($say> 0) dropdown-toggle @endif nav-item nav-link"
                                   id="dropdownMenuButton" class=""
                                   href="{{ URL::to('/Category/' . str_slug($row->category_tr) . '/' . $row->id) }}">
                                    @if (session()->get('lang') == 'english')
                                        {{ $row->category_en }}
                                    @else
                                        {{ $row->category_tr }}

                                    @endif
                                </a>

                                {{--                        </button>--}}
                                @if ($say > 0)

                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                                        @foreach ($subcategory as $row)


                                            <a class="dropdown-item" style="box-shadow: none;"
                                               href="{{ URL::to('/Category/' . str_slug($row->subcategory_tr) . '/' . $row->id) }}">
                                                @if (session()->get('lang') == 'english')
                                                    {{ $row->subcategory_en }}
                                                @else
                                                    {{ $row->subcategory_tr }}

                                                @endif

                                            </a>

                                            {{-- <a class="dropdown-item" href="#">Another action</a>
                                      <a class="dropdown-item" href="#">Something else here</a> --}}
                                        @endforeach

                                    </div>
                                @endif

                            </div>
                        @endforeach
                        <a style="box-shadow: none;" class="btn  "
                           id="dropdownMenuButton"
                           href="{{route('TumKategoriler')}}">
                            Tümü
                        </a>
                    </ul>


                </div>

                <ul class="list-group">
                <!--
            @if (session()->get('lang') == 'turkish')
                    <li class="list-group-item"><a href="{{ route('lang.english') }}">İngilizce</a></li>
            @else
                    <li class="list-group-item"><a href="{{ route('lang.turkish') }}">Turkish</a></li>
            @endif
                    </ul>

-->
            </div>

        </nav>


    @endif

@endforeach





<script>
    (function($){
        var search_button = $('.fa-search'),
            close_button  = $('.close'),
            input = $('.input');
        search_button.on('click',function(){
            $(this).parent().addClass('open');
            close_button.fadeIn(500);
            input.fadeIn(500);
        });

        close_button.on('click',function(){
            search_button.parent().removeClass('open');
            close_button.fadeOut(500);
            input.fadeOut(500);
        });
    })(jQuery);
</script>


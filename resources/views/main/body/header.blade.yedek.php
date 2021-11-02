@php
use App\Models\Category;
use App\Models\WebsiteSetting;
$category=Category::limit(5)->get();
$websetting=WebsiteSetting::first();
$themeSetting=DB::table('themes')->get();
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
</style>
<nav id="navbar_top" class="navbar navbar-expand-lg navbar-light bg-white p-0 m-0 shadow-sm border-top border-danger border-top" >
    <div class="container">
        <div class="row">
            <div class="col-md-3"><a href="{{URL::to('/')}}"> <img width="200" src="{{asset($websetting->logo)}}" alt=""></a>
            </div>
            <div class="col-md-9"></div>
        </div>
    </div>
    <div class="container">

        <!-- <a class="navbar-brand" href="#">Navbar</a> -->
        {{--        {{dd($websetting)}}--}}
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav"
                aria-expanded="false" aria-label="Toggle navigation" >
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse bg-light" id="main_nav" style="z-index:999;background-color: white;">
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

                        <a style="box-shadow: none;" class="btn @if ($say> 0) dropdown-toggle @endif nav-item"
                           id="dropdownMenuButton" class=""
                           href="{{ URL::to('/' . str_slug($row->category_tr) . '/' . $row->id) }}">
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
                           href="{{ URL::to('/' . str_slug($row->subcategory_tr) . '/' . $row->id) }}">
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
                <input class="form-control mr-sm-2 rounded-pill" name="searchtext" type="text" placeholder="Arama Yap"
                       style="width: 150px; ">
                <button class="btn btn-primary my-2 my-sm-0 rounded-pill position-absolute search" style=" background-color:  {{$themeSetting[0]->siteColorTheme}} !important;" type="submit"><i
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


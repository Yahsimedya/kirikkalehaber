<nav>
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
        <a style="width: 50%;" class="nav-item nav-link active  text-center p-0 m-0" id="super-lig-tab" data-toggle="tab"
           href="#super-lig" role="tab" aria-controls="super-lig" aria-selected="true"><img
                src="{{asset('image/Spor-Toto-Super-lig.png')}}" class="lazyload img_fluid "></a>
{{--        <a style="width: 50%;" class="nav-item nav-link  text-center  p-0 m-0" id="birinci-lig-tab" data-toggle="tab"--}}
{{--           href="#birinci-lig" role="tab" aria-controls="birinci-lig" aria-selected="false"><img--}}
{{--                src="{{asset('image/TFF1.png')}}" class="lazyload img_fluid  "></a>--}}
        <a style="width: 50%;border:none;" class="nav-item nav-link  text-center  p-0 m-0 d-block my-auto border-none" id="birinci-lig-tab" data-toggle="tab"
           href="#birinci-lig" role="tab" aria-controls="birinci-lig" aria-selected="false"><span class="d-inline-block my-auto"> Fikstür</span></a>
{{--        <a class="nav-item nav-link   text-center  p-0 m-0" id="ikinci-lig-beyaz-tab" data-toggle="tab"--}}
{{--           href="#ikinci-lig-beyaz" role="tab" aria-controls="ikinci-lig-beyaz" aria-selected="true"><img--}}
{{--                src="{{asset('image/TFF21.png')}}" class="lazyload img_fluid futbol-puan"></a>--}}
{{--        <a class="nav-item nav-link  text-center  p-0 m-0" id="ikinci-kirmizi-lig-tab" data-toggle="tab"--}}
{{--           href="#ikinci-kirmizi-lig" role="tab" aria-controls="ikinci-kirmizi-lig"--}}
{{--           aria-selected="false"><img src="{{asset('image/TFF21.png')}}" class="lazyload img_fluid futbol-puan"></a>--}}
{{--        <a class="nav-item nav-link  text-center  p-0 m-0" id="ucuncu-lig-1-tab" data-toggle="tab"--}}
{{--           href="#ucuncu-lig-1" role="tab" aria-controls="ucuncu-lig-1" aria-selected="false"><img--}}
{{--                src="{{asset('image/TFF31.png')}}" class="lazyload img_fluid futbol-puan"></a>--}}
{{--        <a class="nav-item nav-link  text-center  p-0 m-0" id="ucuncu-lig-2-tab" data-toggle="tab"--}}
{{--           href="#ucuncu-lig-2" role="tab" aria-controls="ucuncu-lig-2" aria-selected="false"><img--}}
{{--                src="{{asset('image/TFF32.png')}}" class="lazyload img_fluid futbol-puan"></a>--}}
{{--        <a class="nav-item nav-link  text-center  p-0 m-0" id="ucuncu-lig-3-tab" data-toggle="tab"--}}
{{--           href="#ucuncu-lig-3" role="tab" aria-controls="ucuncu-lig-3" aria-selected="false"><img--}}
{{--                src="{{asset('image/TFF33.png')}}" class="lazyload img_fluid futbol-puan"></a>--}}
{{--        <a class="nav-item nav-link  text-center  p-0 m-0" id="ucuncu-lig-4-tab" data-toggle="tab"--}}
{{--           href="#ucuncu-lig-4" role="tab" aria-controls="ucuncu-lig-4" aria-selected="false"><img--}}
{{--                src="{{asset('image/TFF34.png')}}" class="lazyload img_fluid futbol-puan"></a>--}}

    </div>
</nav>
<div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade show active" id="super-lig" role="tabpanel" aria-labelledby="super-lig-tab">
        <div class="table-responsive">
            <table class="table table-striped table-spor puan_durumu shadow-sm">
                <thead class="table-spor__baslik">
                <tr align="center">
                    <th scope="col">S</th>

                    <th scope="col-2">Takım</th>
                    <!-- <th  scope="col">forma</th> -->
                    <th scope="col">G</th>
                    <th scope="col">B</th>
                    <th scope="col">M</th>
                    <th scope="col">Av</th>
                    <th scope="col">P</th>

                </tr>
                </thead>
                <tbody>
                <!-- SÜPER LİG  BEYAZ GROUP-->
                @include('main.body.lig')
                </tbody>
            </table>
        </div>
    </div>
    <div class="tab-pane fade" id="birinci-lig" role="tabpanel" aria-labelledby="birinci-lig-tab">
        <table class="table table-striped table-spor puan_durumu shadow-sm">
            <thead class="table-spor__baslik">
            <tr align="center">
                <th scope="col">S</th>

                <th scope="col-2">Takım</th>
                <!-- <th  scope="col">forma</th> -->
                <th scope="col">G</th>
                <th scope="col">B</th>
                <th scope="col">M</th>
                <th scope="col">Av</th>
                <th scope="col">P</th>

            </tr>
            </thead>
            <tbody>
            <!-- BİRİNCİ LİG  BEYAZ GROUP-->
{{--            @include('main.body.lig1')--}}

            </tbody>
        </table>
    </div>
    <div class="tab-pane fade" id="ikinci-lig-beyaz" role="tabpanel" aria-labelledby="ikinci-lig-beyaz-tab">
        <table class="table table-striped table-spor puan_durumu shadow-sm">
            <thead class="table-spor__baslik">
            <tr align="center">
                <th scope="col">S</th>

                <th scope="col-2">Takım</th>
                <!-- <th  scope="col">forma</th> -->
                <th scope="col">G</th>
                <th scope="col">B</th>
                <th scope="col">M</th>
                <th scope="col">Av</th>
                <th scope="col">P</th>

            </tr>
            </thead>
            <tbody>
            <!-- İKİNCİ LİG  BEYAZ GROUP-->
{{--            @include('main.body.ligbeyaz')--}}

            </tbody>
        </table>
    </div>
    <div class="tab-pane fade" id="ikinci-kirmizi-lig" role="tabpanel"
         aria-labelledby="ikinci-kirmizi-lig-tab">
        <table class="table table-striped table-spor puan_durumu shadow-sm">
            <thead class="table-spor__baslik">
            <tr align="center">
                <th scope="col">S</th>

                <th scope="col-2">Takım</th>
                <!-- <th  scope="col">forma</th> -->
                <th scope="col">G</th>
                <th scope="col">B</th>
                <th scope="col">M</th>
                <th scope="col">Av</th>
                <th scope="col">P</th>

            </tr>
            </thead>
            <tbody>
            <!-- İKİNCİ LİG  KIRMIZI GROUP-->
{{--            @include('main.body.ligkirmizi')--}}

            </tbody>
        </table>
    </div>
    <div class="tab-pane fade" id="ucuncu-lig-1" role="tabpanel" aria-labelledby="ucuncu-lig-1-tab">
        <table class="table table-striped table-spor puan_durumu shadow-sm">
            <thead class="table-spor__baslik">
            <tr align="center">
                <th scope="col">S</th>

                <th scope="col-2">Takım</th>
                <!-- <th  scope="col">forma</th> -->
                <th scope="col">G</th>
                <th scope="col">B</th>
                <th scope="col">M</th>
                <th scope="col">Av</th>
                <th scope="col">P</th>

            </tr>
            </thead>
            <tbody>
            <!-- ÜÇÜNCÜ LİG  1. GROUP-->
            </tbody>
        </table>
    </div>
    <div class="tab-pane fade" id="ucuncu-lig-2" role="tabpanel" aria-labelledby="ucuncu-lig-2-tab">
        <table class="table table-striped table-spor puan_durumu shadow-sm">
            <thead class="table-spor__baslik">
            <tr align="center">
                <th scope="col">S</th>

                <th scope="col-2">Takım</th>
                <!-- <th  scope="col">forma</th> -->
                <th scope="col">G</th>
                <th scope="col">B</th>
                <th scope="col">M</th>
                <th scope="col">Av</th>
                <th scope="col">P</th>

            </tr>
            </thead>
            <tbody>
            <!-- ÜÇÜNCÜ LİG  2. GROUP-->
            </tbody>
        </table>
    </div>
    <div class="tab-pane fade" id="ucuncu-lig-3" role="tabpanel" aria-labelledby="ucuncu-lig-3-tab">
        <table class="table table-striped table-spor puan_durumu shadow-sm">
            <thead class="table-spor__baslik">
            <tr align="center">
                <th scope="col">S</th>

                <th scope="col-2">Takım</th>
                <!-- <th  scope="col">forma</th> -->
                <th scope="col">G</th>
                <th scope="col">B</th>
                <th scope="col">M</th>
                <th scope="col">Av</th>
                <th scope="col">P</th>

            </tr>
            </thead>
            <tbody>
            <!-- ÜÇÜNCÜ LİG  3. GROUP-->
            </tbody>
        </table>
    </div>
    <div class="tab-pane fade" id="ucuncu-lig-4" role="tabpanel" aria-labelledby="ucuncu-lig-4-tab">
        <table class="table table-striped table-spor puan_durumu shadow-sm">
            <thead class="table-spor__baslik">
            <tr align="center">
                <th scope="col">S</th>

                <th scope="col-2">Takım</th>
                <!-- <th  scope="col">forma</th> -->
                <th scope="col">G</th>
                <th scope="col">B</th>
                <th scope="col">M</th>
                <th scope="col">Av</th>
                <th scope="col">P</th>

            </tr>
            </thead>
            <tbody>

            <!-- ÜÇÜNCÜ LİG  4. GROUP-->
            </tbody>
        </table>
    </div>
</div>

</div>

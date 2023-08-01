@php
    
    use App\Models\WebsiteSetting;
    use App\Models\Theme;
    
    $websetting = WebsiteSetting::first();
    
    $fixedPages = DB::table('fixedpage')
        ->where('status', '=', 1)
        ->limit(5)
        ->latest('id')
        ->get();
    $themeSetting = Theme::get();
@endphp

<div class="text-light footer">
    <div class="container">

        <!-- Grid row-->
        <div class="row py-4 d-flex align-items-center">

            <!-- Grid column -->
            <div class="col-md-6 col-lg-5 text-center text-md-left mb-4 mb-md-0">
                <h6 class="mb-0">Bizimle sosyal ağlar üzerinden iletişimde kalın!</h6>
            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-6 col-lg-7 text-center text-md-right">

                <!-- Facebook -->
                <a class="fb-ic" rel="noreferrer" href="" target="_blank">
                    <i class="fab fa-facebook-f text-white mr-4"> </i>
                </a>
                <!-- Twitter -->
                <a class="tw-ic" rel="noreferrer" href="" target="_blank">
                    <i class="fab fa-twitter text-white mr-4"> </i>
                </a>
                <!-- Google +-->
                <a class="gplus-ic" rel="noreferrer" href="" target="_blank">
                    <i class="fab fa-youtube text-white mr-4"> </i>
                </a>

                <!--Instagram-->
                <a class="ins-ic" rel="noreferrer" href="" target="_blank">
                    <i class="fab fa-instagram text-white"> </i>
                </a>

            </div>
            <!-- Grid column -->

        </div>
        <!-- Grid row-->

    </div>
</div>
<!-- Footer Links -->
<div class="container text-center text-md-left mt-5">

    <!-- Grid row -->
    <div class="row mt-3 dark-grey-text">

        <!-- Grid column -->
        <div class="col-md-4 col-lg-4 col-xl-4 mb-4">

            <!-- Content -->
            <h6 class="text-uppercase font-weight-bold">Hakkımızda</h6>
            <hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
            <p>
                {{ $websetting->about }}
            </p>

        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">

            <!-- Links -->
            <h6 class="text-uppercase font-weight-bold">Sayfalar</h6>
            <hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
            @foreach ($fixedPages as $pages)
                <p>
                    <a class="dark-grey-text" href="{{ route('Open.fixedPage', $pages->id) }}">{{ $pages->title }}</a>
                </p>
            @endforeach
            <!-- <p>
          <a class="dark-grey-text" href="#!">MDWordPress</a>
        </p>
        <p>
          <a class="dark-grey-text" href="#!">BrandFlow</a>
        </p>
        <p>
          <a class="dark-grey-text" href="#!">Bootstrap Angular</a>
        </p> -->

        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        @if ($themeSetting[0]->apps == 1 || $themeSetting[0]->subscription == 1)
            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">

                @if ($themeSetting[0]->apps == 1)
                    <!-- Links -->
                    <h6 class="text-uppercase font-weight-bold">Uygulamamız</h6>
                    <hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                    <p>
                        <a class="dark-grey-text"
                            href="https://apps.apple.com/us/developer/yah%C5%9Fi-medya/id1495158559?l=tr"><img
                                class="img-fluid lazyload" style="max-width: 150px"
                                data-src="{{ asset('image/apple.png') }}"></a>
                    </p>
                    <p>
                        <a class="dark-grey-text"
                            href="https://play.google.com/store/apps/developer?id=Yah%C5%9Fi+Medya&hl=tr&gl=US"><img
                                class="img-fluid lazyload" style="max-width: 150px"
                                data-src="{{ asset('image/play.png') }}"></a>
                    </p>
                    <p>
                        <a class="dark-grey-text" href="https://appgallery.huawei.com/app/C104177315"><img
                                class="img-fluid lazyload" style="max-width: 150px"
                                data-src="{{ asset('image/huawei.png') }}"></a>
                    </p>
                @endif
                @if ($themeSetting[0]->subscription == 1)
                    <h6 class="text-uppercase font-weight-bold">Üyeliklerimiz</h6>
                    <hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                    {{-- <p>
                        <a href="https://www.sanalbasin.com/?ref=32626"
                            id="hash-963df865d91ae3bf30841066f06b8ab52f323508" title="Bu site sanalbasin.com üyesidir"
                            target="_blank"><img class="img-fluid lazyload"
                                data-src="{{ asset('
                                image/sanalbasin_üyesidir.png') }}" style="width: 120px"
                                alt="sanalbasin.com üyesidir" /></a>
                    </p> --}}
                    {{-- <p>
            <a href="https://www.aa.com.tr/tr" id="hash-963df865d91ae3bf30841066f06b8ab52f323508"
               title="Bu site Anadolu Ajans üyesidir" target="_blank"><img class
"lazyload"
                    src="{{asset('image/aaajans.png')}}" style="width: 120px"
                    alt="Anadolu Ajans üyesidir"/></a>
            </p> --}}
                    <p>
                        <a href="https://www.aa.com.tr/tr" id="hash-963df865d91ae3bf30841066f06b8ab52f323508"
                            title="Bu site İha üyesidir" target="_blank"><img class="img-fluid lazyload"
                                data-src="{{ asset('image/iha.png') }}" style="width: 120px" alt="İha üyesidir" /></a>
                    </p>
                @endif
            </div>
        @endif
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">

            <!-- Links -->
            <h6 class="text-uppercase font-weight-bold">İletişim</h6>
            <hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
            <p>
                <i class="fas fa-home mr-3">

                </i>
                {{ $websetting->adress }}
            </p>
            <p>
                <i class="fas fa-envelope mr-3">


                </i>
                {{ $websetting->email }}
            </p>
            <p>
                <i class="fas fa-phone mr-3">


                </i> {{ $websetting->phone }}
            </p>
            <p>
                <i class="fas fa-print mr-3">


                </i>
                {{ $websetting->phone }}
            </p>

        </div>
        <!-- Grid column -->

    </div>
    <!-- Grid row -->

</div>
<!-- Footer Links -->

<!-- Copyright -->
<div class="footer-copyright text-center text-black-50 py-3 ">
    <a class="dark-grey-text " rel="noopener" target="_blank" href="https://yahsimedya.com/">© 2020 Copyright: &nbsp<img
            width="80" class="img-fluid lazyload yahsilogo"
            src="https://yahsimedya.com/yonetim/dimg/settings/yahsi-logo.png"></a>
</div>
<!-- Copyright -->

</footer>

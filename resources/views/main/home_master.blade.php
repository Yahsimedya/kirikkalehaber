<!DOCTYPE html>
<html lang="tr">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <meta name="csrf-token" content="{{csrf_token()}}"><!-- Otmatik alt kategori seçmek için ekledik-->
    <title>@yield('title')</title>
    <meta name="keywords" content="@yield('meta_keywords')">
    <meta name="description" content="@yield('meta_description')">
    <link rel="canonical" href="{{url()->current()}}"/>
    <meta name="google-site-verification" content="@yield('google_verification')"/>
    <script async src="https://www.googletagmanager.com/gtag/js?id=@yield('google_verification')"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', '@yield('google_verification')');
    </script>
    <link rel="alternate" type="application/atom+xml" title="News" href="/feed">


    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" integrity="undefined" crossorigin="anonymous">    <link rel="preload" href="{{asset('frontend/assets/css/custom-red.css')}}" as="style" onload="this.rel='stylesheet'"
    onerror="this.href='stylesheet'"> --}}
    <link rel="preload" href="{{mix('frontend/assets/css/combine.css')}}" as="style" onload="this.rel='stylesheet'" onerror="this.href='stylesheet'">

{{--    <link rel="stylesheet" href="{{asset('frontend/assets/css/weather-icons.css')}}">--}}

    {{-- <link rel="stylesheet" href="{{asset('frontend/assets/css/owl.transitions.css')}}"> --}}
<!-- magnific popup styles -->
{{--    <link rel="stylesheet" href="{{asset('frontend/assets/css/magnific-popup.css')}}">--}}
{{--    <link rel="stylesheet" href="{{asset('frontend/assets/css/svg-turkiye-haritasi.css')}}">--}}
    <!-- Türkiye Haritası css -->

    {{-- <link rel="stylesheet" href="css/style.comp.css"> --}}
    <script rel="preload" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <!-- FONT AWESOME-->
    <link rel="preload" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" as="style"
          onload="this.rel='stylesheet'" onerror="this.href='stylesheet' " defer>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" defer>
    <link rel="preload" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" as="style"
          onload="this.rel='stylesheet'" onerror="this.href='stylesheet' ">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- FONT AWESOME-->
    <!-- POPPİNS FONT-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap"
          rel="stylesheet">
    <!-- POPPİNS FONT-->
    <link rel="preload" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" as="style"
          onload="this.rel='stylesheet'" onerror="this.href='stylesheet' " defer>

    <link rel="preload" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" as="style"
          onload="this.rel='stylesheet'" onerror="this.href='stylesheet' ">
    <!-- Add the slick-theme.css if you want default styling -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick.css"/>
    <!-- Add the slick-theme.css if you want default styling -->
    <link rel="stylesheet" type="text/css"
          href="https://cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick-theme.css"/>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css"/>

    <!-- <link rel="stylesheet" href="https://unpkg.com/swiper/css/swiper.css"> -->
    <!-- <script src="js/jqu.js" async></script> -->
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
{{--<script type="module" src="{{asset('frontend/assets/js/lazysizes.min.js')}}" async=""></script>--}}
    <script rel="preload" src="{{mix('frontend/assets/js/combine.js')}}"></script>

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick.min.js"
            async></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
{{--    <script type="text/javascript" src="{{asset('frontend/assets/js/marquee.js')}}"></script>--}}
{{--    <script type="text/javascript" src="{{asset('frontend/assets/js/svg-turkiye-haritasi.js')}}"></script>--}}




    @include('main.body.header')
</head>

<body>
@yield('content')
@include('main.body.footer')
<script>
    $(function () {
        $(".select-tags").select2({
            placeholder: "Enter tags",
            tags: true,
            tokenSeparators: [',']
        });
    });
</script>
<script>
    svgturkiyeharitasi();

</script>

<script>
    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 4,
        spaceBetween: 10,
        slidesPerGroup: 3,
        loop: false,
        loopFillGroupWithBlank: true,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        breakpoints: {
            320: {
                slidesPerView: 2,
                spaceBetween: 10
            },
            // when window width is >= 480px
            480: {
                slidesPerView: 3,
                spaceBetween: 10
            },
            // when window width is >= 640px
            640: {
                slidesPerView: 4,
                spaceBetween: 10
            },

        }
    });
</script>
<script>

    // var swiper = new Swiper('.swiper-container', {
    //   slidesPerView: 1,
    //   spaceBetween: 10,
    //   // init: false,
    //   pagination: {
    //     el: '.swiper-pagination',
    //     clickable: true,
    //   },
    //   breakpoints: {
    //     640: {
    //       slidesPerView: 2,
    //       spaceBetween: 20,
    //     },
    //     768: {
    //       slidesPerView: 4,
    //       spaceBetween: 40,
    //     },
    //     1024: {
    //       slidesPerView: 3,
    //       spaceBetween: 50,
    //     },
    //   }
    // });
    var swiper = new Swiper('.spor,.siyaset,.ekonomi', {
        // Default parameters
        slidesPerView: 4,
        spaceBetween: 10,
        // centeredSlides: true,

        // loop: true,
        // Responsive breakpoints
        navigation: {
            nextEl: '.white-next',
            prevEl: '.white-prev',

        },
        pagination: {
            el: '.swiper-pagination',

        },
        debugger: true,
        scrollbar: {
            el: '.swiper-scrollbar',
        },
        breakpoints: {
            // when window width is >= 320px
            320: {
                slidesPerView: 1,
                spaceBetween: 20
            },
            // when window width is >= 480px
            480: {
                slidesPerView: 1,
                spaceBetween: 20
            },
            // when window width is >= 640px
            640: {
                slidesPerView: 1,
                spaceBetween: 20
            },
            960: {
                slidesPerView: 4,
                spaceBetween: 20
            }
        }
    });
</script>

<script>
    var swiper = new Swiper('.sag-slider', {
        pagination: {
            el: '.sag-pagination',
            clickable: true,
            renderBullet: function (index, className) {
                return '<span class="' + className + '">' + (index + 1) + '</span>';
            },
        },
    });
</script>
<script type="text/javascript">
    var foto = new Swiper('.slider1', {
        // Default parameters
        slidesPerView: 1,
        spaceBetween: 30,
        // Responsive breakpoints
        navigation: {
            nextEl: '.next-1',
            prevEl: '.prev-1',

        },
        pagination: {
            el: '.pagination-1',

        },
        debugger: true,
        //  scrollbar: {
        //             el: '.swiper-scrollbar',
        //           },
        breakpoints: {
            // when window width is >= 320px
            320: {
                slidesPerView: 1,
                spaceBetween: 20
            },
            // when window width is >= 480px
            480: {
                slidesPerView: 1,
                spaceBetween: 30
            },
            // when window width is >= 640px
            640: {
                slidesPerView: 1,
                spaceBetween: 40
            }
        }
    });

    var video = new Swiper('.slider2', {
        // Default parameters
        slidesPerView: 1,
        spaceBetween: 30,
        // Responsive breakpoints
        navigation: {
            nextEl: '.next-2',
            prevEl: '.prev-2',

        },
        pagination: {
            el: '.pagination-2',

        },
        //    debugger: true,
        //  scrollbar: {
        //             el: '.swiper-scrollbar',
        //           },
        breakpoints: {
            // when window width is >= 320px
            320: {
                slidesPerView: 1,
                spaceBetween: 20
            },
            // when window width is >= 480px
            480: {
                slidesPerView: 1,
                spaceBetween: 30
            },
            // when window width is >= 640px
            640: {
                slidesPerView: 1,
                spaceBetween: 40
            }
        }
    });
</script>
<script>
    // window.Swiper = require('swiper');

    var swiper = new Swiper('.surmanset-slider', {
        direction: 'vertical',
        slidesPerView: 1,
        spaceBetween: 30,
        autoHeight: true, //enable auto height
        height: window.innerHeight,
        grabCursor: true,
        pagination: {
            el: '.surmanset',
            clickable: true,

            renderBullet: function (index, className) {
                return '<span class="' + className + '">' + (index + 1) + '</span>';
            },
        },
    });
    // Hover pagination geçişi
    $('.surmanset>.swiper-pagination-bullet').hover(function () {
        $(this).trigger("click");
    });
</script>
<!-- <script>
   var swiper = new Swiper(".surmanset-slider", {});
 </script> -->
<script>

    $(document).ready(function () {
        $(".reklam").show();
        $(".reklam1").hide();


        $("#kapat").click(function () {
            $(".reklam").hide();
            $("#kapat").hide();

            $(".reklam1").show();

            // $(this).html($(this).html() == 'Reklamı Kapat' ? 'Reklamı Aç' : 'Reklamı Kapat');

            return false;

        });

        $("#ac").click(function () {
            $(".reklam1").hide();
            $("#kapat").show();

            $(".reklam").show();


            return false;

        });

    });


</script>
<script>
    document.addEventListener("DOMContentLoaded", function (e) {
        //     $(window).on("load resize", function() {
        if ($(window).width() > 767) {

            new Swiper(".kategori-slider", {

                lazy: !0,
                autoHeight: !0,
                nested: !0,

                navigation: {
                    nextEl: ".manset-next",
                    prevEl: ".manset-prev"
                },
                pagination: {
                    el: ".swiper-pagination,.anamanset-pagination",
                    clickable: !0,
                    renderBullet: function (e, n) {
                        return '<span class="' + n + '">' + (e + 1) + "</span>";
                    },
                },
                observer: true,
                observeParents: true,
                watchSlidesVisibility: true,
                watchSlidesProgress: true,
            });
            $(".swiper-pagination,.anamanset-pagination>.swiper-pagination-bullet").hover(function () {
                $(this).trigger("click");
            });
        } else
            new Swiper(".kategori-slider", {
                nested: !0,
                lazy: !0,
                autoHeight: !0,
                navigation: {
                    nextEl: ".manset-next",
                    prevEl: ".manset-prev"
                },
                onImagesReady: function (e) {
                    resizeSwiper(), e.onResize();
                },
                pagination: {
                    el: ".swiper-pagination,.anamanset-pagination ",
                    clickable: !0
                },
            });
        // });
        new Swiper(".kategori-slider", {
            onSlideChangeStart: function (e) {
                setSwiperHeight();
            },
        });
        $(".swiper-pagination,.anamanset-pagination>.swiper-pagination-bullet").hover(function () {
            $(this).trigger("click");
        });
    });
</script>
<script>
    $(function () {
        $(document).ready(function () {

            $('.simple-marquee-container').SimpleMarquee();

        });
    });
</script>
<script>
    var swiper = new Swiper('.detay-slider', {
        lazy: true,
        pagination: {
            el: '.detay-pagination',
            clickable: true,
            renderBullet: function (index, className) {
                return '<span class="' + className + '">' + (index + 1) + '</span>';
            },
        },

    });
    $('.detay-pagination>.swiper-pagination-bullet').hover(function () {
        $(this).trigger("click");
    });
</script>

</body>

</html>
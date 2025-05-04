@extends("main.home_master")
@section("title", $post->title_tr)
@section("meta_keywords", $post->keywords_tr)
@section("meta_description", $post->description_tr)
@section("google_analytics", $seoset->google_analytics)
@section("og:site_name", $seoset->meta_title)
@section("og:title", $post->title_tr)
@section("og:description", $post->title_tr)
@section("og:image", asset($post->image))
@section("og:url", url()->current())
@section("twitter:url", url()->current())
@section("twitter:domain", Request::root())
@section("twitter:site", $seoset->meta_title)
@section("twitter:title", $post->title_tr)

@section("content")
    {{--    <script> --}}
    {{--        $(document).on('click','#saveLikeDislike', function () { --}}
    {{--            var _post=$(this).data('post'); --}}
    {{--            var _type=$(this).data('type'); --}}
    {{--            var vm=$(this); --}}

    {{--            //RUN AJAC --}}
    {{--            $.ajax({ --}}
    {{--                url:"{{route('like')}}", --}}
    {{--                type:"post", --}}
    {{--                dataType:'json', --}}
    {{--                data: { --}}
    {{--                    post: _post, --}}
    {{--                    type:_type, --}}
    {{--                    _token:"{{csrf_token()}}" --}}
    {{--                }, --}}
    {{--                beforeSend:function (){ --}}
    {{--                    vm.addClass('disabled'); --}}
    {{--                }, --}}
    {{--                success:function (res) { --}}
    {{--                    // alert(res); --}}
    {{--                    if(res.bool==true) { --}}
    {{--                        vm.removeClass('disabled').addClass('active'); --}}
    {{--                        vm.removeAttr('id'); --}}
    {{--                        var _prevCount=$("."+_type+"-count").text(); --}}
    {{--                        _prevCount++; --}}
    {{--                        $("."+_type+"-count").text(_prevCount); --}}
    {{--                    } --}}
    {{--                } --}}
    {{--            }); --}}
    {{--        }); --}}
    {{--    </script> --}}
    <?php
    $themeSetting = DB::table("themes")->get();
    ?>
    {{-- <style>
        .detay-pagination > .swiper-pagination-bullet-active {
            background-color: {{$themeSetting[0]->siteColorTheme}} !important;
        }

        .detay__liste-rakam {
            color: {{$themeSetting[0]->siteColorTheme}} !important;
        }
    </style> --}}
    {{--     @php --}}
    {{--    dd($ads); --}}
    {{-- @endphp --}}

@endsection

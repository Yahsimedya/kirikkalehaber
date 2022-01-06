@extends('admin.admin_master')
@php
    use CyrildeWit\EloquentViewable\Support\Period;

@endphp
@section('admin')
    <!-- Main content -->

    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Anasayfa</span></h4>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>

            <div class="header-elements d-none">

            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{route('dashboard')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>
                        Anasayfa</a>

                </div>

                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>

            <div class="header-elements d-none">
                <div class="breadcrumb justify-content-center">


                    <div class="breadcrumb-elements-item dropdown p-0">
                        <a href="#" class="breadcrumb-elements-item dropdown-toggle" data-toggle="dropdown">
                            <i class="icon-gear mr-2"></i>
                            Ayarlar
                        </a>


                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="{{route('social.setting')}}" class="dropdown-item"><i class="icon-user-lock"></i>
                                Sosyal Medya Ayarları</a>
                            <a href="{{route('seo.setting')}}" class="dropdown-item"><i class="icon-statistics"></i> SEO
                                Ayarları</a>
                            <a href="{{route('website.setting')}}" class="dropdown-item"><i
                                    class="icon-accessibility"></i> Genel Ayarlar</a>
                            <div class="dropdown-divider"></div>
                            <a href="{{route('theme.index')}}" class="dropdown-item"><i class="icon-gear"></i> Tema
                                Ayarları</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page header -->


    <!-- Content area -->
    <div class="content">

        <div class="row">
            <div class="col-md-4">
                <div class="card bg-info text-white">
                    <div class="card-header">
                        <h6 class="card-title">Tekil Görüntüleme</h6>
                    </div>

                    <div class="card-body">
                        Son 24 saatte içeriğinizi görüntüleyen kişi sayısı <code>{{$analyticsData['totalsForAllResults']['ga:sessions']}}</code>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-info text-white">
                    <div class="card-header">
                        <h6 class="card-title">Çoğul Haber Görüntüleme</h6>
                    </div>

                    <div class="card-body">
                        Son 24 saatte haber içeriği çoğul görüntüleme <code>{{$analyticsData['totalsForAllResults']['ga:pageviews']}}
                        </code>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-info text-white">
                    <div class="card-header">
                        <h6 class="card-title">Son 30 Günlük Erişim</h6>
                    </div>

                    <div class="card-body">
                        Tekil Oturum <code>{{number_format($analyticsDataMonth['totalsForAllResults']['ga:users'])}}</code> Sayfa Görüntüleme <code>{{number_format($analyticsDataMonth['totalsForAllResults']['ga:pageviews'])}}</code>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">

                <!-- Members online -->
                <a href="{{route('all.post')}}">
                    <div class="card bg-teal-400">
                        <div class="card-body">
                            <div class="d-flex">
                                <h3 class="font-weight-semibold mb-0">ddd</h3>
                                <span class="badge bg-teal-800 badge-pill align-self-center ml-auto"></span>
                            </div>

                            <div>
                                Haber Sayısı
                                <div class="font-size-sm opacity-75"></div>
                            </div>
                        </div>

                        <div class="container-fluid">
                            <div id="members-online"></div>
                        </div>
                    </div>
                    <!-- /members online -->
                </a>
            </div>


            <div class="col-lg-4">
                <a href="{{route('comments.index')}}">
                    <!-- Current server load -->
                    <div class="card bg-pink-400">
                        <div class="card-body">
                            <div class="d-flex">
                                <h3 class="font-weight-semibold mb-0">eee</h3>
                                <div class="list-icons ml-auto">

                                </div>
                            </div>

                            <div>
                                Toplam yorum sayısı
                                <div class="font-size-sm opacity-75"></div>
                            </div>
                        </div>

                        <div id="server-load"></div>
                    </div>
                    <!-- /current server load -->
                </a>
            </div>

            <div class="col-lg-4">
                <a href="{{route('list.authorsposts')}}">
                    <!-- Today's revenue -->
                    <div class="card bg-blue-400">
                        <div class="card-body">
                            <div class="d-flex">
                                <h3 class="font-weight-semibold mb-0 text-white">{{$authors_postsCount}}</h3>
                                {{--                                {{$count}}--}}
                                {{--                                {{$peryot}}--}}

                                {{--                                @foreach($posts as $post)--}}
                                {{--                                {{$post->count}}--}}
                                {{--                                @endforeach--}}
                            </div>

                            <div>
                                Köşe yazıları
                                <div class="font-size-sm opacity-75"></div>
                            </div>
                        </div>

                        <div id="today-revenue"></div>
                    </div>
                    <!-- /today's revenue -->
                </a>
            </div>
        </div>

        <!-- Dashboard content -->

        <div class="row">

            {{--            <div class="col-md-4">--}}
            <div class="card">

                <table class="table table-togglable footable footable-7 breakpoint-xlg"
                       data-breakpoints="{ &quot;xs&quot;: 580, &quot;sm&quot;: 868, &quot;md&quot;: 1092, &quot;lg&quot;: 1300, &quot;xlg&quot;: 1500 }"
                       style="">
                    <thead>
                    <tr class="footable-header">
                        <th class="footable-first-visible" style="display: table-cell;">#</th>
                        <th data-breakpoints="xs sm md" style="display: table-cell;">Başlık</th>
                        <th data-breakpoints="xs sm md" style="display: table-cell;">Tekil</th>


                    </tr>
                    </thead>
                    <tbody>
                    {{--                    @foreach($sayi as $haber)--}}

                    {{--                    @endforeach--}}
                    @php($i=0)
                    @foreach($endNews as  $row)
                        @php($i++)
                        <tr>
                            <td class="footable-first-visible" style="display: table-cell;">{{$loop->iteration}}</td>
                            <td><a href="{{URL::to($row['url'])}}">{{$row['pageTitle'] }}</a> </td>
{{--                            <td style="display: table-cell;"><a href="#"> <img src="{{asset($row->image)}}" width="80"--}}
{{--                                                                               height="50" alt=""></a></td>--}}
{{--                            <td style="display: table-cell;">{{Str::limit($row->title_tr,45)}}</td>--}}
                            {{--                            @php($i=0)--}}
                            {{--                                {{ $loop->index }}--}}
                            <td style="display: table-cell;"><span
                                    class="badge badge-success">{{$row['pageViews'] }}</span>
                            </td>
{{--                            <td style="display: table-cell;"><span--}}
{{--                                    class="badge badge-success">ggg</span>--}}
{{--                            </td>--}}

{{--                            <td style="display: table-cell;">{{$row->category->category_tr}}</td>--}}

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            {{--        </div>--}}
            <div class="col-xl-4">


                <div class="card">


                    <div class="table-responsive">
                        <table class="table text-nowrap">
                            <thead>
                            <tr>

                                <th style="width: 300px;">Yazar</th>
                                <th>Yazı</th>
                                <th>Tekil</th>
                                <th>Çoğul</th>
                                <th class="text-center" style="width: 20px;"><i class="icon-arrow-down12"></i></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="table-active table-border-double">
                                <td colspan="3">Son Eklenen Yazılar</td>

                            </tr>

                            @foreach($endAuthors_posts as $row)
                                <tr>

                                    <td>
                                        <div class="d-flex align-items-center" style="width:100px; height:50px">
                                            <div class="mr-3">

                                            </div>
                                            <div>
                                                <div
                                                    class="font-weight-semibold text-center">{{Str::limit($row->name,80)}}

                                                </div>
                                            </div>
                                    </td>
                                    <td>
                                        <a href="#" class="text-default">
                                            <div class="font-weight-semibold">{{Str::limit($row->title,80)}}

                                            </div>
                                        </a>
                                    </td>
                                    <td style="display: table-cell;"><span
                                            class="badge badge-success">hhh</span>
                                    </td>
                                    <td style="display: table-cell;"><span
                                            class="badge badge-success">iii</span>
                                    </td>
                                    <td class="text-center"><a href="{{route('edit.koseyazilari',$row->id)}}"
                                                               class="dropdown-item"><i
                                                class="icon-pencil6 text-success"></i></a>

                                    </td>
                                </tr>

                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-xl-4">


                <div class="card">


                    <div class="table-responsive">
                        <table class="table text-nowrap">
                            <thead>
                            <tr>

                                <th style="width: 300px;">Haber Foto</th>
                                <th>Haber Başlık</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="table-active table-border-double">
                                <td colspan="3">Son Yorumlar</td>

                            </tr>

                            @foreach($endComments as $row)
                                <tr>

                                    <td>
                                        <div class="d-flex align-items-center" style="width:100px; height:50px">
                                            <div class="mr-3">

                                            </div>
                                            <div>
                                                <div class="font-weight-semibold">{{Str::limit($row->name,80)}}


                                                </div>
                                            </div>
                                    </td>
                                    <td>
                                        <a href="#" class="text-default">
                                            <div class="font-weight-semibold">{{Str::limit($row->details,80)}}

                                            </div>
                                        </a>
                                    </td>
                                    <td class="text-center"><a href="{{route('open.comments',$row->posts_id)}}"
                                                               class="dropdown-item"><i
                                                class="icon-pencil6 text-success"></i></a>

                                    </td>
                                </tr>

                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>
    </div>

    </div>
    <!-- /support tickets -->


    </div>


    </div>
    <!-- /dashboard content -->

    </div>
    <!-- /content area -->




    <!-- /main content -->
@endsection

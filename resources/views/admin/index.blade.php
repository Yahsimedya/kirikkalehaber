@extends('admin.admin_master')

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

            <div class="col-lg-4">

                <!-- Members online -->
                <a href="{{route('all.post')}}">
                    <div class="card bg-teal-400">
                        <div class="card-body">
                            <div class="d-flex">
                                <h3 class="font-weight-semibold mb-0">{{$newsCount}}</h3>
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
                                <h3 class="font-weight-semibold mb-0">{{$commentsCount}}</h3>
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
            <div class="col-xl-12">



                <!-- Support tickets -->
                <div class="card">


                    <div class="table-responsive">
                        <table class="table text-nowrap">
                            <thead>
                            <tr>
                                <th style="width: 50px">Haber ID</th>
                                <th style="width: 300px;">Haber Foto</th>
                                <th>Haber Başlık</th>
                                <th class="text-center" style="width: 20px;"><i class="icon-arrow-down12"></i></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="table-active table-border-double">
                                <td colspan="3">Son Eklenen Haberler</td>
                                <td class="text-right">
                                    <span class="badge bg-blue badge-pill"><i class="icon-menu7"></i></span>
                                </td>
                            </tr>
@foreach($endNews as $row)
                            <tr>
                                <td class="text-center">
                                    <h6 class="mb-0">{{$row->id}}</h6>
                                    <div class="font-size-sm text-muted line-height-1"></div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="mr-3">

                                        </div>
                                        <div>
                                            <img src="{{asset($row->image)}}" width="100" height="50" alt="">

                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <a href="#" class="text-default">
                                        <div class="font-weight-semibold">{{Str::limit($row->title_tr,80)}}

                                        </div>
                                    </a>
                                </td>
                                <td class="text-center"> <a href="{{route('edit.post',$row->id)}}" class="dropdown-item"><i
                                            class="icon-pencil6 text-success"></i></a>

                                </td>
                            </tr>

                            @endforeach

                            <tr class="table-active table-border-double">
                                <td colspan="3">Son Yorumlar</td>
                                <td class="text-right">
                                    <span class="badge bg-success badge-pill">10</span>
                                </td>
                            </tr>

                            @foreach($endComments as $row)
                                <tr>
                                    <td class="text-center">
                                        <h6 class="mb-0">{{$row->id}}</h6>
                                        <div class="font-size-sm text-muted line-height-1"></div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
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
                                    <td class="text-center"> <a href="{{route('open.comments',$row->posts_id)}}" class="dropdown-item"><i
                                                class="icon-pencil6 text-success"></i></a>

                                    </td>
                                </tr>

                            @endforeach



                            <tr class="table-active table-border-double">
                                <td colspan="3">Son Köşe Yazıları</td>
                                <td class="text-right">
                                    <span class="badge bg-danger badge-pill">37</span>
                                </td>
                            </tr>

                            @foreach($endNews as $row)
                                <tr>
                                    <td class="text-center">
                                        <h6 class="mb-0">{{$row->id}}</h6>
                                        <div class="font-size-sm text-muted line-height-1"></div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="mr-3">

                                            </div>
                                            <div>
                                                <img src="{{asset($row->image)}}" width="100" height="50" alt="">

                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="#" class="text-default">
                                            <div class="font-weight-semibold">{{Str::limit($row->title_tr,80)}}

                                            </div>
                                        </a>
                                    </td>
                                    <td class="text-center"> <a href="{{route('edit.post',$row->id)}}" class="dropdown-item"><i
                                                class="icon-pencil6 text-success"></i></a>

                                    </td>
                                </tr>

                            @endforeach
                            </tbody>
                        </table>
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

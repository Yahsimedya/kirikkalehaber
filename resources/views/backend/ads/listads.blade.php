@extends('admin.admin_master')
@section('admin')
    @php
        // $category = DB::table('photocategories')->where('photocategory_id',$photo->photocategory_id)->get();

    @endphp

    <!-- Page content -->



    <!-- Main content -->
    <div class="content-wrapper">




        <!-- Content area -->
        <div class="content">
            <!-- Basic responsive configuration -->
            <div class="card">
                <div class="card-header header-elements-inline">
                    <h5 class="card-title">Reklam Alanları</h5>
                    <div class="header-elements">
                        <div class="list-icons">
                            <a class="list-icons-item" data-action="collapse"></a>
                            <a class="list-icons-item" data-action="reload"></a>
                            <a class="list-icons-item" data-action="remove"></a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    {{-- The <code>Responsive</code> extension for DataTables can be applied to a DataTable in one of two ways; with a specific <code>class name</code> on the table, or using the DataTables initialisation options. This method shows the latter, with the <code>responsive</code> option being set to the boolean value <code>true</code>. The <code>responsive</code> option can be given as a boolean value, or as an object with configuration options. --}}
                    <a href="{{route('add.ads')}}"><button type="button" class="float-right btn bg-teal-400 btn-labeled btn-labeled-left"><b><i class="icon-pen-plus"></i></b>Reklam Ekle</button></a>

                </div>

                <table class="table datatable-responsive" id="example">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Link</th>
                        <th>Alan</th>
                        <th>Reklam Görseli</th>
                        <th>Durum</th>
                        <th>Tip</th>
                        <th>Tarih</th>
                        <th class="text-center">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php
                        $i=1;
                    @endphp
                    @foreach ($ads as $ad )
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$ad->link}}</td>
                            <td>{{$ad->title}}</td>
                            <td>{{$ad->title}}</td>


                            <td>@if ($ad->status==1)
                                    <form action="{{route('update.adsStatus',$ad->id,0)}}" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-success" name="aktif" value="0">Aktif
                                        </button>
                                    </form>
                                @else
                                    <form action="{{route('update.adsStatus',$ad->id,1)}}" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-danger" name="aktif" value="1">Pasif
                                        </button>
                                    </form>

                                @endif</td>


                            <td>
                                @if ($ad->type ==2)
                                    <span class="badge badge-success">kod</span>

                                @else
                                    <span class="badge badge-success">Banner</span>

                                @endif
                            </td>
{{--                            <td>@if ($ad->status==1)--}}
{{--                                    <form action="{{route('active.galerycategory',$ad->photocategory_id)}}" method="post">--}}
{{--                                        @csrf--}}
{{--                                        <button type="submit" class="btn btn-success" name="aktif" value="0">Aktif</button>--}}
{{--                                    </form>--}}
{{--                                @else--}}
{{--                                    <form action="{{route('active.galerycategory',$ad->photocategory_id)}}" method="post">--}}
{{--                                        @csrf--}}
{{--                                        <button type="submit" class="btn btn-danger"  name="aktif" value="1">Pasif</button>--}}
{{--                                    </form>--}}

{{--                                @endif</td>--}}
{{--                            <td><a href="{{route('galery.detail', $ad->photocategory_id)}}"><span class="badge badge-warning">Galeri Detay</span></a></td>--}}
                            <td>{{Carbon\Carbon::parse($ad->created_at)->diffForHumans()}}</td>

                            <td class="text-center">
                                <div class="list-icons">
                                    <div class="dropdown">
                                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                                            <i class="icon-menu9"></i>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="{{route('edit.ads',$ad)}}" class="dropdown-item"><i class="icon-pencil6"></i> Düzenle</a>
                                            <a href="{{route('delete.ads',$ad)}}" onclick="return confirm('Silmek istediğinizden emin misiniz ?')" class="dropdown-item"><i class="icon-trash"></i>Sil</a>
                                            {{-- <a href="#" class="dropdown-item"><i class="icon-file-word"></i> Export to .doc</a> --}}
                                        </div>
                                    </div>
                                </div>
                            </td>

                        </tr>
                    @endforeach

                    </tbody>
                </table>
                {{-- {{$photo->links('pagination-links')}} --}}
                {{$ads->links('pagination-links')}}

            </div>
            <!-- /basic responsive configuration -->


        </div>
        <!-- /content area -->



    </div>
    <!-- /main content -->


    <!-- /page content -->
@endsection


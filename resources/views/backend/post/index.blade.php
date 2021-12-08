@extends('admin.admin_master')
@section('admin')
	<!-- Page content -->

    <script>
        $(document).ready(function(e){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $("#haberara").keyup(function() {
                $("#goster").show();
                var text = $(this).val();

                $.ajax({
                    type: 'get',
                    url: "{{route('haberbul')}}",
                    data: 'haber='+ text,
                    // dataType:"json",
                    headers: {'X-CSRF-TOKEN': '{{csrf_token()}}'},
                    success: function(data) {
                        // console.log(data);
                        $("#goster").html(data);
                        // alert("The souce of the image is " + data);
                        // alert(data);
                    }

                });
                {{--$.ajax({--}}
                {{--    url: "{{  url('/get/subcategory/') }}/"+category_id,--}}
                {{--    type:"GET",--}}
                {{--    dataType:"json",--}}
                {{--    success:function(data) {--}}
                {{--        $("#subcategory_id").empty();--}}
                {{--        $.each(data,function(key,value){--}}
                {{--            $("#subcategory_id").append('<option value="'+value.id+'">'+value.subcategory_tr+'</option>');--}}
                {{--        });--}}
                {{--        // console.log(data);--}}
                {{--    },--}}

                {{--});--}}


            })

        });
    </script>

		<!-- Main content -->
		<div class="content-wrapper">




			<!-- Content area -->
			<div class="content">
	<!-- Basic responsive configuration -->
    <div class="card">

            <div class="card-header header-elements-inline">
            <h5 class="card-title">Tüm Haberler</h5>
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
            <a href="{{route('add.post')}}"><button type="button" class="float-right btn bg-teal-400 btn-labeled btn-labeled-left"><b><i class="icon-pen-plus"></i></b> Haber Ekle</button></a>

        </div>
{{--        @foreach($search as $row)--}}
{{--            {{$row}}--}}
{{--        @endforeach--}}

        <div class="card-body">
    <h5 class="card-title">Tüm Haberlerde Ara</h5>

    <div class="col-md-12 mb-4"><input type="text" class="form-control"  placeholder="Haber İsmi Giriniz " id="haberara">

    </div>


        <table class="table datatable-responsive" id="example">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Haber Başlığı</th>
                    <th>Kategori</th>
                    <th>Bölge</th>
                    <th>Fotoğraf</th>
                    <th>Tarih</th>

                    <th>Durum</th>

                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
@php
    $i=1;
@endphp

                @foreach ($post as $row )
                <tr>
                    <div id="goster"></div>

                    <td>{{$i++}}</td>
                    <td>{{Str::limit($row->title_tr,80)}}</td>
                    <td>{{$row->category_tr}}</td>
                    <td>{{$row->district_tr}}</td>
                    {{-- <td>{{$row->subcategory_tr}}</td> --}}

                    <td><img src="{{asset($row->image)}}" width="150" height="100" alt=""></td>

                    <td>{{Carbon\Carbon::parse($row->created_at)->diffForHumans()}}</td>

               <!--     <td>
                        <a href="route('all.orderImagesPage',$row->id)}}">
                        <i class="icon-images2"></i>
                        </a>
                    </td>
                    -->


                    <td> @if ($row->status == 1)
                        <form action="{{ route('active.post', $row->id) }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-success" name="aktif"
                                value="0">Aktif</button>
                        </form>
                    @else
                    <form action="{{ route('active.post', $row->id) }}" method="post">
                        @csrf

                        <button type="submit" class="btn btn-danger" name="aktif" value="1">Pasif</button>
                        </form>

                    @endif</td>

                    <td class="text-center">
                        <div class="list-icons">
                            <div class="dropdown">
                                <a href="#" class="list-icons-item" data-toggle="dropdown">
                                    <i class="icon-menu9"></i>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="{{route('edit.post',$row)}}" class="dropdown-item"><i class="icon-pencil6"></i> Düzenle</a>
                                    <a href="{{route('delete.post',$row)}}" onclick="return confirm('Silmek istediğinizden emin misiniz ?')" class="dropdown-item"><i class="icon-trash"></i>Sil</a>
                                    {{-- <a href="#" class="dropdown-item"><i class="icon-file-word"></i> Export to .doc</a> --}}
                                </div>
                            </div>
                        </div>
                    </td>

                </tr>
                @endforeach

            </tbody>
        </table>
        {{$post->links('pagination-links')}}

    </div>

    <!-- /basic responsive configuration -->


			</div>
			<!-- /content area -->



		</div>
		<!-- /main content -->


	<!-- /page content -->
@endsection


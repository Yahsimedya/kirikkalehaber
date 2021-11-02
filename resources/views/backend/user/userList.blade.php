@extends('admin.admin_master')
@section('admin')
    <div class="content-wrapper">
        <div class="content">
            <div class="card">
                <div class="card-header header-elements-inline">
                    <h5 class="card-title">Tüm Kullanıcılar</h5>
                    <div class="header-elements">
                        <div class="list-icons">
                            <a class="list-icons-item" data-action="collapse"></a>
                            <a class="list-icons-item" data-action="reload"></a>
                            <a class="list-icons-item" data-action="remove"></a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <a href="{{route('user.create')}}">
                        <button type="button" class="float-right btn bg-teal-400 btn-labeled btn-labeled-left"><b><i
                                    class="icon-pen-plus"></i></b> Kullanıcı Ekle
                        </button>
                    </a>

                </div>

                <table class="table datatable-responsive" id="example">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>İsim</th>
                        <th>E mail</th>
                        <th>Fotoğraf</th>
                        <th>Tarih</th>
                        <th class="text-center">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php
                        $i=1;
                    @endphp

                    @foreach ($users as $row )
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{Str::limit($row->name,80)}}</td>
                            <td>{{$row->email}}</td>
                            <td><img src="{{asset($row->profile_photo_path)}}" width="150" height="100" alt=""></td>
                            <td>{{Carbon\Carbon::parse($row->created_at)->diffForHumans()}}</td>
                            <td class="text-center">
                                <div class="list-icons">
                                    <div class="dropdown">
                                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                                            <i class="icon-menu9"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="{{route('user.editPage',$row->id)}}" class="dropdown-item"><i
                                                    class="icon-pencil6"></i> Düzenle</a>
                                            <a href="{{route('user.delete',$row->id)}}" onclick="return confirm('Silmek istediğinizden emin misiniz ?')"
                                               class="dropdown-item"><i class="icon-trash"></i>Sil</a>
                                            {{-- <a href="#" class="dropdown-item"><i class="icon-file-word"></i> Export to .doc</a> --}}
                                        </div>
                                    </div>
                                </div>
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>


        </div>

    </div>
@endsection


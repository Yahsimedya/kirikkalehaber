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


                <table class="table datatable-responsive" id="example">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>İsim</th>

                        <th>Yorum</th>
                        <th>Durum</th>
                        <th>Tarih</th>
                        <th class="text-center">Sil</th>
                        <th class="text-center">Sil</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php
                        $i=1;
                    @endphp

                    @foreach ($comments as $row )
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{Str::limit($row->name,80)}}</td>
                            <td>{{$row->details}}</td>
                            <td> @if ($row->status == 1)
                                    <form action="{{ route('active.authorscomments', $row->id) }}" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-success" name="aktif"
                                                value="0">Aktif
                                        </button>
                                    </form>
                                @else
                                    <form action="{{ route('active.authorscomments', $row->id) }}" method="post">
                                        @csrf

                                        <button type="submit" class="btn btn-danger" name="aktif" value="1">Pasif
                                        </button>
                                    </form>

                                @endif</td>
                            <td>{{Carbon\Carbon::parse($row->created_at)->diffForHumans()}}</td>
                            <td><a href="{{route('delete.authorscomments',$row->id)}}"
                                   onclick="return confirm('Silmek istediğinizden emin misiniz ?')"
                                   class="dropdown-item"><i class="icon-trash"></i>Sil</a></td>


                            <td><a href="{{route('open.authorscomments',$row->authors_posts_id)}}"
                                   class="dropdown-item"><i class="icon-link"></i>Yazıya Git</a></td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>


        </div>

    </div>
@endsection


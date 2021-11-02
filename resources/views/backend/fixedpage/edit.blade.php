@extends('admin.admin_master')
@section('admin')
    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">Sayfa Düzenle</h5>
            <div class="header-elements">
                <div class="list-icons">
                    <a class="list-icons-item" data-action="collapse"></a>
                    <a class="list-icons-item" data-action="reload"></a>
                    <a class="list-icons-item" data-action="remove"></a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('fixedpage.edit',$edit->id)}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <div class="col-lg-12">
                        <label>Sayfa Başlık</label>

                        <input type="text" value="{{$edit->title}}" name="title" required="" class="form-control">

                    </div>

                </div>



                <label>Sayfa İçerik</label>
                <div class="form-group">
                    <textarea name="content" id="editor-full" rows="4" cols="4">{{$edit->content}}</textarea>
                    <script>
                        var options = {
                            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
                            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
                            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
                            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
                        };
                    </script>
                    <script>
                        CKEDITOR.replace('editor-full', options);
                    </script>
                </div>




                <div class="form-group row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="font-weight-semibold text-success">Sayfa Keyword</label>
                            <div class="form-group-feedback form-group-feedback-right">
                                <input id="tokenfield" type="text" value="{{$edit->keyword}}" name="keyword" class="form-control tokenfield">
                                <div class="form-control-feedback text-success">
                                    <i class="icon-checkmark-circle"></i>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-6">
                        <label><b>Sayfa Açıklama</b></label>
                        <textarea rows="1" cols="3" maxlength="225"  class="form-control maxlength-textarea" name="description" placeholder="Açıklama alanı 225 karakterle sınırlandırılmıştır">{{$edit->description}}</textarea>
                    </div>
                </div>


                <div align="right" class="box-footer">
                    <button type="submit" class="btn btn-success mb-4">Ekle</button>
                </div>
            </form>

        </div>

    </div>
@endsection


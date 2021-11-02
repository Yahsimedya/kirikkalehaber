@extends('admin.admin_master')
@section('admin')

    <div class="content">

        <!-- 2 columns form -->
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">Yazar Ekle</h5>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>
                        <a class="list-icons-item" data-action="reload"></a>
                        <a class="list-icons-item" data-action="remove"></a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{route('create.authorsposts')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <fieldset>
{{--                                <legend class="font-weight-semibold"><i class="icon-truck mr-2"></i> Shipping details</legend>--}}

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Başlık</label>
                                            <input type="text" name="title" class="form-control">
                                            @error('title')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Yazar İsmi</label>
                                            <select class="form-control" name="authors_id" id="">
                                                @foreach($authors as $author)
                                                <option value="{{$author->id}}">{{$author->name}}</option>
                                                @endforeach
                                            </select>

                                            @error('authors_id')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        {{-- <div class="form-group">
                                            <img width="100%" src="{{url('image/no_news_image.png')}}" id="showImage" alt="">

                                        </div> --}}

                                    </div>


                                </div>
                            </fieldset>

                        </div>

                    </div>
                    <div class="form-group">
                        <textarea name="text" id="editor-full" rows="4" cols="4"></textarea>
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
                  <div class="row">
                      <div class="col-md-12">
                          <div class="form-group">
                              <label class="font-weight-semibold text-success">Köşe Yazısı Keywords</label>
                              <div class="form-group-feedback form-group-feedback-right">
                                  <input id="tokenfield" type="text" name="keywords"  class="form-control tokenfield">
                                  <div class="form-control-feedback text-success">
                                      <i class="icon-checkmark-circle"></i>
                                  </div>
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="font-weight-semibold text-success">Köşe Yazısı Description</label>
                              <textarea rows="1" cols="1" maxlength="225" class="form-control maxlength-textarea"    name="description" placeholder="Açıklama alanı 225 karakterle sınırlandırılmıştır"></textarea>
                          </div>

                  </div>
                  </div>


                    <div class="text-right">
                        <button type="submit" class="btn btn-primary ">Yazar Ekle <i class="icon-paperplane ml-2"></i></button>
                    </div>

                </form>
            </div>
        </div>

        <!-- /2 columns form -->
    </div>
    <!--Yüklenen resmi otomatik olarak gösterir-->

@endsection

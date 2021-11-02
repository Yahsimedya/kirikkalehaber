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
                <form action="{{route('update.authors',$authors)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" value="{{$authors->image}}" name="old_image" class="form-control tokenfield">

                    <div class="row">
                        <div class="col-md-12">
                            <fieldset>
                                {{--                                <legend class="font-weight-semibold"><i class="icon-truck mr-2"></i> Shipping details</legend>--}}

                                <div class="row">

                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label>Yazar Fotoğraf</label>
                                            <input type="file" class="form-input-styled" multiple name="image" id="image" data-fouc>

                                            @error('image')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Yazar İsmi</label>
                                            <input type="text" name="name" value="{{$authors->name}}" class="form-control">
                                            @error('name')
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
                    <div class="row">
                        <div class="col-md-3 form-group">
                            <label>Mail Adresi</label>
                            <input type="text" name="mail" value="{{$authors->mail}}" class="form-control">
                            @error('mail')
                            <span class="text-danger">{{$message}}</span>

                            @enderror
                        </div>
                        <div class="col-md-3 form-group">
                            <label>Facebook</label>
                            <input type="text" name="facebook" value="{{$authors->facebook}}" class="form-control">
                            @error('facebook')
                            <span class="text-danger">{{$message}}</span>

                            @enderror
                        </div>
                        <div class="col-md-3 form-group">
                            <label>Twitter</label>
                            <input type="text" name="twitter" value="{{$authors->twitter}}" class="form-control">
                            @error('twitter')
                            <span class="text-danger">{{$message}}</span>

                            @enderror
                        </div>

                        <div class="col-md-3 form-group">
                            <label>Youtube</label>
                            <input type="text" name="youtube" value="{{$authors->youtube}}" class="form-control">
                            @error('youtube')
                            <span class="text-danger">{{$message}}</span>

                            @enderror
                        </div>

                    </div>



                    <div class="text-right">
                        <button type="submit" class="btn btn-primary ">Yazar Düzenle <i class="icon-paperplane ml-2"></i></button>
                    </div>

                </form>
            </div>
        </div>

        <!-- /2 columns form -->
    </div>
    <!--Yüklenen resmi otomatik olarak gösterir-->

@endsection

@extends('admin.admin_master')
@section('admin')
    <div class="content">

        <div class="card">

            <div class="card-body">
                <form action="{{route('websetting.update',$websetting)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" value="{{$websetting->logo}}" name="old_image" class="form-control tokenfield">
                    <input type="hidden" value="{{$websetting->defaultImage}}" name="old_defaultImage"
                           class="form-control tokenfield">
                    <input type="hidden" value="{{$websetting->favicon}}" name="old_favicon"
                           class="form-control tokenfield">

                    <fieldset class="mb-3">
                        <legend class="text-uppercase font-size-sm font-weight-bold">Website Ayarları</legend>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Logo</label>
                            <div class="col-lg-10">

                                <img src="{{asset($websetting->logo)}}" width="200" alt="">
                            </div>
                        </div>


                        <div class="form-group row">

                            <label class="col-form-label col-lg-2">Logo</label>
                            <div class="col-lg-10">
                                <input type="file" class="form-control" name="logo" class="form-control">
                                @error('logo')
                                <span class="text-danger">{{$logo}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Favicon</label>
                            <div class="col-lg-10">

                                <img src="{{asset($websetting->favicon)}}" width="200" alt="">
                            </div>
                        </div>


                        <div class="form-group row">

                            <label class="col-form-label col-lg-2">Favicon</label>
                            <div class="col-lg-10">
                                <input type="file" class="form-control" name="favicon" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Adres</label>
                            <div class="col-lg-10">
                                <input type="text" name="adress" value="{{$websetting->adress}}" class="form-control">
                                @error('adress')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Email</label>
                            <div class="col-lg-10">
                                <input type="text" name="email" value="{{$websetting->email}}" class="form-control">
                                @error('youtube')
                                <span class="text-danger">{{$email}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Telefon</label>
                            <div class="col-lg-10">
                                {{-- <input type="text" name="meta_description" value="{{$websetting->meta_description}}" class="form-control"> --}}
                                <input type="text" name="phone" class="form-control" value="{{$websetting->phone}}">

                                @error('phone')
                                <span class="text-danger">{{$phone}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Hakkımızda</label>
                            <div class="col-lg-10">
                                {{-- <input type="text" name="google_analytics" value="{{$websetting->instagram}}" class="form-control"> --}}
                                <textarea name="about" cols="30" class="form-control"
                                          rows="10">{{$websetting->about}}</textarea>
                                @error('about')
                                <span class="text-danger">{{$about}}</span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Varsayılan Resim</label>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="file" class="form-input-styled" name="defaultImage" id="image"
                                           data-fouc>
                                    @error('image')
                                    <span class="text-danger">{{$message}}</span>

                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">

                                <div class="form-group">
                                    <img width="100%" src="{{asset($websetting->defaultImage)}}"
                                         onerror="this.onerror=null;this.src='{{url('image/no_news_image.png')}}';"
                                         id="showImage" alt="">
                                </div>

                            </div>


                        </div>


                        {{-- <div class="form-group row">
                            <label class="col-form-label col-lg-2">Input with placeholder</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" placeholder="Enter your username...">
                            </div>
                        </div> --}}
                        <button type="submit" class="btn bg-success float-right">Düzenle</button>
                </form>
            </div>
        </div>
    </div>

@endsection

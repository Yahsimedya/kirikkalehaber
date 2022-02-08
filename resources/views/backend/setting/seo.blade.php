@extends('admin.admin_master')
@section('admin')
<div class="content">

<div class="card">

<div class="card-body">
    <form action="{{route('seos.update',$seos->id)}}" method="post">
@csrf
    <fieldset class="mb-3">
        <legend class="text-uppercase font-size-sm font-weight-bold">SEO Ayarları</legend>

        <div class="form-group row">
            <label class="col-form-label col-lg-2">Yazar</label>
            <div class="col-lg-10">
                <input type="text"  name="meta_author" value="{{$seos->meta_author}}" class="form-control">
                @error('meta_author')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label class="col-form-label col-lg-2">Site Başlığı</label>
            <div class="col-lg-10">
                <input type="text" name="meta_title" value="{{$seos->meta_title}}" class="form-control">
                @error('meta_title')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="col-form-label col-lg-2">Site Anahtar Kelime</label>
            <div class="col-lg-10">
                <input type="text" name="meta_keyword" value="{{$seos->meta_keyword}}" class="form-control">
                @error('youtube')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="col-form-label col-lg-2">Site Açıklama</label>
            <div class="col-lg-10">
                {{-- <input type="text" name="meta_description" value="{{$seos->meta_description}}" class="form-control"> --}}
                <textarea name="meta_description"  cols="30" class="form-control" rows="10">{{$seos->meta_description}}</textarea>

                @error('meta_description')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="col-form-label col-lg-2">Google Analiytics Kod Alanı</label>
            <div class="col-lg-10">
                {{-- <input type="text" name="google_analytics" value="{{$seos->instagram}}" class="form-control"> --}}
                <textarea name="google_analytics"  cols="30" class="form-control" rows="10">{{$seos->google_analytics}}</textarea>
                @error('google_analytics')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="col-form-label col-lg-2">Google Doğrulama Kodu</label>
            <div class="col-lg-10">
                <input type="text" name="google_verification" value="{{$seos->google_verification}}" class="form-control">
                {{-- <textarea name="google_verification" id="" cols="30" rows="10">{{$seos->google_verification}}</textarea> --}}
                @error('google_verification')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="col-form-label col-lg-2">Alexa Doğrulama Kodu</label>
            <div class="col-lg-10">
                {{-- <input type="text" name="google_verification" value="{{$seos->google_verification}}" class="form-control"> --}}
                <textarea name="alexa_analytics" class="form-control"  cols="30" rows="10">{{$seos->alexa_analytics}}</textarea>
                @error('alexa_analytics')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="col-form-label col-lg-2">Adsense Script Kodu</label>
            <div class="col-lg-10">
                <input type="text" name="adsense_code" value="{{$seos->adsense_code}}" class="form-control">
                {{-- <textarea name="google_verification" id="" cols="30" rows="10">{{$seos->google_verification}}</textarea> --}}
                @error('adsense_code')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="col-form-label col-lg-2">Bildirim Api Key</label>
            <div class="col-lg-10">
                <input type="text" name="fcmserver" value="{{$seos->fcmserver}}" class="form-control">
                {{-- <textarea name="google_verification" id="" cols="30" rows="10">{{$seos->google_verification}}</textarea> --}}

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

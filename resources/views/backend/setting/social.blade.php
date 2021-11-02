@extends('admin.admin_master')
@section('admin')
<div class="content">

<div class="card">

<div class="card-body">
    <form action="{{route('social.update',$social->id)}}" method="post">
@csrf
    <fieldset class="mb-3">
        <legend class="text-uppercase font-size-sm font-weight-bold">Sosyal Medya Linkleri</legend>

        <div class="form-group row">
            <label class="col-form-label col-lg-2">Facebook</label>
            <div class="col-lg-10">
                <input type="text"  name="facebook" value="{{$social->facebook}}" class="form-control">
                @error('category_tr')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label class="col-form-label col-lg-2">Twitter</label>
            <div class="col-lg-10">
                <input type="text" name="twitter" value="{{$social->twitter}}" class="form-control">
                @error('twitter')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="col-form-label col-lg-2">Youtube Kanal Linki</label>
            <div class="col-lg-10">
                <input type="text" name="youtube" value="{{$social->youtube}}" class="form-control">
                @error('youtube')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="col-form-label col-lg-2">Linkedin</label>
            <div class="col-lg-10">
                <input type="text" name="linkedin" value="{{$social->linkedin}}" class="form-control">
                @error('linkedin')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="col-form-label col-lg-2">İnstagram</label>
            <div class="col-lg-10">
                <input type="text" name="instagram" value="{{$social->instagram}}" class="form-control">
                @error('instagram')
                <span class="text-danger">{{$message}}</span>
                @enderror
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

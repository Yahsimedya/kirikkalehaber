@extends('admin.admin_master')
@section('admin')
<div class="content">

<div class="card">

<div class="card-body">
    <form action="{{route('create.district')}}" method="post">
@csrf
    <fieldset class="mb-3">
        <legend class="text-uppercase font-size-sm font-weight-bold">Bölge Ekle</legend>

        <div class="form-group row">
            <label class="col-form-label col-lg-2">Bölge İsmi (TR)</label>
            <div class="col-lg-10">
                <input type="text"  name="district_tr" class="form-control">
                @error('district_tr')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label class="col-form-label col-lg-2">Bölge İsmi (EN)</label>
            <div class="col-lg-10">
                <input type="text" name="district_en" class="form-control">
                @error('district_en')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="col-form-label col-lg-2">Bölge Keywords</label>
            <div class="col-lg-10">
                <textarea class="form-control" name="district_keywords" id="" cols="30" rows="10"></textarea>
                @error('district_keywords')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="col-form-label col-lg-2">Bölge Description</label>
            <div class="col-lg-10">
                <textarea class="form-control" name="district_description" id="" cols="30" rows="10"></textarea>
                @error('district_description')
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
        <button type="submit" class="btn bg-success float-right"> Ekle</button>
    </form>
</div>
</div>
</div>

@endsection

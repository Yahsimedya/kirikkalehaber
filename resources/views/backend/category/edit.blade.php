@extends('admin.admin_master')
@section('admin')
<div class="content">

<div class="card">

<div class="card-body">
    <form action="{{ route('update.category', $category) }}" method="post">
@csrf
    <fieldset class="mb-3">
        <legend class="text-uppercase font-size-sm font-weight-bold">Kategori Ekle</legend>

        <!--<select name="parent_id">
            <option value="">--</option>

        </select>-->

        <div class="form-group row">
            <label class="col-form-label col-lg-2">Kategori İsmi (TR)</label>
            <div class="col-lg-10">
                <input type="text"  name="category_tr" value="{{$category->category_tr}}" class="form-control">
                @error('category_tr')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label class="col-form-label col-lg-2">Kategori İsmi (EN)</label>
            <div class="col-lg-10">
                <input type="text" name="category_en" value="{{$category->category_en}}" class="form-control">
                @error('category_en')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="col-form-label col-lg-2">Kategori Keywords</label>
            <div class="col-lg-10">
                <textarea class="form-control" name="category_keywords"  id="" cols="30" rows="10">{{$category->category_keywords}}</textarea>
                @error('category_keywords')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="col-form-label col-lg-2">Kategori Description</label>
            <div class="col-lg-10">
                <textarea class="form-control" name="category_description"  id="" cols="30" rows="10">{{$category->category_description}}</textarea>
                @error('category_description')
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

@extends('admin.admin_master')
@section('admin')
<div class="content">

<div class="card">

<div class="card-body">
    <form action="{{route('update.subdistrict',$subdistrict)}}" method="post">
@csrf
    <fieldset class="mb-3">
        <legend class="text-uppercase font-size-sm font-weight-bold">Kategori Ekle</legend>
   <div class="form-group  row">
                            <label class="col-form-label col-lg-2">Üst Kategori</label>
                            <div class="col-lg-10">

                                <select data-placeholder="Select a State..." name="district_id"
                                    class="form-control form-control-lg select" data-container-css-class="select-lg"
                                    data-fouc>
                                    <option>Üst Kategori Seç</option>

                                    @foreach ($districts as $row)

                                        <option value="{{ $row->id }}"
                                            @php
                                                if($row->id== $subdistrict->district_id) echo "selected";
                                            @endphp
                                            >{{ $row->district_tr }} |
                                            {{ $row->district_en }}</option>

                                    @endforeach



                                </select>
                            </div>
                        </div>
        <div class="form-group row">
            <label class="col-form-label col-lg-2">Kategori İsmi (TR)</label>
            <div class="col-lg-10">
                <input type="text"  name="subdistrict_tr" value="{{$subdistrict->subdistrict_tr}}" class="form-control">
                @error('subdistrict_tr')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label class="col-form-label col-lg-2">Kategori İsmi (EN)</label>
            <div class="col-lg-10">
                <input type="text" name="subdistrict_en" value="{{$subdistrict->subdistrict_en}}" class="form-control">
                @error('subdistrict_en')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="col-form-label col-lg-2">Kategori Keywords</label>
            <div class="col-lg-10">
                <textarea class="form-control" name="subdistrict_keywords"  id="" cols="30" rows="10">{{$subdistrict->subdistrict_keywords}}</textarea>
                @error('subdistrict_keywords')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="col-form-label col-lg-2">Kategori Description</label>
            <div class="col-lg-10">
                <textarea class="form-control" name="subdistrict_description"  id="" cols="30" rows="10">{{$subdistrict->subdistrict_description}}</textarea>
                @error('subdistrict_description')
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
        <button type="submit" class="btn bg-success float-right">Ekle</button>
    </form>
</div>
</div>
</div>

@endsection

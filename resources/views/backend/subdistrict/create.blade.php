@extends('admin.admin_master')
@section('admin')
    <div class="content">

        <div class="card">

            <div class="card-body">
                <form action="{{ route('create.subdistrict') }}" method="post">
                    @csrf
                    <fieldset class="mb-3">
                        <legend class="text-uppercase font-size-sm font-weight-bold">Alt Bölge Ekle</legend>
                        <div class="form-group  row">
                            <label class="col-form-label col-lg-2">Üst Bölge</label>
                            <div class="col-lg-10">

                                <select data-placeholder="Select a State..." name="district_id"
                                    class="form-control form-control-lg select" data-container-css-class="select-lg"
                                    data-fouc>
                                    <option>Üst Bölge Seç</option>

                                    @foreach ($districts as $row)

                                        <option value="{{ $row->id }}">{{ $row->district_tr }} |
                                            {{ $row->district_en }}</option>

                                    @endforeach



                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Bölge İsmi (TR)</label>
                            <div class="col-lg-10">
                                <input type="text" name="subdistrict_tr" class="form-control">
                                @error('subdistrict_tr')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Bölge İsmi (EN)</label>
                            <div class="col-lg-10">
                                <input type="text" name="subdistrict_en" class="form-control">
                                @error('subdistrict_en')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Bölge Keywords</label>
                            <div class="col-lg-10">
                                <textarea class="form-control" name="subdistrict_keywords" id="" cols="30"
                                    rows="10"></textarea>
                                @error('subdistrict_keywords')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Bölge Description</label>
                            <div class="col-lg-10">
                                <textarea class="form-control" name="subdistrict_description" id="" cols="30"
                                    rows="10"></textarea>
                                @error('subdistrict_description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        {{-- <div class="form-group row">
            <label class="col-form-label col-lg-2">Input with placeholder</label>
            <div class="col-lg-10">
                <input type="text" class="form-control" placeholder="Enter your username...">
            </div>
        </div> --}}
                        <button type="submit" class="btn bg-success float-right">Alt Bölge Ekle</button>
                </form>
            </div>
        </div>
    </div>

@endsection

@extends('admin.admin_master')
@section('admin')
    <div class="content">

        <div class="card">

            <div class="card-body">
                <form action="{{ route('create.subcategory') }}" method="post">
                    @csrf
                    <fieldset class="mb-3">
                        <legend class="text-uppercase font-size-sm font-weight-bold">Alt Kategori Ekle</legend>
                        <div class="form-group  row">
                            <label class="col-form-label col-lg-2">Üst Kategori</label>
                            <div class="col-lg-10">

                                <select data-placeholder="Select a State..." name="category_id"
                                    class="form-control form-control-lg select" data-container-css-class="select-lg"
                                    data-fouc>
                                    <option>Üst Kategori Seç</option>

                                    @foreach ($categories as $kategori)

                                        <option value="{{ $kategori->id }}">{{ $kategori->category_tr }} |
                                            {{ $kategori->category_en }}</option>

                                    @endforeach



                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Kategori İsmi (TR)</label>
                            <div class="col-lg-10">
                                <input type="text" name="subcategory_tr" class="form-control">
                                @error('subcategory_tr')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Kategori İsmi (EN)</label>
                            <div class="col-lg-10">
                                <input type="text" name="subcategory_en" class="form-control">
                                @error('subcategory_en')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Kategori Keywords</label>
                            <div class="col-lg-10">
                                <textarea class="form-control" name="subcategory_keywords" id="" cols="30"
                                    rows="10"></textarea>
                                @error('subcategory_keywords')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Kategori Description</label>
                            <div class="col-lg-10">
                                <textarea class="form-control" name="subcategory_description" id="" cols="30"
                                    rows="10"></textarea>
                                @error('subcategory_description')
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
                        <button type="submit" class="btn bg-success float-right">Alt Kategori Ekle</button>
                </form>
            </div>
        </div>
    </div>

@endsection

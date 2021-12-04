@extends('admin.admin_master')
@section('admin')



    @foreach ($themeSettings as $row)
        @php
            $category1=$row->category1;
            $category2=$row->category2;
            $category3=$row->category3;
            $category4=$row->category4;


        @endphp
        <div class="content">

            <div class="card">

                <div class="card-body">
                    <form action="{{route('theme.update',$row->id)}}" method="post">
                        @csrf
                        <fieldset class="mb-3">
                            <legend class="text-uppercase font-size-sm font-weight-bold">Tema Ayarları</legend>
                            <div class="form-group  row">
                                <label class="col-form-label col-lg-3">Header</label>
                                <div class="col-lg-9">


                                    <select data-placeholder="Select your state" name="header"
                                            style="width: 150px; height: 30px" class="form-control form-control-select2"
                                            data-fouc>
                                        <option @php if($row->header ==0 ) { echo "selected";} @endphp value="0">Klasik
                                            Header
                                        </option>
                                        <option @php if($row->header ==1 ) { echo "selected";} @endphp value="1">Modern
                                            Header
                                        </option>
                                    </select>


                                </div>
                                <div class="col-lg-12 mt-4"></div>

                                <label class="col-form-label col-lg-3">Ana Slider Başlık</label>
                                <div class="col-lg-9">


                                    <select data-placeholder="Select your state" name="slider_title"
                                            style="width: 150px; height: 30px" class="form-control form-control-select2"
                                            data-fouc>
                                        <option @php if($row->slider_title ==0 ) { echo "selected";} @endphp value="0">
                                            Kapalı

                                        </option>
                                        <option @php if($row->slider_title ==1 ) { echo "selected";} @endphp value="1">
                                            Açık

                                        </option>
                                    </select>


                                </div>

                                <div class="col-lg-12 mt-4"></div>
                                <label class="col-form-label col-lg-3 ">Site Genel Renk</label>
                                <div class="col-lg-9">

                                    <div class="example full" style="width: 100%; height: 30px">

                                        <input type="text" class="coloris" name="siteColorTheme"
                                               style="width: 100%; height: 30px"
                                               value="{{$row->siteColorTheme}}">
                                    </div>


                                </div>
                                <label class="col-form-label col-lg-3">Öne Çıkan 1.Alan</label>


                                <div class="col-lg-2">
                                    <div class="example full" style="width: 100%; height: 30px">

                                        <input type="text" class="coloris"
                                               name="economy" style="width: 100%; height: 30px"
                                               value="{{$row->economy}}">
                                    </div>


                                </div>
                                <div class="col-lg-7">
                                    <select data-placeholder="Select your state" name="category1"

                                            class="form-control form-control-select2"
                                            data-fouc>
                                        @foreach($Categories as $rows)
                                            <option value="{{$rows->id}}" @php if($rows->id==$category1) {echo "selected";}  @endphp>
                                                {{$rows->category_tr}}
                                            </option>
                                        @endforeach

                                    </select>
                                    <div class="col-lg-12 mt-4"></div>


                                </div>


                                <label class="col-form-label col-lg-3">Öne Çıkan 2.Alan</label>
                                <div class="col-lg-2">
                                    <div class="example full" style="width: 100%; height: 30px">

                                        <input type="text" class="coloris"
                                               name="agenda" style="width: 100%; height: 30px"
                                               value="{!! $row->agenda!!}">
                                    </div>

                                </div>
                                <div class="col-lg-7">
                                        <select data-placeholder="Select your state" name="category2"
                                                style="width: 150px; height: 30px"
                                                class="form-control form-control-select2"
                                                data-fouc>
                                            @foreach($Categories as $rows)
                                                <option value="{{$rows->id}}" @php if($rows->id==$category2) {echo "selected";}  @endphp>
                                                    {{$rows->category_tr}}
                                                </option>
                                            @endforeach

                                        </select>
                                    <div class="col-lg-12 mt-4"></div>


                                </div>
                                <label class="col-form-label col-lg-3">Öne Çıkan 3.Alan</label>
                                <div class="col-lg-2">
                                    <div class="example full" style="width: 100%; height: 30px">

                                        <input type="text" class="coloris"
                                               name="politics" style="width: 100%; height: 30px"
                                               value="{{$row->politics}}">
                                    </div>


                                </div>

                                <div class="col-lg-7">
                                        <select data-placeholder="Select your state" name="category3"
                                                style="width: 150px; height: 30px"
                                                class="form-control form-control-select2"
                                                data-fouc>
                                            @foreach($Categories as $rows)
                                                <option value="{{$rows->id}}" @php if($rows->id==$category3) {echo "selected";}  @endphp>
                                                    {{$rows->category_tr}}
                                                </option>
                                            @endforeach

                                        </select>
                                    <div class="col-lg-12 mt-4"></div>


                                </div>
                                <label class="col-form-label col-lg-3">Öne Çıkan 4.Alan</label>
                                <div class="col-lg-2">

                                    <div class="example full" style="width: 100%; height: 30px">

                                        <input type="text" class="coloris"
                                               name="sport" style="width: 100%; height: 30px" value="{{$row->sport}}">
                                    </div>


                                </div>
                                <div class="col-lg-7">
                                        <select data-placeholder="Select your state" name="category4"
                                                style="width: 150px; height: 30px"
                                                class="form-control form-control-select2"
                                                data-fouc>

                                            @foreach($Categories as $rows)

                                                <option value="{{$rows->id}}" @php if($rows->id==$category4) {echo "selected";}  @endphp>
                                                    {{$rows->category_tr}}
                                                </option>
                                            @endforeach

                                        </select>
                                    <div class="col-lg-12 mt-4"></div>


                                </div>


                                <label class="col-form-label col-lg-3">Footer Uygulamalarımız</label>
                                <div class="col-lg-9">


                                    <select data-placeholder="Select your state" name="apps"
                                            style="width: 150px; height: 30px" class="form-control form-control-select2"
                                            data-fouc>
                                        <option @php if($row->apps ==0 ) { echo "selected";} @endphp value="0">Gösterme

                                        </option>
                                        <option @php if($row->apps ==1 ) { echo "selected";} @endphp value="1">Göster

                                        </option>
                                    </select>


                                </div>

                                <div class="col-lg-12 mt-4"></div>

                                <label class="col-form-label col-lg-3">Footer Üyeliklerimiz</label>
                                <div class="col-lg-9">


                                    <select data-placeholder="Select your state" name="subscription"
                                            style="width: 150px; height: 30px" class="form-control form-control-select2"
                                            data-fouc>
                                        <option @php if($row->subscription ==0 ) { echo "selected";} @endphp value="0">
                                            Gösterme

                                        </option>
                                        <option @php if($row->subscription ==1 ) { echo "selected";} @endphp value="1">
                                            Göster

                                        </option>
                                    </select>


                                </div>
                            </div>

                            <button type="submit" class="btn bg-success float-right">Ekle</button>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
@endsection



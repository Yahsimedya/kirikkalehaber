@extends('admin.admin_master')
@section('admin')
    <link rel="stylesheet" type="text/css" href="{{asset('backend/global_assets/picker/coloris.min.css')}}">
    <style type="text/css">
        @import url(https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap);

        input {
            width: 150px;
            height: 32px;
            padding: 0 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-family: inherit;
            font-size: inherit;
            font-weight: inherit;
            box-sizing: border-box;
        }

        .examples {
            display: flex;
            flex-wrap: wrap;
        }

        .example {
            flex-shrink: 0;
            width: 300px;
            margin-bottom: 30px;
        }

        .square .clr-field button,
        .circle .clr-field button {
            width: 22px;
            height: 22px;
            left: 5px;
            right: auto;
            border-radius: 5px;
        }

        .square .clr-field input,
        .circle .clr-field input {
            padding-left: 36px;
        }

        .circle .clr-field button {
            border-radius: 50%;
        }

        .full .clr-field button {
            width: 100%;
            height: 100%;
            border-radius: 5px;
        }

    </style>


    @foreach ($themeSettings as $row)
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
                                <label class="col-form-label col-lg-3 ">Site Genel Renk</label>
                                <div class="col-lg-9">

                                    <div class="example full" style="width: 100%; height: 30px">

                                        <input type="text" class="coloris" name="siteColorTheme"
                                               style="width: 100%; height: 30px"
                                               value="{{$row->siteColorTheme}}">
                                    </div>


                                </div>
                                <label class="col-form-label col-lg-3">Öne Çıkan Ekonomi Haberleri</label>
                                <div class="col-lg-9">
                                    <div class="example full" style="width: 100%; height: 30px">

                                        <input type="text" class="coloris"
                                               name="economy" style="width: 100%; height: 30px"
                                               value="{{$row->economy}}">
                                    </div>


                                </div>
                                <label class="col-form-label col-lg-3">Öne Çıkan Gündem Haberleri</label>
                                <div class="col-lg-9">
                                    <div class="example full" style="width: 100%; height: 30px">

                                        <input type="text" class="coloris"
                                               name="agenda" style="width: 100%; height: 30px" value="{{$row->agenda}}">
                                    </div>


                                </div>
                                <label class="col-form-label col-lg-3">Öne Çıkan Politika Haberleri</label>
                                <div class="col-lg-9">
                                    <div class="example full" style="width: 100%; height: 30px">

                                        <input type="text" class="coloris"
                                               name="politics" style="width: 100%; height: 30px"
                                               value="{{$row->politics}}">
                                    </div>


                                </div>
                                <label class="col-form-label col-lg-3">Öne Çıkan Spor Haberleri</label>
                                <div class="col-lg-9">

                                    <div class="example full" style="width: 100%; height: 30px">

                                        <input type="text" class="coloris"
                                               name="sport" style="width: 100%; height: 30px" value="{{$row->sport}}">
                                    </div>


                                </div>
                            </div>

                            <button type="submit" class="btn bg-success float-right">Ekle</button>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
@endsection

<script type="text/javascript" src="{{asset('backend/global_assets/picker/coloris.min.js')}}"></script>
<script type="text/javascript">

    Coloris({
        el: '.coloris',
        swatches: [
            '#264653',
            '#2a9d8f',
            '#e9c46a',
            '#f4a261',
            '#e76f51',
            '#d62828',
            '#023e8a',
            '#0077b6',
            '#0096c7',
            '#00b4d8',
            '#48cae4',
        ]
    });

</script>

@extends('admin.admin_master')
@section('admin')
    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">Sayfa Ekle</h5>
            <div class="header-elements">
                <div class="list-icons">
                    <a class="list-icons-item" data-action="collapse"></a>
                    <a class="list-icons-item" data-action="reload"></a>
                    <a class="list-icons-item" data-action="remove"></a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form method="POST" action="{{route("egazete.postStore")}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <div class="col-lg-12">
                        <label>Gazete Sayı</label>

                        <input type="text" name="title_tr" required="" class="form-control">

                    </div>

                </div>

                <div class="form-group">
                    <label>Yayın Tarihi:</label>
                    <div class="input-group">
											<span class="input-group-prepend">
												<span class="input-group-text"><i class="icon-calendar22"></i></span>
											</span>
                        <input type="text" id="tarih" class="form-control daterange-increments" name="date" value="">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Gazete Resmi:</label>
                        <input type="file" class="form-input-styled" name="image" id="image" data-fouc>
                        @error('image')
                        <span class="text-danger">{{$message}}</span>

                        @enderror
                    </div>
                </div>




                <div align="right" class="box-footer">
                    <button type="submit" class="btn btn-success mb-4">Ekle</button>
                </div>
            </form>

        </div>

    </div>
    <script>
        $('.daterange-increments').daterangepicker({
            autoUpdateInput: true,
            timePicker: true,
            singleDatePicker:true,
            timePicker24Hour: true,
            timePickerSeconds:true,
            timePickerIncrement: 5,

            startDate: moment().startOf('minutes'),

            locale: {
                format: 'YYYY/MM/DD HH:mm'
            }
        });
        $('#tarih').change(function(){
            $(this).attr('value', $('#tarih').val());
        });
    </script>

@endsection


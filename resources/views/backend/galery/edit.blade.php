@extends('admin.admin_master')
@section('admin')

<div class="content">

	<!-- 2 columns form -->
    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">Haber Ekle</h5>
            <div class="header-elements">
                <div class="list-icons">
                    <a class="list-icons-item" data-action="collapse"></a>
                    <a class="list-icons-item" data-action="reload"></a>
                    <a class="list-icons-item" data-action="remove"></a>
                </div>
            </div>
        </div>

        <div class="card-body">
            <form action="{{route('update.galery')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <fieldset>
                            <legend class="font-weight-semibold"><i class="icon-reading mr-2"></i>Fotoğraf Ekle</legend>

                            <div class="form-group">

                                <label>Haber Başlığı:</label>
                                <input type="text" name="title" value="{{$galery->title}}" class="form-control" placeholder="Başlık">
                                <input type="hidden" name="id" value="{{$galery->id}}" class="form-control" placeholder="Başlık">
                            </div>
                            <div class="form-group">
                                <label>Kategori Seçiniz:</label>
                                <select data-placeholder="Select your state" name="photocategory_id" class="form-control form-control-select2" data-fouc>
                                    <option disabled="" selected="">Kategori Seçiniz</option>
                                    @foreach ($photocategory as $row )
                                    <option @php if($row->id == $galery->photocategory_id ) { echo "selected";} @endphp value="{{$row->id}}">{{$row->category_title}}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                <span class="text-danger">{{$message}}</span>

                                @enderror
                            </div>




                        </fieldset>
                    </div>

                    <div class="col-md-6">
                        <fieldset>
                            <legend class="font-weight-semibold"><i class="icon-truck mr-2"></i> Shipping details</legend>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Attach screenshot:</label>
                                        <input type="file" class="form-input-styled" multiple name="photo[]" id="image" data-fouc>
                                        @error('image')
                                        <span class="text-danger">{{$message}}</span>

                                        @enderror
                                    </div>
                                </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Foto Tip</label>
                                            <select data-placeholder="Select your state" name="type" class="form-control form-control-select2" data-fouc>
                                                <option value="1">Manşet Foto</option>
                                                <option value="0">Küçük Foto</option>

                                            </select>
                                            @error('category_id')
                                            <span class="text-danger">{{$message}}</span>

                                            @enderror
                                        </div>
                                    {{-- <div class="form-group">
                                        <img width="100%" src="{{url('image/no_news_image.png')}}" id="showImage" alt="">

                                    </div> --}}

                                </div>


                            </div>
                        </div>






                    </div>

                    <div class="form-group">
                        <textarea name="photo_text" id="editor-full" rows="4" cols="4">{{$galery->photo_text}}</textarea>

                    </div>




                <div class="text-right">
                    <button type="submit" class="btn btn-primary">Galeri Ekle <i class="icon-paperplane ml-2"></i></button>
                </div>

            </form>
        </div>
    </div>
    <!-- /2 columns form -->
</div>
<!--Yüklenen resmi otomatik olarak gösterir-->
<script type="text/javascript">
    $(document).ready(function() {
    $('#image').change(function(e) {
    var reader = new FileReader();
    reader.onload =function(e) {
    $('#showImage').attr('src',e.target.result);
    }
    reader.readAsDataURL(e.target.files['0']);
    });
    });
    </script>
    {{-- burası kategorilerin alt kategorilerini eklemek için eklendi --}}
    <script type="text/javascript">
        $(document).ready(function() {
              $('select[name="category_id"]').on('change', function(){
                  var category_id = $(this).val();
                  if(category_id) {
                      $.ajax({
                          url: "{{  url('/get/subcategory/') }}/"+category_id,
                          type:"GET",
                          dataType:"json",
                          success:function(data) {
                             $("#subcategory_id").empty();
                                   $.each(data,function(key,value){
                                       $("#subcategory_id").append('<option value="'+value.id+'">'+value.subcategory_tr+'</option>');
                                   });
                            // console.log(data);
                          },

                      });
                  } else {
                      alert('danger');
                  }
              });
          });
     </script>
         {{-- burası Bölgelerin alt Bölgelerini eklemek için eklendi --}}
    <script type="text/javascript">
        $(document).ready(function() {
              $('select[name="district_id"]').on('change', function(){
                  var district_id = $(this).val();
                  if(district_id) {
                      $.ajax({
                          url: "{{  url('/get/subdistrict/') }}/"+district_id,
                          type:"GET",
                          dataType:"json",
                          success:function(data) {
                             $("#subdistrict_id").empty();
                                   $.each(data,function(key,value){
                                       $("#subdistrict_id").append('<option value="'+value.id+'">'+value.subdistrict_tr+'</option>');
                                   });
                            // console.log(data);
                          },

                      });
                  } else {
                      alert('danger');
                  }
              });
          });
     </script>
@endsection

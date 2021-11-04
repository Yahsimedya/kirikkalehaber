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
            <form action="{{route('create.post')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <fieldset>
                            <legend class="font-weight-semibold"><i class="icon-reading mr-2"></i> Personal details</legend>

                            <div class="form-group">
                                <label>Haber Başlığı:</label>
                                <input type="text" name="title_tr" class="form-control" placeholder="Başlık">
                            </div>
                            <div class="form-group">
                                <label>Haber Spot Başlığı:</label>
                                <input type="text" name="subtitle_tr" class="form-control" placeholder="Spot Başlık">
                            </div>
                            <div class="form-group">
                                <label>Video Haber Linki:</label>
                                <input type="text" name="posts_video" class="form-control" placeholder="youtube iframe">
                            </div>
                            <div class="form-group">
                                <label>Kategori Seçiniz:</label>
                                <select data-placeholder="Select your state" name="category_id" class="form-control form-control-select2" data-fouc>
                                    <option disabled="" selected="">Kategori Seçiniz</option>
                                    @foreach ($category as $row )
                                    <option value="{{$row->id}}">{{$row->category_tr}} | {{$row->category_en}}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                <span class="text-danger">{{$message}}</span>

                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Alt Kategori Seçiniz:</label>
                                <select data-placeholder="Select your state" id="subcategory_id" name="subcategory_id" class="form-control form-control-select2" data-fouc>
                                    <option    selected="">Alt Kategori Seçiniz</option>


                                </select>
                            </div>
                            {{-- <div class="form-group">
                                <label>Bölge Seçiniz:</label>
                                <select data-placeholder="Select your state" name="district_id" class="form-control form-control-select2" data-fouc>
                                    <option disabled="" selected="">Bölge Seçiniz</option>
                                    @foreach ($district as $row )
                                    <option value="{{$row->id}}">{{$row->district_tr}} | {{$row->district_en}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Alt Bölge Seçiniz:</label>
                                <select data-placeholder="Select your state" name="subdistrict_id" class="form-control form-control-select2" data-fouc>
                                    <option disabled="" selected="">Bölge Seçiniz</option>
                                    @foreach ($district as $row )
                                    <option value="{{$row->id}}">{{$row->district_tr}} | {{$row->district_en}}</option>
                                    @endforeach
                                </select>
                            </div> --}}
{{--                            <div class="form-group">--}}
{{--                            <label for="formrow-email-input">Tags</label>--}}
{{--                            <select class="form-control select2 select-tags" name="tag[]" id="tags" multiple>--}}
{{--                                @foreach ($tags as $tag)--}}
{{--                                    <option value="{{$tag->name}}">{{$tag->name}}</option>--}}
{{--                                @endforeach--}}
{{--                            </select>--}}
{{--                    </div>--}}
                            <div class="form-group">
                                <label class="font-weight-semibold text-success">Haber Etiketleri</label>
                                <div class="form-group-feedback form-group-feedback-right">
                                    <input id="tokenfield" type="text" name="tag[]" class="form-control tokenfield">
                                    <div class="form-control-feedback text-success">
                                        <i class="icon-checkmark-circle"></i>
                                    </div>
                                </div>
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
                                        <input type="file" class="form-input-styled" name="image" id="image" data-fouc>
                                        @error('image')
                                        <span class="text-danger">{{$message}}</span>

                                        @enderror
                                    </div>
                                </div>

                                    <div class="col-md-6">

                                    <div class="form-group">
                                        <img width="100%" src="{{url('image/no_news_image.png')}}" id="showImage" alt="">
                                        {{-- <label>First name:</label>
                                        <input type="text" placeholder="Eugene" class="form-control"> --}}
                                    </div>

                                </div>


                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Bölge Seçiniz:</label>
                                        <select data-placeholder="Select your state" id="district_id" name="district_id" class="form-control form-control-select2" data-fouc>
                                            <option disabled="" selected="">Bölge Seçiniz</option>
                                            @foreach ($district as $row )
                                            <option value="{{$row->id}}">{{$row->district_tr}} | {{$row->district_en}}</option>
                                            @endforeach
                                        </select>
                                        @error('district_id')
                                        <span class="text-danger">{{$message}}</span>

                                        @enderror
                                    </div>

                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Alt Bölge Seçiniz:</label>
                                        <select data-placeholder="Select your state" id="subdistrict_id" name="subdistrict_id" class="form-control form-control-select2" data-fouc>
                                            <option disabled="" selected="">Alt Bölge Seçiniz</option>

                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="font-weight-semibold text-success">Haber Anahtar Kelime</label>
                                        <div class="form-group-feedback form-group-feedback-right">
                                            <input id="tokenfield" type="text" name="keywords_tr" class="form-control tokenfield">
                                            <div class="form-control-feedback text-success">
                                                <i class="icon-checkmark-circle"></i>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="font-weight-semibold text-success">Haber Açıklama</label>
                                        <textarea rows="1" cols="1" maxlength="225" class="form-control maxlength-textarea" name="description_tr" placeholder="Açıklama alanı 225 karakterle sınırlandırılmıştır"></textarea>
                                    </div>
                                </div>
                            </div>
{{--
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>ZIP code:</label>
                                        <input type="text" placeholder="1031" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>City:</label>
                                        <input type="text" placeholder="Munich" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Address line:</label>
                                        <input type="text" placeholder="Ring street 12" class="form-control">
                                    </div>
                                </div>
                            </div> --}}

                            {{-- <div class="form-group">
                                <label>Additional message:</label>
                                <textarea rows="5" cols="5" class="form-control" placeholder="Enter your message here"></textarea>
                            </div> --}}
                        </fieldset>
                    </div>
                    <div class="col-md-12">
                        <h3>Haber Etiketleri</h3>
                    </div>

                    <div class="col-md-3 mb-3">

                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" name="headline" value="1" class="form-check-input-styled-primary" data-fouc>
                            Son Dakika
                        </label>
                    </div>
                </div>
                <div class="col-md-3 mb-3">

                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" name="manset" value="1"  class="form-check-input-styled-primary"  data-fouc>
                            Manşet
                        </label>
                    </div>
                </div>   <div class="col-md-3 mb-3">

                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" name="story" value="1"  class="form-check-input-styled-primary"  data-fouc>
                            Story
                        </label>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" name="featured" value="1"  class="form-check-input-styled-primary"  data-fouc>
                            Öne Çıkan Haber
                        </label>
                    </div>
                </div>
                <div class="col-md-3 mb-3">

                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" name="surmanset" value="1"  class="form-check-input-styled-primary"  data-fouc>
                            Sürmanşet

                        </label>
                    </div>
                </div>
                    <div class="col-md-12">
                        <h3>Görsel Etiketleri</h3>
                    </div>
                    <div class="col-md-3 mb-3">

                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" name="headlinetag" value="1"  class="form-check-input-styled-primary" data-fouc>
                                Son Dakika
                            </label>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" name="flahtag" value="1"  class="form-check-input-styled-primary" data-fouc>
                                Flaş Flaş

                            </label>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" name="attentiontag" value="1"  class="form-check-input-styled-primary"  data-fouc>
                                Bu Habere Dikkat!
                            </label>
                        </div>
                    </div>




                    <div class="col-md-12">
                    <div class="form-group">
                        <textarea name="details_tr" id="editor-full" rows="4" cols="4"></textarea>
                        {{-- <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script> --}}
                        <script>
                          var options = {
                            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
                            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
                            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
                            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
                          };
                        </script>
                        <script>
                            CKEDITOR.replace('editor-full', options);
                            </script>
                    </div>
                </div>
                </div>



<!--

                <div class="card-header header-elements-inline">
                    <h5 class="card-title">İNGLİZCE HABER EKLEME</h5>
                    <br>
                    <hr>
                    <div class="header-elements">
                        <div class="list-icons">
                            {{-- <a class="list-icons-item" data-action="collapse"></a>
                            <a class="list-icons-item" data-action="reload"></a>
                            <a class="list-icons-item" data-action="remove"></a> --}}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <fieldset>
                            <legend class="font-weight-semibold"><i class="icon-reading mr-2"></i> Personal details</legend>

                            <div class="form-group">
                                <label>Haber Başlığı:</label>
                                <input type="text" name="title_en" class="form-control" placeholder="Başlık">
                            </div><div class="form-group">
                                <label>Haber Spot Başlığı:</label>
                                <input type="text" name="subtitle_en" class="form-control" placeholder="Spot Başlık">
                            </div>
                            {{-- <div class="form-group">
                                <label>Kategori Seçiniz:</label>
                                <select data-placeholder="Select your state" name="category_id" class="form-control form-control-select2" data-fouc>
                                    <option disabled="" selected="">Kategori Seçiniz</option>
                                    @foreach ($category as $row )
                                    <option value="{{$row->id}}">{{$row->category_tr}} | {{$row->category_en}}</option>
                                    @endforeach
                                </select>
                            </div> --}}
                            {{-- <div class="form-group">
                                <label>Alt Kategori Seçiniz:</label>
                                <select data-placeholder="Select your state" name="subcategory_id" class="form-control form-control-select2" data-fouc>
                                    <option disabled="" selected="">Alt Kategori Seçiniz</option>
                                    @foreach ($category as $row )
                                    <option value="AK">{{$row->category_tr}}</option>
                                    @endforeach

                                </select>
                            </div> --}}
                            {{-- <div class="form-group">
                                <label>Bölge Seçiniz:</label>
                                <select data-placeholder="Select your state" name="district_id" class="form-control form-control-select2" data-fouc>
                                    <option disabled="" selected="">Bölge Seçiniz</option>
                                    @foreach ($district as $row )
                                    <option value="{{$row->id}}">{{$row->district_tr}} | {{$row->district_en}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Alt Bölge Seçiniz:</label>
                                <select data-placeholder="Select your state" name="subdistrict_id" class="form-control form-control-select2" data-fouc>
                                    <option disabled="" selected="">Bölge Seçiniz</option>
                                    @foreach ($district as $row )
                                    <option value="{{$row->id}}">{{$row->district_tr}} | {{$row->district_en}}</option>
                                    @endforeach
                                </select>
                            </div> --}}

                            <div class="form-group">
                                <label class="font-weight-semibold text-success">News Tags</label>
                                <div class="form-group-feedback form-group-feedback-right">
                                    <input id="tokenfield" type="text" name="tags_en" class="form-control tokenfield">
                                    <div class="form-control-feedback text-success">
                                        <i class="icon-checkmark-circle"></i>
                                    </div>
                                </div>
                            </div>


                        </fieldset>
                    </div>

                    <div class="col-md-6">
                        <fieldset>
                            <legend class="font-weight-semibold"><i class="icon-truck mr-2"></i> Shipping details</legend>

                            <div class="row">
                                <div class="col-md-6">
                                    {{-- <div class="form-group">
                                        <label>Attach screenshot:</label>
                                        <input type="file" class="form-input-styled" id="image" data-fouc>
                                    </div> --}}
                                </div>

                                <div class="col-md-6">

                                    {{-- <div class="form-group">
                                        <img src="" id="showimage" alt="">
                                        <label>First name:</label>
                                        <input type="text" placeholder="Eugene" class="form-control">
                                    </div> --}}

                                </div>


                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    {{-- <div class="form-group">
                                        <label>Select District:</label>
                                        <select data-placeholder="Select your state" name="district_id" class="form-control form-control-select2" data-fouc>
                                            <option disabled="" selected="">Bölge Seçiniz</option>
                                            @foreach ($district as $row )
                                            <option value="{{$row->id}}">{{$row->district_tr}} | {{$row->district_en}}</option>
                                            @endforeach
                                        </select>
                                    </div> --}}

                                </div>

                                <div class="col-md-6">
                                    {{-- <div class="form-group">
                                        <label>Select Subdistrict:</label>
                                        <select data-placeholder="Select your state" name="subdistrict_id" class="form-control form-control-select2" data-fouc>
                                            <option disabled="" selected="">Bölge Seçiniz</option>
                                            @foreach ($district as $row )
                                            <option value="{{$row->id}}">{{$row->district_tr}} | {{$row->district_en}}</option>
                                            @endforeach
                                        </select>
                                    </div> --}}
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="font-weight-semibold text-success">News Keywords</label>
                                        <div class="form-group-feedback form-group-feedback-right">
                                            <input id="tokenfield" type="text" name="keywords_en" class="form-control tokenfield">
                                            <div class="form-control-feedback text-success">
                                                <i class="icon-checkmark-circle"></i>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="font-weight-semibold text-success">News Description</label>
                                        <textarea rows="1" cols="1" maxlength="225" class="form-control maxlength-textarea" name="description_en" placeholder="Açıklama alanı 225 karakterle sınırlandırılmıştır"></textarea>
                                    </div>
                                </div>
                            </div>
                            {{--
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label>ZIP code:</label>
                                                                    <input type="text" placeholder="1031" class="form-control">
                                                                </div>
                                                            </div>

                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label>City:</label>
                                                                    <input type="text" placeholder="Munich" class="form-control">
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Address line:</label>
                                                                    <input type="text" placeholder="Ring street 12" class="form-control">
                                                                </div>
                                                            </div>
                                                        </div> --}}

                            {{-- <div class="form-group">
                                <label>Additional message:</label>
                                <textarea rows="5" cols="5" class="form-control" placeholder="Enter your message here"></textarea>
                            </div> --}}
                        </fieldset>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <textarea name="details_en" id="editor1" rows="4" cols="4"></textarea>
                            <script>
                                var options = {
                                    filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
                                    filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
                                    filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
                                    filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
                                };
                            </script>
                            <script>
                                CKEDITOR.replace('editor1', options);
                            </script>
                        </div>
                    </div>
                </div>
                -->




                <div class="text-right">
                    <button type="submit" class="btn btn-primary">Haber Ekle <i class="icon-paperplane ml-2"></i></button>
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
                          url: "{{url('/get/subdistrict/') }}/"+district_id,
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

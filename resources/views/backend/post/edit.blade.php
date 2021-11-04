@extends('admin.admin_master')
@section('admin')
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    @php
        $sub = DB::table('subcategories')->where('category_id',$post->category_id)->get();
        $subdis = DB::table('subdistricts')->where('district_id',$post->district_id)->get();

    @endphp
    <div class="content">

        <!-- 2 columns form -->
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">Haber Düzenle</h5>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>
                        <a class="list-icons-item" data-action="reload"></a>
                        <a class="list-icons-item" data-action="remove"></a>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <form action="{{route('update.post', $post)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" value="{{$post->image}}" name="old_image" class="form-control tokenfield">

                    <div class="row">
                        <div class="col-md-6">
                            <fieldset>
                                <legend class="font-weight-semibold"><i class="icon-reading mr-2"></i> Personal details</legend>

                                <div class="form-group">
                                    <label>Haber Başlığı:</label>
                                    <input type="text" name="title_tr" value="{{$post->title_tr}}" class="form-control" placeholder="Başlık">
                                </div><div class="form-group">
                                    <label>Haber Spot Başlığı:</label>
                                    <input type="text" name="subtitle_tr" value="{{$post->subtitle_tr}}" class="form-control" placeholder="Başlık">
                                </div>
                                <div class="form-group">
                                    <label>Video Haber Linki:</label>
                                    <input type="text" name="posts_video" value="{{$post->posts_video}}" class="form-control" placeholder="youtube iframe">
                                </div>
                                <div class="form-group">
                                    <label>Kategori Seçiniz:</label>
                                    <select data-placeholder="Select your state" name="category_id" class="form-control form-control-select2" data-fouc>
                                        {{-- {{if($post->category_id == $category->id) {}}} --}}
                                        <option disabled="" selected="">Kategori Seçiniz</option>
                                        @foreach ($category as $row )
                                            <option @php if($row->id == $post->category_id ) { echo "selected";} @endphp value="{{$row->id}}">{{$row->category_tr}} | {{$row->category_en}}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                    <span class="text-danger">{{$message}}</span>

                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Alt Kategori Seçiniz:</label>
                                    <select data-placeholder="Select your state" id="subcategory_id" name="subcategory_id" class="form-control form-control-select2" data-fouc>
                                        @foreach ($sub as $row )
                                            <option @php if($row->id == $post->subcategory_id ) { echo "selected";} @endphp value="{{$row->id}}">{{$row->subcategory_tr}} | {{$row->subcategory_en}}</option>
                                        @endforeach

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
                                {{--                            {{dd($tags)}}--}}
                                {{--                            $tag->pluck('name')->implode(",")--}}
                                {{--                            {{ $say=count($tags)  }}--}}
                                <div class="form-group">
                                    <label class="font-weight-semibold text-success">Haber Etiketleri</label>
                                    <div class="form-group-feedback form-group-feedback-right">
                                        <input id="tokenfield" type="text" autocomplete="true" name="tag[]" value="{{ $tags->pluck('name')->implode(',') }}"  class="form-control tokenfield">
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
                                            <img width="100%" src="{{!empty($post->image)? url($post->image):url('upload/no_news_image.jpg')}}" id="showImage" alt="">
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
                                                    <option @php if($row->id == $post->district_id ) { echo "selected";} @endphp value="{{$row->id}}">{{$row->district_tr}} | {{$row->district_en}}</option>
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
                                                @foreach ($subdis as $row )
                                                    <option @php if($row->id == $post->subdistrict_id ) { echo "selected";} @endphp value="{{$row->id}}">{{$row->subdistrict_tr}} | {{$row->subdistrict_en}}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="font-weight-semibold text-success">Haber Anahtar Kelime</label>
                                            <div class="form-group-feedback form-group-feedback-right">
                                                <input id="tokenfield" type="text" value="{{$post->keywords_tr}}" name="keywords_tr" class="form-control tokenfield">
                                                <div class="form-control-feedback text-success">
                                                    <i class="icon-checkmark-circle"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="font-weight-semibold text-success">Haber Açıklama</label>
                                            <textarea rows="1" cols="1" maxlength="225" class="form-control maxlength-textarea" name="description_tr" placeholder="Açıklama alanı 225 karakterle sınırlandırılmıştır">{{$post->description_tr}}</textarea>
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
                            <h3>Haber Alanları</h3>
                        </div>
                        <div class="col-md-3 mb-3">

                            <div class="form-check">
                                <label class="form-check-label">

                                    <input type="checkbox"  name="headline" value="1" @php if($post->headline==1) {echo "checked";} @endphp class="form-check-input-styled-primary"  data-fouc>
                                    Son Dakika
                                </label>
                            </div>
                            {{-- <div class="form-check ">
                                <label class="form-check-label" for="dugme{{$post->id}}1">
                                    <input type="checkbox" class="form-check-input-switchery aktifpasif{{$post->id}}" id="dugme{{$post->id}}1" value="{{$post->id}}"  data-fouc onclick="aktifpasif({{$post->id}},'haber');">
                                    <input data-id="{{$post->id}}" class="form-check-input-switchery aktifpasif" type="checkbox"  data-onstyle="success" data-offstyle="danger"   data-fouc data-toggle="toggle" data-on="Active" data-off="InActive" {{ $post->headline ? 'checked' : '' }}>

                                </label>
                            </div> --}}
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" name="manset" value="1" @php if($post->manset==1) {echo "checked";}@endphp class="form-check-input-styled-primary"  data-fouc>
                                    Manşet
                                </label>
                            </div>
                        </div>  <div class="col-md-3 mb-3">

                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" name="story" value="1" @php if($post->story==1) {echo "checked";}@endphp class="form-check-input-styled-primary"  data-fouc>
                                    Story
                                </label>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">

                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" name="featured" value="1" @php if($post->featured==1) {echo "checked";}@endphp class="form-check-input-styled-primary"  data-fouc>
                                    Öne Çıkan Haber
                                </label>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">

                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" name="surmanset" value="1"  @php if($post->surmanset==1) {echo "checked";}@endphp class="form-check-input-styled-primary"  data-fouc>
                                    Sürmanşet

                                </label>
                            </div>
                        </div>







                        <div class="col-md-12">
                            <h3>Görsel Etiketleri</h3>
                        </div>
                        <div class="col-md-3 mb-3">
                            {{--                        <label class="custom-control custom-control-warning custom-radio mb-2">--}}
                            {{--                            <input type="radio" class="custom-control-input" name="radio_contextual_colors">--}}
                            {{--                            <span class="custom-control-label">Warning</span>--}}
                            {{--                        </label>--}}
                            <label class="custom-control custom-control-warning custom-radio mb-2">
                                <input type="radio" name="headlinetag" value="1"  @php if($post->headlinetag==1) {echo "checked";} @endphp class="custom-control-input"  data-fouc>
                                <span class="custom-control-label">Son Dakika</span>
                            </label>

                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="form-radio">
                                <label class="custom-control custom-control-warning custom-radio mb-2">
                                    <input type="radio" name="flahtag" value="1"  @php if($post->flahtag==1) {echo "checked";} @endphp class="custom-control-input"  data-fouc>
                                    <span class="custom-control-label"> Flaş Flaş</span>

                                </label>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="form-radio">
                                <label class="custom-control custom-control-warning custom-radio mb-2">
                                    <input type="radio" name="attentiontag" value="1"  @php if($post->attentiontag==1) {echo "checked";}@endphp class="custom-control-input"  data-fouc>
                                    <span class="custom-control-label">Bu Habere Dikkat!</span>
                                </label>
                            </div>
                        </div>



                        <div class="col-md-12">
                            <div class="form-group">
                                <textarea name="details_tr" id="editor-full" rows="4" cols="4">{{$post->details_tr}}</textarea>
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








                <!-- <div class="card-header header-elements-inline">
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
                            <input type="text" name="title_en" value="{{$post->title_en}}" class="form-control" placeholder="Başlık">
                            </div><div class="form-group">
                                <label>Haber Spot Başlığı:</label>
                                <input type="text" name="subtitle_en" value="{{$post->subtitle_en}}" class="form-control" placeholder="Başlık">
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
                            <input id="tokenfield" type="text" name="tags_en"  value="{{$post->tags_en}}" class="form-control tokenfield">
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
                                <input id="tokenfield" type="text" name="keywords_en" value="{{$post->keywords_en}}" class="form-control tokenfield">
                                            <div class="form-control-feedback text-success">
                                                <i class="icon-checkmark-circle"></i>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="font-weight-semibold text-success">News Description</label>
                                        <textarea rows="1" cols="1" maxlength="225" class="form-control maxlength-textarea"   value="{{$post->description_en}}"  name="description_en" placeholder="Açıklama alanı 225 karakterle sınırlandırılmıştır"></textarea>
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
                        <textarea name="details_en" id="editor1" rows="4" cols="4">{{$post->details_en}}</textarea>
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
                        <button type="submit" class="btn btn-primary">Haber Düzenle <i class="icon-paperplane ml-2"></i></button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /2 columns form -->
    </div>
    {{-- <script type="text/javascript">
        $(document).ready(function() {
    //   $(function() {
        $('.aktifpasif').change(function() {
            var headline = $(this).prop('checked') == true ? 1 : 0;
            var post_id = $(this).data('id');

            $.ajax({
                type: "GET",
                dataType: "json",
                url: "{{  url('/changestatus/') }}/"+post_id,
                // data: {'headline': headline, 'post_id': post_id},
                success: function(data){
                  console.log(data.success)
                }
            });
        })
      })
    </script> --}}
    <!--Yüklenen resmi otomatik olarak gösterir-->
    <script >
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
    <!--- radio butonlarının bir defa seçilmesini sağlıyor -->
        <script>
            $(document).ready(function () {
                $('input[type=radio]').change(function() {
                    // When any radio button on the page is selected,
                    // then deselect all other radio buttons.
                    $('input[type=radio]:checked').not(this).prop('checked', false);
                });
            });
        </script>
@endsection

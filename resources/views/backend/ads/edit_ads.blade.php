@extends('admin.admin_master')
@section('admin')

    <div class="content">

        <!-- 2 columns form -->
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">Reklam Ekle</h5>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>
                        <a class="list-icons-item" data-action="reload"></a>
                        <a class="list-icons-item" data-action="remove"></a>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <form action="{{route('update.ads',$ads)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="text" value="{{$ads->ads}}" name="old_image" class="form-control tokenfield">

                    <div class="row">
                        <div class="col-md-6">
                            <fieldset>
                                <legend class="font-weight-semibold"><i class="icon-reading mr-2"></i>Fotoğraf Ekle</legend>

                                <div class="form-group">
                                    <label>Reklam Linki:</label>
                                    <input type="text" name="link" class="form-control" value="{{$ads->link}}" placeholder="Link">
                                </div>
                                <div class="form-group">
                                    <label>Reklam Alanı:</label>
                                    <select data-placeholder="Select your state" name="category_id" class="form-control form-control-select2" data-fouc>
                                        <option disabled="" selected="">Kategori Seçiniz</option>
                                        @foreach ($category as $row )
                                            <option @php if($row->id == $ads->category_id ) { echo "selected";} @endphp value="{{$row->id}}">{{$row->title}}</option>
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
                                <legend class="font-weight-semibold"><i class="icon-truck mr-2"></i> Diğer</legend>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Attach screenshot:</label>
                                            <input type="file" class="form-input-styled" multiple name="ads"  id="image" data-fouc>
                                            @error('ads')
                                            <span class="text-danger">{{$message}}</span>

                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Reklam Tip</label>
                                            <select data-placeholder="Select your state" name="type" class="form-control form-control-select2" data-fouc>
                                                <option @php if( $ads->type == 1 ) { echo "selected";} @endphp value="1">Banner Reklam</option>
                                                <option @php if( $ads->type == 2 ) { echo "selected";} @endphp value="2">Adsense Reklam</option>

                                            </select>
                                            @error('type')
                                            <span class="text-danger">{{$message}}</span>

                                            @enderror
                                        </div>

                                        {{-- <div class="form-group">
                                            <img width="100%" src="{{url('image/no_news_image.png')}}" id="showImage" alt="">

                                        </div> --}}

                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group text-center">
                                            <img width="728" class="img-fluid text-center" src="{{asset($ads->ads)}}" alt="">
                                        </div>
                                    </div>


                                </div>
                        </div>






                    </div>

                    <div class="form-group">
                        <textarea class="form-control" name="ad_code" rows="4" cols="4">{{$ads->ad_code}}</textarea>

                    </div>




                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Reklam Ekle <i class="icon-paperplane ml-2"></i></button>
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


@endsection

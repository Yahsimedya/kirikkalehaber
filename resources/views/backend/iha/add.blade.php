@extends('admin.admin_master')
@section('admin')
    @php
        error_reporting(1);
    @endphp







    <div class="content">
        <div class="card">
            <div class="card-body">


                <form action="{{route('post.iha')}}" method="POST">

                    @csrf
                    <div class="form-group row">
                        <div class="col-md-4">
                            <label>Şehir</label><br/>
                            <select name="sehir" id="" class="form-control">
                                <option value="0">hepsi</option>
                                <?php
                                for ($i = 0; $i < 80; $i++) { ?>
                                <option value="1">Adana</option>
                                <option value="40">Adıyaman</option>
                                <option value="82">Afyonkarahisar</option>
                                <option value="73">Ağrı</option>
                                <option value="55">Aksaray</option>
                                <option value="64">Amasya</option>
                                <option value="6">Ankara</option>
                                <option value="7">Antalya</option>
                                <option value="58">Ardahan</option>
                                <option value="71">Artvin</option>
                                <option value="12">Aydın</option>
                                <option value="16">Balıkesir</option>
                                <option value="79">Bartın</option>
                                <option value="33">Batman</option>
                                <option value="36">Bayburt</option>
                                <option value="21">Bilecik</option>
                                <option value="76">Bingöl</option>
                                <option value="74">Bitlis</option>
                                <option value="61">Bolu</option>
                                <option value="10">Burdur</option>
                                <option value="15">Bursa</option>
                                <option value="17">Çanakkale</option>
                                <option value="24">Çankırı</option>
                                <option value="23">Çorum</option>
                                <option value="9">Denizli</option>
                                <option value="27">Diyarbakır</option>
                                <option value="62">Düzce</option>
                                <option value="44">Edirne</option>
                                <option value="28">Elazığ</option>
                                <option value="35">Erzincan</option>
                                <option value="34">Erzurum</option>
                                <option value="18">Eskişehir</option>
                                <option value="38">Gaziantep</option>
                                <option value="69">Giresun</option>
                                <option value="37">Gümüşhane</option>
                                <option value="75">Hakkari</option>
                                <option value="2">Hatay</option>
                                <option value="59">Iğdır</option>
                                <option value="11">Isparta</option>
                                <option value="43">İstanbul</option>
                                <option value="46">İzmir</option>
                                <option value="3">Kahramanmaraş</option>
                                <option value="80">Karabük</option>
                                <option value="56">Karaman</option>
                                <option value="57">Kars</option>
                                <option value="26">Kastamonu</option>
                                <option value="48">Kayseri</option>
                                <option value="25">Kırıkkale</option>
                                <option value="81">Kırklareli</option>
                                <option value="52">Kırşehir</option>
                                <option value="42">Kilis</option>
                                <option value="20">Kocaeli</option>
                                <option value="53">Konya</option>
                                <option value="19">Kütahya</option>
                                <option value="41">Malatya</option>
                                <option value="47">Manisa</option>
                                <option value="29">Mardin</option>
                                <option value="4">Mersin</option>
                                <option value="14">Muğla</option>
                                <option value="77">Muş</option>
                                <option value="50">Nevşehir</option>
                                <option value="54">Niğde</option>
                                <option value="65">Ordu</option>
                                <option value="5">Osmaniye</option>
                                <option value="70">Rize</option>
                                <option value="60">Sakarya</option>
                                <option value="63">Samsun</option>
                                <option value="30">Siirt</option>
                                <option value="66">Sinop</option>
                                <option value="49">Sivas</option>
                                <option value="39">Şanlıurfa</option>
                                <option value="31">Şırnak</option>
                                <option value="45">Tekirdağ</option>
                                <option value="67">Tokat</option>
                                <option value="68">Trabzon</option>
                                <option value="32">Tunceli</option>
                                <option value="13">Uşak</option>
                                <option value="72">Van</option>
                                <option value="22">Yalova</option>
                                <option value="51">Yozgat</option>
                                <option value="78">Zonguldak</option>


                                <?php }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label>Üst Kategori</label><br/>

                            <select name="ustkategori" id="" class="form-control">
                                <option value="0">Hepsi</option>
                                <option value="1">Ulusal</option>
                                <option value="2">Yerel</option>
                                <option value="3">Dış</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label>Kategori</label><br/>

                            <select name="kategori" id="" class="form-control">
                                <option value="0">Hepsi</option>
                                <option value="2">Magazin</option>
                                <option value="3">Spor</option>
                                <option value="4">Politika</option>
                                <option value="5">Asayiş</option>
                                <option value="6">Dünya</option>
                                <option value="8">Genel</option>
                                <option value="9">Ekonomi</option>
                                <option value="11">Haberde İnsan</option>
                                <option value="12">Sağlık</option>
                                <option value="13">Eğitim</option>
                                <option value="14">Bilim Ve Teknoloji</option>
                                <option value="15">Kültür Sanat</option>
                                <option value="16">Çevre</option>

                            </select>
                        </div>

                    </div>
                    <div class="form-group">
                        <div class="col-md-2 float-right p-0">
                            <button class="btn btn-success" type="submit" style="width:100%;">Haber Getir</button>
                        </div>
                    </div>

                </form>


            </div>
            @for($i=1;$i<=$count;$i++)

                <form method="POST" action="{{route('addpage.ihaInsert')}}">
                    @csrf
                    <div class="form-group">
                        <div class="col-md-12" style="margin-top:40px;">
                            <label><b>Haber Başlık<b></b></b></label><b><b>


                                    <input type="hidden" name="image" value="{{$news[$i]['resim']['image']}}">

                                    <div class="row">

                                        <div class="col-xs-12 col-md-12">
                                            <input type="text" id="pcinput" name="title_tr" class="form-control"
                                                   value="{{$news[$i]['title']}}">
                                        </div>


                                        <div class="col-xs-12 col-md-12">
                                            <label>Haber Kategori</label>
                                            <input type="hidden" name="user_id" value="{{Auth::id()}}">
                                            <select name="category_id" id="" class="form-control">

                                                @foreach ($category as $kategori )
                                                    <option
                                                        value="{{$kategori->id}}">{{$kategori->category_tr}}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                        <div class="col-xs-12 col-md-12">
                                            <label>İller </label>
                                            <input type="hidden" name="user_id" value="{{Auth::id()}}">
                                            <select name="district" id="" class="form-control">
                                                <option value="{{$news[$i]['Sehir'][0]->id}}">{{$news[$i]['Sehir'][0]->district_tr}}</option>

                                                @foreach ($district as $districts  )
                                                    <option value="{{$districts->id}}">{{$districts->district_tr}}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                        <div class="col-xs-12 col-md-12">
                                            <label>Haber Detay</label>

                                            <textarea id="" class="form-control" name="details_tr" rows="3">{{$news[$i]['description']}}
</textarea>

                                        </div>

                                    </div>
                                </b></b></div>
                        <b><b>
                            </b></b></div>
                    <b><b>
                            <hr>

                            <div class="col-md-12"></div>
                            <div class="col-md-12"><h5><b>Foto İndir</b></h5></div>

                            <div class="row">

                                @for($k=1;$k<=1;$k++)


                                    <input type="hidden" name="orderImages{{$k}}"
                                           value="{{$news[$i]['resim']['image'][$k-1]}}">





                                    <div class="col-md-3 pb-2"><label>


                                            <img width="100%"
                                                 style="padding-top:20px;max-height:200px; min-height:200px;"
                                                 src="{{$news[$i]['resim']['image'][$k-1]}}"></label>
                                        <div><a class="btn btn-info w-100" style="padding:10px 0px; width:100%;"
                                                href="{{$news[$i]['resim']['image'][$k-1]}}">Foto
                                                İndir-{{$k}}</a></div>
                                    </div>
                                    <input type="hidden" name="orderImagesitem" value="{{$k}}">
                                @endfor

                            </div>

                            @if($news[$i]['video']->video->path_video!="")
                                <div class="row"><h5><b>Video İndir</b></h5></div>
                                <div class="row">


                                    <div class="col-md-3">
                                        <img width="100%"
                                             src="{{$news[$i]['video']->video->path_poster}}">
                                        <a class="btn btn-danger w-100" style="padding:10px 0px; width:100%;"
                                           href="{{$news[$i]['video']->video->path_video}}">Video
                                            İndir</a>
                                    </div>


                                </div>@endif

                            <div class="col-md-2 float-right" align="center">
                                <button class="btn btn-success" name="botinsert" type="submit" style="width:100%;">
                                    Ekle
                                </button>
                            </div>
                            <br>
                            <hr>


                        </b></b></form>
























            @endfor


        </div>

    </div>
























@endsection

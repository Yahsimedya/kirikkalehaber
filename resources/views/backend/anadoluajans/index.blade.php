@extends('admin.admin_master')
@section('admin')
    @php
        error_reporting(1);
    @endphp
    <div class="content">
        <div class="card">
            <div class="card-body">
                <form action="{{route('anadoluajans.add')}}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <div class="col-md-4">
                            <label>Şehir</label><br/>
                            <select name="sehir" id="" class="form-control">
                                <option value="all">hepsi</option>
                                <?php
                                for ($i = 0; $i < 80; $i++) { ?>
                                <option value="Adana">Adana</option>
                                <option value="Adıyaman">Adıyaman</option>
                                <option value="Afyonkarahisar">Afyonkarahisar</option>
                                <option value="Ağrı">Ağrı</option>
                                <option value="Aksaray">Aksaray</option>
                                <option value="Amasya">Amasya</option>
                                <option value="Ankara">Ankara</option>
                                <option value="Antalya">Antalya</option>
                                <option value="Ardahan">Ardahan</option>
                                <option value="Artvin">Artvin</option>
                                <option value="Aydın">Aydın</option>
                                <option value="Balıkesir">Balıkesir</option>
                                <option value="Bartın">Bartın</option>
                                <option value="Batman">Batman</option>
                                <option value="Bayburt">Bayburt</option>
                                <option value="Bilecik">Bilecik</option>
                                <option value="Bingöl">Bingöl</option>
                                <option value="Bitlis">Bitlis</option>
                                <option value="Bolu">Bolu</option>
                                <option value="Burdur">Burdur</option>
                                <option value="Bursa">Bursa</option>
                                <option value="Çanakkale">Çanakkale</option>
                                <option value="Çankırı">Çankırı</option>
                                <option value="Çorum">Çorum</option>
                                <option value="Denizli">Denizli</option>
                                <option value="Diyarbakır">Diyarbakır</option>
                                <option value="Düzce">Düzce</option>
                                <option value="Edirne">Edirne</option>
                                <option value="Elazığ">Elazığ</option>
                                <option value="Erzincan">Erzincan</option>
                                <option value="Erzurum">Erzurum</option>
                                <option value="Eskişehir">Eskişehir</option>
                                <option value="Gaziantep">Gaziantep</option>
                                <option value="Giresun">Giresun</option>
                                <option value="Gümüşhane">Gümüşhane</option>
                                <option value="Hakkari">Hakkari</option>
                                <option value="Hatay">Hatay</option>
                                <option value="Iğdır">Iğdır</option>
                                <option value="Isparta">Isparta</option>
                                <option value="İstanbul">İstanbul</option>
                                <option value="İzmir">İzmir</option>
                                <option value="Kahramanmaraş">Kahramanmaraş</option>
                                <option value="Karabük">Karabük</option>
                                <option value="Karaman">Karaman</option>
                                <option value="Kars">Kars</option>
                                <option value="26">Kastamonu</option>
                                <option value="Kastamonu">Kayseri</option>
                                <option value="Kırıkkale">Kırıkkale</option>
                                <option value="Kırklareli">Kırklareli</option>
                                <option value="Kırşehir">Kırşehir</option>
                                <option value="Kilis">Kilis</option>
                                <option value="Kocaeli">Kocaeli</option>
                                <option value="Konya">Konya</option>
                                <option value="Kütahya">Kütahya</option>
                                <option value="Malatya">Malatya</option>
                                <option value="Manisa">Manisa</option>
                                <option value="Mardin">Mardin</option>
                                <option value="Mersin">Mersin</option>
                                <option value="Muğla">Muğla</option>
                                <option value="Muş">Muş</option>
                                <option value="Nevşehir">Nevşehir</option>
                                <option value="Niğde">Niğde</option>
                                <option value="Ordu">Ordu</option>
                                <option value="Osmaniye">Osmaniye</option>
                                <option value="Rize">Rize</option>
                                <option value="Sakarya">Sakarya</option>
                                <option value="Samsun">Samsun</option>
                                <option value="Siirt">Siirt</option>
                                <option value="Sinop">Sinop</option>
                                <option value="Sivas">Sivas</option>
                                <option value="Şanlıurfa">Şanlıurfa</option>
                                <option value="Şırnak">Şırnak</option>
                                <option value="Tekirdağ">Tekirdağ</option>
                                <option value="Tokat">Tokat</option>
                                <option value="Trabzon">Trabzon</option>
                                <option value="Tunceli">Tunceli</option>
                                <option value="Uşak">Uşak</option>
                                <option value="Van">Van</option>
                                <option value="Yalova">Yalova</option>
                                <option value="Yozgat">Yozgat</option>
                                <option value="Zonguldak">Zonguldak</option>


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
            <center>{{$message}}</center>
            @foreach($newss as $news)

                <form method="POST" action="{{route('anadoluajans.insert')}}">
                    @csrf
                    <div class="form-group">
                        <div class="col-md-12" style="margin-top:40px;">
                            <label><b>Haber Başlık<b></b></b></label><b><b>


                                    <input type="hidden" name="image" value="">

                                    <div class="row">

                                        <div class="col-xs-12 col-md-12">
                                            <input type="text" id="pcinput" name="title_tr" class="form-control"
                                                   value="{{$news['title']}}">
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
                                            <label>Haber Detay</label>

                                            <textarea id="" class="form-control" name="details_tr" rows="3">{{$news['content']}}
</textarea>

                                        </div>

                                    </div>
                                </b></b></div>
                        <b><b>
                            </b></b></div>
                    <b><b>
                            <hr>

                            <div class="col-md-12"></div>


                            <div class="row">


                            </div>


                            <div class="col-md-2 float-right" align="center">
                                <button class="btn btn-success" name="botinsert" type="submit" style="width:100%;">
                                    Ekle
                                </button>
                            </div>
                            <br>
                            <hr>


                        </b></b></form>




            @endforeach


        </div>

    </div>


@endsection

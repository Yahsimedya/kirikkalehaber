@extends('admin.admin_master')
@section('admin')


    <section class="content">
        <div class="content-header">
            <h1>Kullanıcı Güncelle</h1>
            <div align="right">


            </div>
        </div>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            <form action="{{route('setting.userupdate')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">

                    <div class="row">

                        <div class="col-lg-6"><label>İHA RSS Kullanıcı Kodu</label>
                            <input type="text" value="{{$data->iha_usercode}}" name="iha_usercode" required=""
                                   class="form-control">
                            <input type="hidden" value="{{$data->id}}" name="id" required="" class="form-control">
                        </div>
                        <div class="col-lg-6"><label>İHA Kullanıcı Adı</label>


                            <input type="text" value="{{$data->iha_username}}" name="iha_username" required=""
                                   class="form-control">
                        </div>
                    </div>
                </div>


                <div class="form-group">

                    <div class="row">
                        <div class="col-lg-6"><label>İHA Şifre</label>
                            <input type="password" value="{{$data->iha_password}}" name="iha_password" required=""
                                   class="form-control">
                        </div>
                        <div class="col-lg-6"><label>İHA Rss Şifre</label>
                            <input type="password" value="{{$data->iha_rss}}" name="iha_rss" required=""
                                   class="form-control">
                        </div>
                    </div>


                </div>
                <div class="form-group">
                    <div class="row">

                        <div class=" col-lg-6">
                            <label class="form-check-label">
                                Otomatik Haber Botu Şehir
                                <input type="checkbox" name="auto_Bot" class="form-input-switchery"
                                       @if($data->auto_Bot==1) checked @endif data-fouc>
                            </label>
                        </div>
                        <div class="col-lg-6">
                            <label class="form-check-label">

                                Otomatik Haber Botu
                                <select name="district" id="" class="form-control">
                                    <option value="{{$data->district}}">{{$data->district}}</option>

                                <?php
                                    for ($i = 0; $i < 80; $i++) { ?>
                                    <option value="0">hepsi</option>
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
                            </label>
                        </div>
                    </div>
                </div>


                <div align="right" class="box-footer">
                    <button type="submit" class="btn btn-success" name="iha_insert">Güncelle</button>
                </div>
            </form>

        </div>
    </section>




@endsection

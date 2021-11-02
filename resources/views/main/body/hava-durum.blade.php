@php


    $sehir = $_POST["ilsec"];

    $bul = $sehir;
    $bulunacak = array('ç', 'Ç', 'ı', 'ğ', 'Ğ', 'ü', 'İ', 'ö', 'Ş', 'ş', 'Ö', 'Ü', ',', ' ', '(', ')', '[', ']');
    $degistir  = array('c', 'C', 'i', 'g', 'G', 'u', 'I', 'o', 'S', 's', 'O', 'U', '', '_', '', '', '', '');
    $sonuc = str_replace($bulunacak, $degistir, $bul);
    $sonuc;
    //  $sehir=$degistir;

    $site = file_get_contents("https://www.mgm.gov.tr/FTPDATA/analiz/GunlukTahmin.xml");
    $veri = simplexml_load_string($site);
    echo $veri->ilceler[4]->ilce." ilçesinin hava durumu: ".$veri->ilceler[4]->Durum;
    $nere = $sehir_ad;
    foreach ($veri->Merkez as $data) {
        if ($data->ilEn == $sonuc) {
            $Birgundurum = degistir($data->d1);
            $Ikigundurum = degistir($data->d2);
            $Ucgundurum = degistir($data->d3);

            $day1 = $data->makk1 . " / " . $data->minn1 . " ";
            $day2 = $data->makk2 . " / " . $data->minn2 . " ";
            $day3 = $data->makk3 . " / " . $data->minn3 . " ";

            // echo "".$data->Mak." ° / ".$data->Min." ° ;";
            // echo $data->Durum;
            // echo "
            // $nere; genel durumu: ".$veri->Kemo->GenelDurum;
        }
    }

    $tarih1 = Date("m/d/Y");
    list($tarih, $saat) = explode(' ', $tarih1);

    $sonrakigun = iconv('latin5', 'utf-8', strftime(' %d %B %Y %A ', strtotime('1 day', strtotime($tarih))));
    echo '
<div class="row mt-3 mb-3" >

<div class="col-md-4 pt-5 pb-5 bg-white shadow text-center">
    <h2 class="font-weight-bold text-danger">' . $sehir . '</h2>
    <h2 class="pb-3 font-weight-normal text-info text-danger">' . $day1 . ' &#8451;</h2>
    <h2 class="font-weight-light text-danger">' . $Birgundurum . '</h2>
</div>
<div class="col-md-4 text-center">
    <div class="border bg-white shadow border-info">
    <h2 class=" border-bottom border-info p-3">' . iconv('latin5', 'utf-8', strftime('%A ', strtotime('1 day', strtotime($tarih)))) . '</h2>
    <img class="img-fluid pt-3 pb-3" src="img/hava-durumu.png"/>
    <p class="font-weight-light">' . $Ikigundurum . '</p>
    <h2 class="pb-3 font-weight-normal text-info">' . $day2 . ' &#8451;</h2>
</div>
</div>
<div class="col-md-4 text-center">
    <div class="border bg-white shadow border-info">
    <h2 class=" border-bottom border-info p-3">' . iconv('latin5', 'utf-8', strftime('%A ', strtotime('2 day', strtotime($tarih)))) . '</h2>
    <img class="img-fluid pt-3 pb-3" src="img/hava-durumu.png"/>
    <p class="font-weight-light">' . $Ucgundurum . '</p>
    <h2 class="pb-3 font-weight-normal text-info">' . $day3 . ' &#8451;</h2>
</div>
</div>
</div>
';
    // echo "<pre>";
    // print_r($veri);
    // echo "</pre>";
@endphp

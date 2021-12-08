<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Post;
use App\Models\Sehirler;
use App\Models\Tag;
use App\Models\Vakitler;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class AjaxController extends Controller
{


    //
    public function HavaDurumu(Request $request)
    {
//
//
        $site = file_get_contents("https://www.mgm.gov.tr/FTPDATA/analiz/GunlukTahmin.xml");
        $veri = simplexml_load_string($site);
//
        $gelenil = $request->ilsec;
        $bul = $gelenil;
        $bulunacak = array('ç', 'Ç', 'ı', 'ğ', 'Ğ', 'ü', 'İ', 'ö', 'Ş', 'ş', 'Ö', 'Ü', ',', ' ', '(', ')', '[', ']');
        $degistir = array('c', 'C', 'i', 'g', 'G', 'u', 'I', 'o', 'S', 's', 'O', 'U', '', '_', '', '', '', '');
        $sonuc = str_replace($bulunacak, $degistir, $bul);
        $sonuc;
////        echo $veri->ilceler[4]->ilce." ilçesinin hava durumu: ".$veri->ilceler[4]->Durum;
        function degistir($string)
        {

            $string = str_replace("SCK", "Sıcak", $string);
            $string = str_replace("AB", "Az Bulutlu", $string);
            $string = str_replace("HSY", "Hafif Sağnak Yağış", $string);
            $string = str_replace("PB", "Parçalı Bulutlu", $string);
            $string = str_replace("GSY", "Gökgürltülü Sağnak Yağışlı", $string);
            $string = str_replace("KGY", "Kuvvetli Gökgürltülü Sağnak Yağışlı", $string);
            $string = str_replace("MSY", "Mevzi Sağnak Yağışlı", $string);

            // $string =str_replace("afyonkarahisar","afyon",$string);
            // $string =str_replace("Gök Gürültülü Sağnak Yağışlı","Sağnak Yağışlı",$string);


            return $string;
        }

        foreach ($veri->Merkez as $data) {
            if ($data->ilEn == $sonuc) {
                if ($data->d1 == "GSY") {
                    $icon = '<i class="wi wi-night-thunderstorm"></i>';
                } elseif ($data->d1 == "SCK") {
                    $icon = '<i class="wi wi-day-sunny"></i>';
                } elseif ($data->d1 == "KGY") {
                    $icon = '<i class="wi wi-night-thunderstorm"></i>';
                } elseif ($data->d1 == "AB") {
                    $icon = '<i class="wi wi-cloudy"></i>';
                } elseif ($data->d1 == "PB") {
                    $icon = '<i class="wi wi-day-cloudy-windy"></i>';
                } elseif ($data->d1 == "HSY") {
                    $icon = '<i class="wi wi-night-rain"></i>';
                } elseif ($data->d1 == "MSY") {
                    $icon = '<i class="wi wi-night-rain"></i>';
                }
                if ($data->d2 == "GSY") {
                    $iconIki = '<i class="wi wi-night-thunderstorm"></i>';
                } elseif ($data->d1 == "SCK") {
                    $iconIki = '<i class="wi wi-day-sunny"></i>';
                } elseif ($data->d2 == "KGY") {
                    $iconIki = '<i class="wi wi-night-thunderstorm"></i>';
                } elseif ($data->d2 == "AB") {
                    $iconIki = '<i class="wi wi-cloudy"></i>';
                } elseif ($data->d2 == "PB") {
                    $iconIki = '<i class="wi wi-day-cloudy-windy"></i>';
                } elseif ($data->d2 == "HSY") {
                    $iconIki = '<i class="wi wi-night-rain"></i>';
                } elseif ($data->d2 == "MSY") {
                    $iconIki = '<i class="wi wi-night-rain"></i>';
                }
                if ($data->d3 == "GSY") {
                    $iconUc = '<i class="wi wi-night-thunderstorm"></i>';
                } elseif ($data->d3 == "SCK") {
                    $iconUc = '<i class="wi wi-day-sunny"></i>';
                } elseif ($data->d3 == "KGY") {
                    $iconUc = '<i class="wi wi-night-thunderstorm"></i>';
                } elseif ($data->d3 == "AB") {
                    $iconUc = '<i class="wi wi-cloudy"></i>';
                } elseif ($data->d3 == "PB") {
                    $iconUc = '<i class="wi wi-day-cloudy-windy"></i>';
                } elseif ($data->d3 == "HSY") {
                    $iconUc = '<i class="wi wi-night-rain"></i>';
                } elseif ($data->d3 == "MSY") {
                    $iconUc = '<i class="wi wi-night-rain"></i>';
                }
                $Birgundurum = degistir($data->d1);
                $Ikigundurum = $data->d2;
                $Ucgundurum = $data->d3;

                $day1 = $data->makk1;
                $day2 = $data->makk2 . " / " . $data->minn2 . " ";
                $day3 = $data->makk3 . " / " . $data->minn3 . " ";

                // echo "".$data->Mak." ° / ".$data->Min." ° ;";
                // echo $data->Durum;
                // echo "
                // $nere; genel durumu: ".$veri->Kemo->GenelDurum;
            }
        }
//
////        $tarih1 = Date("m/d/Y");
////        list($tarih, $saat) = explode(' ', $tarih1);
//
////        $sonrakigun = iconv('latin5', 'utf-8', strftime(' %d %B %Y %A ', strtotime('1 day', strtotime($tarih))));
//
//        return view('main.body.hava-durumu', compact('Birgundurum','Ikigundurum','Ucgundurum','day1','day2','day3','data','site','sehir'));

        $veri = response()->json([
            'icon' => $icon,
            'gelenil' => $gelenil,
            '1. gun sıcaklık' => $day1,
            '2. gun sıcaklık' => $day2,
            '3. gun sıcaklık' => $day3,
        ], 200);
        return $data = '<div class="row mt-3 mb-3" >

<div class="col-md-4 pt-5 pb-5 bg-white shadow text-center">
    <h2 class="font-weight-bold text-danger">' . $gelenil . '</h2>
                <h4 class="  p-3">' . Carbon::now()->locale('tr')->dayName . '</h4>

    <h2 class="pb-3 font-weight-normal text-info text-danger">' . $day1 . ' &#8451;</h2>
    <h2 class="font-weight-light text-danger">' . $icon . '' . degistir($Birgundurum) . '</h2>
</div>
<div class="col-md-4 text-center">
    <div class="border bg-white shadow border-info">
    <h2 class=" border-bottom border-info p-3">' . Carbon::now()->addDays(1)->locale('tr')->dayName . '</h2>
    <span style="font-size: 40px">' . $iconIki . '</span>
    <p class="font-weight-light">' . degistir($Ikigundurum) . '</p>
    <h2 class="pb-3 font-weight-normal text-info">' . $day2 . ' &#8451;</h2>
</div>
</div>
<div class="col-md-4 text-center">
    <div class="border bg-white shadow border-info">
    <h2 class=" border-bottom border-info p-3"> ' . Carbon::now()->addDays(2)->locale('tr')->dayName . '</h2>
    <span style="font-size: 40px">' . $iconUc . '</span>
    <p class="font-weight-light">' . degistir($Ucgundurum) . '</p>
    <h2 class="pb-3 font-weight-normal text-info">' . $day3 . ' &#8451;</h2>
</div>
</div>
</div>';
//        return response(view('main.body.hava-durumu',array('gelenil'=>$gelenil,
//            '1. gun sıcaklık'=>$day1,
//            '2. gun sıcaklık'=>$day2,
//            '3. gun sıcaklık'=>$day3,)),200, ['Content-TYpe' => 'application/json']);
//        $bilgi= array($gelenil);

//        $html = view('main.body.hava-durumu', compact('html'))->render();
//        return $html;
//        return view('main.body.hava-durumu', ['gelenil' => json_encode($gelenil)]);
        return view('main.body.hava-durumu')->with('data', $data);
//        return view('main.home')->with('data', $data);

    }

    public function HavaDurumuHome(Request $request)
    {
        $site = file_get_contents("https://www.mgm.gov.tr/FTPDATA/analiz/GunlukTahmin.xml");
        $veri = simplexml_load_string($site);
        $gelenil = $request->ilsec;
        $bul = $gelenil;
        $bulunacak = array('ç', 'Ç', 'ı', 'ğ', 'Ğ', 'ü', 'İ', 'ö', 'Ş', 'ş', 'Ö', 'Ü', ',', ' ', '(', ')', '[', ']');
        $degistir = array('c', 'C', 'i', 'g', 'G', 'u', 'I', 'o', 'S', 's', 'O', 'U', '', '_', '', '', '', '');
        $sonuc = str_replace($bulunacak, $degistir, $bul);
        $sonuc;
        function degistir($string)
        {

            $string = str_replace("SCK", "Sıcak", $string);
            $string = str_replace("AB", "Az Bulutlu", $string);
            $string = str_replace("HSY", "Hafif Sağnak Yağış", $string);
            $string = str_replace("PB", "Parçalı Bulutlu", $string);
            $string = str_replace("GSY", "Gökgürltülü Sağnak Yağışlı", $string);
            $string = str_replace("KGY", "Kuvvetli Gökgürltülü Sağnak Yağışlı", $string);
            $string = str_replace("MSY", "Mevzi Sağnak Yağışlı", $string);
            $string = str_replace("SY", "Sağnak Yağışlı", $string);

            return $string;
        }

        foreach ($veri->Merkez as $data) {
            if ($data->ilEn == $sonuc) {

                if ($data->d1 == "GSY") {
                    $icon = '<i  style="font-size: 20px;" class="wi wi-night-thunderstorm"></i>';
                } elseif ($data->d1 == "SCK") {
                    $icon = '<i  style="font-size: 20px;" class="wi wi-day-sunny"></i>';
                } elseif ($data->d1 == "KGY") {
                    $icon = '<i  style="font-size: 20px;" class="wi wi-night-thunderstorm"></i>';
                } elseif ($data->d1 == "AB") {
                    $icon = '<i  style="font-size: 20px;" class="wi wi-cloudy"></i>';
                } elseif ($data->d1 == "PB") {
                    $icon = '<i  style="font-size: 20px;" class="wi wi-day-cloudy-windy"></i>';
                } elseif ($data->d1 == "HSY") {
                    $icon = '<i  style="font-size: 20px;" class="wi wi-night-rain"></i>';
                } elseif ($data->d1 == "MSY") {
                    $icon = '<i  style="font-size: 20px;" class="wi wi-night-rain"></i>';
                } elseif ($data->d1 == "A") {
                    $icon = '<i  style="font-size: 20px;" class="wi wi-night-rain"></i>';
                }elseif ($data->d1 == "SY") {
                    $icon = '<i  style="font-size: 20px;" class="wi wi wi-sprinkle"></i>';
                }elseif ($data->d1 == "Y") {
                    $icon = '<i  style="font-size: 20px;" class="wi wi-sprinkle"></i>';
                }elseif ($data->d1 == "CB") {
                    $icon = '<i  style="font-size: 20px;" class="wi wi-cloudy"></i>';
                } else {
                    $icon='';
                }
                $Birgundurum = degistir($data->d1);
                $Ikigundurum = $data->d2;
                $Ucgundurum = $data->d3;

                $day1 = $data->makk1;
                $day2 = $data->makk2 . " / " . $data->minn2 . " ";
                $day3 = $data->makk3 . " / " . $data->minn3 . " ";

            }
        }


        $veri = response()->json([
            'gelenil' => $gelenil,
            '1. gun sıcaklık' => $day1,
            '2. gun sıcaklık' => $day2,
            '3. gun sıcaklık' => $day3,
        ], 200);

        return $data = '<div style="  color:white; width: 30px;position: absolute; height: 30px;text-align: center;
    border-radius: 50%;
    left: 0;">' . $icon . '</div> <span class="text-light float-right font-weight-bold">' . $day1 . "&deg;" . '</span>';

        return view('main.home')->with('data', $data);

    }



    public function HavaDurum()
    {
        $sehir =Cache::remember("sehir", Carbon::now()->addYear(), function () {
            if (Cache::has('sehir')) return Cache::has('sehir');
            return Sehirler::get();
        });
        $site = file_get_contents("https://www.mgm.gov.tr/FTPDATA/analiz/GunlukTahmin.xml");
        $veri = simplexml_load_string($site);
//
        $gelenil = "KIRIKKALE";
        function degistir($string)
        {

            $string = str_replace("SCK", "Sıcak", $string);
            $string = str_replace("AB", "Az Bulutlu", $string);
            $string = str_replace("HSY", "Hafif Sağnak Yağış", $string);
            $string = str_replace("PB", "Parçalı Bulutlu", $string);
            $string = str_replace("GSY", "Gökgürltülü Sağnak Yağışlı", $string);

            // $string =str_replace("afyonkarahisar","afyon",$string);
            // $string =str_replace("Gök Gürültülü Sağnak Yağışlı","Sağnak Yağışlı",$string);


            return $string;
        }

////        echo $veri->ilceler[4]->ilce." ilçesinin hava durumu: ".$veri->ilceler[4]->Durum;
        foreach ($veri->Merkez as $data) {
            if ($data->ilEn == $gelenil) {
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
//
////        $tarih1 = Date("m/d/Y");
////        list($tarih, $saat) = explode(' ', $tarih1);
//
////        $sonrakigun = iconv('latin5', 'utf-8', strftime(' %d %B %Y %A ', strtotime('1 day', strtotime($tarih))));
//
//        return view('main.body.hava-durumu', compact('Birgundurum','Ikigundurum','Ucgundurum','day1','day2','day3','data','site','sehir'));

        $veri = response()->json([
            'gelenil' => $gelenil,
            '1. gun sıcaklık' => $day1,
            '2. gun sıcaklık' => $day2,
            '3. gun sıcaklık' => $day3,
        ], 200);

        return view('main.body.hava-durumu', compact('sehir', 'gelenil', 'day1', 'day2', 'day3', 'Birgundurum', 'Ikigundurum', 'Ucgundurum'));
    }

    public function NamazVakit(Request $request)
    {
//        return $request->sehirsec;
        /*********** ZAMANLANMIş GÖREV *//////////
/*
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://ezanvakti.herokuapp.com/vakitler/9635",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",

        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);
        $result = json_decode($response, true);
//        dd($result);
        for ($i=0; $i<30;$i++) {
//            echo $result[$i]['Aksam'];
            $tarih=$result[$i]['MiladiTarihKisa'];
            $vakitler = array(
                "imsak" => $result[$i]['Imsak'],
                "gunes" => $result[$i]['Gunes'],
                "ogle" => $result[$i]['Ogle'],
                "ikindi" => $result[$i]['Ikindi'],
                "aksam" => $result[$i]['Aksam'],
                "yatsi" => $result[$i]['Yatsi'],
                "date" => $tarih
            );
//            dd($vakitler[$i]);

            $vakit= Vakitler::updateOrCreate($vakitler); exit;
//           $vakit->save();

        }
*/
        /*********** ZAMANLANMIş GÖREV *//////////

        $gelenil = $request->sehirsec;
        $sehir =
             Sehirler::where('id', $gelenil)->first();
        $ilceid = $sehir->ilce_id;

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.collectapi.com/pray/all?data.city=".str::slug($sehir->sehir_ad),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "authorization: apikey 3GTrRbeRLxIJcguNWQlMjD:71hXZkhlz9XeAdcmRSST3B",
                "content-type: application/json"
            ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);
        $result = json_decode($response, true);
        @$imsak = $result['result'][0]['saat'];
        @$gunes = $result['result'][1]['saat'];
        @$ogle = $result['result'][2]['saat'];
        @$ikindi =$result['result'][3]['saat'];
        @$aksam = $result['result'][4]['saat'];
        @$yatsi = $result['result'][5]['saat'];

//        $imsakSor=$now>$imsak ? '<i class="fas fa-check-circle text-warning"></i>' :'<i class="fas fa-hourglass text-warning"></i>';
        $mytime = Carbon::now()->format('H:i');
        $myminute = Carbon::now()->minute;
        $myTimeNow = $mytime . ":" . $myminute;
        $okunmadurumuAkşam = "fas fa-hourglass text-warning";
        $okunmadurumuİMSAK = "fas fa-hourglass text-warning";
        $okunmadurumuOGLE = " fas fa-hourglass text-warning";
        $okunmadurumuİKİNDİ = " fas fa-hourglass text-warning";
        $okunmadurumuYATSI = " fas fa-hourglass text-warning";

        if ((int)strip_tags($aksam) - (int)$myTimeNow >= 0) {
            $okunmadurumuAksam = "fas fa-check-circle text-warning";
        }

        if ($imsak>$mytime) {
            $okunmadurumuİMSAK = "fas fa-check-circle text-success";
        }

        if ($ogle<$mytime) {
            $okunmadurumuOGLE = "fas fa-check-circle text-warning";
        }
        if ($ikindi<$mytime) {
            $okunmadurumuİKİNDİ = "fas fa-check-circle text-warning";
        }
        if ($yatsi<$mytime) {
            $okunmadurumuYATSI = "fas fa-check-circle text-warning";
        }
        return $data = ' <table class="table table-borderless text-light" >
        <tbody>
<tr class="p-2" data-hour="03:26" data-time-name="imsak">
            <td class="text-center"><i class="wi wi-day-fog text-warning"></i></td>
            <td class="text-uppercase">İmsak</td>
            <td class="font-weight-bold imsak">' . strip_tags($imsak) . '</td>
            <td><i class="' . $okunmadurumuİMSAK . '"></i></td>
        </tr>
        <tr data-hour="05:26" data-time-name="gunes">
            <td class="text-center"><i class="wi wi-sunrise text-warning"></i></td>
            <td class="text-uppercase">Güneş</td>
            <td class="font-weight-bold gunes">05:26</td>
            <td><i class="' . $okunmadurumuİMSAK . '"></i></td>
        </tr>
        <tr data-hour="13:12" data-time-name="ogle">
            <td class="text-center"><i class="wi wi-day-sunny text-warning"></i></td>
            <td class="text-uppercase">Öğle</td>
            <td class="font-weight-bold ogle">' . strip_tags($ogle) . '</td>
            <td><i class="' . $okunmadurumuOGLE . '"></i></td>
        </tr>
        <tr data-hour="17:12" data-time-name="ikindi">
            <td class="text-center"><i class="wi wi-sunset text-warning"></i></td>
            <td class="text-uppercase">İkindi</td>
            <td class="font-weight-bold ikindi">' . strip_tags($ikindi) . '</td>
            <td><i class="' . $okunmadurumuİKİNDİ . '"></i></td>
        </tr>
        <tr data-hour="20:47" data-time-name="aksam">
            <td class="text-center"><i class="wi wi-moonrise text-warning"></i></td>
            <td class="text-uppercase">Akşam</td>
            <td class="font-weight-bold aksam">' . strip_tags($aksam) . '</td>
            <td>
            <i class="' . $okunmadurumuAkşam . '"></i>
            </td>
        </tr>
        <tr data-hour="22:39" data-time-name="yatsi">
            <td class="text-center"><i class="wi wi-night-clear text-warning"></i></td>
            <td class="text-uppercase">Yatsı</td>
            <td class="font-weight-bold yatsi">' . strip_tags($yatsi) . '</td>
            <td><i class="' . $okunmadurumuYATSI . '"></i></td>
        </tr>
        </tbody>
    </table>';
    }
    public function IlGetir(Request $request)
    {

        $gelenil = $request->district_id;
//        dd($gelenil);
        $districts =Cache::remember("districts", Carbon::now()->addYear(), function () use ($gelenil) {
            if (Cache::has('districts')) return Cache::has('districts');
            return Post::leftjoin('categories', 'posts.category_id', '=', 'categories.id')
            ->leftjoin('subcategories', 'posts.subcategory_id', '=', 'subcategories.id')
            ->leftjoin('districts', 'posts.district_id', '=', 'districts.id')
            ->leftjoin('subdistricts', 'posts.subdistrict_id', 'subdistricts.id')
            ->where('districts.id', $gelenil)
            ->select(['posts.*', 'categories.category_tr', 'districts.district_tr', 'districts.district_keywords', 'districts.district_description', 'subdistricts.subdistrict_tr'])
            ->latest('updated_at')
            ->get();});
//                dd($districts);

        $districtsCount = Post::leftjoin('categories', 'posts.category_id', '=', 'categories.id')
            ->leftjoin('subcategories', 'posts.subcategory_id', '=', 'subcategories.id')
            ->leftjoin('districts', 'posts.district_id', '=', 'districts.id')
            ->leftjoin('subdistricts', 'posts.subdistrict_id', 'subdistricts.id')
            ->where('districts.id', $gelenil)
            ->select(['posts.*', 'categories.category_tr', 'districts.district_tr', 'districts.district_keywords', 'districts.district_description', 'subdistricts.subdistrict_tr'])
            ->latest('updated_at')
            ->count();
        $sehir =
            District::where('id', $gelenil)->first();
        if ($districtsCount > 0) {
            foreach ($districts as $il) {

//                     return $il;

                return $data = '
   <div class="col-md-8 pb-4 pt-4">
                    <h2><b>' . $sehir->district_tr . " Haberleri" . '</b></h2>
                    <h5>' . $sehir->district_tr . " haber , " . $sehir->district_tr . " son dakika haberleri ve gelişmeleri." . '</h5>
                </div>

                <div class="col-md-4">
                <a href="#">
                    <div class="card kart kart-width shadow mb-2" style="">
                        <img class="img-fluid kart_img" src="' . $il->image . '">
                        <div class="card-body kart-body  bordercolor-6 border-3 text-dark">
                            <p class="card-text">' . $il->title_tr . '</p>
                        </div>
                    </div>
                </a>

            </div>';


            }
            return view('main.body.district')->with('il', json_decode($il, true));

        } else {
            return $data = ' <div class="container ">
                    <div class="row shadow  mt-5 mb-5" style="height: 500px">
                        <div class="col-md-12 justify-content-center align-self-center">
                            <h5 class="mx-auto my-auto text-center">' . $sehir->district_tr . " iline ait haber bulunamadı." . '</h5>

                        </div>
                    </div>
                </div>';

        }


        return $data = '<div class="col-md-4">
                <a href="#">
                    <div class="card kart kart-width shadow mb-2" style="">
                        <img class="img-fluid kart_img" src="http://127.0.0.1:8000/image/postimg/2021a/6/60d3515740252.60d2f6cd6dbb1-kirikkalede aranan bes firari.png">
                        <div class="card-body kart-body  bordercolor-6 border-3 text-dark">
                            <p class="card-text"> </p>
                        </div>
                    </div>
                </a>

            </div>';

    }
//
//    public function NamazVakitSecili(Request $request){
//        function vakit($e)
//        {
//            $ch = curl_init();
//            curl_setopt($ch, CURLOPT_URL, $e);
//            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//            curl_setopt($ch, CURLOPT_HEADER, 0);
//            $vakitgetir = curl_exec($ch);
//            curl_close($ch);
//            return $vakitgetir;
//        }
//
//        // $vakitler=$db->genelsorgu("SELECT * FROM ");
//        $site = file_get_contents("https://namazvakitleri.diyanet.gov.tr/tr-TR/9635/kirikkale-icin-namaz-vakti");
//        preg_match_all('@<div class="tpt-title">(.*?)</div>@si', $site, $vakitisim);
//        preg_match_all('@<div class="tpt-time">(.*?)</div>@si', $site, $vakitzaman);
//        //  file_get_contents($vakitler);
//        // $veriler=json_decode($vakitler,true);
//        $vakitisimsayi = count($vakitisim[0]) - 2;
//        $vakitizamansayi = count($vakitzaman[0]) - 1;
//        //  print_r($vakitisim);
//        //  print_r($vakitzaman);
//        // exit;
//        //  $gelenkayitSayisi=count($vakitisim)-1;
//        for ($i = 0; $i < 1; $i++) {
//            @$imsak = $vakitzaman[0][0];
//            @$ogle = $vakitzaman[1][2];
//            @$ikindi = $vakitzaman[1][3];
//            @$aksam = $vakitzaman[1][4];
//            @$yatsi = $vakitzaman[1][5];
//            //  echo @$ogle =$vakitisim[$i];
//            //  echo @$ikindi =$vakitisim[$i];
//            //  echo @$aksam =$vakitisim[$i];
//            //  echo @$yatsi =$vakitisim[$i];
//        }
//        return $data=
//            @$imsak = $vakitzaman[0][0];
//        @$ogle = $vakitzaman[1][2];
//        @$ikindi = $vakitzaman[1][3];
//        @$aksam = $vakitzaman[1][4];
//        @$yatsi = $vakitzaman[1][5];
//
////       return $data= '
////     <div class="table-responsive">
////
////     <table class="table bg-white shadow">
////     <!-- <caption>List of users</caption> -->
////     <thead>
////       <tr>
////         <th class="text-center" scope="col">Şehir</th>
////         <th class="text-center" scope="col">imsak</th>
////         <th class="text-center" scope="col">Öğle</th>
////         <th class="text-center" scope="col">İkindi</th>
////         <th class="text-center" scope="col">Akşam</th>
////         <th class="text-center" scope="col">Yatsı</th>
////
////       </tr>
////     </thead>
////     <tbody>
////       <tr class="text-center">
////         <th scope="row"><span class="text-danger">'.$gelenil.'</span></th>
////         <td>'.strip_tags($imsak).'</td>
////         <td>'.strip_tags($ogle).'</td>
////         <td>'.strip_tags($ikindi).'</td>
////         <td>'.strip_tags($aksam).'</td>
////         <td>'.strip_tags($yatsi).'</td>
////       </tr>
////
////     </tbody>
////   </table>
////   </div>';
//return view('main.home',with('data'));
//    }
}

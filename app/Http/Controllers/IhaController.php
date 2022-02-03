<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\District;
use Carbon\Carbon;
use http\Client\Response;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Storage;

class IhaController extends Controller
{

    public function ihanewsAdd()
    {
        return view('backend.iha.add');
    }


    public function ihaxmlread()
    {
        return view('backend.iha.ihaxmlread');
    }


    public function Editpage($id)
    {
        $editiha = \DB::table('iha')->where('id', '=', $id)->get();
        $data = $editiha[0];
        return view('backend.iha.settingiha.edit', compact('data'));
    }

    public function Settingindex()
    {
        $setting = \DB::table('iha')->get();
        $sayi = \DB::table('iha')->count('id');

        return view('backend.iha.settingiha.settingindex', compact('setting', 'sayi'));
    }


    public function UserAdd(Request $request)
    {
        $iha = array();

        $iha['iha_usercode'] = $request->iha_usercode;
        $iha['iha_username'] = $request->iha_username;
        $iha['iha_password'] = $request->iha_password;
        $iha['iha_rss'] = $request->iha_rss;

        \DB::table('iha')->insert($iha);

        $notification = array(
            'message' => 'Kullanıcı Başarıyla Eklendi',
            'alert-type' => 'success'
        );
        return Redirect()->route('setting.settingindex')->with($notification);

    }

    public function Userupdate(Request $request)
    {
        $iha = array();
        $iha['iha_usercode'] = $request->iha_usercode;
        $iha['iha_username'] = $request->iha_username;
        $iha['iha_password'] = $request->iha_password;
        $iha['auto_Bot'] = $request->auto_Bot == "on" ? 1 : 0;
        $iha['iha_rss'] = $request->iha_rss;
        $iha['district'] = $request->district;

        \DB::table('iha')->where('id', '=', $request->id)->update($iha);

        $notification = array(
            'message' => 'Kullanıcı Başarıyla Güncellendi',
            'alert-type' => 'success'
        );
        return Redirect()->route('setting.settingindex')->with($notification);

    }


    public function iha(Request $request)
    {


        //$request->config=\DB::table("iha")->read("iha");
        $editiha = \DB::table('iha')->get();

        $cek = $editiha[0];

        $username = $cek->iha_username;
        $user = $cek->iha_usercode;
        $password = $cek->iha_password;
        $rss = $cek->iha_rss;

        $sehir = $request->sehir;
        $kategori = $request->kategori;
        $ustkategori = $request->ustkategori;

        $url = 'http://abonerss.iha.com.tr/xml/standartrss?UserCode=' . $user . '&UserName=' . $username . '&UserPassword=' . $rss . '&tip=1&';

        if ($sehir > 0 or $kategori > 0 or $ustkategori >= 0) {
            $ch = curl_init();

            curl_setopt($ch, CURLOPT_COOKIEJAR, NULL);

            curl_setopt($ch, CURLOPT_COOKIESESSION, true);

            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

            curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:5.0) Gecko/20100101 Firefox/5.0');

            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);

            curl_setopt($ch, CURLOPT_TIMEOUT, 10);

            curl_setopt($ch, CURLOPT_URL, $url . 'UstKategori=' . $ustkategori . '&Kategori=' . $kategori . '&Sehir=' . $sehir . '&wp=0&tagp=0');

            $exec = curl_exec($ch);


            $olustur = file_put_contents('dene.xml', $exec);
        } else if ($sehir == 0 && $kategori == 0 && $ustkategori == 0) {
            $ch = curl_init();

            curl_setopt($ch, CURLOPT_COOKIEJAR, NULL);

            curl_setopt($ch, CURLOPT_COOKIESESSION, true);

            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

            curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:5.0) Gecko/20100101 Firefox/5.0');

            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);

            curl_setopt($ch, CURLOPT_TIMEOUT, 10);

            curl_setopt($ch, CURLOPT_URL, $url . 'UstKategori=0&Kategori=0&Sehir=0&wp=0&tagp=0');


            $exec = curl_exec($ch);


            $olustur = file_put_contents('dene.xml', $exec);
        }


        if ($olustur != 162) {


            $xmlDataString = file_get_contents(public_path('dene.xml'));


            $xml = simplexml_load_string($xmlDataString);


            $news = array();
            $images = array();
            $videos = array();

            foreach ($xml->channel as $icerik) {
                // print_r($icerik);
                "Gelen Ahaber Sayısı" . $gelenkayitSayisi = count($icerik) - 1; // yapılan sorgu sonucu gelen dizi veri sayısını aldım.

                // echo $konu->title;


                $i = 0;
                foreach ($icerik->item as $kanal) {

                    $sehirnameXml = Str::title($kanal->Sehir);
//dd($districtName->id);
                    $i++;
                    $haberkodu = $kanal->HaberKodu;
                    $ustkategori = $kanal->UstKategori;
                    $Kategori = $kanal->Kategori;
                    // $Sehir = $kanal->Sehir;
                    //her ikisinide küçük harflere çevirip eşleştir ve geriye plaka kodu gönder

                    $sehirs = District::where('district_tr', $sehirnameXml)->get();

                    $title = $kanal->title;
                    $description = $kanal->description;
                    $pubDate = $kanal->pubDate;
                    $SonHaberGuncellenmeTarihi = $kanal->SonHaberGuncellenmeTarihi;
                    $images['image'] = $kanal->images->image;
                    $videos = $kanal->videos;


                    $news[$i]['title'] = $title;

                    $news[$i]['UstKategori'] = $ustkategori;
                    $news[$i]['Kategori'] = $Kategori;
                    //  $news[$i]['Sehir'] = $SonDakika;
                    $news[$i]['description'] = $description;
                    $news[$i]['resim'] = $images;
                    $news[$i]['pubDate'] = $pubDate;
                    $news[$i]['Sehir'] = $sehirs;
                    $news[$i]['haberkodu'] = $haberkodu;
                    $news[$i]['SonHaberGuncellenmeTarihi'] = $SonHaberGuncellenmeTarihi;
                    $news[$i]['video'] = $videos;


                }
            }


            $count = count($news);
            $category = Category::latest()->paginate(20);
            $district = District::latest()->get();

            return view('backend.iha.add', compact('count', 'news', 'category', 'district'));

        } else {
            $notification = array(
                'message' => 'Haber Bulunamadı',
                'alert-type' => 'info'
            );
            return Redirect()->route('addpage.iha')->with($notification);
        }
    }


    public function ihaInsert(Request $request)
    {
        $dir = "storage/postimg";
        $benzersiz = uniqid();
        $name = $request->title_tr;

        $isim = str_slug($name) . 1;


        $year = date("Y");
        $month = date("m");

        // $tarih=date("d-M-Y");
        $jpegklasor = "jpeg";

        $filenamejpeg = $dir . "/" . $year . "/" . $month;

        $filenamejpegay = $dir . "/" . $year . "/" . $month;

        if (file_exists($filenamejpeg)) {
            if (file_exists($filenamejpegay) == false) {
                mkdir($filenamejpegay, 0777, true);
            }

        } else {
            mkdir($filenamejpeg, 0777, true);
        }


        $content = file_get_contents($request->image);

        file_put_contents(realpath($filenamejpegay) . '/' . $benzersiz . "-" . $isim . "." . 'jpg', $content);
        //image/postimg//2021a/09"
        $imagesArray[0] = $filenamejpeg . "/" . $benzersiz . "-" . $isim . '.jpg';
        $image = imagecreatefromstring(file_get_contents($request->image));

        ob_start();
        imagejpeg($image, NULL, 100);
        $cont = ob_get_contents();
        ob_end_clean();
        imagedestroy($image);
        $content = imagecreatefromstring($cont);

        imagedestroy($content);

        $data = array();
        $images = $request->image == null ? "" : $request->image;
        $data['title_tr'] = $request->title_tr;
        $data['category_id'] = $request->category_id;
        $data['details_tr'] = $request->details_tr;
        $data['title_en'] = $request->details_tr;
        $data['district_id'] = $request->district;
        $data['image'] = $imagesArray[0];
        $data['user_id'] = $request->user_id;
        $data['created_at'] = Carbon::now();
        DB::table('posts')->insert($data);


        return Redirect()->route('addpage.iha');
    }

}


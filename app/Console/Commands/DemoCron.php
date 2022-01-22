<?php

namespace App\Console\Commands;

use App\Models\District;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DemoCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'demo:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        print_r('şfdskvdsşlcösdlşcödsşlcöds');
        $editiha = \DB::table('iha')->get();
        $cek = $editiha[0];
        $username = $cek->iha_username;
        $user = $cek->iha_usercode;
        $password = $cek->iha_password;
        $rss = $cek->iha_rss;
//        $auto_Bot = $cek->auto_Bot;
        $auto_Bot = 1;

        if ($auto_Bot == 1) {
            $sehir = 0;
            $kategori = 0;
            $ustkategori = 0;
            $url = 'http://abonerss.iha.com.tr/xml/standartrss?UserCode=' . $user . '&UserName=' . $username . '&UserPassword=' . $rss . '&tip=1&';
            if ($sehir > 0 or $kategori > 0 or $ustkategori > 0) {
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
                $olustur = file_put_contents(public_path('dene.xml'), $exec);
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
                $olustur = file_put_contents(public_path('dene.xml'), $exec);
            }
            if ($olustur) {
                $xmlDataString = file_get_contents(public_path('dene.xml'));
                $xml = simplexml_load_string($xmlDataString);
                $data = array();
                $images = array();
                $videos = array();
                foreach ($xml->channel as $icerik) {
                    $i = 0;
                    foreach ($icerik->item as $kanal) {
                        print($kanal->Sehir);

             if($kanal->Sehir){

                 $sehirnameXml = Str::title($kanal->Sehir);
                 $dir = "storage/app/public/postimg";
                 $benzersiz = uniqid();
                 $name = $kanal->title;
                 $resim = $kanal->images->image[0] == "" ? "https://yahsimedya.com/yonetim/dimg/settings/yahsi-logo.png" : $kanal->images->image[0];
                 $isim = str_slug($name) . 1;
                 $year = date("Y");
                 $month = date("m");
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
                 $content = file_get_contents($resim);
                 file_put_contents(realpath($filenamejpegay) . '/' . $benzersiz . "-" . $isim . "." . 'jpg', $content);
                 $imagesArray[0] = $filenamejpeg . "/" . $benzersiz . "-" . $isim . '.jpg';
                 $image = imagecreatefromstring(file_get_contents($resim));
                 ob_start();
                 imagejpeg($image, NULL, 100);
                 $cont = ob_get_contents();
                 ob_end_clean();
                 imagedestroy($image);
                 $content = imagecreatefromstring($cont);
                 imagedestroy($content);
                 $sehirs = District::where('district_tr', $sehirnameXml)->get();
                 $i++;
                 $kategoriID;

                 if ($kanal->Kategori == "MAGAZİN") {
                     $kategoriID = 2;
                 } elseif ($kanal->Kategori == "SPOR") {
                     $kategoriID = 6;
                 } elseif ($kanal->Kategori == "POLİTİKA") {
                     $kategoriID = 3;
                 } elseif ($kanal->Kategori == "ASAYİŞ") {
                     $kategoriID = 1;
                 } elseif ($kanal->Kategori == "DÜNYA") {
                     $kategoriID = 2;
                 } elseif ($kanal->Kategori == "GENEL") {
                     $kategoriID = 2;
                 } elseif ($kanal->Kategori == "EKONOMİ") {
                     $kategoriID = 5;
                 } elseif ($kanal->Kategori == "HABERDE İNSAN") {
                     $kategoriID = 2;
                 } elseif ($kanal->Kategori == "SAĞLIK") {
                     $kategoriID = 7;
                 } elseif ($kanal->Kategori == "EĞİTİM") {
                     $kategoriID = 4;
                 } elseif ($kanal->Kategori == "BİLİM VE TEKNOLOJİ") {
                     $kategoriID = 9;
                 } elseif ($kanal->Kategori == "KÜLTÜR SANAT") {
                     $kategoriID = 8;
                 } elseif ($kanal->Kategori == "ÇEVRE") {
                     $kategoriID = 2;
                 } else {
                     $kategoriID = 2;
                 }
                 $haberkodu = $kanal->HaberKodu;
                 $ustkategori = $kanal->UstKategori;
                 $Kategori = $kanal->Kategori;
                 $Sehir = $kanal->Sehir;
                 $SonDakika = $kanal->SonDakika;
                 $title = $kanal->title;
                 $description = $kanal->description;
                 $pubDate = $kanal->pubDate;
                 $SonHaberGuncellenmeTarihi = $kanal->SonHaberGuncellenmeTarihi;
                 $images['image'] = $resim;
                 $videos = $kanal->videos;
                 $data['title_tr'] = $title;
                 $data['category_id'] = $kategoriID;
                 $data['details_tr'] = $description;
                 $data['title_en'] = $description;
                 $data['district_id'] = $sehirs[0]->id;
                 $data['image'] = "storage/postimg" . "/" . $year . "/" . $month . "/" . $benzersiz . "-" . $isim . '.jpg';
                 $data['user_id'] = 1;
                 $data['status'] = 1;
                 $data['manset'] = 1;
                 $data['haber_iha_kod'] = $haberkodu;
                 $data['created_at'] = Carbon::now();
                 Artisan::call('cache:clear');
                 Artisan::call('route:clear');
                 Artisan::call('config:clear');
                 Artisan::call('view:clear');
                 Artisan::call('optimize');
                 DB::table('posts')->insert($data);
             }
///php artisan schedule:run ile çalışıyor
                    }
                }
            }
        }

    }
}

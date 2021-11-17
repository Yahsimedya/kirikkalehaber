<?php

namespace App\Console\Commands;

use App\Models\Vakitler;
use Illuminate\Console\Command;

class NamazVakitleri extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'namaz:cron';

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
        for ($i = 0; $i < 30; $i++) {
            $tarih = $result[$i]['MiladiTarihKisa'];
            $vakitler = array(
                "imsak" => $result[$i]['Imsak'],
                "gunes" => $result[$i]['Gunes'],
                "ogle" => $result[$i]['Ogle'],
                "ikindi" => $result[$i]['Ikindi'],
                "aksam" => $result[$i]['Aksam'],
                "yatsi" => $result[$i]['Yatsi'],
                "date" => $tarih
            );
           Vakitler::updateOrCreate($vakitler);
        }
    }
}

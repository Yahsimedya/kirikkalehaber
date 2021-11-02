<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{

    public function index(){
        return view('backend.notification.index');
    }



    public function send(Request $request){

        $url = "https://fcm.googleapis.com/fcm/send";
        $token = "/topics/duyuru";
        $serverKey = 'AAAAx2Qpiug:APA91bErBnXFP0kYyPjYddnMxv00ypb0WDcEVnY5XVDa9_06GZGhADeQSZoFPz4JXwUFfYpz0qQLN7soRhbzSNogtftjZHlrr0YtGy1Gn6BmmVGmw3-yEZKCEQ9HEQhtgJl3bqsGNblW';

        echo $inputTitle = $request->title;
        echo $inputBody = $request->body;
        echo $bildirim_Turu=$request->bildirim_turu;
        echo $haberId= $request->id;
        echo $gorsel='http://'.$_SERVER['SERVER_NAME']."/"."img/haber/".$request->gorsel;
        $request->notifiTitle;
        $request->notifiBody;
        $request->dataTitle;
        $request->dataBody;

        if($bildirim_Turu == "politika"){
            $token = "/topics/politika";
            $notifiTitle = "Politika";
            $notifiBody = $inputTitle;
            $dataTitle = $inputTitle;
            $dataBody = $inputBody;

        } else  if($bildirim_Turu == "onemliGelismeler"){
            $token = "/topics/onemliGelismeler";
            $notifiTitle = "Önemli Gelismeler";
            $notifiBody = $inputTitle;
            $dataTitle = $inputTitle;
            $dataBody = $inputBody;

        } else  if($bildirim_Turu == "ekonomi"){
            $token = "/topics/ekonomi";
            $notifiTitle = "Ekonomi";
            $notifiBody = $inputBody;
            $dataTitle = $inputTitle;
            $dataBody = $inputBody;

        } else  if($bildirim_Turu == "spor"){
            $token = "/topics/spor";
            $notifiTitle = "Spor";
            $notifiBody = $inputBody;
            $dataTitle = $inputTitle;
            $dataBody = $inputBody;
        } else  if($bildirim_Turu == "magazin"){
            $token = "/topics/magazin";
            $notifiTitle = "Magazin";
            $notifiBody = $inputBody;
            $dataTitle = $inputTitle;
            $dataBody = $inputBody;
        }

        $notification = array('title' =>$notifiTitle , 'body' =>$notifiBody, 'sound' => 'default');
        $data = array('click_action' =>'FLUTTER_NOTIFICATION_CLICK', 'bildirimTur' => $bildirim_Turu,'baslik'=>$dataTitle,'aciklama' =>$dataBody,'status'=>'done', 'haberId'=> $haberId, 'gorsel' => $gorsel);
        $arrayToSend = array('to' => $token, 'notification' => $notification,'priority'=>'high','data'=>$data, 'time_to_live'=> 3600);

        // print_r($arrayToSend);
        $json = json_encode($arrayToSend);
        // exit;

        $headers = array();
        $headers[] = 'Content-Type: application/json';
        $headers[] = 'Authorization: key='. $serverKey;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST,"POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER,$headers);

        //Send the request
        $response = curl_exec($ch);
        //Close request
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE); // http durum kodu dГ¶ndГјrГјr bu durumda baЕџarД±lД±mД± baЕџarД±sД±z mД± olduДџunu anlarД±z


        if ($httpCode ===400) {
            $notification = array(
                'message' => 'HATA: Bildirim Gönderilmedi',
                'alert-type' => 'error'
            );
            return Redirect()->route('notification.index')->with($notification);
        } else if ($httpCode === 200) {
            $notification = array(
                'message' => 'Bildirim Gönderildi',
                'alert-type' => 'success'
            );
            return Redirect()->route('notification.index')->with($notification);

        }

        curl_close($ch);

    }
}

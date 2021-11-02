@php


$url="http://www.amatorfutbol.org/tff/2ligbeyaz/puandurumu-6917.html";
$veri=file_get_contents($url);
$takimlar='@<tr bgcolor="#f6f6f6" class="hucre">(.*?)</tr>@si';




// $puan="@<td (.?)>(.?)</td>@si";
preg_match_all($takimlar,$veri,$tablo);
// echo "<pre>";
// print_r($tablo);
// echo "</pre>";
$gelen=$tablo[0];
$satirsayi= count($gelen);
$son_uc=$satirsayi-4;

// echo "<pre>";
// print_r($gelen);
// echo "</pre>";
// exit;
// $dizi=[];
for ($i=0; $i <$satirsayi ; $i++) {
    $puan="@<td (.*?)>(.*?)</td>@si";
    preg_match_all($puan,$gelen[$i],$puanlar);

// echo $gelen[$i];
// echo $puanlar[0];
 $takimismi=strip_tags($puanlar[0][2]);
//    $forma=$puanlar[0][1];
 $galibiyet=strip_tags($puanlar[0][4]);
 $beraberlik=strip_tags($puanlar[0][5]);
 $malubiyet=strip_tags($puanlar[0][6]);
 $avaraj=strip_tags($puanlar[0][9]);
 $puan=strip_tags($puanlar[0][10]);
 if($i==0){
    echo'<tr class="table-puan border-left border-success" style="border-left-width:5px !important;"> ';
 } else if($son_uc<$i) {
    echo'<tr class="table-puan border-left border-danger" style="border-left-width:5px !important;"> ';

  } else {
echo'<tr class="table-puan">';
}
echo'<td align="center" >'.($i+1).'</td>
          <th scope="row" style="font-size:12px;line-height:25px;">'.$takimismi.'</th>
          <td align="center" >'.$galibiyet.'</td>
          <td align="center" >'.$beraberlik.'</td>
          <td align="center" >'.$malubiyet.'</td>
          <td align="center" >'.$avaraj.'</td>
          <td align="center" >'.$puan.'</td>
        </tr>';
    // echo "<pre>";
    // print_r($puanlar[0]);
    // echo "</pre>";
}
@endphp

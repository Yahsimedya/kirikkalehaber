@php
    $url="http://www.amatorfutbol.org/tff/superlig/puandurumu-7027.html";
      if (($data = @file_get_contents($url)) === false) {
            $error = error_get_last();
           return "";
      } else {
              $veri=file_get_contents($url);
              $takimlar='@<tr bgcolor="#f6f6f6" class="hucre">(.*?)</tr>@si';
              $fikstur='@<tr class="hucre">(.*?)(.*?)</tr>@si';
              // $puan="@<td (.?)>(.?)</td>@si";
              preg_match_all($takimlar,$veri,$tablo);
              preg_match_all($fikstur,$veri,$fikstablo);

              // echo "<pre>";
              //print_r($fikstablo);
               //echo "</pre>";
               $gelenfiks=$fikstablo[0];
              $fikssatirsayi= count($gelenfiks);
              $fiksson_uc=$fikssatirsayi-4;

              $gelen=$tablo[0];
              $satirsayi= count($gelen);
              $son_uc=$satirsayi-4;

               //echo "<pre>";
              //print_r($gelenfiks);
               //echo "</pre>";
               //exit;
              // $dizi=[];
              for ($i=0; $i <$fikssatirsayi ; $i++) {
                  $fikspuan="@<td (.*?)>(.*?)</td>@si";
                  preg_match_all($fikspuan,$gelenfiks[$i],$fikspuanlar);
              //  echo $takimismi=strip_tags($puanlar[0][3]);
              // echo "<pre>";
              //print_r($fikspuanlar);
               //echo "</pre>";

                  }
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
               if($i<3 ){
                  echo'<tr class="table-puan border-left border-success" > ';
               } else if($son_uc<$i) {
                  echo'<tr class="table-puan border-left border-danger" > ';

                } else {
              echo'<tr class="table-puan" >';
              }
                if ($i<3){
                    echo '<td align="center" style="background-color:#28a745;color:white;" >'.($i+1).'</td>
                        <th scope="row" style="font-size:13px;font-weight:500!important;">'.$takimismi.'</th>
                        <td align="center" >'.$galibiyet.'</td>
                        <td align="center" >'.$beraberlik.'</td>
                        <td align="center" >'.$malubiyet.'</td>
                        <td align="center" >'.$avaraj.'</td>
                        <td align="center" >'.$puan.'</td>
                      </tr>';
               }
                 elseif ($son_uc<$i){
                    echo '<td align="center" style="background-color:red;color:white" >'.($i+1).'</td>
                              <th scope="row" style="font-size:13px;font-weight:500!important;">'.$takimismi.'</th>
                        <td align="center" >'.$galibiyet.'</td>
                        <td align="center" >'.$beraberlik.'</td>
                        <td align="center" >'.$malubiyet.'</td>
                        <td align="center" >'.$avaraj.'</td>
                        <td align="center" >'.$puan.'</td>
                      </tr>';
               }
                else{
                     echo '<td align="center" >'.($i+1).'</td>
                           <th scope="row" style="font-size:13px;font-weight:500!important;">'.$takimismi.'</th>
                        <td align="center" >'.$galibiyet.'</td>
                        <td align="center" >'.$beraberlik.'</td>
                        <td align="center" >'.$malubiyet.'</td>
                        <td align="center" >'.$avaraj.'</td>
                        <td align="center" >'.$puan.'</td>
                      </tr>';
               }

                  // echo "<pre>";
                  // print_r($puanlar[0]);
                  // echo "</pre>";
              }
      }




@endphp

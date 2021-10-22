<!-- let cat_api = '<?php the_field('select_api'); ?>'
cat_api = cat_api != '' && cat_api != 'default' ? `?category=${cat_api}` : '' -->


<?php 
  // echo(the_field('select_api'));
//   $url = 'https://part.upnp.xyz/PartLine/GetAllFeedGamesBetAndYou?sportid=1';// JSON URL
        
//   $curl = curl_init($url);
//   curl_setopt($curl, CURLOPT_URL, $url); 
//   curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  
//   $headers = array(
//      "Accept: application/json",
//   );
//   curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
//   curl_setopt($curl, CURLOPT_ENCODING, 'gzip');

//   //for debug only!
//   // curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
//   // curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
  
//   $resp = curl_exec($curl);

  // curl_close($curl);
  
  // print_r($resp);

//   $myPostData = json_decode(file_get_contents('/API.json'), true);
  // $res = $myPostData["results"];
//   print_r($myPostData);

$url = "https://part.upnp.xyz/PartLine/GetAllFeedGamesBetAndYou";

function uploadApi($apiUrl)
{
    $page = file_get_contents($apiUrl);
    if ($page!=""){ 
        return $page;
    } else {
        return uploadApi($apiUrl);       
    }
}

$page = uploadApi($url);
// var_dump($page);
// file_put_contents(__DIR__ . '/API'.date("Ymdhis").'.json', $page);

  echo "22";
  ?>
    <pre>
      <?php
        // var_dump($page);
        // var_dump($myPostData);
        // echo date("Ymdhis");
      ?>
    </pre>
<?php
  echo "2";
?>


<div class="table" data-link="Z28tYmV0">
    <div class="table__header desktop">
        <div class="table__row">
            <div class="table__cell">
                <span class="trim">LIVE</span>
            </div>
            <div class="table__cell small">
                <div class="table__col">1</div>
                <div class="table__col">x</div>
                <div class="table__col">2</div>
            </div>
            <div class="table__cell small">
                <div class="table__col">1x</div>
                <div class="table__col">12</div>
                <div class="table__col">2x</div>
            </div>
            <div class="table__cell small">
                <div class="table__col">
                    <span class="trim">ABAIXO</span>
                </div>
                <div class="table__col">
                    <span class="trim">TOTAL</span>
                </div>
                <div class="table__col">
                    <span class="trim">ACIMA</span>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="table__body live">
        <?php
      $i=0;
      while($i <= 4) {      
       echo '<div class="table__row">
            <div class="info">
                <div class="table__cell mobile">
                    <span class="trim bold">${row.chemp_name}</span>
                </div>
                <div class="table__cell players">
                    <span class="trim name">'. $res[$i][player1] .'</span>
                    <span class="sep mobile"> - </span>
                    <span class="trim name">'. $res[$i][player2] .'</span>
                </div>
            </div>
            <div class="values">
                <div class="table__cell number">
                    <div class="table__col">
                        <span class="number__head mobile">1</span>
                        <span class="number__val">'. ($res[$i][col1][0] ?? "-") .'</span>
                    </div>
                    <div class="table__col">
                        <span class="number__head mobile">x</span>
                        <span class="number__val">'. ($res[$i][col1][1] ?? "-") .'</span>
                    </div>
                    <div class="table__col">
                        <span class="number__head mobile">2</span>
                        <span class="number__val">'. ($res[$i][col1][2] ?? "-") .'</span>
                    </div>
                </div>
                <div class="table__cell number">
                    <div class="table__col">
                        <span class="number__head mobile">1x</span>
                        <span class="number__val">'. ($res[$i][col2][0] ?? "-") .'</span>
                    </div>
                    <div class="table__col">
                        <span class="number__head mobile">12</span>
                        <span class="number__val">'. ($res[$i][col2][1] ?? "-") .'</span>
                    </div>
                    <div class="table__col">
                        <div class="number__head mobile">2x</div>
                        <span class="number__val">'. ($res[$i][col2][2] ?? "-") .'</span>
                    </div>
                </div>
                <div class="table__cell number">
                    <div class="table__col">
                        <span class="number__head mobile">ABAIXO</span>
                        <span class="number__val">'. ($res[$i][col3][0] ?? "-") .'</span>
                    </div>
                    <div class="table__col">
                        <span class="number__head mobile">TOTAL</span>
                        <span class="number__val">'. ($res[$i][col2][1] ?? "-") .'</span>
                    </div>
                    <div class="table__col">
                        <span class="number__head mobile">ACIMA</span>
                        <span class="number__val">'. ($res[$i][col3][2] ?? "-") .'</span>
                    </div>
                </div>
            </div>
        </div>';
        
    $i++;
      }
    ?>
    </div> -->
</div>

<button data-link="Z28tYmV0" class="btn btn_o table__button">
    <span>Veja todas as apostas AO VIVO</span>
</button>
<?php

function getDistance(&$remedios){

  $mh = curl_multi_init();

  foreach($remedios as $i => $remedio){
    // URL from which data will be fetched
    $fetchURL = "https://router.hereapi.com/v8/routes?transportMode=car&origin=".$_GET['lat'].",".$_GET['long']."&destination=".$remedio['lat'].",".$remedio['long']."&return=summary&apiKey=".API_KEY;
    $multiCurl[$i] = curl_init();
    curl_setopt($multiCurl[$i], CURLOPT_URL,$fetchURL);
    curl_setopt($multiCurl[$i], CURLOPT_HEADER,0);
    curl_setopt($multiCurl[$i], CURLOPT_RETURNTRANSFER,1);
    curl_multi_add_handle($mh, $multiCurl[$i]);
  }
  $index=null;
  do {
    curl_multi_exec($mh,$index);
  } while($index > 0);
  // get content and remove handles
  foreach($multiCurl as $k => $ch) { 
    $data = curl_multi_getcontent($ch);
    $remedios[$k]['distance'] = json_decode($data)->routes[0]->sections[0]->summary->length;
    curl_multi_remove_handle($mh, $ch);
  }
  // close
  curl_multi_close($mh);
}

function getDistanceBetweenPointsNew($latitude1, $longitude1, $latitude2, $longitude2, $unit = 'kilometers') {
  $theta = $longitude1 - $longitude2; 
  $distance = (sin(deg2rad($latitude1)) * sin(deg2rad($latitude2))) + (cos(deg2rad($latitude1)) * cos(deg2rad($latitude2)) * cos(deg2rad($theta))); 
  $distance = acos($distance); 
  $distance = rad2deg($distance); 
  $distance = $distance * 60 * 1.1515; 
  switch($unit) { 
    case 'miles': 
      break; 
    case 'kilometers' : 
      $distance = $distance * 1.609344; 
  } 
  return (round($distance,2)); 
}

?>
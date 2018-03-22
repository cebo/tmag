<?php
if( !session_id() ) session_start();
require( dirname(__FILE__) . '/wp-load.php');

if((!empty($_REQUEST['lat']) && !empty($_REQUEST['lng'])) || !empty($_REQUEST['zipcode'])) {
  global $mamafu_locations;

  if(!empty($_REQUEST['lat']) && !empty($_REQUEST['lng'])) {
    $lat = floatval($_REQUEST['lat']);
    $lng = floatval($_REQUEST['lng']);
  } else {
    $zip = $_REQUEST['zipcode'];
    $zip = preg_replace("#[^\d]#", "", $zip);
    $latlng =latlngzip($zip);
    if($latlng) {
      $lat = $latlng['lat'];
      $lng = $latlng['lng'];
    }
  }
  $_SESSION['my_location'] = array('lat'=>$lat,'lng'=>$lng);
  $xx = find_best_mmf_location($lat,$lng);
  if(!empty($xx)) {
    $_SESSION['mamafu_location'] = $xx;
    $ans = array('status'=>'ok',
		 'location'=>$xx['link'],
		 'best' => $xx['best'],
		 'distance' => $xx['dist']
		 );
    print json_encode($ans);
    exit(0);
  } else {
    unset($_SESSION['mamafu_location']);
  }
}
print json_encode(array('status'=>'fail','location'=>''));


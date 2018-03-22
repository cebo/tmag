<?php
/*
Template Name: Template Locations - Zip search
*/
$lat=""; $lng="";
if(!empty($_REQUEST['zipcode'])) {
  $zip = $_REQUEST['zipcode'];
  if(!empty($_SESSION[$zip])) {
    $latlng =$_SESSION[$zip];
    if(strlen($zip) > 10 && !latlng_from_address($zip) ) 
      save_latlng_for_address($zip, $latlng);
  }  elseif( ($xxx = latlng_from_address($zip)) ) {
    $latlng = $xxx;
  } else {
    $zip5="";
    if(preg_match("#.* (\d+)\s*$#", $zip, $bry)) {
      $zip5 = $bry[1];
    } else {
      $zip5 = preg_replace("#[^\d]#", "", $zip);
    }
    $latlng =latlngzip($zip5);
  }
  if($latlng) {
 if(!empty($latlng['lat']) && ! empty($latlng['lng'])) { 
    $lat = $latlng['lat'];
    $lng = $latlng['lng'];
    $_SESSION['my_location'] = array('lat'=>$lat,'lng'=>$lng);
}
  }
  $zip = preg_replace("#<|>|\"|\'|\(|\)|=#", "", $zip);
}
if(!($lat && $lng)) {
  //  header("location: " . site_url() . '/no-results/');
  //  exit(0);
  // use a location in LA
  $lat = 34.048411;
  $lng = -118.340150;
  // Wichta Kansas
  $lat= 37.669803;
  $lng = -97.232890;
  if(!empty($_SESSION['my_location']))  unset($_SESSION['my_location']);
}
// let's compute
$results = compute_distances($lat,$lng);

get_header(); the_post(); ?>

<script>
my_latitude = <?php echo $lat; ?> +0;
my_longitude = <?php echo $lng; ?> +0;
locations_zip50 = [<?php echo implode(",", $results['50']);?>];
locations_zip200 = [<?php echo implode(",", $results['200']);?>];
location_distances =  <?php echo json_encode($results['fifty']);?>;
my_address = "<?php echo $zip; ?>";
</script>

	<div class="main">
		<div id="location-map-zip"></div><!-- /#wide-map -->
		<div class="shell">
			<a href="<?php echo site_url(); ?>/locations/">View all locations </a>
			<div class="posts-section locations-section">
<?php
  $list = $results['200'];
  for($i =0; $i < min(19, count($list)); $i++) {
    format_location_text($list[$i], $i+1);
  }

?>

			</div><!-- /.posts-section -->
		</div><!-- /.shell -->
	</div><!-- /.main -->	
<?php get_footer(); ?>
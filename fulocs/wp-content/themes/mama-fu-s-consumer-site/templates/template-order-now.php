<?php
/*
Template Name: Template Order Now
*/
$fifty = array();

get_locations(); 

if(!empty($_REQUEST['zipcode']) && !empty($_REQUEST['search2'])) {
  unset($_SESSION['mamafu_location']);
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

  $zip = preg_replace("#<|>|\"|\'|\(|\)|=#", "", $zip);

  if($latlng) {
    $lat = $latlng['lat'];
    $lng = $latlng['lng'];
    $results = compute_distances($lat,$lng);
    if(!empty($results['fifty'])) {
      $_SESSION['mamafu_location'] =
	array('best'=> $results['best'], 'dist'=> $results['dist'],
	      'fifty' => $results['fifty'],
	      'lat' =>$lat, 'lng' => $lng,
	      'link' => $results['link']);
    }
  }  
} else if(!empty($_SESSION['my_location'])) {
  $i = -1;
  if(!empty($_REQUEST['lid'])) { 
    $i = $_REQUEST['lid'];
    $i = intval(preg_replace("#[^\d]#", "", $i));
    if(empty($mamafu_locations[$i]) ) $i = -1;
  }
  unset($_SESSION['mamafu_location']);
  $yy = $_SESSION['my_location'];
  $lat = $yy['lat'];
  $lng = $yy['lng'];
  $results = compute_distances($lat,$lng, $i);
  if(!empty($results['fifty'])) {
    $_SESSION['mamafu_location'] =
      array('best'=> $results['best'], 'dist'=> $results['dist'],
	    'fifty' => $results['fifty'],
	    'lat' =>$lat, 'lng' => $lng,
	    'link' => $results['link']);
  }    
}

$the_idx = 1;
if(!empty($_SESSION['mamafu_location'])) {
  $x = $_SESSION['mamafu_location'];
  $distance = sprintf("%.2f",$x['dist']);
  $best = $x['best'];
  $fifty = $x['fifty'];
  $the_idx = array_search($best, array_keys($fifty)) + 1;
}

get_header(); the_post();

?>
<?php if(!empty($fifty)): ?>
<?php
  $addr = $mamafu_locations[$best]['address'];
  $parts = explode(",", $addr);
  $line2 = array_slice($parts, -2);
  $line1 = array_slice($parts, 0, -2);
?>
<script>
<?php if(!empty($lat) && !empty($lng)):?>
my_latitude = <?php echo $lat; ?> +0;
my_longitude = <?php echo $lng; ?> +0;
<?php endif;?>
specific_location = <?php echo $best;?> +0;
location_distances =  <?php echo json_encode($fifty);?>;
<?php if(!empty($zip)):?>
my_address = "<?php echo $zip; ?>";
<?php endif;?>
</script>

	<div class="main">
		<div class="body-bg">
			<img src="<?php bloginfo('stylesheet_directory'); ?>/images/locations-bg.jpg" alt="" />
		</div><!-- /.body-bg -->
		<div class="shell">
			<h3 class="entry-title">Order Now</h3><!-- /.entry-title -->
			<div class="orders">
				<div class="order-location">
					<div class="location-map">
						<div id="order-map1"></div><!-- /#map1 -->
					</div><!-- /.location-map -->
					<div class="location-cnt">
						<div class="lists">
							<div class="list">
								<div class="post">
									<img src="<?php bloginfo('stylesheet_directory'); ?>/images/marker<?php echo $the_idx;?>.png" alt="" class="alignleft" />
									<div class="entry">
		                                                                 <p><?php echo $distance;?> miles</p>
										<h5><?php echo $mamafu_locations[$best]['friendlyName'];?></h5>
										<p><?php echo implode(',',$line1);?><br /><?php echo implode(",", $line2);?></p>
										<p><?php echo $mamafu_locations[$best]['phone'];?></p>
									</div><!-- /.entry -->
								</div><!-- /.post -->
							</div><!-- /.list -->
							<div class="list">
								<div class="post">
									<h5>Hours</h5>
									<p><?php echo $mamafu_locations[$best]['hours'];?></p>
									<p>
<?php if(!empty($mamafu_locations[$best]['deliveryAreas'])):?>
									<a href="javascript:void(0)" onclick="show_delivery_area(<?php echo $best;?>)" class="delivery-link">Delivery Area</a><br />
<?php endif;?>
<?php if(!empty($mamafu_locations[$best]['cateringAreas'])):?>
                                                                        <a href="javascript:void(0)" onclick="show_catering_area(<?php echo $best;?>)" class="catering-link">Catering Area</a>
<?php endif;?>
                                                                        </p>
								</div><!-- /.post -->
							</div><!-- /.list -->
							<div class="list last">
								<p><a target="_blank" href="<?php echo get_direction_link($best);?>">Get Directions &raquo;</a></p>
								<p><a href="<?php echo  menu_link($best);?>">Download Menu &raquo;</a><br />
								   <a href="<?php echo  catering_menu_link($best);?>">Download Catering Menu &raquo;</a></p>
								<div class="direction-icons">
		<?php if(!empty($mamafu_locations[$best]['wifi_alt'])):?>
		<a href="#"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/range-ico.png" alt="" /><span>Wifi</span></a>
		<?php endif;?> 
		<?php if(!empty($mamafu_locations[$best]['delivery_alt'])):?>
		<a href="#"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/truck-ico.png" alt="" /><span>Delivery</span></a>
		<?php endif;?> 
		<?php if(!empty($mamafu_locations[$best]['alcohol'])):?>
		<a href="#"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/beer-ico.png" alt="" /><span>Happy Hour</span></a>
		<?php endif;?> 
		<?php if(!empty($mamafu_locations[$best]['catering'])):?>
		<a href="#"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/food-ico.png" alt="" /><span>Catering</span></a>
		<?php endif;?> 

								</div><!-- /.direction-icons -->
							</div><!-- /.list -->

							<a href="<?php echo order_link($best); ?>" class="orange-btn cbox">Order Pickup/Delivery</a>
							<a href="<?php echo catering_link($best);?>" class="orange-btn cbox">Order Catering Pickup/Delivery</a>
						</div><!-- /.lists -->
					</div><!-- /.location-cnt -->
    <?php if(0):?>
					<div class="popup-holder">
						<div class="popup cf" id="detect-location">
							<p>Allow map to detect your current location?</p>
							<a href="#" class="orange-btn">Allow</a>
							<a href="#" class="orange-btn">Deny</a>
						</div><!-- /.popup -->
					</div><!-- /.popup-holder -->
    <?php endif;?>
				</div><!-- /.order-location -->
			</div><!-- /.orders -->
			<div class="choose-form cf search-locations">
				<h5 class="entry-title">Or Search for a Different Location</h5><!-- /.entry-title -->
				<div class="location-search">
					<form action="" method="POST">
						<label for="search2"></label>
						<input type="text" class="field" value="" placeholder="Zip Code" id="zipcode" name="zipcode">
						<input type="submit" value="Search" class="submit-button" name="search2" id="search2" >
					</form>
					<p><a href="<?php echo site_url();?>/locations/">Show All Locations</a></p>
				</div>
			</div><!-- /.choose-form -->
		</div><!-- /.shell -->
	</div><!-- /.main -->	
<?php else: ?>
<?php
  // use a location in LA
  $lat = 34.048411;
  $lng = -118.340150;
  // Wichta Kansas
  $lat= 37.669803;
  $lng = -97.232890;
  // let's compute
?>
<script>
my_latitude = <?php echo $lat; ?> +0;
my_longitude = <?php echo $lng; ?> +0;
</script>

	<div class="main">
		<div id="location-map-zip"></div><!-- /#wide-map -->
		<div class="shell">
			<a href="<?php echo site_url(); ?>/locations/">View all locations &raquo;</a>
			<div class="posts-section locations-section">
			</div><!-- /.posts-section -->
		</div><!-- /.shell -->
	</div><!-- /.main -->	

<?php endif; ?>

<?php get_footer(); ?>
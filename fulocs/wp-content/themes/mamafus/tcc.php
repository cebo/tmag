<?php

$mamafu_locations = array();
$external_doc_site="http://mamafus.com";
$tmp_order_link="http://order.mamafus.com";
$tmp_catering_link="http://order.mamafus.com";

function pre($a) { print "<pre>"; print_r($a); print "</pre>";}
// compute the distance between two points on earth
// in miles!
function distance($lata,$lnga, $latb, $lngb) {
  $radius =  3956.087107103049;
  $dLat = $lata - $latb;
  $dLon = $lnga - $lngb; 

  if(abs($dLat)> 2.0 || abs($dLon) > 2.0) return 2000.0;

  $dLat = $dLat * 0.0174532925199432777;
  $dLon = $dLon * 0.0174532925199432777;
  
  $x = sin($dLat * 0.5) * sin($dLat * 0.5) +
    cos($lata * 0.0174532925199432777) * cos($latb * 0.0174532925199432777) * 
    sin($dLon * 0.5) * sin($dLon * 0.5); 
  $c = 2.0 * atan2(sqrt($x), sqrt(1.0-$x)); 
  $d = $radius * $c;


  return $d+$d;
}

//echo distance(30.374654,-97.676210,30.310707,-97.723000);

function latlng_from_address($addr) {
  global $wpdb;
  return $wpdb->get_results( $wpdb->prepare( 'SELECT * FROM ' . $wpdb->prefix . 'address'  . ' WHERE address = \'%s\' LIMIT 1', $addr ) );   
}
function save_latlng_for_address($addr, $latlng) {
  global $wpdb;
  $wpdb->insert( $wpdb->prefix . 'address' ,
                 array('address' => $addr,
                       'lat' => $latlng['lat'],
                       'lng' => $latlng['lng']),
                 array('%s','%s','%s'));
}

function latlng_from_zip($zip) {
  global $wpdb;
  return $wpdb->get_results( $wpdb->prepare( 'SELECT * FROM ' . $wpdb->prefix . 'zip'  . ' WHERE zip = \'%s\' LIMIT 1', $zip ) );   
}

function latlngzip($zip) {
  $raw = latlng_from_zip($zip);
  if($raw) {
    $tmp = objectToArray($raw);
    return $tmp[0];
  }
  return NULL;
}

function objectToArray($d) {
  if (is_object($d)) {
    $d = get_object_vars($d);
  }
  if (is_array($d)) {
    return array_map(__FUNCTION__, $d);
  }
  else {
    return $d;
  }
}

function get_locations() {
  global $mamafu_locations;

  if(empty($mamafu_locations)) {
    $dir = get_template_directory();
    $direct = get_bloginfo('url');
   // $file = $dir . "/locations.txt";
    $t1 = filemtime( $dir . "/locations.txt");
    $t2 = filemtime( $dir . "/locations.txt");
    if($t1 < $t2) {
      exec( $dir . "/jsdb/update.sh");
    }
    if( file_exists($file) ) {
      $txt = file_get_contents($file);
      $mamafu_locations = objectToArray(json_decode($txt));
    }
  }
  return  $mamafu_locations;
}


function sort_locations_by_state() {
  global $mamafu_locations;
  $states = array();
  foreach($mamafu_locations as $i => $one) {
    $state = $one['state'];
    if(!empty($one['city'])) {
      $state = $state . " / " . $one['city'];
    }
    if(empty($states[$state]))  $states[$state] = array();
    $states[$state][] = $i;
  }
  ksort($states);
  return $states;
}


function compute_distances($lat,$lng, $useme=-1) {
  global $mamafu_locations;
  $ans50 = array();
  $ans200 = array();
  $dist = 9999999;
  $best = -1;
  $name = "";
  $sd = 999999;
  get_locations();
  foreach($mamafu_locations as $i => $one) {
    $la = $one['lat'];
    $ln = $one['lon'];
    $d = distance($lat,$lng, $la, $ln);
    if($d < $dist) { $dist = $d; $best = $i;}
    if($i == $useme) $sd = $d;
    $mamafu_locations[$i]['distance'] = sprintf("%.2f",$d);
    if($d < 50.0) {
      $ans50[$i] = $d;
      $ans200[$i] = $d;
    } else if($d < 200.0) {
      $ans200[$i] = $d;      
    }
  }
  // sort according to distance
  asort($ans50,SORT_NUMERIC);
  asort($ans200,SORT_NUMERIC);
  $name=""; $link="";

  
  if($useme >= 0 && $useme < count($mamafu_locations)) {
    $best = $useme;
    $dist = $sd;
  }

  if($best >= 0 && $dist <= 100) {
    $name = $mamafu_locations[$best]['location'];    
    $link = '<a href="' . site_url() . '/location?lid='. $best . '">'. $name . '</a>';
  }

  return array('50' => array_keys($ans50), '200'=>array_keys($ans200),
	       'best' => $best, 'name' => $name, 'dist'=>$dist,
	       'fifty' => $ans50, 'link' => $link
	       );
}


function find_best_mmf_location($lat, $lng) {
  global $mamafu_locations;
  if($lat && $lng) {
    if(!empty($_SESSION['mamafu_location'])) {
      $x = $_SESSION['mamafu_location'];
      if($x['lat'] == $lat && $x['lng'] == $lng) {
	return $_SESSION['mamafu_location'];
      }
    }
    $ans = array();
    $ans50 = array();
    $dist = 99999;
    $best = -1;
    $locs = get_locations();
    foreach($locs as $i => $one) {
      $la = $one['lat'];
      $ln = $one['lon'];
      $d = distance($lat,$lng, $la, $ln);
      if($d < $dist) { $dist = $d; $best = $i;}
      if($d < 50) {	$ans50[$i] = $d;     }
      $mamafu_locations[$i]['distance'] = $d;
    }
    if($best >= 0) {
      $name = $mamafu_locations[$best]['location'];    
      $link = '<a href="' . site_url() . '/location?lid='. $best . '">'. $name . '</a>';
      asort($ans50,SORT_NUMERIC);
      return array('best'=>$best,
		   'dist'=>$dist, 
		   'link'=>$link,
		   'lat'=>$lat,
		   'lng'=>$lng, 
		   'fifty'=>$ans50);
    }
  }
  return null;
}



function order_link($i) {
  global $mamafu_locations, $tmp_order_link;

  //return $tmp_order_link;
  if(!empty($mamafu_locations[$i]['orderLink']))
    return $mamafu_locations[$i]['orderLink'];
  //  return $tmp_order_link;
  return '';
}
function catering_link($i) {
  global $mamafu_locations, $tmp_catering_link;

  if(!empty($mamafu_locations[$i]['CaterLink']))
    return $mamafu_locations[$i]['CaterLink'];
  //  return $tmp_catering_link;
  return '';
}



function menu_link($i) {
  global $mamafu_locations, $external_doc_site;
  $url = $mamafu_locations[$i]['menu'];
  if(preg_match("#^http#", $url)) return $url;
  return $external_doc_site . $url;;
}

function catering_menu_link($i) {
  global $mamafu_locations, $external_doc_site;
  $url = $mamafu_locations[$i]['catering'];
  if(preg_match("#^http#", $url)) return $url;
  return $external_doc_site . $url;
}

function get_direction_link($i) {
  global $mamafu_locations;
  if(!empty($mamafu_locations[$i]['maplink'])) {
    $url = $mamafu_locations[$i]['maplink'];
  } else if(!empty($mamafu_locations[$i]['directions_link'])) {
    $url = $mamafu_locations[$i]['directions_link'];
  } else {
    $addr = $mamafu_locations[$i]['address'];
    $url = 'https://maps.google.com/maps?q=' .urlencode($addr) . '&t=m&z=13';
  }
  return $url;
}


function format_location_text($i, $j="") {
  global $mamafu_locations;
  $addr = $mamafu_locations[$i]['address'];
  $parts = explode(",", $addr);
  $line2 = array_slice($parts, -2);
  $line1 = array_slice($parts, 0, -2);
?>
<div class="post">
	<div class="post-inner">
<div class="post-cnt"><a href="<?php echo site_url();?>/location?lid=<?php echo $i;?>">
	<img src="<?php bloginfo('stylesheet_directory'); ?>/images/marker<?php echo $j;?>.png" alt="" class="alignleft" /></a>
	<div class="entry">
   <?php if(!empty($mamafu_locations[$i]['distance'])): ?>
       <p><?php echo $mamafu_locations[$i]['distance'];?> miles</p>
    <?php endif;?>
                <h5><a href="<?php echo site_url();?>/location?lid=<?php echo $i;?>"><?php echo $mamafu_locations[$i]['friendlyName'];?></a></h5>
	        <p><?php echo implode(',',$line1);?><br /><?php echo implode(",", $line2);?></p>
		<p><?php echo $mamafu_locations[$i]['phone'];?></p>
	</div><!-- /.entry -->
</div><!-- /.post-cnt -->
<div class="post-direction">
								   <p><a target="_blank" href="<?php echo get_direction_link($i);?>">Get Directions &raquo;</a><br /><a href="<?php echo site_url();?>/location?lid=<?php echo $i;?>">More Info &raquo;</a></p>
	<div class="direction-icons">
		<?php if(!empty($mamafu_locations[$i]['wifi'])):?>
		<a href="#"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/range-ico.png" alt="" /><span>Wifi</span></a>
		<?php endif;?> 
		<?php if(!empty($mamafu_locations[$i]['deliveryAreas'])):?>
		<a href="#"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/truck-ico.png" alt="" /><span>Delivery</span></a>
		<?php endif;?> 
		<?php if(!empty($mamafu_locations[$i]['alcohol'])):?>
		<a href="#"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/beer-ico.png" alt="" /><span>Happy Hour</span></a>
		<?php endif;?> 
		<?php if(!empty($mamafu_locations[$i]['catering'])):?>
		<a href="#"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/food-ico.png" alt="" /><span>Catering</span></a>
		<?php endif;?> 
	</div><!-- /.direction-icons -->
</div><!-- /.post-option -->
	</div><!-- /.post-inner -->
</div><!-- /.post -->
<?php
}
function format_location_one($i) {
  global $mamafu_locations;
  $addr = $mamafu_locations[$i]['address'];
  $parts = explode(",", $addr);
  $line2 = array_slice($parts, -2);
  $line1 = array_slice($parts, 0, -2);
  if(empty($mamafu_locations[$i]['CaterLink'])) $mamafu_locations[$i]['CaterLink'] = "#";
?>
				<div class="list">
					<div class="post">
						<img src="<?php bloginfo('stylesheet_directory'); ?>/images/marker1.png" alt="" class="alignleft" />
						<div class="entry">
                <h5><?php echo $mamafu_locations[$i]['friendlyName'];?></h5>
	        <p><?php echo implode(',',$line1);?><br /><?php echo implode(",", $line2);?></p>
		<p><?php echo $mamafu_locations[$i]['phone'];?></p>
						</div><!-- /.entry -->
								   <?php $xx= order_link($i); if($xx && $xx != '#'):?>								   				<a href="<?php echo order_link($i); ?>" class="orange-btn">Order Pickup/Delivery</a>
								   <?php endif;?>
					</div><!-- /.post -->
				</div><!-- /.list -->
				<div class="list">
					<div class="post">
						<h5>Hours</h5>
					   <p><?php echo $mamafu_locations[$i]['hours'];?></p>
				      <p>
<?php if(!empty($mamafu_locations[$i]['deliveryAreas'])):?>
				         <a href="javascript:void(0)" onclick="show_delivery_area(<?php echo $i;?>)" class="delivery-link">Delivery Area</a><br />
<?php endif;?>
<?php if(!empty($mamafu_locations[$i]['cateringAreas'])):?>
				         <a href="javascript:void(0)" onclick="show_catering_area(<?php echo $i;?>)" class="catering-link">Catering Area</a>
<?php endif;?>
				      </p>
											      <?php $xx= catering_link($i); if($xx && $xx != '#'):?>
  						<a href="<?php echo catering_link($i);?>" class="orange-btn">Order Catering Pickup/Delivery</a>
						      <?php endif;?>								   
					</div><!-- /.post -->
				</div><!-- /.list -->
				<div class="list">
											      <p><a target="_blank" href="<?php echo get_direction_link($i);?>">Get Directions &raquo;</a></p>
				    <p>
<?php if(0 && menu_link($i) && strlen(menu_link($i)) > 22): ?>
					<a href="<?php echo  menu_link($i);?>" target="_blank">Download Menu &raquo;</a><br />
<?php endif; ?>
<?php if(0 && catering_menu_link($i) && strlen(catering_menu_link($i)) > 22 ): ?>
					   <a href="<?php echo catering_menu_link($i);?>">Download Catering Menu &raquo;</a>
<?php endif; ?>

											    </p>

					<div class="direction-icons">
		<?php if(!empty($mamafu_locations[$i]['wifi'])):?>
		<a href="#"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/range-ico.png" alt="" /><span>Wifi</span></a>
		<?php endif;?> 
		<?php if(!empty($mamafu_locations[$i]['deliveryAreas'])):?>
		<a href="#"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/truck-ico.png" alt="" /><span>Delivery</span></a>
		<?php endif;?> 
		<?php if(!empty($mamafu_locations[$i]['alcohol'])):?>
		<a href="#"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/beer-ico.png" alt="" /><span>Happy Hour</span></a>
		<?php endif;?> 
		<?php if(!empty($mamafu_locations[$i]['catering'])):?>
		<a href="#"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/food-ico.png" alt="" /><span>Catering</span></a>
		<?php endif;?> 
					</div><!-- /.direction-icons -->
				</div><!-- /.list -->
<?php
}

function list_states($in) {
  global $mamafu_locations;

  foreach($in as $name => $list) {
?>
<div class="post">
    <h3><?php echo $name ;?></h3>					
<?php
 foreach($list as $i) {
  $addr = $mamafu_locations[$i]['address'];
  $parts = explode(",", $addr);
  $line2 = array_slice($parts, -2);
  $line1 = array_slice($parts, 0, -2);
?>
	<div class="post-inner">
		<div class="post-cnt"><a href="<?php echo site_url();?>/location?lid=<?php echo $i;?>">
			<img src="<?php bloginfo('stylesheet_directory'); ?>/images/marker.png" alt="" class="alignleft" /></a>
			<div class="entry">
                           <h5><a href="<?php echo site_url();?>/location?lid=<?php echo $i;?>"><?php echo $mamafu_locations[$i]['friendlyName'];?></a></h5>
                           <p><?php echo implode(',',$line1);?><br /><?php echo implode(",", $line2);?></p>
                           <p><?php echo $mamafu_locations[$i]['phone'];?></p>
			</div><!-- /.entry -->
		</div><!-- /.post-cnt -->
		<div class="post-direction">
									      <p><a target="_blank" href="<?php echo get_direction_link($i);?>">Get Directions &raquo;</a><br /><a href="<?php echo site_url();?>/location?lid=<?php echo $i;?>">More Info &raquo;</a></p>
			<div class="direction-icons">
                               <?php if(!empty($mamafu_locations[$i]['wifi'])):?>
                                <a href="#"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/range-ico.png" alt="" /><span>Wifi</span></a>
				<?php endif;?> 
				<?php if(!empty($mamafu_locations[$i]['deliveryAreas'])):?>
				<a href="#"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/truck-ico.png" alt="" /><span>Delivery</span></a>
				<?php endif;?> 
				<?php if(!empty($mamafu_locations[$i]['alcohol'])):?>
				<a href="#"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/beer-ico.png" alt="" /><span>Happy Hour</span></a>
				<?php endif;?> 
				<?php if(!empty($mamafu_locations[$i]['catering'])):?>
				<a href="#"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/food-ico.png" alt="" /><span>Catering</span></a>
				<?php endif;?> 
			</div><!-- /.direction-icons -->
		</div><!-- /.post-direction -->
	</div><!-- /.post-inner -->
<?php
    }
?>

</div><!-- /.post -->
<?php
	    }
}
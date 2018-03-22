<?php
/**
 * TEMPLATE NAME: Menu (RAW) Template
 */
?>
<html lang="en">
<head>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>
		<?php global $page, $paged; wp_title( '|', true, 'right' ); bloginfo( 'name' );
		
			// Add the blog description for the home/front page.
			$site_description = get_bloginfo( 'description', 'display' );
			if ( $site_description && ( is_home() || is_front_page() ) )
				echo " | $site_description";
		
			// Add a page number if necessary:
			if ( $paged >= 2 || $page >= 2 )
				echo ' | ' . sprintf( __( 'Page %s', 'misfitlang' ), max( $paged, $page ) );
		?>
	</title>
	
	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php if ( get_option('misfit_feedburner_url') <> "" ) { echo get_option('misfit_feedburner_url'); } else { echo get_bloginfo_rss('rss2_url'); } ?>" />
	
	<script src="<?php bloginfo ('template_url'); ?>/js/modernizr-2.5.3.min.js"></script>
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
	
	<link rel="stylesheet" type="text/css" href="<?php bloginfo ('template_url'); ?>/css/fonts.css">
<link rel="stylesheet" type="text/css" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">

<!-- include any additional or dependent stylesheets -->
<link rel="stylesheet" type="text/css" href="<?php bloginfo ('template_url'); ?>/css/owl.carousel.min.css">

<!-- responsive style -->
<link rel="stylesheet" type="text/css" href="<?php bloginfo ('template_url'); ?>/css/media.css">

</head>
<body>




<div class="pagemates">
		
		<div class="container narrowered">

			<div class="mainsect">

					<ul id="toggle-view" class="">
						<li>
							<h3>Shareables</h3>

							<div class="panel">
								<?php if($menutype) {

									query_posts(array(
									'cat' => 6,
									'post_type' => 'menues',
									'posts_per_page' => -1,
	  								'menutype'  => $menutype,
	  								));
	  							} else {

	  							query_posts(array(
									'cat' => 6,
									'post_type' => 'menues',
									'posts_per_page' => -1,
	  								'menutype'  => 'main-menu'
	  								));
	  							}
	  								 if ( have_posts() ) : while ( have_posts() ) : the_post(); $imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full");  ?>

								<div class="menu-item">

									<h2><?php the_title(); ?><span><?php if(has_category('spicy')) { ?><img class="spic" src="<?php bloginfo('template_url'); ?>/images/sp.png" /><?php } ?><?php if(has_category('gluten-free')) { ?><img class="glut" src="<?php bloginfo('template_url'); ?>/images/gf.png" /><?php } ?><?php if(has_category('vegan')) { ?><img class="vega" src="<?php bloginfo('template_url'); ?>/images/vg.png" /><?php } ?></span></h2>
								<?php if($imgsrc) { ?>
								<img src="<?php echo $imgsrc[0]; ?>" class="thumbber" />
								<?php } ?>
									<?php the_content(); ?>

								</div>

							<?php endwhile; endif; wp_reset_query(); ?>
							</div>
						</li>
					</ul>







									<ul id="toggle-view" class="">
						<li>
							<h3>Soups and Salads</h3>

							<div class="panel">
								<?php if($menutype) {

									query_posts(array(
									'cat' => 7,
									'post_type' => 'menues',
									'posts_per_page' => -1,
	  								'menutype'  => $menutype,
	  								));
	  							} else {

	  							query_posts(array(
									'cat' => 7,
									'post_type' => 'menues',
									'posts_per_page' => -1,
	  								'menutype'  => 'main-menu'
	  								));
	  							}
	  								 if ( have_posts() ) : while ( have_posts() ) : the_post(); $imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full");  ?>

								<div class="menu-item">

									<h2><?php the_title(); ?><span><?php if(has_category('spicy')) { ?><img class="spic" src="<?php bloginfo('template_url'); ?>/images/sp.png" /><?php } ?><?php if(has_category('gluten-free')) { ?><img class="glut" src="<?php bloginfo('template_url'); ?>/images/gf.png" /><?php } ?><?php if(has_category('vegan')) { ?><img class="vega" src="<?php bloginfo('template_url'); ?>/images/vg.png" /><?php } ?></span>
									</h2><?php if($imgsrc) { ?>
								<img src="<?php echo $imgsrc[0]; ?>" class="thumbber" />
								<?php } ?>
									<?php the_content(); ?>

								</div>

							<?php endwhile; endif; wp_reset_query(); ?>
							</div>
						</li>
					</ul>






									<ul id="toggle-view" class="">
						<li>
							<h3>Entrees</h3>

							<div class="panel">
								<?php if($menutype) {

									query_posts(array(
									'cat' => 8,
									'post_type' => 'menues',
									'posts_per_page' => -1,
	  								'menutype'  => $menutype,
	  								));
	  							} else {

	  							query_posts(array(
									'cat' => 8,
									'post_type' => 'menues',
									'posts_per_page' => -1,
	  								'menutype'  => 'main-menu'
	  								));
	  							}
	  								 if ( have_posts() ) : while ( have_posts() ) : the_post();  $imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full");  ?>

								<div class="menu-item">

									<h2><?php the_title(); ?><span><?php if(has_category('spicy')) { ?><img class="spic" src="<?php bloginfo('template_url'); ?>/images/sp.png" /><?php } ?><?php if(has_category('gluten-free')) { ?><img class="glut" src="<?php bloginfo('template_url'); ?>/images/gf.png" /><?php } ?><?php if(has_category('vegan')) { ?><img class="vega" src="<?php bloginfo('template_url'); ?>/images/vg.png" /><?php } ?></span>
									</h2><?php if($imgsrc) { ?>
								<img src="<?php echo $imgsrc[0]; ?>" class="thumbber" />
								<?php } ?>
									<?php the_content(); ?>

								</div>

							<?php endwhile; endif; wp_reset_query(); ?>
							</div>
						</li>
					</ul>



					<ul id="toggle-view" class="">
						<li>
							<h3>Desserts</h3>

							<div class="panel">
								<?php if($menutype) {

									query_posts(array(
									'cat' => 9,
									'post_type' => 'menues',
									'posts_per_page' => -1,
	  								'menutype'  => $menutype,
	  								));
	  							} else {

	  							query_posts(array(
									'cat' => 9,
									'post_type' => 'menues',
									'posts_per_page' => -1,
	  								'menutype'  => 'main-menu'
	  								));
	  							}
	  								 if ( have_posts() ) : while ( have_posts() ) : the_post(); $imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full");  ?>

								<div class="menu-item">

									<h2><?php the_title(); ?><span><?php if(has_category('spicy')) { ?><img class="spic" src="<?php bloginfo('template_url'); ?>/images/sp.png" /><?php } ?><?php if(has_category('gluten-free')) { ?><img class="glut" src="<?php bloginfo('template_url'); ?>/images/gf.png" /><?php } ?><?php if(has_category('vegan')) { ?><img class="vega" src="<?php bloginfo('template_url'); ?>/images/vg.png" /><?php } ?></span>
									</h2><?php if($imgsrc) { ?>
								<img src="<?php echo $imgsrc[0]; ?>" class="thumbber" />
								<?php } ?>
									<?php the_content(); ?>

								</div>

							<?php endwhile; endif; wp_reset_query(); ?>
							</div>
						</li>
					</ul>





									<ul id="toggle-view" class="">
						<li>
							<h3>Drinks</h3>

							<div class="panel">
								<?php if($menutype) {

									query_posts(array(
									'cat' => 10,
									'post_type' => 'menues',
									'posts_per_page' => -1,
	  								'menutype'  => $menutype,
	  								));
	  							} else {

	  							query_posts(array(
									'cat' => 10,
									'post_type' => 'menues',
									'posts_per_page' => -1,
	  								'menutype'  => 'main-menu'
	  								));
	  							}
	  								 if ( have_posts() ) : while ( have_posts() ) : the_post(); $imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full");  ?>

								<div class="menu-item">

									<h2><?php the_title(); ?><span><?php if(has_category('spicy')) { ?><img class="spic" src="<?php bloginfo('template_url'); ?>/images/sp.png" /><?php } ?><?php if(has_category('gluten-free')) { ?><img class="glut" src="<?php bloginfo('template_url'); ?>/images/gf.png" /><?php } ?><?php if(has_category('vegan')) { ?><img class="vega" src="<?php bloginfo('template_url'); ?>/images/vg.png" /><?php } ?></span>
									</h2><?php if($imgsrc) { ?>
								<img src="<?php echo $imgsrc[0]; ?>" class="thumbber" />
								<?php } ?>
									<?php the_content(); ?>

								</div>

							<?php endwhile; endif; wp_reset_query(); ?>
							</div>
						</li>
					</ul>



									<ul id="toggle-view" class="">
						<li>
							<h3>Allergens</h3>

							<div class="panel">
								<img src="<?php bloginfo('template_url'); ?>/images/allergen.jpg" style="width: 100%;"/>

						
							</div>
						</li>
					</ul>

			</div>

		</div>
	</div>
	
	
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
  <script type="text/javascript" src="<?php bloginfo ('template_url'); ?>/js/owl.carousel.min.js"></script>
        
<script>
      // Note: This example requires that you consent to location sharing when
      // prompted by your browser. If you see the error "The Geolocation service
      // failed.", it means you probably did not give permission for the browser to
      // locate you.

      var markers = [
<?php query_posts('post_type=locales&posts_per_page=-1'); if(have_posts()) : while(have_posts()) : the_post(); ?>  
      <?php $contentout = get_the_content();  $contentfull = preg_replace( "/\r|\n/", "", $contentout ); ?>
       <?php if(get_post_meta($post->ID, "cebo_lat", true)) { ?>
    {
        "title": '<?php the_title(); ?>',
        "lat": '<?php echo get_post_meta($post->ID, "cebo_lat", true); ?>',
        "lng": '<?php echo get_post_meta($post->ID, "cebo_long", true); ?>',
        "description": '<h3><?php the_title(); ?></h3><a href="<?php bloginfo('url'); ?>/locations" class="button">Get Directions</a>'
    },

     <?php } ?>
    <?php endwhile; endif; wp_reset_query(); ?>	

    ];


      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 30.3074624, lng: -98.0335911},
          zoom: 11,
          scrollwheel: false,
           styles: [{"featureType":"all","elementType":"labels","stylers":[{"visibility":"simplified"}]},{"featureType":"all","elementType":"labels.text","stylers":[{"color":"#444444"}]},{"featureType":"administrative.country","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"administrative.country","elementType":"geometry","stylers":[{"visibility":"simplified"}]},{"featureType":"administrative.province","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"administrative.locality","elementType":"all","stylers":[{"visibility":"simplified"},{"saturation":"-100"},{"lightness":"30"}]},{"featureType":"administrative.neighborhood","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"administrative.land_parcel","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"landscape","elementType":"all","stylers":[{"visibility":"simplified"},{"gamma":"0.00"},{"lightness":"74"}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#ffffff"}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"geometry","stylers":[{"visibility":"simplified"},{"color":"#ff0000"},{"saturation":"-15"},{"lightness":"40"},{"gamma":"1.25"}]},{"featureType":"road","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"labels","stylers":[{"visibility":"simplified"}]},{"featureType":"transit","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit.line","elementType":"geometry","stylers":[{"color":"#ff0000"},{"lightness":"80"}]},{"featureType":"transit.station","elementType":"geometry","stylers":[{"color":"#e5e5e5"}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#efefef"}]},{"featureType":"water","elementType":"labels","stylers":[{"visibility":"off"}]}]
        });
        var infoWindow = new google.maps.InfoWindow({map: map});
                               
                for (var i = 0; i < markers.length; i++) {
            var data = markers[i];
            var myLatlng = new google.maps.LatLng(data.lat, data.lng);
            var marker = new google.maps.Marker({
                position: myLatlng,
                map: map,
                title: data.title
            });
 
            //Attach click event to the marker.
            (function (marker, data) {
                google.maps.event.addListener(marker, "click", function (e) {
                    //Wrap the content inside an HTML DIV in order to set height and width of InfoWindow.
                    infoWindow.setContent("<div style = 'width:200px;min-height:40px'>" + data.description + "</div>");
                    infoWindow.open(map, marker);
                });
            })(marker, data);
        }

        // Try HTML5 geolocation.
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };

            infoWindow.setPosition(pos);
            infoWindow.setContent('Location found.');
            map.setCenter(pos);
          }, function() {
            handleLocationError(true, infoWindow, marker, map.getCenter());
          });
        } else {
          // Browser doesn't support Geolocation
          handleLocationError(false, infoWindow, marker, map.getCenter());
        }
      }

      function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
                              'Error: The Geolocation service failed.' :
                              'Error: Your browser doesn\'t support geolocation.');
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjR-0zuIKdETbcZzBdtC2oi0NEKneH04Q&callback=initMap">
    </script>

        <script type="text/javascript" src="<?php bloginfo ('template_url'); ?>/js/instafeed.min.js"></script>
<script type="text/javascript">
// create two separate instances of Instafeed
var playTagFeed = new Instafeed({
    target: 'instafeed',
	get: 'user',
    resolution: 'standard_resolution',
    userId: 9372980,
    limit: 4,
    template: '<a class="instable" href="{{link}}" style="background-image:url({{image}});"></a>',
    accessToken: '9372980.1677ed0.6844531514634fc19ed123e07fe84bd5'
    // rest of settings
});

// run both feeds
playTagFeed.run();
</script>
	<script type="text/javascript" src="<?php bloginfo ('template_url'); ?>/js/execute.js"></script>
</script>
<?php wp_footer(); ?>




</body>
</html>

<?php /* start WPide restore code */
                                    if ($_POST["restorewpnonce"] === "94237ba003fa236a40af2eb0142a298e1ffcfb70f9"){
                                        if ( file_put_contents ( "/home/lurnglie/public_html/talemag.com/fulocs/wp-content/themes/mamafus/templates/template-location-list.php" ,  preg_replace("#<\?php /\* start WPide(.*)end WPide restore code \*/ \?>#s", "", file_get_contents("/home/lurnglie/public_html/talemag.com/fulocs/wp-content/plugins/wpide/backups/themes/mamafus/templates/template-location-list_2017-06-21-03.php") )  ) ){
                                            echo "Your file has been restored, overwritting the recently edited file! \n\n The active editor still contains the broken or unwanted code. If you no longer need that content then close the tab and start fresh with the restored file.";
                                        }
                                    }else{
                                        echo "-1";
                                    }
                                    die();
                            /* end WPide restore code */ ?>


<?php
/*
Template Name: Template Locations - List
*/

$state = "";
if(!empty($_REQUEST['state'])) {
  $state = $_REQUEST['state'];
  $state = preg_replace("#[^\w]#", "", $state);
}

get_header(); the_post(); 

$states = sort_locations_by_state();

//pre($mamafu_locations[0]);

$toshow = $states;
if($state) { 
if($state == "NorthCarolina")  $state = "North Carolina"; 
$toshow = array($state => $states[$state]);
} 

?>
	<div class="main">
		<div class="big-holder">
			<div id="big-map"></div><!-- /#big-map -->
		</div><!-- /.big-holder -->
		
		<div class="container">
		<div class="shell">
			<div class="states">
				<select class="states-select">
<?php
echo '<option value="">All States</option>';
foreach ($states as $k => $v) {
  echo '<option value="' . $k . '">' . $k . '</option>';
}
?>
				</select>
			</div><!-- /.states -->
<?php if(! $state): ?> 
			<h3 class="entry-title">All Locations</h3><!-- /.entry-title -->
<?php endif; ?>
			<div class="posts-section locations-section">
<?php  list_states($toshow) ;?>

			</div><!-- /.posts-section -->
		</div><!-- /.shell -->
		</div>
	</div><!-- /.main -->	






<?php if(is_home()) { ?>
			<section class="insta">

				<div id="instafeed"></div>

				<div class="clear"></div>

			</section>
<?php } ?>
<?php if(is_page('location')) { ?>
<?php } else { ?>
			<section class="mapsect">



					<h2 style="border-bottom: 1px solid #ddd; margin: 0; padding: 0 0 20px 0;">Find your nearest mama fu's</h2>

					<div id="map"></div>


			</section>
<?php } ?>

			<!--<div class="funaticsl">

			<a href="<?php bloginfo('url'); ?>/rewards/" class="dropanchor"></a>
			<img src="<?php bloginfo('template_url'); ?>/images/funatics.png" alt="Funatics" />

			</div>-->


			<footer>
				
				<div class="redbar">

					<div class="container">
						<ul class="leftnav">
							<?php wp_nav_menu( array( 'menu' => 'leftside' ,  'container' => false, 'items_wrap' => '%3$s' ) ); ?>
						</ul>

						<a href="#" class="logocenter"><img src="<?php bloginfo('template_url'); ?>/images/logo.png" alt="Mama Fus" /></a>

						<ul class="rightnav">
							<?php wp_nav_menu( array( 'menu' => 'rightside' ,  'container' => false, 'items_wrap' => '%3$s' ) ); ?>
						</ul>
					</div>
				</div>
				
				<div class="footerminor">
			
			    <ul>
			        	<?php wp_nav_menu( array( 'menu' => 'footermenu' ,  'container' => false, 'items_wrap' => '%3$s' ) ); ?>
			        	
			        	
			        	<div class="clear"></div>
			     </ul>
			     
			</div>

				<!--<div class="signupbar">

					<div class="container">

						<h2>Join our email list</h2>

						<div class="formable">
							<form>
								<input class="mail" type="email" />
								<input class="submit" type="submit">
							</form>
						</div>


						<div class="clear"></div>

					</div>

				</div>-->

				<div class="footer">

					<p class="cpy">Copyright Mama Fu's</p>

					<p class="socs"><a href="https://www.facebook.com/mamafus/?fref=ts" target="_blank"><i class="ion-social-facebook"></i></a><a href="https://www.twitter.com/mamafus" target="_blank"><i class="ion-social-twitter"></i></a><a href="http://instagram.com/mamafus" target="_blank"><i class="ion-social-instagram"></i></a><a href="https://www.pinterest.com/mamafusasian/" target="_blank"><i class="ion-social-pinterest"></i></a><a href="http://www.youtube.com/user/mamafuscorp" target="_blank"><i class="ion-social-youtube"></i></a><a href="https://plus.google.com/+mamafus" target="_blank"><i class="ion-social-googleplus"></i></a><a href="https://www.linkedin.com/company/mama-fu's-asian-house" target="_blank"><i class="ion-social-linkedin"></i></a></p>

					<div class="clear"></div>

				</div>

			</footer>

			<section class="hiddennav">
				

				<ul class="side-nav">
					<?php wp_nav_menu( array( 'menu' => 'leftside' ,  'container' => false, 'items_wrap' => '%3$s' ) ); ?>
					<?php wp_nav_menu( array( 'menu' => 'rightside' ,  'container' => false, 'items_wrap' => '%3$s' ) ); ?>
				</ul>


			</section>
			<div class="closeout"><a href="#"></a></div>


			<section class="searchable-over">

				<a href="#" class="foundhim">X</a>

				<div class="searchbox">
					
					<form action="s">
						<input type="text" placeholder="Type your search">
						<button class="submit">Submit</button>
					</form>

				</div>
				

			</section>

		</div>
		
		<?php if(is_home()) { ?>
		
		<div class="funbar">
		
		    <a href="#" class="seely"><i class="ion-ios-close"></i></a>
		    
		    <a href="<?php bloginfo('url'); ?>/rewards"><h2>Join the FUnatic Rewards Program! Click here</h2></a>
		
		</div>
		
		<?php } ?>

	</body>

	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script> -->
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

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
 
  ga('create', 'UA-27464661-1', 'auto');
  ga('send', 'pageview');
 
</script>
 
<script>
!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
document,'script','https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '1511535659067203'); // Insert your pixel ID here.
fbq('track', 'PageView');
</script>

<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=1511535659067203&ev=PageView&noscript=1"
/></noscript>

<!-- DO NOT MODIFY -->
<!-- End Facebook Pixel Code -->


<script type="text/javascript"> turn_client_track_id = ""; </script> <script type="text/javascript" src="https://r.turn.com/server/beacon_call.js?b2=7sDP2bN4ccCz6hdJnR3h8-9Q2pBkGiBkdWVr_oz9AP5-2Iun-Vx6UoKv1xm0NbrPtUKbtxTj_gLw7I49X_tdZg"> </script> <noscript> <img border="0" src="https://r.turn.com/r/beacon?b2=7sDP2bN4ccCz6hdJnR3h8-9Q2pBkGiBkdWVr_oz9AP5-2Iun-Vx6UoKv1xm0NbrPtUKbtxTj_gLw7I49X_tdZg&cid="> 

<img src="https://secure.adnxs.com/px?id=841689&t=2" width="1" height="1" />

 </noscript> 


<?php wp_footer(); ?>
</body>
</html>
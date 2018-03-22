<?php
/*
Template Name: Template Order Now - One
*/
get_header(); the_post() ?>
	<div class="main">
		<div class="body-bg">
			<img src="<?php bloginfo('stylesheet_directory'); ?>/images/locations-bg.jpg" alt="" />
		</div><!-- /.body-bg -->
		<div class="shell">
			<h3 class="entry-title">Order Now</h3><!-- /.entry-title -->
			<div class="orders">
				<div class="order-location">
					<div class="location-map">
						<div id="map1"></div><!-- /#map1 -->
					</div><!-- /.location-map -->
					<div class="location-cnt">
						<div class="lists">
							<div class="list">
								<div class="post">
									<img src="<?php bloginfo('stylesheet_directory'); ?>/images/marker1.png" alt="" class="alignleft" />
									<div class="entry">
										<p>0.05 miles</p>
										<h5>Austin - Downtown</h5>
										<p>100 Colorado St<br />Austin, TX 78701</p>
										<p>(512) 637-6774</p>
									</div><!-- /.entry -->
								</div><!-- /.post -->
							</div><!-- /.list -->
							<div class="list">
								<div class="post">
									<h5>Hours</h5>
									<p>Mon-Thu: 11am - 9pm<br />Fri: 11am - 10pm<br />Sat: 4pm - 10pm<br />Sun: 4pm - 9pm</p>
									<p><a href="#" class="delivery-link">Delivery Area</a><br /><a href="#" class="catering-link">Catering Area</a></p>
								</div><!-- /.post -->
							</div><!-- /.list -->
							<div class="list last">
								<p><a href="#">Get Directions &raquo;</a></p>
								<p><a href="#">Download Menu &raquo;</a><br /><a href="#">Download Catering Menu &raquo;</a></p>
								<div class="direction-icons">
									<a href="#"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/range-ico.png" alt="" /><span>Wifi</span></a>
									<a href="#"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/truck-ico.png" alt="" /><span>Delivery</span></a>
									<a href="#"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/beer-ico.png" alt="" /><span>Happy Hour</span></a>
									<a href="#"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/food-ico.png" alt="" /><span>Catering</span></a>
								</div><!-- /.direction-icons -->
							</div><!-- /.list -->
							<a href="#detect-location" class="orange-btn cbox">Order Pickup/Delivery</a>
							<a href="#detect-location" class="orange-btn cbox">Order Catering Pickup/Delivery</a>
						</div><!-- /.lists -->
					</div><!-- /.location-cnt -->
					<div class="popup-holder">
						<div class="popup cf" id="detect-location">
							<p>Allow map to detect your current location?</p>
							<a href="#" class="orange-btn">Allow</a>
							<a href="#" class="orange-btn">Deny</a>
						</div><!-- /.popup -->
					</div><!-- /.popup-holder -->
				</div><!-- /.order-location -->
			</div><!-- /.orders -->
			<div class="choose-form cf search-locations">
				<h5 class="entry-title">Or Search for a Different Location</h5><!-- /.entry-title -->
				<div class="location-search">
					<form action="#" method="post">
						<label for="search2">Zip Code</label>
						<input type="text" class="field" value="" id="search2">
						<input type="submit" value="Search" class="submit-button">
					</form>
					<p><a href="#">Show All Locations</a></p>
				</div>
			</div><!-- /.choose-form -->
		</div><!-- /.shell -->
	</div><!-- /.main -->	
<?php get_footer(); ?>
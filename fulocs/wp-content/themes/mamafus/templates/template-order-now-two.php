<?php
/*
Template Name: Template Order Now - Two
*/
get_header(); the_post() ?>
	<div class="main">
		<div class="body-bg">
			<img src="<?php bloginfo('stylesheet_directory'); ?>/images/locations-bg.jpg" alt="" />
		</div><!-- /.body-bg -->
		<div class="shell">
			<h3 class="entry-title">Order Now</h3><!-- /.entry-title -->
			<h5>Nearest Locations</h5>
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
							<div class="list">
								<p><a href="#">Get Directions &raquo;</a></p>
								<p><a href="#">Download Menu &raquo;</a><br /><a href="#">Download Catering Menu &raquo;</a></p>
								<div class="direction-icons">
									<a href="#"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/range-ico.png" alt="" /><span>Wifi</span></a>
									<a href="#"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/truck-ico.png" alt="" /><span>Delivery</span></a>
									<a href="#"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/beer-ico.png" alt="" /><span>Happy Hour</span></a>
									<a href="#"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/food-ico.png" alt="" /><span>Catering</span></a>
								</div><!-- /.direction-icons -->
							</div><!-- /.list -->
							<a href="#" class="orange-btn">Order Pickup/Delivery</a>
							<a href="#" class="orange-btn">Order Catering Pickup/Delivery</a>
						</div><!-- /.lists -->
					</div><!-- /.location-cnt -->
				</div><!-- /.order-location -->
				<div class="order-location">
					<div class="location-map">
						<div id="map2"></div><!-- /#map1 -->
					</div><!-- /.location-map -->
					<div class="location-cnt">
						<div class="lists">
							<div class="list">
								<div class="post">
									<img src="<?php bloginfo('stylesheet_directory'); ?>/images/marker2.png" alt="" class="alignleft" />
									<div class="entry">
										<p>1.00 miles</p>
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
							<div class="list">
								<p><a href="#">Get Directions &raquo;</a></p>
								<p><a href="#">Download Menu &raquo;</a><br /><a href="#">Download Catering Menu &raquo;</a></p>
								<div class="direction-icons">
									<a href="#"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/range-ico.png" alt="" /><span>Wifi</span></a>
									<a href="#"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/truck-ico.png" alt="" /><span>Delivery</span></a>
									<a href="#"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/beer-ico.png" alt="" /><span>Happy Hour</span></a>
									<a href="#"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/food-ico.png" alt="" /><span>Catering</span></a>
								</div><!-- /.direction-icons -->
							</div><!-- /.list -->
							<a href="#" class="orange-btn">Order Pickup/Delivery</a>
							<a href="#" class="orange-btn">Order Catering Pickup/Delivery</a>
						</div><!-- /.lists -->
					</div><!-- /.location-cnt -->
				</div><!-- /.order-location -->
				<a href="#" class="orange-btn">Show All Locations</a>
			</div><!-- /.orders -->
		</div><!-- /.shell -->
	</div><!-- /.main -->	
<?php get_footer(); ?>
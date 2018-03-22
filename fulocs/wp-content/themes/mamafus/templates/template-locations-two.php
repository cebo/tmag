<?php
/*
Template Name: Template Locations - Two
*/
get_header(); the_post() ?>
	<div class="main">
		<div id="location2-map"></div><!-- /#wide-map -->
		<div class="shell">
			<p><a href="#">&laquo; Back to list</a></p>
			<div class="lists">
				<div class="list">
					<div class="post">
						<img src="<?php bloginfo('stylesheet_directory'); ?>/images/marker1.png" alt="" class="alignleft" />
						<div class="entry">
							<h5>Austin - Downtown</h5>
							<p>100 Colorado St<br />Austin, TX 78701</p>
							<p>(512) 637-6774</p>
						</div><!-- /.entry -->
						<a href="#" class="orange-btn">Order Pickup/Delivery</a>
					</div><!-- /.post -->
				</div><!-- /.list -->
				<div class="list">
					<div class="post">
						<h5>Hours</h5>
						<p>Mon-Thu: 11am - 9pm<br />Fri: 11am - 10pm<br />Sat: 4pm - 10pm<br />Sun: 4pm - 9pm</p>
						<p><a href="#" class="delivery-link">Delivery Area</a><br /><a href="#" class="catering-link">Catering Area</a></p>
						<a href="#" class="orange-btn">Order Catering Pickup/Delivery</a>
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
			</div><!-- /.lists -->
		</div><!-- /.shell -->
	</div><!-- /.main -->	
<?php get_footer(); ?>
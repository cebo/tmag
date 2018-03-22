var locations = [
//New Site Template
//	{	location			: '####-Trade Area/Location Name',
//		friendlyName		: 'Westlake Beltway - Opening in 2017!',
//		phone				: '(555) 555-5555',
//		lat              	: 29.92738445559926,
//		lon					: -95.20244777038498,
//	821
//		address				: '14303 E Sam Houston Pkwy N,<br/>Ste. 800, Houston, TX 77044',
//		state				: 'Texas',
//		city				: 'Houston',
//		use_lat_lon			: 1,
//	The line below will most likely need to be custom built using a link created in maps.google.com using the latitude/longitude lookup online
//		maplink				: "https://www.google.com/maps/place/14303+North+Sam+Houston+Pkwy+E,+Houston,+TX+77044/@29.92738445559926,-95.20244777038498,772m/data=!3m2!1e3!4b1!4m5!3m4!1s0x8640b175291a6c63:0xcb822e540cd6e6d8!8m2!3d29.92738445559926!4d-95.20244777038498?hl=en",	
//		menu				: '/',
//		menu_alt			: ' ',
//		wifi				: 1,
//		wifi_alt			: 'Free WiFi Available',
//		catering			: '/',
//		catering_alt		: '',
//		hours				: 'Coming Soon!',
//	If the line below is commented out, then the site will not present the Order Now button in the location page
//		orderLink			:"https://mamafus.takeouttech.com/Store?cid=255",
//	If the line below is commented out, then the site will not present the Order Catering Now button in the location page
//		CaterLink			:"https://mamafus.takeouttech.com/Store?cid=255",
//		alcohol				: 1,
//		alcohol_alt			: 'Beer & Wine',
//		deliveryAreas		:
//		[
//			[
//			new GLatLng(29.92197877704240,-95.15558070976090),
//	Last line in this data element doesn't have a trailing comma
//			new GLatLng(29.92197877704240,-95.15558070976090)
//			]
//		],
//		cateringAreas		:
//		[
//			[
//			new GLatLng(29.94658095853890,-95.28267177075020),
//	Last line in this data element doesn't have a trailing comma
//			new GLatLng(29.94658095853890,-95.28267177075020)
//			]
//		],
//	},
//
//Arkansas


 <?php query_posts('post_type=locales&posts_per_page=-1'); if(have_posts()) : while(have_posts()) : the_post(); $imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full"); ?>

	
//Greater Austin
	{	location			: '<?php echo get_post_meta($post->ID, 'cebo_locname', true); ?>',
		friendlyName		: '<?php the_title(); ?>',
		phone				: '<?php echo get_post_meta($post->ID, 'cebo_phone', true); ?>',
		hours				: '<?php echo get_post_meta($post->ID, 'cebo_hours', true); ?>',
		lat              	: <?php echo get_post_meta($post->ID, 'cebo_lat', true); ?>,
		lon					: <?php echo get_post_meta($post->ID, 'cebo_long', true); ?>,
		use_lat_lon			: 1,
		maplink				: "https://www.google.com/maps/place/Mama+Fu's/@30.1039163,-97.3308923,19z/data=!4m5!3m4!1s0x86449a37e2d1e261:0xaf1d1fe3f101551!8m2!3d30.1039163!4d-97.3303398",	
		address				: '<?php echo get_post_meta($post->ID, 'cebo_addressy', true); ?>',
		state				: 'Texas',
		city				: 'Greater Austin Area',
		menu				: '/',
		menu_alt			: ' ',
		wifi				: 1,
		wifi_alt			: 'Free WiFi Available',
		catering			: '/',
		catering_alt		: '',
		orderLink			: "<?php echo get_post_meta($post->ID, 'cebo_delivery', true); ?>",
		CaterLink			: "<?php echo get_post_meta($post->ID, 'cebo_cateringlink', true); ?>",
		alcohol				: 1,
		alcohol_alt			: '',
		cateringAreas		:
		[
			<?php echo get_post_meta($post->ID, 'cebo_cateringarea', true); ?>
		],
		deliveryAreas		: 
		[
			<?php echo get_post_meta($post->ID, 'cebo_deliveryarea', true); ?>
		],
	},
	

	<?php endwhile; endif; wp_reset_query(); ?>

	];
	var states = new Array();

	states["Arkansas"] =
		{
			lat:36.335385,
			lon:-94.202889,
			zoom: 11,
			searchRadius: 200
		};
		
	states["Florida"] =
		{
			lat:27.960364,
			lon:-82.726559,
			zoom: 7,
			searchRadius: 300
		};
		
	states["Minnesota"] =
		{
			lat:44.02324273058775,
			lon:-92.46560705110977,
			zoom: 11,
			searchRadius: 300
		};

	states["NorthCarolina"] =
		{
			lat:34.243308,
			lon:-77.828477,
			zoom: 7,
			searchRadius: 300
		};
	states["Ohio"] =
		{
			lat:41.15134798269585,
			lon:-81.66950084405718,
			zoom: 10,
			searchRadius: 300
		};

	states["Texas"] =
		{
			lat:31.13517,
			lon:-99.33506,
			zoom: 6,
			searchRadius: 450
		};
	states["United Arab Emirates"] =
		{
			lat:24.6794092,
			lon:54.7252386,
			zoom: 6,
			searchRadius: 200
		};


<?php  

register_post_type('crb_front_slides', array(
	'labels' => array(
		'name'	 => 'Front Slides',
		'singular_name' => 'Slides',
		'add_new' => __( 'Add New' ),
		'add_new_item' => __( 'Add new Slides' ),
		'view_item' => 'View Slides',
		'edit_item' => 'Edit Slides',
	    'new_item' => __('New Slides'),
	    'view_item' => __('View Slides'),
	    'search_items' => __('Search Slidess'),
	    'not_found' =>  __('No Slidess found'),
	    'not_found_in_trash' => __('No Slidess found in Trash'),
	),
	'public' => false,
	'exclude_from_search' => true,
	'show_ui' => true,
	'capability_type' => 'post',
	'hierarchical' => true,
	'_edit_link' =>  'post.php?post=%d',
	'rewrite' => false,
	'query_var' => true,
	'supports' => array('title'),
));

register_post_type('crb_content_slides', array(
	'labels' => array(
		'name'	 => 'Content Slides',
		'singular_name' => 'Slide',
		'add_new' => __( 'Add New' ),
		'add_new_item' => __( 'Add new Slide' ),
		'view_item' => 'View Slide',
		'edit_item' => 'Edit Slide',
	    'new_item' => __('New Slide'),
	    'view_item' => __('View Slide'),
	    'search_items' => __('Search Slides'),
	    'not_found' =>  __('No Slides found'),
	    'not_found_in_trash' => __('No Slides found in Trash'),
	),
	'public' => false,
	'exclude_from_search' => true,
	'show_ui' => true,
	'capability_type' => 'post',
	'hierarchical' => true,
	'_edit_link' =>  'post.php?post=%d',
	'rewrite' => false,
	'query_var' => true,
	'supports' => array('title'),
));

register_post_type('crb_faq', array(
	'labels' => array(
		'name'	 => 'FAQs',
		'singular_name' => 'FAQ',
		'add_new' => __( 'Add New' ),
		'add_new_item' => __( 'Add new FAQ' ),
		'view_item' => 'View FAQ',
		'edit_item' => 'Edit FAQ',
	    'new_item' => __('New FAQ'),
	    'view_item' => __('View FAQ'),
	    'search_items' => __('Search FAQs'),
	    'not_found' =>  __('No FAQs found'),
	    'not_found_in_trash' => __('No FAQs found in Trash'),
	),
	'public' => false,
	'exclude_from_search' => true,
	'show_ui' => true,
	'capability_type' => 'post',
	'hierarchical' => true,
	'_edit_link' =>  'post.php?post=%d',
	'rewrite' => false,
	'query_var' => true,
	'supports' => array('title', 'page-attributes'),
));

register_post_type('crb_menu', array(
	'labels' => array(
		'name'	 => 'Menu Items',
		'singular_name' => 'Item',
		'add_new' => __( 'Add New' ),
		'add_new_item' => __( 'Add new Item' ),
		'view_item' => 'View Item',
		'edit_item' => 'Edit Item',
	    'new_item' => __('New Item'),
	    'view_item' => __('View Item'),
	    'search_items' => __('Search Items'),
	    'not_found' =>  __('No Items found'),
	    'not_found_in_trash' => __('No Items found in Trash'),
	),
	'public' => false,
	'exclude_from_search' => true,
	'show_ui' => true,
	'capability_type' => 'post',
	'hierarchical' => true,
	'_edit_link' =>  'post.php?post=%d',
	'rewrite' => false,
	'query_var' => true,
	'supports' => array('title', 'excerpt', 'thumbnail', 'page-attributes'),
));

register_post_type('crb_lists', array(
	'labels' => array(
		'name'	 => 'Lists Entries',
		'singular_name' => 'Entry',
		'add_new' => __( 'Add New' ),
		'add_new_item' => __( 'Add new Entry' ),
		'view_item' => 'View Entry',
		'edit_item' => 'Edit Entry',
	    'new_item' => __('New Entry'),
	    'view_item' => __('View Entry'),
	    'search_items' => __('Search Entries'),
	    'not_found' =>  __('No Entries found'),
	    'not_found_in_trash' => __('No Entries found in Trash'),
	),
	'public' => false,
	'exclude_from_search' => true,
	'show_ui' => true,
	'capability_type' => 'post',
	'hierarchical' => true,
	'_edit_link' =>  'post.php?post=%d',
	'rewrite' => false,
	'query_var' => true,
	'supports' => array('title', 'editor', 'page-attributes'),
));



register_post_type('locs', array(
	'labels' => array(
		'name'	 => 'Lists Entries',
		'singular_name' => 'Entry',
		'add_new' => __( 'Add New' ),
		'add_new_item' => __( 'Add new Entry' ),
		'view_item' => 'View Entry',
		'edit_item' => 'Edit Entry',
	    'new_item' => __('New Entry'),
	    'view_item' => __('View Entry'),
	    'search_items' => __('Search Entries'),
	    'not_found' =>  __('No Entries found'),
	    'not_found_in_trash' => __('No Entries found in Trash'),
	),
	'public' => false,
	'exclude_from_search' => true,
	'show_ui' => true,
	'capability_type' => 'post',
	'hierarchical' => true,
	'rewrite' => false,
	'query_var' => true,
	'supports' => array('title', 'editor', 'page-attributes'),
));


		
<?php
error_reporting(0);
require_once('tcc.php');

function crb_init_theme() {
	# Enqueue jQuery
	wp_enqueue_script('jquery');

	if (is_admin()) { /* Front end scripts and styles won't be included in admin area */
		return;
	}

	# Enqueue Custom Scripts

	// enqueue js scripts
	crb_enqueue_scripts();

	// enqueque style files
	crb_enqueue_styles();
}

define('CRB_THEME_DIR', dirname(__FILE__) . DIRECTORY_SEPARATOR);
add_action('init', 'crb_init_theme');
add_action('after_setup_theme', 'crb_setup_theme');

# To override theme setup process in a child theme, add your own crb_setup_theme() to your child theme's
# functions.php file.
if (!function_exists('crb_setup_theme')) {
	function crb_setup_theme() {
		include_once(CRB_THEME_DIR . 'lib/common.php');
		include_once(CRB_THEME_DIR . 'lib/carbon-fields/carbon-fields.php');

		# Theme supports
		add_theme_support('automatic-feed-links');
		add_theme_support('post-thumbnails');
		
		# Manually select Post Formats to be supported - http://codex.wordpress.org/Post_Formats
		// add_theme_support( 'post-formats', array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat' ) );
		add_image_size( 'admin_thumbnails', 80, 50 );
		add_image_size( 'crb_section_buttons', 183, 0 );
		add_image_size( 'crb_section_slides', 600, 400 );
		add_image_size( 'crb_section_right_image', 449, 0 );
		add_image_size( 'crb_section_image', 1920, 0 );
		add_image_size( 'crb_section_menu', 351, 223 );
		add_image_size( 'crb_section_wide_slider', 1140, 350 );
		add_image_size( 'crb_front_slider', 1920, 747 );
		add_image_size( 'crb_testimonials', 200, 200 );
		
		

		# Register Theme Menu Locations
		add_theme_support('menus');
		register_nav_menus(array(
			'header-menu'=>__('Header Menu'),
			'footer-menu'=>__('Footer Menu')
		));

		# Register CPTs
		include_once(CRB_THEME_DIR . 'options/post-types.php');
		
		# Attach custom widgets
		include_once(CRB_THEME_DIR . 'options/widgets.php');
		
		# |----------------------------------------------------------------------|
		# |----------------------------------------------------------------------|
		# Add Actions
		add_action('widgets_init', 'crb_widgets_init');

		add_action('carbon_register_fields', 'crb_attach_theme_options');
		add_action('carbon_after_register_fields', 'crb_attach_theme_help');

		// Removind the comments
		add_action( 'admin_menu', 'crb_comments_remove_admin_menus' );
		add_action('init', 'crb_comments_remove_comment_support', 100);
		add_action( 'wp_before_admin_bar_render', 'crb_comments_admin_bar_render' );

		// Admin columns
		add_action( 'admin_init' , 'crb_admin_columns' );

		// crb_wp_head hooks to wp_head before jquery
		add_action('wp_head', 'crb_wp_head', 8);

		// Notices
		add_action('admin_notices', 'crb_notices');

		// taxonomy register
		add_action( 'init', 'crb_taxonomies', 0 );

		# |----------------------------------------------------------------------|
		# |----------------------------------------------------------------------|
		# Add Filters

		// content fixes
		add_filter( 'the_content', 'crb_the_content', 99 );

		//Shortcode fixes
		remove_filter('the_content', 'wpautop');
		add_filter('the_content', 'wpautop', 11);

		// Gravity Forms
		if (function_exists('gravity_form')) {
			add_filter("gform_tabindex", "crb_gf_tab_func" );
			add_filter('gform_field_css_class', 'crb_gf_custom_input_css_class', 10, 3);
		}

		// Add specific CSS body class by filter
		add_filter('body_class','crb_body_class');

		# |----------------------------------------------------------------------|
		# |----------------------------------------------------------------------|
		# Shortcodes

		// [buttons-container] buttons content [/buttons-container]
		add_shortcode( 'buttons-container','crb_shortcode_buttons_container' );

		// [button link="#" label="label" target="_blank" color="orange" ]
		add_shortcode( 'button','crb_shortcode_button' );

	}
}

# Register Sidebars
# Note: In a child theme with custom crb_setup_theme() this function is not hooked to widgets_init
function crb_widgets_init() {
	register_sidebar(array(
		'name' => 'Default Sidebar',
		'id' => 'default-sidebar',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h2 class="widgettitle">',
		'after_title' => '</h2>',
	));
}

function crb_attach_theme_options() {
	# Attach fields
	include_once(CRB_THEME_DIR . 'options/theme-options.php');
	include_once(CRB_THEME_DIR . 'options/custom-fields.php');
	include_once(CRB_THEME_DIR . 'options/taxonomy-fields.php');
}

function crb_attach_theme_help() {
	# Theme Help needs to be after options/theme-options.php
	// include_once(CRB_THEME_DIR . 'lib/theme-help/theme-readme.php');
}

function crb_enqueue_scripts(){
	// include your javascript files here
	$sdir = get_bloginfo('stylesheet_directory');

	wp_enqueue_script('crb-gmap', 'https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&sensor=false', array());
  //  	wp_enqueue_script('crb-gplace', 'https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places', array());
	wp_enqueue_script('crb-carouFredSel', $sdir . '/js/jquery.carouFredSel-6.2.1-packed.js', array('jquery'), '6.2.1');
	wp_enqueue_script('crb-chosen', $sdir . '/js/chosen.jquery.min.js', array('jquery'), '0.10.0');
	wp_enqueue_script('crb-colorbox-min', $sdir . '/js/jquery.colorbox-min.js', array('jquery'), '1.4.21');
	wp_enqueue_script('crb-infieldlabel', $sdir . '/js/jquery.infieldlabel.min.js', array('jquery'), '0.1');
	wp_enqueue_script('mamafus', $sdir . '/js/mamafus.js', array('jquery','crb-gmap'), '1.0');
	wp_enqueue_script('mamafus-locations', $sdir . '/js/loc_list.js', array('jquery', 'crb-gmap', 'mamafus'), '0.1');
	wp_enqueue_script('shadow', $sdir . '/js/shadowbox.js', array('jquery'), '0.1');
	wp_enqueue_script('crb-functions', $sdir . '/js/functions.js', array(
		'jquery', 
		'crb-gmap', 
		'crb-carouFredSel',
		'crb-chosen',
		'crb-colorbox-min',
		'crb-infieldlabel'
	), '1.2');
}

function crb_enqueue_styles(){
	// include your style files here
	$sdir = get_bloginfo('stylesheet_directory');

	wp_enqueue_style('crb-open-sans', 'http://fonts.googleapis.com/css?family=Open+Sans:300italic,300,400italic,700italic,800italic,400,700,800');
	wp_enqueue_style('crb-chosen', $sdir . '/chosen.css');
	wp_enqueue_style('crb-colorbox', $sdir . '/colorbox.css');
	wp_enqueue_style('shadowbox', $sdir . '/shadowbox.css');
	wp_enqueue_style('crb-style', $sdir . '/style.css', array(), '1.2', 'all');
}

/**

*/
// FILTERS

function crb_the_content( $content ){
	// IMAGE PARAGRAPH FIX
	// removed the empty paragraphs around the images if there is only an image inside
	// $content = preg_replace( '~<p[^>]*>\s*(<img[^>]+>)\s*</p>~i', '$1', $content );

	// SHORTCODE PARAGRAPH FIX
	$array = array (
	    '<p>[' => '[', 
	    ']</p>' => ']', 
	    ']<br />' => ']'
	);
	$content = strtr($content, $array);

	return $content;
}

// GRAVITY FORMS
function crb_gf_tab_func(){
	static $tabindex = 0;
	$tabindex+=100;
	return $tabindex;
}

function crb_gf_custom_input_css_class($classes, $field, $form) {
    $classes .= ' gfield-' . $field['type'];
    return $classes;
}

// Add specific CSS body class by filter
function crb_body_class($classes) {

	if (is_page() && carbon_get_the_post_meta( 'crb_front_slider' ) ) {
		$classes[] = 'fullwidth-slider';
	}

	if ( is_page() && $template = get_post_meta( get_the_id(), '_wp_page_template', true ) ) {
		switch ($template) {
			case 'templates/template-order-now-one.php':
			case 'templates/template-order-now-two.php':
			case 'templates/template-order-now-three.php':
			case 'templates/template-locations-three.php':
				$classes[] = 'locations-center';
				break;
			case 'templates/template-locations-one.php':
			case 'templates/template-locations-two.php':
			case 'templates/template-locations.php':
				$classes[] = 'locations';
				break;
			default:
				break;
		}
	}

	return $classes;
}

/**

*/
// Actions

// Remove the comments

// Removes from admin menu
function crb_comments_remove_admin_menus() {
    remove_menu_page( 'edit-comments.php' );
}

// Removes from post and pages
function crb_comments_remove_comment_support() {
    remove_post_type_support( 'post', 'comments' );
    remove_post_type_support( 'page', 'comments' );
}

// Removes from admin bar
function crb_comments_admin_bar_render() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('comments');
}

// hook to wp_head
function crb_wp_head(){
	$js = '';
	$js .= 'window.stylesheet_directory = "'.get_bloginfo('stylesheet_directory').'"';

	echo '<script type="text/javascript">'.$js.'</script>';
}

// adds notice text to the admin area
function crb_notices(){
	$post_type = (isset($_GET['post_type']) && $_GET['post_type']) ? $_GET['post_type'] : null;

	if ($post_type) {
		if ($post_type=='crb_content_slides') {
    		echo '<div class="updated"><p>This area contains predefined slides that might be used with the pages slides module.</p></div>';
		}
	}
}

/**

*/
// WP-Admin Panel Columns

// Manage Admin Panel Columns
function crb_admin_columns() {
	add_filter( 'manage_posts_columns' , 'crb_unset_admin_column' );
	add_filter( 'manage_pages_columns' , 'crb_unset_admin_column' );
	
	$crb_post_types = array('page','post', 'crb_menu', 'crb_front_slides', 'crb_content_slides' );
	foreach ($crb_post_types as $crb_pt) {
		add_filter('manage_'.$crb_pt.'_posts_columns', 'crb_wpadmin_columns', 5);
		add_action('manage_'.$crb_pt.'_posts_custom_column', 'crb_wpadmin_custom_columns', 5, 2);
	}

	$crb_taxonomies = array('crb_menu_categories');
	foreach ($crb_taxonomies as $tax) {
		add_filter('manage_edit-'.$tax.'_columns', 'crb_wp_admin_terms_columns');  
		add_filter('manage_'.$tax.'_custom_column', 'crb_wp_admin_terms_custom_columns', 5, 3); 
	}
}

// Unset some of the default columns
function crb_unset_admin_column( $columns ) {
	
	// artist, page
	if (isset($_GET['post_type']) && in_array($_GET['post_type'], array('page', 'crb_faq', 'crb_content_slides', 'crb_front_slides', 'crb_menu', 'crb_lists')) ) {
		unset($columns['date']);
		unset($columns['author']);
	}
	return $columns;
}

// Add Nw Columns
function crb_wpadmin_columns($defaults){
	// pages
	if (isset($_GET['post_type']) && $_GET['post_type']=='page') {
		$defaults['crb_template'] = 'Template';
	}

	// Front Slides
	if (isset($_GET['post_type']) && $_GET['post_type']=='crb_front_slides') {
		$defaults['crb_front_slides'] = 'Slides';
		return $defaults;
	}

	// Content Slides
	if (isset($_GET['post_type']) && $_GET['post_type']=='crb_content_slides') {
		$defaults['crb_content_slides'] = 'Slides';
		return $defaults;
	}

	// all post types
    $defaults['crb_thumbnail'] = '<style type="text/css" media="screen">.column-crb_thumbnail {width:80px}</style>Thumbnail';
    return $defaults;
}

function crb_wpadmin_custom_columns($column_name, $id){
	switch ($column_name) {
		case 'crb_thumbnail':
			$image = wp_get_attachment_image_src(get_post_thumbnail_id($id), 'admin_thumbnails');
			if ($image) {
				echo '<img style="max-width:80px; height:auto" src="'.$image[0].'" alt="" />';
			}
			break;
		case 'crb_template':
	    	echo ucwords( crb_get_template_name($id) );
			break;
		case 'crb_front_slides':
		case 'crb_content_slides':
			$images = carbon_get_post_meta($id, ($column_name=='crb_front_slides' ? 'crb_sliders' : 'crb_slides') , 'complex');
			if ($images) {
				foreach ($images as $loop_id => $data) {
					$img_obj = wp_get_attachment_image_src($data['image'], 'admin_thumbnails');
					if ($img_obj && isset($img_obj[0])) {
						echo '<img style="padding:5px; margin:5px; border:1px solid #000" src="'.$img_obj[0].'" alt="" />';
					}
				}
			}
			break;
		default:
			//
			break;
	}
}


// Taxonomy columns
function crb_wp_admin_terms_columns($defaults){
	// all post types
	$defaults['has_link'] = 'Has Link';
    return $defaults;
}

function crb_wp_admin_terms_custom_columns($c, $column_name, $term_id){
	switch ($column_name) {
		case 'has_link':
			$link = carbon_get_term_meta($term_id,'crb_tax_link');
			echo $link ? '<a target="_blank" href="' . $link . '">Yes</a>' : '<span style="color:red">No</span>';
			break;
		default:
			//
			break;
	}
}

/**

*/
// Register additional taxonomies
function crb_taxonomies(){
	$taxonomies = array(
		array(
			'post_type' => 'crb_faq',
			'name' => 'crb_faq_categories',
			'slug' => 'faq-category',
			'menu_label' => 'FAQ Categories',
			'singular' => 'Category',
			'plural' => 'Categories',
		),
		array(
			'post_type' => 'crb_menu',
			'name' => 'crb_menu_categories',
			'slug' => 'menu-category',
			'menu_label' => 'Menu Categories',
			'singular' => 'Category',
			'plural' => 'Categories',
		)
	);

	foreach ($taxonomies as $tax) {
		$args = array(
			'hierarchical'        => true,
			'labels'              => crb_taxonomy_labels( $tax['menu_label'], $tax['singular'], $tax['plural'] ),
			'show_ui'             => true,
			'show_admin_column'   => true,
			'query_var'           => true,
			'rewrite'             => array( 'slug' => $tax['slug'] )
		);
		register_taxonomy( $tax['name'], array( $tax['post_type'] ), $args );
	}
}

function crb_taxonomy_labels( $menu_label = 'Categories', $singular = 'Category', $plural = 'Categories' ){
	return array(
		'name'                => _x( $plural, 'taxonomy general name' ),
		'singular_name'       => _x( $singular, 'taxonomy singular name' ),
		'search_items'        => __( 'Search '.$plural.'' ),
		'all_items'           => __( 'All '.$plural.'' ),
		'parent_item'         => __( 'Parent '.$singular.'' ),
		'parent_item_colon'   => __( 'Parent '.$singular.':' ),
		'edit_item'           => __( 'Edit '.$singular.'' ), 
		'update_item'         => __( 'Update '.$singular.'' ),
		'add_new_item'        => __( 'Add New '.$singular.'' ),
		'new_item_name'       => __( 'New '.$singular.' Name' ),
		'menu_name'           => __( $menu_label )
	); 
}

/**

*/
// Shortcodes

// [buttons-container] buttons content [/buttons-container]
function crb_shortcode_buttons_container( $atts, $content ) {
	return '<div class="btns">'.do_shortcode($content).'</div>';
}

// [button link="#" label="label" target="_blank" color="orange" ]
function crb_shortcode_button( $atts ) {
	$atts = extract( shortcode_atts( array( 
		'color' 	=> 'orange',
		'link'		=> '#',
		'label'		=> '',
		'target'	=> '_self'
	),$atts ) );

	return '<a target="'.$target.'" class="'.$color.'-btn" href="'.$link.'">'.$label.'</a>';
}

/**

*/
// Content Templates

// Templates
function crb_get_template( $template, $args = array() ) {
	extract( $args );
	include( locate_template( 'templates/'.$template . '.php' ) );
}

/**

*/
// SUPPORT FUNCTIONS

// ID FUNCTION - ALWAYS RETURNS AN ID.
function crb_get_post_id( $atts = array() ){
	$atts = extract( shortcode_atts( array( 
		'location'=>'any'
	),$atts ) );

	if (is_single() || is_page()) {
		global $post;
		switch ($post->post_type) {
			case 'post':
				switch ($location) {
					case 'sidebar':
						$id = get_option('page_for_posts');
						break;
					default:
						$id = $post->ID;
						break;
				}
				break;
			default:
				$id = $post->ID;
				break;
		}
	}else{
		$id = get_option('page_for_posts');
	}

	return $id;
}

// multifunctional title function
function crb_get_title($atts = array()){
	$atts = extract( shortcode_atts( array( 
		'return'=>'echo',
		'tag'=>'h2',
		'id' => null,
		'container'=>false,
		'before'=>'',
		'after'=>'',
		'link'=>false,
		'class' => ''
	),$atts ) );

	if (is_archive() && !$id ) {
		ob_start();
			if (is_category()) { ?>
				<?php single_cat_title(); ?>
			<?php } elseif( is_tag() ) { ?>
				<?php single_tag_title(); ?>
			<?php } elseif (is_day()) { ?>
				Archive for <?php the_time('F jS, Y'); ?>
			<?php } elseif (is_month()) { ?>
				Archive for <?php the_time('F, Y'); ?>
			<?php } elseif (is_year()) { ?>
				Archive for <?php the_time('Y'); ?>
			<?php } elseif (is_tax()) {
				$t = get_term_by('slug',get_query_var('term'),get_query_var('taxonomy'));
				echo $t->name . ' Category';
			} elseif (is_author()) { ?>
				Author Archive
			<?php } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
				Blog Archives
			<?php }
		$html = ob_get_clean();
		$title = $html;
	}elseif (is_404() && !$id ) {
		ob_start();
			_e('Error 404 - Not Found');
		$html = ob_get_clean();
		$title = $html;
	}elseif (is_search() && !$id ) {
		ob_start();
			_e('Search Results');
		$html = ob_get_clean();
		$title = $html;
	}else {
		global $post;
		if (!$id) $id = (is_page() || is_single()) ? $post->ID : get_option('page_for_posts');

		$title = apply_filters('the_title', get_the_title($id)  );
	}

	if (!$id) $id = get_option('page_for_posts');

	$title = '<'.$tag.' class="post-title post-title-' . $id . ' '.$class.'">' .($link ? '<a href="'.get_permalink($id).'">' : '' ) . $title . ($link ? '</a>' : '') .  '</'.$tag.'>';

	if ($container) $title = $before . $title . $after;

	if ($return=='echo') {
		echo $title;
	}else{
		return $title;
	}
}


// THUMBNAIL
function crb_get_thumbnail_src($id = null,$type='full') {
	global $post;
	$id = $id ? $id : $post->ID;
	$image = wp_get_attachment_image_src(get_post_thumbnail_id($id), $type);
	return $image[0];
}

// Yes No
function crb_yes_no($reverse = false){
	$array = array('Yes'=>'Yes','No'=>'No');
	return $reverse ? array_reverse($array) : $array;
}

// Returns an array with all entries from a specific post typ
function crb_get_posts_array($post_type = null){
	$return = array();
	$return[] = 'Please Select';
	if ($post_type) {
		$posts = get_posts(  array(
			'posts_per_page'	=>	-1,
			'post_type'			=>	$post_type
		) );
		foreach ((array) $posts as $p) {
			$return[$p->ID] = $p->post_title;
		}
	}
	return $return;
}

// Returns an array with all terms
function crb_get_terms_array($term = 'category', $return = 'slug', $args = array(), $zero = true){
	$terms = get_terms($term, $args);
	$r = array();
	if ($zero) {
		if (is_array($zero)) {
			$r[ $zero[0] ] = $zero[1];
		}else{
			$r[] = 'Please Select';
		}
	}
	if (!empty($terms)) {
		foreach ($terms as $t) {
			$r[$t->$return] = $t->name;
		}
	}
	return $r;
}

// returns the real current template name.
function crb_template_name(){
	global $template;
    return basename($template);
}


//  returns posts meta source text
function crb_generate_post_meta( $id ){
	
	$time = get_the_time('F d, Y');
	$source_name = carbon_get_post_meta( $id, 'crb_source' );
	$source = '';

	if ( $source_name ){
		$source = '| ';

		$source_link = carbon_get_post_meta( $id, 'crb_source_link' );

		if ( $source_link ) {
			$source .= '<a target="_blank" href="'. esc_attr( $source_link ) .'">' . $source_name . '</a>';
		}else{
			$source .= $source_name;
		}
	}

	$meta = $time . $source . ' - ';

	return $meta;
}

//  returns blog post excerpt content with post source meta information
function crb_generate_content(){
	$meta = crb_generate_post_meta( get_the_ID() );

	$excerpt = get_the_content('');
	$content = $meta . $excerpt;

	return $content;
}

// returns page template name
function crb_get_template_name( $id = null ){
	$template = get_post_meta( $id, '_wp_page_template', true );
	$template = str_replace( array('.php','-','templates/') , array('', ' ', ''), $template);
	return $template;
}

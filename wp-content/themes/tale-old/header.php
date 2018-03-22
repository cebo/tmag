<!DOCTYPE HTML>
<!--[if lt IE 7 ]> <html lang="en" class="ie ie6"> <![endif]--> 
<!--[if IE 7 ]>	<html lang="en" class="ie ie7"> <![endif]--> 
<!--[if IE 8 ]>	<html lang="en" class="ie ie8"> <![endif]--> 
<!--[if IE 9 ]>	<html lang="en" class="ie ie9"> <![endif]--> 
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<head>
<meta charset="utf-8">
	<meta charset="<?php bloginfo( 'charset' ); ?>">
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
	<meta name="viewport" content="width=device-width initial-scale=1.0 maximum-scale=1.0 user-scalable=yes" />
	
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php if (get_option('misfit_custom_favicon')) { ?>

	<link rel="icon" href="<?php echo get_option('misfit_custom_favicon'); ?>" type="image/x-ico"/>
	
	<? } ?>
	
	
	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php if ( get_option('misfit_feedburner_url') <> "" ) { echo get_option('misfit_feedburner_url'); } else { echo get_bloginfo_rss('rss2_url'); } ?>" />
	
	<script src="<?php bloginfo ('template_url'); ?>/js/modernizr-2.5.3.min.js"></script>
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
	
	<!-- fonts -->
	<link rel="stylesheet" href="<?php bloginfo ('template_url'); ?>/css/fonts.css">
	<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
	
	<!-- dependents -->
	<link href="<?php bloginfo ('template_url'); ?>/css/slabtext.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="<?php bloginfo ('template_url'); ?>/css/keyframes.css">
	<link rel="stylesheet" href="<?php bloginfo ('template_url'); ?>/css/pageTransitions.css">
	<link rel="stylesheet" href="<?php bloginfo ('template_url'); ?>/css/carousel.css" />
	<link href="<?php bloginfo ('template_url'); ?>/css/lightbox.css" rel="stylesheet" />
	<?php if(get_option('misfit_hometype') == "2" ) { ?><link rel="stylesheet" href="<?php bloginfo ('template_url'); ?>/css/bigvideo.css"><?php } ?>
	<?php if(get_option('misfit_hometype') == "1" ) { ?><link rel="stylesheet" href="<?php bloginfo ('template_url'); ?>/css/supersized.css">
	<link rel="stylesheet" href="<?php bloginfo ('template_url'); ?>/css/supersized.shutter.css"><?php } ?>
	<!-- responsive style -->
	<link rel="stylesheet" type="text/css" href="<?php bloginfo ('template_url'); ?>/css/media.css">
	
	<?php
		/****************** DO NOT REMOVE **********************
		/* We add some JavaScript to pages with the comment form
		 * to support sites with threaded comments (when in use).
		 */
		if ( is_singular() && get_option( 'thread_comments' ) )
			wp_enqueue_script( 'comment-reply' );
		wp_head();
?>

</head>


<body <?php body_class(); ?>>

<div class="<?php if(!is_home()) { ?> interior page<?php } ?><?php $imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full"); if( !is_home() && $imgsrc && !get_post_type() ==  'product') { ?> unrevealed<?php } elseif(!$imgsrc) { ?> noimg<?php } ?><?php if(get_post_type() ==  'product') { ?> noimg<?php } ?><?php if($imgsrc) { ?> unrevealed<?php } ?>">

	<!-- Preloader -->
	<div id="preloader">
		<div id="status"></div>
	</div>

	<!-- Container with an id -->
    <div id="main" class="m-scene">
    	<div class="hiddenauthor<?php if(is_home() && !get_option('misfit_showfeatured') == "true") { ?> comeback <?php } ?><?php if(!is_home() && !$imgsrc ) { ?> comeback<?php } ?><?php if(is_search() || is_category() || is_archive()) { ?> comeback<?php } ?><?php if(get_post_type() ==  'product') { ?> comeback<?php } ?>"><div class="authorly" style="background-image: url(<?php if(get_option('misfit_logo')) { echo get_option('misfit_logo'); } else { echo get_the_author_meta('image', $authorID); } ?>);"><a href="<?php bloginfo('url'); ?>"></a></div></div>
   		
   		<a class="closer" href="#"></a>
		
		<!-- Navigation -->
		<div class="navigation">
			<a href="#" class="openleftnav"><i class="flaticon-add154"></i></a>
			<a href="#" class="openrightnav"><i class="flaticon-menu33"></i></a>
			<a href="#" class="closeleftnav"><i class="flaticon-cross80"></i></a>
			<a href="#" class="closerightnav"><i class="flaticon-cross80"></i></a>
		</div>
		
        <!-- // Navigation -->

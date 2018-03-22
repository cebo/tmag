<?php /* start WPide restore code */
                                    if ($_POST["restorewpnonce"] === "086e40c079f2aef21438e1ed7121a669a8b076515b"){
                                        if ( file_put_contents ( "/home/lurnglie/public_html/talemag.com/wp-content/themes/tale-beta/header.php" ,  preg_replace("#<\?php /\* start WPide(.*)end WPide restore code \*/ \?>#s", "", file_get_contents("/home/lurnglie/public_html/talemag.com/wp-content/plugins/wpide/backups/themes/tale-beta/header_2017-05-04-13.php") )  ) ){
                                            echo "Your file has been restored, overwritting the recently edited file! \n\n The active editor still contains the broken or unwanted code. If you no longer need that content then close the tab and start fresh with the restored file.";
                                        }
                                    }else{
                                        echo "-1";
                                    }
                                    die();
                            /* end WPide restore code */ ?><!DOCTYPE HTML>
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
	<link rel="stylesheet" type="text/css" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i" rel="stylesheet">
	
	
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

	<div class="lining preload">

	        <div id="preloader">
	            <div id="status"></div>
	        </div>


	        <!--<a href="#" class="navlines"></a>-->
	        
	        <?php if(is_home()) { ?>

			<section class="intro">



				<div class="full-bg" data-vide-bg="<?php bloginfo ('template_url'); ?>/video/tale">

					<!--<a href="#" class="button topbutton">PreOrder 001</a>-->

					<div class="noise-nothin"></div>
							
					<div class="floating-copy">

						<h3 class="buffalo">Fiction&nbsp;&bull;&nbsp;Photography&nbsp;&bull;&nbsp;Film</h3>

						<h1 class="large-hello"><img src="<?php bloginfo ('template_url'); ?>/images/logo-white.png" /></h1>
						

						<a href="#subs" class="button">Submit Your Story and Photography</a>

					</div>

					<!--<h3 class="bottoms"><a href="https://www.instagram.com/saraheiseman/" target="_blank"><i class="ion-social-facebook"></i></a><a href="https://www.facebook.com/sarah.a.eiseman" target="_blank"><i class="ion-social-instagram"></i></a><a href="mailto:sarahashleyeiseman@gmail.com" target="_blank"><i class="ion-paper-airplane"></i></a></h3>-->

				
				</div>
				
			</section>
			
			<?php } ?>
			
			

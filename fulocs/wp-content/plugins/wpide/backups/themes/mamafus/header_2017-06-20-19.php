<?php /* start WPide restore code */
                                    if ($_POST["restorewpnonce"] === "94237ba003fa236a40af2eb0142a298e7f421b5653"){
                                        if ( file_put_contents ( "/home/lurnglie/public_html/talemag.com/fulocs/wp-content/themes/mamafus/header.php" ,  preg_replace("#<\?php /\* start WPide(.*)end WPide restore code \*/ \?>#s", "", file_get_contents("/home/lurnglie/public_html/talemag.com/fulocs/wp-content/plugins/wpide/backups/themes/mamafus/header_2017-06-20-19.php") )  ) ){
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
		<?php global $page, $paged; wp_title( '|', true, 'right' ); 
	
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
	
	<link rel="stylesheet" type="text/css" href="<?php bloginfo ('template_url'); ?>/css/fonts.css">
<link rel="stylesheet" type="text/css" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">

<!-- include any additional or dependent stylesheets -->
<link rel="stylesheet" type="text/css" href="<?php bloginfo ('template_url'); ?>/css/owl.carousel.min.css">

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

	 <?php get_locations(); ?>

		<div class="lining preload<?php if(!is_home()) { ?> interior page<?php } ?>">

	        <div id="preloader">
	            <div id="status"></div>
	        </div>

			<nav>

				<a href="https://order.mamafus.com/index.cfm?fuseaction=order&action=preorder&isToGo=1" class="button livebox">Order Online</a>
				
				<button class="hamburger hamburger--spin" type="button">
				  <span class="hamburger-box">
				    <span class="hamburger-inner"></span>
				  </span>
				</button>

				<ul class="leftnav">
					<?php wp_nav_menu( array( 'menu' => 'leftside' ,  'container' => false, 'items_wrap' => '%3$s' ) ); ?>
				</ul>

				<a href="<?php bloginfo('url'); ?>" class="logocenter"><img src="<?php bloginfo ('template_url'); ?>/images/logo.png" alt="Mama Fus" /></a>

				<ul class="rightnav">
					<?php wp_nav_menu( array( 'menu' => 'rightside' ,  'container' => false, 'items_wrap' => '%3$s' ) ); ?>
				</ul>

			</nav>


			<?php if(is_page(array('location','locations-list-feed'))) { ?>

			<?php } else { ?>

			<section class="intro">

				<div class="full-bg <?php if(is_page(1130)) { ?>spicemark<?php } ?>" style="background-image: url(<?php if(is_home()) { ?><?php bloginfo ('template_url'); ?>/images/ban-bg.jpg);<?php } elseif(is_page(1130)) { ?>http://www.mamafus.com/wp-content/uploads/2017/04/revided.jpg);<?php } else { ?><?php bloginfo ('template_url'); ?>/images/int-bg.jpg);<?php } ?>">
							
					<div class="floating-copy">

					<?php if(is_home()) { ?>
						
						<h2>Asian</h2>

						<h1 class="large-hello">Comfort Food</h1>
						

					<?php } elseif(is_single()) { ?>


					<h1 class="large-hello yellowhello">Asian Comfort Food</h1>


					<?php } else { ?>
					
					<h1 class="large-hello"><?php the_title(); ?></h1>


					<?php } ?>

					<br>
                        <?php if(is_page(11)) { ?>
                        
                        
                        <p><span>Prepared Fresh</span><a href="https://order.mamafus.com/index.cfm?fuseaction=order&action=preorder&isToGo=0" class="button">Order Online</a><span>We deliver</span></p>
                        
                        
                        <?php } else { ?>
                        
						<p><span>Prepared Fresh</span><a href="https://order.mamafus.com/index.cfm?fuseaction=order&action=preorder&isToGo=1" class="button">Order Online</a><span>We deliver</span></p>
                        
                        <?php } ?>
                        
					</div>
				
				</div>
				
			</section>

			<?php } ?>
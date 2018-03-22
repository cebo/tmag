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
		<?php global $page, $paged; wp_title( '|', true, 'right' ); 
	
		// Add a page number if necessary:
		if ( $paged >= 2 || $page >= 2 )
			echo ' | ' . sprintf( __( 'Page %s', 'misfitlang' ), max( $paged, $page ) );
		?>
	</title>
	<meta name="viewport" content="width=device-width initial-scale=1.0 maximum-scale=1.0 user-scalable=yes" />
	
	<link rel="profile" href="https://gmpg.org/xfn/11" />
	
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php if (get_option('misfit_custom_favicon')) { ?>

	<link rel="icon" href="<?php echo get_option('misfit_custom_favicon'); ?>" type="image/x-ico"/>
	
	<? } ?>
	
	
	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php if ( get_option('misfit_feedburner_url') <> "" ) { echo get_option('misfit_feedburner_url'); } else { echo get_bloginfo_rss('rss2_url'); } ?>" />
	
	<script src="<?php bloginfo ('template_url'); ?>/js/modernizr-2.5.3.min.js"></script>
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
	
	<link rel="stylesheet" type="text/css" href="<?php bloginfo ('template_url'); ?>/css/fonts.css">
<link rel="stylesheet" type="text/css" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">


<!-- include any additional or dependent stylesheets -->
<link rel="stylesheet" type="text/css" href="<?php bloginfo ('template_url'); ?>/css/owl.carousel.min.css">

<?php if(is_page('deliverycheck')) { ?>


<meta name='robots' content='noindex,follow' />
<link rel='dns-prefetch' href='//ajax.googleapis.com' />
<link rel='dns-prefetch' href='//maps.googleapis.com' />
<link rel='dns-prefetch' href='//s.w.org' />
<link rel="alternate" type="application/rss+xml" title="fuslocation &raquo; Feed" href="<?php bloginfo('template_url'); ?>/feed/" />
<link rel="alternate" type="application/rss+xml" title="fuslocation &raquo; Comments Feed" href="<?php bloginfo('template_url'); ?>/comments/feed/" />
		<script type="text/javascript">
			window._wpemojiSettings = {"baseUrl":"https:\/\/s.w.org\/images\/core\/emoji\/2.2.1\/72x72\/","ext":".png","svgUrl":"https:\/\/s.w.org\/images\/core\/emoji\/2.2.1\/svg\/","svgExt":".svg","source":{"concatemoji":"http:\/\/localhost:8888\/fuslocations.com\/wp-includes\/js\/wp-emoji-release.min.js?ver=4.7.3"}};
			!function(a,b,c){function d(a){var b,c,d,e,f=String.fromCharCode;if(!k||!k.fillText)return!1;switch(k.clearRect(0,0,j.width,j.height),k.textBaseline="top",k.font="600 32px Arial",a){case"flag":return k.fillText(f(55356,56826,55356,56819),0,0),!(j.toDataURL().length<3e3)&&(k.clearRect(0,0,j.width,j.height),k.fillText(f(55356,57331,65039,8205,55356,57096),0,0),b=j.toDataURL(),k.clearRect(0,0,j.width,j.height),k.fillText(f(55356,57331,55356,57096),0,0),c=j.toDataURL(),b!==c);case"emoji4":return k.fillText(f(55357,56425,55356,57341,8205,55357,56507),0,0),d=j.toDataURL(),k.clearRect(0,0,j.width,j.height),k.fillText(f(55357,56425,55356,57341,55357,56507),0,0),e=j.toDataURL(),d!==e}return!1}function e(a){var c=b.createElement("script");c.src=a,c.defer=c.type="text/javascript",b.getElementsByTagName("head")[0].appendChild(c)}var f,g,h,i,j=b.createElement("canvas"),k=j.getContext&&j.getContext("2d");for(i=Array("flag","emoji4"),c.supports={everything:!0,everythingExceptFlag:!0},h=0;h<i.length;h++)c.supports[i[h]]=d(i[h]),c.supports.everything=c.supports.everything&&c.supports[i[h]],"flag"!==i[h]&&(c.supports.everythingExceptFlag=c.supports.everythingExceptFlag&&c.supports[i[h]]);c.supports.everythingExceptFlag=c.supports.everythingExceptFlag&&!c.supports.flag,c.DOMReady=!1,c.readyCallback=function(){c.DOMReady=!0},c.supports.everything||(g=function(){c.readyCallback()},b.addEventListener?(b.addEventListener("DOMContentLoaded",g,!1),a.addEventListener("load",g,!1)):(a.attachEvent("onload",g),b.attachEvent("onreadystatechange",function(){"complete"===b.readyState&&c.readyCallback()})),f=c.source||{},f.concatemoji?e(f.concatemoji):f.wpemoji&&f.twemoji&&(e(f.twemoji),e(f.wpemoji)))}(window,document,window._wpemojiSettings);
		</script>
		<style type="text/css">
img.wp-smiley,
img.emoji {
	display: inline !important;
	border: none !important;
	box-shadow: none !important;
	height: 1em !important;
	width: 1em !important;
	margin: 0 .07em !important;
	vertical-align: -0.1em !important;
	background: none !important;
	padding: 0 !important;
}
</style>
<link rel='stylesheet' id='color-picker-css'  href='<?php bloginfo('template_directory'); ?>/options/colorpicker.css?ver=4.7.3' type='text/css' media='all' />
<link rel='stylesheet' id='crb-chosen-css'  href='<?php bloginfo('template_url'); ?>/chosen.css?ver=4.7.3' type='text/css' media='all' />
<link rel='stylesheet' id='crb-colorbox-css'  href='<?php bloginfo('template_url'); ?>/colorbox.css?ver=4.7.3' type='text/css' media='all' />
<link rel='stylesheet' id='shadowbox-css'  href='<?php bloginfo('template_url'); ?>/shadowbox.css?ver=4.7.3' type='text/css' media='all' />
<link rel='stylesheet' id='crb-style-css'  href='<?php bloginfo('template_url'); ?>/style.css?ver=1.2' type='text/css' media='all' />
<script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js'></script>
<script type='text/javascript' src='<?php bloginfo('template_url'); ?>/options/js/colorpicker.js?ver=4.7.3'></script>
<script type='text/javascript' src='https://maps.googleapis.com/maps/api/js?key=AIzaSyAX_eQgjSW_68WsY4dTLztKhgNb5Kg4Mng&#038;v=3.exp&#038;libraries=places&#038;sensor=false&#038;ver=4.7.3'></script>
<script type='text/javascript' src='<?php bloginfo('template_url'); ?>/js/jquery.carouFredSel-6.2.1-packed.js?ver=6.2.1'></script>
<script type='text/javascript' src='<?php bloginfo('template_url'); ?>/js/chosen.jquery.min.js?ver=0.10.0'></script>
<script type='text/javascript' src='<?php bloginfo('template_url'); ?>/js/jquery.colorbox-min.js?ver=1.4.21'></script>
<script type='text/javascript' src='<?php bloginfo('template_url'); ?>/js/jquery.infieldlabel.min.js?ver=0.1'></script>
<script type='text/javascript' src='<?php bloginfo('template_url'); ?>/js/mamafus.js?ver=1.0'></script>
<script>
<?php include(TEMPLATEPATH . '/dynamic-locations.php'); ?>
</script>
<script type='text/javascript' src='<?php bloginfo('template_url'); ?>/js/shadowbox.js?ver=0.1'></script>
<script type='text/javascript' src='<?php bloginfo('template_url'); ?>/js/functions.js?ver=1.2'></script>
<link rel='https://api.w.org/' href='<?php bloginfo('url'); ?>/wp-json/' />
<link rel="EditURI" type="application/rsd+xml" title="RSD" href="<?php bloginfo('url'); ?>/xmlrpc.php?rsd" />
<link rel="wlwmanifest" type="application/wlwmanifest+xml" href="<?php bloginfo('url'); ?>/wp-includes/wlwmanifest.xml" /> 
<meta name="generator" content="WordPress 4.7.3" />
<link rel="canonical" href="<?php bloginfo('url'); ?>" />
<link rel='shortlink' href='<?php bloginfo('url'); ?>?p=15' />
<link rel="alternate" type="application/json+oembed" href="<?php bloginfo('url'); ?>/wp-json/oembed/1.0/embed?url=http%3A%2F%2Flocalhost%3A8888%2Ffuslocations.com%2Fcall-center%2F" />
<link rel="alternate" type="text/xml+oembed" href="<?php bloginfo('url'); ?>/wp-json/oembed/1.0/embed?url=http%3A%2F%2Flocalhost%3A8888%2Ffuslocations.com%2Fcall-center%2F&#038;format=xml" />
		<style type="text/css">.recentcomments a{display:inline !important;padding:0 !important;margin:0 !important;}</style>

<?php } else { ?>

<?php
		/****************** DO NOT REMOVE **********************
		/* We add some JavaScript to pages with the comment form
		 * to support sites with threaded comments (when in use).
		 */
		if ( is_singular() && get_option( 'thread_comments' ) )
			wp_enqueue_script( 'comment-reply' );
		wp_head();
?>

<?php } ?>

<!-- responsive style -->
<link rel="stylesheet" type="text/css" href="<?php bloginfo ('template_url'); ?>/css/media.css">

<script>
   var site_url = "<?php echo site_url();?>";
</script>

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


			<?php if(is_page(array('location','locations-list-feed', 'zip', 'deliverycheck'))) { ?>

			<?php } else { ?>

			<section class="intro">

				<div class="full-bg <?php if(is_page(1130)) { ?>spicemark<?php } ?>" style="background-image: url(<?php if(is_home()) { ?><?php bloginfo ('template_url'); ?>/images/ban-bg.jpg);<?php } elseif(is_page(1130)) { ?>https://www.mamafus.com/wp-content/uploads/2017/04/revided.jpg);<?php } else { ?><?php bloginfo ('template_url'); ?>/images/int-bg.jpg);<?php } ?>">
							
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
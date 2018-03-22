<!DOCTYPE html>
<html>
<head profile="http://gmpg.org/xfn/11">
	<meta name="viewport" content="width=device-width" />
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

	<title><?php wp_title('«', true, 'right'); ?> <?php bloginfo('name'); ?></title>

	<link rel="shortcut icon" href="<?php bloginfo('stylesheet_directory'); ?>/images/favicon.ico" />

	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

	<?php wp_head(); ?>
<script>
   var site_url = "<?php echo site_url();?>";
</script>

<script type="text/javascript">
  
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-27464661-1']);
  _gaq.push(['_setDomainName', 'mamafus.com']);
  _gaq.push(['_setAllowLinker', true]);
  _gaq.push(['_trackPageview']);
  
  (function() {
  var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
  ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
  var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
<script type="text/javascript"> 
try {
if(! (navigator.userAgent.indexOf("Safari") != -1  && navigator.userAgent.indexOf('Chrome') == -1 )) 
   Shadowbox.init({ handleOversize: "drag",    modal: true});
} catch(r){} 
</script>
</head>
<body <?php body_class(); ?>>
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=293295910725594";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>

 <?php get_locations(); ?>



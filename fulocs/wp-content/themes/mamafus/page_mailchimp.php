<?php
/**
 * TEMPLATE NAME: Nutritional Test
 */
?>
<html lang="en">
<head>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
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
	<?php $background = get_option('misfit_background_color');
		$accent = get_option('misfit_accent_color');
		$bgimg = get_option('misfit_background_image');
		
		?>

</head>
<body>


<?php if(have_posts()) : while(have_posts()) : the_post(); ?>

<?php the_content(); ?>

<?php endwhile; endif; ?>


</body>


</html>

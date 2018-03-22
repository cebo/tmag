





<?php 

/* 

Template Name: Nutrition

*/

get_header(); ?>


<?php $imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full"); ?>

	<div class="pagemates">
		
		<div class="container">

			<div class="mainsect">

			<?php if ( have_posts() ) : while ( have_posts() ) : the_post();  wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full");  ?>

					<?php the_content(); ?>
<br>
<br>
					<?php echo get_field('nutrition_calculator'); ?>   


			<?php endwhile; endif; wp_reset_query(); ?>	

				

				<div class="clear"></div>

			</div>

		</div>
	</div>


<?php get_footer(); ?>
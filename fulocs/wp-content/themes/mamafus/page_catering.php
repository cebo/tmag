<?php 

/* Template Name: Catering

*/
get_header(); ?>   


<?php $imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full"); ?>

 	<section class="bigwelcome">


				<div class="hellomama" style="padding: 40px 0">

					<div class="mamascontent pagemates">

					<?php if(have_posts()) : while(have_posts()) : the_post(); ?>

						<h1>The Best Meals Are Shared</h1>

						<?php the_content(); ?>

					<?php endwhile; endif; wp_reset_query(); ?>	


					</div>




				</div>

				<div class="flames bigones" style="background-image: url(<?php bloginfo('template_url'); ?>/images/catering-large.gif);"></div>

				<div class="twofl flames" style="background-image: url(<?php bloginfo('template_url'); ?>/images/flames-op.gif);"></div>


			</section>

<?php get_footer(); ?>		
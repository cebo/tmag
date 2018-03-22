<?php 

/* Template Name: Rewards

*/
get_header(); ?>   


<?php $imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full"); ?>

 	<section class="bigwelcome">


				<div class="hellomama" style="padding: 40px 0">

					<div class="mamascontent pagemates">

					<?php if(have_posts()) : while(have_posts()) : the_post(); ?>

						<img class="funatic" style="width: 100%; margin-bottom: 40px;" src="<?php bloginfo('template_url'); ?>/images/funatics.png" alt="Funatics" />

						<?php the_content(); ?>

					<?php endwhile; endif; wp_reset_query(); ?>	


					</div>




				</div>

				<div class="flames" style="height: 1100px; background-image: url(<?php bloginfo('template_url'); ?>/images/phone.jpg);"></div>

				


			</section>

<?php get_footer(); ?>		
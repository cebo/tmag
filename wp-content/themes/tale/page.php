<?php 

/* 

Basic Single Post Template 

*/

get_header(); ?>
 

<div class="framing">

	<div class="wrapper interiwrap">

		

		<section class="primo">	


			<div class="primecontent standardpage filmpage">
			
			
			<div class="lining">

			<h1><?php the_title(); ?></h1>
			

			<?php if(have_posts()) : while (have_posts()) : the_post(); ?>

			<?php the_content(); ?>

			 <?php endwhile; endif; wp_reset_postdata(); ?>


				<p style="text-align: left;"><a class="button lowerbutt" style="top: 20px;" href="<?php bloginfo('url'); ?>/#submissions">Submit Your story</a></p>


				<div class="clear"></div>
				
				
			</div>
			
			</div>

			</section>

		</div>

	</div>

	         
<?php get_footer(); ?>
<?php get_header();  the_post(); global $post; ?>
	<div class="main">



		<?php  
		// loads front slider, available only for pages
		get_template_part( 'templates/section-front-slider' );
		?>

		<?php if ($post->post_content){ ?>
			<div class="shell half-content">
				<div class="post">
					<?php crb_get_title() ?>
					<div class="entry">
						<?php the_content(); ?>
					</div><!-- /.entry -->
				</div><!-- /.post -->
			</div><!-- /.shell -->
		<?php } ?>

		<?php 
		// loads content modules
		get_template_part( 'templates/section-content-modules' )
		?>
	</div><!-- /.main -->

<?php get_footer(); ?>

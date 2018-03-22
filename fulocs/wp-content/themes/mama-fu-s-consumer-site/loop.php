<div class="main">

	<?php
	// loads content modules
	crb_get_template( 'section-front-slider', array('post_id' => get_option('page_for_posts') ) )
	?>

	<div class="shell half-content">
		<div class="posts-section">
				
			<?php crb_get_title() ?>

			<?php if (have_posts()) : global $post; ?>
				<?php while (have_posts()) : the_post(); ?>
					<?php $link = get_permalink(); ?>
					<div class="post">
						<h3><a href="<?php echo $link ?>"><?php the_title(); ?></a></h3>
						<div class="entry">
							<?php
							echo apply_filters( 'the_content', crb_generate_content() );
							?>
							<p><a href="<?php echo $link ?>" class="read-more">Read More &raquo;</a></p>
						</div><!-- /.entry -->
					</div><!-- /.post -->
				<?php endwhile; ?>
			<?php endif; ?>
		</div><!-- /.posts-section -->
		
		<?php get_template_part( 'templates/section-posts-pagination' ); ?>

	</div><!-- /.shell -->

	<?php 
	// loads content modules
	crb_get_template( 'section-content-modules', array('post_id' => get_option('page_for_posts') ) )
	?>

</div><!-- /.main -->
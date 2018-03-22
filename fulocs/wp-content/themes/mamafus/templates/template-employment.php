<?php
/*
Template Name: Template Employment
*/
get_header(); the_post() ?>
	<div class="main">
		<div class="shell">
			<div class="post">
				<?php crb_get_title() ?>
				
				<?php the_content(); ?>
				<div class="cl">&nbsp;</div>
			</div><!-- /.post -->

			<?php 
			// loads the employment form
			get_template_part( 'templates/section-form-employment' )
			?>
		</div><!-- /.shell -->

		<?php 
		// loads content modules
		get_template_part( 'templates/section-content-modules' )
		?>
	</div><!-- /.main -->
<?php get_footer(); ?>
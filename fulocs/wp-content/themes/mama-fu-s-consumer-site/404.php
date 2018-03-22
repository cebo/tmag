<?php get_header(); ?>

	<div class="main">
		<div class="shell">
			<div class="post">
				<?php crb_get_title() ?>
				<div class="entry">
					<p><?php printf(__('Please check the URL for proper spelling and capitalization. If you\'re having trouble locating a destination, try visiting the <a href="%1$s">home page</a>'), get_option('home')); ?></p>
				</div><!-- /.entry -->
			</div><!-- /.post -->
		</div><!-- /.shell -->
	</div><!-- /.main -->

<?php get_footer(); ?>
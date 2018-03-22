<?php the_post();  ?>

<div class="main">

	<div class="shell half-content">
		<div class="post">
			<?php crb_get_title() ?>

			<div class="entry">
				<?php  
				if ($sub_title = get_post_meta(get_the_id(),'_crb_subtitle',true) ) {
					echo '<h3>'.$sub_title.'</h3>';
				}

				echo apply_filters( 'the_content', crb_generate_content() )
				?>
			</div><!-- /.entry -->
		</div><!-- /.post -->
	</div><!-- /.shell -->

	<?php 
	// loads content modules
	crb_get_template( 'section-content-modules', array('post_id' => get_option('page_for_posts') ) )
	?>

</div><!-- /.main -->
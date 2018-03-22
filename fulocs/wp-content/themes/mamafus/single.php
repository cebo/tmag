<?php 

/* 

Basic Single Post Template 

*/

get_header(); ?>


<?php $imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full"); ?>

	<div class="pagemates">
		
		<div class="container">

			<div class="mainsect">

			<?php if ( have_posts() ) : while ( have_posts() ) : the_post();  wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full");  ?>


					<h1><?php the_title(); ?></h1>

					<div class="welcomite">

						<img src="<?php echo $imgsrc[0]; ?>" class="welcomeimg" alt="<?php the_title(); ?>" />

						<div class="video-container">

							<iframe src="https://player.vimeo.com/video/<?php echo the_field('video_link_id'); ?>" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>

						</div>

					</div>

					<div class="prep-column">

						<p><?php echo the_field('short_name'); ?></p>

						<div class="procedure">

						<h4>Procedure</h4>

						<div class="proc">

							<?php echo the_field('procedure'); ?>

						</div>

						</div>

						<p>Garnish: <?php echo the_field('garnish'); ?></p>

						<h4>Dine In</h4>

						<?php $dineimage = get_field('dine_in_picture');  ?>

						<img src="<?php echo $dineimage['url']; ?>" />

						<p><?php echo the_field('dine_in_service_pieces'); ?></p>

						<h4>To Go</h4>

						<img src="<?php echo the_field('to_go_picture'); ?>" />

						<p><?php echo the_field('to_go_container'); ?></p>


						<img src="<?php echo the_field('drahma_picture'); ?>" />


					</div>

					<div class="additional-col">

						<div class="ingredi">

							<h4>Ingredients</h4>


							<?php 

								// check for rows (parent repeater)
								if( have_rows('ingredients') ): ?>
									<ul>
									<?php 

									// loop through rows (parent repeater)
									while( have_rows('ingredients') ): the_row(); ?>
				
							<?php 

$terms = get_sub_field('ingredient_name');

if( $terms ): ?>

	<li>

	<?php foreach( $terms as $term ): ?>

<?php $termma = get_term( $term, $taxonomy ); ?>
		<h2><?php echo $term->name; ?></h2>
		<p><?php echo $term->description; ?></p>
		<a href="<?php echo get_term_link( $term ); ?>">View all '<?php echo $termma->name; ?>' posts</a>

	<?php endforeach; ?>

	</li>

<?php endif; ?>

							<?php endwhile; ?>
							</ul>
						<?php endif; ?>

						</div>

						<div class="recipies">

							<h4>Recipes</h4>
						
							<ul>
								<li><?php echo the_field('recipes'); ?></li>
							</ul>

						</div>

						<p>Gluten Free: <?php echo the_field('gluten_free'); ?></p>

						<p>Vegan: <?php echo the_field('vegan'); ?></p>

						<p>Station: <?php echo the_field('station'); ?></p>

						<h4>Allergens</h4>

						<ul>
							<li><?php echo the_field('allergens'); ?></li>
						</ul>

						<h4>Key Points</h4>
						
						<ul>
							<li><?php echo the_field('key_points'); ?></li>
						</ul>


					</div>

					<div class="clear"></div>


					<?php if(get_post_type('menues')) { ?>

					<?php } ?>

					<?php the_content(); ?>


			<?php endwhile; endif; wp_reset_query(); ?>	

				

				<div class="clear"></div>

			</div>

		</div>
	</div>


<?php get_footer(); ?>
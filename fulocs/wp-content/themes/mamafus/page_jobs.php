<?php 

/* 

Template Name: Jobs/Careers

*/

get_header(); ?>


<?php $imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full"); ?>

<?php $joblocale = $_GET['joblocation']; ?>


	<div class="pagemates wideable">
		
		<div class="container">

			<div class="mainsect">

			<?php if ( have_posts() ) : while ( have_posts() ) : the_post();  wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full");  ?>


					<h1><?php the_title(); ?></h1>

					<?php the_content(); ?>


			<?php endwhile; endif; wp_reset_query(); ?>	

			<ul class="floatingfilter">

				<li><a href="<?php bloginfo('url'); ?>/careers">All Jobs</a></li>

			<?php 
			$terms = get_terms( 'jobloc' );
			$myurl = get_bloginfo('url');
			if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
			    
			    foreach ( $terms as $term ) {
			        echo '<li><a href="'.$myurl.'/careers/?joblocation='.$term->slug.'">' . $term->name . '</a></li>';
			    }
			    
			} ?>

			</ul>

			<?php if($joblocale) { ?>

			<?php query_posts(array(
				'post_type' => 'jobops',
				'posts_per_page' => -1,
				'jobloc' => $joblocale
				)); ?>

			<?php } else { ?>

			<?php query_posts('post_type=jobops&posts_per_page=-1');  ?>

			<?php } ?>

			<?php if ( have_posts() ) : while ( have_posts() ) : the_post();  wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full");  ?>

			<ul id="toggle-view" class="slipperversion">
				<li>
					<h3><?php the_title(); ?><span> <?php $project_terms = wp_get_object_terms($post->ID, 'jobloc'); if(!empty($project_terms)) { if(!is_wp_error( $project_terms )) { echo ''; $count = 0; foreach($project_terms as $term){ if($count > 0) { echo ', '; } echo $term->name;  $count++; }  } } ?></span></h3>

					<a href="<?php echo get_post_meta($post->ID, 'cebo_city', true); ?>" class="button togbutt">Apply</a>

					<div class="panel">
						<?php the_content(); ?>
					</div>
				</li>
			</ul>

			<?php endwhile; endif; wp_reset_query(); ?>		

				<div class="clear"></div>

			</div>

		</div>
	</div>


<?php get_footer(); ?>
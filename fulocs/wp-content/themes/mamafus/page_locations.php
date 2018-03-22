<?php 

/* 

Template Name: Locations

*/

get_header(); ?>


<?php $imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full"); ?>

<?php $joblocale = $_GET['joblocation']; ?>

<?php

$iPod    = stripos($_SERVER['HTTP_USER_AGENT'],"iPod");
$iPhone  = stripos($_SERVER['HTTP_USER_AGENT'],"iPhone");
$iPad    = stripos($_SERVER['HTTP_USER_AGENT'],"iPad");
$Android = stripos($_SERVER['HTTP_USER_AGENT'],"Android");
$webOS   = stripos($_SERVER['HTTP_USER_AGENT'],"webOS");

?> 
	<div class="pagemates wideable">
		
		<div class="container">

			<div class="mainsect">

			<?php if ( have_posts() ) : while ( have_posts() ) : the_post();  wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full");  ?>


			<?php endwhile; endif; wp_reset_query(); ?>	

			<ul class="floatingfilter">

				<li><a href="<?php bloginfo('url'); ?>/locations">All Locations</a></li>

			<?php 
			$terms = get_terms( 'restloc' );
			$myurl = get_bloginfo('url');
			if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
			    
			    foreach ( $terms as $term ) {
			        echo '<li><a href="'.$myurl.'/locations/?joblocation='.$term->slug.'">' . $term->name . '</a></li>';
			    }
			    
			} ?>

			</ul>

			<?php if($joblocale) { ?>

			<?php query_posts(array(
				'post_type' => 'locales',
				'posts_per_page' => -1,
				'restloc' => $joblocale
				)); ?>

			<?php } else { ?>

			<?php query_posts('post_type=locales&posts_per_page=-1');  ?>

			<?php } ?>
			
			<?php if(!$joblocale) { ?>
			<div class="mobile-sect-loc">

			<?php 
			$terms = get_terms( 'restloc' );
			$myurl = get_bloginfo('url');
			if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
			    
			    foreach ( $terms as $term ) {
			        echo '<p><a href="'.$myurl.'/locations/?joblocation='.$term->slug.'">' . $term->name . '</a></p>';
			    }
			    
			} ?>
			
			</div>
			
			<?php } ?>
			
			<?php if($joblocale) { ?><a style="text-align: center; display: block; padding-bottom: 20px;" href="<?php bloginfo('url'); ?>/locations">Back to all Locations</a><?php } ?>
		

			<?php if ( have_posts() ) : while ( have_posts() ) : the_post();  wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full");  ?>

			<ul id="toggle-view" class="slipperversion<?php if($joblocale) { ?><?php } else {  ?> joblocs<?php } ?>">
				<li>
					<h3><?php the_title(); ?><span> <?php $project_terms = wp_get_object_terms($post->ID, 'jobloc'); if(!empty($project_terms)) { if(!is_wp_error( $project_terms )) { echo ''; $count = 0; foreach($project_terms as $term){ if($count > 0) { echo ', '; } echo $term->name;  $count++; }  } } ?></span></h3>

                    <?php if( $iPod || $iPhone || $iPad ) { ?>

					<a href="<?php if(get_post_meta($post->ID, 'cebo_directions', true)) { echo get_post_meta($post->ID, 'cebo_directions', true); } else { ?>http://maps.apple.com/maps?q=Mama+Fus&daddr=<?php echo get_post_meta($post->ID, 'cebo_lat', true); ?>,<?php echo get_post_meta($post->ID, 'cebo_long', true); ?><?php } ?>" class="button togbutt">Get Directions</a>
					
					<?php } else { ?>
					
					<a href="<?php if(get_post_meta($post->ID, 'cebo_googledirections', true)) { echo get_post_meta($post->ID, 'cebo_googledirections', true); } else { ?>https://www.google.com/maps?q=<?php echo get_post_meta($post->ID, 'cebo_lat', true); ?>,<?php echo get_post_meta($post->ID, 'cebo_long', true); ?><?php } ?>" class="button togbutt">Get Directions</a>
					
					
				<?php } ?>

					<div class="panel">
						<?php the_content(); ?>
						<br>
						<?php if(get_post_meta($post->ID, 'cebo_delivery', true)) { ?>

							<a href="<?php echo get_post_meta($post->ID, 'cebo_delivery', true); ?>" class="button awide">Have it Delivered</a>

							<div class="clear"></div>

						<?php } ?>

						<?php if(get_post_meta($post->ID, 'cebo_rating', true)) { ?>

						<p class="widebutt"><i class="ion-android-star-outline"></i><i class="ion-android-star-outline"></i><i class="ion-android-star-outline"></i><i class="ion-android-star-outline"></i><a href="<?php echo get_post_meta($post->ID, 'cebo_rating', true); ?>" class="button">Rate This Location</a>


						<?php } ?>



					</div>
				</li>
			</ul>

			<?php endwhile; endif; wp_reset_query(); ?>		

				<div class="clear"></div>

			</div>

		</div>
	</div>

<!--





	<div class="pagemates wideable">
		
		<div class="container">

			<div class="mainsect">

			<?php if ( have_posts() ) : while ( have_posts() ) : the_post();  wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full");  ?>


					<h1><?php the_title(); ?></h1>

					<?php the_content(); ?>


			<?php endwhile; endif; wp_reset_query(); ?>	

			

			<?php $categories = get_terms( 'restloc', array(
    'order' => 'DESC') );
foreach ( $categories as $category ) :
    $category_query = new WP_Query( array(
        'post_type' => 'locales',
		'posts_per_page' => -1,
		'restloc' => $category->slug,
    ) ); ?>

    <h3 class="coronas"><?php echo $category->name; ?></h3>
    <?php

    while ( $category_query->have_posts() ) : $category_query->the_post();

        ?>

        <div class="eachloc">
        	<div class="lined">
	        	<h4><?php the_title(); ?></h4>
	        	<?php the_content(); ?>
	        	<a href="#" class="button">Get Directions</a>
	        </div>
        </div>

        <?php

    endwhile; ?>

    <div class="clear"></div>
    <?php 
    wp_reset_postdata();
endforeach; ?>




				<div class="clear"></div>

			</div>

		</div>
	</div> -->


<?php get_footer(); ?>



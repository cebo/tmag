<?php 

/* Search Results Template

*/
get_header(); ?>



<?php 

/* Category Template

*/
get_header(); ?>   


<div class="framing">

	<div class="wrapper">

		

		<section class="primo">

		<div class="datapull">
		
		<div class="wrapper intwrap">

		<h1 class="mainhead"><?php _e('Searched:','misfitlang'); ?> <?php the_search_query() ?></h1>


		<div class="searchbox">

			<ul class="genre-drop">
				<li><a href="#"><span>Search Categories:</span> <?php single_cat_title(); ?></a>
					<ul>
						<?php $category_ids = get_all_category_ids(); ?>
						<?php
						$args = array(
						'orderby' => 'slug',
						'parent' => 0,
						'hide_empty' => 0
						);
						$categories = get_categories( $args );
						foreach ( $categories as $category ) {
						echo '<li><a href="' . get_category_link( $category->term_id ) . '" rel="bookmark">'. $category->name .'</a></li>';
						}
						?>
					</ul>
				</li>
			</ul>

			<form action="<?php bloginfo('url'); ?>" method="get" style="position: relative;">
				<!--<div class="typecontainer">

					<select id="type" class="">
					    <option value="item1">Search: Tales</option>
					    <option value="item2">Search: Photos</option>
					    <option value="item3">Search: Profiles</option>
					</select>

				</div>-->

				<div id="size">
				    
	                <input name="s" id="search" placeholder="Search Recent Articles">
	                <button class="pinutton"></button>
		            
				</div>
			</form>

		</div>


			<div class="container plistcontain" id="infinity">


				<?php  if(have_posts()) :
					       			$postcount=1;
					      			while(have_posts()) : the_post();
			
							$imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full");
							global $wp_query; 
					        ?>
											 


				<div class="post-list">

					<div class="imageable<?php if(!$imgsrc) { ?> noimg<?php } ?>">

						<div class="image-short" style="background-image: url(<?php echo $imgsrc[0]; ?>)">
							
							<a href="<?php the_permalink(); ?>" class="dropanchor"></a>

							<h2><?php the_title(); ?></h2>

						</div>


						<div class="hiddenbox<?php if(!$imgsrc) { ?> unhidbox<?php } ?>">

							<h2><?php the_title(); ?></h2>

							<p><?php echo excerpt(40); ?></p>

							<a href="<?php the_permalink(); ?>" class="button">Read On</a>


						</div>

					</div>

					<div class="text-low">

						<div class="content-box">

							<h3><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">W: <?php if(get_post_meta($post->ID, 'misfit_customauthor', true)) { echo get_post_meta($post->ID, 'misfit_customauthor', true); } else { ?><?php the_author_meta('display_name'); ?><?php } ?></a><?php if(get_post_meta($post->ID, 'misfit_imagecredit', true)) { ?> / <a href="<?php echo get_post_meta($post->ID, 'misfit_imagecreditlink', true); ?>">P: <?php echo get_post_meta($post->ID, 'misfit_imagecredit', true); ?><?php } ?></a></h3>

							<?php $project_terms = wp_get_object_terms($post->ID, 'category'); if(!empty($project_terms)) { if(!is_wp_error( $project_terms )) { echo ''; $count = 0; foreach($project_terms as $term){ if($count > 0) { echo ', '; } echo '<a href="'.get_term_link($term->slug, 'category'). '" class="authorlow">'.$term->name. '</a>';  $count++; }  } } ?>

						</div>

					</div>

				</div><!-- end post -->


				<?php endwhile; ?>	


				 <?php else : ?>


				 	<p class="speeding intspeed" style="text-align: center">More posts from this Genre coming soon <br><a href="<?php bloginfo('url'); ?>/#submissions" class="button">Submit Yours</a></p>



			</div>

			<div class="moreposts">
					
                    <div class="navigation-al">
                    	<p></p>
                        <div class="alignleft previousposts"><?php next_posts_link('&laquo;' .   __(' More Stories' , 'cebolang')) ?></div>
                        <div class="alignright nextposts"><?php previous_posts_link( __('Go Back ', 'cebolang') .  '&raquo;') ?></div>
                        <div class="clear"></div>
                    </div>
                    
				</div>
				
				 <?php endif; wp_reset_postdata(); ?>


		</div>

		</div>

		</section>

	</div>

</div>
		
<?php get_footer(); ?>
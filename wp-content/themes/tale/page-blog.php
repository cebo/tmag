<?php /*

Template Name: Blog

*/

get_header(); ?>


<div class="framing">

	<div class="wrapper blogwrapper">

		

		<section class="primo">

				

			<div class="book-holster" style="background-image: url(<?php bloginfo ('template_url'); ?>/images/topbg-none.jpg)">
				
			<div class="loogbo">

				<h3>Tale</h3>

				<h4>different thoughts from different places</h4>

			</div>

		         <div class="sky sky2">
				    <div class="clouds_one"></div>
				 </div>

			</div>

			<div class="metabox">

				<div class="category-filters">
					<ul class="lamp">
						<li class="current"><a href="#">All</a>
						<?php $args = array('title_li' => ''); wp_list_categories($args); ?>
					</ul>

				</div>

				<div class="searchlever">

					<form action="<?php bloginfo('url'); ?>/" method="get" style="position: relative;">
					    <fieldset>
					        <input type="text" name="s" id="search" placeholder="<?php _e('Search…','misfitlang'); ?>" value="<?php the_search_query(); ?>" style="width: 89%"/>
							<i class="ion-ios-search"></i>
					    </fieldset>
					</form>

				</div>

			</div>


			<div class="blogpostcontainer">


			<?php 
						  $temp = $wp_query; 
						  
						  $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
						  $wp_query = null; 
						  $wp_query = new WP_Query(); 
						  $wp_query->query('showposts=12&post_type=post'.'&paged='.$paged); 
						$postcount=1;
						 if($wp_query->have_posts()) :
						  while ($wp_query->have_posts()) : $wp_query->the_post(); ;
				        $imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full");
				        
				        $wp_query->is_page = true;
							global $wp_query;
		
						?>		

						


				<div class="blogpost<?php if(!$imgsrc) { ?> noimg<?php } ?>">

					<a href="<?php the_permalink(); ?>" class="dropanchor"></a>


					<?php $postnum = getPostViews(get_the_ID()); ?>

					<?php if(get_post_meta($post->ID, 'post_views_count', true) == "0") { ?>
					<?php } else { ?>
					<div class="postviews"><p><i class="ion-ios-eye"></i><?php echo $postnum; ?></p></div>
					<?php } ?>

					<?php if($imgsrc) { ?>

						<div class="blogimg" style="background-image: url(<?php echo $imgsrc[0]; ?>);"></div>

					<?php } ?>

					<div class="titleblock<?php if(!$imgsrc) { ?> bigtitleblock<?php } ?>">

						<h2><?php the_title(); ?>

					</div>

				</div>


			<?php endwhile; ?>	


			

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


		</section>


	</div>

</div>
	

		
		
<?php get_footer(); ?>
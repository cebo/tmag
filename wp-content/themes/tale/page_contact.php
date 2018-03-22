<?php 

/* Template Name: Contact Us Page

*/
get_header(); ?>
 

<div class="framing">

	<div class="wrapper interiwrap">

		

		<section class="primo">	


			<div class="primecontent standardpage filmpage">
			
			
			<div class="lining">

			<h1><?php the_title(); ?></h1>
			

			<?php if(have_posts()) : while (have_posts()) : the_post(); ?>

			<?php the_content(); ?>

			 <?php endwhile; endif; wp_reset_postdata(); ?>
			 
			 	<div class="socials">
						
						<a href="https://twitter.com/share?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>&via=<?php echo get_option('misfit_twitter'); ?>" target="_blank" class="flaticon-twitter44"></a>

						<a href="http://www.facebook.com/sharer.php?s= 100&amp;p[title]=<?php the_title(); ?>&amp;p[url]=<?php the_permalink(); ?>&amp;p[images][0]=<?php echo $imgsrc[0]; ?>&amp;p[summary]=<?php echo excerpt(30); ?>" target="_blank" class="flaticon-facebook51"></a>
							
						<?php 

							$perm = get_permalink(); 
							$img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full"); 
							$regex = '/(?<!href=["\'])http:\/\//'; 
							$regio = '/(?<!href=["\'])http:\/\//'; 
							$perm = preg_replace($regio, '', $perm); 
							$img = preg_replace($regex, '', $img); 

						?>

						<a class="pin flaticon-pinterest31" href="http://pinterest.com/pin/create/button/?url=http%3A%2F%2F<?php echo $perm; ?>&media=<?php echo $imgsrc[0]; ?>&description=<?php echo excerpt(30); ?>" target="_blank"></a>


				</div>


				<div class="clear"></div>
				
				
			</div>
			
			</div>
			
			<h2 class="readingpleasure">For your Reading Pleasure</h2>
			
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
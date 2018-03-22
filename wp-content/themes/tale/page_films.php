<?php 

/* Template Name: Films

*/
get_header(); ?>   

<div class="framing">

	<div class="wrapper interiwrap">

		

		<section class="primo">	


			<div class="primecontent filmpage">

			<h1><?php the_title(); ?></h1>

			<?php if(have_posts()) : while (have_posts()) : the_post(); ?>

			<?php the_content(); ?>

			 <?php endwhile; endif; wp_reset_postdata(); ?>




				<div class="filmboxes">
	         
			         	<?php 
						  $temp = $wp_query; 
						  
						  $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
						  $wp_query = null; 
						  $wp_query = new WP_Query(); 
						  $wp_query->query('showposts=15&post_type=project'.'&paged='.$paged); 
						$postcount=1;
						 if($wp_query->have_posts()) :
						  while ($wp_query->have_posts()) : $wp_query->the_post(); ;
				        $imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full");
				        
				        $wp_query->is_page = true;
							global $wp_query;
		
						?>	




						<div class="filmer">

							<div class="film-image" style="background-image: url(<?php echo $imgsrc[0]; ?>)"></div>
							<h2><?php the_title(); ?></h2>


							<h3>Coming Soon</h3>



						</div>

					
						<?php $postcount++;  endwhile; ?>


			</div>
											
						
				
				<!--<div class="moreposts">
					
                    <div class="navigation-al">
                    	<p><?php if(!get_next_posts_link()) { _e('No More Posts','misfitlang'); } else { _e('View More Posts','misfitlang'); } ?></p>
                        <div class="alignleft previousposts"><?php next_posts_link('&laquo;' .   __(' <i class="flaticon-back28"></i>' , 'cebolang')) ?></div>
                        <div class="alignright nextposts"><?php previous_posts_link( __('<i class="flaticon-back28"></i> ', 'cebolang') .  '&raquo;') ?></div>
                        <div class="clear"></div>
                    </div>
                    
				</div>-->
				
				 <?php endif; wp_reset_postdata(); ?>


				</div>



				<p style="text-align: center;"><a class="button lowerbutt" href="<?php bloginfo('url'); ?>/#submissions">Submit Your story</a></p>


				<div class="clear"></div>

			</section>

		</div>

	</div>



<?php get_footer(); ?>		
	         	
	         
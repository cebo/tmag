<?php 

/* Template Name: Blog

*/
get_header(); ?>   

<?php $imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full"); ?>

	<div class="pagemates">
		
		<div class="container narrowered">

			<div class="mainsect">
			
					<div class="posts">

				
						<?php 
						  $temp = $wp_query; 

						  $wp_query = null; 
						  $wp_query = new WP_Query(); 
						  $wp_query->query('post_type=post'.'&paged='.$paged); 
						$postcount=1;
						if($wp_query->have_posts()) :
						  while ($wp_query->have_posts()) : $wp_query->the_post(); 
						 
				        	$imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full");

							$wp_query->is_page = true;
							global $wp_query; 
							
					        ?>
										
						<div class="post count<?php echo $postcount; ?><?php if(!$imgsrc) { ?> noimage<?php } ?>"<?php if($wp_query->found_posts == 1) { ?> style="width: 100%"<?php } ?>>
							
							
							<div class="dearfriend">
								
								<div class="p-lining">
								
									<p class="date"><?php the_time('m d y') ?></p>
									
									<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
									
								    <p><?php echo excerpt(100); ?></p>
								
									
								</div>
								
								<a href="<?php the_permalink(); ?>" class="letsgo">Read More</a>
								
								
							</div>
							
						
						</div>
					
						<?php $postcount++;  endwhile; endif;?>
											
						
					</div>
					

				<div class="clear"></div>

			</div>

		</div>
	</div>


<?php get_footer(); ?>
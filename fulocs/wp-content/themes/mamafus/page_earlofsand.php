


























<?php 

/* 

Template Name: Earl of Sandwich

*/

get_header(); ?>


<?php $imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full"); ?>

	<div class="pagemates">
		
		<div class="container">

			<div class="mainsect">

		
		        <div class="early">
		            
		           <p style="text-align: center; padding: 0; margin: 0"><img src="https://www.mamafus.com/wp-content/uploads/2017/04/funlogo.png" /></p>
		            
		            <div class="spitfire"><?php echo get_post_meta($post->ID, 'mamasays', true); ?><div class="clear"></div></div>

		            <div class="clear"></div>
		        
		        </div>
		        
		        <div class="later">
		        
		            <div class="late-sect">
		            
		                <?php echo get_post_meta($post->ID, 'virtual', true); ?>
		            
		            </div>
		            
		            
		            <div class="late-sect">
		                
		                <?php echo get_post_meta($post->ID, 'funatic', true); ?>
		                
		                
		            
		            </div>
		            
		            
		            <div class="clear"></div>
		            
		            
		            <p class="reward-info"><img class="liki" src="https://www.mamafus.com/wp-content/themes/mamafus/images/phone.jpg" /><i><?php echo get_post_meta($post->ID, 'download', true); ?></i><br><a target="_blank" href="https://itunes.apple.com/us/app/mama-fus-asian-house/id694565737?mt=8"><img style="width: 125px;" src="https://www.mamafus.com/wp-content/themes/bridge-child/img/appstore.png"></a>&nbsp;&nbsp;<a target="_blank" href="https://play.google.com/store/apps/details?id=com.punchh.mamafus"><img style="width: 114px;" src="https://www.mamafus.com/wp-content/themes/bridge-child/img/google-play.png"></a></p>
		        
		        </div>
		        
		        
				

				<div class="clear"></div>
				
				
				
				<div class="infobx">
				
				
				    <div class="infoleft">
				    
				        <img src="https://www.mamafus.com/wp-content/uploads/2017/04/fus-rewards3.png" />
				        
				        <!-- widgetized  -->

		     		<?php if ( !function_exists('dynamic_sidebar')
							|| !dynamic_sidebar('Sidebar') ) : ?>
					<?php endif; ?>  
		
		     	<!-- widgetized  -->
				        
				    </div>
				    
				    <div class="inforight">
				    
				        <h3>FAQ's</h3>
				        
				        
				        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); $imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full");  ?>

				            <?php the_content(); ?>
			            
			            <?php endwhile; endif; wp_reset_query(); ?>	
				    
				    
				    </div>
				    
				    
				    <div class="clear"></div>
				    
				    <p class="reward-infos"><?php echo get_post_meta($post->ID, 'rewardinfo', true); ?></p>
				
				
				</div>

			</div>

		</div>
	</div>


<?php get_footer(); ?>
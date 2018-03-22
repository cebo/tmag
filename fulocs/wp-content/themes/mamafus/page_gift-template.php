

















<?php 

/* 

Template Name: Gift Template

*/

get_header(); ?>


<?php $imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full"); ?>

	<div class="pagemates">
		
		<div class="container">

			<div class="mainsect">

		
		        <div class="early" style="padding: 0">
		            
		           <h2 style="text-align: center; padding: 0 0 20px 0; margin: 0"><?php the_title(); ?></h2>
		            
		            <div class="spitfire">
		            
		            <h2><?php echo the_field('red_box_wording'); ?></h2>
		            <a href="<?php echo get_field('red_box_button_link'); ?>" class="button"><?php echo get_field('red_box_button_wording'); ?></a>
		                
		            <div class="clear"></div></div>

		            <div class="clear"></div>
		        
		        </div>
		        
		        <div class="later">
		        
		            <div class="late-sect">
		            
		                <h2><?php echo the_field('left_box_wording'); ?></h2>
		                <a href="<?php echo the_field('left_box_button_link'); ?>" class="button"><?php echo the_field('left_box_button_wording'); ?></a>
		            
		            </div>
		            
		            
		            <div class="late-sect">
		                
		               <h2><?php echo the_field('right_box_wording'); ?></h2>
		                <a href="<?php echo the_field('right_box_button_link'); ?>" class="button"><?php echo the_field('right_box_button_wording'); ?></a>
		                
		                
		            
		            </div>
		            
		            
		            <div class="clear"></div>
		            
		            
		            <p class="reward-info"><img class="liki" src="https://www.mamafus.com/wp-content/themes/mamafus/images/phone.jpg" /><i><?php echo get_post_meta($post->ID, 'download', true); ?></i><br><a target="_blank" href="https://itunes.apple.com/us/app/mama-fus-asian-house/id694565737?mt=8"><img style="width: 125px;" src="https://www.mamafus.com/wp-content/themes/bridge-child/img/appstore.png"></a>&nbsp;&nbsp;<a target="_blank" href="https://play.google.com/store/apps/details?id=com.punchh.mamafus"><img style="width: 114px;" src="https://www.mamafus.com/wp-content/themes/bridge-child/img/google-play.png"></a></p>
		        
		        </div>
		        
		        
				

				<div class="clear"></div>

			</div>

		</div>
	</div>


<?php get_footer(); ?>















<?php 

/* 

Template Name: Spice Market

*/

get_header(); ?>


<?php $imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full"); ?>

	<section class="bigwelcome">


				<div class="hellomama" style="padding: 40px 0">

					<div class="mamascontent pagemates spicymark">

					<?php if(have_posts()) : while(have_posts()) : the_post(); ?>			

						<?php the_content(); ?>

					<?php endwhile; endif; wp_reset_query(); ?>	

					</div>

				</div>

				<div class="flames bigones videoboxer" style="background-image: url(); box-shadow: none;">
				
				    <div class="video-container">
				        <iframe src="https://player.vimeo.com/video/215266934" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
				    </div>
				    
				</div>


			</section>
			
			
			<section class="spicemenu">
			
			    <div class="container">
			    
			        <div class="spicesman">
			        
			            <div class="menu-item">
			            
			                <img style="max-width: 100%; margin: 15px 0" src="https://www.mamafus.com/wp-content/uploads/2017/04/thai-basil.jpg">
			                <?php query_posts('post_type=page&p=1198'); if(have_posts()) : while(have_posts()) : the_post(); ?>	
			                
			                <p><?php echo get_post_meta($post->ID, 'thaibasil', true); ?></p>
			                
			                
			                <?php endwhile; endif; wp_reset_query(); ?>	
			                
			                
			            </div>
			            <?php if($menutype) {

								query_posts(array(
								'cat' => 6,
								'post_type' => 'menues',
								'posts_per_page' => -1,
  								'menutype'  => $menutype,
  								));
  							} else {

  							query_posts(array(
							
								'post_type' => 'menues',
								'posts_per_page' => -1,
  								'menutype'  => 'spice-market-menu-items'
  								));
  							}
  								 if ( have_posts() ) : while ( have_posts() ) : the_post();  $imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full");  ?>

							<div class="menu-item">

							
								<?php if($imgsrc) { ?>
								<img src="<?php echo $imgsrc[0]; ?>" class="thumbber" />
								<?php } ?>
								
									<h3><?php the_title(); ?><span><?php if($post->ID == 1152) { ?><img class="spic" src="<?php bloginfo('template_url'); ?>/images/sp.png" /><img class="spic" src="<?php bloginfo('template_url'); ?>/images/sp.png" /><?php } ?><?php if(has_category('spicy')) { ?><img class="spic" src="<?php bloginfo('template_url'); ?>/images/sp.png" /><?php } ?><?php if(has_category('gluten-free')) { ?><img class="glut" src="<?php bloginfo('template_url'); ?>/images/gf.png" /><?php } ?><?php if(has_category('vegan')) { ?><img class="vega" src="<?php bloginfo('template_url'); ?>/images/vg.png" /><?php } ?></span></h3>
								<?php the_content(); ?>

								<div class="clear"></div>

							</div>

						<?php endwhile; endif; wp_reset_query(); ?>	

			        
			        
			        </div>
			    
			    
			    </div>
			
			
			</section>
			
			
			<?php query_posts('post_type=page&p=1198'); if(have_posts()) : while(have_posts()) : the_post(); ?>	
			<section class="sweepstakes">
			
			    <div class="container">
			    
			    <h3><?php echo get_post_meta($post->ID, 'sweettitle', true); ?></h3>
			    <p><?php echo get_post_meta($post->ID, 'sweetsubttitle', true); ?></p>

			        <img class="lifein" src="https://www.mamafus.com/wp-content/uploads/2017/04/easyDeliciousToEnter.png">
			        
			        
			        <div class="simplecols">
			            
			            <div class="explanat">
			                <h4>Step 1</h4>
			                <p><?php echo get_post_meta($post->ID, 'stepone', true); ?></a><p>
			            </div>
			            
			            <div class="explanat">
			                <h4>Step 2</h4>
			                <p><?php echo get_post_meta($post->ID, 'steptwo', true); ?><p>
			            </div>
			            
			            <div class="explanat">
			                <h4>Step 3</h4>
			                <p><?php echo get_post_meta($post->ID, 'stepthree', true); ?><p>
			            </div>
			            
			        </div>
			        
			        <h3>Grand Prize</h3>
			        <img src="https://www.mamafus.com/wp-content/uploads/2017/04/CruiseBanner.jpg">
			        
			        <p class="paper" style="font-size: 18px;padding: 20px;max-width: 60%;margin: 20px auto;">Experience the sights and flavors of the actual Southeast Asian spice markets by winning airfare and a 5 Night "Spice of Southeast Asia Cruise" for two.</p>
			        
			        <img src="https://www.mamafus.com/wp-content/uploads/2017/04/dates.jpg" style="max-width: 100%;margin-bottom: 30px;border: 3px solid #ddd;padding: 10px 0 20px 0;">
			        
			         <div class="simplecols" style="column-gap: 0px;">
			            
			            <div class="explanat redex seconda">
			                <h4>2nd Prize</h4>
			                <p><?php echo get_post_meta($post->ID, 'prizetwo', true); ?><p>
			            </div>
			            
			            <div class="explanat redex">
			                <h4>3rd Prize</h4>
			                <p><?php echo get_post_meta($post->ID, 'prizethree', true); ?><p>
			            </div>
			            
			            <div class="explanat redex">
			                <h4>Monthly Gift Cards</h4>
			                <p><?php echo get_post_meta($post->ID, 'monthlyprize', true); ?><p>
			            </div>
			            <?php endwhile; endif; wp_reset_query(); ?>
			            
			        </div>
   
                    <div class="funati">
                        
                        			        
                        
                        <img src="https://www.mamafus.com/wp-content/themes/mamafus/images/phone.jpg">
                        
                        <p class="impornt">*Remember, become a FUnatics Rewards member for your chance to win!<a href="https://www.mamafus.com/rewards/" class="button">Join Today</a></p>

                        <div class="clear"></div>
                    </div>
                    
                    
                    <?php query_posts('post_type=page&p=1198'); if(have_posts()) : while(have_posts()) : the_post(); ?>			
				
                    <ul id="toggle-view" class="sweep">
				        <li style="text-align: left">
					<h3><?php the_title(); ?><span> </span></h3>
				
					<div class="panel">

						    <?php the_content(); ?>
						    
					</div>
				</li>
				
				</ul>
				
			

			
			    </div>
			    
			    
			</section>
			
				<?php endwhile; endif; wp_reset_query(); ?>
			
			
			<section class="rules">
			
			
			</section>
			
			
			

<?php get_footer(); ?>
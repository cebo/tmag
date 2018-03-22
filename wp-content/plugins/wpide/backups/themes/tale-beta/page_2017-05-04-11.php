<?php /* start WPide restore code */
                                    if ($_POST["restorewpnonce"] === "086e40c079f2aef21438e1ed7121a6693e2a653b80"){
                                        if ( file_put_contents ( "/home/lurnglie/public_html/talemag.com/wp-content/themes/tale-beta/page.php" ,  preg_replace("#<\?php /\* start WPide(.*)end WPide restore code \*/ \?>#s", "", file_get_contents("/home/lurnglie/public_html/talemag.com/wp-content/plugins/wpide/backups/themes/tale-beta/page_2017-05-04-11.php") )  ) ){
                                            echo "Your file has been restored, overwritting the recently edited file! \n\n The active editor still contains the broken or unwanted code. If you no longer need that content then close the tab and start fresh with the restored file.";
                                        }
                                    }else{
                                        echo "-1";
                                    }
                                    die();
                            /* end WPide restore code */ ?><?php 

/* 

Basic Single Post Template 

*/

get_header(); ?>


<?php $imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full"); ?>

  <!-- // Navigation -->
        
        <div class="lining">
        
        	<div class="scene_element scene_element--fadein">
        	
        	<?php if(!$imgsrc) { ?>
        	
        	<div class="introspacer"> 
          		
          			<div class="homecontainer housearrest">

		          		<section class="home-intro" style="background-image: url(<?php if(get_option('misfit_hometype') == "2") { echo get_option('misfit_vidfallback'); } else { echo get_option('misfit_single_image'); } ?>);">
			            	
		
			            </section>
		            
	           		</div>
          			
          		</div>

        	<?php } ?>
        	
        	<div id="container" class="container intro-effect-push">
        	
        	<?php if($imgsrc) { ?>
        	
        	<header class="header">
				<div class="bg-img">
					<div class="slickbg" style="background-image: url(<?php echo $imgsrc[0]; ?>)"></div>
				</div>
				<div class="title">
				
					<p class="auth"></p>
					
					<h1 class="trigger"><?php the_title(); ?></h1>
					
					<p class="auth"></p>
									
									
				</div>
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

				
				
			</header>
			<button class="trigger" data-info="Click to see the header effect"><span><i class="flaticon-back28"></i></span></button>
			
			<?php } ?>
			
			<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
			
			<section class="pagecopy">
			
			
		
			<article class="content">
			
							
			
				<div>
				
				<div class="post-intro">
		
					<h1><?php the_title(); ?></h1>
						
						<p class="auth"></p>
									
												
						
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
				
					
				
				</div>
					<?php the_content(); ?>
					
					<br>
					<br>
					
					
					
				</div>
				
		
			</article>		
				
		
			<div class="clear"></div>

		</section>		
		<?php endwhile; endif; wp_reset_query(); ?>	
		
		</div><!-- /container -->
		
		
			<div class="additionalposts">
		
			<div id="carousel-gallery" class="touchcarousel  black-and-white">      
		
			
			 			
    		<ul class="touchcarousel-container">
                
                 <?php query_posts('post_type=post&posts_per_page=10'); if(have_posts()) : while(have_posts()) : the_post(); $imgsrcs = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full"); ?>
	
						            		
	        		<li class="touchcarousel-item<?php if(!$imgsrcs) { ?> sleepercell <?php } ?>">
			          <a href="<?php the_permalink(); ?>" >
			          		<h3><?php the_title(); ?></h3>
			          		<?php if($imgsrcs) { ?>
			          		<img src="<?php echo $imgsrcs[0]; ?>" alt="<?php the_title(); ?>" title="#" />
			          		<?php } else { ?>
			          		<i class="flaticon-back28"></i>
			          		<img src="<?php bloginfo('template_url'); ?>/images/blank.png" alt="<?php the_title(); ?>" title="#" />
			          		<?php } ?>
			          </a>
			        </li>
			       
			      <?php endwhile; endif; wp_reset_query(); ?>	
			      <div class="clear"></div>			                	
			</ul>
		</div>

	
	</div>

	<?php include(TEMPLATEPATH . '/library/copyright.php'); ?>
			
			</div><!-- end lining -->
			
        </div>
			

<?php get_footer(); ?>
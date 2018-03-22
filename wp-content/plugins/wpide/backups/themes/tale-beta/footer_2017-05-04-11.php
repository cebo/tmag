<?php /* start WPide restore code */
                                    if ($_POST["restorewpnonce"] === "086e40c079f2aef21438e1ed7121a6693e2a653b80"){
                                        if ( file_put_contents ( "/home/lurnglie/public_html/talemag.com/wp-content/themes/tale-beta/footer.php" ,  preg_replace("#<\?php /\* start WPide(.*)end WPide restore code \*/ \?>#s", "", file_get_contents("/home/lurnglie/public_html/talemag.com/wp-content/plugins/wpide/backups/themes/tale-beta/footer_2017-05-04-11.php") )  ) ){
                                            echo "Your file has been restored, overwritting the recently edited file! \n\n The active editor still contains the broken or unwanted code. If you no longer need that content then close the tab and start fresh with the restored file.";
                                        }
                                    }else{
                                        echo "-1";
                                    }
                                    die();
                            /* end WPide restore code */ ?><?php
/**
 * The template for displaying the footer.
 *
**/
?>



	
		
      
      </div>
      
      
      
      
      <!-- ====================== NAVIGATION SECTIONS ======================= -->	
			
		<section class="leftnav">
			
			<div class="authorsection appearman">
			            		
	    		<div class="hellofriend">
	    			<div class="author" style="background-image: url(<?php echo get_option('misfit_logo'); ?>);"><a href="<?php $authurl = get_option('misfit_authpage'); echo esc_url( get_permalink( get_page_by_title( $authurl ) ) ); ?>"></a></div>
	            		
            			<h3><a href="<?php $authurl = get_option('misfit_authpage'); echo esc_url( get_permalink( get_page_by_title( $authurl ) ) ); ?>"><?php echo get_option('misfit_logotext'); ?></a></h3>
            		
            			<p><?php echo get_option('misfit_logotextline'); ?></p>
	    		</div>
	    	</div>
	    	
	    	<?php if(get_option('misfit_newscode')) { ?>
	    	
	    	<div class="newsletter">
	    		
	    		<?php echo get_option('misfit_newscode'); ?>
	    	</div>
	    	
	    	<?php } ?>
	    	
	    	<div class="contentabs">
	    		
	    		<div class="tabs-wrapper">
	    			
	    			<ul class="tabs">
	    			
	    			<?php if(get_option('misfit_removetabone') == "true" || get_option('misfit_removetabone') == "") { ?>
	    				<li><a href="#writing"><?php echo get_option('misfit_tabonelabel'); ?></a></li>
	    			<?php } ?>
	    			<?php if(get_option('misfit_removetabtwo') == "true" || get_option('misfit_removetabtwo') == "") { ?>
						<li><a href="#portfolio"><?php echo get_option('misfit_tabsecondlabel'); ?></a></li>
					<?php } ?>	
					<?php if(get_option('misfit_activatethree') == "true") { ?>
						<li><a href="#products"><?php echo get_option('misfit_thirdtablabel'); ?></a></li>
					<?php } ?>	
					<?php if(get_option('misfit_fourthtab')) { ?>
						<li><a href="#xtend"><?php echo get_option('misfit_fourthtablabel'); ?></a></li>
					<?php } ?>	
					
					</ul>
					<div style="margin-bottom: 10px" class="tabs-container">
						
						
						<?php if(get_option('misfit_removetabone') == "true" || get_option('misfit_removetabone') == "") { ?>
						
						<div id="writing" class="tab-content">
							
							
							
							<?php $counter = 1; query_posts('post_type=post&posts_per_page=10'); if(have_posts()) : while(have_posts()) : the_post(); $imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full"); ?>
							
							<div class="post<?php if(!$imgsrc) { ?> sleepercellsequel<?php } ?>">
							
								
									<div class="whyhello">
									
									<p class="date"><?php the_time('m d y') ?></p>
									
									<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
								
								</div>
								
								
								<a href="<?php the_permalink(); ?>" class="dropanchors"></a>
								<div class="innerpost" style="background-image: url(<?php echo $imgsrc[0];?>);"></div>
							
							</div><!-- end count  -->
							
							<?php if($counter == 2) { ?>
								
								<?php if(get_option('misfit_adspot1') || get_option('misfit_adcode')) { ?>
									<div class="clear"></div>
									
									<div class="adspot">
										<?php if(get_option('misfit_adspot1')) { ?>
										<a href="<?php echo get_option('misfit_adlink'); ?>" target="_blank"><img src="<?php echo get_option('misfit_adspot1'); ?>" alt="advertisement" /></a>
										<?php } elseif(get_option('misfit_adcode')) { ?>
										<?php echo get_option('misfit_adcode'); ?>
										<?php } ?>
									</div>
								<?php } ?>	
								
							<?php } ?>
							
							<?php $counter++;  endwhile; endif; wp_reset_query(); ?>	
							
							<div class="clear"></div>
							<?php $blogger = get_page_with_template('page_blog');
							  $bloggerurl= get_permalink($blogger);	
							?>
					        
					        <?php if($blogger){ ?>
			
								<p class="afewmore"><a href="<?php echo $bloggerurl; ?>?paged=2"><?php _e('View More','misfitlang'); ?></a></p>
							
							
							<?php } ?>
					
						</div>
						
						<?php } ?>
						
						<?php if(get_option('misfit_removetabtwo') == "true" || get_option('misfit_removetabtwo') == "") { ?>
						
						<div id="portfolio" class="tab-content">
						
						
							<?php $counter = 1; query_posts('post_type=project&posts_per_page=10'); if(have_posts()) : while(have_posts()) : the_post(); $imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full"); ?>
							
							<div class="post<?php if(!$imgsrc) { ?> sleepercellsequel<?php } ?>">
							
								
									<div class="whyhello">
									
									<p class="date"><?php the_time('m d y') ?></p>
									
									<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
								
								</div>
								
								
								<a href="<?php the_permalink(); ?>" class="dropanchors"></a>
								<div class="innerpost" style="background-image: url(<?php echo $imgsrc[0];?>);"></div>
							
							</div><!-- end count  -->
							
							<?php if($counter == 2) { ?>
								
								<?php if(get_option('misfit_adspot1') || get_option('misfit_adcode')) { ?>
									<div class="clear"></div>
									
									<div class="adspot">
										<?php if(get_option('misfit_adspot1')) { ?>
										<a href="<?php echo get_option('misfit_adlink'); ?>" target="_blank"><img src="<?php echo get_option('misfit_adspot1'); ?>" alt="advertisement" /></a>
										<?php } elseif(get_option('misfit_adcode')) { ?>
										<?php echo get_option('misfit_adcode'); ?>
										<?php } ?>
									</div>
								<?php } ?>	
								
							<?php } ?>
							
							<?php $counter++;  endwhile; endif; wp_reset_query(); ?>	
							
							<div class="clear"></div>
							<?php $blogger = get_page_with_template('page_portfolio');
							  $bloggerurl= get_permalink($blogger);	
							?>
					        
					        <?php if($blogger) { ?>
			
								<p class="afewmore"><a href="<?php echo $bloggerurl; ?>?paged=2"><?php _e('View More','misfitlang'); ?></a></p>
							
							
							<?php } ?>
						
						
						</div>
					
						<?php } ?>
						
						
						
						<?php if(get_option('misfit_activatethree') == "true") { ?>
						
						<div id="products" class="tab-content">
							
							
							
							<?php $counter = 1; query_posts('post_type=product&posts_per_page=10'); if(have_posts()) : while(have_posts()) : the_post(); $imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full"); ?>
							
							<div class="post<?php if(!$imgsrc) { ?> sleepercellsequel<?php } ?>">
							
								
									<div class="whyhello">
									
									<p class="date"><?php the_time('m d y') ?></p>
									
									<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
								
								</div>
								
								
								<a href="<?php the_permalink(); ?>" class="dropanchors"></a>
								<div class="innerpost" style="background-image: url(<?php echo $imgsrc[0];?>);"></div>
							
							</div><!-- end count  -->
							
							<?php if($counter == 2) { ?>
								
								<?php if(get_option('misfit_adspot1') || get_option('misfit_adcode')) { ?>
									<div class="clear"></div>
									
									<div class="adspot">
										<?php if(get_option('misfit_adspot1')) { ?>
										<a href="<?php echo get_option('misfit_adlink'); ?>" target="_blank"><img src="<?php echo get_option('misfit_adspot1'); ?>" alt="advertisement" /></a>
										<?php } elseif(get_option('misfit_adcode')) { ?>
										<?php echo get_option('misfit_adcode'); ?>
										<?php } ?>
									</div>
								<?php } ?>	
								
							<?php } ?>
							
							<?php $counter++;  endwhile; endif; wp_reset_query(); ?>	
							
							<div class="clear"></div>
							<?php $shop_page_url = get_permalink( woocommerce_get_page_id( 'shop' ) ); ?>
							
					        <?php if($shop_page_url) { ?>
			
								<p class="afewmore"><a href="<?php echo $shop_page_url; ?>"><?php _e('View More','misfitlang'); ?></a></p>
							
							
							<?php } ?>					
						</div>
						
						<?php } ?>
						
						<?php if(get_option('misfit_fourthtab') == "Select a page:" || get_option('misfit_fourthtab') == "" ) { ?>
						
						
						<?php } else { ?>
						
						<div id="xtend" class="tab-content <?php echo get_option('misfit_fourthtab'); ?>">
							
							
							
							<?php $pagename = get_option('misfit_fourthtab');
											$page = get_page_by_title($pagename);
											$featured_id =  $page->ID;
											
					            	query_posts(
				            			
				            			array(
				            				'post_type' => 'page',
				            				'p' => $featured_id,
				            				'posts_per_page' => -1
				            			)
				            	
				            		); if(have_posts()) : while(have_posts()) : the_post(); ?>
				            		<?php $imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full"); ?>
							
								<article class="content">
								
								<h1><?php the_title(); ?></h1>
								<?php the_content(); ?>
								
								</article>
								
								
								<?php endwhile; endif; wp_reset_query(); ?>						
						</div>
						
						<?php } ?>
						
					
					
				</div>
	    	
	    		</div>
	    	
	    	</div>
	    	
	    	<p class="copyright"><?php _e('&copy; Scribe - 2014, by','misfitlang'); ?> <a href="http://cebocampbell.com"><?php _e('Cebo Campbell','misfitlang'); ?></a></p>
			
			<div class="spacer"></div>

		</section><!-- end left nav -->
		
		
		
		
		
		
		
		
		
		
		
		<section class="rightnav">
			
			<div class="navigations">
				
				<ul>
					<?php wp_nav_menu( array( 'theme_location' => 'primary' ,  'container' => false, 'items_wrap' => '%3$s' ) ); ?>
				</ul>
			</div>
			
			<div class="clear"></div>


			<?php if ( !function_exists('dynamic_sidebar')
					|| !dynamic_sidebar('Sidebar') ) : ?>
			<?php endif; ?>  
	
						
			
			
			<p class="copyright"><?php _e('&copy; Scribe - 2014, by','misfitlang'); ?> <a href="http://cebocampbell.com"><?php _e('Cebo Campbell','misfitlang'); ?></a></p>
			
			<div class="spacer"></div>
		
		</section><!-- end right nav -->
		
		
		
<?php if(is_home()) { ?>			
</div><!--special case -->	
<?php } ?>	
<?php if(is_home() && get_option('misfit_hometype') == "2" ) { ?>
<?php include (TEMPLATEPATH . '/library/video.php'); ?>
<?php } ?>
<?php include (TEMPLATEPATH . '/library/instagram.php'); ?>
<script src="<?php bloginfo ('template_url'); ?>/js/jquery.slabtext.min.js"></script>
<script src="<?php bloginfo ('template_url'); ?>/js/view.js" type="text/javascript" charset="utf-8"></script>
<script src="<?php bloginfo ('template_url'); ?>/js/jquery.sticky-kit.js"></script>
<script src="<?php bloginfo ('template_url'); ?>/js/lightbox.min.js"></script>
<script src="<?php bloginfo ('template_url'); ?>/js/jquery.touchcarousel-1.2.js"></script> 
<?php if(get_option('misfit_consumer_key')) { ?>
<?php include (TEMPLATEPATH . '/library/twitter-info.php'); ?>
<?php } ?>
<script src="<?php bloginfo ('template_url'); ?>/js/jquery.contact.js"></script>
<script src="<?php bloginfo ('template_url'); ?>/js/execute.js"></script>
<?php if(!is_home()) { ?>

	<?php if(is_singular('product')) { ?><?php } else { ?>
	<?php if(have_posts()) : while(have_posts()) : the_post(); $imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full"); if($imgsrc) { ?>
	<script src="<?php bloginfo ('template_url'); ?>/js/classie.js"></script>
	<script src="<?php bloginfo ('template_url'); ?>/js/classie-function.js"></script>
	<?php } ?>
	<?php endwhile; endif; wp_reset_query(); ?>
	<?php } ?>	
<?php } ?>
<?php if(get_option('misfit_hometype') == "1" ) { ?>
<script type="text/javascript" src="<?php bloginfo ('template_url'); ?>/js/supersized.3.2.7.min.js"></script>
<script type="text/javascript" src="<?php bloginfo ('template_url'); ?>/js/supersized.shutter.min.js"></script>
<?php } ?>
<script>
	jQuery(function($){
				
		$(".touchcarousel").touchCarousel({				
			itemsPerPage: 1,	
			autoplay: true,			
			scrollbar: true,
			scrollbarAutoHide: false,
			scrollbarTheme: "dark",				
			pagingNav: false,
			itemFallbackWidth: 500,
			snapToItems: false,
			scrollToLast: false,
			useWebkit3d: true,				
			loopItems: true
		});	
		<?php if(get_option('misfit_hometype') == "1" ) { ?>
		<?php include (TEMPLATEPATH . '/js/images.php'); ?>
		<?php } ?>
		
	 });
		    
</script>
<?php if ( get_option('misfit_tracking_code') <> "" ) { echo stripslashes(get_option('misfit_tracking_code')); } ?>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-8891717-1', 'auto');
  ga('send', 'pageview');

</script>
<?php wp_footer(); ?>
</body>
</html>
<?php get_header(); ?>


 <div class="lining">
        
        	<div class="scene_element scene_element--fadein">
          		
          		<?php if(get_option('misfit_showfeatured') == "true") { ?>
          		
		           <?php include(TEMPLATEPATH . '/library/featured.php'); ?>
	           
				<?php } else { ?>
				
					<div class="quietbanner"></div>
					<div class="quietspacer"></div>
				
				<?php } ?>	
				
				         
				<section class="postlist">
					
					<?php if(get_option('misfit_showfeatured') == "true") { ?>   
					<div class="authorsection">
			            		
	            		<div class="hellofriend">
	            			<div class="authorly" style="background-image: url(<?php echo get_option('misfit_logo'); ?>);"><a href="<?php $authurl = get_option('misfit_authpage'); echo esc_url( get_permalink( get_page_by_title( $authurl ) ) ); ?>"></a></div>
	            		
	            			<h3><a href="<?php $authurl = get_option('misfit_authpage'); echo esc_url( get_permalink( get_page_by_title( $authurl ) ) ); ?>"><?php echo get_option('misfit_logotext'); ?></a></h3>
	            		
	            			<p><?php echo get_option('misfit_logotextline'); ?></p>
	            		</div>
	            	</div>
	            	<?php } ?>
	            	
					<div class="querybar">
					
						<div class="searcher">
							<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
					
						        <input class="silentsearch" type="text" value="" name="s" id="s" placeholder="<?php _e('Search and find what you need','misfitlang'); ?>"/>
							</form>
						
						</div>
						
						<ul class="dripper">
							
							<li>
								<a href="#" class="filter" data-filter="all"><?php _e('Filter by Category','misfitlang'); ?></a>
								<ul class="drip">
									<?php wp_nav_menu( array( 'theme_location' => 'category' ,  'container' => false, 'items_wrap' => '%3$s' ) ); ?>
								</ul>
							</li>
						</ul>
						<div class="clear"></div>
						
					</div>

			
					<div class="posts">
					
					<?php if(get_option('misfit_homeposts') == 'Portfolio') { ?>
						
						<?php include(TEMPLATEPATH . '/library/homeportfolio.php'); ?>
					
					<?php } elseif(get_option('misfit_homeposts') == 'Products') { ?>
						
						<?php include(TEMPLATEPATH . '/library/homeproducts.php'); ?>
					
					<?php } else { ?>
						
						<?php include(TEMPLATEPATH . '/library/homeposts.php'); ?>
											
					<?php } ?>
					
						
					</div>
					
					<div class="clear"></div>
				
				
				</section>
				
				<?php if(get_option('misfit_homeposts') == 'Portfolio') { ?>
				
					<?php $bloggers = get_page_with_template('page_portfolio');
					  $bloggersurl= get_permalink($bloggers);	
					?>
			        
			        <?php if($bloggers) { ?>
	
					<div class="moreposts">
						<p><a href="<?php echo $bloggersurl; ?>?paged=2"><?php _e('View More','misfitlang'); ?></a></p>
					</div>

					<?php } ?>
		
				<?php } elseif(get_option('misfit_homeposts') == 'Products') { ?>

					<?php $shop_page_url = get_permalink( woocommerce_get_page_id( 'shop' ) ); ?>
							
			        <?php if($shop_page_url) { ?>

						<div class="moreposts">
							<p><a href="<?php echo $shop_page_url; ?>"><?php _e('View All','misfitlang'); ?></a></p>
						</div>
					
					<?php } ?>
					
							
				<?php } else { ?>

				
					<?php $blogger = get_page_with_template('page_blog');
					  $bloggerurl= get_permalink($blogger);	
					?>
		        
			        <?php if($blogger) { ?>
	
					<div class="moreposts">
						<p><a href="<?php echo $bloggerurl; ?>?paged=2"><?php _e('View More Posts','misfitlang'); ?></a></p>
					</div>
						
					<?php } ?>
				<?php } ?>	
				
				
				
				<?php include(TEMPLATEPATH . '/library/copyright.php'); ?>
			
			</div><!-- end lining -->
			
        </div>
		
		
<?php get_footer(); ?>
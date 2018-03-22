











<?php get_header(); ?>


			<section class="bigwelcome">


				<div class="hellomama">

					<div class="mamascontent">

					<?php query_posts('post_type=page&p=775'); if(have_posts()) : while(have_posts()) : the_post(); ?>

						<h2><?php the_title(); ?></h2>

						<?php the_content(); ?>

					<?php endwhile; endif; wp_reset_query(); ?>	


					</div>




				</div>

				<div class="flames" style="background-image: url(<?php bloginfo('template_url'); ?>/images/flames-op.gif);"></div>


			</section>



			<section class="mobile-breaker">
                
                <?php query_posts('post_type=page&p=1130'); if(have_posts()) : while(have_posts()) : the_post(); $imgsrcs = get_post_meta($post->ID, 'misfit_bannerimage',true);  ?>
					
					<div class="wideawake" style="background-image: url();">
					
					    <a href="<?php the_permalink(); ?>"><img src="http://www.mamafus.com/wp-content/uploads/2017/05/mobs.png" alt="" /></a>
					
					</div>
					<?php endwhile; endif; wp_reset_query(); ?>	
                
				
				

				<div class="maker" style="background-image: url(<?php bloginfo('template_url'); ?>/images/int-bg.jpg)">
					<a href="<?php bloginfo('url'); ?>/menu" class="dropanchor"></a>
					<h2>The Menu</h2>

				</div>

				<div class="maker" style="background-image: url(<?php bloginfo('template_url'); ?>/images/delivery.jpg)">
					<a href="https://order.mamafus.com/index.cfm?fuseaction=order&action=preorder&isToGo=1" class="dropanchor"></a>
					<h2>Delivery</h2>

				</div>

				<div class="maker" style="background-image: url(<?php bloginfo('template_url'); ?>/images/catering.jpg)">
					<a href="<?php bloginfo('url'); ?>/catering" class="dropanchor"></a>
					<h2>Catering</h2>

				</div>

				<div class="maker" style="background-image: url(<?php bloginfo('template_url'); ?>/images/georgetown.jpg)">
					<a href="<?php bloginfo('url'); ?>/locations" class="dropanchor"></a>
					<h2>Locations</h2>

				</div>



			</section>


			<section class="scrollmama">

				<h2>The news at Mama Fu’s</h2>

				<div class="container">
				
					<?php query_posts('post_type=page&p=1130'); if(have_posts()) : while(have_posts()) : the_post(); $imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full");  ?>
					
					<div class="wideawake" style="background-image: url();">
					
					    <a href="<?php the_permalink(); ?>"><img src="<?php echo $imgsrc[0]; ?>" alt="" style="margin-bottom: 10px" /></a>
					
					</div>
					<?php endwhile; endif; wp_reset_query(); ?>	


				<div class="owl-carousel owl-theme">


				<?php query_posts('post_type=features&category__not_in=56'); if(have_posts()) : while(have_posts()) : the_post(); $imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full");  ?>
				    <div class="item">
				    	<div class="mamasays">

				    		<div class="mamaimg" style="background-image: url(<?php echo $imgsrc[0];?>)">
				    			<a href="<?php the_permalink(); ?>" class="dropanchor"></a>
				    		</div>

				    		<p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>

				    	</div>
				    </div>
				<?php endwhile; endif; wp_reset_query(); ?>	
				 
				</div>

				<div class="clear"></div>

				<br>
				<p align="center"><a href="<?php bloginfo('url'); ?>/menu" class="button">View our Menu</a></p>
				<br>
				

				</div>

			</section>



			<section class="staggered">

				<div class="container">

					<h2>Order Mama Fu's</h2>

					<div class="cat-box">

						<div class="catimg" style="background-image: url(<?php bloginfo('template_url'); ?>/images/catering.jpg)">
			    			<a href="https://order.mamafus.com/index.cfm?fuseaction=order&action=preorder&isToGo=0" class="dropanchor"><span>Catering</span></a>
			    		</div>


					</div>

					<div class="cat-box right">

						<div class="catimg" style="background-image: url(<?php bloginfo('template_url'); ?>/images/delivery.jpg)">
			    			<a href="https://order.mamafus.com/index.cfm?fuseaction=order&action=preorder&isToGo=1" class="dropanchor"><span style="font-size:85px;top:33%;">Delivery or Takeout</span></a>
			    		</div>


					</div>

					<div class="clear"></div>

					<br>
					<br>

					<p align="center"><a href="<?php bloginfo('url'); ?>/menu" class="button">View our Menu</a></p>

					<br>


				</div>


			</section>
		
<?php get_footer(); ?>
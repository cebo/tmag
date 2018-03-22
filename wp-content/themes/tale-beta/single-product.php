<?php 

/* 

Basic Single Post Template 

*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

get_header(); ?>

<div class="headban">
    
    <h2><a href="<?php bloginfo('url'); ?>">Tale Magazine - Short Fiction. Photography. Film.</a></h2>
    
    <a href=""></a>

</div>


	<div id="container" class="container">
	
		
			<section class="pagecopy">
			
			
		
			<article class="content">
			
			
				
							
				<?php
					/**
					 * woocommerce_before_main_content hook
					 *
					 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
					 * @hooked woocommerce_breadcrumb - 20
					 */
					do_action( 'woocommerce_before_main_content' );
				?>
			
					<?php while ( have_posts() ) : the_post(); ?>
			
						<?php wc_get_template_part( 'content', 'single-product' ); ?>
			
					<?php endwhile; // end of the loop. ?>
			
			
				<?php
					/**
					 * woocommerce_after_main_content hook
					 *
					 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
					 */
					do_action( 'woocommerce_after_main_content' );
				?>
			
				</div>
				
		
			</article>		

		
			<div class="clear"></div>

		</section>
	
		
		</div><!-- /container -->
		
	
<?php get_footer( 'shop' ); ?>
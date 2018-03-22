<?php /* start WPide restore code */
                                    if ($_POST["restorewpnonce"] === "086e40c079f2aef21438e1ed7121a6693e2a653b80"){
                                        if ( file_put_contents ( "/home/lurnglie/public_html/talemag.com/wp-content/themes/tale-beta/single-product.php" ,  preg_replace("#<\?php /\* start WPide(.*)end WPide restore code \*/ \?>#s", "", file_get_contents("/home/lurnglie/public_html/talemag.com/wp-content/plugins/wpide/backups/themes/tale-beta/single-product_2017-05-04-11.php") )  ) ){
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

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

get_header( ); ?>


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
<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive.
 *
 * Override this template by copying it to yourtheme/woocommerce/archive-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

get_header( 'shop' ); ?>



	 <div class="lining">
        
        	<div class="scene_element scene_element--fadein">
          		
				<div class="introspacer"> 
          		
          			<div class="homecontainer housearrest">

		          		<section class="home-intro" style="background-image: url(<?php if(get_option('misfit_hometype') == "2") { echo get_option('misfit_vidfallback'); } else { echo get_option('misfit_single_image'); } ?>);">
			            	
		
			            </section>
		            
	           		</div>
          			
          		</div>
				<div class="quietbanner"></div>
				<div class="quietspacer"></div>
				
				         
				<section class="postlist">
				
				
					

			
			
				
					<?php if(get_option('misfit_showfeatured') == "true") { ?>   
					
					<div class="authorsection">
			            		
	            		<div class="hellofriend">
	            			<div class="author" style="background-image: url(<?php echo get_option('misfit_logo'); ?>);"><a href="<?php $authurl = get_option('misfit_authpage'); echo esc_url( get_permalink( get_page_by_title( $authurl ) ) ); ?>"></a></div>
	            		
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
							
								<?php
								
									/**
									 * woocommerce_before_shop_loop hook
									 *
									 * @hooked woocommerce_result_count - 20
									 * @hooked woocommerce_catalog_ordering - 30
									 */
									do_action( 'woocommerce_before_shop_loop' );
								?>
								
								
							</li>
						</ul>
						<div class="clear"></div>
						
					</div>
			
					<div class="posts">

						<?php $postcount=1; if ( have_posts() ) : ?>
						<!-- woocommerce product loop -->
						
						<?php while ( have_posts() ) : the_post();
						
						$imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full"); 
						
						if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

						global $product, $woocommerce_loop;
						
						// Store loop count we're currently on
						if ( empty( $woocommerce_loop['loop'] ) )
							$woocommerce_loop['loop'] = 0;
						
						// Store column count for displaying the grid
						if ( empty( $woocommerce_loop['columns'] ) )
							$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 4 );
						
						// Ensure visibility
						if ( ! $product || ! $product->is_visible() )
							return;
						
						// Increase loop count
						$woocommerce_loop['loop']++;
						
						// Extra post classes
						$classes = array();
						if ( 0 == ( $woocommerce_loop['loop'] - 1 ) % $woocommerce_loop['columns'] || 1 == $woocommerce_loop['columns'] )
							$classes[] = 'first';
						if ( 0 == $woocommerce_loop['loop'] % $woocommerce_loop['columns'] )
							$classes[] = 'last';
						
						?>
						
															
						<div class="post count3<?php if(!$imgsrc) { ?> noimage<?php } ?>"<?php if($wp_query->found_posts == 1) { ?> style="width: 100%"<?php } ?>>
						
						<?php do_action( 'woocommerce_before_shop_loop_item' ); ?>
						
						<?php if ( $product->is_on_sale() ) : ?>

							<div class="prodnotes"><?php echo apply_filters( 'woocommerce_sale_flash', '<span class="onsale">' . __( 'Sale!', 'woocommerce' ) . '</span>', $post, $product ); ?></div>
						
						<?php endif; ?>


							
				
							<div class="whyhello">
								
								<p class="date">
								
								<?php	if ( ! defined( 'ABSPATH' ) ) {
										exit; // Exit if accessed directly
									}
									
									global $product;
									?>
									<?php echo $product->get_price_html(); ?>
									
										<meta itemprop="price" content="<?php echo $product->get_price(); ?>" />
										<meta itemprop="priceCurrency" content="<?php echo get_woocommerce_currency(); ?>" />
										<link itemprop="availability" href="http://schema.org/<?php echo $product->is_in_stock() ? 'InStock' : 'OutOfStock'; ?>" />
									
									
								
								</p>
								
								<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							
							</div>
							
							
							<div class="dearfriend">
								
								<div class="p-lining">
								
									<p class="date">
										<?php	if ( ! defined( 'ABSPATH' ) ) {
										exit; // Exit if accessed directly
									}
									
									global $product;
									?>
									<?php echo $product->get_price_html(); ?>
									
										<meta itemprop="price" content="<?php echo $product->get_price(); ?>" />
										<meta itemprop="priceCurrency" content="<?php echo get_woocommerce_currency(); ?>" />
										<link itemprop="availability" href="http://schema.org/<?php echo $product->is_in_stock() ? 'InStock' : 'OutOfStock'; ?>" />
										
									</p>
									
									<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
									
									<p class="auth">
									
										<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

											global $product;
											
											if ( get_option( 'woocommerce_enable_review_rating' ) === 'no' )
												return;
											
											$count   = $product->get_rating_count();
											$average = $product->get_average_rating();
											
											if ( $count > 0 ) : ?>
											
												<div class="woocommerce-product-rating" itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating">
													<div class="star-rating" title="<?php printf( __( 'Rated %s out of 5', 'woocommerce' ), $average ); ?>">
														<span style="width:<?php echo ( ( $average / 5 ) * 100 ); ?>%">
															<strong itemprop="ratingValue" class="rating"><?php echo esc_html( $average ); ?></strong> <?php _e( 'out of 5', 'woocommerce' ); ?>
														</span>
													</div>
													<a href="#reviews" class="woocommerce-review-link" rel="nofollow">(<?php printf( _n( '%s customer review', '%s customer reviews', $count, 'woocommerce' ), '<span itemprop="ratingCount" class="count">' . $count . '</span>' ); ?>)</a>
												</div>
											
											<?php endif; ?>
									</p>
									
									<h4 class="cats">
									<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
									
									global $post, $product;
									
									$cat_count = sizeof( get_the_terms( $post->ID, 'product_cat' ) );
									$tag_count = sizeof( get_the_terms( $post->ID, 'product_tag' ) );
									?>

									<?php echo $product->get_categories( ', ', '<span class="posted_in">' . _n( '', '', $cat_count, 'woocommerce' ) . ' ', '</span>' ); ?>
									</h4>
									
								</div>
								
								<a href="<?php the_permalink(); ?>" class="letsgo"><i class="flaticon-back28"></i></a>
								
								
							</div>
							
							
							<?php if($imgsrc) { ?>
							
							<div class="innerpost" style="background-image: url(<?php echo $imgsrc[0]; ?>);"></div>
							
							<?php } ?>
							
												
							</div>
						
					<?php $postcount++;  endwhile; endif; ?>

					<div class="clear"></div>
							
					</div>
									
					
				
				
				</section>

				
				<div class="moreposts">
					
                    <div class="navigation-al">
                    	<p><?php if(!get_next_posts_link()) { _e('You have reached the end','misfitlang'); } else { _e('View More Posts','misfitlang'); } ?></p>
                        <div class="alignleft previousposts"><?php next_posts_link('&laquo;' .   __(' <i class="flaticon-back28"></i>' , 'cebolang')) ?></div>
                        <div class="alignright nextposts"><?php previous_posts_link( __('<i class="flaticon-back28"></i> ', 'cebolang') .  '&raquo;') ?></div>
                        <div class="clear"></div>
                    </div>
                    
				</div>
				
				
				<?php include(TEMPLATEPATH . '/library/copyright.php'); ?>

	 
			</div><!-- end lining -->
			
        </div>

<?php get_footer( 'shop' ); ?>
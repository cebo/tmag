<?php 

/* Template Name: Menu (Kids Menu)

*/
get_header(); ?>   


<?php $menutype = $_GET['menu']; ?>


<section class="bigwelcome">

				<div class="menubar">

                    <ul class="menuable">

						<li><a href="#"><span>Select Menu Type:</span> <?php if($menutype) { echo $menutype; } else { ?>Gluten Free<?php } ?></a>
							<ul>
								<li><a href="<?php bloginfo('url'); ?>/menu">Main</a></li>
								<li><a href="https://order.mamafus.com/index.cfm?fuseaction=order&action=preorder&isToGo=0">Catering</a></li>
							</ul>
						</li>
						<li><a href="#allergen">Nutritional Info</a></li>
						
                    </ul>

				</div>

				<div class="slapstick">


				<div class="container">

				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

					<h2>Asian Comfort Food</h2>

					<?php the_content(); ?>

				<?php endwhile; endif; wp_reset_query(); ?>	

				</div>


				</div>



				<div class="sharables menubox">
					
					<h2 id="shareables" class="menu-head">Gluten Freee</h2>

					<div class="menuholder">
					
					<div class="container narrowed">

						<div class="menuleft">

						<?php if($menutype) {

								query_posts(array(
								'cat' => 6,
								'post_type' => 'menues',
								'posts_per_page' => -1,
  								'menutype'  => $menutype,
  								));
  							} else {

  							query_posts(array(
								'cat' => 24,
								'post_type' => 'menues',
								'posts_per_page' => -1,
  								'menutype'  => 'main-menu'
  								));
  							}
  								 if ( have_posts() ) : while ( have_posts() ) : the_post();  $imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full");  ?>

							<div class="menu-item">

								<h3><?php the_title(); ?><span><?php if(has_category('spicy')) { ?><img src="<?php bloginfo('template_url'); ?>/images/sp.png" /><?php } ?><?php if(has_category('gluten-free')) { ?><img src="<?php bloginfo('template_url'); ?>/images/gf.png" /><?php } ?><?php if(has_category('vegan')) { ?><img src="<?php bloginfo('template_url'); ?>/images/vg.png" /><?php } ?></span></h3>
								<?php if($imgsrc) { ?>
								<img src="<?php echo $imgsrc[0]; ?>" class="thumbber" />
								<?php } ?>
								<?php the_content(); ?>

								<div class="clear"></div>

							</div>

						<?php endwhile; endif; wp_reset_query(); ?>	

							

							<div class="clear"></div>

						</div>

					</div>
				</div>
			</div><!-- end menubox -->


				

				<h2 id="allergen" class="menu-head">Allergen</h2>

					<div class="menuholder">
					
					<div class="container ">

						<img src="<?php bloginfo('template_url'); ?>/images/allergen.jpg" style="width: 100%;"/>

					</div>
				</div>



			</section>

<?php get_footer(); ?>
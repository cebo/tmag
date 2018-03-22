


<?php 

/* Template Name: F&B Menu

*/
get_header(); ?>   


<?php $menutype = $_GET['menu']; ?>


<section class="bigwelcome">

				

				<div class="slapstick">


				<div class="container">

				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

					<h2>Food and Beverage Manual</h2>

					<?php the_content(); ?>

				<?php endwhile; endif; wp_reset_query(); ?>	

				</div>

				<div class="menubar">

					<ul class="menuable">

						<li><a href="#"><span>Select Menu Type:</span> <?php if($menutype) { echo $menutype; } else { ?>Main<?php } ?></a>
							<ul>
								<li><a href="<?php bloginfo('url'); ?>/menu/gluten-free-menu">Gluten Free</a></li>
								<li><a href="https://order.mamafus.com/index.cfm?fuseaction=order&action=preorder&isToGo=0">Catering</a></li>
							</ul>
						</li>
						<li><a href="#shareables">Shareables</a></li>
						<li><a href="#soups">Soups & Salads</a></li>
						<li><a href="#entrees">Our Entrees</a></li>
						<li><a href="#drinks">Drinks</a></li>
						<li><a href="#desserts">Desserts</a></li>
						<li><a href="#allergen">Nutritional Info</a></li>
						<li><a href="#kids">Kids</a></li>

					</ul>

				</div>
				
				<div class="stakba">
				
			        <span><img class="spic" src="<?php bloginfo('template_url'); ?>/images/sp.png" />&nbsp;Spicy</span>
			        <span><img class="glut" src="<?php bloginfo('template_url'); ?>/images/gf.png" />&nbsp;Gluten Free</span>
			        <span><img class="vega" src="<?php bloginfo('template_url'); ?>/images/vg.png" />&nbsp;Vegan</span>
			        <div class="clear"></div>
			        
				</div>


				</div>



				<div class="sharables menubox">
					

					<div class="menuholder">
					
					<div class="container">

						<div class="menuleft menufb">

						<?php if($menutype) {

								query_posts(array(
								'cat' => 6,
								'post_type' => 'menues',
								'posts_per_page' => -1,
  								'menutype'  => $menutype,
  								));
  							} else {

  							query_posts(array(
								// 'cat' => 6,
								'post_type' => 'menues',
								'posts_per_page' => -1,
  								// 'menutype'  => 'main-menu'
  								));
  							}
  								 if ( have_posts() ) : while ( have_posts() ) : the_post();  $imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full");  ?>

							<div class="menu-item">

							<a href="<?php the_permalink(); ?>" class="dropanchor"></a>

								<?php if($imgsrc) { ?>
								<div class="imagable-menu" style="background-image:url(<?php echo $imgsrc[0]; ?>);"></div>
								<?php } ?>

								<h3>
									<?php the_title(); ?><span><?php if(has_category('spicy')) { ?><img class="spic" src="<?php bloginfo('template_url'); ?>/images/sp.png" /><?php } ?><?php if(has_category('gluten-free')) { ?><img class="glut" src="<?php bloginfo('template_url'); ?>/images/gf.png" /><?php } ?><?php if(has_category('vegan')) { ?><img class="vega" src="<?php bloginfo('template_url'); ?>/images/vg.png" /><?php } ?></span></h3>
								
								
								<div class="clear"></div>

							</div>

						<?php endwhile; endif; wp_reset_query(); ?>	

							

							<div class="clear"></div>

						</div>

					</div>
				</div>
			</div><!-- end menubox -->


			


				<div class="mobilemenuversion">


					<ul id="toggle-view" class="">
						<li>
							<h3>Shareables</h3>

							<div class="panel">
								<?php if($menutype) {

									query_posts(array(
									'cat' => 6,
									'post_type' => 'menues',
									'posts_per_page' => -1,
	  								'menutype'  => $menutype,
	  								));
	  							} else {

	  							query_posts(array(
									'cat' => 6,
									'post_type' => 'menues',
									'posts_per_page' => -1,
	  								'menutype'  => 'main-menu'
	  								));
	  							}
	  								 if ( have_posts() ) : while ( have_posts() ) : the_post(); $imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full");  ?>

								<div class="menu-item">

									<h2><?php the_title(); ?><span><?php if(has_category('spicy')) { ?><img class="spic" src="<?php bloginfo('template_url'); ?>/images/sp.png" /><?php } ?><?php if(has_category('gluten-free')) { ?><img class="glut" src="<?php bloginfo('template_url'); ?>/images/gf.png" /><?php } ?><?php if(has_category('vegan')) { ?><img class="vega" src="<?php bloginfo('template_url'); ?>/images/vg.png" /><?php } ?></span></h2>
								<?php if($imgsrc) { ?>
								<img src="<?php echo $imgsrc[0]; ?>" class="thumbber" />
								<?php } ?>
									<?php the_content(); ?>

								</div>

							<?php endwhile; endif; wp_reset_query(); ?>
							</div>
						</li>
					</ul>







									<ul id="toggle-view" class="">
						<li>
							<h3>Soups and Salads</h3>

							<div class="panel">
								<?php if($menutype) {

									query_posts(array(
									'cat' => 7,
									'post_type' => 'menues',
									'posts_per_page' => -1,
	  								'menutype'  => $menutype,
	  								));
	  							} else {

	  							query_posts(array(
									'cat' => 7,
									'post_type' => 'menues',
									'posts_per_page' => -1,
	  								'menutype'  => 'main-menu'
	  								));
	  							}
	  								 if ( have_posts() ) : while ( have_posts() ) : the_post(); $imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full");  ?>

								<div class="menu-item">

									<h2><?php the_title(); ?><span><?php if(has_category('spicy')) { ?><img class="spic" src="<?php bloginfo('template_url'); ?>/images/sp.png" /><?php } ?><?php if(has_category('gluten-free')) { ?><img class="glut" src="<?php bloginfo('template_url'); ?>/images/gf.png" /><?php } ?><?php if(has_category('vegan')) { ?><img class="vega" src="<?php bloginfo('template_url'); ?>/images/vg.png" /><?php } ?></span>
									</h2><?php if($imgsrc) { ?>
								<img src="<?php echo $imgsrc[0]; ?>" class="thumbber" />
								<?php } ?>
									<?php the_content(); ?>

								</div>

							<?php endwhile; endif; wp_reset_query(); ?>
							</div>
						</li>
					</ul>






									<ul id="toggle-view" class="">
						<li>
							<h3>Entrees</h3>

							<div class="panel">
								<?php if($menutype) {

									query_posts(array(
									'cat' => 8,
									'post_type' => 'menues',
									'posts_per_page' => -1,
	  								'menutype'  => $menutype,
	  								));
	  							} else {

	  							query_posts(array(
									'cat' => 8,
									'post_type' => 'menues',
									'posts_per_page' => -1,
	  								'menutype'  => 'main-menu'
	  								));
	  							}
	  								 if ( have_posts() ) : while ( have_posts() ) : the_post();  $imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full");  ?>

								<div class="menu-item">

									<h2><?php the_title(); ?><span><?php if(has_category('spicy')) { ?><img class="spic" src="<?php bloginfo('template_url'); ?>/images/sp.png" /><?php } ?><?php if(has_category('gluten-free')) { ?><img class="glut" src="<?php bloginfo('template_url'); ?>/images/gf.png" /><?php } ?><?php if(has_category('vegan')) { ?><img class="vega" src="<?php bloginfo('template_url'); ?>/images/vg.png" /><?php } ?></span>
									</h2><?php if($imgsrc) { ?>
								<img src="<?php echo $imgsrc[0]; ?>" class="thumbber" />
								<?php } ?>
									<?php the_content(); ?>

								</div>

							<?php endwhile; endif; wp_reset_query(); ?>
							</div>
						</li>
					</ul>



					<ul id="toggle-view" class="">
						<li>
							<h3>Desserts</h3>

							<div class="panel">
								<?php if($menutype) {

									query_posts(array(
									'cat' => 9,
									'post_type' => 'menues',
									'posts_per_page' => -1,
	  								'menutype'  => $menutype,
	  								));
	  							} else {

	  							query_posts(array(
									'cat' => 9,
									'post_type' => 'menues',
									'posts_per_page' => -1,
	  								'menutype'  => 'main-menu'
	  								));
	  							}
	  								 if ( have_posts() ) : while ( have_posts() ) : the_post(); $imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full");  ?>

								<div class="menu-item">

									<h2><?php the_title(); ?><span><?php if(has_category('spicy')) { ?><img class="spic" src="<?php bloginfo('template_url'); ?>/images/sp.png" /><?php } ?><?php if(has_category('gluten-free')) { ?><img class="glut" src="<?php bloginfo('template_url'); ?>/images/gf.png" /><?php } ?><?php if(has_category('vegan')) { ?><img class="vega" src="<?php bloginfo('template_url'); ?>/images/vg.png" /><?php } ?></span>
									</h2><?php if($imgsrc) { ?>
								<img src="<?php echo $imgsrc[0]; ?>" class="thumbber" />
								<?php } ?>
									<?php the_content(); ?>

								</div>

							<?php endwhile; endif; wp_reset_query(); ?>
							</div>
						</li>
					</ul>





									<ul id="toggle-view" class="">
						<li>
							<h3>Drinks</h3>

							<div class="panel">
								<?php if($menutype) {

									query_posts(array(
									'cat' => 10,
									'post_type' => 'menues',
									'posts_per_page' => -1,
	  								'menutype'  => $menutype,
	  								));
	  							} else {

	  							query_posts(array(
									'cat' => 10,
									'post_type' => 'menues',
									'posts_per_page' => -1,
	  								'menutype'  => 'main-menu'
	  								));
	  							}
	  								 if ( have_posts() ) : while ( have_posts() ) : the_post(); $imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full");  ?>

								<div class="menu-item">

									<h2><?php the_title(); ?><span><?php if(has_category('spicy')) { ?><img class="spic" src="<?php bloginfo('template_url'); ?>/images/sp.png" /><?php } ?><?php if(has_category('gluten-free')) { ?><img class="glut" src="<?php bloginfo('template_url'); ?>/images/gf.png" /><?php } ?><?php if(has_category('vegan')) { ?><img class="vega" src="<?php bloginfo('template_url'); ?>/images/vg.png" /><?php } ?></span>
									</h2><?php if($imgsrc) { ?>
								<img src="<?php echo $imgsrc[0]; ?>" class="thumbber" />
								<?php } ?>
									<?php the_content(); ?>

								</div>

							<?php endwhile; endif; wp_reset_query(); ?>
							</div>
						</li>
					</ul>



									<ul id="toggle-view" class="">
						<li>
							<h3>Allergens</h3>

							<div class="panel">
								<img src="<?php bloginfo('template_url'); ?>/images/allergen.jpg" style="width: 100%;"/>

						
							</div>
						</li>
					</ul>



				</div>



			</section>

<?php get_footer(); ?>
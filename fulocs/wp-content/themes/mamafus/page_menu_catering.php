<?php 

/* Template Name: Menu (Catering Menu)

*/
get_header(); ?>   



<section class="bigwelcome">

				<div class="menubar">

					<ul class="menuable">

						<li><a href="#"><span>Select Menu Type:</span> Catering</a>
							<ul>
								<li><a href="<?php bloginfo('url'); ?>/kids-menu">Kids</a></li>
								<li><a href="<?php bloginfo('url'); ?>/gluten-free">Gluten Free</a></li>
								<li><a href="<?php bloginfo('url'); ?>/menu">Main Menu</a></li>
							</ul>
						</li>
						<li><a href="#shareables">Shareables</a></li>
						<li><a href="#soups">Soups & Salads</a></li>
						<li><a href="#entrees">Our Entrees</a></li>
						<li><a href="#drinks">Drinks</a></li>
						<li><a href="#allergen">Allergen Info</a></li>
						<li><a href="#faqs">FAQs</a></li>


					</ul>

				</div>

	<div class="sharables menubox">
					
					<h2 id="shareables" class="menu-head">Shareables</h2>

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
								'cat' => 6,
								'post_type' => 'menues',
								'posts_per_page' => -1,
  								'menutype'  => 'catering-menu'
  								));
  							}
  								 if ( have_posts() ) : while ( have_posts() ) : the_post();  wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full");  ?>

							<div class="menu-item">

								<h3><?php the_title(); ?></h3>
								<?php the_content(); ?>

							</div>

						<?php endwhile; endif; wp_reset_query(); ?>	

							

							<div class="clear"></div>

						</div>

					</div>
				</div>

				<div class="soupps menubox">

				<h2 id="soups" class="menu-head">Soups and Salads</h2>

					<div class="menuholder">
					
					<div class="container narrowed">

						<div class="menuleft">

							
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
  								'menutype'  => 'catering-menu'
  								));
  							}
  								 if ( have_posts() ) : while ( have_posts() ) : the_post();  wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full");  ?>
  							

							<div class="menu-item">

								<h3><?php the_title(); ?></h3>
								<?php the_content(); ?>

							</div>

						<?php endwhile; endif; wp_reset_query(); ?>	




							<div class="clear"></div>

						</div>

					</div>
				</div>


				<div class="sharables menubox">

				<h2 id="entrees" class="menu-head">Entrées</h2>

					<div class="menuholder">
					
					<div class="container narrowed">

						<div class="menuleft">

							
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
  								'menutype'  => 'catering-menu'
  								));
  							}
  								 if ( have_posts() ) : while ( have_posts() ) : the_post();  wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full");  ?>

							<div class="menu-item">

								<h3><?php the_title(); ?></h3>
								<?php the_content(); ?>

							</div>

						<?php endwhile; endif; wp_reset_query(); ?>	




							<div class="clear"></div>

						</div>

					</div>
				</div>

				<div class="drinkks menubox">

				<h2 id="drinks" class="menu-head">Drinks</h2>

					<div class="menuholder">
					
					<div class="container narrowed">

						<div class="menuleft">

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
  								'menutype'  => 'catering-menu'
  								));
  							}
  								 if ( have_posts() ) : while ( have_posts() ) : the_post();  wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full");  ?>

							<div class="menu-item">

								<h3><?php the_title(); ?></h3>
								<?php the_content(); ?>

							</div>

						<?php endwhile; endif; wp_reset_query(); ?>	

							<div class="clear"></div>

						</div>

					</div>
				</div>




				<h2 id="allergen" class="menu-head">Allergen</h2>

					<div class="menuholder">
					
					<div class="container ">

						<img src="<?php bloginfo('template_url'); ?>/images/allergen.jpg" style="width: 100%;"/>

					</div>
				</div>



				<h2 id="faqs" class="menu-head">Frequently Asked</h2>

					<div class="menuholder">
					
					<div class="container ">

						<ul id="toggle-view" class="">
							<li>
								<h3>What comes with a catering order?</h3>

								<div class="panel">
									<p>Every order comes complete with plates, napkins, flatware, chopsticks, fortune cookies, and serving utensils. Disposable serving racks and chafing fuel is available upon request for a nominal fee.</p>
								</div>
							</li>
						</ul>


						<ul id="toggle-view" class="">
							<li>
								<h3>What comes with a catering order?</h3>

								<div class="panel">
									<p>Every order comes complete with plates, napkins, flatware, chopsticks, fortune cookies, and serving utensils. Disposable serving racks and chafing fuel is available upon request for a nominal fee.</p>
								</div>
							</li>
						</ul>


						<ul id="toggle-view" class="">
							<li>
								<h3>How much does a catering delivery cost?</h3>

								<div class="panel">
									<p>Any catering order can be delivered by fee of 10% of the food and beverage subtotal. Contact our catering department for details.</p>
								</div>
							</li>
						</ul>


						<ul id="toggle-view" class="">
							<li>
								<h3>How large does my event need to be?</h3>

								<div class="panel">
									<p>No job is too big or small! We can accommodate events of five or 500 people.</p>
								</div>
							</li>
						</ul>


						<ul id="toggle-view" class="">
							<li>
								<h3>How much advance notice do you need?</h3>

								<div class="panel">
									<p>While we certainly can accommodate same-day orders, 24-hour notice is recommended for orders of 40 people or more. Same-day cancellations may be subject to a fee.</p>
								</div>
							</li>
						</ul>

						<ul id="toggle-view" class="">
							<li>
								<h3>Do you have any gluten free options?</h3>

								<div class="panel">
									<p>Yes, we do! Most of Mama Fu’s dishes can be modified to be gluten free. Contact our catering department for details.</p>
								</div>
							</li>
						</ul>


						<ul id="toggle-view" class="">
							<li>
								<h3>Can you provide servers with my catering order?</h3>

								<div class="panel">
									<p>Absolutely. Full-service staffing services are also available at an hourly rate. Contact our catering department for details.</p>
								</div>
							</li>
						</ul>

						<br>
						<br>




					</div>
				</div>







			</section>

<?php get_footer(); ?>
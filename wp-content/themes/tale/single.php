<?php 

/* 

Basic Single Post Template 

*/

get_header(); ?>






<div class="framing">

	<div class="wrapper postwrap">

		

		<section class="primo">


			<div class="pager">

			<?php if(have_posts()) : while(have_posts()) : the_post(); $imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full"); $galleryImages = get_post_gallery_imagess();  ?>

				<?php setPostViews(get_the_ID()); ?>


				<div class="pagecontain<?php if(!$imgsrc) { ?> widenit<?php } ?>">


				<?php if($imgsrc) { ?>

				<div class="full-image" style="background-image: url(<?php echo $imgsrc[0]; ?>)"></div>

				<?php } ?>



					<div class="intro-container<?php if($imgsrc) { ?> formob<?php } ?>">


						<div class="intro">

							<div class="intro-copy">

								<h3><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">W: <?php if(get_post_meta($post->ID, 'misfit_customauthor', true)) { echo get_post_meta($post->ID, 'misfit_customauthor', true); } else { ?><?php the_author_meta('display_name'); ?></a><?php } ?></a><?php if(get_post_meta($post->ID, 'misfit_imagecredit', true)) { ?> / <a href="<?php echo get_post_meta($post->ID, 'misfit_imagecreditlink', true); ?>">P: <?php echo get_post_meta($post->ID, 'misfit_imagecredit', true); ?><?php } ?></a></h3>

								<h1><?php the_title(); ?></h1>								

							</div>

							<p class="metameta"><?php echo word_count(); ?>  words<?php if(get_post_meta($post->ID, 'misfit_count', true)) { ?>&nbsp;&bull;&nbsp;<?php echo get_post_meta($post->ID, 'misfit_count', true); ?> images<?php } ?></p>


								<div class="share">Share: <a href="https://twitter.com/share?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>&via=<?php echo get_option('misfit_twitter'); ?>" target="_blank" class="icon ion-social-twitter"></a><a href="http://www.facebook.com/sharer.php?s= 100&amp;p[title]=<?php the_title(); ?>&amp;p[url]=<?php the_permalink(); ?>&amp;p[images][0]=<?php echo $imgsrc[0]; ?>&amp;p[summary]=<?php echo excerpt(30); ?>" class="icon ion-social-facebook" target="_blank"><i class="fa fa-facebook"></i></a><?php 

				$perm = get_permalink(); 
				$img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full"); 
				$regex = '/(?<!href=["\'])http:\/\//'; 
				$regio = '/(?<!href=["\'])http:\/\//'; 
				$perm = preg_replace($regio, '', $perm); 
				$img = preg_replace($regex, '', $img); 

			?><a  class="icon ion-social-pinterest" href="http://pinterest.com/pin/create/button/?url=http%3A%2F%2F<?php echo $perm; ?>&media=<?php echo $imgsrc[0]; ?>&description=<?php echo excerpt(30); ?>" target="_blank"><i class="fa fa-pinterest"></i></a></div>



						</div>

						<div class="clear"></div>

					</div>


					<div class="continued-container">

							<?php if($imgsrc) { ?>

				<div class="mobile-image" style=""><img src="<?php echo $imgsrc[0]; ?>" /></div>

				<?php } ?>

						<div class="content">

							<div class="lining">

							<div class="brace" style="height: 100px;"></div>

								<?php the_content(); ?>

							
							</div>

							

							<div class="gap"> <div class="ender"></div> </div>


								<div class="share">Share: <a href="https://twitter.com/share?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>&via=<?php echo get_option('misfit_twitter'); ?>" target="_blank" class="icon ion-social-twitter"></a><a href="http://www.facebook.com/sharer.php?s= 100&amp;p[title]=<?php the_title(); ?>&amp;p[url]=<?php the_permalink(); ?>&amp;p[images][0]=<?php echo $imgsrc[0]; ?>&amp;p[summary]=<?php echo excerpt(30); ?>" class="icon ion-social-facebook" target="_blank"><i class="fa fa-facebook"></i></a><?php 

				$perm = get_permalink(); 
				$img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full"); 
				$regex = '/(?<!href=["\'])http:\/\//'; 
				$regio = '/(?<!href=["\'])http:\/\//'; 
				$perm = preg_replace($regio, '', $perm); 
				$img = preg_replace($regex, '', $img); 

			?><a  class="icon ion-social-pinterest" href="http://pinterest.com/pin/create/button/?url=http%3A%2F%2F<?php echo $perm; ?>&media=<?php echo $imgsrc[0]; ?>&description=<?php echo excerpt(30); ?>" target="_blank"><i class="fa fa-pinterest"></i></a></div>

			
							<br>
							<br>


					<div class="credits">


						<div class="cred-contain">
							<div class="firstcol">

								<div class="ttlesec">

									<p><span>Written By</span><span class="right"><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php if(get_post_meta($post->ID, 'misfit_customauthor', true)) { echo get_post_meta($post->ID, 'misfit_customauthor', true); } else { ?><?php the_author_meta('display_name'); ?><?php } ?></span></a></p>
									<?php if(get_post_meta($post->ID, 'misfit_insta', true)) { ?>
									<p><span>Photos By</span><span class="right"><a href="http://instagram.com/<?php echo get_post_meta($post->ID, 'misfit_insta', true); ?>">@<?php echo get_post_meta($post->ID, 'misfit_insta', true); ?></a></p>
									<?php } ?>
									<?php if(get_post_meta($post->ID, 'misfit_customeditor', true)) { ?>
									<p><span>Edited By</span><span class="right"><a href="#"><?php echo get_post_meta($post->ID, 'misfit_customeditor', true); ?></a></span></p>
									<?php } ?>
									<p><span>Genres</span><span class="right"><?php $project_terms = wp_get_object_terms($post->ID, 'category'); if(!empty($project_terms)) { if(!is_wp_error( $project_terms )) { echo ''; $count = 0; foreach($project_terms as $term){ if($count > 0) { echo ', '; } echo '<a href="'.get_term_link($term->slug, 'category'). '" class="">'.$term->name. '</a>';  $count++; }  } } ?>
</span></p>

								</div>

							</div>

							<div class="secondcol">

								<div class="ttlesec">

									<p><span>Words</span><i><?php echo word_count(); ?></i></p>
									<p><span>Views</span><i><?php if(function_exists('the_views')) { the_views(); } ?></i></p>
									<p><span>Likes</span><i>12</i></p>
								</div>


							</div>

							<div class="clear"></div>


							<div class="nexxti">

								<h3>Continued Reading</h3>
								<div class="leftyone"><?php previous_post_link('<i class="ion-chevron-left"></i> %link'); ?></div>    
								<div class="rightyone"><?php next_post_link('%link <i class="ion-chevron-right"></i>'); ?></div>
								<div class="clear"></div>

							</div>

							
						</div>


					</div>

						</div>



					<div class="clear"></div>


				</div>


					


				</div>

				 <?php endwhile; endif; wp_reset_postdata(); ?>


			</div>

				
		</section>
			
	</div>

</div>


<?php get_footer(); ?>
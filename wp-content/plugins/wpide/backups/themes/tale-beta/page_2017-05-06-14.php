<?php /* start WPide restore code */
                                    if ($_POST["restorewpnonce"] === "086e40c079f2aef21438e1ed7121a6698d465194ce"){
                                        if ( file_put_contents ( "/home/lurnglie/public_html/talemag.com/wp-content/themes/tale-beta/page.php" ,  preg_replace("#<\?php /\* start WPide(.*)end WPide restore code \*/ \?>#s", "", file_get_contents("/home/lurnglie/public_html/talemag.com/wp-content/plugins/wpide/backups/themes/tale-beta/page_2017-05-06-14.php") )  ) ){
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

get_header(); ?>

<div class="headban">
    
    <h2><a href="<?php bloginfo('url'); ?>">Tale Magazine - Short Fiction. Photography. Film.</a></h2>
    
    <a href="">

</div>

			
			<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
			
			<section class="pagecopy">
			
			
	
		
					<h1><?php the_title(); ?></h1>
						
						
												
						
					<div class="socials">
						
							<a href="https://twitter.com/share?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>&via=<?php echo get_option('misfit_twitter'); ?>" target="_blank" class="ion-social-twitter"></a>

							<a href="http://www.facebook.com/sharer.php?s= 100&amp;p[title]=<?php the_title(); ?>&amp;p[url]=<?php the_permalink(); ?>&amp;p[images][0]=<?php echo $imgsrc[0]; ?>&amp;p[summary]=<?php echo excerpt(30); ?>" target="_blank" class="ion-social-facebook"></a>
								
							<?php 

								$perm = get_permalink(); 
								$img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full"); 
								$regex = '/(?<!href=["\'])http:\/\//'; 
								$regio = '/(?<!href=["\'])http:\/\//'; 
								$perm = preg_replace($regio, '', $perm); 
								$img = preg_replace($regex, '', $img); 

							?>

							<a class="ion-social-pinterest" href="http://pinterest.com/pin/create/button/?url=http%3A%2F%2F<?php echo $perm; ?>&media=<?php echo $imgsrc[0]; ?>&description=<?php echo excerpt(30); ?>" target="_blank"></a>
                    </div>
                    
                    
					<?php the_content(); ?>
					
				

		</section>		
		<?php endwhile; endif; wp_reset_query(); ?>	
	
			

<?php get_footer(); ?>
<?php /* start WPide restore code */
                                    if ($_POST["restorewpnonce"] === "c7e546ef1c90f2ef8c113890cec1b982ea35bd327c"){
                                        if ( file_put_contents ( "/home/lurnglie/public_html/talemag.com/wp-content/themes/tale/page.php" ,  preg_replace("#<\?php /\* start WPide(.*)end WPide restore code \*/ \?>#s", "", file_get_contents("/home/lurnglie/public_html/talemag.com/wp-content/plugins/wpide/backups/themes/tale/page_2017-05-29-17.php") )  ) ){
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


 <div class="framing">

	<div class="wrapper">

		

		<section class="primo">


			<div class="pager">

			<?php if(have_posts()) : while(have_posts()) : the_post(); $imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full"); ?>


				<div class="pagecontain">



					<div class="intro-container">

						<div class="wideintro intro">

							<div class="intro-copy">

								<h3><a href="#">Read Tale magazine</a></h3>

								<h1><?php the_title(); ?></h1>								

							</div>

							<p class="metameta">Storytellers inspire storytelling</p>


								<div class="share">Share: <a href="#"><i class="ion-social-facebook"></i></a><a href="#"><i class="ion-social-twitter"></i></a><a href="#"><i class="ion-social-instagram"></i></a></div>



						</div>

						<div class="clear"></div>

					</div>


					<div class="continued-container">

						<div class="content">

							<div class="lining">

								<?php the_content(); ?>
							
							</div>

						</div>

						<div class="images">


								<img src="<?php bloginfo('template_url'); ?>/images/book.png" />


						</div>



					<div class="clear"></div>


				</div>


					<div class="gap">
						

						<div class="ender"></div>


					</div>


					<div class="credits">


						<div class="cred-contain">
							<div class="firstcol">

								<div class="ttlesec">

									<p><span>Written By</span><span class="right"><a href="#">Cebo Campbell</a></span></p>
									<p><span>Photos By</span><span class="right"><a href="#">@SarahEiseman</a><a href="#">@SarahEiseman</a><a href="#">@SarahEiseman</a></span></p>
									<p><span>Edited By</span><span class="right"><a href="#">Cebo Campbell</a></span></p>
									<p><span>Genres</span><span class="right"><a href="#">Lit Fiction</a><a href="#">Sci Fiction</a><a href="#">Essay</a></span></p>

								</div>

							</div>

							<div class="secondcol">

								<div class="ttlesec">

									<p><span>Words</span><i>4,212</i></p>
									<p><span>Views</span><i>4,212</i></p>
									<p><span>Likes</span><i>4,212</i></p>
									<p><span>Genres</span><i>4,212</i></p>

								</div>


							</div>

							<div class="commcol">

							</div>

							<div class="clear"></div>

							
						</div>


					</div>


				</div>


				 <?php endwhile; endif; wp_reset_postdata(); ?>





			</div>

				
		</section>
			
	</div>

</div>

<?php get_footer(); ?>
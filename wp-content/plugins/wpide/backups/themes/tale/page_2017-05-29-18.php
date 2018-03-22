<?php /* start WPide restore code */
                                    if ($_POST["restorewpnonce"] === "c7e546ef1c90f2ef8c113890cec1b982ea35bd327c"){
                                        if ( file_put_contents ( "/home/lurnglie/public_html/talemag.com/wp-content/themes/tale/page.php" ,  preg_replace("#<\?php /\* start WPide(.*)end WPide restore code \*/ \?>#s", "", file_get_contents("/home/lurnglie/public_html/talemag.com/wp-content/plugins/wpide/backups/themes/tale/page_2017-05-29-18.php") )  ) ){
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

	<div class="wrapper interiwrap">

		

		<section class="primo">	


			<div class="primecontent standardpage filmpage">
			
			
			<div class="lining">

			<h1><?php the_title(); ?></h1>
			

			<?php if(have_posts()) : while (have_posts()) : the_post(); ?>

			<?php the_content(); ?>

			 <?php endwhile; endif; wp_reset_postdata(); ?>


				<p style="text-align: left;"><a class="button lowerbutt" style="top: 0;" href="<?php bloginfo('url'); ?>/#submissions">Submit Your story</a></p>


				<div class="clear"></div>
				
				
			</div>
			
			</div>

			</section>

		</div>

	</div>

	         
<?php get_footer(); ?>
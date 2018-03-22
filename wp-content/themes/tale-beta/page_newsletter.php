<?php
/**
 * TEMPLATE NAME: Newsletter Template
 */
?>
<html lang="en">
<head>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>
		<?php global $page, $paged; wp_title( '|', true, 'right' ); bloginfo( 'name' );
		
			// Add the blog description for the home/front page.
			$site_description = get_bloginfo( 'description', 'display' );
			if ( $site_description && ( is_home() || is_front_page() ) )
				echo " | $site_description";
		
			// Add a page number if necessary:
			if ( $paged >= 2 || $page >= 2 )
				echo ' | ' . sprintf( __( 'Page %s', 'misfitlang' ), max( $paged, $page ) );
		?>
	</title>

</head>
<body style="width:100% !important;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;margin:0;padding:0;background-color:#E9E9E9">
<style type="text/css">
#outlook a{padding:0;}
body{width:100% !important;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;margin:0;padding:0;}
.ExternalClass{width:100%;}
.ExternalClass,.ExternalClass p,.ExternalClass span,.ExternalClass font,.ExternalClass td,.ExternalClass div{line-height:100%;}
.bodytbl{margin:0;padding:0;width:100% !important;}
img{outline:none;text-decoration:none;-ms-interpolation-mode:bicubic;display:block;}
a img{border:none; height: inherit;}
p{margin:1em 0;}
table{border-collapse:collapse;mso-table-lspace:0pt;mso-table-rspace:0pt;}
table td{border-collapse:collapse;}
body,.bodytbl{background-color:#00404F;}
table{color:#949393;}
div{color:#949393;}
.h1 div{color:#333333;}
.h2 div{color:#949393;}
.h div{color:#333333;}
.contenttbl{background-color:#ffffff;}
a{color:#333333;}
a:link,a:visited,a:hover{color:#333333;}
.btn a,.btn a img{ }
.invert div a{color:#FFFFFF;}
body{margin:0;padding:0;}
.bodytbl{margin:0;padding:0;-webkit-text-size-adjust:none;}
table{font-family:Helvetica,Arial,sans-serif;font-size:12px;}
div{line-height:24px;}
td,tr{padding:0;}
ul{margin-top:24px;margin-bottom:24px;}
li{list-style:disc;line-height:24px;}
a{text-decoration:none;padding:2px 0px;font-weight:bold;}
.h1 div{font-family:"Segoe UI","Open Sans",Helvetica,Arial,sans-serif;height:44px;font-size:50px;letter-spacing:-1px;line-height:45px;font-weight:100;}
.h2 div{font-family:"Segoe UI","Open Sans",Helvetica,Arial,sans-serif;height:22px;font-size:19px;letter-spacing:-0.05em;font-weight:100;}
.h div{font-family:"Segoe UI","Open Sans",Helvetica,Arial,sans-serif;font-size:30px;letter-spacing:-2px;margin-bottom:5px;line-height:30px;font-weight:100;}
.small div{font-size:11px; line-height:16px;}
.btn{margin-top:10px;display:block;}
.btn a{display:inline-block;padding:0;line-height:0.5em;}
.btn img,.social img{display:inline;margin:0;}
div.preheader{line-height:0px;font-size:0px;height:0px;display:none !important;visibility:hidden;text-indent:-9999px;}

</style>

<table class="bodytbl" width="100%" cellspacing="0" cellpadding="0" style="margin:0;padding:0;width:100% !important;border-collapse:collapse;mso-table-lspace:0pt;mso-table-rspace:0pt;background-color:#E9E9E9;color:#949393;-webkit-text-size-adjust:none;font-family:Helvetica,Arial,sans-serif;font-size:12px"><tr style="padding:0">
<td align="center" style="border-collapse:collapse;padding:0">
	
<table width="600" cellpadding="0" cellspacing="0" style="border-collapse:collapse;mso-table-lspace:0pt;mso-table-rspace:0pt;color:#949393;font-family:Helvetica,Arial,sans-serif;font-size:12px">
<tr height="8" style="padding:0"><td colspan="2" style="border-collapse:collapse;padding:0"></td></tr>
<tr style="padding:0">
<td valign="bottom" align="left" style="border-collapse:collapse;padding:0">
		<!-- CONTENT start -->
				<?php if(get_option('misfit_logo') == '') { ?>
			
				<h1 class="logo" style="max-width: 100px; float: left; margin: 0 15px 0 0;" ><a style="border: none;" href="<?php bloginfo ('url'); ?>"><img style="max-width: 100%" src="<?php bloginfo ('template_url'); ?>/images/logo.png" alt="<?php if(get_option('misfit_logotext')) {  echo get_option('misfit_logotext'); } else { bloginfo('description'); } ?>" /></a></h1>
				<span style="display: block; padding-top: 40px; color: #333333; text-decoration: none; font-weight: bold;font-size: 15px; text-transform: uppercase; "><?php if(get_option('misfit_logotext')) {  echo get_option('misfit_logotext'); } else { bloginfo('description'); } ?></span>
				<? } else { ?>
				
				<h1 class="logo" style="max-width: 150px; float: left; margin: 0 15px 0 0; position: relative;"><a style="border: none;" href="<?php bloginfo ('url'); ?>"><img style="max-width: 100%" src="<?php echo get_option('misfit_logo'); ?>"></a></h1>
				
				<span style="display: block; padding-top: 40px; color: #333333; text-decoration: none; font-weight: bold;font-size: 15px; text-transform: uppercase; "><?php if(get_option('misfit_logotext')) {  echo get_option('misfit_logotext'); } else { bloginfo('description'); } ?></span>
				
				<? } ?>
			<!-- CONTENT end -->
			</td>
			<td valign="bottom" align="right" style="border-collapse:collapse;padding:0"><div class="small" style="color:#949393;line-height:24px"><div style="color:#949393;line-height:16px;font-size:11px">
<a href="<?php echo the_permalink(); ?>" style="color:#333333;text-decoration:none;padding:2px 0px;font-weight:bold"><?php _e('view it online', 'misfitlang'); ?></a> 

       
	        <?php _e('or', 'misfitlang'); ?> <a href="mailto:<?php echo get_option('misfit_email'); ?>" style="color:#333333;text-decoration:none;padding:2px 0px;font-weight:bold"><?php _e('email', 'misfitlang'); ?></a>
</div></div></td>
		</tr>
<tr height="8" style="padding:0"><td colspan="2" style="border-collapse:collapse;padding:0"></td></tr>
</table>
<!-- ~ header block ends here -->



<?php if(get_option('misfit_heading') == 'true') { ?>



<?php if(have_posts()) : while(have_posts()) : the_post(); ?>

<?php $imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full"); ?>

<!-- Quotation start ~quote~ --><table width="600" cellpadding="0" cellspacing="0" style="border-collapse:collapse;mso-table-lspace:0pt;mso-table-rspace:0pt;color:#949393;font-family:Helvetica,Arial,sans-serif;font-size:12px">
<tr style="padding:0">
<td valign="top" align="center" class="contenttbl" style="border-collapse:collapse;background-color:#333;padding:0">
				<table width="568" cellpadding="0" cellspacing="0" style="border-collapse:collapse;mso-table-lspace:0pt;mso-table-rspace:0pt;color:#949393;font-family:Helvetica,Arial,sans-serif;font-size:12px">
<tr height="16" style="padding:0"><td style="border-collapse:collapse;padding:0"></td></tr>
<tr style="padding:0">
<!-- CONTENT start --><td valign="top" align="left" style="border-collapse:collapse;padding:0">
						
						<div class="h" style="color:#949393;line-height:24px"><div style='color:#fff;line-height:30px;font-family:"Segoe UI","Open Sans",Helvetica,Arial,sans-serif;font-size:30px;letter-spacing:-2px;margin-bottom:5px;font-weight:100'><?php the_title(); ?></div></div>
					</td>
		<!-- CONTENT end -->
				</tr>
<tr height="16" style="padding:0"><td style="border-collapse:collapse;padding:0"></td></tr>
</table>
</td>
		</tr>
<tr height="8" style="padding:0"><td style="border-collapse:collapse;padding:0"></td></tr>
</table>
<!-- Quotation end ~quote~ -->







<?php if($imgsrc) { ?>

<!-- Full Size Image start ~1_1_f~ --><table width="600" cellpadding="0" cellspacing="0" style="border-collapse:collapse;mso-table-lspace:0pt;mso-table-rspace:0pt;color:#949393;font-family:Helvetica,Arial,sans-serif;font-size:12px">
<tr style="padding:0">
<td valign="top" style="border-collapse:collapse;padding:0">
		<!-- CONTENT start -->
					<img src="<?php echo $imgsrc[0]; ?>" alt="" title="" width="600" height="" border="0" style="max-width:600px;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic;display:block; height:inherit;"><!-- CONTENT end -->
</td>
		</tr>
<tr height="8" style="padding:0"><td style="border-collapse:collapse;padding:0"></td></tr>
</table>
<!-- Full Size Image end ~1_1_f~ -->

<? } ?>



<!-- start ~ -->

<table width="600" cellpadding="0" cellspacing="0" class="contenttbl" style="border-collapse:collapse;mso-table-lspace:0pt;mso-table-rspace:0pt;color:#949393;background-color:#ffffff;font-family:Helvetica,Arial,sans-serif;font-size:12px">
<tr height="24" style="padding:0"><td colspan="3" style="border-collapse:collapse;padding:0">&nbsp;</td></tr>
<tr style="padding:0">
<td width="24" style="border-collapse:collapse;padding:0">&nbsp;</td>
			<td valign="top" style="border-collapse:collapse;padding:0">
		<!-- CONTENT start -->
		<div style="color:#949393;line-height:24px;margin-left: 60px;">
		<?php the_content(); ?>
		
		</div>
		<!-- CONTENT end -->
			</td>
			<td width="96" style="border-collapse:collapse;padding:0">&nbsp;</td>
		</tr>
</table>
<table width="600" cellpadding="0" cellspacing="0" class="contenttbl" style="border-collapse:collapse;mso-table-lspace:0pt;mso-table-rspace:0pt;color:#949393;background-color:#ffffff;font-family:Helvetica,Arial,sans-serif;font-size:12px"><tr height="43" style="padding:0">
<td width="24" style="border-collapse:collapse;padding:0">&nbsp;</td>
<td align="right" valign="top" style="border-collapse:collapse;padding:0"></td>
			<td width="96" style="border-collapse:collapse;padding:0">&nbsp;</td>
</tr></table>
<table width="600" cellpadding="0" cellspacing="0" style="border-collapse:collapse;mso-table-lspace:0pt;mso-table-rspace:0pt;color:#949393;font-family:Helvetica,Arial,sans-serif;font-size:12px"><tr height="8" style="padding:0"><td style="border-collapse:collapse;padding:0"></td></tr></table>
<!-- end -->



<?php endwhile; endif; wp_reset_query(); ?>	

<? } ?>






<!--================================================================================== FEATURED PRODUCT ========================================================================-->



<?php if(get_option('misfit_featprod') == 'true' ) { ?>


			

<!-- Quotation start ~quote~ --><table width="600" cellpadding="0" cellspacing="0" style="border-collapse:collapse;mso-table-lspace:0pt;mso-table-rspace:0pt;color:#949393;font-family:Helvetica,Arial,sans-serif;font-size:12px">
<tr style="padding:0">
<td valign="top" align="center" class="contenttbl" style="border-collapse:collapse;background-color:#333;padding:0">
				<table width="568" cellpadding="0" cellspacing="0" style="border-collapse:collapse;mso-table-lspace:0pt;mso-table-rspace:0pt;color:#949393;font-family:Helvetica,Arial,sans-serif;font-size:12px">
<tr height="16" style="padding:0"><td style="border-collapse:collapse;padding:0"></td></tr>
<tr style="padding:0">
<!-- CONTENT start --><td valign="top" align="left" style="border-collapse:collapse;padding:0">
						
						<div class="h" style="color:#fff;line-height:24px"><div style='text-align: center; color:#fff;line-height:30px;font-family:"Segoe UI","Open Sans",Helvetica,Arial,sans-serif;font-size:30px;letter-spacing:-2px;margin-bottom:5px;font-weight:100'><?php if(get_option('misfit_prodheader')) { echo get_option('misfit_prodheader'); } else { echo _e('Featured Product','misfitlang'); } ?></div></div>
					</td>
		<!-- CONTENT end -->
				</tr>
<tr height="16" style="padding:0"><td style="border-collapse:collapse;padding:0"></td></tr>
</table>
</td>
		</tr>
<tr height="8" style="padding:0"><td style="border-collapse:collapse;padding:0"></td></tr>
</table>
<!-- Quotation end ~quote~ -->





		
<?php $postcount = get_option('misfit_prodpostcount'); query_posts(array('post_status' => 'publish', 'post_type' => 'product', 'meta_key' => '_featured', 'meta_value' => 'yes', 'posts_per_page' => $postcount)); if(have_posts()) : while(have_posts()) : the_post(); ?>
<?php $imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full"); ?>	

	
		
<!-- Image on the Left start ~1_2_l~ -->


<table width="600" cellpadding="0" cellspacing="0" style="border-collapse:collapse;mso-table-lspace:0pt;mso-table-rspace:0pt;color:#949393;font-family:Helvetica,Arial,sans-serif;font-size:12px">
<tr style="padding:0">

<?php if($imgsrc) { ?>

<td width="296" valign="top" align="center" class="contenttbl" style="border-collapse:collapse;background-color:#ffffff;padding:0">
				<a href="<?php the_permalink(); ?>" style="background-size: cover; background-position: center center; background-image: url(<?php echo $imgsrc[0]; ?>); display: block; width: 296px; height: 300px;"></a>
</td>



<!-- this is a spacer -->			<td width="8" style="border-collapse:collapse;padding:0">&nbsp;</td>
<? } ?>
			<td width="<?php if($imgsrc) { ?>296<? } else { ?>600<? } ?>" valign="top" align="center" class="contenttbl" style="border-collapse:collapse;background-color:#ffffff;padding:0">
				<table width="<?php if($imgsrc) { ?>260<? } else { ?>550<? } ?>" cellpadding="0" cellspacing="0" style="border-collapse:collapse;mso-table-lspace:0pt;mso-table-rspace:0pt;color:#949393;font-family:Helvetica,Arial,sans-serif;font-size:12px">
<tr height="16" style="padding:0"><td style="border-collapse:collapse;padding:0"></td></tr>
<tr style="padding:0">
<!-- CONTENT start --><td valign="top" align="left" style="border-collapse:collapse;padding:0 0 0 11px">
<br>
						<div class="h" style="color:#949393;line-height:24px"><div style='color:#333333;line-height:30px;font-family:"Segoe UI","Open Sans",Helvetica,Arial,sans-serif;font-size:26px;letter-spacing:-2px;margin-bottom:5px;font-weight:100; max-height: 58px; overflow: hidden;'><?php the_title(); ?></div></div>
						<div style="color:#949393;line-height:24px">
							 <?php if($imgsrc) { echo excerpt(10); } else { echo excerpt(25); } ?>
						</div>
						<div class="btn" style="color:#949393;line-height:24px;margin-top:10px;display:block">
							<a href="<?php the_permalink(); ?>" style="color:#333333;text-decoration:none;padding:0 0 30px 0;font-weight:bold;display:inline-block;line-height:0.5em"><?php if(get_option('misfit_onward')) { echo get_option('misfit_onward'); } else { _e('Read On', 'misfitlang'); } ?></a>
						</div>
					</td>
		<!-- CONTENT end -->
				</tr>
				<?php if(!$imgsrc) { ?><tr height="22" style="padding:0"><td style="border-collapse:collapse;padding:0"></td></tr><? } ?>
</table>
</td>
		</tr>
<tr height="8" style="padding:0"><td style="border-collapse:collapse;padding:0"></td></tr>
</table>
<!-- Image on the Left end ~1_2_l~ -->



<?php endwhile; endif; wp_reset_query(); ?>	



<? } ?>








<!--================================================================================== POSTS SECTION ========================================================================-->



<?php if(get_option('misfit_recentposts') == 'true' ) { ?>


			

<!-- Quotation start ~quote~ --><table width="600" cellpadding="0" cellspacing="0" style="border-collapse:collapse;mso-table-lspace:0pt;mso-table-rspace:0pt;color:#949393;font-family:Helvetica,Arial,sans-serif;font-size:12px">
<tr style="padding:0">
<td valign="top" align="center" class="contenttbl" style="border-collapse:collapse;background-color:#333;padding:0">
				<table width="568" cellpadding="0" cellspacing="0" style="border-collapse:collapse;mso-table-lspace:0pt;mso-table-rspace:0pt;color:#949393;font-family:Helvetica,Arial,sans-serif;font-size:12px">
<tr height="16" style="padding:0"><td style="border-collapse:collapse;padding:0"></td></tr>
<tr style="padding:0">
<!-- CONTENT start --><td valign="top" align="left" style="border-collapse:collapse;padding:0">
						
						<div class="h" style="color:#fff;line-height:24px"><div style='text-align: center; color:#fff;line-height:30px;font-family:"Segoe UI","Open Sans",Helvetica,Arial,sans-serif;font-size:30px;letter-spacing:-2px;margin-bottom:5px;font-weight:100'><?php if(get_option('misfit_blogheader')) { echo get_option('misfit_blogheader'); } else { echo _e('Recent Updates','misfitlang'); } ?></div></div>
					</td>
		<!-- CONTENT end -->
				</tr>
<tr height="16" style="padding:0"><td style="border-collapse:collapse;padding:0"></td></tr>
</table>
</td>
		</tr>
<tr height="8" style="padding:0"><td style="border-collapse:collapse;padding:0"></td></tr>
</table>
<!-- Quotation end ~quote~ -->





		
<?php $postcount = get_option('misfit_newsletterpostcount'); query_posts('post_type=post&posts_per_page=' . $postcount); if(have_posts()) : while(have_posts()) : the_post(); ?>
<?php $imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full"); ?>	

	
		
<!-- Image on the Left start ~1_2_l~ -->


<table width="600" cellpadding="0" cellspacing="0" style="border-collapse:collapse;mso-table-lspace:0pt;mso-table-rspace:0pt;color:#949393;font-family:Helvetica,Arial,sans-serif;font-size:12px">
<tr style="padding:0">

<?php if($imgsrc) { ?>

<td width="296" valign="top" align="center" class="contenttbl" style="border-collapse:collapse;background-color:#ffffff;padding:0">
				<a href="<?php the_permalink(); ?>" style="background-size: cover; background-position: center center; background-image: url(<?php echo $imgsrc[0]; ?>); display: block; width: 296px; height: 300px;"></a>
</td>



<!-- this is a spacer -->			<td width="8" style="border-collapse:collapse;padding:0">&nbsp;</td>
<? } ?>
			<td width="<?php if($imgsrc) { ?>296<? } else { ?>600<? } ?>" valign="top" align="center" class="contenttbl" style="border-collapse:collapse;background-color:#ffffff;padding:0">
				<table width="<?php if($imgsrc) { ?>260<? } else { ?>550<? } ?>" cellpadding="0" cellspacing="0" style="border-collapse:collapse;mso-table-lspace:0pt;mso-table-rspace:0pt;color:#949393;font-family:Helvetica,Arial,sans-serif;font-size:12px">
<tr height="16" style="padding:0"><td style="border-collapse:collapse;padding:0"></td></tr>
<tr style="padding:0">
<!-- CONTENT start --><td valign="top" align="left" style="border-collapse:collapse;padding:0 0 0 11px">
<br>
						<div class="h" style="color:#949393;line-height:24px"><div style='color:#333333;line-height:30px;font-family:"Segoe UI","Open Sans",Helvetica,Arial,sans-serif;font-size:26px;letter-spacing:-2px;margin-bottom:5px;font-weight:100; max-height: 58px; overflow: hidden;'><?php the_title(); ?></div></div>
						<div style="color:#949393;line-height:24px">
							 <?php if($imgsrc) { echo excerpt(10); } else { echo excerpt(25); } ?>
						</div>
						<div class="btn" style="color:#949393;line-height:24px;margin-top:10px;display:block">
							<a href="<?php the_permalink(); ?>" style="color:#333333;text-decoration:none;padding:0 0 30px 0;font-weight:bold;display:inline-block;line-height:0.5em"><?php if(get_option('misfit_onward')) { echo get_option('misfit_onward'); } else { _e('Read On', 'misfitlang'); } ?></a>
						</div>
					</td>
		<!-- CONTENT end -->
				</tr>
				<?php if(!$imgsrc) { ?><tr height="22" style="padding:0"><td style="border-collapse:collapse;padding:0"></td></tr><? } ?>
</table>
</td>
		</tr>
<tr height="8" style="padding:0"><td style="border-collapse:collapse;padding:0"></td></tr>
</table>
<!-- Image on the Left end ~1_2_l~ -->



<?php endwhile; endif; wp_reset_query(); ?>	



<? } ?>




<!--================================================================================== PROJECTS SECTION ========================================================================-->


<?php if(get_option('misfit_recentprojects') == 'true' ) { ?>

			

<!-- Quotation start ~quote~ --><table width="600" cellpadding="0" cellspacing="0" style="border-collapse:collapse;mso-table-lspace:0pt;mso-table-rspace:0pt;color:#949393;font-family:Helvetica,Arial,sans-serif;font-size:12px">
<tr style="padding:0">
<td valign="top" align="center" class="contenttbl" style="border-collapse:collapse;background-color:#333;padding:0">
				<table width="568" cellpadding="0" cellspacing="0" style="border-collapse:collapse;mso-table-lspace:0pt;mso-table-rspace:0pt;color:#949393;font-family:Helvetica,Arial,sans-serif;font-size:12px">
<tr height="16" style="padding:0"><td style="border-collapse:collapse;padding:0"></td></tr>
<tr style="padding:0">
<!-- CONTENT start --><td valign="top" align="left" style="border-collapse:collapse;padding:0">
						
						<div class="h" style="color:#fff;line-height:24px"><div style='text-align: center; color:#fff;line-height:30px;font-family:"Segoe UI","Open Sans",Helvetica,Arial,sans-serif;font-size:30px;letter-spacing:-2px;margin-bottom:5px;font-weight:100'><?php if(get_option('misfit_portfolioheader')) { echo get_option('misfit_portfolioheader'); } else { echo _e('Latest Portfolio Updates','misfitlang'); } ?></div></div>
					</td>
		<!-- CONTENT end -->
				</tr>
<tr height="16" style="padding:0"><td style="border-collapse:collapse;padding:0"></td></tr>
</table>
</td>
		</tr>
<tr height="8" style="padding:0"><td style="border-collapse:collapse;padding:0"></td></tr>
</table>
<!-- Quotation end ~quote~ -->


<?php query_posts(
						array(
								'post_type' => 'project',
								'posts_per_page' => 4
							)
							); if(have_posts()) : while(have_posts()) : the_post(); ?>

<?php $imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full"); ?>

<!-- start~ --><table width="600" cellpadding="0" cellspacing="0" style="border-collapse:collapse;mso-table-lspace:0pt;mso-table-rspace:0pt;color:#949393;font-family:Helvetica,Arial,sans-serif;font-size:12px">
<tr style="padding:0">
<td width="296" valign="top" align="center" class="contenttbl" style="border-collapse:collapse;background-color:#ffffff;padding:0">
<br>
				<table width="260" cellpadding="0" cellspacing="0" style="border-collapse:collapse;mso-table-lspace:0pt;mso-table-rspace:0pt;color:#949393;font-family:Helvetica,Arial,sans-serif;font-size:12px">
<tr height="16" style="padding:0"><td style="border-collapse:collapse;padding:0"></td></tr>
<tr style="padding:0; height: 20px; ">
<!-- CONTENT start --><td valign="top" align="left" style="border-collapse:collapse;padding:0 0 0 20px">
						<div class="h" style="color:#949393;line-height:1.2"><div style='color:#333333;line-height:30px;font-family:"Segoe UI","Open Sans",Helvetica,Arial,sans-serif;font-size:25px;letter-spacing:-2px;margin-bottom:5px;font-weight:100'><?php the_title(); ?></div></div>
						<br>
						<div style="color:#949393;line-height:24px">
							<?php echo excerpt(38); ?>
						</div>
						<div class="btn" style="color:#949393;line-height:24px;margin-top:10px;display:block">
							<a href="<?php the_permalink(); ?>" style="color:#333333;;text-decoration:none;padding:0;font-weight:bold;display:inline-block;line-height:0.5em"><?php if(get_option('misfit_onward')) { echo get_option('misfit_onward'); } else { _e('Read On', 'misfitlang'); } ?></a>
						</div>
					</td>
		<!-- CONTENT end -->
				</tr>
</table>
</td>
			<td width="8" style="border-collapse:collapse;padding:0">&nbsp;</td>
			<td width="296" valign="top" align="center" class="contenttbl" style="border-collapse:collapse;background-color:#ffffff;padding:0">
				<table width="260" cellpadding="0" cellspacing="0" style="border-collapse:collapse;mso-table-lspace:0pt;mso-table-rspace:0pt;color:#949393;font-family:Helvetica,Arial,sans-serif;font-size:12px">

<tr style="padding:0">
<!-- CONTENT start --><td valign="top" align="left" style="border-collapse:collapse;padding:0">
						<table cellpadding="0" cellspacing="0" style="border-collapse:collapse;mso-table-lspace:0pt;mso-table-rspace:0pt;color:#949393;font-family:Helvetica,Arial,sans-serif;font-size:12px">

<tr style="padding:0">
							<td style="border-collapse:collapse;padding:0">
								<a href="<?php the_permalink(); ?>" style="background-size: cover; background-position: center center; background-image: url(<?php echo $imgsrc[0]; ?>); display: block; width: 296px; height: 350px;">
								
							</td>
						
						</tr>
</table>
</td>
		<!-- CONTENT end -->
				</tr>
</table>
</td>
		</tr>
<tr height="8" style="padding:0"><td style="border-collapse:collapse;padding:0"></td></tr>
</table>
<!-- end -->


<?php endwhile; endif; wp_reset_query(); ?>	

<? } ?>






<!-- Seperator end ~sep~ -->









<!-- Footer start --><table width="600" cellpadding="0" cellspacing="0" style="border-collapse:collapse;mso-table-lspace:0pt;mso-table-rspace:0pt;color:#949393;font-family:Helvetica,Arial,sans-serif;font-size:12px">
<tr style="padding:100px 0 0 0">
	<td height="80">
		<span style="text-align: center; display: block; padding-top: 0px; color: #333333; text-decoration: none; font-weight: bold;font-size: 13px; text-transform: uppercase; "><?php if(get_option('misfit_logotext')) {  echo get_option('misfit_logotext'); } else { bloginfo('description'); } ?></span>	
	</td>
</tr>
</table>
<!--  Footer end -->
</td>
</tr></table>
</body>
</html>

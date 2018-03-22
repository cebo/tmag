<?php
/*
Template Name: Template Contact
*/
get_header(); the_post();
	$id = get_the_id();

	$lat = get_post_meta( $id, '_crb_contact_map_lat', true );
	$lng = get_post_meta( $id, '_crb_contact_map_lng', true );

	$phone = get_post_meta( $id ,'_crb_contact_phone',true);
	$fax = get_post_meta( $id ,'_crb_contact_fax',true);
	$email = get_post_meta( $id ,'_crb_contact_email',true);
	?>				
	<div class="main">
		<div class="shell">
			<div class="post">
				<?php crb_get_title() ?>
				<h4>Corporate Headquarters</h4>

				<div class="lists">
					<div class="list">
						<p><img src="<?php bloginfo('stylesheet_directory'); ?>/images/marker.png" alt="" class="alignleft" /><?php echo get_post_meta(get_the_id(),'_crb_contact_address',true); ?></p>
					</div><!-- /.list -->
					<?php  
					if ($phone || $fax || $email) {
						echo '<div class="list"><p>';
						$vars = array( 
							'phone'		=> 'P:',
							'fax'		=> 'F:',
							'email'		=> 'E:'
						);
						$loop = 0;
						foreach ($vars as $v => $label) {
							if ( $$v ) {
								echo ($loop > 0 ? '<br/>' : '') . '<strong>'.$label.'</strong> '.$$v.'<br />';
								$loop++;
							}
						}
						echo '</p></div><!-- /.list -->';
					}
					?>
				</div><!-- /.lists -->
			</div><!-- /.post -->
		</div><!-- /.shell -->

		<div id="wide-map" data-lat = "<?php echo $lat ?>" data-lng = "<?php echo $lng ?>" ></div><!-- /#wide-map -->

		<?php if ($links = carbon_get_the_post_meta('crb_contact_links', 'complex')): ?>
			<div class="shell">
				<div class="location-options">
					<?php foreach ($links as $row): ?>
						<p>
							<a href='<?php echo $row['link'] ?>'><?php echo $row['label'] ?> &raquo;</a>
						</p>
					<?php endforeach ?>
				</div><!-- /.location-options -->
			</div><!-- /.shell -->
		<?php endif ?>
	</div><!-- /.main -->	
<?php get_footer(); ?>
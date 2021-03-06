<?php
/*
Template Name: Template Home
*/
get_header(); the_post() ?>
	<div class="main">

		<?php if ($front_image = get_post_meta(get_the_id(),'_crb_home_front_image',true) ): $img = wp_get_attachment_image_src($front_image, 'crb_section_image') ?>
			<?php if ($img): ?>
				<div class="feature">
					<img src="<?php echo $img[0] ?>" alt="" class="feature-img" width="1920"  /> <!-- height="600" -->

					<?php if ($front_image_text = get_post_meta(get_the_id(),'_crb_home_front_image_pholder_text',true) ): ?>
						<div class="shell">
							<h2><?php echo $front_image_text ?></h2>
						</div><!-- /.shell -->
					<?php endif ?>
				</div><!-- /.big-slider -->
			<?php endif ?>
		<?php endif ?>

		<?php if ($below_front_image_text = get_post_meta(get_the_id(),'_crb_home_front_image_text',true) ): ?>
			<div class="section white-section">
				<div class="shell">
					<?php echo wpautop( $below_front_image_text ); ?>
				</div><!-- /.shell -->
			</div><!-- /.section -->
		<?php endif ?>

		<?php  
		$slides = carbon_get_the_post_meta( 'crb_home_slides', 'complex' );
		if ($slides) {
			?>
			<div class="small-slider">
				<div class="carousel">
					<?php foreach ($slides as $row): 
						$img = wp_get_attachment_image_src($row['image'], 'crb_section_wide_slider');
						$link = isset($row['link']) ? $row['link'] : '';
						?>
						<?php if ($img): ?>
							<div class="slide">
								<?php if ($link): ?>
									<a href="<?php echo $link ?>">
										<img width="1140" height="350" src="<?php echo $img[0] ?>" class="attachment-slide" alt=""/>
									</a>
								<?php else: ?>
									<img width="1140" height="350" src="<?php echo $img[0] ?>" class="attachment-slide" alt=""/>
								<?php endif ?>
							</div>
						<?php endif ?>
					<?php endforeach ?>
				</div>		
				<a href="#" class="slide-nav prev-slide">prev</a>
				<a href="#" class="slide-nav next-slide">next</a>
				<span class="dark-transparent left-side"></span>
				<span class="dark-transparent right-side"></span>
			</div>
			<?php
		}
		?>

		<!-- /.small-slider -->
		<div class="section orange-section home-middle">
			<div class="shell">
				<div class="feature-cols cf">
					<?php if ($link = get_post_meta(get_the_id(),'_crb_home_link_catering_menu',true) ): ?>
						<div class="col">
							<a href="<?php echo $link ?>">
								<img src="<?php bloginfo('stylesheet_directory'); ?>/images/catering-menu-img.jpg" alt="" /><span>Catering<br />Menu</span>
							</a>
						</div><!-- /.col -->
					<?php endif ?>
					<?php if ($link = get_post_meta(get_the_id(),'_crb_home_link_delivers_menu',true) ): ?>
						<div class="col">
							<a href="<?php echo $link ?>">
								<img src="<?php bloginfo('stylesheet_directory'); ?>/images/mama-fus-delivers-img.jpg" alt="" /><span>Mama Fu's<br />Delivers!</span>
							</a>
						</div><!-- /.col -->
					<?php endif ?>
					<div class="col">
						<?php if ($link = get_post_meta(get_the_id(),'_crb_home_link_funatic_menu',true) ): ?>
							<a href="<?php echo $link ?>" class="alignleft"><img src="http://tiltedchaircreative.com/hosting/staging/mamafus/wp-content/uploads/2014/02/home-appscreen.png" alt="" /></a>
							<div class="cnt">
								<h3><a href='<?php echo $link ?>'>Are you a Funatic?</a></h3>
								<p><strong>Funatics Club</strong> is our way of thanking you for making us your favorite Asian place. Earn points with every purchase and receive special gifts, offers and inside news! </br><strong><a class="normal" href="http://staging.mamafus.com/funatics-club/">Download the app now »</a></strong></p>
							</div><!-- /.cnt -->
						<?php endif ?>
					</div><!-- /.col -->
				</div><!-- /.feature-cols -->
			</div><!-- /.shell -->
		</div><!-- /.section orange-section -->
		
		<?php if ($bottom_image = get_post_meta(get_the_id(),'_crb_home_image',true) ): $img = wp_get_attachment_image_src($bottom_image, 'crb_section_image') ?>
			<?php if ($img): ?>
				<div class="section wide-section">
					<img src="<?php echo $img[0] ?>" alt="" />
				</div><!-- /.section wide-section -->
			<?php endif ?>
		<?php endif ?>

		<div class="section story-section">
			<span class="transparent-line"></span>
			<div class="shell">
				<div class="post">
					<?php the_content(); ?>
					<div class="cl">�</div>
				</div><!-- /.post -->
				<?php if ($social_page = get_post_meta(get_the_id(),'_crb_home_facebook_embeded',true) ): ?>
					<div class="fb-like-box" data-href="<?php echo $social_page ?>" data-width="316" data-height="390" data-colorscheme="light" data-show-faces="true" data-header="false" data-stream="false" data-show-border="false"></div>
				<?php endif ?>
			</div><!-- /.shell -->
		</div><!-- /.section story-section -->

	</div><!-- /.main -->	
<?php get_footer(); ?>
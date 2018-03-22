<?php  
if (!isset($slides) || !$slides) {
	return;
}

// 'slides' might be slides_post_id or an array with complex images
$slides_images = is_numeric( $slides ) ? carbon_get_post_meta($slides, 'crb_slides', 'complex' ) : $slides;
if (!$slides_images) {
	return;
}
?>
<div class="small-slider">
	<div class="carousel">
		<?php foreach ($slides_images as $row) {
			$image = wp_get_attachment_image_src($row['image'], 'crb_section_slides');
			$link = isset($row['link']) ? $row['link'] : '';
			if ($image) {
				?>
					<div class="slide">
						<?php if ($link): ?>
							<a target="_blank" href="<?php echo $link ?>">
								<img width="600" height="400" src="<?php echo $image[0] ?>" class="attachment-slide" />
							</a>
						<?php else: ?>
							<img width="600" height="400" src="<?php echo $image[0] ?>" class="attachment-slide" />
						<?php endif ?>
					</div>
				<?php
			}
		}
		?>
	</div>
	<a href="#" class="slide-nav prev-slide">prev</a>
	<a href="#" class="slide-nav next-slide">next</a>
</div>
<!-- /.small-slider -->
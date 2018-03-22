<?php  
$slides = carbon_get_post_meta( carbon_get_the_post_meta( 'crb_front_slider' ), 'crb_sliders', 'complex' );
if (!$slides) {
	return;
}

?>
<div class="big-slider">
	<div class="carousel">
		<?php foreach ($slides as $row): ?>
			<?php  
			$image = wp_get_attachment_image_src($row['image'], 'crb_front_slider');
			$link = isset($row['link']) ? $row['link'] : '';
			if (!$image) {
				continue;
			}
			?>
			<div class="slide">
				<?php if ($link): ?>
					<a target="_blank" href="<?php echo $link ?>">
						<img src="<?php echo $image[0] ?>" alt="" />
					</a>
				<?php else: ?>
					<img src="<?php echo $image[0] ?>" alt="" />
				<?php endif ?>
			</div>
		<?php endforeach ?>
	</div>
	<div class="slider-pagination"></div>
</div><!-- /.big-slider -->
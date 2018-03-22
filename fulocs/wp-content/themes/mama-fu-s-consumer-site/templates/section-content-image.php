<?php  
if (!isset($data)) { // might be numeric (term_id) or string ('all')
	return;
}

$image = isset($data['image']) ? wp_get_attachment_image_src($data['image'], 'crb_section_image') : null;
if ($image) {
	?>
	<div class="section wide-section">
		<img src="<?php echo $image[0] ?>" alt="" />
	</div><!-- /.section wide-section -->
	<?php
}
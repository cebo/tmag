<?php  
if (!isset($data) || !$data) {
	return;
}

$image = wp_get_attachment_image_src($data['image'], 'full');
if (!$image) {
	return;
}

$color = $data['section_color'];
?>
<div class="section <?php echo $color ?>-section">
	<div class="shell">
		<img src="<?php echo $image[0] ?>" alt="" class="alignnone" />
	</div><!-- /.shell -->
</div><!-- /.section -->
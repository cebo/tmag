<?php  
if (!isset($data) || !$data) {
	return;
}

$color = $data['section_color'];
$alignment = $data['image_alignment'];
$image = isset($data['image']) ? wp_get_attachment_image_src( $data['image'], 'crb_section_right_image') : null;
?>
<div class="section <?php echo $color ?>-section">
	<div class="shell">
		<div class="post">
			<?php if ($image): ?>
				<div class="post-img align<?php echo $alignment ?>">
					<img src="<?php echo $image[0] ?>" alt="" />
				</div><!-- /.post-img -->
			<?php endif ?>
			<div class="post-cnt">
				<?php echo wpautop( do_shortcode( $data['text'] ) ) ?>
			</div><!-- /.post-cnt -->
		</div><!-- /.post -->
	</div><!-- /.shell -->
</div><!-- /.section -->
<?php  
if (!isset($data) || !$data) {
	return;
}

$label = $data['label'];
$buttons = $data['buttons'];
$content = $data['text'];
?>
<div class="section white-section">
	<div class="shell">
		<div class="posts-section">
			<div class="post">
				<h3>Are you a Funatic?</h3>
				<?php if ($buttons): ?>
					<div class="btns-store">
						<?php foreach ($buttons as $row): ?>
							<?php  
							$image = wp_get_attachment_image_src($row['image'], 'crb_section_buttons');
							if (!$image) {
								continue;
							}
							?>
							<a href="<?php echo $row['link'] ?>">
								<img src="<?php echo $image[0] ?>" alt="" />
							</a>
						<?php endforeach ?>
					</div><!-- /.btns-store -->
				<?php endif ?>
				<?php if ($content): ?>
					<div class="entry">
						<?php echo wpautop( do_shortcode( $content ) ); ?>
					</div><!-- /.entry -->
				<?php endif ?>
			</div><!-- /.post -->
		</div><!-- /.posts-section -->
	</div><!-- /.shell -->
</div><!-- /.white-section -->
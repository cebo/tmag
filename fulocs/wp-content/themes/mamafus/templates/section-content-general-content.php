<?php  
if (!isset($data) || !$data) {
	return;
}

$color = $data['section_color'];
?>
<div class="general-content section <?php echo $color ?>-section">
	<div class="shell">
		<div class="post">
			<div class="post-cnt">
				<?php echo wpautop( do_shortcode( $data['text'] ) ) ?>
			</div><!-- /.post-cnt -->
		</div><!-- /.post -->
	</div><!-- /.shell -->
</div><!-- /.section -->
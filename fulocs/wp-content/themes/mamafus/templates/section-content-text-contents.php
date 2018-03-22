<?php 
if (!isset($data)) { // might be numeric (term_id) or string ('all')
	return;
}

$entries = isset($data['texts']) ? $data['texts'] : null;
if (!$entries) {
	return;
}
?>
<div class="section orange-section">
	<span class="transparent-line"></span>
	<div class="shell">
		<div class="posts-section">
			<?php foreach ($entries as $row): ?>
				<div class="post">
					<?php echo wpautop( $row['text'] ); ?>
				</div><!-- /.post -->
			<?php endforeach ?>
		</div><!-- /.posts-section -->
	</div><!-- /.shell -->
</div><!-- /.orange-section -->
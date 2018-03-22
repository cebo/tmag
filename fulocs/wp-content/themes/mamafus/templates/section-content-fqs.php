<?php  
if (!isset($variable)) { // might be numeric (term_id) or string ('all')
	return;
}
$entries_args = array(
		'post_type'			=> 'crb_faq',
		'orderby'			=> 'menu_order',
		'order'				=> 'ASC',
		'posts_per_page'	=> -1
	);

if ($variable && $variable!='all') {
	$entries_args[ 'crb_faq_categories' ] = $variable;
}

$entries = get_posts( $entries_args );
if (!$entries) {
	return;
}
?>
<div class="section white-section">
	<div class="shell">
		<h3 class="entry-title">Frequently Asked Questions</h3>
		<div class="questions">
			<?php foreach ($entries as $entry): ?>
				<div class="question">
					<h5><a><span class="arrow"></span><?php echo $entry->post_title ?></a></h5>
					<?php echo wpautop( get_post_meta($entry->ID,'_crb_faq_content',true) ) ?>
				</div><!-- /.question -->
			<?php endforeach ?>
		</div><!-- /.questions -->
	</div><!-- /.shell -->
</div><!-- /.white-section -->
<?php  
$newsletter_label = get_option('crb_newsletter_label');
$newsletter_content = get_option('crb_newsletter_content');

if ($newsletter_label) {
	echo '<br/><h4>'.$newsletter_label.'</h4>';
}

if ($newsletter_content) {
	echo wpautop( $newsletter_content );
}
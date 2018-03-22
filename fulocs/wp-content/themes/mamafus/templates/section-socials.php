<?php  
$socials = array(
	'facebook'	=> 'Facebook',
	'twitter'	=> 'Twitter',
	'youtube'	=> 'YouTube',
	'gplus'		=> 'Google+',
	'pinterest'	=> 'Pinterest',
	'instagram'	=> 'Instagram'
);
$return = '';
$sdir = get_bloginfo('stylesheet_directory');
foreach ($socials as $key => $label) {
	$option_name = 'crb_socials_' . $key;
	if ( $social_link = get_option( $option_name ) ) {
		$return .= '<a target="_blank" href="' . $social_link . '"><img src="' . $sdir . '/images/'.$key.'-ico.png" alt="" />'.$label.'</a>';
	}
}

if ($return) {
	echo '<div class="social-icons">' . $return . '</div><!-- /.social-icons -->';
}
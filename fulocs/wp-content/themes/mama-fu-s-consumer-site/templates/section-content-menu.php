<?php  
$menu_categories = get_terms( 'crb_menu_categories', array('hide_empty' => 0) );
if (!$menu_categories) {
	return;
}

$menu_navigation = '';
$menus_content = '';
foreach ($menu_categories as $category) {
	$link = carbon_get_term_meta($category->term_id,'crb_tax_link');

	if ($link) {
		$menu_navigation .= '<li><a class="ext" target="_blank" href="' . $link . '">'.$category->name.'</a></li>';
	}else{
		$menu_navigation .= '<li><a href="#'.$category->slug.'">'.$category->name.'</a></li>';
	}

	$entries = get_posts( array(
			'posts_per_page'	=> -1,
			'post_type'			=> 'crb_menu',
			'orderby'			=> 'menu_order',
			'order'				=> 'ASC',
			$category->taxonomy => $category->slug
		) );

	$max_columns = 3;
	if ($entries) {
		$max_entries = count($entries);
		$per_column = floor($max_entries/$max_columns);
		$extra = $max_entries - $max_columns * $per_column;
		$columns = array();
		for ($i=0; $i < $max_columns; $i++) { 
			if ($extra > 0) {
				$columns[$i] = $per_column + 1;
				$extra -= 1;
			}else{
				$columns[$i] = $per_column;
			}
		}

		$menus_content .= '
			<div class="tab" id=\''.$category->slug.'\'>
				<div class="lists">
		';

		$index = 0;
		foreach ($columns as $column_key => $column_items) {
			$menus_content .= '<div class="list">';

			for ($i=0; $i < $column_items; $i++) { 

				$infos = carbon_get_post_meta( $entries[$index]->ID, 'crb_information', 'complex' );
				$infos_html = '';
				if ($infos) {
					foreach ($infos as $row) {
						$infos_html .= '<li>'.$row['text'].'<strong>'.$row['value'].'</strong></li>';
					}
				}

				$image = has_post_thumbnail( $entries[$index]->ID ) ? crb_get_thumbnail_src( $entries[$index]->ID, 'crb_section_menu') : '';

				$menus_content .= '
						<div class="post">
							<h5>'.$entries[$index]->post_title.'</h5>
							<p>'.$entries[$index]->post_excerpt.'</p>
							<a href="'.get_permalink( $entries[$index]->ID ).'" class="more-info">More Info</a>
							<div class="expand">
								'.( $image ? '<img src="'.$image.'" alt="" />' : '' ).'
								'.($infos_html ? '<h5>Nutrition Info</h5><ul>'.$infos_html.'</ul>' : '').'
							</div><!-- /.expand -->
						</div><!-- /.post -->
					';
				$index++;
			}

			$menus_content .= '</div><!-- /.list -->';
		}
			
		$menus_content .= '
				</div><!-- /.lists -->
			</div>
		';
	}
			
}

?>
<div class="section white-section">
	<span class="transparent-line"></span>
	<div class="shell">
		<div class="tabs-nav">
			<ul>
				<?php echo $menu_navigation ?>
			</ul>
		</div><!-- /.tabs-nav -->
		<div class="tabs-holder">
			<?php echo $menus_content ?>
		</div><!-- /.tabs-holder -->
		<p class="alignnone">Visit <a target='_blank' href="http://www.healthydiningfinder.com/restaurant/mama-fus-asian-house"><strong>HealthyDiningFinder.com</strong></a> to learn more about our healthy dining options.</p>
	</div><!-- /.shell -->
</div><!-- /.dark-section -->
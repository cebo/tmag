<?php  
$lists_array = (isset($data) && isset($data['entries']) && !empty($data['entries'])) ? $data['entries'] : null;
if (!$lists_array) {
	return;
}
$color = $data['section_color'];

$labels = array();
$lists = array();
$positions = array('left', 'middle', 'right');

foreach ($lists_array as $loop_id => $row) {
	$lists[$loop_id] = '';

	$list_id = $row['list'];
	$list_obj = get_post( $list_id );

	$labels[$loop_id]['label'] 	= $list_obj->post_title;
	$labels[$loop_id]['link']	= get_post_meta($list_obj->ID,'_crb_list_pdf',true);

	if ($list_obj->post_content) {
		$lists[$loop_id] .= wpautop( $list_obj->post_content );
	}

	$lists[$loop_id] .= '<div class="lists">';
	foreach ($positions as $key) {
		$sections = carbon_get_post_meta( $list_id, 'crb_list_'.$key.'_items', 'complex' );
		if ($sections) {
			$lists[$loop_id] .= '<div class="list">';
				
			foreach ($sections as $section) {
				$this_section_id 			= isset( $section['list_id'] ) ? $section['list_id'] : '';
				$this_section_dependency_id = isset( $section['list_dependency_id'] ) ? $section['list_dependency_id'] : '';

				$lists[$loop_id] .= '<div class="question">';

				if (isset($section['label']) && $section['label']) {
					$lists[$loop_id] .= '<h5><a data-id="'.$this_section_id.'"><span class="arrow"></span>'.$section['label'].'</a></h5>';
				}

				$items = $section['items'];
				if ($items) {
					$lists[$loop_id] .= '<ul class="'.$this_section_dependency_id.'" >';

					foreach ($items as $item) {
						$text_link = isset( $item['link'] ) ? $item['link'] : '';
						$text_label = $item['text'];

						$lists[$loop_id] .= '<li>'.( $text_link ? '<a target="_blank" href="'.$text_link.'">'.$text_label.'</a>' : $text_label ).'</li>';
					}

					$lists[$loop_id] .= '</ul>';
				}

				$lists[$loop_id] .= '</div><!-- /.question -->'; // end question
			}

		}
		$lists[$loop_id] .= '</div><!-- /.list -->'; // end list

	}
	$lists[$loop_id] .= '</div><!-- /.lists -->';  // end lists

	if ($below_list_content = get_post_meta($list_obj->ID,'_crb_list_bottom_content',true)) {
		$lists[$loop_id] .= wpautop( $below_list_content );
	}
}

?>
<div class="section <?php echo $color ?>-section">
	<div class="shell">				
		<?php  
		if (count($lists_array)==1) {
			echo '<h3>'.$labels[0]['label'].'</h3>' . $lists[0];
		}elseif(count($lists_array)>1){
			$tabs_nav = '';
			$tabs_cnt = '';
			foreach ($labels as $loop_id => $label) {
				$key = 'tab-item-'.$loop_id;

				$ext_link = $labels[$loop_id]['link'];
				$link = $ext_link ? $ext_link : '#'.$key.'';

				$tabs_nav .= '<li><a '.($ext_link ? 'class="ext" target="_blank"' : '').' href="'.$link.'">'.$label['label'].'</a></li>';
				$tabs_cnt .= '<div class="tab" id="'.$key.'">'.$lists[$loop_id].'</div><!-- /.tab -->';
			}
			?>
				<div class="tabs-nav">
					<ul>
						<?php echo $tabs_nav ?>
					</ul>
				</div><!-- /.tabs-nav -->
				<div class="tabs-holder">
					<?php echo $tabs_cnt ?>
				</div><!-- /.tabs-holder -->
			<?php
		}
		?>
	</div><!-- /.shell -->
</div><!-- /.orange-section -->

<?php
$categories = get_categories('hide_empty=0&orderby=name');
$taxers = get_terms('location', 'orderby=name&hide_empty=0');
$proptype = get_terms('propertytype', 'orderby=name&hide_empty=0');
$pages_array = get_pages('hide_empty=0');
$terms = array();
$site_pages = array();
$wp_cats = array();
$type = array();

foreach ($pages_array as $pagg) {
	$site_pages[$pagg->ID] = htmlspecialchars($pagg->post_title);
	$pages_ids[] = $pagg->ID;
}

foreach ($categories as $category_list ) {
       $wp_cats[$category_list->cat_ID] = $category_list->cat_name;
}

array_unshift($wp_cats, "Select a category"); 
array_unshift($terms, "Select a Location"); 
array_unshift($type, "Select a Type"); 

$prefix = 'cebo';

$numbers = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9+');
$pagetypes = array('Two Column', 'Full Width', 'With Sidebar');

$meta_box = array(
	'id' => 'CUSTOM FIELDS',
	'title' => 'Important Location Links',
	// 'page' => determines where the custom field is supposed to show up.
	// here it is desplaying Testimonials, but other options are
	// page or post
	'page' => 'project',
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(

		array( 
              "name" => "Location Name",
	          "desc" => "example: ####-Trade Area/Location Name",
	          "id" => $prefix."_locname",
	          "type" => "text",
	          "std" => ""
        )   
		,
		array( 
              "name" => "Address",
	          "desc" => "example: ####-Trade Area/Location Name",
	          "id" => $prefix."_addressy",
	          "type" => "text",
	          "std" => ""
        	)   
		,
		array( 
              "name" => "Phone",
	          "desc" => "Paste in phone number",
	          "id" => $prefix."_phone",
	          "type" => "text",
	          "std" => ""
              )
		,	
		array( 
              "name" => "Hours",
	          "desc" => "Paste in the hours of operation",
	          "id" => $prefix."_hours",
	          "type" => "text",
	          "std" => ""
              )
		,
		array( 
              "name" => "Latitude",
	          "desc" => "Paste location latitude",
	          "id" => $prefix."_lat",
	          "type" => "text",
	          "std" => ""
              )
		,		
		array( 
              "name" => "Longitude",
	          "desc" => "Paste location longitude",
	          "id" => $prefix."_long",
	          "type" => "text",
	          "std" => ""
              )
		,	
				
		array( 
              "name" => "Delivery Link (to order)",
	          "desc" => "Paste Your Delivery Link Here",
	          "id" => $prefix."_delivery",
	          "type" => "text",
	          "std" => ""
              )
		,
		array( 
              "name" => "Catering Link (to order)",
	          "desc" => "Paste Your Catering Link Here",
	          "id" => $prefix."_cateringlink",
	          "type" => "text",
	          "std" => ""
              )
		,	

		array( 
              "name" => "Apple Directions Link",
	          "desc" => "Paste Apple (ios maps app) Directions Link",
	          "id" => $prefix."_directions",
	          "type" => "text",
	          "std" => ""
              )
 		,
 		array( 
              "name" => "Google Directions Link",
	          "desc" => "Paste Google Directions Link",
	          "id" => $prefix."_googledirections",
	          "type" => "text",
	          "std" => ""
              )
 		,
 		array( 
              "name" => "Rate This Location Link",
	          "desc" => "Paste Rating Directions Link",
	          "id" => $prefix."_rating",
	          "type" => "text",
	          "std" => ""
              )
 		,
 		array( 
              "name" => "Delivery Area",
	          "desc" => "paste in your delivery area coordinates",
	          "id" => $prefix."_deliveryarea",
	          "type" => "textarea",
	          "std" => ""
        	)   
		,
		array( 
              "name" => "Catering Area",
	          "desc" => "paste in your area coordinates",
	          "id" => $prefix."_cateringarea",
	          "type" => "textarea",
	          "std" => ""
        	)   
       	)
);
/* ----------------------------------------------- DONT TOUCH BELOW UNLESS YOU KNOW WHAT YOU'RE DOING */
add_action('admin_menu', 'mytheme_add_box');
// Add meta box
function mytheme_add_box() {
	global $meta_box;
	foreach ( array( 'locales', 'event' ) as $page )
	add_meta_box($meta_box['id'], $meta_box['title'], 'mytheme_show_box', $page, $meta_box['context'], 			$meta_box['priority']);
}
// Callback function to show fields in meta box
function mytheme_show_box() {
	global $meta_box, $post;
	// Use nonce for verification
	echo '<input type="hidden" name="mytheme_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
	echo '<table class="form-table">';
	foreach ($meta_box['fields'] as $field) {
		// get current post meta data
		$meta = get_post_meta($post->ID, $field['id'], true);
		echo '<tr>',
				'<td class="boxer">';
		switch ($field['type']) {
			case 'text':
				echo '<div style="font-weight: bold;" class="title">' ,$field['name'], '</div><div style="font-style: italic; font-size: 12px; color: #a2a2a2;"class="descriptive">', $field['desc'], '</div>', '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : $field['std'], '" size="30" style="width: 109%" />';
				break;
			case 'textarea':
				echo '<div class="title">' ,$field['name'], '</div><div class="descriptive">', $field['desc'], '</div>', '<textarea name="', $field['id'], '" id="', $field['id'], '" cols="60" rows="4" style="width:47%">', $meta ? $meta : $field['std'], '</textarea>';
				break;
			case 'select':
				echo '<div class="title">' ,$field['name'], '</div><div class="descriptive">', $field['desc'], '</div>', '<select name="', $field['id'], '" id="', $field['id'], '">';
				foreach ($field['options'] as $option) {
					echo '<option', $meta == $option ? ' selected="selected"' : '', '>', $option, '</option>';
					
				}
				echo '</select>';
				break;
			case 'radio':
				echo '<div style="font-weight: bold;" class="title">' ,$field['name'], '</div><div style="font-style: italic; font-size: 12px; color: #a2a2a2;"class="descriptive">', $field['desc'], '</div>';
				foreach ($field['options'] as $option) {
					echo '<input type="radio" name="', $field['id'], '" value="', $option['value'], '"', $meta == $option['value'] ? ' checked="checked"' : '', ' />', $option, '<br>';
				}
				break;
			case 'checkbox':
				echo '<div style="font-weight: bold;" class="title">' ,$field['name'], '</div><div style="font-style: italic; font-size: 11px; color: #a2a2a2;" class="descriptive">', $field['desc'], '</div>', '<input type="checkbox" name="', $field['id'], '" id="', $field['id'], '"', $meta ? ' checked="checked"' : '', ' />';
				break;
		}
		echo 	'<td>',
			'</tr>';
	}
	
	echo '</table>';
}

add_action('save_post', 'mytheme_save_data');
// Save data from meta box
function mytheme_save_data($post_id) {
	global $meta_box;	
	// verify nonce
	if (!wp_verify_nonce($_POST['mytheme_meta_box_nonce'], basename(__FILE__))) {
		return $post_id;
	}
	// check autosave
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {		return $post_id;
	}
	// check permissions
	if ('page' == $_POST['post_type']) {
		if (!current_user_can('edit_page', $post_id)) {
			return $post_id;
		}
	} elseif (!current_user_can('edit_post', $post_id)) {
		return $post_id;
	}
	foreach ($meta_box['fields'] as $field) {
		$old = get_post_meta($post_id, $field['id'], true);
		$new = $_POST[$field['id']];		
		if ($new && $new != $old) {
			update_post_meta($post_id, $field['id'], $new);
		} elseif ('' == $new && $old) {
			delete_post_meta($post_id, $field['id'], $old);
		}
	}
}
?>
<?php  
$modules = (isset($post_id) && is_numeric($post_id)) ? carbon_get_post_meta($post_id, 'crb_sections', 'complex') : carbon_get_the_post_meta( 'crb_sections', 'complex');
if ($modules) {
	foreach ($modules as $module) {
		$section_id = isset($module['section_id']) ? $module['section_id'] : null;
		if ($section_id) {
			$before = '<div class="croll-to-container" id="'.$section_id.'">';
			$after = '</div>';
		}else{
			$before = '';
			$after = '';
		}

		echo $before;
		switch ( $module['_type'] ) {
			case '_slider':
				$predefined_id = $module['predefined'];
				$slides = isset($module['slides']) ? $module['slides'] : null;

				// 'slides' might be slides_post_id or an array with complex images
				crb_get_template( 'section-content-slider', array( 'slides' => ($predefined_id ? $predefined_id : $slides) ) );
				break;
			case '_faq':
				$variable = $module['faqs_to_show']; // might be numeric (term_id) or string ('all')
				if ($variable) {
					crb_get_template( 'section-content-fqs', array( 'variable' => $variable ) );
				}
				break;
			case '_buttons_content':
				crb_get_template( 'section-content-content', array( 'data' => $module ) );
				break;
			case '_image_with_content':
				crb_get_template( 'section-content-image-content', array( 'data' => $module ) );
				break;
			case '_general_content':
				crb_get_template( 'section-content-general-content', array( 'data' => $module ) );
				break;
			case '_image_orange':
				crb_get_template( 'section-content-orange-image', array( 'data' => $module ) );
				break;
			case '_image_regular':
				crb_get_template( 'section-content-image-regular', array( 'data' => $module ) );
				break;
			case '_content_image':
				crb_get_template( 'section-content-image', array( 'data' => $module ) );
				break;
			case '_text_contents':
				crb_get_template( 'section-content-text-contents', array( 'data' => $module ) );
				break;
			case '_section_content':
				crb_get_template( 'section-content-inner-content', array( 'data' => $module ) );
				break;
			case '_menu':
				crb_get_template( 'section-content-menu');
				break;
			case '_lists':
				// requires crb_lists post_type
				crb_get_template( 'section-content-lists', array( 'data' => $module ));
				break;
			case '_catering_form':
				crb_get_template( 'section-form-catering');
				break;
			default:
				break;
		}

		echo $after;
	}
}
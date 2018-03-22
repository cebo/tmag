<?php
/*
Carbon_Container::factory('custom_fields', __('Custom Data', 'domain'))
	->show_on_post_type('page')
	->add_fields(array(
		Carbon_Field::factory('complex', 'my_data')->add_fields(array(
				Carbon_Field::factory('text', 'title')->help_text('lorem'),
			)),
		Carbon_Field::factory('map', 'location')->set_position(37.423156, -122.084917, 14),
		Carbon_Field::factory('image', 'img'),
		Carbon_Field::factory('file', 'pdf'),
	));
*/

// Template Homepage
Carbon_Container::factory('custom_fields', 'Template Homepage - Properties' )
	->show_on_post_type('page')
	->show_on_template('templates/template-home.php')
	->add_fields(array(
		Carbon_Field::factory('separator', 'sep1', 'Front Image Properties'),
		Carbon_Field::factory('attachment', 'crb_home_front_image', 'Front Image')
			->help_text('Recommended image size: 1920x600 pixels'),
		Carbon_Field::factory('text', 'crb_home_front_image_pholder_text', 'Image Placeholder Text'),
		Carbon_Field::factory('rich_text', 'crb_home_front_image_text', 'Below Image Text'),

		Carbon_Field::factory('separator', 'sep2', 'Wide SLider Properties'),
		Carbon_Field::factory('complex', 'crb_home_slides')
			->set_layout(Carbon_Field_Complex::LAYOUT_LIST)
			->add_fields(array(
				Carbon_Field::factory('text', 'link')
					->help_text('Optional.'),
				Carbon_Field::factory('attachment', 'image')
					->help_text('Recommended image size: 1140x350 pixels')
			)),

		Carbon_Field::factory('separator', 'sep3', 'Middle Section Properties'),
		Carbon_Field::factory('text', 'crb_home_link_catering_menu', 'Catering Menu Link'),
		Carbon_Field::factory('text', 'crb_home_link_delivers_menu', 'Mama Fu\'s Delivers Link'),
		Carbon_Field::factory('text', 'crb_home_link_funatic_menu', 'Mama Fu\'s Funatic Link'),

		Carbon_Field::factory('separator', 'sep4', 'Bottom Section Properties'),
		Carbon_Field::factory('attachment', 'crb_home_image', 'Image')
			->help_text('Recommended image size: 1920x400 pixels.'),

		Carbon_Field::factory('separator', 'sep5', 'Socials Properties'),
		Carbon_Field::factory('text', 'crb_home_facebook_embeded', 'Facebook Page URL')
			->help_text('ex: http://www.facebook.com/FacebookDevelopers')
	));

// Template Contact
Carbon_Container::factory('custom_fields', 'Template Contact - Properties' )
	->show_on_post_type('page')
	->show_on_template('templates/template-contact.php')
	->add_fields(array(
		Carbon_Field::factory('textarea', 'crb_contact_address', 'Address')
			->set_height(25),
		Carbon_Field::factory('text', 'crb_contact_phone', 'Phone'),
		Carbon_Field::factory('text', 'crb_contact_fax', 'Fax'),
		Carbon_Field::factory('text', 'crb_contact_email', 'Email'),
		Carbon_Field::factory('complex', 'crb_contact_links', 'Links')
			->set_layout(Carbon_Field_Complex::LAYOUT_LIST)
			->add_fields(array(
				Carbon_Field::factory('text', 'label'),
				Carbon_Field::factory('text', 'link'),
			)),
		Carbon_Field::factory('Map_With_Address', 'crb_contact_map', 'Google Map'),
	));

// General Pages Properties
Carbon_Container::factory('custom_fields', 'Pages Properties')
	->show_on_post_type('page')
	->hide_on_template(array('templates/template-home.php', 'templates/template-contact.php'))
	->add_fields(array(
		Carbon_Field::factory('select', 'crb_front_slider', 'Front Slider')
			->add_options( crb_get_posts_array( 'crb_front_slides' ) )
			->help_text( 'Optional.' ),
		Carbon_Field::factory('complex', 'crb_sections', 'Content Sections')
			// ->set_layout(Carbon_Field_Complex::LAYOUT_LIST)
			->add_fields('slider', 'Section Slider', array(
					Carbon_Field::factory('html', 'info_html')
						->set_html('
							<div style="position: relative;  background: #eee; border: 1px solid #ccc; padding: 5px;">
								<p>Section Slider</p>
							</div>
						'),
					Carbon_Field::factory('text', 'section_id')
						->help_text('Optional. <br/>Must be unique!'),
					Carbon_Field::factory('select', 'predefined')
						->add_options( crb_get_posts_array('crb_content_slides') )
						->help_text('Choose predefined slider or set new slider. The predefined sliders are managed through <a target="_blank" href="'.home_url('/wp-admin/edit.php?post_type=crb_content_slides').'">Content Slides</a> admin area.'),
					Carbon_Field::factory('complex', 'slides')
						->add_fields(array(
							Carbon_Field::factory('attachment', 'image')
								->set_help_text( 'Recommended image size 600x400 pixels.')
								->set_required( true ),
						)),
				))
			->add_fields('faq', 'Frequently Asked Questions', array(
					Carbon_Field::factory('html', 'info_html')
						->set_html('
							<div style="position: relative;  background: #eee; border: 1px solid #ccc; padding: 5px;">
								<p>Frequently Asked Questions</p>
							</div>
						'),
					Carbon_Field::factory('text', 'section_id')
						->help_text('Optional. <br/>Must be unique!'),
					Carbon_Field::factory('select', 'faqs_to_show')
						->add_options( crb_get_terms_array('crb_faq_categories', 'slug', array('hide_empty' => 0), array( 'all', 'All FAQs' ) ) )
						->help_text('You can manage the FAQs and their categories through <a target="_blank" href="'.home_url('/wp-admin/edit.php?post_type=crb_faq').'">FAQs</a> admin area')
				))
			->add_fields('image_regular', 'Image', array(
					Carbon_Field::factory('html', 'info_html')
						->set_html('
							<div style="position: relative;  background: #eee; border: 1px solid #ccc; padding: 5px;">
								<p>Image which is not full width stretch.</p>
							</div>
						'),
					Carbon_Field::factory('text', 'section_id')
						->help_text('Optional. <br/>Must be unique!'),
					Carbon_Field::factory('select', 'section_color')
                                        ->add_options(array('default' => 'Default', 'white' => 'White', 'dark' => 'Dark', 'orange' => 'Orange','yellow' => 'Yellow')),
					Carbon_Field::factory('attachment', 'image')
						->set_required( true ),
				))
			->add_fields('buttons_content', 'Content with right image buttons', array(
					Carbon_Field::factory('html', 'info_html')
						->set_html('
							<div style="position: relative;  background: #eee; border: 1px solid #ccc; padding: 5px;">
								<p>Content with right image buttons</p>
							</div>
						'),
					Carbon_Field::factory('text', 'section_id')
						->help_text('Optional. <br/>Must be unique!'),
					Carbon_Field::factory('text', 'label'),
					Carbon_Field::factory('rich_text', 'text'),
					Carbon_Field::factory('complex', 'buttons')
						->set_layout(Carbon_Field_Complex::LAYOUT_LIST)
						->add_fields(array(
							Carbon_Field::factory('text', 'link'),
							Carbon_Field::factory('attachment', 'image')
								->set_help_text( 'Recommended image size 183xAuto pixels.')
								->set_required( true ),
						)),
				))
			->add_fields('image_with_content', 'Content with image', array(
					Carbon_Field::factory('html', 'info_html')
						->set_html('
							<div style="position: relative;  background: #eee; border: 1px solid #ccc; padding: 5px;">
								<p>Content with image</p>
							</div>
						'),
					Carbon_Field::factory('text', 'section_id')
						->help_text('Optional. <br/>Must be unique!'),
					Carbon_Field::factory('select', 'section_color')
						->add_options(array('default' => 'Default', 'white' => 'White', 'dark' => 'Dark','yellow' => 'Yellow')),
					Carbon_Field::factory('select', 'image_alignment')
						->add_options(array('left' => 'Left', 'right' => 'Right')),
					Carbon_Field::factory('rich_text', 'text'),
					Carbon_Field::factory('attachment', 'image')
						->set_help_text( 'Recommended image size 450xAuto pixels.')
				))
			->add_fields('general_content', 'General Content', array(
					Carbon_Field::factory('html', 'info_html')
						->set_html('
							<div style="position: relative;  background: #eee; border: 1px solid #ccc; padding: 5px;">
								<p>General Content </p>
							</div>
						'),
					Carbon_Field::factory('text', 'section_id')
						->help_text('Optional. <br/>Must be unique!'),
					Carbon_Field::factory('select', 'section_color')
						->add_options(array('default' => 'Default', 'white' => 'White', 'dark' => 'Dark','yellow' => 'Yellow')),
					Carbon_Field::factory('rich_text', 'text')
				))
			->add_fields('content_image', 'Content Image', array(
					Carbon_Field::factory('html', 'info_html')
						->set_html('
							<div style="position: relative;  background: #eee; border: 1px solid #ccc; padding: 5px;">
								<p>Content Image</p>
							</div>
						'),
					Carbon_Field::factory('text', 'section_id')
						->help_text('Optional. <br/>Must be unique!'),
					Carbon_Field::factory('attachment', 'image')
						->set_help_text( 'Recommended image size 1920xAuto pixels.')
				))
			->add_fields('text_contents', 'Texts Sections', array(
					Carbon_Field::factory('html', 'info_html')
						->set_html('
							<div style="position: relative;  background: #eee; border: 1px solid #ccc; padding: 5px;">
								<p>Texts Sections</p>
							</div>
						'),
					Carbon_Field::factory('text', 'section_id')
						->help_text('Optional. <br/>Must be unique!'),
					Carbon_Field::factory('select', 'section_color')
                                        ->add_options(array('default' => 'Default', 'white' => 'White', 'dark' => 'Dark', 'orange' => 'Orange','yellow' => 'Yellow')),
					Carbon_Field::factory('complex', 'texts')
						->add_fields(array(
							Carbon_Field::factory('rich_text', 'text'),
						)),
				))
			->add_fields('menu', 'Menu', array(
					Carbon_Field::factory('html', 'info_html')
						->set_html('
							<div style="position: relative;  background: #eee; border: 1px solid #ccc; padding: 5px;">
								<p>Menu Sections</p>
							</div>
						'),
					Carbon_Field::factory('text', 'section_id')
						->help_text('Optional. <br/>Must be unique!'),
					Carbon_Field::factory('set', 'enable_section')->add_options(array('enable' => 'Enable'))
				))
			->add_fields('lists', 'Lists', array(
					Carbon_Field::factory('html', 'info_html')
						->set_html('
							<div style="position: relative;  background: #eee; border: 1px solid #ccc; padding: 5px;">
								<p>Lists. The lists a managed through <a target="_blank" href="'.home_url('/wp-admin/edit.php?post_type=crb_lists').'">WP Admin Panel -> Lists Entries</a></p>
							</div>
						'),
					Carbon_Field::factory('text', 'section_id')
						->help_text('Optional. <br/>Must be unique!'),
					Carbon_Field::factory('select', 'section_color')
                                        ->add_options(array('dark' => 'Dark', 'orange' => 'Orange','yellow' => 'Yellow')),
					Carbon_Field::factory('complex', 'entries', 'Lists')
						->add_fields(array(
							Carbon_Field::factory('select', 'list')
								->add_options( crb_get_posts_array('crb_lists') ),
						)),
				))
			->add_fields('catering_form', 'Catering Request Form', array(
					Carbon_Field::factory('html', 'info_html')
						->set_html('
							<div style="position: relative;  background: #eee; border: 1px solid #ccc; padding: 5px;">
								<p>Catering Request Form</p>
							</div>
						'),
					Carbon_Field::factory('text', 'section_id')
						->help_text('Optional. <br/>Must be unique!'),
					Carbon_Field::factory('set', 'enable_section')->add_options(array('enable' => 'Enable'))
				))
	));

Carbon_Container::factory('custom_fields', 'Post Options')
	->show_on_post_type( 'post' ) 
	->add_fields(array(
			Carbon_Field::factory('text', 'crb_subtitle', 'Post Subtitle')
				->set_help_text( 'This title will be visible on the post\'s single page.'),
			Carbon_Field::factory('text', 'crb_source', 'Source'),
			Carbon_Field::factory('text', 'crb_source_link', 'Source Link'),
		));

/*******************************************
	Post Types
********************************************/

// front sldies
Carbon_Container::factory('custom_fields', 'Front Slides Properties')
	->show_on_post_type('crb_front_slides')
	->add_fields(array(
		Carbon_Field::factory('complex', 'crb_sliders', 'Slides')
			->set_layout(Carbon_Field_Complex::LAYOUT_LIST)
			->add_fields(array(
				Carbon_Field::factory('text', 'link')
					->help_text('Optional.'),
				Carbon_Field::factory('attachment', 'image')
					->set_help_text( 'Recommended image size 1920x747 pixels.')
					->set_required( true )
			)),
	));

// slides
Carbon_Container::factory('custom_fields', 'Predefined Slides Properties')
	->show_on_post_type('crb_content_slides')
	->add_fields(array(
		Carbon_Field::factory('complex', 'crb_slides', 'Slides')
			->add_fields(array(
				Carbon_Field::factory('attachment', 'image')
					->set_help_text( 'Recommended image size 600x400 pixels.')
					->set_required( true ),
			)),
	));

// faqs
Carbon_Container::factory('custom_fields', 'FAQ Properties')
	->show_on_post_type('crb_faq')
	->add_fields(array(
		Carbon_Field::factory('textarea', 'crb_faq_content', 'Content')
			->set_height(75)
	));

// menus
Carbon_Container::factory('custom_fields', 'Menu Properties')
	->show_on_post_type('crb_menu')
	->add_fields(array(
		Carbon_Field::factory('complex', 'crb_information', 'Information Fields')
			->set_layout(Carbon_Field_Complex::LAYOUT_LIST)
			->add_fields(array(
				Carbon_Field::factory('text', 'text', 'Label'),
				Carbon_Field::factory('text', 'value'),
			)),
	));


$positions = array( 'left', 'middle', 'right' );
$fields = array();
$fields[] = Carbon_Field::factory('file', 'crb_list_pdf', 'PDF File')
	->help_text('Optional. If PDF file is sec then the section label will links to the file isntead to the list entries.');
$fields[] = Carbon_Field::factory('rich_text', 'crb_list_bottom_content', 'Below List Content');
foreach ($positions as $loop_id => $key) {
	$fields[] = Carbon_Field::factory('separator', 'sep' . $loop_id, ucfirst($key) . ' Column');
	$fields[] = Carbon_Field::factory('complex', 'crb_list_'.$key.'_items', 'Items')
					->set_layout(Carbon_Field_Complex::LAYOUT_LIST)
					->add_fields('accordion',array(
						Carbon_Field::factory('html', 'info_html')
							->set_html('
								<div style="position: relative;  background: #eee; border: 1px solid #ccc; padding: 5px;">
									<p>Accordion</p>
								</div>
							'),
						Carbon_Field::factory('text', 'list_id'),
						Carbon_Field::factory('text', 'label'),
						Carbon_Field::factory('complex', 'items')
							// ->set_layout(Carbon_Field_Complex::LAYOUT_LIST)
							->add_fields(array(
									Carbon_Field::factory('text', 'text'),
									Carbon_Field::factory('file', 'link', 'File')
										->help_text('Optional')
								)),
					))
					->add_fields('list', array(
						Carbon_Field::factory('html', 'info_html')
							->set_html('
								<div style="position: relative;  background: #eee; border: 1px solid #ccc; padding: 5px;">
									<p>List</p>
								</div>
							'),
						Carbon_Field::factory('text', 'list_dependency_id'),
						Carbon_Field::factory('complex', 'items')
							// ->set_layout(Carbon_Field_Complex::LAYOUT_LIST)
							->add_fields(array(
									Carbon_Field::factory('text', 'text'),
									Carbon_Field::factory('file', 'link', 'File')
										->help_text('Optional')
								)),
					));
}
Carbon_Container::factory('custom_fields', 'List Properties')
	->show_on_post_type('crb_lists')
	->add_fields( $fields );

<?php 
Carbon_Container::factory('term_meta', __('Category Properties', 'driven'))
	->show_on_taxonomy(array('crb_menu_categories'))
	->add_fields(array(
		Carbon_Field::factory('text', 'crb_tax_link', 'Category Link' )
			->help_text('Optional.')
	));

<?php
/**
 * Custom Post Types
 *
 * @package WordPress
 * @subpackage cebo
 * @since Dream Home 1.0
 */
 
///////////////////////////////////////////////////////////////////////////// Custom Post Type

add_action('init', 'project_items');

function project_items()
{
  $labels = array(
    'name' => _x('Features', 'post type general name'),
    'singular_name' => _x('Features', 'post type singular name'),
    'add_new' => _x('Add New', 'Feature'),
    'add_new_item' => __('Add New Feature'),
    'edit_item' => __('Edit Feature'),
    'new_item' => __('New Feature'),
    'view_item' => __('View Feature'),
    'search_items' => __('Search Features'),
    'not_found' =>  __('No Feature found'),
    'not_found_in_trash' => __('No Feature found in Trash'),
    'parent_item_colon' => ''
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'features' ),
    'capability_type' => 'post',
    'menu_icon' => get_bloginfo('template_url').'/options/images/icon_project.png',
    'hierarchical' => false,
    'menu_position' => null,
    'taxonomies' => array('category'),
    'supports' => array('title','custom-fields','editor','category','author','thumbnail')
  );
  register_post_type('features',$args);
}




add_action( 'init', 'createdr_post_types' );
function createdr_post_types() {
  register_post_type( 'menues',
    array(
      'labels' => array(
        'name' => __( 'Menu Items' ),
        'singular_name' => __( 'Menu Items' )
      ),
      'public' => true,
      'rewrite' => array('slug' => 'menues'),
      'taxonomies' => array('category'),
      'menu_icon' => get_bloginfo('template_url').'/options/images/icon_team.png',
      'supports' => array('title','custom-fields','editor','category','author','thumbnail')
    )
 );
}

add_action( 'init', 'creategs_post_types' );
function creategs_post_types() {
  register_post_type( 'garnis',
    array(
      'labels' => array(
        'name' => __( 'Garnishes' ),
        'singular_name' => __( 'Garnishes' )
      ),
      'public' => true,
      'rewrite' => array('slug' => 'garnishes'),
      'taxonomies' => array('ingred'),
      'menu_icon' => get_bloginfo('template_url').'/options/images/icon_project.png',
      'supports' => array('title','custom-fields','editor','category','author','thumbnail')
    )
  );
}

add_action( 'init', 'creategls_post_types' );
function creategls_post_types() {
  register_post_type( 'recipe',
    array(
      'labels' => array(
        'name' => __( 'Recipes' ),
        'singular_name' => __( 'Recipes' )
      ),
      'public' => true,
      'rewrite' => array('slug' => 'recipes'),
      'taxonomies' => array('ingred'),
      'menu_icon' => get_bloginfo('template_url').'/options/images/icon_project.png',
      'supports' => array('title','custom-fields','editor','category','author','thumbnail')
    )
  );
}



add_action( 'init', 'createdrs_post_types' );
function createdrs_post_types() {
  register_post_type( 'locales',
    array(
      'labels' => array(
        'name' => __( 'Locations' ),
        'singular_name' => __( 'Locations' )
      ),
      'public' => true,
      'rewrite' => array('slug' => 'locales'),
      'taxonomies' => array('category'),
      'menu_icon' => get_bloginfo('template_url').'/options/images/icon_team.png',
      'supports' => array('title','custom-fields','editor','category','author','thumbnail')
    )
 );
}


create_restlocs_taxonomies();

function create_restlocs_taxonomies()
{
  // Taxonomy for Location
  $labels = array(
    'name' => _x( 'State Locations', 'taxonomy general name' ),
    'singular_name' => _x( 'State Locations ', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search State Locations' ),
    'all_items' => __( 'All State Locations' ),
    'parent_item' => __( 'Parent State Locations' ),
    'parent_item_colon' => __( 'Parent State Locations:' ),
    'edit_item' => __( 'Edit State Locations' ),
    'update_item' => __( 'Update State Locations' ),
    'add_new_item' => __( 'Add New State Locations ' ),
    'new_item_name' => __( 'New State Locations Name' ),
  );  

  register_taxonomy('restloc', array('locales'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'restlocs' ),
  ));

}


create_restlocscity_taxonomies();

function create_restlocscity_taxonomies()
{
  // Taxonomy for Location
  $labels = array(
    'name' => _x( 'City Locations', 'taxonomy general name' ),
    'singular_name' => _x( 'City Locations Type', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search City Locations' ),
    'all_items' => __( 'All City Locations ' ),
    'parent_item' => __( 'Parent City Locations ' ),
    'parent_item_colon' => __( 'Parent City Locations:' ),
    'edit_item' => __( 'Edit City Locations' ),
    'update_item' => __( 'Update City Locations' ),
    'add_new_item' => __( 'Add New City Locations ' ),
    'new_item_name' => __( 'New City Locations Name' ),
  );  

  register_taxonomy('restlocscity', array('locales'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'restlocs-city' ),
  ));

}


add_action( 'init', 'creates_post_types' );
function creates_post_types() {
  register_post_type( 'jobops',
    array(
      'labels' => array(
        'name' => __( 'Jobs' ),
        'singular_name' => __( 'Jobs' )
      ),
      'public' => true,
      'rewrite' => array('slug' => 'jobops'),
      'taxonomies' => array('category'),
      'menu_icon' => get_bloginfo('template_url').'/options/images/icon_team.png',
      'supports' => array('title','custom-fields','editor','category','author','thumbnail')
    )
  );
}


//create taxonomy for project type

create_type_taxonomies();

include(TEMPLATEPATH . '/options/secondary-panel.php'); 

function create_type_taxonomies()
{
  // Taxonomy for Location
  $labels = array(
    'name' => _x( 'Menu Type', 'taxonomy general name' ),
    'singular_name' => _x( 'Menu Type', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Menu Types' ),
    'all_items' => __( 'All Menu Types' ),
    'parent_item' => __( 'Parent Menu Type' ),
    'parent_item_colon' => __( 'Parent Menu Type:' ),
    'edit_item' => __( 'Edit Menu Type' ),
    'update_item' => __( 'Update Menu Type' ),
    'add_new_item' => __( 'Add New Menu Type' ),
    'new_item_name' => __( 'New Menu Type Name' ),
  ); 	

  register_taxonomy('menutype', array('menues'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'menu-type' ),
  ));

}

create_ingtype_taxonomies();

function create_ingtype_taxonomies()
{
  // Taxonomy for Location
  $labels = array(
    'name' => _x( 'Ingredients', 'taxonomy general name' ),
    'singular_name' => _x( 'Ingredients', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Ingredients' ),
    'all_items' => __( 'All Ingredients' ),
    'parent_item' => __( 'Parent Ingredients' ),
    'parent_item_colon' => __( 'Parent Ingredients:' ),
    'edit_item' => __( 'Edit Ingredients' ),
    'update_item' => __( 'Update Ingredients' ),
    'add_new_item' => __( 'Add New Ingredients' ),
    'new_item_name' => __( 'New Ingredients Name' ),
  ); 	

  register_taxonomy('ingred', array('menues'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'ingred-type' ),
  ));

}



create_locs_taxonomies();

function create_locs_taxonomies()
{
  // Taxonomy for Location
  $labels = array(
    'name' => _x( 'Job Locations', 'taxonomy general name' ),
    'singular_name' => _x( 'Job Locations Type', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Job Locations Types' ),
    'all_items' => __( 'All Job Locations Types' ),
    'parent_item' => __( 'Parent Job Locations Type' ),
    'parent_item_colon' => __( 'Parent Job Locations Type:' ),
    'edit_item' => __( 'Edit Job Locations Type' ),
    'update_item' => __( 'Update Job Locations Type' ),
    'add_new_item' => __( 'Add New Job Locations Type' ),
    'new_item_name' => __( 'New Job Locations Type Name' ),
  );  

  register_taxonomy('jobloc', array('jobops'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'joblocs' ),
  ));

}


$parent_term = term_exists('type' ); // array is returned if taxonomy is given
$parent_term_id = $parent_term['term_id']; // get numeric term id
wp_insert_term(
  'Uncategorized', // the term 
  'type', // the taxonomy
  array(
    'description'=> 'uncategorized',
    'slug' => 'uncategorized',
    'parent'=> $parent_term_id
  )
);


function ingred_add_meta_fields( $taxonomy ) {
    ?>
    <div class="form-field term-group">
        <label for="my_field"><?php _e( 'Calories', 'my-plugin' ); ?></label>
        <input type="text" id="my_field" name="my_field" />
    </div>
    <?php
}
add_action( 'ingred_add_form_fields', 'ingred_add_meta_fields', 10, 2 );

function ingred_edit_meta_fields( $term, $taxonomy ) {
    $my_field = get_term_meta( $term->term_id, 'my_field', true );
    ?>
    <tr class="form-field term-group-wrap">
        <th scope="row">
            <label for="my_field"><?php _e( 'My Field', 'my-plugin' ); ?></label>
        </th>
        <td>
            <input type="text" id="my_field" name="my_field" value="<?php echo $my_field; ?>" />
        </td>
    </tr>
    <?php
}
add_action( 'ingred_edit_form_fields', 'ingred_edit_meta_fields', 10, 2 );

function ingred_save_taxonomy_meta( $term_id, $tag_id ) {
    if( isset( $_POST['my_field'] ) ) {
        update_term_meta( $term_id, 'my_field', esc_attr( $_POST['my_field'] ) );
    }
}
add_action( 'created_ingred', 'ingred_save_taxonomy_meta', 10, 2 );
add_action( 'edited_ingred', 'ingred_save_taxonomy_meta', 10, 2 );

function ingred_add_field_columns( $columns ) {
    $columns['my_field'] = __( 'Calories', 'my-plugin' );

    return $columns;
}
add_filter( 'manage_edit-ingred_columns', 'ingred_add_field_columns' );

function ingred_add_field_column_contents( $content, $column_name, $term_id ) {
    switch( $column_name ) {
        case 'my_field' :
            $content = get_term_meta( $term_id, 'my_field', true );
            break;
    }

    return $content;
}
add_filter( 'manage_ingred_custom_column', 'ingred_add_field_column_contents', 10, 3 );


?>
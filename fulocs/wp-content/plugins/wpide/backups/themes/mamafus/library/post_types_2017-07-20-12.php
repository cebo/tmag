<?php /* start WPide restore code */
                                    if ($_POST["restorewpnonce"] === "94237ba003fa236a40af2eb0142a298ea6a05a6614"){
                                        if ( file_put_contents ( "/home/lurnglie/public_html/talemag.com/fulocs/wp-content/themes/mamafus/library/post_types.php" ,  preg_replace("#<\?php /\* start WPide(.*)end WPide restore code \*/ \?>#s", "", file_get_contents("/home/lurnglie/public_html/talemag.com/fulocs/wp-content/plugins/wpide/backups/themes/mamafus/library/post_types_2017-07-20-12.php") )  ) ){
                                            echo "Your file has been restored, overwritting the recently edited file! \n\n The active editor still contains the broken or unwanted code. If you no longer need that content then close the tab and start fresh with the restored file.";
                                        }
                                    }else{
                                        echo "-1";
                                    }
                                    die();
                            /* end WPide restore code */ ?><?php
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


?>
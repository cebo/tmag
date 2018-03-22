











<?php

register_nav_menus( array(
    'primary' => __( 'Primary Navigation', 'cebo' ),
) );


register_nav_menus( array(
    'category' => __( 'Categorical Navigation', 'cebo' ),
) );


// Sidebar Activation

if ( function_exists('register_sidebar') )
register_sidebar(array('name'=>'Sidebar',
'before_widget' => '<div class="widgets">',
'after_widget' => '<div class="clear"></div></div>',
'before_title' => '<h2>',
'after_title' => '</h2>',
));

if ( function_exists('register_sidebar') )
register_sidebar(array('name'=>'Footer Column 1',
'before_widget' => '',
'after_widget' => '',
'before_title' => '<h3>',
'after_title' => '</h3>',
));


if ( function_exists('register_sidebar') )
register_sidebar(array('name'=>'Footer Column 2',
'before_widget' => '',
'after_widget' => '',
'before_title' => '<h3>',
'after_title' => '</h3>',
));

if ( function_exists('register_sidebar') )
register_sidebar(array('name'=>'Footer Column 3',
'before_widget' => '',
'after_widget' => '',
'before_title' => '<h3>',
'after_title' => '</h3>',
));


/* this is for the image grabber 

*/
// Pull an image/post ID from the media gallery
function sp_get_image_id($num = 0) {
    global $post;
    $children = get_children(array(
        'post_parent' => $post->ID,
        'post_type' => 'attachment',
        'post_mime_type' => 'image',
        'orderby' => 'menu_order',
        'order' => 'ASC'
    ));

    $count = 0;
    foreach ((array)$children as $key => $value) {
        $images[$count] = $value;
        $count++;
    }
    if(isset($images[$num]))
        return $images[$num]->ID;
    else
        return false;
}

// Pull an image URL from the media gallery
function sp_get_image($num = 0) {
    global $post;
    $children = get_children(array(
        'post_parent' => $post->ID,
        'post_type' => 'attachment',
        'post_mime_type' => 'image',
        'orderby' => 'menu_order',
        'order' => 'ASC'
    ));

    $count = 0;
    foreach ((array)$children as $key => $value) {
        $images[$count] = $value;
        $count++;
    }
    if(isset($images[$num]))
        return wp_get_attachment_url($images[$num]->ID);
    else
        return false;
}
/* Determine how many words are in an excerpt and what the (Read More) link looks like */

function new_excerpt_length($length) {
    return 70;
}
add_filter('excerpt_length', 'new_excerpt_length');

function new_excerpt_more($post) {
    return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');

function excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  } 
  $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
  return $excerpt;
}

function content($limit) {
  $content = explode(' ', get_the_content(), $limit);
  if (count($content)>=$limit) {
    array_pop($content);
    $content = implode(" ",$content).'...';
  } else {
    $content = implode(" ",$content);
  } 
  $content = preg_replace('/\[.+\]/','', $content);
  $content = apply_filters('the_content', $content); 
  $content = str_replace(']]>', ']]&gt;', $content);
  return $content;
}

/* ==================================== */

if ( function_exists( 'add_theme_support' ) ) { // WP 2.9 Post Thumbnail Feature
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 115, 115, true ); // Normal Post Thumbnail
    add_image_size( 'featured-properties-thumbnail', 290, 200, true ); // Home Page Featured Property Thumbnail
    add_image_size( 'listing-photo-thumbnail', 110, 80, true ); // Property Listing Thumbnail
    add_image_size( 'archive-photo-thumbnail', 225, 150, true ); // Archive Listing Thumbnail
}

function get_page_with_template($template) {
    $pages = get_pages();
    foreach($pages as $p) {
        $meta = get_post_custom_values("_wp_page_template",$p->ID);
        if($meta[0] == $template.".php") {
            return $p->ID;
        }
    }
    return false;
}

function url_get_contents ($Url) {
    if (!function_exists('curl_init')){ 
        die('CURL is not installed!');
    }
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $Url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $output = curl_exec($ch);
    curl_close($ch);
    return $output;
}

function feedFilter($query) {
    if ($query->is_feed) {
        add_filter('rss2_item', 'feedContentFilter');
        }
    return $query;
}
add_filter('pre_get_posts','feedFilter');
 
function feedContentFilter($item) {

    global $post;

    $args = array(
        'order'          => 'ASC',
        'post_type'      => 'attachment',
        'post_parent'    => $post->ID,
        'post_mime_type' => 'image',
        'post_status'    => null,
        'numberposts'    => 1,
    );
    $attachments = get_posts($args);
    if ($attachments) {
        foreach ($attachments as $attachment) {
            $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full");
            $mime = get_post_mime_type($attachment->ID);
        }
    }
    $imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full");
    if ($imgsrc) {
        echo '<enclosure url="'.$imgsrc [0].'" length="" type="'.$mime.'"/>';
    } 
    return $item;
}



add_filter( 'post_thumbnail_html', 'remove_width_attribute', 10 );
add_filter( 'image_send_to_editor', 'remove_width_attribute', 10 );

function remove_width_attribute( $html ) {
   $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
   return $html;
}


add_filter('next_posts_link_attributes', 'posts_link_attributes_1');
add_filter('previous_posts_link_attributes', 'posts_link_attributes_2');

function posts_link_attributes_1() {
    return 'class="gohead"';
}
function posts_link_attributes_2() {
    return 'class="gohead"';
}

function custom_tag_cloud_widget($args) {
    $args['number'] = 0; //adding a 0 will display all tags
    $args['largest'] = 18; //largest tag
    $args['smallest'] = 10; //smallest tag
    $args['unit'] = 'px'; //tag font unit
    $args['format'] = 'list'; //ul with a class of wp-tag-cloud
    return $args;
}
add_filter( 'widget_tag_cloud_args', 'custom_tag_cloud_widget' );



if (!is_admin()) add_action("wp_enqueue_scripts", "my_jquery_enqueue", 11);
function my_jquery_enqueue() {
   wp_deregister_script('jquery');
   wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js", false, null);
   wp_enqueue_script('jquery');
}



// Removed shortcodes from the content
function  strip_shortcode_gallery( $content ) {
    preg_match_all( '/'. get_shortcode_regex() .'/s', $content, $matches, PREG_SET_ORDER );
    if ( ! empty( $matches ) ) {
        foreach ( $matches as $shortcode ) {
            if ( 'gallery' === $shortcode[2] ) {
                $pos = strpos( $content, $shortcode[0] );
                if ($pos !== false)
                    return substr_replace( $content, '', $pos, strlen($shortcode[0]) );
            }
        }
    }
    return $content;
};

// Get attached images & spits out a list of them.
function nerdy_get_images($size = 'thumbnail', $limit = '0', $offset = '0') {
    global $post;
    $images = get_children( array('post_parent' => $post->ID, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => 'ASC', 'orderby' => 'menu_order ID') );
    if ($images) {
        $num_of_images = count($images);
        if ($offset > 0) : $start = $offset--; else : $start = 0; endif;
        if ($limit > 0) : $stop = $limit+$start; else : $stop = $num_of_images; endif;
        $i = 0;
        foreach ($images as $image) {
            if ($start <= $i and $i < $stop) {
            $img_title = $image->post_title;   // title.
            $img_description = $image->post_content; // description.
            $img_caption = $image->post_excerpt; // caption.
            $img_url = wp_get_attachment_url($image->ID); // url of the full size image.
            $preview_array = image_downsize( $image->ID, $size );
            $img_preview = $preview_array[0]; // thumbnail or medium image to use for preview.
            ?>
            <li>
                <a href="<?php echo $img_url; ?>"><img src="<?php echo $img_preview; ?>" alt="<?php echo $img_caption; ?>" title="<?php echo $img_title; ?>"></a>
            </li>
            <?
            }
            $i++;
        }
    }
}

function get_post_gallery_imagess() {
    $attachment_ids = array();
    $pattern = get_shortcode_regex();
    $images = array();
    if (preg_match_all( '/'. $pattern .'/s', get_the_content(), $matches ) ) {
        //finds the "gallery" shortcode and puts the image ids in an associative array at $matches[3]
        $count = count($matches[3]);      //in case there is more than one gallery in the post.
        for ($i = 0; $i < $count; $i++){
            $atts = shortcode_parse_atts( $matches[3][$i] );
            if ( isset( $atts['ids'] ) ){
                $attachment_ids = explode( ',', $atts['ids'] );
                $attachementsCount = count($attachment_ids);
                if ($attachementsCount > 0){
                    for ($j = 0; $j < $attachementsCount ; $j++) { 
                        $image = array();
                        $attachmentId = intval($attachment_ids[$j]);
                        $image['id'] = $attachmentId;
                        $image['full'] = wp_get_attachment_image_src($attachmentId, 'full');
                        $image['medium'] = wp_get_attachment_image_src($attachmentId, 'medium');
                        $image['thumbnail'] = wp_get_attachment_image_src($attachmentId, 'thumbnail');
                        $image['captioner'] = wp_get_attachment_metadata($attachmentId, true);
                        array_push($images, $image);
                    }
                }
            }
        }
    }
    return $images;
}

add_filter('show_admin_bar', '__return_false');


if ( !function_exists('ss_framework_admin_scripts') ) {

    // Backend Scripts
    function ss_framework_admin_scripts( $hook ) {

        if( $hook == 'post.php' || $hook == 'post-new.php' ) {
            wp_register_script( 'tinymce_scripts', SS_BASE_URL . 'library/tinymce/js/scripts.js', array('jquery'), false, true );
            wp_enqueue_script('tinymce_scripts');
        }

    }
    add_action('admin_enqueue_scripts', 'ss_framework_admin_scripts');
    
}

function change_contact_info($contactmethods) {
    unset($contactmethods['aim']);
    unset($contactmethods['yim']);
    unset($contactmethods['jabber']);
    $contactmethods['website_title'] = 'Website Title';
    $contactmethods['twitter'] = 'Twitter';
    $contactmethods['facebook'] = 'Facebook';
    $contactmethods['linkedin'] = 'Linked In';
    $contactmethods['gplus'] = 'Google +';
    return $contactmethods;
}

add_filter('user_contactmethods','change_contact_info',10,1);


/* Adding Image Upload Fields */
add_action( 'show_user_profile', 'my_show_extra_profile_fields' );
add_action( 'edit_user_profile', 'my_show_extra_profile_fields' );

function my_show_extra_profile_fields( $user ) 
{ 
?>

    <h3>Profile Images</h3>

    <style type="text/css">
        .fh-profile-upload-options th,
        .fh-profile-upload-options td,
        .fh-profile-upload-options input {
            vertical-align: top;
        }

        .user-preview-image {
            display: block;
            height: auto;
            width: 300px;
        }

    </style>

    <table class="form-table fh-profile-upload-options">
        <tr>
            <th>
                <label for="image">Main Profile Image</label>
            </th>

            <td>
                <img class="user-preview-image" src="<?php echo esc_attr( get_the_author_meta( 'image', $user->ID ) ); ?>">

                <input type="text" name="image" id="image" value="<?php echo esc_attr( get_the_author_meta( 'image', $user->ID ) ); ?>" class="regular-text" />
                <input type='button' class="button-primary" value="Upload Image" id="uploadimage"/><br />

                <span class="description">Please upload an image for your profile.</span>
            </td>
        </tr>

        <tr>
            <th>
                <label for="image">Sidebar Profile Image</label>
            </th>

            <td>
                <img class="user-preview-image" src="<?php echo esc_attr( get_the_author_meta( 'sidebarimage', $user->ID ) ); ?>">

                <input type="text" name="sidebarimage" id="sidebarimage" value="<?php echo esc_attr( get_the_author_meta( 'sidebarimage', $user->ID ) ); ?>" class="regular-text" />
                <input type='button' class="button-primary" value="Upload Image" id="sidebarUploadimage"/><br />

                <span class="description">Please upload an image for the sidebar.</span>
            </td>
        </tr>
    </table>

    <script type="text/javascript">
        (function( $ ) {
            $( '#uploadimage' ).on( 'click', function() {
                tb_show('test', 'media-upload.php?type=image&TB_iframe=1');

                window.send_to_editor = function( html ) 
                {
                    imgurl = $( 'img',html ).attr( 'src' );
                    $( '#image' ).val(imgurl);
                    tb_remove();
                }

                return false;
            });

            $( 'input#sidebarUploadimage' ).on('click', function() {
                tb_show('', 'media-upload.php?type=image&TB_iframe=true');

                window.send_to_editor = function( html ) 
                {
                    imgurl = $( 'img', html ).attr( 'src' );
                    $( '#sidebarimage' ).val(imgurl);
                    tb_remove();
                }

                return false;
            });
        })(jQuery);
    </script>

<?php 
}



add_action( 'admin_enqueue_scripts', 'enqueue_admin' );

function enqueue_admin()
{
    wp_enqueue_script( 'thickbox' );
    wp_enqueue_style('thickbox');

    wp_enqueue_script('media-upload');
}

add_action( 'personal_options_update', 'my_save_extra_profile_fields' );
add_action( 'edit_user_profile_update', 'my_save_extra_profile_fields' );

function my_save_extra_profile_fields( $user_id ) {

    if ( !current_user_can( 'edit_user', $user_id ) )
{
        return false;
    }

update_user_meta( $user_id, 'image', $_POST[ 'image' ] );
    update_user_meta( $user_id, 'sidebarimage', $_POST[ 'sidebarimage' ] );
}


// Add to the body_class function
function condensed_body_class($classes) {
    global $post;
 
    // add a class for the name of the page - later might want to remove the auto generated pageid class which isn't very useful
    if( is_page()) {
        $pn = $post->post_name;
        $classes[] = "page_".$pn;
    }
 
    // add a class for the parent page name
    $post_parent = get_post($post->post_parent);
    $parentSlug = $post_parent->post_name;
    
    if ( is_page() && $post->post_parent ) {
            $classes[] = "parent_".$parentSlug;
    }
 
    // add class for the name of the custom template used (if any)
    $temp = get_page_template();
    if ( $temp != null ) {
        $path = pathinfo($temp);
        $tmp = $path['filename'] . "." . $path['extension'];
        $tn= str_replace(".php", "", $tmp);
        $classes[] = "template_".$tn;
    }
 
    return $classes;
 
}
 
add_filter('body_class', 'condensed_body_class');



add_filter('post_gallery', 'my_post_gallery', 10, 2);
function my_post_gallery($output, $attr) {
    global $post;

    if (isset($attr['orderby'])) {
        $attr['orderby'] = sanitize_sql_orderby($attr['orderby']);
        if (!$attr['orderby'])
            unset($attr['orderby']);
    }

    extract(shortcode_atts(array(
        'order' => 'ASC',
        'orderby' => 'menu_order ID',
        'id' => $post->ID,
        'itemtag' => 'dl',
        'icontag' => 'dt',
        'captiontag' => 'dd',
        'columns' => 3,
        'size' => 'thumbnail',
        'include' => '',
        'exclude' => ''
    ), $attr));

    $id = intval($id);
    if ('RAND' == $order) $orderby = 'none';

    if (!empty($include)) {
        $include = preg_replace('/[^0-9,]+/', '', $include);
        $_attachments = get_posts(array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby));

        $attachments = array();
        foreach ($_attachments as $key => $val) {
            $attachments[$val->ID] = $_attachments[$key];
        }
    }

    if (empty($attachments)) return '';

    // Here's your actual output, you may customize it to your need

    $output = "</div></article></section><div class=\"gallerybanner\">\n";
    $output .= "<div id=\"carousel-gallery\" class=\"touchcarousel  black-and-white\">\n";
    $output .= "<ul class=\"touchcarousel-container\">\n";

    // Now you loop through each attachment
    foreach ($attachments as $id => $attachment) {
        // Fetch the thumbnail (or full image, it's up to you)
//      $img = wp_get_attachment_image_src($id, 'medium');
//      $img = wp_get_attachment_image_src($id, 'my-custom-image-size');
        $img = wp_get_attachment_image_src($id, 'full');
        $caption =  $attachment->post_excerpt;

        $output .= "<li class=\"touchcarousel-item\">\n";
        $output .= "<a href=\"{$img[0]}\" data-title=\"{$caption}\" data-lightbox=\"gallery\"><img src=\"{$img[0]}\" alt=\"alternate text\" title=\"here is a title\" /></a>\n";
        $output .= "</li>\n";
    }

    $output .= "</ul></div></div>\n";
    $output .= "<section class=\"pagecopy nowreturn\"><article class=\"content\"><div>\n";

    return $output;
}



function format_comment($comment, $args, $depth) {
    
       $GLOBALS['comment'] = $comment; ?>
       
        <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
                
            <div class="comment-intro">
                <?php echo  get_avatar(get_comment_author_email($comment->comment_ID), 80); ?>
                <a class="comment-permalink" href="<?php echo htmlspecialchars ( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf(__('%1$s'), get_comment_date(), get_comment_time()) ?></a>
                <em>by</em> 
                <?php printf(__('%s'), get_comment_author_link()) ?>
            </div>
            
            <?php if ($comment->comment_approved == '0') : ?>
                <em><php _e('Your comment is awaiting moderation.') ?></em><br />
            <?php endif; ?>
            
            <div class="bubbletalk">
                <?php comment_text(); ?>
            </div>
            
            <div class="reply">
                <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
            </div>
        
<?php } ?>



<?php

add_action('do_meta_boxes', 'metabox_misfit_bannerimage');

function id_misfit_bannerimage() {
    $id = 'misfit_bannerimage';
    return $id;
}

function metabox_misfit_bannerimage() {
    $page = array('features', 'page', 'project');

    add_meta_box(id_misfit_bannerimage(), 'Mobile Banner Image', 'install_misfit_bannerimage', $page, 'side', 'low');
}

function install_misfit_bannerimage() {
    global $post;

    // Get WordPress' media upload URL
    $upload_link = esc_url( get_upload_iframe_src( 'image', $post->ID ) );

    // See if there's a media id already saved as post meta
    $your_img_id = get_post_meta( $post->ID, id_misfit_bannerimage(), true );

    // Get the image src
    $your_img_src = wp_get_attachment_image_src( $your_img_id, 'thumbnail' );

    // For convenience, see if the array is valid
    $you_have_img = is_array( $your_img_src );
    
    ?>

    <!-- Your image container, which can be manipulated with js -->
    <div class="custom-img-container">
        <div class="inline-img-container upload-banner-img" style="display: inline; cursor: pointer;">
            <?php if ( $you_have_img ) : ?>
                <img src="<?php echo $your_img_src[0] ?>" alt="" style="max-width:115px;" />
            <?php endif; ?>
        </div>
    </div>

    <!-- Your add & remove image links -->
    <p class="hide-if-no-js">
        <a class="upload-banner-img <?php if ( $you_have_img  ) { echo 'hidden'; } ?>" 
           href="<?php echo $upload_link ?>">
            <?php _e('Set Banner Image') ?>
        </a>
        <a class="delete-banner-img <?php if ( ! $you_have_img  ) { echo 'hidden'; } ?>" 
          href="#">
            <?php _e('Remove Banner Image') ?>
        </a>
    </p>

    <!-- A hidden input to set and post the chosen image id -->
    <input type="hidden" name="nonce_<?php echo id_misfit_bannerimage(); ?>" value="<?php echo wp_create_nonce(basename(__FILE__)); ?>" />
    <input class="banner-img-id" name="<?php echo id_misfit_bannerimage(); ?>" type="hidden" value="<?php echo esc_attr( $your_img_id ); ?>" />


    <script>
        jQuery(function($){

        // Set all variables to be used in scope
        var frame,
            metaBox = $('#<?php echo id_misfit_bannerimage(); ?>.postbox'), // Your meta box id here
            addImgLink = metaBox.find('.upload-banner-img'),
            delImgLink = metaBox.find( '.delete-banner-img'),
            imgContainer = metaBox.find( '.inline-img-container'),
            imgIdInput = metaBox.find( '.banner-img-id' );
          
        // ADD IMAGE LINK
        addImgLink.on( 'click', function( event ){

            event.preventDefault();

            // If the media frame already exists, reopen it.
            if ( frame ) {
                frame.open();
                return;
            }
            
            // Create a new media frame
            frame = wp.media({
                title: 'Banner Image',
                button: {
                    text: 'Set Banner Image'
                },
                multiple: false  // Set to true to allow multiple files to be selected
            });

            // When an image is selected in the media frame...
            frame.on( 'select', function() {

                // Get media attachment details from the frame state
                var attachment = frame.state().get('selection').first().toJSON();

                // Send the attachment URL to our custom image input field.
                imgContainer.append( '<img src="'+attachment.sizes.thumbnail.url+'" alt="" style="max-width:115px;"/>' );

                // Send the attachment id to our hidden input
                imgIdInput.val( attachment.id );

                // Hide the add image link
                addImgLink.addClass( 'hidden' );

                // Unhide the remove image link
                delImgLink.removeClass( 'hidden' );

            });

            // Finally, open the modal on click
            frame.open();
        });
          
          
        // DELETE IMAGE LINK
        delImgLink.on( 'click', function( event ){

            event.preventDefault();

            // Clear out the preview image
            imgContainer.html( '' );

            // Un-hide the add image link
            addImgLink.removeClass( 'hidden' );

            // Hide the delete image link
            delImgLink.addClass( 'hidden' );

            // Delete the image id from the hidden input
            imgIdInput.val( '' );

        });

        });
    </script>

<?php }

add_action('save_post', 'save_misfit_bannerimage');
// Save data from meta boxel
function save_misfit_bannerimage($post_id) {
    global $post;

    if (!wp_verify_nonce($_POST['nonce_' . id_misfit_bannerimage()], basename(__FILE__))) {
        return $post_id;
    }
    // check autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) { return $post_id;}

    // check permissions
    if ('page' == $_POST['post_type']) {
        if (!current_user_can('edit_page', $post_id)) {
            return $post_id;
        }
    } elseif (!current_user_can('edit_post', $post_id)) {
        return $post_id;
    }
    $old = get_post_meta($post_id, id_misfit_bannerimage(), true);
    $new = $_POST[id_misfit_bannerimage()];     
    if ($new && $new != $old) {
        update_post_meta($post_id, id_misfit_bannerimage(), $new);
    } elseif ('' == $new && $old) {
        delete_post_meta($post_id, id_misfit_bannerimage(), $old);
    }
}


require_once(TEMPLATEPATH . '/tcc.php');

function crb_init_theme() {
    # Enqueue jQuery
    wp_enqueue_script('jquery');

    if (is_admin()) { /* Front end scripts and styles won't be included in admin area */
        return;
    }

    # Enqueue Custom Scripts

    // enqueue js scripts
    crb_enqueue_scripts();

    // enqueque style files
    crb_enqueue_styles();
}

define('CRB_THEME_DIR', dirname(__FILE__) . DIRECTORY_SEPARATOR);
add_action('init', 'crb_init_theme');
add_action('after_setup_theme', 'crb_setup_theme');

# To override theme setup process in a child theme, add your own crb_setup_theme() to your child theme's
# functions.php file.
if (!function_exists('crb_setup_theme')) {
    function crb_setup_theme() {
        include_once(TEMPLATEPATH . '/lib/common.php');
        include_once(TEMPLATEPATH . '/lib/carbon-fields/carbon-fields.php');

        # Theme supports
        add_theme_support('automatic-feed-links');
        add_theme_support('post-thumbnails');
        
        # Manually select Post Formats to be supported - http://codex.wordpress.org/Post_Formats
        // add_theme_support( 'post-formats', array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat' ) );
        add_image_size( 'admin_thumbnails', 80, 50 );
        add_image_size( 'crb_section_buttons', 183, 0 );
        add_image_size( 'crb_section_slides', 600, 400 );
        add_image_size( 'crb_section_right_image', 449, 0 );
        add_image_size( 'crb_section_image', 1920, 0 );
        add_image_size( 'crb_section_menu', 351, 223 );
        add_image_size( 'crb_section_wide_slider', 1140, 350 );
        add_image_size( 'crb_front_slider', 1920, 747 );
        add_image_size( 'crb_testimonials', 200, 200 );
        
        

        # Register Theme Menu Locations
        add_theme_support('menus');
        register_nav_menus(array(
            'header-menu'=>__('Header Menu'),
            'footer-menu'=>__('Footer Menu')
        ));

        # Register CPTs
        include_once(TEMPLATEPATH . '/options/post-types.php');
        
        # Attach custom widgets
        include_once(TEMPLATEPATH. '/options/widgets.php');
        
        # |----------------------------------------------------------------------|
        # |----------------------------------------------------------------------|
        # Add Actions
        add_action('widgets_init', 'crb_widgets_init');

        add_action('carbon_register_fields', 'crb_attach_theme_options');
        add_action('carbon_after_register_fields', 'crb_attach_theme_help');

        // Removind the comments
        add_action( 'admin_menu', 'crb_comments_remove_admin_menus' );
        add_action('init', 'crb_comments_remove_comment_support', 100);
        add_action( 'wp_before_admin_bar_render', 'crb_comments_admin_bar_render' );

        // Admin columns
        add_action( 'admin_init' , 'crb_admin_columns' );

        // crb_wp_head hooks to wp_head before jquery
        add_action('wp_head', 'crb_wp_head', 8);

        // Notices
        add_action('admin_notices', 'crb_notices');

        // taxonomy register
        add_action( 'init', 'crb_taxonomies', 0 );

        # |----------------------------------------------------------------------|
        # |----------------------------------------------------------------------|
        # Add Filters

        // content fixes
        add_filter( 'the_content', 'crb_the_content', 99 );

        //Shortcode fixes
        remove_filter('the_content', 'wpautop');
        add_filter('the_content', 'wpautop', 11);

        // Gravity Forms
        if (function_exists('gravity_form')) {
            add_filter("gform_tabindex", "crb_gf_tab_func" );
            add_filter('gform_field_css_class', 'crb_gf_custom_input_css_class', 10, 3);
        }

        // Add specific CSS body class by filter
        add_filter('body_class','crb_body_class');

        # |----------------------------------------------------------------------|
        # |----------------------------------------------------------------------|
        # Shortcodes

        // [buttons-container] buttons content [/buttons-container]
        add_shortcode( 'buttons-container','crb_shortcode_buttons_container' );

        // [button link="#" label="label" target="_blank" color="orange" ]
        add_shortcode( 'button','crb_shortcode_button' );

    }
}

# Register Sidebars
# Note: In a child theme with custom crb_setup_theme() this function is not hooked to widgets_init
function crb_widgets_init() {
    register_sidebar(array(
        'name' => 'Default Sidebar',
        'id' => 'default-sidebar',
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h2 class="widgettitle">',
        'after_title' => '</h2>',
    ));
}

function crb_attach_theme_options() {
    # Attach fields
    include_once(TEMPLATEPATH . '/options/theme-options.php');
    include_once(TEMPLATEPATH . '/options/custom-fields.php');
    include_once(TEMPLATEPATH . '/options/taxonomy-fields.php');
}

function crb_attach_theme_help() {
    # Theme Help needs to be after options/theme-options.php
    // include_once(CRB_THEME_DIR . 'lib/theme-help/theme-readme.php');
}

function crb_enqueue_scripts(){
    // include your javascript files here
    $sdir = get_bloginfo('stylesheet_directory');

//    wp_enqueue_script('crb-gmap', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyAX_eQgjSW_68WsY4dTLztKhgNb5Kg4Mng&v=3.exp&libraries=places&sensor=false', array());
  //    wp_enqueue_script('crb-gplace', 'https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places', array());
//    wp_enqueue_script('crb-carouFredSel', $sdir . '/js/jquery.carouFredSel-6.2.1-packed.js', array('jquery'), '6.2.1');
//    wp_enqueue_script('crb-chosen', $sdir . '/js/chosen.jquery.min.js', array('jquery'), '0.10.0');
//    wp_enqueue_script('crb-colorbox-min', $sdir . '/js/jquery.colorbox-min.js', array('jquery'), '1.4.21');
 //   wp_enqueue_script('crb-infieldlabel', $sdir . '/js/jquery.infieldlabel.min.js', array('jquery'), '0.1');
//    wp_enqueue_script('mamafus', $sdir . '/js/mamafus.js', array('jquery','crb-gmap'), '1.0');
 //   wp_enqueue_script('mamafus-locations', $sdir . '/js/loc_list.js', array('jquery', 'crb-gmap', 'mamafus'), '0.1');
//    wp_enqueue_script('shadow', $sdir . '/js/shadowbox.js', array('jquery'), '0.1');
}

function crb_enqueue_styles(){
    // include your style files here
    $sdir = get_bloginfo('stylesheet_directory');
    wp_enqueue_style('crb-chosen', $sdir . '/chosen.css');
    wp_enqueue_style('crb-colorbox', $sdir . '/colorbox.css');
    wp_enqueue_style('shadowbox', $sdir . '/shadowbox.css');
    wp_enqueue_style('crb-style', $sdir . '/style.css', array(), '1.2', 'all');
}

/**

*/
// FILTERS

function crb_the_content( $content ){
    // IMAGE PARAGRAPH FIX
    // removed the empty paragraphs around the images if there is only an image inside
    // $content = preg_replace( '~<p[^>]*>\s*(<img[^>]+>)\s*</p>~i', '$1', $content );

    // SHORTCODE PARAGRAPH FIX
    $array = array (
        '<p>[' => '[', 
        ']</p>' => ']', 
        ']<br />' => ']'
    );
    $content = strtr($content, $array);

    return $content;
}

// GRAVITY FORMS
function crb_gf_tab_func(){
    static $tabindex = 0;
    $tabindex+=100;
    return $tabindex;
}

function crb_gf_custom_input_css_class($classes, $field, $form) {
    $classes .= ' gfield-' . $field['type'];
    return $classes;
}

// Add specific CSS body class by filter
function crb_body_class($classes) {

    if (is_page() && carbon_get_the_post_meta( 'crb_front_slider' ) ) {
        $classes[] = 'fullwidth-slider';
    }

    if ( is_page() && $template = get_post_meta( get_the_id(), '_wp_page_template', true ) ) {
        switch ($template) {
            case 'templates/template-order-now-one.php':
            case 'templates/template-order-now-two.php':
            case 'templates/template-order-now-three.php':
            case 'templates/template-locations-three.php':
                $classes[] = 'locations-center';
                break;
            case 'templates/template-locations-one.php':
            case 'templates/template-locations-two.php':
            case 'templates/template-locations.php':
                $classes[] = 'locations';
                break;
            default:
                break;
        }
    }

    return $classes;
}

/**

*/
// Actions

// Remove the comments

// Removes from admin menu
function crb_comments_remove_admin_menus() {
    remove_menu_page( 'edit-comments.php' );
}

// Removes from post and pages
function crb_comments_remove_comment_support() {
    remove_post_type_support( 'post', 'comments' );
    remove_post_type_support( 'page', 'comments' );
}

// Removes from admin bar
function crb_comments_admin_bar_render() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('comments');
}

// hook to wp_head
function crb_wp_head(){
    $js = '';
    $js .= 'window.stylesheet_directory = "'.get_bloginfo('stylesheet_directory').'"';

    echo '<script type="text/javascript">'.$js.'</script>';
}

// adds notice text to the admin area
function crb_notices(){
    $post_type = (isset($_GET['post_type']) && $_GET['post_type']) ? $_GET['post_type'] : null;

    if ($post_type) {
        if ($post_type=='crb_content_slides') {
            echo '<div class="updated"><p>This area contains predefined slides that might be used with the pages slides module.</p></div>';
        }
    }
}

/**

*/
// WP-Admin Panel Columns

// Manage Admin Panel Columns
function crb_admin_columns() {
    add_filter( 'manage_posts_columns' , 'crb_unset_admin_column' );
    add_filter( 'manage_pages_columns' , 'crb_unset_admin_column' );
    
    $crb_post_types = array('page','post', 'crb_menu', 'crb_front_slides', 'crb_content_slides' );
    foreach ($crb_post_types as $crb_pt) {
        add_filter('manage_'.$crb_pt.'_posts_columns', 'crb_wpadmin_columns', 5);
        add_action('manage_'.$crb_pt.'_posts_custom_column', 'crb_wpadmin_custom_columns', 5, 2);
    }

    $crb_taxonomies = array('crb_menu_categories');
    foreach ($crb_taxonomies as $tax) {
        add_filter('manage_edit-'.$tax.'_columns', 'crb_wp_admin_terms_columns');  
        add_filter('manage_'.$tax.'_custom_column', 'crb_wp_admin_terms_custom_columns', 5, 3); 
    }
}

// Unset some of the default columns
function crb_unset_admin_column( $columns ) {
    
    // artist, page
    if (isset($_GET['post_type']) && in_array($_GET['post_type'], array('page', 'crb_faq', 'crb_content_slides', 'crb_front_slides', 'crb_menu', 'crb_lists')) ) {
        unset($columns['date']);
        unset($columns['author']);
    }
    return $columns;
}

// Add Nw Columns
function crb_wpadmin_columns($defaults){
    // pages
    if (isset($_GET['post_type']) && $_GET['post_type']=='page') {
        $defaults['crb_template'] = 'Template';
    }

    // Front Slides
    if (isset($_GET['post_type']) && $_GET['post_type']=='crb_front_slides') {
        $defaults['crb_front_slides'] = 'Slides';
        return $defaults;
    }

    // Content Slides
    if (isset($_GET['post_type']) && $_GET['post_type']=='crb_content_slides') {
        $defaults['crb_content_slides'] = 'Slides';
        return $defaults;
    }

    // all post types
    $defaults['crb_thumbnail'] = '<style type="text/css" media="screen">.column-crb_thumbnail {width:80px}</style>Thumbnail';
    return $defaults;
}

function crb_wpadmin_custom_columns($column_name, $id){
    switch ($column_name) {
        case 'crb_thumbnail':
            $image = wp_get_attachment_image_src(get_post_thumbnail_id($id), 'admin_thumbnails');
            if ($image) {
                echo '<img style="max-width:80px; height:auto" src="'.$image[0].'" alt="" />';
            }
            break;
        case 'crb_template':
            echo ucwords( crb_get_template_name($id) );
            break;
        case 'crb_front_slides':
        case 'crb_content_slides':
            $images = carbon_get_post_meta($id, ($column_name=='crb_front_slides' ? 'crb_sliders' : 'crb_slides') , 'complex');
            if ($images) {
                foreach ($images as $loop_id => $data) {
                    $img_obj = wp_get_attachment_image_src($data['image'], 'admin_thumbnails');
                    if ($img_obj && isset($img_obj[0])) {
                        echo '<img style="padding:5px; margin:5px; border:1px solid #000" src="'.$img_obj[0].'" alt="" />';
                    }
                }
            }
            break;
        default:
            //
            break;
    }
}


// Taxonomy columns
function crb_wp_admin_terms_columns($defaults){
    // all post types
    $defaults['has_link'] = 'Has Link';
    return $defaults;
}

function crb_wp_admin_terms_custom_columns($c, $column_name, $term_id){
    switch ($column_name) {
        case 'has_link':
            $link = carbon_get_term_meta($term_id,'crb_tax_link');
            echo $link ? '<a target="_blank" href="' . $link . '">Yes</a>' : '<span style="color:red">No</span>';
            break;
        default:
            //
            break;
    }
}

/**

*/
// Register additional taxonomies
function crb_taxonomies(){
    $taxonomies = array(
        array(
            'post_type' => 'crb_faq',
            'name' => 'crb_faq_categories',
            'slug' => 'faq-category',
            'menu_label' => 'FAQ Categories',
            'singular' => 'Category',
            'plural' => 'Categories',
        ),
        array(
            'post_type' => 'crb_menu',
            'name' => 'crb_menu_categories',
            'slug' => 'menu-category',
            'menu_label' => 'Menu Categories',
            'singular' => 'Category',
            'plural' => 'Categories',
        )
    );

    foreach ($taxonomies as $tax) {
        $args = array(
            'hierarchical'        => true,
            'labels'              => crb_taxonomy_labels( $tax['menu_label'], $tax['singular'], $tax['plural'] ),
            'show_ui'             => true,
            'show_admin_column'   => true,
            'query_var'           => true,
            'rewrite'             => array( 'slug' => $tax['slug'] )
        );
        register_taxonomy( $tax['name'], array( $tax['post_type'] ), $args );
    }
}

function crb_taxonomy_labels( $menu_label = 'Categories', $singular = 'Category', $plural = 'Categories' ){
    return array(
        'name'                => _x( $plural, 'taxonomy general name' ),
        'singular_name'       => _x( $singular, 'taxonomy singular name' ),
        'search_items'        => __( 'Search '.$plural.'' ),
        'all_items'           => __( 'All '.$plural.'' ),
        'parent_item'         => __( 'Parent '.$singular.'' ),
        'parent_item_colon'   => __( 'Parent '.$singular.':' ),
        'edit_item'           => __( 'Edit '.$singular.'' ), 
        'update_item'         => __( 'Update '.$singular.'' ),
        'add_new_item'        => __( 'Add New '.$singular.'' ),
        'new_item_name'       => __( 'New '.$singular.' Name' ),
        'menu_name'           => __( $menu_label )
    ); 
}

/**

*/
// Shortcodes

// [buttons-container] buttons content [/buttons-container]
function crb_shortcode_buttons_container( $atts, $content ) {
    return '<div class="btns">'.do_shortcode($content).'</div>';
}

// [button link="#" label="label" target="_blank" color="orange" ]
function crb_shortcode_button( $atts ) {
    $atts = extract( shortcode_atts( array( 
        'color'     => 'orange',
        'link'      => '#',
        'label'     => '',
        'target'    => '_self'
    ),$atts ) );

    return '<a target="'.$target.'" class="'.$color.'-btn" href="'.$link.'">'.$label.'</a>';
}

/**

*/
// Content Templates

// Templates
function crb_get_template( $template, $args = array() ) {
    extract( $args );
    include( locate_template( 'templates/'.$template . '.php' ) );
}

/**

*/
// SUPPORT FUNCTIONS

// ID FUNCTION - ALWAYS RETURNS AN ID.
function crb_get_post_id( $atts = array() ){
    $atts = extract( shortcode_atts( array( 
        'location'=>'any'
    ),$atts ) );

    if (is_single() || is_page()) {
        global $post;
        switch ($post->post_type) {
            case 'post':
                switch ($location) {
                    case 'sidebar':
                        $id = get_option('page_for_posts');
                        break;
                    default:
                        $id = $post->ID;
                        break;
                }
                break;
            default:
                $id = $post->ID;
                break;
        }
    }else{
        $id = get_option('page_for_posts');
    }

    return $id;
}

// multifunctional title function
function crb_get_title($atts = array()){
    $atts = extract( shortcode_atts( array( 
        'return'=>'echo',
        'tag'=>'h2',
        'id' => null,
        'container'=>false,
        'before'=>'',
        'after'=>'',
        'link'=>false,
        'class' => ''
    ),$atts ) );

    if (is_archive() && !$id ) {
        ob_start();
            if (is_category()) { ?>
                <?php single_cat_title(); ?>
            <?php } elseif( is_tag() ) { ?>
                <?php single_tag_title(); ?>
            <?php } elseif (is_day()) { ?>
                Archive for <?php the_time('F jS, Y'); ?>
            <?php } elseif (is_month()) { ?>
                Archive for <?php the_time('F, Y'); ?>
            <?php } elseif (is_year()) { ?>
                Archive for <?php the_time('Y'); ?>
            <?php } elseif (is_tax()) {
                $t = get_term_by('slug',get_query_var('term'),get_query_var('taxonomy'));
                echo $t->name . ' Category';
            } elseif (is_author()) { ?>
                Author Archive
            <?php } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
                Blog Archives
            <?php }
        $html = ob_get_clean();
        $title = $html;
    }elseif (is_404() && !$id ) {
        ob_start();
            _e('Error 404 - Not Found');
        $html = ob_get_clean();
        $title = $html;
    }elseif (is_search() && !$id ) {
        ob_start();
            _e('Search Results');
        $html = ob_get_clean();
        $title = $html;
    }else {
        global $post;
        if (!$id) $id = (is_page() || is_single()) ? $post->ID : get_option('page_for_posts');

        $title = apply_filters('the_title', get_the_title($id)  );
    }

    if (!$id) $id = get_option('page_for_posts');

    $title = '<'.$tag.' class="post-title post-title-' . $id . ' '.$class.'">' .($link ? '<a href="'.get_permalink($id).'">' : '' ) . $title . ($link ? '</a>' : '') .  '</'.$tag.'>';

    if ($container) $title = $before . $title . $after;

    if ($return=='echo') {
        echo $title;
    }else{
        return $title;
    }
}


// THUMBNAIL
function crb_get_thumbnail_src($id = null,$type='full') {
    global $post;
    $id = $id ? $id : $post->ID;
    $image = wp_get_attachment_image_src(get_post_thumbnail_id($id), $type);
    return $image[0];
}

// Yes No
function crb_yes_no($reverse = false){
    $array = array('Yes'=>'Yes','No'=>'No');
    return $reverse ? array_reverse($array) : $array;
}

// Returns an array with all entries from a specific post typ
function crb_get_posts_array($post_type = null){
    $return = array();
    $return[] = 'Please Select';
    if ($post_type) {
        $posts = get_posts(  array(
            'posts_per_page'    =>  -1,
            'post_type'         =>  $post_type
        ) );
        foreach ((array) $posts as $p) {
            $return[$p->ID] = $p->post_title;
        }
    }
    return $return;
}

// Returns an array with all terms
function crb_get_terms_array($term = 'category', $return = 'slug', $args = array(), $zero = true){
    $terms = get_terms($term, $args);
    $r = array();
    if ($zero) {
        if (is_array($zero)) {
            $r[ $zero[0] ] = $zero[1];
        }else{
            $r[] = 'Please Select';
        }
    }
    if (!empty($terms)) {
        foreach ($terms as $t) {
            $r[$t->$return] = $t->name;
        }
    }
    return $r;
}

// returns the real current template name.
function crb_template_name(){
    global $template;
    return basename($template);
}


//  returns posts meta source text
function crb_generate_post_meta( $id ){
    
    $time = get_the_time('F d, Y');
    $source_name = carbon_get_post_meta( $id, 'crb_source' );
    $source = '';

    if ( $source_name ){
        $source = '| ';

        $source_link = carbon_get_post_meta( $id, 'crb_source_link' );

        if ( $source_link ) {
            $source .= '<a target="_blank" href="'. esc_attr( $source_link ) .'">' . $source_name . '</a>';
        }else{
            $source .= $source_name;
        }
    }

    $meta = $time . $source . ' - ';

    return $meta;
}

//  returns blog post excerpt content with post source meta information
function crb_generate_content(){
    $meta = crb_generate_post_meta( get_the_ID() );

    $excerpt = get_the_content('');
    $content = $meta . $excerpt;

    return $content;
}

// returns page template name
function crb_get_template_name( $id = null ){
    $template = get_post_meta( $id, '_wp_page_template', true );
    $template = str_replace( array('.php','-','templates/') , array('', ' ', ''), $template);
    return $template;
}

?>
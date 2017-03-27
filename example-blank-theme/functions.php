<?php

/**
 * @package WordPress
 * @subpackage project
 */

 /*-----------------------------------------------------------------------------------*/
 // - Initial Setup
 /*-----------------------------------------------------------------------------------*/

 add_action('after_setup_theme', 'project_setup');
 function project_setup() {
     load_theme_textdomain('project', get_template_directory() . '/languages'); //language support
     add_theme_support('title-tag'); //add doc title to <head>
     add_theme_support('automatic-feed-links'); //add RSS feed to <head>
     add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) ); //add html5 support for these features
 }

// Add ACF Options page
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page();
}

/*-----------------------------------------------------------------------------------*/
// - Load theme functions
/*-----------------------------------------------------------------------------------*/
$dir = get_template_directory();

require_once ( $dir . '/functions/cms_edits.php'); // CMS Edits
require_once ( $dir . '/functions/scripts.php'); // Enqueue Scripts
// require_once ( $dir . '/functions/shortcodes.php' ); // Shortcodes
// require_once ( $dir . '/functions/post-types.php' ); // Post types
// require_once ( $dir . '/functions/add-editor-styles.php'); // Editor Styles

/*-----------------------------------------------------------------------------------*/
/* - Register Menus
/*-----------------------------------------------------------------------------------*/
if( !function_exists( 'init_menus' ) ) {
   function init_menus() {
      register_nav_menu('primary-menu', __('Primary Menu'));
      register_nav_menu('footer-menu', __('Footer Menu'));
   }
   add_action('init', 'init_menus');
}

/*-----------------------------------------------------------------------------------*/
/* - Configure Image Sizes
/*-----------------------------------------------------------------------------------*/
if( function_exists( 'add_theme_support' ) ) {
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 400, 400, true ); // Thumbnail preview

	add_image_size('thumb', 100, 100, true); // Posts Thumbnails
// 	add_image_size('cta', 700, 700, true); // CTA
// 	add_image_size('cta-feature', 1200, 1200, true); // Feature CTA
// 	add_image_size('hero', 2000, 1200, true); // hero
}

/*-----------------------------------------------------------------------------------*/
/* - Add ID to each page
/*-----------------------------------------------------------------------------------*/
function get_page_id($page_name){
    global $wpdb;
    $page_name = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = '".$page_name."'");
    return $page_name;
}

/*-----------------------------------------------------------------------------------*/
/* - Change name of Default template (page.php)
/*-----------------------------------------------------------------------------------*/

// add_filter('default_page_template_title', function() {
//     return __('One Column', 'project_namespace');
// });

/*-----------------------------------------------------------------------------------*/
/* - Change name of Pages in admin menu
/*-----------------------------------------------------------------------------------*/
//
// function edit_admin_menus() {
//     global $menu;
//
//     $menu[20][0] = 'Pages'; // Change Pages to Pages
// }
// add_action( 'admin_menu', 'edit_admin_menus' );

?>

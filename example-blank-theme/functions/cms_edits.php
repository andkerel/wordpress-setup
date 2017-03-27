<?php

/*-----------------------------------------------------------------------------------*/
// - Remove Dashboard Widgets
/*-----------------------------------------------------------------------------------*/

function remove_dashboard_meta() {
    remove_action( 'welcome_panel', 'wp_welcome_panel' );
    remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
       remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
       remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
       remove_meta_box( 'dashboard_secondary', 'dashboard', 'normal' );
       remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
       remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );
       remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
       remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
       remove_meta_box( 'dashboard_activity', 'dashboard', 'normal');//since 3.8
}
add_action( 'admin_init', 'remove_dashboard_meta' );

/*-----------------------------------------------------------------------------------*/
// - Add Custom Dashboard Widgets
/*-----------------------------------------------------------------------------------*/

function project_add_dashboard_widgets() {

 wp_add_dashboard_widget(
                'project_hint_dashboard_widget',         // Widget slug.
                'Title Here',                     // Title.
                'project_hint_dashboard_widget_function' // Display function.
       );
}

function project_hint_dashboard_widget_function() {

 echo '<p>Put your instructions here!</p>';

}

add_action( 'wp_dashboard_setup', 'project_add_dashboard_widgets' );

/*-----------------------------------------------------------------------------------*/
// - Admin Menu Edits
/*-----------------------------------------------------------------------------------*/

//remove comments
// function project_remove_admin_menus() {
//     remove_menu_page( 'edit-comments.php' );
// }
// add_action( 'admin_menu', 'project_remove_admin_menus' );


/*-----------------------------------------------------------------------------------*/
// - Add Admin Menu Spacers
/*-----------------------------------------------------------------------------------*/

//set up function
add_action( 'admin_init', 'add_admin_menu_separator' );

function add_admin_menu_separator( $position ) {

	global $menu;

	$menu[ $position ] = array(
		0	=>	'',
		1	=>	'read',
		2	=>	'separator' . $position,
		3	=>	'',
		4	=>	'wp-menu-separator'
	);

} // end add_admin_menu_separator

//run action
//space after pages
// add_action( 'admin_menu', 'set_admin_menu_page_separator' );
// function set_admin_menu_page_separator() {
// 	do_action( 'admin_init', 21 );
// }

//space before CTAs
// add_action( 'admin_menu', 'set_admin_menu_cta_separator' );
// function set_admin_menu_cta_separator() {
// 	do_action( 'admin_init', 57 );
// }

/*-----------------------------------------------------------------------------------*/
// - Remove Unnecessary Items
/*-----------------------------------------------------------------------------------*/

// //remove featured image from some templates - page must have ID already
// add_action('do_meta_boxes', 'hide_featured');
//
// function hide_featured() {
//  if( !isset( $_GET['post'] ) )
//    return;
//
//    $template = get_post_meta( $_GET['post'] , '_wp_page_template', true );
//  if($template == 'page-templates/your-template-here.php'
//     || $template == 'page-templates/your-other-template-here.php'){
//    remove_meta_box( 'postimagediv', 'page', 'normal' );
//  }
// }

//Remove Comments
// function project_customize_admin_bar( $wp_admin_bar ) {
//
//    $wp_admin_bar->remove_node( 'comments' );
// }
// function custom_menu_page_removing() {
//    remove_menu_page( 'edit-comments.php' );
// }
// add_action( 'admin_bar_menu', 'project_customize_admin_bar', 999 ); //remove from admin bar at the top of the CMS
// add_action( 'admin_menu', 'custom_menu_page_removing' ); //remove from the left rail admin menu
//
// // Filter Yoast Meta Priority
// add_filter( 'wpseo_metabox_prio', function() { return 'low';});


/*-----------------------------------------------------------------------------------*/
// - Move Menu Items (Here, move Posts next to Pages)
/*-----------------------------------------------------------------------------------*/

add_action( 'admin_menu', function() {
   global $menu;
   $new_position = 19;
   $cpt_title = 'Posts';
   foreach( $menu as $key => $value )
   {
       if( $cpt_title === $value[0] )
       {
           $copy = $menu[$key];
           unset( $menu[$key] );
           $menu[$new_position] = $copy;
       }
   }
});

?>

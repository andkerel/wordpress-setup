<?php


function project_load_scripts() {

   //CSS
   wp_enqueue_style( 'font_awesome', '//netdna.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css');
   wp_enqueue_style( 'main', get_bloginfo('stylesheet_url'));

	//JS
	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery' , 'https://code.jquery.com/jquery-2.2.2.min.js', false, '1.0', true);
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'scripts' , get_template_directory_uri() . 'scripts.js',false, false, true);

	if(is_page('page_here')){
//enqueue page-specific scripts here
	}

}
add_action('wp_enqueue_scripts', 'project_load_scripts');


// Admin scripts
// function project_enqueue_admin_scripts() {
//    wp_enqueue_style( 'custom_acf', get_template_directory_uri() . '/css/admin/acf.css', false, '1.0.0' );
// }
// add_action( 'admin_enqueue_scripts', 'project_enqueue_admin_scripts' );

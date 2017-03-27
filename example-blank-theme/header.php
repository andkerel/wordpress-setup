<?php
/**
 * @package WordPress
 * @subpackage Scratch_Theme
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
	<head profile="http://gmpg.org/xfn/11">
		<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
		<link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo('stylesheet_url'); ?>" />
		<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
		<?php wp_head(); ?>
		
	</head>
	<body <?php body_class(); ?>>
		<div id="header">
			<p id="top"><a href="<?php bloginfo('url'); ?>/" id="site_name"><?php bloginfo('name'); ?> &#8212; <?php bloginfo('description'); ?></a></p>
			<ul id="nav">
				<?php
				
				$args = array(
				'depth'        => 0,
				'show_date'    => '',
				'date_format'  => '',
				'child_of'     => 0,
				'exclude'      => '',
				'include'      => '',
				'title_li'     => '',
				'echo'         => 1,
				'authors'      => '',
				'sort_column'  => 'menu_order, post_title',
				'link_before'  => '',
				'link_after'   => '',
				'exclude_tree' => ''
				);
				
				wp_list_pages($args);
				
				?> 
			</ul>
		</div><!-- / header -->
		<hr />
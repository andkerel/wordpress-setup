<?php

// *********************************************
//  Accordion Shortcode
// *********************************************

function add_accordion( $atts, $content = null ){
  extract( shortcode_atts( array(
    'title' => 'Enter a title',
    'id' => ''
      ), $atts ) );

      return '<section class="toggle" aria-expanded="false" data-id="'.$id.'"><button class="clickable">' . $title . '<span class="plusminus">+</span></button><div class="content"><div class="inner">'. do_shortcode($content) . '</div></div></section>';
}

//
//FORMAT
//
// [accordion title="TITLE HERE"]
// NORMAL RICH TEXT CONTENT HERE
// [/accordion]

add_shortcode('accordion', 'add_accordion');


// *********************************************
//  Add Two Columns
// *********************************************

function row( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'class' => ''
      ), $atts ) );

   return '<section class="row '.$class.'">'. do_shortcode($content) .'<div class="clear"></div></section>';
}
add_shortcode('row', 'row');


function one_half( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'class' => ''
      ), $atts ) );

   return '<section class="one_half '.$class.'">' . do_shortcode($content) . '</section>';
}
add_shortcode('one_half', 'one_half');


// *********************************************
//  Add Button
// *********************************************
function link_button( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'url' => '',
		'text' => '',
    ), $atts));
   return '<a class="sc-btn" href="'.$url.'">'.$text.'</a>';
}
add_shortcode('button', 'link_button');

?>

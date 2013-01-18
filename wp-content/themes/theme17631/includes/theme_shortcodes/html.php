<?php
/**
 *
 * HTML Shortcodes
 *
 */

// Frames

function frame_shortcode($atts, $content = null) {

    $output = '<div class="frame clearfix">';
    $output .= do_shortcode($content);
    $output .= '</div><!-- .frame (end) -->';

    return $output;

}

add_shortcode('frame', 'frame_shortcode');

function frame_left_shortcode($atts, $content = null) {

    $output = '<div class="frame alignleft">';
    $output .= do_shortcode($content);
    $output .= '</div><!-- .frame (end) -->';

    return $output;

}

add_shortcode('frame_left', 'frame_left_shortcode');

function frame_right_shortcode($atts, $content = null) {

    $output = '<div class="frame alignright">';
    $output .= do_shortcode($content);
    $output .= '</div><!-- .frame (end) -->';

    return $output;

}

add_shortcode('frame_right', 'frame_right_shortcode');


// Button

function button_shortcode($atts, $content = null) {

	extract(shortcode_atts(
        array(
            'link' => 'http://www.google.com',
            'text' => 'Button Text'
    ), $atts));
    
    $output =  '<a href="'.$link.'" title="'.$text.'" class="button">';
		$output .= $text;
		$output .= '</a><!-- .button (end) -->';

    return $output;

}

add_shortcode('button', 'button_shortcode');

// Padding

function pad_shortcode($atts, $content = null) {

    $output = '<div class="pad">';
    $output .= do_shortcode($content);
    $output .= '</div><!-- .pad (end) -->';

    return $output;

}

add_shortcode('pad', 'pad_shortcode');

// Small spacer

function sm_spacer_shortcode($atts, $content = null) {

    $output = '<div class="sm_spacer">';
    $output .= do_shortcode($content);
    $output .= '</div><!-- .sm_spacer (end) -->';

    return $output;

}

add_shortcode('sm_spacer', 'sm_spacer_shortcode');

// Heading

function st_h_shortcode($atts, $content = null) {

    $output = '<div class="st_h">';
    $output .= do_shortcode($content);
    $output .= '<span class="extra-wrap"></span></div><!-- .st_h (end) -->';

    return $output;

}

add_shortcode('st_h', 'st_h_shortcode');
// Map

function map_shortcode($atts, $content = null) {

	extract(shortcode_atts(
        array(
            'src' => '',
						'width' => '',
						'height' => ''
    ), $atts));
    
    $output =  '<div class="google-map">';
			$output .= '<iframe src="'.$src.'" frameborder="0" width="'.$width.'" height="'.$height.'" marginwidth="0" marginheight="0" scrolling="no">';
			$output .= '</iframe>';
		$output .= '</div>';

    return $output;

}

add_shortcode('map', 'map_shortcode');


// Dropcaps

function dropcap_shortcode($atts, $content = null) {

    $output = '<span class="dropcap">';
    $output .= do_shortcode($content);
    $output .= '</span><!-- .dropcap (end) -->';

    return $output;

}

add_shortcode('dropcap', 'dropcap_shortcode');


// Horizontal Rule

function hr_shortcode($atts, $content = null) {

    $output = '<div class="hr"><!-- --></div>';

    return $output;

}

add_shortcode('hr', 'hr_shortcode');


// Small Horizontal Rule

function sm_hr_shortcode($atts, $content = null) {

    $output = '<div class="sm_hr"></div>';

    return $output;

}

add_shortcode('sm_hr', 'sm_hr_shortcode');


// Spacer

function spacer_shortcode($atts, $content = null) {

    $output = '<div class="spacer"><!-- --></div>';

    return $output;

}

add_shortcode('spacer', 'spacer_shortcode');


// Blockquote

function blockquote_shortcode($atts, $content = null) {

    $output = '<blockquote>';
    $output .= do_shortcode($content);
    $output .= '</blockquote><!-- blockquote (end) -->';

    return $output;

}

add_shortcode('blockquote', 'blockquote_shortcode');


// Clear
function shortcode_clear() {
	return '<div class="clear"></div>';
}

add_shortcode('clear', 'shortcode_clear');

?>
<?php

/*-------------------------
 * Responsive Images
 */
function d42_responsive( $atts, $content = null ) {
    extract(shortcode_atts(array(), $atts));

  return '<span class="responsive">' . do_shortcode($content) . '</span>';
}

function d42_clear() {
    return '<div class="clearfix"></div>';
}

/*-------------------------
 * Horizontal Break
 */
function d42_hr( $atts, $content = null) {
  extract( shortcode_atts( array(
      'style' => '1',
      'margin' => ''
      ), $atts ) );

    if($margin == '') {
      $return = "";
    } else{
      $return = "style='margin:".$margin." !important;'";
    }

    return '<div class="hr hr' .$style. '" ' .$return. '></div>';
}
function d42_tooltip( $atts, $content = null)
{
  extract(shortcode_atts(array(
        'text' => ''
    ), $atts));

   return '<span class="tooltips"><a href="#" rel="tooltip" title="'.$text.'">'. do_shortcode($content) . '</a></span>';
}

/*-----------------------------------------------------------------------------------*/
/* Separator */
/*-----------------------------------------------------------------------------------*/
function d42_separator( $atts, $content = null){
  extract(shortcode_atts(array(
        'headline'      => 'h3',
        'title' => 'Title'
    ), $atts));

  return '<'.$headline.' class="title"><span>'.$title.'</span></'.$headline.'>';
}
/*-------------------------
 * Mark / Highlight
 */
function d42_highlight($atts, $content = null) {
  $attr = shortcode_atts(array(
    'block' => 'true',
  ), $atts);

  $o = '<mark class="highlite';
  if ($attr['block'] <> 'true') {
    $o .= ' inline';
  }
  $o .= '">' . do_shortcode($content) . '</mark>';
  return $o;
}

/*-------------------------
 * Section Break
 */
function d42_secbreak($atts, $content = null) {
    $attr = shortcode_atts(array(
        'imgalign' => 'left',
        'imgshadow' => 'false',
        'title' => '',
        'titlealign' => 'left'

    ), $atts);

    $output = '';
    $output .= '<div class="secbreak';
    if (esc_attr($attr['imgshadow']) == 'true') {
        $output .= ' secbreak-shadow';
    }
    $output .= '">';
    if ($attr['title'] <> '') {
      $output .= '<h2 style="text-align:'. esc_attr($attr['titlealign']).';">' . esc_attr($attr['title']) . '</h2>';
    }

    if ($content !== null) {
      $output .= '<div class="secbreak-content align-' . esc_attr($attr['imgalign']) . '">' . do_shortcode($content) . '</div>';
    }

    $output .= '</div>';
    return $output;
}
/*-------------------------
 * Gap
 */

function d42_gap( $atts, $content = null) {

extract( shortcode_atts( array(
      'height' 	=> '10'
      ), $atts ) );

      if($height == '') {
		  $return = '';
	  }
	  else{
		  $return = 'style="height: '.$height.'px;"';
	  }

      return '<div class="gap" ' . $return . '></div>';
}

/*-------------------------
 * Grid
 */
 function d42_grid_one_third( $atts, $content = null ) {
   return '<div class="one_third">' . do_shortcode($content) . '</div>';
}

function d42_grid_one_third_last( $atts, $content = null ) {
   return '<div class="one_third last">' . do_shortcode($content) . '</div><div class="clearfix"></div>';
}

function d42_grid_two_third( $atts, $content = null ) {
   return '<div class="two_third">' . do_shortcode($content) . '</div>';
}

function d42_grid_two_third_last( $atts, $content = null ) {
   return '<div class="two_third last">' . do_shortcode($content) . '</div><div class="clearfix"></div>';
}

function d42_grid_one_half( $atts, $content = null ) {
   return '<div class="one_half">' . do_shortcode($content) . '</div>';
}

function d42_grid_one_half_last( $atts, $content = null ) {
   return '<div class="one_half last">' . do_shortcode($content) . '</div><div class="clearfix"></div>';
}

function d42_grid_one_fourth( $atts, $content = null ) {
   return '<div class="one_fourth">' . do_shortcode($content) . '</div>';
}

function d42_grid_one_fourth_last( $atts, $content = null ) {
   return '<div class="one_fourth last">' . do_shortcode($content) . '</div><div class="clearfix"></div>';
}

function d42_grid_three_fourth( $atts, $content = null ) {
   return '<div class="three_fourth">' . do_shortcode($content) . '</div>';
}

function d42_grid_three_fourth_last( $atts, $content = null ) {
   return '<div class="three_fourth last">' . do_shortcode($content) . '</div><div class="clearfix"></div>';
}

function d42_grid_one_fifth( $atts, $content = null ) {
   return '<div class="one_fifth">' . do_shortcode($content) . '</div>';
}

function d42_grid_one_fifth_last( $atts, $content = null ) {
   return '<div class="one_fifth last">' . do_shortcode($content) . '</div><div class="clearfix"></div>';
}

function d42_grid_two_fifth( $atts, $content = null ) {
   return '<div class="two_fifth">' . do_shortcode($content) . '</div>';
}

function d42_grid_two_fifth_last( $atts, $content = null ) {
   return '<div class="two_fifth last">' . do_shortcode($content) . '</div><div class="clearfix"></div>';
}

function d42_grid_three_fifth( $atts, $content = null ) {
   return '<div class="three_fifth">' . do_shortcode($content) . '</div>';
}

function d42_grid_three_fifth_last( $atts, $content = null ) {
   return '<div class="three_fifth last">' . do_shortcode($content) . '</div><div class="clearfix"></div>';
}

function d42_grid_four_fifth( $atts, $content = null ) {
   return '<div class="four_fifth">' . do_shortcode($content) . '</div>';
}

function d42_grid_four_fifth_last( $atts, $content = null ) {
   return '<div class="four_fifth last">' . do_shortcode($content) . '</div><div class="clearfix"></div>';
}

function d42_grid_one_sixth( $atts, $content = null ) {
   return '<div class="one_sixth">' . do_shortcode($content) . '</div>';
}

function d42_grid_one_sixth_last( $atts, $content = null ) {
   return '<div class="one_sixth last">' . do_shortcode($content) . '</div><div class="clearfix"></div>';
}

function d42_grid_five_sixth( $atts, $content = null ) {
   return '<div class="five_sixth">' . do_shortcode($content) . '</div>';
}

function d42_grid_five_sixth_last( $atts, $content = null ) {
   return '<div class="five_sixth last">' . do_shortcode($content) . '</div><div class="clearfix"></div>';
}


/*-------------------------
 * Load Shortcodes
 */
add_shortcode('secbreak', 'd42_secbreak');
add_shortcode('mark', 'd42_highlight');
add_shortcode('responsive', 'd42_responsive');
add_shortcode('hr', 'd42_hr');
add_shortcode('clear', 'd42_clear');
add_shortcode('separator', 'd42_separator');
add_shortcode('tooltip', 'd42_tooltip');
add_shortcode('gap', 'd42_gap');
/* load grid */
add_shortcode('one_third', 'd42_grid_one_third');
add_shortcode('one_third_last', 'd42_grid_one_third_last');
add_shortcode('two_third', 'd42_grid_two_third');
add_shortcode('two_third_last', 'd42_grid_two_third_last');
add_shortcode('one_half', 'd42_grid_one_half');
add_shortcode('one_half_last', 'd42_grid_one_half_last');
add_shortcode('one_fourth', 'd42_grid_one_fourth');
add_shortcode('one_fourth_last', 'd42_grid_one_fourth_last');
add_shortcode('three_fourth', 'd42_grid_three_fourth');
add_shortcode('three_fourth_last', 'd42_grid_three_fourth_last');
add_shortcode('one_fifth', 'd42_grid_one_fifth');
add_shortcode('one_fifth_last', 'd42_grid_one_fifth_last');
add_shortcode('two_fifth', 'd42_grid_two_fifth');
add_shortcode('two_fifth_last', 'd42_grid_two_fifth_last');
add_shortcode('three_fifth', 'd42_grid_three_fifth');
add_shortcode('three_fifth_last', 'd42_grid_three_fifth_last');
add_shortcode('four_fifth', 'd42_grid_four_fifth');
add_shortcode('four_fifth_last', 'd42_grid_four_fifth_last');
add_shortcode('one_sixth', 'd42_grid_one_sixth');
add_shortcode('one_sixth_last', 'd42_grid_one_sixth_last');
add_shortcode('five_sixth', 'd42_grid_five_sixth');
add_shortcode('five_sixth_last', 'd42_grid_five_sixth_last');

?>
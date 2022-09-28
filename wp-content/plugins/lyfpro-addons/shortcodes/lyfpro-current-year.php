<?php
// [lyfpro-current-year]
if( !function_exists('designervily_lyfpro_sc_current_year') ){
function designervily_lyfpro_sc_current_year( $atts, $content=NULL ){
	return date("Y");
}
}
add_shortcode( 'lyfpro-current-year', 'designervily_lyfpro_sc_current_year' );
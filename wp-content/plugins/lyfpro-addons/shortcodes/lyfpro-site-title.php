<?php
// [lyfpro-site-title]
if( !function_exists('designervily_lyfpro_sc_site_title') ){
function designervily_lyfpro_sc_site_title( $atts, $content=NULL ){
	return get_bloginfo('name');
}
}
add_shortcode( 'lyfpro-site-title', 'designervily_lyfpro_sc_site_title' );
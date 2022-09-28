<?php
// [lyfpro-site-url]
if( !function_exists('designervily_lyfpro_sc_site_url') ){
function designervily_lyfpro_sc_site_url( $atts, $content=NULL ){
	return site_url();
}
}
add_shortcode( 'lyfpro-site-url', 'designervily_lyfpro_sc_site_url' );
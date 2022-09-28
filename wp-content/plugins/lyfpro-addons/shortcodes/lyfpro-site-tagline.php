<?php
// [lyfpro-site-tagline]
if( !function_exists('designervily_lyfpro_sc_site_tagline') ){
function designervily_lyfpro_sc_site_tagline( $atts, $content=NULL ){
	return get_bloginfo('description');
}
}
add_shortcode( 'lyfpro-site-tagline', 'designervily_lyfpro_sc_site_tagline' );
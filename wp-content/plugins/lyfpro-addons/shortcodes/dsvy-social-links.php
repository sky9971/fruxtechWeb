<?php

// [dsvy-social-links tooltip="left|right|top|bottom" colorful="yes|no"]
if( !function_exists('designervily_sc_social_links') ){
function designervily_sc_social_links( $atts, $content = "" ) {

	$return = '';

	//
	//$atts['tooltip'] = array('left-right-top-bottom');
	$data = '';
	if( !empty($atts['tooltip']) && in_array( $atts['tooltip'], array( 'left', 'right', 'top', 'bottom' ) ) ){
		$data .= 'data-balloon-pos="'.$atts['tooltip'].'"';
	}

	$colorful = '';
	if( !empty($atts['colorful']) && $atts['colorful']=='yes' ){
		$colorful = 'dsvy-colorful';
	}

	if( function_exists('dsvy_social_links_list') ){
		$social_list = dsvy_social_links_list();
		if( is_array($social_list) ){
			foreach( $social_list as $social ){

				// Tooltip
				if( !empty($data) ){ $data .= 'data-balloon="'.$social['label'].'"'; }

				$link = dsvy_get_base_option( $social['id'] );
				if( !empty($link) ){
					$return .= '<li class="dsvy-social-li dsvy-social-'.$social['id'].' '.$colorful.'"><a '.$data.' href="'.esc_url($link).'" target="_blank"><span><i class="'.$social['icon_class'].'"></i></span></a></li>';
				}
			}
		}
	}

	if( !empty($return) ){
		$return = '<ul class="dsvy-social-links">'.$return.'</ul>';
	}

	return $return;

}
}
add_shortcode( 'dsvy-social-links', 'designervily_sc_social_links' );

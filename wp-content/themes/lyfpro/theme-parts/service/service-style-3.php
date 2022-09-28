<?php
// Icon
if( !isset($icon_html) ){
	$ts_temp = true;
	$icon_html = '';
	$icon_lib = get_post_meta( get_the_ID(), 'dsvy-service-icon-library', true );
	wp_enqueue_style($icon_lib);
	$icon_class = get_post_meta( get_the_ID(), 'dsvy-service-icon-'.$icon_lib, true );
	if( !empty($icon_class) ){
		$icon_html = '<i class="'.esc_attr($icon_class).'"></i>';
	}
}

// Read More text
if( !isset($more_text) ){
	$more_text = esc_attr__('Read More','lyfpro');
}
?>
<div class="designervily-post-item">
	<?php dsvy_get_featured_data( array( 'featured_img_only' => true, 'size' => 'dsvy-img-600x700' ) ); ?>	
	<div class="designervily-box-content"> 
		<div class="designervily-box-content-inner">
			<div class="dsvy-service-cat"><?php echo get_the_term_list( get_the_ID(), 'dsvy-service-category', '', ', ' ); ?></div>
			<h3 class="dsvy-service-title"><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3> 
		</div>
	</div>
</div>
<?php
if( isset($ts_temp) ){
	unset($icon_html);
}
?>
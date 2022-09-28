<?php $hover_img = dsvy_client_hover_img(); ?>
<div class="dsvy-client-wrapper<?php if(!empty($hover_img)){ ?> dsvy-client-with-hover-img<?php } ?>">
	<h4 class="dsvy-hide"><?php echo get_the_title(); ?></h4>
	<?php dsvy_client_logo_link('start'); ?>
	<?php dsvy_get_featured_data( array( 'size' => 'dsvy-img-770x9999' ) ); ?>
	<?php echo dsvy_esc_kses(dsvy_client_hover_img()); ?>
	<?php dsvy_client_logo_link('end'); ?>
</div>
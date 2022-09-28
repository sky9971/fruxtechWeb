<div class="designervily-post-content">
	<?php dsvy_get_featured_data( array( 'featured_img_only' => true, 'size' => 'dsvy-img-770x770' ) ); ?>
	<div class="designervily-icon-box designervily-media-link">			  	
		<?php if( has_post_thumbnail() ): ?>
		<a class="dsvy-lightbox" title="<?php the_title_attribute(); ?>" href="<?php echo get_the_post_thumbnail_url(); ?>"><i class="dsvy-base-icon-plus"></i></a>
		<?php endif; ?>
	</div>
	<div class="designervily-box-content">
		<div class="designervily-titlebox">
			<div class="dsvy-port-cat"><?php echo get_the_term_list( get_the_ID(), 'dsvy-portfolio-category', '', ', ' ); ?></div>
			<h3 class="dsvy-portfolio-title"><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
		</div>
	</div>
</div>

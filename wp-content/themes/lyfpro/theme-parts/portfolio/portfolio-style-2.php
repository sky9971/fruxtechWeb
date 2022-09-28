<div class="designervily-post-item">	
	<div class="dsvy-image-wrapper">
		<?php dsvy_get_featured_data( array( 'featured_img_only' => true, 'size' => 'dsvy-img-600x800' ) ); ?>
	</div>			
	<div class="dsvy-content-wrapper">
		<div class="dsvy-port-cat"><?php echo get_the_term_list( get_the_ID(), 'dsvy-portfolio-category', '', ', ' ); ?></div>
		<h3 class="dsvy-portfolio-title"><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>	 
	</div>
</div>
<div class="post-item">
	<div class="dsvy-featured-container">		
		<div class="dsvy-meta-date-wrapper">					
				<span class="dsvy-day"><?php echo get_the_date( 'd' ); ?></span>
				<span ><?php echo get_the_date( 'M' ); ?></span>
		</div>
		<?php dsvy_get_featured_data( array( 'size' => 'dsvy-img-770x770' ) ); ?>			
	</div>
	<div class="designervily-box-content">	

	<div class="dsvy-meta-container">
			<div class="dsvy-meta-author-wrapper dsvy-meta-line">					
				<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" title="<?php printf( esc_attr__('Posted by %1$s','lyfpro'), get_the_author() ); ?>" rel="author"><i class="dsvy-base-icon-user"></i> <?php printf( __( 'by %1$s', 'lyfpro' ), get_the_author() ); ?></a>
			</div>
			<div class="dsvy-meta-cat-wrapper dsvy-meta-line">					
				<div class="dsvy-meta-category"><i class="dsvy-base-icon-folder-open"></i> <?php echo get_the_category_list( ', ' ); ?></div>	
			</div> 
		</div>
		<h3 class="dsvy-post-title"><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3> 
	</div>
</div>
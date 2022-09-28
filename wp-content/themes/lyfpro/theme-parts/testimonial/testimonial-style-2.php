<div class="designervily-post-item">
	<div class="designervily-box-content">
		<div class="designervily-box-desc">			
			<blockquote class="designervily-testimonial-text"><?php the_content(''); ?></blockquote>
			<?php dsvy_testimonial_star_ratings(); ?>
		</div>
	</div>
	<div class="designervily-box-img d-flex">
		<?php dsvy_get_featured_data( array( 'size' => 'thumbnail' ) ); ?>
		<div class="designervily-box-author">
			<h3 class="designervily-box-title"><?php echo get_the_title(); ?></h3>
			<?php dsvy_testimonial_details(); ?>
		</div>
	</div>
</div>
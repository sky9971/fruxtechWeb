
	<div class="designervily-post-item">
		<div class="designervily-team-image-box">		
			<div class="designervily-box-social-links"><?php echo dsvy_team_social_links(); ?></div>	
			<?php dsvy_get_featured_data( array( 'size' => 'dsvy-img-600x800' ) ); ?>
		</div>
		<div class="designervily-box-content">			
			<div class="designervily-box-team-position">
				<?php dsvy_team_designation(); ?>
			</div>	
			<h3 class="dsvy-team-title"><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>	
		</div>		
	</div>

 
<div class="dsvy-fld-contents">
	<div class="dsvy-circle-outer"
			data-digit			= "<?php echo esc_html($digit); ?>"
			data-fill			= "<?php echo esc_html($global_color); ?>"		
			data-emptyfill		= "#5a666f"
			data-before			= "<?php echo esc_html($before_text); ?>"
			data-before-type	= "<?php echo esc_html($beforetextstyle); ?>"
			data-after			= "<?php echo esc_html($after_text); ?>"
			data-after-type		= "<?php echo esc_html($aftertextstyle); ?>"
			data-thickness		= "4" 
			data-width			= "85"
			>
		<div class="dsvy-circle">
			<div class="dsvy-fid-inner">
				<?php echo dsvy_esc_kses( $before_text ); ?>
				<?php echo dsvy_esc_kses( $icon ); ?>
				<span class="dsvy-fid-sub">
					<?php echo dsvy_esc_kses( $after_text ); ?>
				</span>
			</div>
			<h3 class="dsvy-fid-title"><?php echo dsvy_esc_kses($title); ?></h3>
		</div>
		
	</div>
</div><!-- .dsvy-fld-contents -->
